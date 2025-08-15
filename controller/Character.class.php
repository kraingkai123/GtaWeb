<?php

class Character
{
    public function __construct()
    {
        global $conn;
    }
    public static function listChacter()
    {
        $response = db::db_query("SELECT * FROM playeraccounts ORDER BY playerID DESC");
        return $response;
    }
    public static function updateStatus($playerId, $status)
    {
        if ($status == '1') {
            $status = '0';
        } else {
            $status = '1';
        }

        $fields = array(
            'playerBanned' => $status
        );
        $cond = array(
            'playerID' => $playerId
        );
        $response = db::db_update("playeraccounts", $fields, $cond);
        return $response;
    }
    public static function getCharacterById($playerId)
    {
        $query = "SELECT * FROM playeraccounts WHERE playerID = '$playerId'";
        $response = db::db_query($query);
        return $response ? $response[0] : null;
    }
    public static function updateCharacterData($charId, $data)
    {
        $fields = array(
            'playerName' => $data['playerName'],
        );
        for ($i = 0; $i <= 12; $i++) {
            if (isset($data['playerWeapon' . $i])) {
                $fields['playerWeapon' . $i] = $data['playerWeapon' . $i];
            }
        }
         for ($i = 0; $i <= 12; $i++) {
            if (isset($data['playerAmmo' . $i])) {
                $fields['playerAmmo' . $i] = $data['playerAmmo' . $i];
            }
        }
        $cond = array(
            'playerID' => $charId
        );
        return db::db_update("playeraccounts", $fields, $cond);
    }
}
