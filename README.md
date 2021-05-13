# books_rest_api

This project is a small REST API based on this stack :

- PHP / Symfony 5.2.7 / Composer / API Platform
- PHP-FPM / Nginx
- MariaDB 10.5.9
- Docker

## Pre-requisites :

- Install Git
- Install docker / docker-compose

## Startup :

Run the following command at the root project

```
cd docker
docker-compose up
```

Here the links :)

- API docs : http://localhost/api
- PHPMyAdmin : http://localhost:8080

For the 1st time, it can take a long time to download dependencies (based on your laptop & connection speed).
Once you see in the logs __"fpm is running, pid 1"__, your app is up and running :)

## Payload examples

Payload to attach a book to a user / library

__PUT /api/books/{id}__
```
{
  "title": "Terminator",
  "author": "Schwarzy",
  "summary": "An action story",
  "isbn": "978-1-56619-909-4",
  "library": "api/libraries/1",
  "user": "api/users/1"
}
```
Payload to create a book into a library

__POST /api/books__
```
{
  "title": "Hello world",
  "author": "Mc Gyver",
  "summary": "Swiss knife baby",
  "isbn": "978-1-56619-909-4",
  "library": "api/libraries/1"
}
```

## DB model

![DB model alt](/doc/books_rest_api.png "DB model")

## Swagger import

[Swagger.json](/doc/swagger.json)

## How to authenticate ?

The "api/libraries" route need authentication to be able to get the results
_Note : you can temporary disable it if you want by commenting the latest line at the botton of the file `src/config/packages/security.yaml`_
```
- { path: ^/api/libraries, roles: IS_AUTHENTICATED_FULLY }
```
### Steps

- Create a user thanks to a payload

POST ​/api​/users
```
{
  "password": "secret123",
  "username": "Angela",
  "firstname": "Merkel",
  "lastname": "amerkel"
}
```

![Postman create user alt](/doc/postman_auth_token.png "Postman create user")


- Call the route to get the Bearer token (through website or postman) :
POST http://localhost/api/login
```
{
    "username": "amerkel",
    "password": "secret123"
}
```

![API Platform auth alt](/doc/api_platform_auth_token.png "API Platform auth")


- Get the token and copy/paste it thanks to the button "Authorize" at the tight top of the API webpage
- Then you can test the `api/libraries` route directly :)

## Credits :

- Environment setup based on this article : https://dev.to/martinpham/symfony-5-development-with-docker-4hj8
- Swagger tool usage : https://editor.swagger.io/
