<?php
namespace App\Traits;

use Image;
use Illuminate\Http\Request;

trait HasImageIntervention
{

    function imageResize($path, $width, $height, $aspect_ratio = false, $save_to = '')
    {
        
        $image = Image::make($path);

        if($aspect_ratio)
        {
            //with aspect ratio
            if($save_to){
                $image->resize($width, $height, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($save_to);
            }else{
                $image->resize($width, $height, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($path);
            }

        }else{
            if($save_to){
                $image->resize($width, $height)->save($save_to);
            }else{
                $image->resize($width, $height)->save($path);
            }
        }

        return $image;

    }

    function upload($image, $path)
    {
        $name = uniqid() . time() .'.'.$image->getClientOriginalExtension();
        $img = Image::make($image->getRealPath());
        if($img->save($path.'/'.$name)){
            return $name;
        }else{
            return "";
        }
    
    }

    
}
