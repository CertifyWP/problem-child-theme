<?php
function certifywp_test_action() {
	$content = '<p style="background-color: lightgrey; text-align: center;">CertifyWP Problem Child is working!</p>';
}
add_action( 'wp_footer', 'certifywp_test_action' );
