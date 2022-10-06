<?php
    date_default_timezone_set('Asia/Jakarta');

    if(!isset($_SESSION))
    {
        
        session_start();
    }
    $mysqli = new mysqli("localhost","root","","siswa_rpl");
    if ($mysqli -> connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
        exit();
    }
?>