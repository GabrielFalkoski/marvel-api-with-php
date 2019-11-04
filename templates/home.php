<?php 
global $page;
$page = basename(__FILE__, '.php');
?>
<section class="marvel_characters">
	<header class="marvel_characters__search">
		<form id="marvel-characters-search" action="">
			<input type="text" placeholder="Type a Marvel character name" class="marvel_characters__search_name" id="s"><a href="1009368;1009351;1009610" class="marvel_characters__search_favorites" id="s-favorites">To see my favorite characters CLICK HERE!</a>
		</form>
	</header>
	
	<article class="marvel_characters__content">
		<h1 class="marvel_characters__content_title">Marvel Characters</h2>
		
		<article class="api_content">
			
		</article>
		
		<div class="loader">
			<div class="loader_a"></div>
			<div class="loader_b"></div>
		</div>
	</article>
</section>