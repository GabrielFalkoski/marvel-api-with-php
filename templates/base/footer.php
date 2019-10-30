	</main>

	<footer id="footer">
		
	</footer>

	<script type="text/javascript" src="./assets/js/lib.js"></script>
	<script type="text/javascript" src="./assets/js/app.js"></script>

	<script type="text/javascript">
		<?php $currentPage = $page; ?>
		jQuery( document ).ready( function($){
			<?php echo "App.pages.{$page}(); "; ?>;
		});
	</script>

</body>
</html>