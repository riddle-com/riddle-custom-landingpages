<?php

/*

    Diese Klasse sorgt automatisch dafür, dass alle Models eingebunden werden und erspart so einiges an Arbeit.
    Diese Datei wird in der init.php aufgerufen.
*/

checkDir(dirname(__FILE__));

function checkDir($path)
{
    $sub_files = scandir($path);
    foreach ($sub_files as $sub_file) {
        if ($sub_file == "." || $sub_file == ".." || $sub_file == "autoload.php" || $sub_file == ".DS_Store") {
            continue;
        }
        
        if (isDirectory($sub_file)) {
            checkDir("$path/$sub_file");
        } else {
            $sub_path = $path . "/$sub_file";
            require_once($sub_path);
        }
    }
}

function isDirectory($file)
{ // Da die Standard PHP-Funktion komischerweise nicht funktioniert.
    $end = substr($file, strlen($file) - 3, 4);
    if ($end != "php" && $end != "xml") {
        return true;
    }
    return false;
}
