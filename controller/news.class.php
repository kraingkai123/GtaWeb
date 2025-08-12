<?php

class news
{
    public function __construct()
    {
        global $conn;
    }
    public static function listNews()
    {
        $response = db::db_query("SELECT * FROM news ORDER BY news_id DESC");
        return $response;
    }
     public static function getDataNews($newId)
    {
        $response = db::db_getfirst("SELECT * FROM news WHERE news_id ='".$newId."'ORDER BY news_id DESC");
        return $response;
    }
}
