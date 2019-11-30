<?php
echo $torlendo = $_POST['torlendo'];
unlink($torlendo);
header("Location: kt.php");
