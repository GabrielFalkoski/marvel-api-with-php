<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no">
	
	<title>Marvel API Playing</title>

	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700&display=swap" rel="stylesheet">

	<link rel="icon" href="assets/images/favicon.ico" />
	
	<?php 
	if(isset($_SERVER['HTTPS'])){
        $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
    } else {
        $protocol = 'http';
    }
    ?>
	<script>
		var App = {
			baseUrl: "<?php echo $protocol . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>",
			modules: {},
			pages: {}
		};
	</script>
</head>

<body class="home">
	<header id="header">

	</header>

	<main id="main" class="wrap">