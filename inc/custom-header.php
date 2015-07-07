<?php
/**
 * Custom Header functionality for No Top
 *
 */

	function header_images_is_set() {
		isset($header_images);
	}

	function get_header_images() {
	
		if (header_images_is_set()) {
			return $header_images;
			}
		else 
		{
		    global $header_images;
		    $header_images = array();
		    $unskipped_number = 0;
		   	for ($x = 0; $x <= 5; $x++) {

		    	$image_url = get_option( "header_image_{$x}" );
		    	
		    	if (!$image_url == null) {
		    		$redirect_url = get_option( "header_redirect_{$x}" );
		    		$caption_title = get_option( "header_caption_title_{$x}" );
		    		$caption_subtitle = get_option( "header_caption_subtitle_{$x}" );
			    	$header_images[$unskipped_number] = new HeaderSlide($image_url, $redirect_url, $caption_title, $caption_subtitle);
			    	$unskipped_number++;
				}
			}

			return $header_images;
		}
	}

	function more_header_images_than_zero(){
		return count($GLOBALS['header_images']) > 0;
	}

	function header_images_exist()
	{
		if (header_images_is_set()) {
			return more_header_images_than_zero();
			}
		else {
			get_header_images();
			return more_header_images_than_zero();
		}
	}
	
	class HeaderSlide {
	    function __construct($image_url,$redirect_url, $caption_title, $caption_subtitle) {
	        $this->image_url = $image_url;
	        $this->redirect_url = $redirect_url;
	        $this->caption_title = $caption_title;
			$this->caption_subtitle = $caption_subtitle;		
	    }
	}

	    
	function test_header_slide(){
		
		$new_hs = new HeaderSlide("image_url", "redirect_url", "title", "subtitle");
	
		echo $new_hs->image_url . $new_hs->redirect_url;
	}
