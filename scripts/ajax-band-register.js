var xmlhttpBB=GetXmlHttpObjectBB();
function GetXmlHttpObjectBB()
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
function stateChangedBB()
{
if (xmlhttpBB.readyState==4)
  {
	  var httpDoc=xmlhttpBB.responseText;
	  if(httpDoc=="REG_SUCCESS")
	  {
		  clearFormBB();
		  alert("You have been successfully registered for Band Blast! Please contact our co-ordinator Neelab S. Chowdhury (+91-9432113241) and maintain correspondence for further information.");
		  //doAlumniYearView();
	  }
	  else
	  {
		  alert(httpDoc);
	  }
	  document.getElementById("evbb_submit").value=" Submit ";
	  document.getElementById("evbb_submit").disabled="";
  }
}
function doBandBlastRegister()
{
	band=document.getElementById("evbb_bandname").value;
	plac=document.getElementById("evbb_placefrom").value;
	memb=document.getElementById("evbb_members").value;
	cont=document.getElementById("evbb_contactname").value;
	phon=document.getElementById("evbb_phone").value;
	if (band.length==0 || plac.length==0 || memb.length==0 || cont.length==0 || phon.length==0) { alert("One or more fields empty!"); return; }
	if (xmlhttpBB==null) { return; }
	document.getElementById("evbb_submit").disabled="disabled";
	document.getElementById("evbb_submit").value=" Posting... ";
	var url="ajax-band-register.php";
	var params="ba="+band+"&pl="+plac+"&me="+memb+"&co="+cont+"&ph="+phon+"&ra="+Math.random();
	xmlhttpBB.onreadystatechange=stateChangedBB;
	xmlhttpBB.open("POST",url,true);
	xmlhttpBB.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttpBB.setRequestHeader("Content-length", params.length);
	xmlhttpBB.setRequestHeader("Connection", "close");
	xmlhttpBB.send(params);	
}
function clearFormBB()
{
	document.getElementById("evbb_bandname").value="";
	document.getElementById("evbb_placefrom").value="";
	document.getElementById("evbb_members").value="6";
	document.getElementById("evbb_contactname").value="";
	document.getElementById("evbb_phone").value="";	
}