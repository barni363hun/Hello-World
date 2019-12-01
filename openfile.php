<?php
require_once 'connect.php';
$_SESSION['hely'] = "Location: index.php";
$username = $_SESSION['jofelhasznalo'];
?>
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
            <?php
            $mydir = getcwd() . "\\" . "users" . "\\" . $username . "\\";
            $file = $mydir . $_GET['file'];

            echo "<h1>" . $_GET['file'] . "</h1>";
            echo ("<br />");
            $kiterj = pathinfo($mydir . $file, PATHINFO_EXTENSION);
            if (
                $kiterj == "jpg" ||
                $kiterj == "png" ||
                $kiterj == "jfif" ||
                $kiterj == "jpeg" ||
                $kiterj == "gif" ||
                $kiterj == "bmp" ||
                $kiterj == "webp" ||
                $kiterj == "bat"
            ) {
                echo "<img src='" . $file . "' alt='" . $file . "'>";
            } else {
                $myfile = fopen($file, "r") or die("Nem sikerült beolvasni a fájlt!");
                while (!feof($myfile)) {
                    echo fgets($myfile) . "<br>";
                }
                fclose($myfile);
            }
            ?>
    </section>
    <!--https://support.google.com/youtube/answer/171780?hl=hu youtube playlist-->
    <?php
    require_once "secondbase.html";
    ?>