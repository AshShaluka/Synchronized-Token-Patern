<?php

header("Content_type: application/json");

session_start();

$csrfTokenArray = array();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_COOKIE["PHPSESSID"])) {
    $csrfTokenArray = $_SESSION['csrfTokenArray'];

    $returnObj = new \stdClass();
    $returnObj->status = 200;
    $returnObj->status_message = 'Token Dispatched.';
    $returnObj->csrfToken = $csrfTokenArray[$_COOKIE["PHPSESSID"]];
    $returnJSON = json_encode($returnObj);
    
    echo $returnJSON;
}
?>