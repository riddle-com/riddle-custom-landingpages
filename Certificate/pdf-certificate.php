<?php

session_start(); // START SESSION TO KEEP THE RESULT SAFE
define("ROOT", dirname(__FILE__));

ini_set("display_errors", 1);
if (!isset($_SESSION["score"])) {
    die("BAD REQUEST! SCORE IS MISSING.");
}

$score = $_SESSION["score"];
$absScore = $_SESSION["absScore"];
$scoreString = "$score out of $absScore";

require_once("src/classes/autoload.php");  // LOAD ALL CLASSES
require 'vendor/autoload.php';

$json = isset($_POST["components"]) ? $_POST["components"] : "";

if ($json == "") {
    die("BAD REQUEST!");
}

$cert = new Certificate();

$cert->usePDFFile(PDF_FILE); // Import PDF-File ( File is defined in the config! )

// You can also change the font in the config.
$cert->pdf-> addFont(DEFAULT_FONT); // Add font
$cert->      setFont(DEFAULT_FONT); // Use font

$components = json_decode($json, true);
$verified = false;

foreach ($components as $compArray) {
    $comp = $compArray[0];
    $center = isset($compArray[1]);

    if ($comp["string"] == "$score out of $absScore") {
        $verified = true;
    }

    $component = new CertificateComponent($comp["string"], $comp["x"], $comp["y"], $comp["fontsize"]);
    $component->setColor($comp["r"], $comp["g"], $comp["b"]);
    $component->setOffsetX($comp["offsetX"]);
    $cert->addComponent($component, $center);
}

if (!$verified) {
    die("It seems like you tried to change the test results. Please try again.");
}



$cert->drawComponents();

$cert->pdf->output(); // Print it out!
