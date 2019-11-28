<?php
require_once 'connect.php';
$_SESSION['hely'] = "Location: login.php";
$bejelentkezesmegprobalva = 0;
if (isset($_POST['submit'])) {
    if (isset($_POST['username'], $_POST['password']) && !empty($_POST['username']) && !empty($_POST['password'])) {
        $username = htmlspecialchars(htmlentities($db->real_escape_string(trim($_POST['username']))));
        $password = htmlspecialchars(htmlentities($db->real_escape_string(trim($_POST['password']))));

        $nametable = $db->query("SELECT `username` FROM `users`")->fetch_all();
        $vanienfelhnev = false;
        foreach ($nametable as $row) {
            foreach ($row as $item) {
                if ($username == $item) {
                    $vanienfelhnev = true;
                }
            }
        }
        if ($vanienfelhnev == false) {
            $bejelentkezesmegprobalva = 1;
        } else {
            if (password_verify($password, $db->query("SELECT `password` FROM `users` WHERE `username` = '{$username}'")->fetch_all()[0][0])) {
                $_SESSION['jofelhasznalo'] = $username;
                $_SESSION['loggedin'] = true;
                header("Location: login.php");
            } else {
                $bejelentkezesmegprobalva = 2;
            }
        }


        /*
        if ($result = $db->query("
        SELECT `id` FROM `users` WHERE `username` = '{$username}' AND `password` = '{$password}'
        ")) {
            $table = $result->fetch_all(MYSQLI_ASSOC);
            $_SESSION['jofelhasznalo'] = $table[0]['id'];
            if (isset($_SESSION['jofelhasznalo'])) {
                $_SESSION['login'] = $table[0]['id'];
            }
            $bejelentkezesmegprobalva = 1;
        }
        */
    }
}



/*
$db->query("SELECT `password` FROM `users` WHERE `username` = '{$username}'")->fetch_all()[0][0])) {
if ($result = $db->query("
        SELECT * FROM `users` WHERE 1
        ")) {
    $table = $result->fetch_all(MYSQLI_ASSOC);
    $table[0]['id'];
}






                       felhasználók adatainak kiírása
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
                    */
?>


<article>
    <div class="background-top background">
        <div class="entry-container">
            <div class="entry-wrapper">
                <span class="entry-text">
                    <?php
                    if (isset($_SESSION['loggedin'])) {
                        echo "Bejelentkezve mint: ";
                        echo htmlspecialchars_decode(html_entity_decode($_SESSION['jofelhasznalo']));
                    } else {
                        if ($bejelentkezesmegprobalva == 1) {
                            echo "Rossz felhasználónév";
                        } elseif ($bejelentkezesmegprobalva == 2) {
                            echo "Rossz jelszó";
                        } else {
                            echo "Kérem jelentkezzen be!";
                        }
                    }
                    ?>
                </span>
            </div>
        </div>
    </div>


    <section class="mid-container">
        <div class="mid-wrapper">
            <div class="pehape">
                <p>Ha nincs felhasználói fiókod akkor <i><a href="registry.php">itt</a></i> tudsz csinálni egyet!</p>
                <h2>Bejelentkezés:</h2>
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
                            <td></td>
                            <td><input type="submit" name="submit" value="Bejelentkezés!"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                        </tr>
                    </table>
                </form>
            </div>





            <?php
            require_once 'secondbase.html';
            $db->close();
            ?>