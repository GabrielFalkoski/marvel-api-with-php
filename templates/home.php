<?php 
global $page;
$page = basename(__FILE__, '.php');

require_once './includes/MarvelApi/MarvelApi.php';

$marvelApi = new MarvelApi();
$characters = file_get_contents('./includes/MarvelApi/returnexample.json');
// $characters = $marvelApi->getCharacters());
?>
<section class="marvel_characters">
	<header class="marvel_characters__search">
		<form id="marvel-characters-search" action="">
			<input type="text" placeholder="Type a Marvel character name" class="text" id="s">
			<div class="marvel_characters__order api_order">
				<span>Order by:</span>
				<input id="s-name" data-sort="name:asc" class="sort" type="radio" name="sort" checked="">
				<label for="s-name">Name</label>
				<input id="s-modified" data-sort="modified:desc" class="sort" type="radio" name="sort">
				<label for="s-modified">Modified Date</label>
			</div>
		</form>
	</header>
	
	<article class="marvel_characters__content api_content">
		
	</article>
</section>

<a class="show_more" href="#">Show more</a>