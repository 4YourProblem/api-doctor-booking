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