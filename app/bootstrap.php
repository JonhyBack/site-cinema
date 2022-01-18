<?php
$files_core = glob(__DIR__ . '/core/*.php');
foreach ($files_core as $file) {
    require_once $file;
    echo $file;
}

session_start();
Route::run();
