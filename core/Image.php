<?php

class Image 
{
    public static function setImage($path, $oldImage = '')
    {
      $path = ROOT . '/images/' . $path . '/';
        FileSystem::makeFolder($path);
        if (isset($_FILES['image']) && !empty($_FILES['image'])) {
          
            if (is_uploaded_file($_FILES['image']['tmp_name'])) {
                $fileName = $_FILES['image']['tmp_name'];
                
                if (filesize($fileName) > 2 * 1024 * 1024) {
                    throw new Exception('Error: File size > 2M.');
                }
                if (!in_array($_FILES['image']['type'], ['image/jpeg','image/pjpeg','image/png', 'image/gif'])) {
                    throw new Exception('Error: Invalid image file type.');
                }
                self::deleteImage($path, $oldImage);
                return self::saveImageFile($fileName, $path);
            }
        }
        return false;
    }
    
    protected static function saveImageFile($fileName, $path)
    {
        $imageName = null;     
        list($width, $height, $type) = getimagesize($fileName);
        $types = ["", "gif", "jpg", "png"];
        $imageName = md5(date("Y-m-d H:i:s")) . "." . $types[$type];
        $imageFullName = $path . $imageName;
        if (@move_uploaded_file($fileName, $imageFullName)) {
            $sizes = [600, 400, 200, 100];
            foreach ($sizes as $size) {
                self::resizeImage($imageFullName, $path . $size . '_' . $imageName, $size);
            }
        } else {
            throw new Exception('Error: moving image file failed.');
        }
        return $imageName;
    }

     private static function resizeImage($imageName, $imageNew, $maxSize) 
     {
        list($width, $height, $type) = getimagesize($imageName);
        $types = array("", "gif", "jpeg", "png");
        $ext = $types[$type];
        if ($ext) {
            $func = 'imagecreatefrom' . $ext;
            $source = $func($imageName);
            $ratio = ($height / $width > 1) ? ($maxSize / $height):($maxSize / $width);
            $heightNew = $height * $ratio;
            $widthNew = $width * $ratio;
            
            $dest = imagecreatetruecolor($widthNew, $heightNew);
            imagecopyresampled($dest, $source, 0, 0, 0, 0, $widthNew, $heightNew, $width, $height);
            switch($ext) {
                case 'jpeg': $quality = 100; break;
                case 'png': $quality = 9; break;
            }
            $func = 'image' . $ext;
            if (($ext == 'jpeg') || ($ext == 'png')) {
                $func($dest, $imageNew, $quality);
            } elseif ($ext == 'gif'){
                $func($dest, $imageNew);
            }
            imagedestroy($source);
            imagedestroy($dest);
        }
    }

    public static function deleteImage($path, $image) 
    {
        if (is_dir($path))
        {
            $sizes = [600, 400, 200, 100];
            FileSystem::deleteFile($path . $image);
            foreach ($sizes as $size) {
                FileSystem::deleteFile($path . $size . "_" .$image);
            }
        }
    }  
}

?>
