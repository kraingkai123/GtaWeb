<?php

class FileAttach
{
    public function __construct()
    {
        global $conn;
    }
    public static function createFolder($type) //1 สลิป 2 รูปสนาม
    {
        $path =  '../attach/fileuploads/';
        //ชื่อเเฟ้ม
        $foldername = "";
        $foldername = $path;

        if (!file_exists($foldername)) {
            mkdir($foldername, 0777, true);
        }
        return $foldername;
    }
}
