<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Leave-Application-Project

It is a Laravel 10 blade template based demo project reflecting features of a leave application platform. Build with love and open source for developers.

1. Bootstrap 5.0
2. laravel/breeze
3. laravel/sanctum
4. Sweet Alert 2.0
5. Notification Alert -Toastr
6. Datatables

## Getting Started Step by Step
1. Go to the branch - **project_branch**
2. In your root folder, clone the project file using git clone https://github.com/JaberKh16/Leave-Application-Management.git
3. Open terminal (bash/cmd). Then go to project folder using command

```sh
cd Leave-Application-Project
```

4. Then install required files and libraries using

```sh
composer install
```

5. Then create a .env file and generate key for this project using command

```sh
cp .env.example .env

php artisan key:generate
```

6. Then compile all CSS & JS files together using this command

```sh
npm install && npm run dev
```

or

```sh
yarn install && yarn run dev
```

7. Create a database in MYSQL and connect it with your project via updating .env file.
8. After connecting the db with project, then run command

```sh
php artisan db:seed
```

After completing the migration and seeding of db, you will have 2 user ready for login in this project.
A. Admin -> Admin
Email -> admin@gmail.com
Pass -> admin

B. User -> User
Email -> user@gmail.com
Pass -> user

Finally we are ready to run our project using this command

```sh
php artisan serve
```
