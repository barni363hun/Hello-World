<?php
require_once 'connect.php';
if ($_SESSION['loggedin'] == false) {
    header("Location: fo.php");
    die();
}


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
            <h1>Fájl feltöltés</h1>
            <?php


            if (isset($_POST['submit'])) {
                if ($_FILES['file']['error'] == 0) {

                    $username = $_SESSION['jofelhasznalo'];
                    $meret = folderSize($username);
                    if ($meret <= 1000000000) {
                        $target_dir = getcwd() . "\\" . "users" . "\\" . $username . "\\";
                        $target_file = $target_dir . $_FILES['file']['name'];
                        $mindenok = true;
                        if (file_exists($target_file)) {
                            echo "A fájl már létezik.";
                            $mindenok = false;
                        }
                        if ($_FILES['file']['size'] >= 500000000) {
                            echo "A fájl mérete túl nagy.";
                            $mindenok = false;
                        }
                        if ($mindenok == false) {
                            echo ("<br />");
                            echo "Nem sikerült a feltöltés.";
                        } else {
                            if (move_uploaded_file($_FILES['file']['tmp_name'], $target_file)) {
                                echo basename($_FILES["file"]["name"]) . " fel lett töltve";
                            } else {
                                echo "Bocsánat, probléma adódott a fájl feltöltése közben!";
                            }
                        }
                    }
                } else {
                    echo "Nincs fájl kiválasztva!";
                }
            }
            ?>
            <form name="form" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">
                <input type="file" name="file">
                <button type="submit" name="submit">Feltöltés</button>
            </form>
    </section>
    <!--https://support.google.com/youtube/answer/171780?hl=hu youtube playlist-->
    <?php
    require_once "secondbase.html";
    ?>