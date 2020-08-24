# real-estate-backend

To setup, create database "real_estate". On the project terminal run <code>Composer update/Composer install</code> to Install Dependencies.
To run after setup, <code>php artisan serve</code>

To test API's you created, make a POST request on http://localhost:8000/api/login to generate Authentication token. Every API request append generated token to authorization with type of Bearer Token.
