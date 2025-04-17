<?php
function connection(){
    try {
        return new PDO("mysql:host=localhost;dbname=artbox", "root", "");
    } catch (Exception $error) {
        die('Erreur : ' . $error->getMessage());
    }
}
