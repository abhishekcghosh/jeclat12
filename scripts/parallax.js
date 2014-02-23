$(window).load(function(){
	//draw lines
	drawDottedLines();
	//catch window
	$window=$(window);
	// Cache the Y offset and the speed 
	$('[data-type]').each(function() { 
	  $(this).data('offsetY', parseInt($(this).attr('data-offsetY'))); 
	  $(this).data('offsetY2', parseInt($(this).attr('data-offsetY2'))); 
	  $(this).data('offsetX', parseInt($(this).attr('data-offsetX'))); 
	  $(this).data('speed', $(this).attr('data-speed')); 
	});
	// For each element that has a data-type attribute
	$('section[data-type="background"]').each(function(){
		// Store some variables based on where we are
		var $self = $(this),
			offsetCoords = $self.offset(),
			topOffset = offsetCoords.top;
		$(window).scroll(function(){
			// If this section is in view
			//alert($window.scrollTop());
			if ( ($window.scrollTop() + $window.height()) > (topOffset) &&
			( (topOffset + $self.height()) > $window.scrollTop() ) ) {
			  //write a routine for loading the images in case this is the gallery tab
			  if($self.attr('id')=="section_fourth" && $('#galleryboolean').attr('value')=="false") { activateGallery(); }
			  // Scroll the background at var speed
			  // the yPos is a negative value because we're scrolling it UP!			  
			  var yPos = -($window.scrollTop() / $self.data('speed'));
			  // If this element has a Y offset then add it on
			  if ($self.data('offsetY')) {
				yPos += $self.data('offsetY');
			  }
			  // Put together our final background position
			  var coords = '50% '+ yPos + 'px';
			  // Move the background
			  $self.css({ backgroundPosition: coords });
			  // Check for other sprites in this section	
				$('[data-type="sprite"]', $self).each(function() {
					// Cache the sprite
					var $sprite = $(this);
					//alert($sprite.data('speed'));
					// Use the same calculation to work out how far to scroll the sprite
					var yPos = -(($window.scrollTop()-$sprite.data('offsetY2')) / $sprite.data('speed'));					
					//var coords = $sprite.data('Xposition') + ' ' + (yPos + $sprite.data('offsetY')) + 'px';
					var coordsY=(yPos + $sprite.data('offsetY')) + 'px';
					//$sprite.css({ backgroundPosition: coords });													
					$sprite.css({ top: coordsY });													
				}); // sprites
				$('[data-type="spritehor"]', $self).each(function() {
					// Cache the sprite
					var $sprite = $(this);
					//alert($sprite.data('speed'));
					// Use the same calculation to work out how far to scroll the sprite
					var xPos = 100-(($window.scrollTop()-$sprite.data('offsetY2')) / ($sprite.data('speed')*10));					
					var yPos = (($window.scrollTop()-$sprite.data('offsetY2')) * ($sprite.data('speed')));					
					//var coords = $sprite.data('Xposition') + ' ' + (yPos + $sprite.data('offsetY')) + 'px';
					var coordsX=(xPos + $sprite.data('offsetX')) + '%';
					var coordsY=(yPos + $sprite.data('offsetY')) + 'px';
					//alert(coordsY);
					//alert(($window.scrollTop()-$sprite.data('offsetY2')) / ($sprite.data('speed')*10));
					//$sprite.css({ backgroundPosition: coords });													
					$sprite.css({ left: coordsX });							
					$sprite.css({ top: coordsY });							
				}); // sprites
				// Check for any Videos that need scrolling
				$('[data-type="video"]', $self).each(function() {
					// Cache the video
					var $video = $(this);
					// There's some repetition going on here, so 
					// feel free to tidy this section up. 
					var yPos = -($window.scrollTop() / $video.data('speed'));					
					var coords = (yPos + $video.data('offsetY')) + 'px';
					$video.css({ top: coords });													
				}); // video	
			  }; // in view
		}); // window scroll
	});	// each data-type
	//remove loader
	removeLoader();
}); //end  of win load

function removeLoader()
{
	clearTimeout(timerId);
	//$(document).attr('title','It\'s Here. And It\'s Happening.');
	$('#mother_of_loader').css({ display: 'none' });
	$('#mother_of_loader').html(null);
}

function showMenuCaption(i)
{
	$('#menu_d'+i).css({ opacity: 1 });
}
function hideMenuCaption(i)
{
	$('#menu_d'+i).css({ opacity: 0 });
}
function scrollMe(where)
{
	$.scrollTo($('#'+where).offset().top+200,1000,{easing:'swing'});
	
}