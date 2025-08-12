<?php

class Download
{
    public function __construct()
    {
        global $conn;
    }
    public static function listDownload()
    {
        $response = db::db_query("SELECT * FROM download ORDER BY download_id DESC");
        return $response;
    }
     public static function getDataDownload($downloadId)
    {
        $response = db::db_getfirst("SELECT * FROM download WHERE download_id ='".$downloadId."'");
        return $response;
    }
}
