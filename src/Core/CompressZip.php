<?php
namespace Laracompress\Core;

use Exception;
use ZipArchive;
use Laracompress\Core\AbstractCompress;
use Symfony\Component\Finder\Exception\DirectoryNotFoundException;

class CompressZip extends AbstractCompress{
    /**
     * compress a path to zip file
     *
     * @param string|null $path
     * @param string|null $zipfile
     * @return bool
     */
    public function compress(string $path, string $zipfile)
    {
        $this->zipfile = $zipfile ;
        $this->dir = $path ;
        if (!is_dir($this->dir)) {
            throw new DirectoryNotFoundException("{$this->dir} dir is not found", 1);
        }

        if (!is_dir(dirname($zipfile))) {
            throw new Exception("Error ! Can't create zip file with path {$zipfile}", 1);
        }
        $files =$this->scandir($this->dir);
        // Get real path for our folder
        $rootPath = realpath($this->dir);

        if (!is_file($this->zipfile)) {

            $this->zipper->open($this->zipfile, ZipArchive::CREATE | ZipArchive::OVERWRITE);

            foreach ($files as $file) {

                if (in_array($file->getRealPath(),$this->config['ignores']['dir'])) {
                    continue ;
                }
                // Skip directories (they would be added automatically)
                if (!$file->isDir()) {
                    if (in_array($file->getFileName(),$this->config['ignores']['files'])) {
                        continue ;
                    }else {
                         // Get real and relative path for current file
                    $sourceFilePath = $file->getRealPath();
                        $relativePath = substr($sourceFilePath, strlen($rootPath) + 1);

                        $relativePath = str_replace(DIRECTORY_SEPARATOR, self::SEPERATOR, $relativePath);

                        // Add current file to archive
                        $success =$this->zipper->addFile($sourceFilePath, $relativePath);
                    }
                }
            }
            return $this->zipper->close();
        }

        $this->errors [] = "The zip file {$this->zipfile} already exist ";
        return false ;
    }


}
