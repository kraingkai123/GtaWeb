<?php
$arrayDetail = [
    1 => [
        "groupName" => "พื้นสนาม",
        "data" => array(
            1 => "หญ้าแท้",
            2 => "หน้าเทียม",
        ),
    ],
    2 => [
        "groupName" => "พื้นที่ด้านบน",
        "data" => array(
            3 => "หลังคาเปิด",
            4 => "หลังคาปิด",
        ),
    ],
    3 => [
        "groupName" => "พื้นที่โดยรอบ",
        "data" => array(
            5 => "อัฒจันทร์",
            6 => "ไม่มีอัฒจันทร์",
        ),
    ],
];
function print_pre($data)
{
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}

function db2Date($date)
{;
    $exDate = explode("-", $date);
    return $exDate[2] . "/" . $exDate[1] . "/" . ($exDate[0] + 543);
}
function date2db($date)
{
    $exDate = explode("/", $date);
    return ($exDate[2] - 543) . "-" . $exDate[1] . "-" . $exDate[0];
}
function convDateThai($date)
{
    $exDate = explode("-", $date);
    $thaiMonths = [
        1 => "มกราคม",
        2 => "กุมภาพันธ์",
        3 => "มีนาคม",
        4 => "เมษายน",
        5 => "พฤษภาคม",
        6 => "มิถุนายน",
        7 => "กรกฎาคม",
        8 => "สิงหาคม",
        9 => "กันยายน",
        10 => "ตุลาคม",
        11 => "พฤศจิกายน",
        12 => "ธันวาคม"
    ];
    return $exDate[2] . " เดือน " . $thaiMonths[intval($exDate[1])] . " พ.ศ. " . ($exDate[0] + 543);
}
function getMenuName($menuId)
{
    $response = db::db_getDataFields("select menu_name FROM menu WHERE menu_id='" . $menuId . "'", "menu_name");
    return $response;
}
