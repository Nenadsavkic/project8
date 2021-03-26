# My site

<p>This is my first Laravel project which have purpose to present me and my knowledge in a field of programing.</p>

## Installation

### I assume you already have Laravel installed <p>[Official Documentation](https://laravel.com/docs/8.x/installation#installation)</p>


### Clone the repository

   <p> git clone git@github.com:gothinkster/laravel-realworld-example-app.git </p>

   ### Switch to the repository cloned folder

   <p> example path:  PS C:\Users> cd mysite  </p>

### Install all the dependencies using composer

   ``` bash
   composer install
   ```

### Copy the example env file and make the required configuration changes in the .env file
    
   ```bash
   cp .env.example .env
   ```

### Generate a new application key
    
   ```bash
   php artisan key:generate
   ```
### Link storage directory

   ```bash
   php artisan storage:link
   ```

### Create database 'mysite' in your local server (xamp), then run migration
### Check the database connection in .env before migrating

   ```bash
   php artisan migrate
   ```

### Start your server

   ```bash
   php artisan serve
   ```

<p> You can now access the server at http://localhost:8000</p>


**TL;DR command list**

    git clone git@github.com:gothinkster/laravel-realworld-example-app.git
    cd laravel-realworld-example-app
    composer install
    cp .env.example .env
    php artisan key:generate
    php artisan jwt:generate 
    

