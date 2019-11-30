<?php
require_once 'connect.php';


echo "<pre>";
print_r($maps = scandir(getcwd() . "\\" . "users" . "\\"));
$users = array();
foreach ($db->query("SELECT `username` FROM `users` ")->fetch_all() as $sor) {
    foreach ($sor as $item) {
        array_push($users, $item);
    }
}
print_r($users);
echo ("<br />");

foreach ($maps as $mappaindex => $mappa) {
    $torolni = true;
    foreach ($users as $userindex => $letezouser) {

        if ($mappa == $letezouser) {
            $torolni = false;
        }
    }
    if ($mappa == "." || $mappa == "..") {
        $torolni = false;
    }
    if ($torolni) {
        rmdir((getcwd() . "\\" . "users" . "\\" . $mappa));
    }
}


header($_SESSION['hely']);
