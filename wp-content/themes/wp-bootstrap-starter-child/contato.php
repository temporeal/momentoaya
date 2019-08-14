<?php
/**
* Template Name: Contato
 */

get_header(); 
?>


		<?php
		while ( have_posts() ) : the_post();

            get_template_part( 'template-parts/contact', 'Fala com a gente' );

        endwhile; // End of the loop.
		?>
	
	<div class="mapouter">
		<div class="gmap_canvas">
			<iframe width="100%" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=Rua%20S%C3%A3o%20Domingos%20do%20Prata%2C%20273%2C%20S%C3%A3o%20Pedro&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
		</div>

	</div>
<?php

get_footer();