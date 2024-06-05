<?php
// $username = 'budak';
// $password = 'korporat123';
// $database = 'aplikasi_survey_polinema';
// try {
//     $db = new mysqli(getenv('DATABASE_HOST') != null ? getenv('DATABASE_HOST') : 'muddy-wave-72367.pktriot.net:22189', $username, $password, $database);
//     //$db = new mysqli('172.29.145.89', $username, $password, $database);
//     if ($db->connect_error) {
//         die('Connection failed: ' . $db->connect_error);
//     }
// } catch (Exception $e) {
//     die($e->getMessage());
// }

$username = 'root';
$password = 'Zanuaraldi0101';
$database = 'projek_dewe';
try {
<<<<<<< HEAD
    $db = new mysqli('localhost', $username, $password, $database);
    //$db = new mysqli('172.29.145.89', $username, $password, $database);
=======
    $db = new mysqli(getenv('DATABASE_HOST') != null ? getenv('DATABASE_HOST') : 'muddy-wave-72367.pktriot.net:22189', $username, $password, $database);
>>>>>>> 25aa251a28849606c1fc80e60958e8cf7d07bed9
    if ($db->connect_error) {
        die('Connection failed: ' . $db->connect_error);
    }
} catch (Exception $e) {
    die($e->getMessage());
}