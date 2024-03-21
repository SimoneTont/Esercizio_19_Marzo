<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(auth()->user()->isAdmin)
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h2 class="text-xl font-semibold mb-4">Pending Booking Requests</h2>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">User</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Course</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($pendingBookings as $booking)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $booking->user->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $booking->course->course_name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <form action="{{ route('bookings.approve', $booking->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="text-indigo-600 hover:text-indigo-900">Approve</button>
                                        </form>
                                        <form action="{{ route('bookings.reject', $booking->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="text-red-600 hover:text-red-900">Reject</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h2 class="text-xl font-semibold mb-4">Approved Bookings</h2>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">User</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Course</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($approvedBookings as $booking)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $booking->user->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $booking->course->course_name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <form action="{{ route('bookings.remove', $booking->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900">Remove</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @endif
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach($gymCourses as $course)
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h2 class="text-xl font-semibold mb-2">{{ $course->course_name }}</h2>
                        <p class="text-gray-600">{{ $course->description }}</p>
                        @php
                        $booking = auth()->user()->bookings()->where('course_id', $course->id)->where('pending', false)->first();
                        @endphp

                        @if($booking)
                        <p class="text-green-500">Booked</p>
                        @else
                        @php
                        $existingBooking = auth()->user()->bookings()->where('course_id', $course->id)->where('pending', true)->exists();
                        @endphp

                        @if($existingBooking)
                        <p class="text-red-500">You already have a pending booking request for this course.</p>
                        @else
                        <form action="{{ route('bookings.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="course_id" value="{{ $course->id }}">
                            <button type="submit" class="bg-blue-500 font-semibold px-4 py-2 rounded-md mt-2">
                                Book it
                            </button>
                        </form>
                        @endif
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>