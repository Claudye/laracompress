<?php
namespace Laracompress\Core;

use Exception;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class UncompressZip extends AbstractCompress{

    private function fileExists(){
        return File::exists($this->zipfile);
    }

    private function isZipFile(){
        if (!$this->fileExists()) {
            return false ;
        }
        return File::extension($this->zipfile) == 'zip';
    }

    public function uncompress(string $zipfile, string $dir_to_extract){
        //Settings
        $this->zipfile = $zipfile ?? $this->zipfile ;
        $this->dir = $dir_to_extract ?? $this->dir ;

        //Check if file exists et is a zip file
        if (!$this->isZipFile()) {
            throw new Exception("Le fichier {$this->zipfile} ne semble pas être un fichier zip", 1);
        }

        //Check dir exists
        if (!is_dir($this->dir)) {
            throw new Exception("{$this->dir} ne semble pas être un dossier valide", 1);
        }

        if ($this->zipper->open($zipfile ?? $this->zipfile) === true) {
            $this->zipper->extractTo($dir_to_extract ?? $this->dir);

            return $this->zipper->close();
        }
        $this->errors []=  "Can't open {$this->zipfile} file";
        return false;
    }
}
