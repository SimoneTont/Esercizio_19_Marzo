Struttura:

User:
-user_id
-name
-email
-isAdmin

Gym_courses:
-course_id
-courses
-description

Booking:
-course_id
-user_id
-booked
-pending

Diviso in admin e utenti normali
Utente deve avere ID, nome utente, email, corsi prenotati, corsi in sospeso (Admin deve approvare o declinare i corsi in sospeso)

Admin può modificare i corsi prenotati degli utenti, deve anche approvare o declinare i corsi in sospeso (Tabella a parte nel frontend)
L'utente deve poter annullare il suo corso

Lista di corsi della palestra, partecipanti per ogni corso

Comandi

composer create-project laravel/laravel:^10.0 progetto_settimana7_backend
cd progetto_settimana7_backend
composer require laravel/breeze:=1.19 --dev
composer require laravel/breeze --dev
php artisan breeze:install
php artisan breeze:install api