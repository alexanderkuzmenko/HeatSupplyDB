<?php

class FileSystem
{
    public static function makeFolder($folder)
    {
        if (!is_dir($folder))
        {
            mkdir($folder, 0755);
        }
    }

    public static function deleteFolder($folder)
    {
        if (is_dir($folder))
        {
            if(!is_writeable($folder)){chmod($folder,0777);}
            $handle = opendir($folder);
            while($tmp=readdir($handle))
            {
                if($tmp!='..' && $tmp!='.' && $tmp!='')
                {
                    self::deleteFile($folder.'/'.$tmp);
                }
            }
            closedir($handle);
            rmdir($folder);
        }
    }

    public static function fileWrite($file, $content)
    {
        $handle = fopen($file, "w");
        fwrite($handle, $content);
	fclose($handle);
    }

    public static function deleteFile($file)
    {
        if (is_file($file))
        {
            if(!is_writeable($file))
            {
                chmod($file,0666);
            }
            unlink($file);
        }       
    }
}

?>
