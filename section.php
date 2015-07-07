<?php $menu_name = 'primary-menu';

    if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_name ] ) ) :
		$menu = wp_get_nav_menu_object( $locations[ $menu_name ] );

		$menu_items = wp_get_nav_menu_items($menu->term_id);

		$menu_list = '<ul id="menu-' . $menu_name . '">';

		foreach ( (array) $menu_items as $key => $menu_item ) :
		 
		    $title = $menu_item->title;

		    $url = $menu_item->url;

		    if ( $url != get_site_url() . "/" ) :

	  		
		  		$page = get_page_by_title($title);

		  		$page_id = $page->ID;

				$post = get_post($page_id);

				reset_page_attributes();

				$content = do_shortcode($post->post_content);

				echo
						'<style type="text/css">
						@media screen and (min-width: 38.75em) {
        				#post-' . $page_id . ' { ' .
            			$GLOBALS['tablet_page_attributes'] . '
        				}
        				}
        				@media screen and (min-width: 55em) {
        					#post-' . $page_id . ' { ' .
            			$GLOBALS['desktop_page_attributes'] . '
        				}
						}
        				</style>';
				?>

				<div id="post-<?php echo $page_id; ?>">
					<?php $quote = ( is_rtl() ) ? 'right' : 'left'; // Conditional for RTL languages ?>
				    <div class="enter-content description">
				    	&nbsp;
				    	&nbsp;
				    	<?php //test
				    	//echo $GLOBALS['page_background_attributes']; ?>
					    <?php echo $content; ?>
				    </div><!-- .entry-content -->
				</div>
	  <?php 
	  			
	  		endif;
	  	endforeach; 
	  endif;
	  ?>