# BOOKING-DOCTOR

## Requirements

+ PHP 8.1
+ Laravel 8.6.10
+ Xampp v3.3.0
+ SQL phpMyAdmin
## Installation
### Clone

+ Clone this repo to your local machine using:
```bash
git clone git@github.com:4YourProblem/api-doctor-booking.git
```

### Setup

+ Go into the directory you cloned about:

+ Start xampp

+ Open phpMyAdmin
```bash
create database booking-doctor
```

+ Create .env file
```bash
cp .env.example .env
file .env database_name = booking-doctor
```

+ Update composer
```bash
composer update
```

+ Generate key
```bash
php artisan key:generate
```

+ Install passport
```bash
composer require laravel/passport
```

+ Migrate
```bash
php artisan migrate:refresh --seed 
```

+ Setting personal passport
```bash
php artisan passport:client --personal
```




## Usage
+ Run api is test
```bash
https://4yourp.000webhostapp.com/api/
```

## GET - POST API

+ /register
```
post/ name|email|password|phone
```
+ /login
```
post/ email|password
```

## USER

+ /user/profile/id
```
/post(user) name|email|phone

/post(patient) avatar|name|email|phone|address|birthday|gender|medical_history

/post(doctor) avatar|name|email|phone|address|education|specialty|word_experience
```
+ /user/doctor/request
```
/post avatar|address|education|specialty|work_experience|resume_path
```
+ /user/doctor
```
/get avatar|name|specialty|availability
```
+ user/doctor/id
```
/get avatar|name|address|education|specialty|work_experience|availability|count_patient
```
+ user/booking/id
```
/post avatar|address|birthday|gender|medical_history|booking_date|booking_time
```

## DOCTOR

+ doctor/booking
```
/get avatar|name|address|medical_history|booking_date|booking_time|status
```
+ doctor/booking/id
```
/get avatar|name|birthday|gender|medical_history|booking_date|booking_time|status
```
+ doctor/booking/id/accept
```
/post id
```
+ doctor/booking/id/cancel
```
/post id
```
+ doctor/booking/id/complete
```
/post id
```

## PATIENT

+ patient/booking/id/cancel
```
/post
```
+ patient/booking/history
```
/get name/booking_date/booking_time/status
```
+ patient/booking/history/id
```
/get avatar|name|phone|address(doctor)|specialty|booking_date|booking_time|address(location)|status
```

## ADMIN

+ admin/doctor/request
```
/get name|avatar|address|education|specialty|work_experience|resume_path
```
+ admin/approve/id
```
/post id
```
+ admin/refuse/id
```
/post id
```













