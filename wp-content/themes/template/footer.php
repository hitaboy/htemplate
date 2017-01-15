			<footer class="footer" role="contentinfo">

				<div class="wrapper_in">
  				<p class="copyright">
  					&copy; <?php echo date("Y"); ?> Copyright
  				</p>
				</div>

			</footer>

		</div>

    </div>


		<?php wp_footer(); ?>

		<!-- analytics -->
		<script>
			var _gaq=[['_setAccount','<?php echo ANALYTICS_CODE; ?>'],['_trackPageview']];
			(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
			g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
			s.parentNode.insertBefore(g,s)})(document,'script');
		</script>

	</body>
</html>
