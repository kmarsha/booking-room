<p align="center">
 <img src="https://github.com/kmarsha/booking-room/blob/main/public/img/pages/page1.png" alt="Project Welcome Page">
</p>
<h3 align="center">Booking Room</h3>

<div align="center">

[![Repository](https://img.shields.io/badge/kmarsha-kasir--restoran-brown.svg)](https://github.com/kmarsha)
[![Status](https://img.shields.io/badge/status-closed-white.svg)]()

</div>

---

<p align="center"> Booking Room is a simple project for booking and rescheduling room
    <br> 
</p>

## 📝 Table of Contents

- [User Role](#user_role)
- [Setting up a local environment](#getting_started)
- [Usage](#usage)
- [Preview](#preview)
- [Technology Stack](#tech_stack)
- [Authors](#authors)

## 🧐 User Role <a name = "user_role"></a>

Completed with 2 Users
- Admin (managed Users and room schedule)
- Ordinary User (books room)

## 🏁 Getting Started <a name = "getting_started"></a>

These instructions will get you a copy of the project up and running on your local machine for development
and testing purposes. 

### Prerequisites

What things you need to install the software and how to install them.

```
PHP >= 8.0.12
```

### Installing

A step by step series of examples that tell you how to get a development env running.

Say what the step will be

```
git clone

composer install

composer update

cp .env.example .env

php artisan key:generate

CREATE DATABASE
```
modify .env file
```
php artisan migrate --seed

php artisan serve
```

open app\Http\Kernel.php add sintaks below in last lined of protected $routeMiddleware array
        ```
        'isAdmin' => \App\Http\Middleware\AdminMiddleware::class,
        ```

## 🎈 Usage <a name="usage"></a>

Login with Role Admin
- Email/Username = admin@gmail.com / admin
- Password = pass

Login with Role User (may you prefer to register)
- Email/Username = marshak@gmail.com / macca
- Password = pass

There's 8 types of booking status
- pending = the first status after request booking
- approved = when admin approving your request
- rejected = when admin rejecting your request and you refuse to reschedule
- used = when you used the room
- canceled = when you canceling the room you have been book
- done = when the room already used
- expired = the pending status not noticed by admin and it has been past the booking date
- rescheduled = when you accept to reschedule your booking

## 🌸 Preview <a name="preview"></a>
<img src="https://github.com/kmarsha/booking-room/blob/main/public/img/pages/page1.png">
<img src="https://github.com/kmarsha/booking-room/blob/main/public/img/pages/page2.png">
<img src="https://github.com/kmarsha/booking-room/blob/main/public/img/pages/page3.png">
<img src="https://github.com/kmarsha/booking-room/blob/main/public/img/pages/page4.png">
<img src="https://github.com/kmarsha/booking-room/blob/main/public/img/pages/page5.png">
<img src="https://github.com/kmarsha/booking-room/blob/main/public/img/pages/page6.png">
<img src="https://github.com/kmarsha/booking-room/blob/main/public/img/pages/page7.png">
<img src="https://github.com/kmarsha/booking-room/blob/main/public/img/pages/page8.png">
<img src="https://github.com/kmarsha/booking-room/blob/main/public/img/pages/page9.png">
<img src="https://github.com/kmarsha/booking-room/blob/main/public/img/pages/page10.png">
<img src="https://github.com/kmarsha/booking-room/blob/main/public/img/pages/page11.png">
<img src="https://github.com/kmarsha/booking-room/blob/main/public/img/pages/page12.png">
<img src="https://github.com/kmarsha/booking-room/blob/main/public/img/pages/page13.png">
<img src="https://github.com/kmarsha/booking-room/blob/main/public/img/pages/page14.png">

## ⛏️ Built With <a name = "tech_stack"></a>

- [MySQL](https://www.mysql.com/) - Database
- [Laravel](https://laravel.com/) - Server Framework
- [Bootstrap](https://getbootstrap.com/) - Web Framework
- [NodeJs](https://nodejs.org/en/) - Server Environment
- [SweetAlert](https://sweetalert2.github.io/) - Notification
- [Datatables](https://datatables.net/) - Paging Data

## ✍️ Authors <a name = "authors"></a>

- [@bagusshndr](https://github.com/bagusshndr) - Idea & Initial work
- [@kmarsha](https://github.com/kmarsha) - Initial work
- [@muzalri](https://github.com/muzalri) - Initial work
