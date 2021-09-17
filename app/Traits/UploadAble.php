<?php 

namespace App\Traits; 

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;//EDBYDOS

/**
 * Trait UploadAble
 * @package App\Traits
 */

 trait UploadAble
 {
    /**
     * @param UploadedFile $file
     * @param null $folder
     * @param string $disk
     * @param null $filename
     * @return false|string
     */

     public function uploadOne(UploadedFile $file, $folder = null, $disk = 'public', $filename = null)
     {
        //$name = !is_null($filename) ? $filename : str_random(25);
        $name = !is_null($filename) ? $filename : Str::random(25); //EDBYDOS

        return $file->storeAs(
            $folder,
            $name . "." . $file->getClientOriginalExtension(),
            $disk
        );
     }

     /**
     * @param null $path
     * @param string $disk
     */
    public function deleteOne($path = null, $disk = 'public')
    {
        Storage::disk($disk)->delete($path);
    }
 }