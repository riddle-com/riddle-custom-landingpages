<?php

/**
 * Custom landing page for showing in iframe
 * 
 * - loaded in iframe
 * - gets riddle data from post data
 * - builds the landing page
 * 
 */

if (!isset($_POST['data'])) {
    echo "No riddle data passed :-(";
    exit;
}

$riddle = json_decode($_POST['data']);

?><html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Custom Landingpage</title>
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">
        <link rel="icon" type="image/png" href="assets/img/favicon.png">
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>     
	<?php include '_content-default.php'; ?>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
    </body>
</html>
