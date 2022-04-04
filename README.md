## Overview
This is a simple laravel package that add contact form to your laravel application, send email to admin and save contact query to the database

## Installation
Begin by pulling in the package through Composer.

```
composer require ayangzy/contact
```

Next step, if using Laravel 5, you will need to include the service provider within your config/app.php file. From version 5.5 above, thanks to [ package autodiscovery](https://laravel-news.com/package-auto-discovery) this is no longer necesary.

```
'providers' => [
   Ayangzy\Contact\ContactServiceProvider::class,
];
```

## Configuration
You can configure the email adress where the contact form message is sent to by adding the following variables to the .env file of you application.

```
CONTACT_MAIL_TO=testcontactform@example.com
```

Fee free to modify the form view, To do this, you can publish the form view with the following command:

```
php artisan vendor:publish 
```
Select the provider to publish which is
```
 Ayangzy\Contact\ContactServiceProvider
```
Which will publish the config file, contact.php, which you can modify to add the email address to where you want to be receiving all contact emails


```
<?php

return [
   
'send_email_to' => env('CONTACT_MAIL_TO', 'felix@gmail.com'),
];
```
## Run migrations
After running migrations the package will generate tow migration files, the contacts and jobs migration files

## For mail Sending 
You have to configure your Mail driver in the .env to make the contact form  work correctly in your application.
don't also forget to set your  Queue Connection as ``QUEUE_CONNECTION=database``

## Usage
Once everything is correctly installed you can navigate to the http://127.0.0.1:8000/contact-us URL of your web application. This will show the contact form. Fill in the neccessary information and submit. 
For you to actually see the mail sent to the configured email address of your application, I have added a shouldQueue method for faster mail delivery, open your application terminal and run this command 

```
php artisan queue:work
```
This will process the job and dispatched the mail to your configured email address

## Security

If you discover any security related issues, please email ayangefelix8@gmail.com instead of using the issue tracker.

## Credits

- [Ayange Felix](https://github.com/ayangzy)


