(function($){
"use strict"; // Start of use strict
//Window Load
jQuery(window).load(function(){ 
	//Shop Banner Slider
	if($('.banner-shop-slider').length>0){
		$('.banner-shop-slider').each(function(){
			$(this).find('.wrap-item').owlCarousel({
				items: 1,
				itemsCustom: [ 
				[0, 1], 
				[480, 1], 
				[768, 1], 
				[992, 1], 
				[1200, 1] 
				],
				pagination: false,
				navigation: true,
				navigationText:['','']
			});
		});
	}
	//Featured Product Slider
	if($('.featured-product-slider').length>0){
		$('.featured-product-slider').each(function(){
			$(this).find('.wrap-item').owlCarousel({
				items: 1,
				itemsCustom: [ 
				[0, 1], 
				[480, 1], 
				[768, 1], 
				[992, 1], 
				[1200, 1] 
				],
				pagination: false,
				navigation: true,
				navigationText:['','']
			});
		});
	}
	//Owl Product Slider
	if($('.owl-tab-slider').length>0){
		$('.owl-tab-slider').each(function(){
			$(this).find('.wrap-item').owlCarousel({
				items: 4,
				itemsCustom: [ 
				[0, 1], 
				[480, 2], 
				[768, 3], 
				[992, 3], 
				[1200, 4] 
				],
				pagination: false,
				navigation: true,
				navigationText:['','']
			});
		});
	}
});
})(jQuery); // End of use strict