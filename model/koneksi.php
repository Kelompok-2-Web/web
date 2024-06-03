<?php
// $username = 'budak';
// $password = 'korporat123';
// $database = 'aplikasi_survey_polinema';
// try {
//     $db = new mysqli(getenv('DATABASE_HOST') != null ? getenv('DATABASE_HOST') : 'muddy-wave-72367.pktriot.net:22189', $username, $password, $database);
//     // $db = new mysqli('172.29.145.89', $username, $password, $database);
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
    $db = new mysqli('localhost', $username, $password, $database);
    // $db = new mysqli('172.29.145.89', $username, $password, $database);
    if ($db->connect_error) {
        die('Connection failed: ' . $db->connect_error);
    }
} catch (Exception $e) {
    die($e->getMessage());
}