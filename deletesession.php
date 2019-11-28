<?php
session_start();
$asd = $_SESSION['hely'];
session_destroy();
header($asd);
