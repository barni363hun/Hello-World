<?php
require_once 'connect.php';
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
            <h1>FUCK OFF</h1>
            <marquee scrollamount="15">
                <img src="pictures/39warni.ico" title="warning" alt="warning">
                Kifejezetten nem kéne itt lenned
                <img src="pictures/39warni.ico" title="warning" alt="warning">
            </marquee>
        </div>
    </section>
    <!--https://support.google.com/youtube/answer/171780?hl=hu youtube playlist-->
    <?php
    require_once "secondbase.html";
    ?>