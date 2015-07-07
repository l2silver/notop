<nav class="navbar navbar-default navbar-fixed-top">	
  <div class="container">
	<div class="navbar-header navbar-right">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"><?php echo get_bloginfo(); ?></a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
    	<ul class="nav navbar-nav" id="menu-target-page">
	  		<?php 

	  			$locations = get_nav_menu_locations();
		  	 	$menu = wp_get_nav_menu_object( $locations[ "primary-menu" ] );
				$menu_items = wp_get_nav_menu_items($menu->term_id);
				foreach ($menu_items as $menu_item): ?>
					 <li class="menu-target-page" data-page-target="post-<?php echo $menu_item->object_id;?>" id="menu-post-<?php echo $menu_item->object_id;?>"><a><?php echo $menu_item->title;?></a></li>
			<?php endforeach;?>
  		</ul>          
    </div>
  </div>
</nav>
<div class="menu-selector"></div>