<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<title>Marvel API Playing</title>

	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link href='https://fonts.googleapis.com/css?family=Lato:400,400italic,700' rel='stylesheet' type='text/css'>

	<link rel="icon" href="assets/images/favicon.ico" />

	<script>
		var App = {
			modules: {},
			pages: {},
			templates: {
				characterMarkup: '<article id="movie-${show_id}" data-name="${show_title}" data-year="${release_year}" data-duration="${runtime.replace("min", "")}" data-rating="${rating}" class="mix movie">' +
					'<section class="movie-content">' + 
						'<h2 class="movie-title">${show_title}</h2>' +
						'<div class="movie-info">' +
							'<span>${release_year} - ${runtime} -- Director: ${director}</span>' +
						'</div>' +
						'<section class="movie-summary">' +
							'<h3 class="movie-subtitle">Summary:</h3>' +
							'<p>${summary}</p>' +
						'</section>' +
						'<section class="movie-cast">' +
							'<h3 class="movie-subtitle"><i>Cast:</i></h3>' +
							'<p><i>${show_cast}</i></p>' +
						'</section>' +
						'<aside class="movie-rating">' +
							'<p>Rating:</p>' +
							'<div class="rating-value"><span>${rating}</span></div>' +
						'</aside>' +
					'</section>' +
				'</article>'
			}
		};
	</script>
</head>

<body class="home">
	<header id="header">

	</header>

	<main id="main" class="wrap">