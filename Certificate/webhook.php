<?php

require __DIR__ . '/vendor/autoload.php';

define ('PERCENT_TO_PASS',60);
define ('DATE_FORMAT', "d.m.Y");
ini_set('display_errors', 1);
$input = $_POST['data'] ?? null; // Getting your data from Riddle!
#$input = '{"riddle":{"id":304917,"title":"Zertifikat Demo","type":"quiz"},"lead2":{"FIRST_NAME":{"value":"Philipp","type":"text"},"LAST_NAME":{"value":"M","type":"text"},"LOCALITY":{"value":"SB","type":"text"}},"answers":[{"question":"Frage 1","answer":"Richtig","correct":true,"questionId":1,"answerId":1},{"question":"Frage 2","answer":"Richtig","correct":true,"questionId":2,"answerId":1},{"question":"Frage 3","answer":"Richtig","correct":true,"questionId":3,"answerId":1}],"result":3,"resultData":{"scoreNumber":3,"resultIndex":3,"scorePercentage":100,"scoreText":"Your score: 3/3","title":"","resultId":2},"embed":{"parentLocation":"https://www.riddle.com/showcase/304917/quiz"},"timeTaken":7427}';
$riddleData = json_decode($input, true);

$title = $riddleData["riddle"]["title"];
$firstName = $riddleData["lead2"]["FIRST_NAME"]["value"];
$lastName = $riddleData["lead2"]["LAST_NAME"]["value"];
#$locality = $riddleData["lead2"]["LOCALITY"]["value"];
$scoreNumber = $riddleData["resultData"]["scoreNumber"];
$scorePercentage = $riddleData["resultData"]["scorePercentage"];
$time = $riddleData["timeTaken"];



$date = date(DATE_FORMAT);
$totalSeconds = $time / 1000;
$hours = floor($totalSeconds / 60 / 60);
$minutes = floor($totalSeconds / 60 - $hours * 60);
$seconds = floor($totalSeconds - $minutes * 60);

$stringHours = str_pad($hours, 2, '0', STR_PAD_LEFT);
$stringMinutes = str_pad($minutes, 2, '0', STR_PAD_LEFT);
$stringSeconds = str_pad($seconds, 2, '0', STR_PAD_LEFT);
$stringTime = $stringHours . ':' . $stringMinutes . ':' . $stringSeconds;

// this data will be passed to the template - extend it with LastName, ...
$data = [
    'name'              =>  $firstName . ' ' . $lastName,
    'zertifikat'        =>  $title,
    #'locality'          =>  $locality,
    'scoreMax'          => ($scoreNumber/$scorePercentage*100),
    'time'              =>  $stringTime,
    'scoreNumber'       =>  $scoreNumber,
    'date'              =>  $date,
    'logo'              =>  'https://quizu.org/blog/wp-content/uploads/2015/06/Riddle-logo-press-ready.png',
    #'logo'             =>  'https://www.googlewatchblog.de/wp-content/uploads/google-logo-perfekt.jpg',
];


if(PERCENT_TO_PASS >= $scorePercentage){
    $html = getContents('html-template-FAILED', $data);
    
}else{
    $html = getContents('html-template-SUCCESS', $data);    
}

$stylesheet = file_get_contents('style.css');

updateCSV($data);

$defaultConfig = (new Mpdf\Config\ConfigVariables())->getDefaults();
$fontDirs = $defaultConfig['fontDir'];

$defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
$fontData = $defaultFontConfig['fontdata'];

// Create an instance of the class:
$mpdf = new \Mpdf\Mpdf([
    'tempDir' => __DIR__ .'/tmp',
    'fontDir' => array_merge($fontDirs, [
        __DIR__ . '/fonts',
    ]),
    'fontdata' => $fontData + [
        'montserrat' => [
            'R' => 'Montserrat-Regular.ttf',
            'B' => 'Montserrat-Bold.ttf',
        ]
    ],
    'default_font' => 'montserrat',
]);



$mpdf->WriteHTML($stylesheet, \Mpdf\HTMLParserMode::HEADER_CSS);
$mpdf->WriteHTML($html);

// Output a PDF file directly to the browser
$mpdf->Output();

/**
 * Gets the contents of a template inside templates/
 * 
 * @param string $template pass the template name here. e.g templates/test-template.php => test-template
 * @param array $data the data you want to pass to the view (e.g. $data = ['hello' => 'world']), in the view $data['hello]
 * 
 * @return mixed the contents of the HTML file
 */
function getContents($template,$data = [])
{
    $templatePath = 'templates/'.$template.'.php'; // build the template path

    // @todo add check if template/file exists, if not throw error

    ob_start(); // start buffer

    require $templatePath; // "call" the PHP file / open it

    return ob_get_clean(); // get all contents of buffer
}


function loadCSV()
{   
    $rows = [];

   
    if (($handle = fopen("file.csv", "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            $rows[] = $data;
            

        }
        fclose($handle);
 
    }return $rows;
}

function updateCSV($data)
{

    $file = fopen("file.csv","w");
    $CSV = loadCSV();
    var_dump($CSV);
    //die ("fail");
    $CSV[] = $data;
    foreach($CSV as $line){

        fputcsv($file, $line);
    }
    
    fclose($file);

}



