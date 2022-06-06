# laracompress
 Packages to compress and decompress files with laravel
# Installation
  - Create your laravel project
 Install this package by typing in the root folder of your project
 
  ``` composer require claudye/laracompress ```
If you have no errors, everything went well!
 - Load our service provider
 Make sure that the service provider ``` Laracompress\Providers\LaracompressProvider ``` is added to the service providers of laravel
 In the file, ``` ./config/app.php ```, add the following class to the list of service providers
 ```
 'providers' => [

        /*
         * Laravel Framework Service Providers...
         */
        Illuminate\Auth\AuthServiceProvider::class,
        //others services providers
        Laracompress\Providers\LaracompressProvider::class

    ],

 ```
 
