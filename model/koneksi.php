<?php
$username = 'budak';
$password = 'korporat123';
$database = 'aplikasi_survey_polinema';
try {
    // $db = new mysqli('serveo.net:41379', $username, $password, $database);
    $db = new mysqli('muddy-wave-72367.pktriot.net:22189', $username, $password, $database);
    if ($db->connect_error) {
        die('Connection failed: ' . $db->connect_error);
    }
} catch (Exception $e) {
    die($e->getMessage());
}
