<?php

/**
 * Custom landing page for showing in window (not in iframe)
 * 
 * - loaded in iframe
 * - writes riddle post data into session
 * - redirects browser to self page
 * - gets riddle data from session
 * - builds the landing page
 * 
 */

session_start();

// If post data passed, the script works as bridge and reloads browser via JS
$isBridge = isset($_POST['data']);

if ($isBridge) {
    $_SESSION['riddle'] = json_decode($_POST['data']);
} else if (isset($_SESSION['riddle'])) {
    $riddle = $_SESSION['riddle'];
} else {
    echo 'No data passed.';
    exit;
}

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
        <?php if ($isBridge): ?>
        <div class="container text-center">
            <br /><br />Redirecting ...
        </div>
        <?php else: ?>        
	<?php include '_content-default.php'; ?>
        <?php endif; ?>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <?php if ($isBridge): ?>
	<script>
            window.parent.location.href='<?php echo $_SERVER['PHP_SELF']; ?>';
	</script>
        <?php endif; ?>
    </body>
</html>
