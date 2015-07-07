(function($){
  
$( window ).resize(function() {
	adjustCarouselCaptionCSS();
	adjustNavbarToAdminbar();
});	

$(document ).ready(function($) {

	
	changeHeaderCarouselID();
	adjustCarouselCaptionCSS();
	startMenuSelector();
	underlineAndMoveMenu();
	adjustNavbarToAdminbar();
	var pageLocations = new setPageLocations();
	
});


function getCarouselHeaderID(){
	if(typeof carousel_header_id === 'undefined') {
		return "#HeaderCarousel";
	}
	else
	{
		return "#" + carousel_header_id
		
	}
}



function adjustCarouselCaptionCSS(){
	if(headerCarouselExists){
		$('.carousel-caption').css( "font-size", captionFontSize());
		$('.carousel-caption').css( "margin-bottom", captionBottonMargin());
	}
}

function captionFontSize(){
	return (getCarouselHeight()/20).toString() + "pt";
}

function captionBottonMargin(){
	return (getCarouselHeight()*0.25).toString() + "px";
}

function getCarouselHeight() {
	return $(getCarouselHeaderID()).height();
 }

function getCarouselWidth() {
    return $(getCarouselHeaderID()).width();
}

function headerCarouselExists() {
	return $(getCarouselHeaderID()).length > 0;
}


function changeHeaderCarouselID(){
	$(".menu-target-page").each(function(){
		target_id = $(this).data('pageTarget')
		if ($("#" + target_id).length == 0 ){
			$(getCarouselHeaderID()).attr("id", target_id)
			carousel_header_id = target_id
		}
	});
}



$.fn.onScreen = function() {
	var objectTop = $(this).position().top;
	var objectBottom = objectTop + $(this).height();
	var viewportTop = $(window).scrollTop();
	var viewportBottom = viewportTop + $(window).innerHeight();

	if ( (objectTop > viewportBottom) || (objectBottom < viewportTop))
		{
			return false
		}
	else
	{
			return true
	}

}

function middleCoordinate(){
	return ($(window).scrollTop() + ($(window).innerHeight()*0.6));
}

function addScrollFunctions(){
	$(window).scroll(function(){
	 	getMiddlePage(pageLocations.locations, middleCoordinate())
    });
}

function getMiddlePage(locations, middle_coordinate){
alert("startgetMiddlePage");
	for(i=0;i<locations.length;i++)
	{
		alert("inforloop");
		//alert(locations[i].atMiddle(middle_coordinate));
		//alert(locations[i].top);
		//alert(locations[i].bottom);
		//alert(middle_coordinate);

	    if(locations[i].atMiddle(middle_coordinate))
	    {
	    	alert("if_passes")
	        data_id = locations[i].object.attr('id')
	        alert(data_id);
	        if(data_id == "HeaderCarousel"){
	        	alert("Header");
	        }
	        else
	        {
	        	alert("NotHeader");
	       		underlineTargetMenu("[data-page-target='" + data_id + "']");
	        }
	        
	    }
	}
}

function setPageLocation(element){
	this.top = element.position().top;
	this.bottom = this.top + element.height();
	this.object = element;
}

setPageLocation.prototype.atMiddle = function(middle_coordinate) {
 return (this.top <= middle_coordinate && this.bottom > middle_coordinate)
};

function setPageLocations(){
	this.locations = [];
	var pageLocationsArray = this.locations;
	$(".menu-target-page").each(function(){
		pageID = $(this).data("pageTarget");
		if (headerCarouselID()){
        	pageLocationsArray.push(new setPageLocation($(getCarouselHeaderID())));
        	}
        else
        	{
        	pageLocationsArray.push(new setPageLocation($("#" + pageID)));
        	}
   	});
}

function startMenuSelector(){
	home = $("#menu-target-page").children().first();
	home.css("border-bottom", "solid");
}

function underlineAndMoveMenu(){
	$(".menu-target-page").click(function() {
		underlineTargetMenu($(this));
		goToTargetPage($(this));
	});
}

function underlineTargetMenu(menu_item){
	$(".menu-target-page").css("border-bottom", "none");
	$(menu_item).css("border-bottom", "solid");
}

function headerCarouselID(target_page_id){
	return $("#" + target_page_id).length == 0
}

function scrollTo(id){
	$('html, body').animate({
		        scrollTop: $("#" + id).offset().top + 50
		    }, 500, "swing");	
}

function goToTargetPage(menu_item){
	target_page_id = menu_item.data("pageTarget");
	if (headerCarouselID(target_page_id))
	{
		scrollTo("HeaderCarousel");	
	} 
	else
	{
		scrollTo(target_page_id);
	}	
}

function adjustNavbarToAdminbar(){
	if($("#wpadminbar").length == 0) {
		$(".navbar-fixed-top").css("padding-top", 0);
		}
	else
		{
		$(".navbar-fixed-top").css("padding-top", $("#wpadminbar").height());
		}	
}

})(jQuery);





