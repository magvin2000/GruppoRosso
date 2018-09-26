<?php
    try{
    $hostname="192.168.245.16";
    $user="root";
    $pass="";
    $dbname="mediaworld_gruppo_rosso";
    $db = new PDO ("mysql:host=$hostname;dbname=$dbname", $user, $pass, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
    }
    catch (PDOException $e) 
    {
        echo "Errore: " . $e->getMessage();
        die();
    }
?>