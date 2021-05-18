<?php
   
    error_reporting(-1);
    ini_set('display_errors', 'On');


    $data = [
        'name'              #=>  $firstName . ' ' . $lastName,

    ];

    $uList = "This was the participant of the Quiz: <br>";
    $uList .= "<ul>";
    foreach($data as $data){

        $uList .= "<li>$data</li>";
    }

    $uList .= "</ul>";

    echo $uList

?>