<?php

use Laracompress\Laracompress;

if (!function_exists('unzipfile')) {
    /**
     * Unzip a file
     *
     * @param string $zipfile zip file to extract
     * @param string $dir where to extract
     * @return bool
     */
    function unzipfile(string $zipfile, string $dir)
    {
        return Laracompress::unzip($zipfile, $dir);
    }

}

if (!function_exists('zipfile')) {
    /**
     * Compress a file
     *
     * @param string $path Path to compress
     * @param string $zipfile zip compressed name
     * @return bool
     */
    function zipfile(string $path, string $zipfile)
    {
        return Laracompress::zip($path, $zipfile);
    }

}

