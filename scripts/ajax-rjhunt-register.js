var xmlhttpRJ=GetXmlHttpObjectRJ();
function GetXmlHttpObjectRJ()
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
function stateChangedRJ()
{
if (xmlhttpRJ.readyState==4)
  {
	  var httpDoc=xmlhttpRJ.responseText;
	  if(httpDoc=="REG_SUCCESS")
	  {
		  clearFormRJ();
		  alert("You have been successfully registered for RJ Hunt! Please keep in touch.");
		  //doAlumniYearView();
	  }
	  else
	  {
		  alert(httpDoc);
	  }
	  document.getElementById("evrj_submit").value=" Submit ";
	  document.getElementById("evrj_submit").disabled="";
  }
}
function doRJHuntRegister()
{
	name=document.getElementById("evrj_name").value;
	phon=document.getElementById("evrj_phone").value;
	if (name.length==0 || phon.length==0) { alert("One or more fields empty!"); return; }
	if (xmlhttpRJ==null) { return; }
	document.getElementById("evrj_submit").disabled="disabled";
	document.getElementById("evrj_submit").value=" Posting... ";
	var url="ajax-rjhunt-register.php";
	var params="na="+name+"&ph="+phon+"&ra="+Math.random();
	xmlhttpRJ.onreadystatechange=stateChangedRJ;
	xmlhttpRJ.open("POST",url,true);
	xmlhttpRJ.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttpRJ.setRequestHeader("Content-length", params.length);
	xmlhttpRJ.setRequestHeader("Connection", "close");
	xmlhttpRJ.send(params);	
}
function clearFormRJ()
{
	document.getElementById("evrj_name").value="";
	document.getElementById("evrj_phone").value="";	
}
