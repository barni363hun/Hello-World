<?php
error_reporting(0);
$db = new mysqli('127.0.0.1', 'root', '', 'website');
if ($db->connect_errno) {
    echo $db->connect_error;
    die();
}
session_start();
if ($_SESSION['loggedin']) {
    require_once 'firstbaseloggedin.html';
} else {
    require_once 'firstbase.html';
}
