function activateGallery()
{
	//alert("A");
	var newPix = '';
	$('#galleryboolean').attr('value','true');
	newPix=$('#orbit_gallery').html();
	newPix+='<img src="style/gallery/2.jpg" data-caption="#caption_2" />\
			 <img src="style/gallery/3.jpg" data-caption="#caption_3" />\
			 <img src="style/gallery/4.jpg" data-caption="#caption_4" />\
			 <img src="style/gallery/5.jpg" data-caption="#caption_5" />\
			 <img src="style/gallery/6.jpg" data-caption="#caption_6" />\
			 <img src="style/gallery/7.jpg" data-caption="#caption_7" />\
			 <img src="style/gallery/8.jpg" data-caption="#caption_8" />\
			 <img src="style/gallery/9.jpg" data-caption="#caption_9" />\
			 <img src="style/gallery/10.jpg" data-caption="#caption_10" />\
			 <img src="style/gallery/11.jpg" data-caption="#caption_11" />\
			 <img src="style/gallery/12.jpg" data-caption="#caption_12" />';
	$('#orbit_gallery').html(newPix);
	$('#orbit_gallery').orbit({
		 animation: 'horizontal-push',       // fade, horizontal-slide, vertical-slide, horizontal-push
		 animationSpeed: 800,                // how fast animtions are
		 timer: true, 			 			 // true or false to have the timer
		 advanceSpeed: 4000, 		 		 // if timer is enabled, time between transitions 
		 pauseOnHover: false, 		 		 // if you hover pauses the slider
		 startClockOnMouseOut: false, 		 // if clock should start on MouseOut
		 startClockOnMouseOutAfter: 1000, 	 // how long after MouseOut should the timer start again
		 directionalNav: true, 				 // manual advancing directional navs
		 captions: true, 			 		 // do you want captions?
		 captionAnimation: 'fade', 		 	 // fade, slideOpen, none
		 captionAnimationSpeed: 800, 		 // if so how quickly should they animate in
		 bullets: false,			  		 // true or false to activate the bullet navigation
		 bulletThumbs: false,		 		 // thumbnails for the bullets
		 bulletThumbLocation: '',		 	 // location from this file where thumbs will be
		 afterSlideChange: function(){} 	 // empty function 
	});
}
