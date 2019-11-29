<?php
require_once 'connect.php';
if ($_SESSION['loggedin'] == false) {
    header("Location: fo.php");
    die();
} else {
    $username = $_SESSION['jofelhasznalo'];
    $meret = folderSize($username);

    if ($meret <= 1000000000) {


        if (($_FILES['my_file']['name'] != "")) {  //if filename exist (alma.txt)
            $target_dir = "{$username}/"; // Where the file is going to be stored (/)
            $file = $_FILES['my_file']['name']; //file (alma.txt)
            $path = pathinfo($file); //path of file (website/try/)
            $filename = $path['filename']; // (alma)
            $ext = $path['extension']; //extension (.txt)
            $temp_name = $_FILES['my_file']['tmp_name']; // temporary name
            $path_filename_ext = $target_dir . $filename . "." . $ext; // full filename (/website/try/alma.txt)

            // Check if file already exists
            if (file_exists($path_filename_ext)) {
                echo "Sorry, file already exists.";
            } else {
                move_uploaded_file($temp_name, $path_filename_ext);
                echo "Congratulations! File Uploaded Successfully.";
            }
        } else {
            echo "irjon be egy fájlnevet!";
        }
    }
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
            <h1>Galéria</h1>
            <form name="form" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">
                <input type="file" name="my_file" /><br /><br />
                <input type="submit" name="submit" value="Upload" />
            </form>
    </section>
    <!--https://support.google.com/youtube/answer/171780?hl=hu youtube playlist-->
    <?php
    require_once "secondbase.html";
    ?>