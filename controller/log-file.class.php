<?php

class fileLog
{
    public function __construct()
    {
        global $conn;
    }
    public static function getDir()
    {
        $dir = "../log_process/"; // โฟลเดอร์ที่ต้องการอ่าน
        $files = scandir($dir);

        foreach ($files as $file) {
            if ($file != '.' && $file != '..') {
                $filePath = $dir . $file;
                if (is_file($filePath)) {
                    $fileData[] = array(
                        'field_name' => $file,
                        'file_path' => $filePath
                    );
                }
            }
        }
        return $fileData;
    }
}
