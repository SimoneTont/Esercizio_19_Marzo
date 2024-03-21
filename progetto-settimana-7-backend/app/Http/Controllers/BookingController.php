<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\GymCourse;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $pendingBookings = Booking::where('pending', true)->get();
        $approvedBookings = Booking::where('pending', false)->get();
        $gymCourses = GymCourse::all();

        return view('dashboard', compact('pendingBookings', 'approvedBookings', 'gymCourses'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'course_id' => 'required|exists:gym_courses,id',
        ]);

        $booking = new Booking();
        $booking->user_id = auth()->id();
        $booking->course_id = $request->input('course_id');
        $booking->booked = true;
        $booking->pending = true;
        $booking->save();

        return redirect()->back()->with('success', 'Booking successful!');
    }
    public function approve(Booking $booking)
    {
        $booking->update([
            'pending' => false,
        ]);
        return redirect()->back()->with('success', 'Booking approved successfully.');
    }

    public function reject(Booking $booking)
    {
        $booking->delete();
        return redirect()->back()->with('success', 'Booking rejected.');
    }

    public function remove(Booking $booking)
    {
        $booking->delete();
        return redirect()->back()->with('success', 'Booking removed successfully.');
    }

    public function cancel(Booking $booking)
{
    $booking->delete();
    return redirect()->back()->with('success', 'Booking canceled successfully.');
}

}
