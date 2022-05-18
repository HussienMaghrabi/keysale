<?php
namespace App\Traits;

trait storeFile
{
    protected function storeFile($file)
    {
        $path = $file->store('public/files');
        $url = url('/');
        $url = str_replace('public', '', $url);
        $serverPath = $url . '/storage/app/';
        $path = $serverPath . $path;
        return $path;
    }
}
