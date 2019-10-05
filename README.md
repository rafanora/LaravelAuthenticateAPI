# LaravelAuthenticateAPI

Project authentication by API<br/>
#Factory, Migrate, MySQL, middleware. 


**Don't forget to run  
composer require laravel/passport (Config databese in the file .env and run migrate to create the tables.)
php artisan passport:install
php artisan key:generate


**To test you can unse this:
*REGISTER USER
POST http://localhost:8000/api/auth/register HTTP/1.1
User-Agent: Fiddler
Content-Type: application/json
Accept: application/json
Host: localhost:8000
Content-Length: 122

{
  "name": "Rafael2",
  "email": "rafael2@rafael.com",
  "password": "123abc",
  "password_confirmation": "123abc"
}

*LOGIN
POST http://localhost:8000/api/auth/login HTTP/1.1
User-Agent: Fiddler
Content-Type: application/json
Accept: application/json
Host: localhost:8000
Content-Length: 62

{
  "email": "rafael2@rafael.com",
  "password": "123abc"
}

*LOGOUT
**YOU MUST PUT Barear before token: 'Authorization: Bearear eyJ0eXA...'
POST http://localhost:8000/api/auth/logout HTTP/1.1
User-Agent: Fiddler
Accept: application/json
Host: localhost:8000
Content-Length: 62
Authorization: eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjQyNzJmODkzYTE3NDRkNTY0ZGNkMmYyMjMxMjk5MzNkMmQ4MTk1ZDAxMjhkNTI4YjExMzA4MGU5OGVjODVjNWYzMDhjMTVjZTc3YWZiNTcwIn0.eyJhdWQiOiIzIiwianRpIjoiNDI3MmY4OTNhMTc0NGQ1NjRkY2QyZjIyMzEyOTkzM2QyZDgxOTVkMDEyOGQ1MjhiMTEzMDgwZTk4ZWM4NWM1ZjMwOGMxNWNlNzdhZmI1NzAiLCJpYXQiOjE1NjczMzkyNzUsIm5iZiI6MTU2NzMzOTI3NSwiZXhwIjoxNTk4OTYxNjc1LCJzdWIiOiIyIiwic2NvcGVzIjpbXX0.i6Is2FvW-eUus2C7EtO8yoqJPn-kWspqyR87e777wClEyBmpL1WW9XYqJ54XX0LQwjT4s6KA_FN6vdNIt0Y5Ah0fVAwjo09IYqdKYWVrH5gI_-UxH6kFlvwnqqUXfSoSW-XF6r2UDmxPoG9bSjzesego2nyXN8gX7k8h-6BXC4m-MY_Qj5JUyhHri4SueLGbYbdffwT4vApVm_iF4L9_pQ2w8icCSfhrOqjtS7sEqIq3bQ4UT9fhz0EllnWf6iCdiASUL-gP36YxB4kARq62QRCIxJ_xz8mptHR6lC2k2i12m0rm7YDuYgzWss43Q5RAz7KG-HbdlDeBy0LY5e6ya5OZf6YaJo8Pb1lzNxdb3oR4XzBpPH__HFazIj3ysEUpdEGLxke49E6zDSSwT-4sD-SeezhOb92NBOUzpovAiLFTS33jEkuhw732Ncry8SEMCfUClHCGtWTLhNlA8iY9wF1_gjEtNbIjvkNcMXhP1olxLQCBMPk3DdhjOfMbgIvfup_Zt9sDj7kJqAZY8aH5YdJIMuB17NBsnCesRgI086JNN8boD_CfFyV4tU3PdwQLHqpuWAQpZ8JQDh961Btgz1K84p5_AmlJuZS7vzlICCw3kF3W9ZBBnsLIoUT4vGKobikfvQDAMfEX8bZB3uNJ3cOeeNqr9T96k0ifHhYTAa4

{
  "email": "rafael2@rafael.com",
  "password": "123abc"
}