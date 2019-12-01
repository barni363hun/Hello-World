<?php
require_once 'connect.php';
$_SESSION['hely'] = "Location: registry.php";
$sikertelen = false;
if (isset($_POST['submit'])) {
    if (isset($_POST['username'], $_POST['email'], $_POST['password']) && !empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password'])) {
        $beforeusername = $_POST['username'];
        $beforepassw = $_POST['password'];
        $beforeemail = $_POST['email'];
        $username = htmlspecialchars(htmlentities($db->real_escape_string(trim($_POST['username']))));
        $password = password_hash(htmlspecialchars(htmlentities($db->real_escape_string(trim($_POST['password'])))), PASSWORD_BCRYPT);
        $email = htmlspecialchars(htmlentities($db->real_escape_string(trim($_POST['email']))));

        $nametable = $db->query("SELECT `username` FROM `users`")->fetch_all();
        $pwtable = $db->query("SELECT `password` FROM `users`")->fetch_all();
        $vanienfelhnev = false;
        foreach ($nametable as $row) {
            foreach ($row as $item) {
                if ($username == $item) {
                    $vanienfelhnev = true;
                }
            }
        }
        if ($vanienfelhnev) {
            $sikertelen = true;
        } else {
            $db->query("
            INSERT INTO `users` (`id`,`username`,`e-mail`,`time_of_registry`,`password`) 
            VALUES (null,'{$username}','{$email}',NOW(),'{$password}')
            ");

            mkdir("users/{$username}");

            if (isset($_POST['stayloggedin']) && !empty($_POST['stayloggedin'])) {
                $_SESSION['loggedin'] = true;
                $_SESSION['jofelhasznalo'] = $username;
            }
            $_SESSION['mostregisztralt'] = true;
            header("Location: index.php");
        }
    }
}

if ($sikertelen) {
    $cim = "Hiba";
    $szoveg = "Ez a felhasználónév már regisztrálva van!";
    $szelesseg = "300";
    $magassag = "100";


    echo "
<link rel='stylesheet' href='pupu.css'>
<div id='popup' class='popup-wrapper hide'>
    <div class='popup-content'>
        <div class='popup-title'>
            <button type='button' class='popup-close'>&times;</button>
            <h3>$cim</h3>
        </div>
        <div class='popup-body'>
            <p>$szoveg</p>
        </div>
    </div>
</div>
<script src='simple-popup.js'></script>
";

    echo "
<script>
var popupEl = document.getElementById('popup');
var popup = new Popup(popupEl, {width: $szelesseg,height: $magassag});
popup.open();
</script>";
}

/*                       felhasználók adatainak kiírása
                    if ($result = $db->query("SELECT * FROM `users`")) {
                        if ($result->num_rows) {
                            $table = $result->fetch_all(MYSQLI_NUM);
                            echo '<table border="1">';
                            foreach ($table as $row) {

                                echo ("<tr>");

                                foreach ($row as $record) {
                                    echo '<td>' . $record . '</td>';
                                }
                                echo ("</tr>");
                            }
                        } else {
                            echo '<p>Nincs megjeleníthető adat"</p>';
                        }
                        echo '</table>';
                        $result->free();
                    }
                    */ ?>




<article>

    <div class="background-top background">
        <div class="entry-container">
            <div class="entry-wrapper">

                <span class="entry-text">
                    <?php

                    if ($_SESSION['loggedin']) {
                        echo "Bejelentkezve mint: ";
                        echo htmlspecialchars_decode(html_entity_decode($_SESSION['jofelhasznalo']));
                    } else {
                        echo "Üdvözöllek a weboldalamon!";
                    }

                    ?>
                </span>

            </div>
        </div>
    </div>


    <section class="mid-container">
        <div class="mid-wrapper">
            <div class="pehape">
                <h2>Regisztráció:</h2>
                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                    <table>
                        <tr>
                            <td>Felhasználónév:</td>
                            <td><input type="text" name="username"></td>
                        </tr>
                        <tr>
                            <td>Jelszó:</td>
                            <td><input type="password" name="password"></td>
                        </tr>
                        <tr>
                            <td>e-mail:</td>
                            <td><input type="email" name="email"></td>
                        </tr>
                        <tr>
                            <td>Maradjak bejelentkezve: </td>
                            <td><input type="checkbox" name="stayloggedin" id="stayloggedin"> <input id="jobbra" type="submit" name="submit" value="Regisztráció!"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </section>
    <?php
    require_once 'secondbase.html';
    $db->close();
    ?>