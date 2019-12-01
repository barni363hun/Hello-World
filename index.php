<?php
require_once 'connect.php';
$_SESSION['hely'] = "Location: index.php";
if ($_SESSION['mostregisztralt']) {

  $cim = "GRATULÁLOK!";
  $magassag = "100";
  $szelesseg = "200";
  $szoveg = "Sikeres regisztráció";



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
  $_SESSION['mostregisztralt'] = false;
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
      <h1>princzes.tk</h1>
      <marquee scrollamount="15">
        <img src="pictures/39warni.ico" title="warning" alt="warning">
        A weblap ideiglenesen fejlesztés alatt áll
        <img src="pictures/39warni.ico" title="warning" alt="warning">
      </marquee>
    </div>
  </section>
  <!--https://support.google.com/youtube/answer/171780?hl=hu youtube playlist-->
  <?php
  require_once "secondbase.html";
  ?>