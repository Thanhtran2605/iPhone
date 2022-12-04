<?php

require_once ("config.php");

function connectionDB ($sql) {
    $connect = new mysqli(HOST, USERNAME, PASSWORD, DATABASE);
    $connect -> set_charset('utf8');

    $connect -> query($sql);
    $connect -> close();

}

function getRow ($sql) {
    $connect = new mysqli(HOST, USERNAME, PASSWORD, DATABASE);
    $connect -> set_charset('utf8');

    $result = $connect -> query($sql);

    $data = array();

    while (($row = $result -> fetch_array()) != null) {
        array_push($data, $row);
    }

    return $data;
}

?>
