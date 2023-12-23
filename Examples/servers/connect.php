<?php

try {
    $dbh = new PDO('mysql:host=localhost;dbname=scott', "scott", "temporary");
} catch (Exception $e) {
    die('Could not connect to DB: ' . $e->getMessage());
}


