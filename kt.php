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
            echo "<h1>" . htmlspecialchars_decode(html_entity_decode($_SESSION['jofelhasznalo'])) . " könyvtára</h1>";

            $mydir = getcwd() . "\\" . "users" . "\\" . $username . "\\";
            $files = scandir($mydir);
            $onlyfiles = array();
            foreach ($files as $key => $value) {
                if ($value != ".." and $value != ".") {
                    array_push($onlyfiles, $value);
                }
            }
            foreach ($onlyfiles as $key => $value) {
                echo "";
                echo "
                <form name='form' method='post' action='/website/deletefile.php' enctype='multipart/form-data'>
                <a href='openfile.php?file=" . $value . "'>" . $value . "</a>
                <input type='hidden' name='torlendo' value='" . $mydir . $value . "' />
                <button type='submit' name='submit'>Törlés</button>
                </form>
                ";
                echo ("<br />");
            }
            ?>
        </div>
    </section>
    <!--https://support.google.com/youtube/answer/171780?hl=hu youtube playlist-->
    <?php
    require_once "secondbase.html";
    ?>