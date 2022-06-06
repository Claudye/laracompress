<?php
namespace Laracompress;

use Illuminate\Support\Facades\Facade;
/**
 * @method static bool unzip(string $zipfile, string $dir_to_extract) Uncompress zip file
 * @method static bool zip(string $path, string $zipfile) Compress a dir or file to zip file
 */
class Laracompress extends Facade{

     /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laracompress';
    }
}
