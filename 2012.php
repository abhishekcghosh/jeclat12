<?php
	if(isset($_GET['lowb'])) { header('location: 2012-lowb.php'); 	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php require_once('module-head-tag.php'); ?>
<title>It's Here. And It's Happening.</title>
</head>
<body bgcolor="#000000">
	<!-- google analytics -->
    <?php require_once('module-google-analytics.php') ?>
	<!-- browser alert -->
	<?php 
		require_once('browser.php');
		if(!isset($_COOKIE['sba'])) 
        {
			$browser = new Browser();
			$bName=$browser->getBrowser();
			$bVer=$browser->getVersion();
			$bUA=$browser->getUserAgent();
			$isGood=false;
			$isReallyBad=false;
			if($bName==Browser::BROWSER_OPERA && $bVer>=9.80) { $bVer=substr($bUA,strrpos($bUA,"/")+1,strlen($bUA)-strrpos($bUA,"/")-1); if($bVer>=11.5) { $isGood=true; } }
			else if($bName==Browser::BROWSER_CHROME && $bVer>=14) { $isGood=true; }
			else if($bName==Browser::BROWSER_FIREFOX && $bVer>=6) { $isGood=true; }
			else if($bName==Browser::BROWSER_SAFARI && $bVer>=5) { $isGood=true; }
			else if($bName==Browser::BROWSER_IE) { if($bVer>=9) { $isGood=true; } else { $isReallyBad=true; } }		
			if($isGood==false)
			{
				//oh shit!
    ?>
    	
        <!-- css da nominee -->
        <img class="cssdaNominee" src="../j13/assets/css-design-award-nominee-duo2.png" height="69" width="164" />
        
  		<table cellpadding="2" cellspacing="2" border="0" id="mother_of_browseralert" style="background: #600; width: 500px; max-width: 500px; border: 2px #000 solid; border-radius: 8px; font-family: Verdana, Geneva, sans-serif; font-size: 11px; color:#FFF; padding: 10px; position: fixed; top: 20px; right: 20px; z-index: 2500; text-align:center; vertical-align: middle">
    		<tr>
            	<td colspan="2" align="right" valign="middle">
                	<a style="text-decoration: none; color: #F60; cursor: pointer" onclick="document.getElementById('mother_of_browseralert').style.display='none'" href="suppress-browser-alert.php" target="_blank">Do not display this message again</a> | 
                    <a style="text-decoration: none; color: #F60; cursor: pointer" onclick="document.getElementById('mother_of_browseralert').style.display='none'">Close</a>
                </td>
            </tr>
            <tr>
        		<td width="20px" valign="top" align="center">
                	<span style="font-size: 150px">!</span>
        	    </td>
                <td valign="middle" align="left">                	
                	<?php 
						if($isReallyBad==true) 
						{ 
							echo '<strong style="font-size: 16px">Bad, Bad Browser!</strong><br /><br />';
							echo 'Your web browser is outdated and incapable of reproducing this website in the way it is meant to be seen!<br /><br />';
                    		echo 'Please <strong>upgrade</strong> to a better browser!<br /><br />';
                     
						} 
						else 
						{ 
							echo '<strong style="font-size: 16px">Warning!</strong><br /><br />'; 
							echo 'Your web browser is either <strong>outdated</strong> or possibly unsupported.<br /><br />';
							echo 'In case the web site appears to be broken or functionally impaired in any aspect, please <strong>upgrade</strong> your browser!<br/><br/>';
						} 
						?>
                    It is highly recommended that you to use the <strong>latest version</strong> of <strong>Chrome</strong>, <strong>Safari</strong>, <strong>Opera</strong> or <strong>Firefox</strong> to view the website properly.
                </td>
    	    </tr>
	    </table>
    <?php        
        	}
		}
    ?>
    <!-- the loader -->
	<table cellpadding="0" cellspacing="0" border="0" width="100%" height="100%" id="mother_of_loader" style="background: #fff; position: fixed; top: 0px; bottom: 0px; left: 0px; right: 0px; z-index: 2000; text-align:center; vertical-align: middle">
    	<tr>
        	<td style="font-family: Verdana, Geneva, sans-serif; font-size: 12px; color: #333">
                <span style="font-size: 16px">Please wait...</span>
                <br /><br />
                <span id="span_loader_gibberish">Testing data on Timmy... We're going to need another Timmy...</span>
                <br /><br />
        		<img src="style/bar-loader-white.gif"/>
                <br /><br />
                <div style="font-size: 10px; line-height: 150%; display: none">                
                <br /><br /><br /><br />
                In addition, if you have a <br /><em>terribly</em> slow internet connection,
                <br />
                you might want to check out the <br /><a href="?lowb" style="text-decoration: none; color: #900; border-bottom: thin dotted #900">far-less-sloppy, but not-so-happy</a>
                <br />
                version of our website.
                </div>
                <script type="text/javascript">
					var brk = '~'; 
					var resetTime = 0; 
					function twDisplay(id,content,num) 
					{
						var delay = 50; 
						if (num <= content.length)  
						{
							var lt = content.substr(0,num); 
							document.getElementById(id).innerHTML = lt.replace(RegExp(brk,'g'),'<br \/>');
							num++; 
							if (num > content.length) delay = resetTime * 1000;
						} 
						else 
						{
							document.getElementById(id).innerHTML = ''; num = 0;
						} 
						if (delay > 0) setTimeout('twDisplay("'+id+'","'+content+'","'+num+'")',delay);
					} 
					var gib = new Array('Spinning up the proverbial hamster...',
										'Shovelling coal into the server...',
										'Programming the flux capacitor...',
										'Locating the required gigapixels to render...',										
										'Deterministically simulating the future...',
										'Detecting single bit exceptions...',
										'Ordering 16G RAM from eBay...',
										'Swapping browser cookies...',
										'Messing up Wikipedia entries...',
										'Posting funny status updates on Facebook...',
										'Writing 0xDEADBEEF into uninitialized variables...',
										'Breeding export quality bytes...',
										'Trying to stop rogue bits from escaping...',
										'Checking the gravitational constant in your locale...',
										'Loading RAM with purple hippos...',
										'Recalibrating satellite coordinates to your home...',
										'Digging up buried treasure...',
										'Reticulating Splines...',
										'Warming up the Large Hadron Collider...',
										'Measuring the cable length to web server...',
										'Dividing eternity by zero...',
										'Adding random changes to your data...',
										'Recalculating PI...',
										'Creating a time-loop inversion field...',
										'Following Britney Spears on Twitter...',
										'Deriving the Navier-Stokes equation...',
										'Locating the enchanted bunny...',
										'Saving TheWo.rld...',
										'Attempting desalination of Pacific Ocean...',
										'Bending the Spoon...',
										'Translating PHP to Klingon...',
										'Zooming through Quantum Overdrive...',
										'Choosing between Red pill and Blue pill...',
										'Trying to communicate with Zion...'																
										);
					var gibB = new Array(gib.length); for(i=0;i<gibB.length;i++) { gibB[i]=0; }
					var timesCount=0;
					var timerId;
					function showGibberish()
					{
						var notDone=true;
						while(notDone)
						{
							curIndex=Math.round(Math.random()*(gib.length-1));
							if(gibB[curIndex]==0)
							{ 
								twDisplay("span_loader_gibberish",gib[curIndex],0);
								gibB[curIndex]=1;
								timesCount++;
								if(timesCount%gib.length==0) { for(i=0;i<gibB.length;i++) { gibB[i]=0; } }
								notDone=false;
							}
						}
						secInt=Math.round(Math.random()*(20))+4;
						timerId=setTimeout('showGibberish()',1000*secInt);
					}
					showGibberish();
				</script>
        	</td>
        </tr>
    </table>
    </div>
    <!-- updates thingy -->
    <table class="mother_of_updates" border="0" cellpadding="0" cellspacing="0">
    	<tr>
        	<td>
            	<div class="updates_button" onclick="showUpdatesPane()">
                	OVEN FRESH!
                </div>
                <script type="text/javascript">
					function showUpdatesPane()
					{
						if(document.getElementById("updates_pane").style.display=="none")
						{
							document.getElementById("updates_pane").style.display="block";
							$("#updates_pane").css({opacity: 1});
						}
						else
						{
							$("#updates_pane").css({opacity: 0});
							setTimeout('document.getElementById("updates_pane").style.display="none";',1000);
						}
					}
				</script>
            </td>
        </tr>
        <tr class="updates_pane" id="updates_pane" style=" <?php if(isset($_COOKIE['sup'])) { echo 'display: none; opacity: 0'; } else { echo 'display: block; opacity: 1'; } ?> ">
        	<td>
            	<table border="0" cellpadding="0" cellspacing="0">
                	<tr>
                    	<td width="50px"></td>
                    	<td class="updates_nubLeft"></td><td class="updates_nubRight"></td>
                        <td></td>
                    </tr>
                </table>
            	<table id="tbl_updates_list" class="updates_list" border="0" cellpadding="0" cellspacing="0"  width="100%">
                	<div id="updates_dynamic">
                    <?php
						require_once('module-config.php');
						require_once('module-sql-connect.php'); 
						$tbl_name=__SQL_TABLE_PREFIX__ . "updates";
						$sql_query="SELECT * FROM $tbl_name ORDER BY upid DESC LIMIT 0,10";
						$query_result=mysql_query($sql_query);
						$present=0;
						while($row=mysql_fetch_array($query_result))
						{
							echo '<tr><td class="update_item">' . $row['updatevalue'] . '</td></tr>';
							$present=1;
							
						}
						if($present==0)
						{
							echo '<tr><td class="update_item">No Updates</td></tr>';
						}
                    ?>
                    
                    </div>
                    <tr>
                    	<td class="update_item update_last_item">
                        	<a style="cursor: pointer" class="linkyear" onclick="showUpdatesPane()">Close</a> | 
                            <a href="suppress-updates.php" target="_blank" class="linkyear" onclick="showUpdatesPane()">Keep Hidden from next time</a>
                        </td>
                    </tr>
                    
                </table>
            </td>
        </tr>
    </table>
    <!-- section selector menu -->
    <table class="selectormenu" id="mother_of_menu" border="0" cellpadding="0" cellspacing="2" >
        <tr><td><span class="menu_d" id="menu_d1">IT'S HERE. AND IT'S HAPPENING.</span></td><td><span class="menu_s" id="menu_s1" onmouseover="showMenuCaption(1)" onmouseout="hideMenuCaption(1)" onclick="scrollMe('section_first')">&bull;</span></td></tr>
        <tr><td><span class="menu_d" id="menu_d2">26 EVENTS TO COMPETE IN</span></td><td><span class="menu_s" id="menu_s2" onmouseover="showMenuCaption(2)" onmouseout="hideMenuCaption(2)" onclick="scrollMe('section_second')">&bull;</span></td></tr>
        <tr><td><span class="menu_d" id="menu_d3">45TH GRAND SOCIAL NIGHT</span></td><td><span class="menu_s" id="menu_s3" onmouseover="showMenuCaption(3)" onmouseout="hideMenuCaption(3)" onclick="scrollMe('section_third')">&bull;</span></td></tr>
        <tr><td><span class="menu_d" id="menu_d35">RANGOTSAV</span></td><td><span class="menu_s" id="menu_s35" onmouseover="showMenuCaption(35)" onmouseout="hideMenuCaption(35)" onclick="scrollMe('section_threedotfive')" style="color: #C06">&bull;</span></td></tr>
        <tr><td><span class="menu_d" id="menu_d4">ALUMNI REUNION</span></td><td><span class="menu_s" id="menu_s4" onmouseover="showMenuCaption(4)" onmouseout="hideMenuCaption(4)" onclick="scrollMe('section_fourth')">&bull;</span></td></tr>
        <tr><td><span class="menu_d" id="menu_d5">LOOK BACK @ JECLAT</span></td><td><span class="menu_s" id="menu_s5" onmouseover="showMenuCaption(5)" onmouseout="hideMenuCaption(5)" onclick="scrollMe('section_fifth')">&bull;</span></td></tr>
        <tr><td><span class="menu_d" id="menu_d6">CONTACT US</span></td><td><span class="menu_s" id="menu_s6" onmouseover="showMenuCaption(6)" onmouseout="hideMenuCaption(6)" onclick="scrollMe('section_sixth')">&bull;</span></td></tr>
        <tr><td><span class="menu_d" id="menu_d7">SPONSOR JECLAT 2012</span></td><td><span class="menu_s" id="menu_s7" onmouseover="showMenuCaption(7)" onmouseout="hideMenuCaption(7)" onclick="scrollMe('section_seventh')">&bull;</span></td></tr>
    </table>
    <!-- section: main -->
    <div id="mother_of_parallax">    	
        <!-- section 0: OHB -->
    	<section class="ohb" id="section_zeroth" data-speed="8" data-offsetY="0" data-type="background">
        	<article>
            	<table border="0" cellpadding="0" cellspacing="0" width="100%"> 
                	<tr>
                    	<td width="90%" align="right" valign="top">
                        	<img id="jgecmasthead" src="style/jgecmasthead50.png" width="538" height="140" border="0" />
                        </td>
                        <td width="10%">&nbsp;</td>                        
                    </tr>
                </table>
                <div class="hitcounter">
					<?php
                        require_once('module-sql-connect.php');
                        //GET MESSAGES
                        $tbl_name=__SQL_TABLE_PREFIX__ . "general";
                        $sql_query="SELECT SUM(attribvalue) AS hitsTotal FROM $tbl_name WHERE attribname='hits_highb' OR attribname='hits_lowb'";
                        $query_result=mysql_query($sql_query);
                        $result_row=mysql_fetch_array($query_result);
                        $hits=$result_row['hitsTotal']+1;
                        $sql_query="UPDATE $tbl_name SET attribvalue=attribvalue+1 WHERE attribname='hits_highb'";
                        $query_result=mysql_query($sql_query);
						echo number_format($hits,0,'.',',') . ' VISITORS';
                    ?>
                    	<br />
                        <span style="font-size: 24px">AND COUNTING<?php if($hits>=1000) { echo '...'; } ?></span>
                </div>
            </article>
        </section>
    	<!-- section 1: intro -->
    	<section class="story" id="section_first" data-speed="8" data-offsetY="-200" data-type="background">
            <article>
            	<table border="0" cellpadding="0" cellspacing="0" width="100%"> 
                	<tr>
                    	<td width="49%" align="right" valign="top">
                        	<img id="herenhappening" src="style/herenhappening.png" width="511" height="325" border="0" />
                        </td>
                        <td width="3%">
                        </td>
                        <td width="48%" align="left" valign="top">
                        	<div id="homeintro">
                            <p style="width: 500px; text-align: left; margin: 0px;">
                            	<b>JECLAT,</b> The Annual Cultural Festival of Jalpaiguri Government Engineering College is back in it's 50th edition. 
                                This 2012, It's Bigger, Better, And More Splendid than ever.
                                <br /><br />
                                So Hold your breath, Take a leap and Dive straight into the Heart of the Celebration. Indulge in
                                <br />
                                <p style="font-size: 48px; margin-top: 10px"><strong>"OJASVIN" &diams; 2 - 10 MARCH, 2012</strong></p>
                            </p>
                            </div>
                        </td>
                    </tr>
                </table>
            </article>
            <div data-type="sprite" data-offsetY2="0" data-offsetY="150" data-Xposition="25%" data-speed="-2.5" style="position: absolute; top: 150px;" >
            	
            </div>
    	</section>
        <!-- section 2: events -->
        <section class="story" id="section_second" data-speed="8" data-type="background">
            <div class="sectionslide" style="left: 0%">
                <article>
                    <table border="0" cellpadding="0" cellspacing="0" width="100%"> 
                        <tr>
                            <td width="50%" align="right" valign="top">
                                <div id="eventsintro" >
                                    <p style="width: 500px; text-align: left;">
                                        <strong style="font-size: 48px">26 EVENTS TO COMPETE IN</strong> 
                                        <br /><br />
                                        This edition of JECLAT brings with itself a torrent of enticing events that will straight-away 
                                        draw you in and plunge you into jubilation.
                                        <br /><br />
                                        So Brace yourselves, Gear Up, and Get Ready for some mind-blowing action.
                                        <br />
                                        <span class="linkwrapper">
                                        	<a class="link" onclick="slideMe('section_second',true)">CHECK OUT EVENT DETAILS &raquo;</a>
                                        </span>
                                    </p>
                                    
                                </div>
                            </td>
                            <td width="50%">&nbsp;</td>
                        </tr>
                    </table>
                </article>
            </div>
            <div class="sectionslide" style="left: 100%; background: rgba(0,0,0,0.7); z-index: 700">
            	<article>
                    <table border="0" cellpadding="0" cellspacing="0" width="100%"> 
                        <tr>
                            <td width="50%" align="right" valign="top">
                                <div id="eventdetails">
                                    <p style="width: 500px; text-align: left;">
                                        <strong style="font-size: 48px">EVENT DETAILS</strong> 
                                        <br /><br />
                                        Click on an event below for details:
                                        
                                    </p>
                                    <script type="text/javascript">
										function doEventDetailsView(eventId)
										{
											document.getElementById("ev_listdata").innerHTML=document.getElementById("evdt_"+eventId).innerHTML;
										}
									</script>
                                    <div class="multicolevents" >
                                    	<a class="linkyear" onclick="doEventDetailsView('band_blast')">Rock-O-Logy!</a><br/> 
                                        <!--<a class="linkyear" onclick="doEventDetailsView('rj_hunt')">RJ Hunt</a><br/>-->                                         
                                    </div>
                                    <p style="width: 500px; text-align: left;">
                                        More to be updated. Keep Checking!
                                        <br />
                                        <span class="linkwrapper">
                                        	<a class="link" onclick="slideMe('section_second',false)">&laquo; BACK</a> | 
                                            <a class="link" onclick="slideMe('section_second',true)">SCHEDULE &raquo;</a>
                                        </span>
                                    </p>
                                </div>
                            </td>
                            <td width="5%"></td>
                            <td width="45%" align="left" valign="top">
                            	<div class="divlistdata" id="ev_listdata">
                                </div>
                                <!-- details for events here -->
                                <div style="display: none">
                                	<div class="eventdetails" id="evdt_band_blast">
                                    	<span class="eventdetailheader">ROCK-O-LOGY</span> <span class="link" style="font-size: 20px">~ Band Blast!</span>
                                        <br /><br />
                                        <a class="link" style="font-size: 20px" href="checkband.php" target="_blank">(get a printer-friendly list of registered bands here)</a>
                                        <br />
                                        <br /><br />
                                        Bands will have to bring their own snares and cymbals.
                                        <br /><br />
                                        Prelims:<br />
                                        &bull; Starts at 2:00 PM<br />
                                        &bull; Each band will get 15 minutes to perform (including sound-check)<br />
                                        &bull; One song of own composition mandatory
                                        <br /><br />
                                        Finals:<br />
                                        &bull; Each band will get 25 minutes to perform (including sound-check)<br />
                                        &bull; Two songs of own composition mandatory
                                        <br /><br />
                                        Registration Fee: <strong>INR 1,000</strong> (will be collected at the time of the event)
                                        <br /><br />
                                        Prizes worth <strong>INR 50,000</strong> to be won!!
                                        <br /><br />
                                        Contact: <b>Neelab S. Chowdhury</b> (+91-9432113241) 
                                        <br /><br />
                                        <table class="eventstable" border="0" cellpadding="4" cellspacing="2" style="width: 450px; text-align:left; vertical-align:top; position: absolute; z-index: 600">
                                            <tr>
                                                <td colspan="2" align="left" valign="top" style="padding-bottom: 10px; border-bottom: 2px dotted rgba(255,255,255,0.4)">
                                                    Register for Band Blast!
                                                </td>                                        
                                            </tr>
                                            <tr valign="top"><td width="140px" style="padding-top: 10px">Band Name</td><td style="padding-top: 10px"><input class="formitems" id="evbb_bandname" type="text" name="bandname" maxlength="256" style="width: 280px" /></td></tr>
                                            <tr valign="top"><td>Place From</td><td><input class="formitems" type="text" name="placefrom" id="evbb_placefrom" maxlength="128" style="width: 200px" /></td></tr>
                                            <tr valign="top"><td>Members</td><td><select name="members" id="evbb_members" class="formitems"><?php for($y=6;$y>=1;$y--) { echo '<option>' . $y . '</option>'; } ?></select></td></tr>
                                            <tr valign="top"><td>Contact Name</td><td><input class="formitems" type="text" name="contactname" id="evbb_contactname" maxlength="256" style="width: 280px" /></td></tr>
                                            <tr valign="top"><td>Phone #</td><td><input class="formitems" type="text" name="phone" id="evbb_phone" maxlength="15" style="width: 200px" /></td></tr>
                                            <tr valign="top"><td>&nbsp;</td><td><input class="formitems" id="evbb_submit" type="submit" name="submit" value=" Submit " onclick="doBandBlastRegister()" /></td></tr>
                                        </table>
                                        <br /><br />
                                        
                                        
                                    </div>
                                    <div id="evdt_rj_hunt">
                                    	<span class="eventdetailheader">RJ HUNT</span>
                                        <br /><br />
                                        <a class="link" style="font-size: 20px" href="checkrjhunt.php" target="_blank">(get a printer-friendly list of online registrations for RJ Hunt here)</a>
                                        <br />
                                        <br /><br />
                                        <strong>Open for all event!</strong>
                                        <br /><br />
                                        Event organized in association with <strong>RADIO MISTI (94.3 FM)</strong>. 
                                        <br /><br />
                                        Winners to host shows at RADIO MISTI (94.3 FM) & the finalist to get grooming sessions at RADIO MISTI (94.3 FM)!!
                                        <br /><br />
                                        Date: <strong>19 February 2012</strong>
                                        <br /><br />
                                        Venue: <strong>City Center, Siliguri</strong>
                                        <br /><br />
                                        Registration Fee: <strong>INR 30</strong>
                                        <br /><br />
                                        <table class="eventstable" border="0" cellpadding="4" cellspacing="2" style="width: 450px; text-align:left; vertical-align:top; position: absolute; z-index: 600">
                                            <tr>
                                                <td colspan="2" align="left" valign="top" style="padding-bottom: 10px; border-bottom: 2px dotted rgba(255,255,255,0.4)">
                                                    Register for RJ Hunt!
                                                </td>                                        
                                            </tr>
                                            <tr valign="top"><td width="140px" style="padding-top: 10px">Name</td><td style="padding-top: 10px"><input class="formitems" id="evrj_name" type="text" name="name" maxlength="256" style="width: 280px" /></td></tr>
                                            <tr valign="top"><td>Mobile #</td><td><input class="formitems" type="text" name="phone" id="evrj_phone" maxlength="15" style="width: 200px" /></td></tr>
                                            <tr valign="top"><td>&nbsp;</td><td><input class="formitems" id="evrj_submit" type="submit" name="submit" value=" Submit " onclick="doRJHuntRegister()" /></td></tr>
                                        </table>
                                    </div>
                                </div>	
                                <!-- end of event details -->
                            </td>
                        </tr>
                    </table>
                </article>
            </div>
            <div class="sectionslide" style="left: 200%; background: rgba(0,0,0,0.9); z-index: 700">
            	<article>
                    <table border="0" cellpadding="0" cellspacing="0" width="100%"> 
                        <tr>
                            <td width="70%" align="right" valign="top">
                                <div >
                                    <p style="width: 670px; text-align: left;">
                                        <strong style="font-size: 48px">SCHEDULE</strong> 
                                        <br /><br />
                                        <table class="scheduletable" style="width: 700px" border="0" cellpadding="0" cellspacing="0" width="100%">
                                        	<tr><td width="200px">01 March 2012</td><td>Blood Donation Camp & Tree Plantation</td></tr>
                                            <tr><td>02 - 06 March 2012</td><td>Inter-college cultural competitions</td></tr>
                                            <tr><td>07 March 2012</td><td>Seminars & Evening commemorating Prof. N.C.Bose <a class="link" style="font-size: 20px; cursor: pointer" onclick="document.getElementById('sch7table').style.display='';">(details)</a></td></tr>
                                            <tr><td>08 March 2012</td><td>Rangotsav (Holi) & Kalpa (Annual Re-Union) <a class="link" style="font-size: 20px; cursor: pointer" onclick="document.getElementById('sch8table').style.display='';">(details)</a></td></tr>
                                            <tr><td>09 March 2012</td><td>Band-Blast</td></tr>
                                            <tr><td>10 March 2012</td><td>45<sup>th</sup> Grand Social Night</td></tr>
                                        </table>
                                        <table class="schedule7table" id="sch7table" style="width: 1000px; display: none" border="0" cellpadding="0" cellspacing="0" width="100%">
                                        	<tr><td width="130px"></td><td align="right"><a class="link" style="font-size: 20px; cursor: pointer" onclick="document.getElementById('sch7table').style.display='none';">[X]</a></td></tr>
                                            <tr><td></td><td>&nbsp;</td></tr>
                                            <tr><td valign="top">10:00 am</td><td>Welcome address by Principal Dr. Jyotirmoy Jhampati</td></tr>
                                            
                                            <tr><td>10:30 am - 11:45 am</td><td>Speech by Cognizant (CTS) group on Cloud Computing by Mr. S. Mukherjee</td></tr>
                                            <tr><td>11:50 am - 12:20 pm</td><td>Lecture on Developemnt of capabilities (a career guide speech related to talent development), by Siddhartha Ghoshal, Director, GE</td></tr>
                                            <tr><td>12:30 pm  - 1:00 pm</td><td>Lecture by T. Chackroborty</td></tr>
                                            <tr><td>1:05 pm - 1:20 pm</td><td>Presentation by students</td></tr>
                                            <tr><td>1:20pm - 2:00 pm</td><td>Lecture by A. Sil</td></tr>
                                            
                                            <tr><td></td><td>&nbsp;</td></tr>
                                            <tr><td valign="top">4:30 pm</td><td>Inauguration of the statue of Prof. N. C. Bose.</td></tr>
                                            <tr><td valign="top">4:45 pm - 5:30pm</td><td>Program to commemorate Prof. N. C. Bose, with speeches from Principal, Sri. S. Bose & ex-students, JGEC</td></tr>
                                            <tr><td valign="top">5:45 pm - 6:30 pm</td><td>Prize distribution ceremony of JECLAT '12</td></tr>
                                            <tr><td></td><td>&nbsp;</td></tr>
                                            <tr><td valign="top">6:45 pm - 8 pm</td><td>Cultural presentations by the students of JGEC with presentations of various student activities carried out at JGEC</td></tr>
                                            
                                            <tr><td></td><td>&nbsp;</td></tr>
                                            
                                            
                                        </table>
                                        <table class="schedule7table" id="sch8table" style="width: 1000px; display: none" border="0" cellpadding="0" cellspacing="0" width="100%">
                                        	<tr><td width="130px"></td><td align="right"><a class="link" style="font-size: 20px; cursor: pointer" onclick="document.getElementById('sch8table').style.display='none';">[X]</a></td></tr>
                                            <tr><td></td><td>&nbsp;</td></tr>
                                            
                                            <tr><td>09:00 AM</td><td>Registration</td></tr>
                                            <tr><td>10:00 AM</td><td>Inauguration of Rangotsav</td></tr>
                                            <tr><td>10:30 AM</td><td>Rabindranitya</td></tr>
                                            <tr><td>11:00 AM</td><td>Cultural Performance by Saptasu</td></tr>
                                            <tr><td>04:30 PM</td><td>Tea Party for Alumni followed by Dance Performance by "Jyoti" students.</td></tr>
                                            <tr><td>05:30 PM</td><td>Alum Speak</td></tr>
                                            <tr><td>08:15 PM</td><td>Performance by S. Bhattacharya</td></tr>
                                            <tr><td>08:45 PM</td><td>Performance by Ether</td></tr>
                                            <tr><td>10:00 PM</td><td>Dinner Break</td></tr>
                                            <tr><td>11:00 PM</td><td>Ex-Calliphony Performance</td></tr>
                                            
                                            
                                            <tr><td></td><td>&nbsp;</td></tr>
                                            
                                            
                                        </table>
                                        <br />
                                        <span class="linkwrapper">
                                        	<a class="link" onclick="slideMe('section_second',false)">&laquo; BACK</a>
                                        </span>
                                    </p>
                                </div>
                            </td>
                            <td width="30%">&nbsp;</td>
                        </tr>
                    </table>
                </article>
            </div>			
        </section>
        <!-- section 3: social (proshows) -->
        <section class="story" id="section_third" data-speed="8" data-type="background">
            <br /><br />
            <div class="sectionslide" style="left: 0%">
                <article>
                    <table border="0" cellpadding="0" cellspacing="0" width="100%"> 
                        <tr>
                            <td width="50%" align="right" valign="top">
                                <div id="socialintro" >
                                    <p style="width: 500px; text-align: left;">
                                        <strong style="font-size: 48px">45TH GRAND SOCIAL NIGHT</strong> 
                                        <br /><br />
                                        The most 'looked forward to' night of the year in the town, the 45th Grand Social Night @ J' 2012
                                        promises to take it all to the next level.
                                        <br /><br />
                                        Heart-rending melodies to 50K Watts of sheer head-banging power: if you want it all - then yeah, you got it all!
                                        <br />
                                        <span class="linkwrapper">
                                        	<a class="link" onclick="slideMe('section_third',true)">SO WHO'S DA ROCKSTAR? &raquo;</a>
                                        </span>
                                    </p>
                                </div>
                            </td>
                            <td width="50%">&nbsp;</td>                            
                        </tr>
                    </table>
                </article>
            </div>
            <div class="sectionslide" style="left: 100%; background: rgba(0,0,0,0.9); z-index: 700">
            	<article>
                    <table border="0" cellpadding="0" cellspacing="0" width="100%"> 
                        <tr>
                            <td width="70%" align="right" valign="top">
                                <div>
                                    <p style="width: 800px; text-align: left;">
                                        <strong style="font-size: 48px">SO WHO'S DA ROCKSTAR?</strong> 
                                        <br /><br />
                                        <!--
                                        The JECLAT Grand Social Night has seen many mesmerising performances by various 
                                        nationally as well as internationally celebrated artists - K.K., Javed Ali, Undying Inc., 
                                        Breath of Floyd, Euphoria, Parikrama, Indian Ocean, Pentagram, Warfaze, Bandish Fusion to name a few...
                                        <br /><br />
                                        Now everyone's excited about who's in the box this year. Don't worry, we'll let you know 
                                        very soon. Keep checking!
                                        -->
                                        <img src="style/socialstarsw.png" height="365" width="789" />
                                        <br />
                                        <span class="linkwrapper">
                                        	<a class="link" onclick="slideMe('section_third',false)">&laquo; BACK</a>
                                        </span>
                                    </p>
                                </div>
                            </td>
                            <td>&nbsp;</td>
                        </tr>
                    </table>
                </article>
            </div>            
            <div class="sprite" data-type="spritehor" data-offsetY2="2200" data-offsetX="0" data-offsetY="130" data-Xposition="25%" data-speed="0.5" style="position: absolute; top: 130px; left: 200%; z-index: 1000 ">
            	<img src="style/rockstar.png" width="345" height="678" border="0"/>
            </div>
            
        </section>
        <!-- section 3.5: holi -->
        <section class="story" id="section_threedotfive" data-speed="8" data-offsetY="0" data-type="background">
            <article>
            	<table border="0" cellpadding="0" cellspacing="0" width="100%"> 
                	<tr>
                    	<td width="50%" align="right" valign="top">
                        	<div id="holiintro">
                                <p style="width: 500px; text-align: left;">
                                    <strong style="font-size: 48px"><span id="rangotsav">RANGOTSAV</span></strong> 
                                    <br /><br />
                                    J' 2012 is going to add colour to life. Literally.
                                    <br /><br />
                                    Celebrating the great Indian festival of Holi as a part JECLAT this year, J' 2012 will take
                                    the fun and frolick to greater heights. Complete with a playing with colours in the morning
                                    to mesmerizing Manipuri &amp; Local Tribal dance performance and beverage in the evening, 
                                    this Holi at JGEC will be a day you'll never want to forget!
                                    <br />
                                    
                                </p>
                            </div>                        
                        </td>
                        <td width="50%" align="left" valign="top">
                        </td>
                    </tr>
                </table>
            </article>
            <div class="sprite" data-type="spritehor" data-offsetY2="3200" data-offsetX="0" data-offsetY="330" data-Xposition="25%" data-speed="0.5" style="position: absolute; top: 360px; left: 200%; z-index: 1000 ">
            	<img src="style/hands.png" width="424" height="347" border="0"/>
            </div>
    	</section>
        <!-- section 4: reunion (alumni) -->
        <section class="story" id="section_fourth" data-speed="8" data-offsetY="200" data-type="background">
            <div class="sectionslide" style="left: 0%">
                <article>
                    <table border="0" cellpadding="0" cellspacing="0" width="100%"> 
                        <tr>
                            <td width="50%" align="right" valign="top">
                                <div id="reunionintro" >
                                    <p style="width: 500px; text-align: left;">
                                        <strong style="font-size: 48px">ALUMNI REUNION</strong> 
                                        <br /><br />
                                        What is a tree without its roots? What are we if not flourished on the ramifications of our past?
                                        <br /><br />
                                        Keeping with the spirit, J' 2012 targets to arrange the biggest &amp; the best Alumni ReUnion ever, 
                                        focussing on strengthening the ties from our past to our future. 
                                        <br />
                                        <span class="linkwrapper">
                                        	<a class="link" onclick="slideMe('section_fourth',true)">SEE WHO ARE COMING &raquo;</a>
                                        </span>
                                    </p>
                                </div>
                            </td>
                            <td width="50%">&nbsp;</td>
                        </tr>
                    </table>
                </article>
            </div>
            <div class="sectionslide" style="left: 100%; background: rgba(0,0,0,0.7); z-index: 700">
            	<article>
                    <table border="0" cellpadding="0" cellspacing="0" width="100%"> 
                        <tr>
                            <td width="50%" align="right" valign="top">
                                <div id="reunioncoming">
                                    <p style="width: 500px; text-align: left;">
                                        <strong style="font-size: 48px">WHAT'S YOUR PLAN FOR J' 12?</strong> 
                                        <br /><br />
                                        If you are a "Jolu" Alumni, we'd be delighted to know what you are planning this JECLAT!
                                        <br /><br />
                                        Please take a minute to fill in our alumni form so that we can prepare better for the forthcoming ReUnion.
                                        <br />
                                        <span class="linkwrapper">
                                        	<a class="link" onclick="slideMe('section_fourth',false)">&laquo; BACK</a> | 
                                            <a class="link" onclick="slideMe('section_fourth',true)">VIEW A LIST OF WHO HAVE &raquo;</a>
                                        </span>
                                    </p>
                                </div>
                            </td>
                            <td width="5%"></td>
                            <td width="45%" align="left" valign="top">
                            	<div>
                                	<table class="alumnitable" border="0" cellpadding="4" cellspacing="2" style="width: 450px; text-align:left; vertical-align:top; position: absolute; z-index: 600">
                                        <tr>
                                            <td colspan="2" align="left" valign="top" style="padding-bottom: 10px; border-bottom: 2px dotted rgba(255,255,255,0.4)">
                                                Please let us know
                                            </td>                                        
                                        </tr>
                                        <tr valign="top"><td width="140px" style="padding-top: 10px">Your Name</td><td style="padding-top: 10px"><input class="formitems" id="af_name" type="text" name="name" maxlength="256" style="width: 280px" /></td></tr>
                                        <tr valign="top"><td>College Nickname</td><td><input class="formitems" type="text" name="collegenick" id="af_nick" maxlength="128" style="width: 200px" title="We all love to know this :)" />&nbsp;<span style="font-weight: normal; font-size: 11px; color: #ccc"><em>(Optional)</em></span></td></tr>
                                        <tr valign="top"><td>Year of Passing</td><td><select name="year" id="af_year" class="formitems"><?php for($y=2011;$y>=1966;$y--) { echo '<option>' . $y . '</option>'; } ?></select></td></tr>
                                        <tr valign="top"><td>Department</td><td><select name="department" id="af_deptt" class="formitems"><option>CE</option><option>CSE</option><option>ECE</option><option>EE</option><option>IT</option><option>ME</option></select></td></tr>
                                        <tr valign="top"><td>Presently working in</td><td><input class="formitems" type="text" name="company" id="af_company" maxlength="256" style="width: 280px" /></td></tr>
                                        <tr valign="top"><td>Contact Address</td><td><textarea class="formitems" name="address" id="af_address" style="width: 280px; height: 60px" title="1024 Characters Max"></textarea></td></tr>
                                        <tr valign="top"><td>Phone #</td><td><input class="formitems" type="text" name="phone" id="af_phone" maxlength="15" style="width: 200px" /></td></tr>
                                        <tr valign="top"><td>Email Address</td><td><input class="formitems" type="text" name="emailid" id="af_email" maxlength="256" style="width: 280px" /></td></tr>
                                        <tr valign="top"><td>Attending J' 12?</td><td><select name="attendingstatus" id="af_status" class="formitems"><option>Yes</option><option>No</option><option>Maybe</option></select></td></tr>
                                        <tr valign="top"><td>&nbsp;</td><td><input class="formitems" id="af_submit" type="submit" name="submit" value=" Submit " onclick="doAlumniRegister()" /></td></tr>
                                    </table>
                                </div>
                            </td>
                        </tr>
                    </table>
                </article>
            </div>
            <div class="sectionslide" style="left: 200%; background: rgba(0,0,0,0.7); z-index: 700">
            	<article>
                    <table border="0" cellpadding="0" cellspacing="0" width="100%"> 
                        <tr>
                            <td width="50%" align="right" valign="top">
                                <div id="reunionlist">
                                    <p style="width: 500px; text-align: left;">
                                        <strong style="font-size: 48px">SEE WHO'S DOING WHAT</strong> 
                                        <br /><br />
                                        Here's a list of all those who have let us know; grouped into their year of passing. Click on a year to open its list:                                        
                                    </p>
                                    <div class="multicolyear" id="af_yeardata">
                                        <?php
                                            require_once('module-config.php');
                                            require_once('module-sql-connect.php'); 
                                            $tbl_name=__SQL_TABLE_PREFIX__ . "alumni";
                                            $sql_query="SELECT DISTINCT(yearofpassout) FROM $tbl_name ORDER BY yearofpassout DESC";
                                            $query_result=mysql_query($sql_query);
                                            $yearpresent=0;
                                            while($row=mysql_fetch_array($query_result))
                                            {
                                                $year=$row['yearofpassout'];
                                                echo '<a class="linkyear" onclick="doAlumniListView(' . $year . ')">' . $year . '</a> <br/> ';
                                                $yearpresent=1;
                                            }
                                        ?>
                                    </div>
                                    <p style="width: 500px; text-align: left;">    
										<span id="af_yearview_nodata"><?php if($yearpresent==0) { echo 'No registrations yet!'; } ?></span>
                                        <br />
                                        <span class="linkwrapper">
                                        	<a class="link" onclick="slideMe('section_fourth',false)">&laquo; BACK</a>
                                        </span>
                                    </p>
                                </div>
                            </td>
                            <td width="5%"></td>
                            <td width="45%" align="left" valign="top">
                            	<div class="divlistdata" id="af_listdata">
                                </div>
                            </td>
                        </tr>
                    </table>
                </article>
            </div>
        </section>
        <!-- section 5: lookback (gallery) -->
        <section class="story" id="section_fifth" data-speed="8" data-offsetY="200" data-type="background">
            <br /><br />
            <article>
                <div id="galleryintro" style="width: 100%; text-align: center; position: absolute; top: 70px;">                    
                    <center>
                    <p style="width: 940px; text-align:left">
                    	<strong style="font-size: 48px">LOOK BACK @ JECLAT :: IRINA (2011) &amp; MARDI GRAS (2010)</strong> 
                    </p>
                    <input type="hidden" id="galleryboolean" value="false"/>
                    <!-- orbit slider for images -->
                    <div style="border: thick solid #fff; width: 940px; height: 600px">
                        <div id="orbit_gallery">  
                        	<img src="style/gallery/1.jpg" data-caption="#caption_1" />                                                      
                        </div>
                    </div>
                    </center>
                        <!-- Captions for Orbit -->
                        <span class="orbit-caption" id="caption_1">Inauguration Ceremony :: Jeclat 2011 Irina</span>
                        <span class="orbit-caption" id="caption_2">Undying Inc. @ 44th Grand Social Night :: Jeclat 2011 Irina</span>
                        <span class="orbit-caption" id="caption_3">Warfaze @ 44th Grand Social Night :: Jeclat 2011 Irina</span>
                        <span class="orbit-caption" id="caption_4">K.K. @ 44th Grand Social Night :: Jeclat 2011 Irina</span>
                        <span class="orbit-caption" id="caption_5">Alumni Talk :: Jeclat 2011 Irina</span>
                        <span class="orbit-caption" id="caption_6">Band-Blast :: Jeclat 2010 Mardi Gras</span>
                        <span class="orbit-caption" id="caption_7">Singing Competitions &amp; Performances :: Jeclat 2010 Mardi Gras</span>
                        <span class="orbit-caption" id="caption_8">Dance Performances :: Jeclat 2010 Mardi Gras</span>
                        <span class="orbit-caption" id="caption_9">Awards :: Jeclat 2010 Mardi Gras</span>
                        <span class="orbit-caption" id="caption_10">Prithibi @ 43rd Grand Social Night :: Jeclat 2010 Mardi Gras</span>
                        <span class="orbit-caption" id="caption_11">Breath of Floyd @ 43rd Grand Social Night :: Jeclat 2010 Mardi Gras</span>
                        <span class="orbit-caption" id="caption_12">Zubeen Garg @ 43rd Grand Social Night :: Jeclat 2010 Mardi Gras</span>
                    <!-- end orbit -->
                </div>
            </article>
        </section>
        <!-- section 6: contact/feedback  -->
        <section class="story" id="section_sixth" data-speed="8" data-offsetY="400" data-type="background">
            <br /><br />
            <article>
                <table id="contacttable" border="0" cellpadding="0" cellspacing="0" width="100%"> 
                	<tr>
                    	<td width="45%" align="right" valign="top">
                        	<!-- vcarousel feedback scroller -->
                            <div id="vcarouselwrapper">
                                <div  class="v-carousel-mask">
                                    <ul id="vcarousel_ul">
                                    	<?php
												require_once('module-config.php');
												require_once('module-sql-connect.php'); 
												$tbl_name=__SQL_TABLE_PREFIX__ . "feedback";
												$sql_query="SELECT fid, message, name FROM $tbl_name ORDER BY fid DESC LIMIT 0,100";
												$query_result=mysql_query($sql_query);
												$printed=0;
												$mfid=0;
												while($row=mysql_fetch_array($query_result))
												{
													$fid=stripslashes($row['fid']);
													if($fid>$mfid) { $mfid=$fid; }
													$name=stripslashes($row['name']);
													$message=stripslashes($row['message']);
													echo '<li><b>' . $message . '</b><br /><br /><em style="font-size: 11px; color: #ccc"> - ' . $name . '</em></li>';
													$printed=1;
												}												
										 ?>
                                    </ul>
                                    <input type="hidden" id="ff_lastid" value="<?php echo $mfid; ?>" />
                                </div>
                                <br /><br /><br />
                                <table class="feedbacktable" border="0" cellpadding="4" cellspacing="2" style="width: 450px; text-align:left; vertical-align:top; position: absolute; z-index: 600">
                                	<tr>
                                    	<td colspan="2" align="left" valign="top" style="padding-bottom: 10px; border-bottom: 2px dotted rgba(255,255,255,0.4)">
                                        	Want to say something to us?
                                        </td>                                        
                                    </tr>
                                    <tr>
                                    	<td width="90px" align="left" valign="top" style="padding-top: 10px">
                                        	Your Name
                                        </td>
                                        <td align="left" valign="top" style="padding-top: 10px">
                                        	<input class="formitems" type="text" id="ff_name" name="username" value="" maxlength="128" style="width: 340px" />
                                        </td> 
                                    </tr>
                                    <tr>
                                    	<td align="left" valign="top">
                                        	Email
                                        </td>
                                        <td align="left" valign="top">
                                        	<input class="formitems" type="text" id="ff_email" name="email" value="" maxlength="256" style="width: 340px" />
                                        </td>
                                    </tr>
                                    <tr>
                                    	<td align="left" valign="top">
                                        	Feedback
                                        </td>
                                        <td align="left" valign="top">
                                        	<textarea class="formitems" id="ff_feedback" name="feedback" style="width: 340px; height: 60px;" title="900 Characters Max"></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                    	<td align="left" valign="top">&nbsp;
                                        	
                                        </td>
                                        <td align="left" valign="top">
                                        	<input class="formitems" id="ff_submit" type="submit" name="submit" value=" Submit " onclick="doFeedback()" />
                                        </td>
                                    </tr>
                                    
                                </table>
                            </div>
                        	<!-- end of feedback scroller -->
                        </td>
                        <td width="5%">&nbsp;</td>
                        <td width="50%" align="left" valign="top">
                        	<div id="contactintro" >
                                <p style="width: 500px; text-align: left;">
                                    <strong style="font-size: 48px">CONTACT US</strong> 
                                    <br />
                                    <table class="tablecontacts" border="0" cellpadding="2" cellspacing="2" width="100%">
                                    	<tr>
                                        	<td width="10%">&nbsp;</td>
                                            <td width="45%" valign="top" align="left"><strong>Arnab Sarkar</strong><br /><span class="linkwrapper" style="padding-top: 0px;"><a class="link" style="font-size: 28px" href="mailto:arnab.s@jeclat.in">arnab.s@jeclat.in</a></span><br />+91 9475246010<br /><br /></td>
                                            <td valign="top" align="left"><strong>Neelab S. Chowdhury</strong><br /><span class="linkwrapper" style="padding-top: 0px;"><a class="link" style="font-size: 28px" href="mailto:abhishek.c@jeclat.in">neelab.c@jeclat.in</a></span><br />+91 9432113241<br />(Rock-O-Logy)<br /></td>
                                        </tr>
                                        <tr>
                                        	<td>&nbsp;</td>
                                            <td valign="top" align="left"><strong>Nilayan Patra</strong><br /><span class="linkwrapper" style="padding-top: 0px;"><a class="link" style="font-size: 28px" href="mailto:nilayan.p@jeclat.in">nilayan.p@jeclat.in</a></span><br />+91 9593312803<br /><br /></td>
                                            <td valign="top" align="left"></td>
                                        </tr>
                                        <tr>
                                        	<td>&nbsp;</td>
                                        	<td valign="top" align="left"><strong>Abhishek Chatterjee</strong><br /><span class="linkwrapper" style="padding-top: 0px;"><a class="link" style="font-size: 28px" href="mailto:abhishek.c@jeclat.in">abhishek.c@jeclat.in</a></span><br />+91 9932585023<br /><br /></td>
                                            <td valign="top" align="left"><strong></td>
                                        </tr>                                        
                                    </table>
                                    <p>For any kind of query, suggestion, or other feedback, feel free to 
                                    drop a mail at <span class="linkwrapper" style="padding-top: 0px;"><a class="link" style="font-size: 28px" href="mailto:mail@jeclat.in">mail@jeclat.in.</a></span>
                                    </p>
                                </p>
                            </div>
                        </td>
                    </tr>
                </table>
            </article>
            <!--<div data-type="sprite" data-offsetY2="2200" data-offsetY="400" data-Xposition="25%" data-speed="-2" style="position: absolute; top: 400px; left: 300px; border: thick solid #f00"></div>
            -->
        </section>
        <!-- section 7: BMB1: SPONSORS -->
    	<section class="bmb_sponsor" id="section_seventh" data-speed="8" data-offsetY="800" data-type="background">
        	<article>
            	<table border="0" cellpadding="0" cellspacing="0" width="100%"> 
                	<tr>
                    	<td width="50%" align="right" valign="top">
                        	<p id="sponsorintro" style="width: 500px; text-align: left">
                            	<strong style="font-size: 48px">WANT TO SPONSOR<br />JECLAT 2012?</strong> 
                                <BR /><BR />
                                We would love to contact you! Please drop a mail 
                                <br />
                                <span class="linkwrapper" style="padding-top: 0px; font-size: 28px">at <a class="link" style="font-size: 28px" href="mailto:sponsorship@jeclat.in">sponsorship@jeclat.in</a>  or simply contact any </span>
                                <br />
                                of the above!
                            </p>
                        </td>
                        <td width="50%">&nbsp;</td>
                    </tr>
                </table>
                <img src="style/pastsponsors.png" height="250" width="619" border="0" style="position: absolute; right: 25px; top: 25px" />
            </article>
        </section>
        <!-- section 8: BMB2: pre-FOOTER -->
        <section class="bmb_prefooter" id="section_eighth" data-speed="8" data-offsetY="800" data-type="background">
        	<article>
            	<table border="0" cellpadding="0" cellspacing="0" width="100%"> 
                	<tr>
                    	<td width="50%" align="right" valign="top">
                        	<p id="sponsorwho" style="width: 500px; text-align: left">
                            	<strong style="font-size: 48px">OUR SPONSORS<br />&amp; PARTNERS</strong>                                 
                            </p>
                            <p style="text-align: left; width: 500px">
                            	Download our <span class="linkwrapper" style="padding-top: 0px;"><a class="link" style="font-size: 28px" href="downloads/tariff.pdf" target="_blank">Sponsorship Tariff-Card.</a></span>
                            </p>
                        </td>
                        <td width="50%">&nbsp;</td>
                    </tr>
                </table>
                <a style="position: absolute; right: 280px; top: 25px; z-index: 600" target="_blank" href="#">
                	<img src="style/sponsors_siem.png" height="106" width="326" border="0" style="" />
                </a>                
                <a style="position: absolute; right: 170px; top: 25px; z-index: 600" target="_blank" href="#">
                	<img src="style/sponsors_cts.png" height="106" width="106" border="0" style="" />
                </a>
                <a style="position: absolute; right: 60px; top: 25px; z-index: 600" target="_blank" href="#">
                	<img src="style/sponsors_globesyn.png" height="106" width="106" border="0" style="" />
                </a>
                
                <a style="position: absolute; right: 500px; top: 135px; z-index: 600" target="_blank" href="http://www.freshersworld.com/on-campus/campus-fest/JECLAT+2012+Ojasvin">
                	<img src="style/sponsors_freshersworld.png" height="106" width="106" border="0" style="" />
                </a>
                <a style="position: absolute; right: 390px; top: 135px; z-index: 600" target="_blank" href="#">
                	<img src="style/sponsors_radiopartner.png" height="106" width="106" border="0" style="" />
                </a>
                <a style="position: absolute; right: 280px; top: 135px; z-index: 600" target="_blank" href="#">
                	<img src="style/sponsors_radiohigh.png" height="106" width="106" border="0" style="" />
                </a>
                <a style="position: absolute; right: 170px; top: 135px; z-index: 600" target="_blank" href="http://www.careers360.com">
                	<img src="style/sponsors_careers360.png" height="106" width="106" border="0" style="" />
                </a>
                <a style="position: absolute; right: 60px; top: 135px; z-index: 600" target="_blank" href="http://www.jammag.com">
                	<img src="style/sponsors_jam.png" height="106" width="106" border="0" style="" />
                </a>
                
                
                <a style="position: absolute; right: 500px; top: 245px; z-index: 600" target="_blank" href="#">
                	<img src="style/sponsors_citycenter.png" height="106" width="106" border="0" style="" />
                </a>
                <a style="position: absolute; right: 390px; top: 245px; z-index: 600" target="_blank" href="http://www.eventsfeeder.com/ojasvin">
                	<img src="style/sponsors_feeder.png" height="106" width="106" border="0" style="" />
                </a>
                <a style="position: absolute; right: 280px; top: 245px; z-index: 600" target="_blank" href="http://www.faadooengineers.com">
                	<img src="style/sponsors_faadoo.png" height="106" width="106" border="0" style="" />
                </a>
                <a style="position: absolute; right: 170px; top: 245px; z-index: 600" target="_blank" href="http://www.studentindia.com">
                	<img src="style/sponsors_studentindia.png" height="106" width="106" border="0" style="" />
                </a>
                <a style="position: absolute; right: 60px; top: 245px; z-index: 600" target="_blank" href="http://www.knowafest.com">
                	<img src="style/sponsors_knowafest.png" height="106" width="106" border="0" style="" />
                </a>
                
                <a style="position: absolute; right: 500px; top: 355px; z-index: 600" target="_blank" href="http://www.indiaeducation.net">
                	<img src="style/sponsors_indiaeducation.png" height="106" width="106" border="0" style="" />
                </a>
                <a style="position: absolute; right: 390px; top: 355px; z-index: 600" target="_blank" href="#">
                	<img src="style/sponsors_ratnadeep.png" height="106" width="106" border="0" style="" />
                </a>
                <a style="position: absolute; right: 280px; top: 355px; z-index: 600" target="_blank" href="http://www.timesofnorth.com">
                	<img src="style/sponsors_ton.png" height="106" width="106" border="0" style="" />
                </a>
                <a style="position: absolute; right: 170px; top: 355px; z-index: 600" target="_blank" href="#">
                	<img src="style/sponsors_stupidsid.png" height="106" width="106" border="0" style="" />
                </a>
                <a style="position: absolute; right: 60px; top: 355px; z-index: 600" target="_blank" href="http://www.indiaeducation.net">
                	<img src="style/sponsors_greenyatra.png" height="106" width="106" border="0" style="" />
                </a>
                
                <a style="position: absolute; right: 500px; top: 465px; z-index: 600" target="_blank" href="#">
                	<img src="style/sponsors_uttorersaradin.png" height="106" width="106" border="0" style="" />
                </a>
                <a style="position: absolute; right: 390px; top: 465px; z-index: 600" target="_blank" href="#">
                	<img src="style/sponsors_sofr.png" height="106" width="106" border="0" style="" />
                </a>
                <a style="position: absolute; right: 280px; top: 465px; z-index: 600" target="_blank" href="#">
                	<img src="style/sponsors_htv.png" height="106" width="106" border="0" style="" />
                </a>
                <a style="position: absolute; right: 170px; top: 465px; z-index: 600" target="_blank" href="#">
                	<img src="style/sponsors_amaruttorbangla.png" height="106" width="106" border="0" style="" />
                </a>
                <a style="position: absolute; right: 60px; top: 465px; z-index: 600" target="_blank" href="#">
                	<img src="style/sponsors_e365.png" height="106" width="106" border="0" style="" />
                </a>
                
                <a style="position: absolute; right: 500px; top: 575px; z-index: 600" target="_blank" href="#">
                	<img src="style/sponsors_tt.png" height="106" width="106" border="0" style="" />
                </a>
                <a style="position: absolute; right: 390px; top: 575px; z-index: 600" target="_blank" href="#">
                	<img src="style/sponsors_hitech.png" height="106" width="106" border="0" style="" />
                </a>
                <a style="position: absolute; right: 280px; top: 575px; z-index: 600" target="_blank" href="#">
                	<img src="style/sponsors_aircel.png" height="106" width="106" border="0" style="" />
                </a>
                <a style="position: absolute; right: 170px; top: 575px; z-index: 600" target="_blank" href="#">
                	<img src="style/sponsors_spectrum.png" height="106" width="106" border="0" style="" />
                </a>
                
                
            </article>
        </section>                
        <!-- section 9: BMB3: FOOTER -->
    	<section class="bmb_footer" id="section_ninth" data-speed="8" data-offsetY="0" data-type="background">
        	<div style="text-align:center; padding-top: 4px">
            	COPYRIGHT &copy; 2011-2012. J' 12 CREATIVE TEAM :: JECLAT 2012 COMMITTEE. ALL RIGHTS RESERVED. 
                <br />
            </div>
        </section>        
        <?php mysql_close($con); ?>
        <!-- section X: CANVAS FOR LINES -->
        <canvas id="canvas_lines"></canvas>        
    </div>
    <div id="mother_of_wibiya">

        <!-- 
        	<script src="http://cdn.wibiya.com/Toolbars/dir_1002/Toolbar_1002510/Loader_1002510.js" type="text/javascript"></script><noscript><a href="http://www.wibiya.com/">Web Toolbar by Wibiya</a></noscript> 
    	-->
        
    </div>
</body>
</html>