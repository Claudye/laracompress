**Laracompress** is a laravel package for compressing and decompressing files withing your project.
 
# When to use?

You will use laracompress, when you are designing an application that handles compressed (zipped) files and you want a quick and easy solution.

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
        
        Laracompress\Providers\LaracompressProvider::class,

    ],

 ```
 That's really all it takes to get started using **laracompress**
 
 # Usage
 We have a facade to manage the compression and decompression of a path in your project.
 ### Compression
 ```
 use Laracompress\Laracompress;
 /**
 * This function takes two arguments as parameters, the first is the path (folder or file to compress), 
 * The second is the destination filename. Eg: (test.zip)
 */
 Laracompress::zip($path, $zipfile);
 
 ```
 ### Decompression
  ```
 use Laracompress\Laracompress;
 /**
 * This function takes two arguments as parameters, the first is the file to decompress,
 * The second argument is the name of the folder where the file will be unzipped. Eg: (/test)
 */
 Laracompress::unzip($zipfile, $dir_to_extract);
 
 ```
 
 ## Helpers
Instead of using the facade, we have zipfile() and unzipfile() functions that do the same things as our facade.
 ### Example
 ```
 zipfile($path, $zipfile); //zip file
 unzipfile($zipfile,$dir)
 
 ```
 Thank you for using laracompress.
