CanvasRenderingContext2D.prototype.dashedLine = function(x1, y1, x2, y2, dashLen) {
    if (dashLen == undefined) dashLen = 2;
    this.beginPath();
    this.moveTo(x1, y1);
    var dX = x2 - x1;
    var dY = y2 - y1;
    var dashes = Math.floor(Math.sqrt(dX * dX + dY * dY) / dashLen);
    var dashX = dX / dashes;
    var dashY = dY / dashes;
    var q = 0;
    while (q++ < dashes) {
     x1 += dashX;
     y1 += dashY;
     this[q % 2 == 0 ? 'moveTo' : 'lineTo'](x1, y1);
    }
    this[q % 2 == 0 ? 'moveTo' : 'lineTo'](x2, y2);
    this.stroke();
    this.closePath();
};

CanvasRenderingContext2D.prototype.arrowLine = function(xh, yh, l, lh, theta, dashLen) {
    if (dashLen == undefined) dashLen = 2;
	theta = -theta/180*Math.PI;
    this.beginPath();
    this.moveTo(xh, yh);
    var dX = l*Math.cos(theta); //x2 - x1;
    var dY = l*Math.sin(theta); //y2 - y1;
    var dashes = Math.floor(Math.sqrt(dX * dX + dY * dY) / dashLen);
    var dashX = dX / dashes;
    var dashY = dY / dashes;
    x1=xh;
	y1=yh;
	x2 = x1 + dX;
	y2 = y1 + dY;
	var q = 0;
    while (q++ < dashes) {
     x1 += dashX;
     y1 += dashY;
     this[q % 2 == 0 ? 'moveTo' : 'lineTo'](x1, y1);
    }
    this[q % 2 == 0 ? 'moveTo' : 'lineTo'](x2, y2);
	this.moveTo(xh,yh);
	var dX = lh*Math.cos(theta+Math.PI/4);
	var dY = lh*Math.sin(theta+Math.PI/4); //y2 - y1;
    var dashes = Math.floor(Math.sqrt(dX * dX + dY * dY) / dashLen);
    var dashX = dX / dashes;
    var dashY = dY / dashes;
    x1=xh;
	y1=yh;
	x2 = x1 + dX;
	y2 = y1 + dY;
	var q = 0;
    while (q++ < dashes) {
     x1 += dashX;
     y1 += dashY;
     this[q % 2 == 0 ? 'moveTo' : 'lineTo'](x1, y1);
    }
    this[q % 2 == 0 ? 'moveTo' : 'lineTo'](x2, y2);
	this.moveTo(xh,yh);
	var dX = lh*Math.cos(theta-Math.PI/4);
	var dY = lh*Math.sin(theta-Math.PI/4); //y2 - y1;
    var dashes = Math.floor(Math.sqrt(dX * dX + dY * dY) / dashLen);
    var dashX = dX / dashes;
    var dashY = dY / dashes;
    x1=xh;
	y1=yh;
	x2 = x1 + dX;
	y2 = y1 + dY;
	var q = 0;
    while (q++ < dashes) {
     x1 += dashX;
     y1 += dashY;
     this[q % 2 == 0 ? 'moveTo' : 'lineTo'](x1, y1);
    }
    this[q % 2 == 0 ? 'moveTo' : 'lineTo'](x2, y2);
	this.stroke();
    this.closePath();
};

function drawDottedLines()
{
	var cl=document.getElementById("canvas_lines");
	var ct=cl.parentNode;
	if((cl.width!=ct.clientWidth)||(cl.height!=ct.clientHeight)) 
	{
		cl.width=ct.clientWidth;
		cl.height=ct.clientHeight;
	}
	var cx=cl.getContext("2d");
	cx.strokeStyle="#7d4400";
	cx.lineWidth=2;
	//jgecmasthead -> herenhappening
	x1=document.getElementById("jgecmasthead").offsetLeft+250;
	x2=document.getElementById("herenhappening").offsetLeft+250;
	cx.dashedLine(x1,160,x2,500,8);
	//herenhappening -> events
	cx.strokeStyle="#0289bc";
	x1=x2-100;
	x2=document.getElementById("eventsintro").offsetLeft+350;
	cx.dashedLine(x1,835,x2,1540,8);
	//events -> social
	cx.strokeStyle="#ec008c";
	x1=x2-100;
	x2=document.getElementById("socialintro").offsetLeft+150;
	cx.dashedLine(x1,1855,x2,2540,8);
	//social -> holi
	cx.strokeStyle="#7b0046";
	x1=x2-100;
	x2=document.getElementById("holiintro").offsetLeft+150;
	cx.dashedLine(x1,2900,x2,3550,8);	
	//holi -> reunion
	cx.strokeStyle="#a9e249";
	x1=x2+200;
	x2=document.getElementById("reunionintro").offsetLeft+250;
	cx.dashedLine(x1,3940,x2,4540,8);
	//reunion -> gallery
	cx.strokeStyle="#fff200";
	x1=x2+50;
	x2=document.getElementById("galleryintro").offsetLeft+500;
	cx.dashedLine(x1,4900,x2,5336,8);
	//gallery -> contact
	cx.strokeStyle="#f26522";
	x1=x2+550;
	rbar=(document.getElementById("contacttable").offsetWidth)/2;
	x2=document.getElementById("contactintro").offsetLeft+rbar+150;	
	cx.dashedLine(x1,6040,x2,6400,8);
}
