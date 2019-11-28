<?php
require_once 'connect.php';
if ($result = $db->query("SELECT * FROM `users`")) {
    $table = $result->fetch_all(MYSQLI_ASSOC);
    echo $table[0]['id'];
}

//if (isset($_POST['stayloggedin']) && !empty($_POST['stayloggedin'])) {
$_SESSION['login'] = $table[0]['id'];
echo $_SESSION['login'];
//}
$db->close();
