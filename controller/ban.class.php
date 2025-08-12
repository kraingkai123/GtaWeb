<?php

class Ban
{
    public function __construct()
    {
        global $conn;
    }
    public static function listBan()
    {
        $response = db::db_query("SELECT * FROM bans ORDER BY banID DESC");
        return $response;
    }
}
