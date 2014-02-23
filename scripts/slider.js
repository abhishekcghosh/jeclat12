function slideMe(parentId,direction)
{
	var parent=document.getElementById(parentId);
	var N=parent.getElementsByTagName("div").length;
	for(i=0;i<N;i++)
	{
		var thisItem=parent.getElementsByTagName("div").item(i);
		if(thisItem.className=="sectionslide")
		{
			var nowLeft=thisItem.style.left;
			if(direction==true) 
			{ 
				nowLeft=eval(nowLeft.substr(0,nowLeft.length-1))-100;
			}
			else
			{
				nowLeft=eval(nowLeft.substr(0,nowLeft.length-1))+100;
			}
			nowLeft+='%';
			thisItem.style.left=nowLeft;
		}
	}
	drawDottedLines();
}