</div><!-- end main-container -->
</div><!-- end page-area -->
<?php if ( is_active_sidebar( 'envo-storefront-footer-area' ) ) { ?>  				
	<div id="content-footer-section" class="container-fluid clearfix">
		<div class="container">
			<?php dynamic_sidebar( 'envo-storefront-footer-area' ); ?>
		</div>	
	</div>		
<?php } ?>
<?php do_action( 'envo_storefront_before_footer' ); ?> 
<footer id="colophon" class="footer-credits container-fluid">
	<div class="container">
		<?php do_action( 'envo_storefront_generate_footer' ); ?> 
	</div>	
</footer>
</div><!-- end page-wrap -->
<?php do_action( 'envo_storefront_after_footer' ); ?>
<?php wp_footer(); ?>
<div class="zalo-chat-widget" data-oaid="385977667412233778" data-welcome-message="Rất vui khi được hỗ trợ bạn!" data-autopopup="1" data-width="300" data-height="500"></div>

<script src="https://sp.zalo.me/plugins/sdk.js"></script>
</body>
</html>
