<?php
namespace Laracompress\Core;

use ZipArchive;
use RecursiveIteratorIterator;
use RecursiveDirectoryIterator;
/**
 * @author Claude Fassinou <dev.claudy@gmail>
 * @license MIT
 * @copyright 2022 Laracompress
 *
 */
abstract class AbstractCompress{
    /**
     * Directory separator
     * @var string
     */
    public const SEPERATOR = "/";
    /**
     * Undocumented variable
     *
     * @var ZipArchive
     */
    protected $zipper ;

    /**
     * Errors
     *
     * @var array
     */
    protected $errors = [] ;

    /**
     * Zipfile name
     *
     * @var string
     */
    protected $zipfile ;

    /**
     * Dir name
     *
     * @var string
     */
    protected $dir;
    /**
     * Config array
     *
     * @var array
     */
    protected $config =[];

    public function __construct()
    {
        $this->zipper =  new ZipArchive();
        $this->config = config('laracompress') ?? require __DIR__ .'/../../config/laracompress.php';
    }

    /**
     * Scan a dir
     *
     * @param string $dir
     * @return RecursiveIteratorIterator
     */
    public function scandir(string $dir)
    {
        // Create recursive directory iterator
        /** @var SplFileInfo[] $files*/
        return new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator(realpath($dir)),
            RecursiveIteratorIterator::LEAVES_ONLY
        );
    }
}
