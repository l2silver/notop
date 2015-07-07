<div class='row'>
	<h1>Start Test</h1>
	    <p class="viewport_y"></p>
    <p id="carousel_y"></p>
	<?php foreach(get_header_images() as $key => $value): ?>
		<?php if($key != 0):?>
			<h2>Key: <?php echo $key; ?></h2>
		<?php endif;?>
	<?php endforeach; ?>
	<?php
	 // Get the nav menu based on $menu_name (same as 'theme_location' or 'menu' arg to wp_nav_menu)
    // This code based on wp_nav_menu's code to get Menu ID from menu slug

    $menu_name = 'primary-menu';

    if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_name ] ) ) {
	$menu = wp_get_nav_menu_object( $locations[ $menu_name ] );

	$menu_items = wp_get_nav_menu_items($menu->term_id);

	$menu_list = '<ul id="menu-' . $menu_name . '">';

	foreach ( (array) $menu_items as $key => $menu_item ) {
	    $title = $menu_item->title;
	    $url = $menu_item->url;
	    $menu_list .= '<li><a href="' . $url . '">' . $title . '</a></li>';
	}
	$menu_list .= '</ul>';
    } else {
	$menu_list = '<ul><li>Menu "' . $menu_name . '" not defined.</li></ul>';
    }
    // $menu_list now ready to output
    ?>

	<h2>Menu: <?php echo $menu_list; ?></h2>
	<h2 class="test-class">Do headers exist?<?php echo header_images_exist(); ?></h2>
	<h2><?php echo get_header_images()[1]->image_url . get_header_images()[1]->redirect_url; ?></h2>
	<h5><?php test_header_slide(); ?></h5>
	<h1><?php echo get_option('header_image_1'); ?></h1>
	<h1><?php echo get_option('header_image_1') == null; ?></h1>

	<h1><?php echo get_option('header_image_2') == null; ?></h1>
	<h1><?php echo get_option('header_image_3') == null; ?></h1>
	<h1><?php echo get_option('header_image_3'); ?></h1>
	<h1><?php echo get_option('header_image_4'); ?></h1>
</div>