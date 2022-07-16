<?php
use Intervention\Image\ImageManagerStatic as Image;

// resize image uploaded
function resize_image_upload($file, $type){
    $ext = $file->getClientOriginalExtension();
    $ext = strtolower($ext);
    if($ext == "jpg" || $ext == "jpeg" || $ext == "png" || $ext == "gif"){
        if($type =='products'){
            $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $image_name = str_slug($filename).'.'.$file->getClientOriginalExtension();
            $image_name_resized = time().rand(1,50)."_".$image_name;
            // Medium Image
            $image_resize = Image::make($file->getRealPath());
            $image_resize->resize(730, 365, function($constraint) {
                // $constraint->aspectRatio();
            });
            $image_resize->save(storage_path('app/public/products/'.$image_name_resized));
            return 'public/products/'.$image_name_resized;
        }
    }else{
        return "";
    }
}
