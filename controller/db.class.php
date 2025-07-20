<?php

class db
{

    public function __construct()
    {
        global $conn;
    }
    public static function db_query($sql, $show_sql = 'N')
    {
        global $conn;
        $array = array();
        if ($show_sql == 'Y') {
            echo $sql;
        }
        $result = mysqli_query($conn, $sql);
        while ($obj = mysqli_fetch_assoc($result)) {
            $array[] = $obj;
        }
        return $array;
    }
    public static function db_insert($table, $fields)
    {
        global $conn;
        $sql = "";
        $fieldsInsert = "";
        $fieldsData = "";
        foreach ($fields as $key => $value) {
            $fieldsInsert .= $key . ",";
            $fieldsData .= "'" . $value . "'" . ",";
        }
        $fieldsInsert = rtrim($fieldsInsert, ", ");
        $fieldsData = rtrim($fieldsData, ", ");
        $sql = "INSERT INTO $table ($fieldsInsert) VALUES ($fieldsData)";
        if (mysqli_query($conn, $sql) === TRUE) {
            // Get the ID of the last inserted row
            $last_id = self::db_getDataFields("SELECT LAST_INSERT_ID() AS LAST_ID", 'LAST_ID');
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            $last_id = false;
        }
        return $last_id;
    }
    public static function db_update($table, $fields, $cond)
    {
        global $conn;
        $sql = "";
        $fieldsData = "";
        $where = "";
        foreach ($fields as $key => $value) {
            $fieldsData .= $key .= "='" . $value . "'" . ",";
        }
        foreach ($cond as $key => $value) {
            $where .= " AND " . $key .= "='" . $value . "'";
        }
        $fieldsData = rtrim($fieldsData, ", ");
        $where = rtrim($where, ", ");
        $sql = "UPDATE $table SET  $fieldsData WHERE 1=1 $where";

        if (mysqli_query($conn, $sql) === TRUE) {
            return true;
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            return false;
            exit;
        }
    }
    public static function db_delete($table, $cond)
    {
        global $conn;
        $sql = "";
        $where = "";
        foreach ($cond as $key => $value) {
            $where .= " AND " . $key .= "='" . $value . "'";
        }
        $where = rtrim($where, ", ");
        $sql = "DELETE FROM $table WHERE 1=1 $where";
        if (mysqli_query($conn, $sql) === TRUE) {
            return true;
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            return false;
            exit;
        }
    }
    public static function db_getfirst($sql)
    {
        global $conn;
        $array = array();
        $result = mysqli_query($conn, $sql);
        while ($obj = mysqli_fetch_assoc($result)) {
            $array[] = $obj;
        }
        return $array[0];
    }
    public static function db_getDataFields($sql, $target)
    {
        global $conn;
        $result = mysqli_query($conn, $sql);
        $obj = mysqli_fetch_assoc($result);
        return $obj[$target];
    }
    public static function db_numrows($sql)
    {
        global $conn;
        $result = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($result);
        return $count;
    }
}
