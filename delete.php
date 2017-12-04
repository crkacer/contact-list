<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include('functions.php');
$data = readRecords();
if (isset($_GET['id'])) {
    // Find the index of that contact in array
    $k = -1;
    for ($i = 0; $i < count($data); $i++) {
        if (isset($data[$i])) {
            if (intval($data[$i]['id']) == intval($_GET['id'])) {
                $k = $i;
            }
        }
    }
    if ($k != -1) {
        $result = deleteRecords(['position' => $k]);

    }


    header('Location: index.php');
}

?>