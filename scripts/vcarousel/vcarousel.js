var xmlhttpL=GetXmlHttpObject();
var xmlhttpR=GetXmlHttpObject();
function GetXmlHttpObject()
{
	if (window.XMLHttpRequest)
    {
	  // code for IE7+, Firefox, Chrome, Opera, Safari
	  return new XMLHttpRequest();
	}
	if (window.ActiveXObject)
	{
	  // code for IE6, IE5
	  return new ActiveXObject("Microsoft.XMLHTTP");
	}
	return null;
}
function stateChangedL()
{
if (xmlhttpL.readyState==4)
  {
	  var httpDoc=xmlhttpL.responseText;
	  if(httpDoc=="POST_SUCCESS")
	  {
		  doRefresh();
	  }
	  else
	  {
		  alert(httpDoc);
		  document.getElementById("ff_submit").value=" Submit ";
	  	  document.getElementById("ff_submit").disabled="";
	  }
  }
}
function stateChangedR()
{
if (xmlhttpR.readyState==4)
  {
	  var httpDoc=xmlhttpR.responseText;
	  if(httpDoc=="POST_NULL")
	  {
		  //do nothing
	  }	  
	  else
	  {
		  pipeC=httpDoc.lastIndexOf("|");
		  lastId=httpDoc.substr(pipeC+1,httpDoc.length);
		  document.getElementById("ff_lastid").value=lastId;
		  injectVC(httpDoc.substr(0,pipeC));
	  }
	  document.getElementById("ff_submit").value=" Submit ";
	  document.getElementById("ff_submit").disabled="";
	  clearFormF();		  
  }
}
function doFeedback()
{
	name=document.getElementById("ff_name").value;
	email=document.getElementById("ff_email").value;
	msg=document.getElementById("ff_feedback").value;
	if (name.length==0 || email.length==0 || msg.length==0) { alert("One or more fields empty!"); return; }
	if (xmlhttpL==null) { return; }
	document.getElementById("ff_submit").disabled="disabled";
	document.getElementById("ff_submit").value=" Posting... ";
	var url="ajax-feedback.php";
	var params="na="+name+"&em="+email+"&ms="+msg+"&ra="+Math.random();
	xmlhttpL.onreadystatechange=stateChangedL;
	xmlhttpL.open("POST",url,true);
	xmlhttpL.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttpL.setRequestHeader("Content-length", params.length);
	xmlhttpL.setRequestHeader("Connection", "close");
	xmlhttpL.send(params);	
}
function doRefresh()
{
	lastID=document.getElementById("ff_lastid").value;
	if (lastID.length==0 || xmlhttpR==null) { return; }
	var url="ajax-feedback-refresh.php";
	url+="?id="+lastID+"&ra="+Math.random();
	xmlhttpR.onreadystatechange=stateChangedR;
	xmlhttpR.open("GET",url,true);
	xmlhttpR.send(null);		
}
function clearFormF()
{
	document.getElementById("ff_name").value="";
	document.getElementById("ff_email").value="";
	document.getElementById("ff_feedback").value="";
}

var vCar;
function VerticalCarousel(list, duration) {
    this.resetC = false;
	var self=this;
	self.init(list,duration);
}

VerticalCarousel.prototype.init = function(list, duration) {
	var self = this;
	self.cont = "";
	self.cont = list;
	self.store = list.html();
    self.height = self.cont.parent().height();	
	// Check if there is enough content
    if(self.cont.height() > self.height) {
        self.timer = null;
        self.duration = duration;
        self.index = 0;
        // Clone items for infinite scrolling
        self.cont.children().clone().appendTo(self.cont);
        // Update Item List and Count after clone
        self.items = self.cont.children();
        self.itemCount = self.items.length;
        // Store Item Height in an array
        self.itemHeights = [];
        for(var i = 0; i < self.itemCount; i++) {
            self.itemHeights.push(self.items.eq(i).outerHeight());
        }
        self.hidePartial();
        self.startTimer();
	}
	else {
		self.items = self.cont.children();
        self.itemCount = self.items.length;        
		for(var i = 0; i < self.itemCount; i++) {
        	self.items.eq(i).addClass('visible-carousel-item');
		}
	}
}

VerticalCarousel.prototype.slide = function() {
    var self = this;
    self.cont.animate({'marginTop': '-=' + (self.itemHeights[self.index])}, 500, function() {
        if(self.index == self.itemCount / 2 || self.resetC == true) {
            self.cont.css('marginTop', 0);
            self.index = 0;
            self.hidePartial();
			self.resetC=false;
        }
        self.startTimer();
    });
    self.index++;
    self.hidePartial();
};

VerticalCarousel.prototype.hidePartial = function() {
    var self = this;
    var totalHeight = 0;
    for(var i = 0; i < self.itemCount * 2; i++) {
        self.items.eq(i).removeClass('visible-carousel-item');
        if(i < self.index) { 
            self.items.eq(i).addClass('visible-carousel-item');
        } else {
            totalHeight += self.itemHeights[i];
            if(totalHeight < self.height) {
                self.items.eq(i).addClass('visible-carousel-item');
            }
        } 
    }
};

VerticalCarousel.prototype.startTimer = function() {
    var self = this;
    self.timer = setTimeout(function() {
        self.slide();
    }, self.duration);
};

VerticalCarousel.prototype.clearTimer = function() {
    var self = this;
    clearTimeout(self.timer);
};

VerticalCarousel.prototype.resetF = function() {
    var self = this;
    self.resetC=true;
};

VerticalCarousel.prototype.getStore = function() {
	var self = this;
	return self.store;
}

VerticalCarousel.prototype.resetSlide = function() {
	var self = this;
    if(self.cont.height() > self.height) {
		self.cont.animate({'marginTop': '-=' + (self.itemHeights[self.index])}, 500, function() {
			if(true) {
				self.cont.css('marginTop', 0);
				self.index = 0;
				self.hidePartial();
				self.resetC=false;
			}
		});
	}
}

$(window).load(function() {
    vCar = new VerticalCarousel($('.v-carousel-mask ul'), 10000);
});

function injectVC(str)
{
	var oldC=vCar.getStore();
	oldC=str+oldC;
	vCar.clearTimer()
	vCar.resetSlide();
	$('#vcarousel_ul').html(oldC);	
	vCar.init($('.v-carousel-mask ul'), 10000);
}
