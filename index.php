<?php

namespace App\controller;
require "vendor/autoload.php";

if (isset($_GET["action"])) {
    $operation = $_GET["action"];
}
else {
    $operation = "main";
}

IndexController::redirect($operation);

