<?php

namespace Laracompress;

use Laracompress\Core\CompressZip;
use Laracompress\Core\UncompressZip;

class LaracompressService
{

    /**
     * Unzip a file
     *
     * @param string $zipfile
     * @param string $dir_to_extract
     * @return bool
     */
    public function unzip(string $zipfile, string $dir_to_extract)
    {
        return (new UncompressZip())
            ->uncompress($zipfile, $dir_to_extract);
    }
    /**
     * Compress a file
     *
     * @param string $path
     * @param string $zipfile
     * @return bool
     */
    public function zip(string $path , string $zipfile)
    {
        return (new CompressZip())
            ->compress($path, $zipfile);
    }

}
