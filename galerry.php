<?php
require_once 'connect.php';
if ($_SESSION['loggedin'] = false) {
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
                        echo $_SESSION['jofelhasznalo'];
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
            <h1>Galéria</h1>
            <marquee scrollamount="15">
                <img src="pictures/39warni.ico" title="warning" alt="warning">
                shitti things
                <img src="pictures/39warni.ico" title="warning" alt="warning">
            </marquee>
    </section>
    <!--https://support.google.com/youtube/answer/171780?hl=hu youtube playlist-->
    <?php
    require_once "secondbase.html";
    ?>