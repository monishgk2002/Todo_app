## Easy-Todo-App
![Main](https://i.imgur.com/i9ILHMo.png)

![Create Todo](https://i.imgur.com/qx5USYK.png)

![End Todo](https://i.imgur.com/ItyLvUg.png)

## Description
This is a simple todo-app built on Laravel 7 & VueJS for demonstration

## How to install

Clone this repository, cd into the project folder and after this:

Do a composer install:
```
composer install
```

Then create a environment file:
```
cp .env.example .env
```
Create database named **todo-app** and run the migrations:
```
php artisan migrate
```

Install dependencies from npm:
```
npm install
```

Run server using this command:
```
php artisan serve
```

Run frontend:
```
npm run watch
```
