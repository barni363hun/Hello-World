 <?php
    require_once "connect.php";
    $_SESSION['hely'] = "Location: radios.php";
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
             <script async src="https://myonlineradio.hu/public/jsv190719054843/jquery.embed-popup-player.js"></script>
             <h1>Rádiók</h1>
             <div id="radios">
                 <a href="https://myonlineradio.hu/retro-radio#server328" title="Retro rádió indítása!">
                     <img class="js-popupPlayer" src="pictures/retro.jpg">
                 </a>

                 <a href="https://myonlineradio.hu/rocker-radio#server535" title="Rocker rádió indítása!">
                     <img class="js-popupPlayer" src="pictures/rocker.png">
                 </a>

                 <a href="https://myonlineradio.hu/jazzy-radio#server19" title="Jazzy rádió indítása!">
                     <img class="js-popupPlayer" src="pictures/jazzy.png">
                 </a>
             </div>
             <!--<div 
        data-my-radio-lang="hu" 
        class="embed-radioplayer js-radioplayerData" 
        data-autoplay="false" 
        data-stream="328" 
        data-name="Retro Rádió" 
        data-logo="png" 
        data-url="retro-radio" 
        data-rid="94">
            <a href="https://myonlineradio.hu/retro-radio" 
            target="_blank">Retro Rádió</a>
        </div>
    <script 
    data-script="jquery.embed-radioplayer.js" 
    async src="https://myonlineradio.hu/public/jsv190719054843/jquery.embed-script-loader.js">
    </script>
        <div 
        data-my-radio-lang="hu" 
        class="embed-radioplayer js-radioplayerData" 
        data-autoplay="false" 
        data-stream="535" 
        data-name="Rocker Rádió" 
        data-logo="png" 
        data-url="rocker-radio" 
        data-rid="118">
            <a 
            href="https://myonlineradio.hu/rocker-radio" 
            target="_blank">Rocker Rádió</a>
        </div>
    <script 
    data-script="jquery.embed-radioplayer.js" 
    async src="https://myonlineradio.hu/public/jsv190719054843/jquery.embed-script-loader.js">
    </script>
        <div 
        data-my-radio-lang="hu" 
        class="embed-radioplayer js-radioplayerData" 
        data-autoplay="false" 
        data-stream="19" 
        data-name="Jazzy Rádió" 
        data-logo="jpg" 
        data-url="jazzy-radio" 
        data-rid="14">
            <a 
            href="https://myonlineradio.hu/jazzy-radio" 
            target="_blank">Jazzy Rádió</a>
        </div>
    <script 
    data-script="jquery.embed-radioplayer.js" 
    async src="https://myonlineradio.hu/public/jsv190719054843/jquery.embed-script-loader.js">
    </script>-->
             <!--https://support.google.com/youtube/answer/171780?hl=hu youtube playlist-->
             <?php
                require_once "secondbase.html";
                ?>