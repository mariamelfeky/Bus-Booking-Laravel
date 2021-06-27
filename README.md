<p align="center">

![Platform Logo](https://github.com/mariamelfeky/Bus-Booking-Laravel/blob/master/public/bus.png?raw=true)

</p>
<h2 align="center">
Fleet Management System (Bus Booking System)
</h2>
<p align="center">
PHP , Laravel , Bootstrap
</p>

## Description

<p>
Our Fleet Management System for bus booking is provide trips around Egypt cities as stations [Cairo, Giza, AlFayyum, AlMinya, Asyut...].
Trips are between two stations that cross over in between stations.
One bus for each trip and it is 12 available seats to booked by user.
We provide apis that allow user to get available seats on the bus of the trip and can book his seat.

</p>

## Prerequirements

-   [PHP](https://www.php.net/downloads.php)
-   [Composer](https://getcomposer.org/)
-   [Node](https://nodejs.org/en/download/)
-   [npm](https://nodejs.org/en/download/package-manager/)
-   [Mysql](https://www.mysql.com/)
-   [Apache](https://httpd.apache.org/)

## Clone or download

```terminal
$ git clone https://github.com/mariamelfeky/Bus-Booking-Laravel
```

### Start

```terminal
$ cd bus-booking             // go to app folder
$ composer install           // install required
$ copy .env.example .env     // copy .env.example file to root folder (Windows)
$ cp .env.example .env       // copy .env.example file to root folder (Linux)
$ php artisan key:generate   // generate key
$ php artisan migrate --seed // create database in insert dump data
$ php artisan jwt:secret     // create your own secret jwt key
$ php artisan serve          // run it locally
Go to http://localhost:8000/home

```

### Prepare your database

you need to create new database and import sql file that in database directory (https://github.com/mariamelfeky/Bus-Booking-Laravel/blob/master/database/bus-booking.sql)

### Prepare your .env

You need to open .env file and add the following data

```terminal
DB_DATABASE={dbname}
DB_USERNAME={username}
DB_PASSWORD={password}

```

## Credentials

-   Admin Account: `admin@example.com` & Password: `password`
-   User Account: `user@example.com` & Password: `password`

## ERD

<p align="center">
  <img src="https://github.com/mariamelfeky/Bus-Booking-Laravel/blob/master/public/erd.PNG?raw=true" width="600">
</p>

### Dependencies(tech-stacks)

-   php: ^7.3|^8.0
-   laravel/framework: ^8.40
-   laravel/ui: ^3.3
-   bootstrap: ^4.6.0
-   jwt-auth: ^1.0

## Author

Mariam Elfeky

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
