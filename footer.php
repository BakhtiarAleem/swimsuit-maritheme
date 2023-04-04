</main>
</div>
<footer id="footer" role="contentinfo">
  <div class="container">
    <div class="row">
    	<div class="col-md-4 footer-widget-one footer-logo">
			<?php dynamic_sidebar( 'footer-widget-1' ); ?>
    	</div>
    	<div class="col-md-8">
			<div class="row">
				<div class="col-md-4 footer-widget-two">
					<?php dynamic_sidebar( 'footer-widget-2' ); ?>
				</div>
				<div class="col-md-4 footer-widget-three">
					<?php dynamic_sidebar( 'footer-widget-3' ); ?>
				</div>
				<div class="col-md-4 footer-widget-four">
					<?php dynamic_sidebar( 'footer-widget-4' ); ?>
				</div>
			</div>
    	</div>
    </div>
	<div class="footer-below">
		<div class="row align-items-end">
			<div class="col-md-6">
			<div id="copyright" class="copyright">
			<?php echo esc_html( get_bloginfo( 'name' ) ); ?> &copy; 2022 ALL RIGHTS RESERVED
				
			</div>
			</div>
			<div class="col-md-6">
			<div class="footer-widget-five">
					<?php dynamic_sidebar( 'footer-widget-5' ); ?>
				</div>
			</div>
		</div>
  </div>
  </div>
</footer>
</div>
<?php wp_footer(); ?>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script async
  type="text/javascript"
  src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/js/main.js' ); ?>">
</script>
</body>
</html>