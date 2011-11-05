
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
	<HEAD>
		<title>File Upload</title>
		<meta content="Microsoft Visual Studio .NET 7.1" name="GENERATOR">
		<meta content="Visual Basic .NET 7.1" name="CODE_LANGUAGE">
		<meta content="JavaScript" name="vs_defaultClientScript">
		<meta content="http://schemas.microsoft.com/intellisense/ie5" name="vs_targetSchema">
		<link rel="stylesheet" href="/_Fileroot/Clnt-391/Mod-661/Pkg-1137/Prod/style.css" type="text/css">
		<script language="javascript" type="text/javascript">
			function processing()
			{			
				document.getElementById("processing").style.display = "none";
				document.getElementById("upload").style.display = "none";
				document.getElementById("uploadButton").style.display = "none";
				Msg.innerHTML = ""
							
			    
				if  (document.frmUpload.fileUpload.value != "" )
				{
				    var blnFileOK = false;
					var strDocExt = new Array ;
				    var strfileExt = document.frmUpload.fileUpload.value
				   //  Added the below code to allow file extensions like (sampleTest's.test.new.doc)
				    strDocExt = strfileExt.lastIndexOf(".");
				    var len = strfileExt.length;
				    var strStripExt,strExt ;
				    strStripExt = strfileExt.substring(strDocExt,len);
				    
				    var strSplitQID = new Array ;
				    
				    strExt =".doc,.rtf,.xls,.txt,.pdf,.wpd,.docx,.xlsx";
				    
				    
				    strSplitQID = strExt.split(",");
				    
				    for (i = 0; i < strSplitQID.length ; i++)
                    {
                                             
                      if (strSplitQID[i].indexOf(strStripExt.toLowerCase()) > -1)
                         {
					        blnFileOK = true
					     }   
			    	}
			    		
					if (blnFileOK == false)
					{
						document.getElementById("processing").style.display = "none";
						document.getElementById("upload").style.display = "";
						document.getElementById("uploadButton").style.display = "";
						alert("Please select a file of the following type to upload: *.doc, *.rtf, *.xls, *.wpd, *.txt, *.pdf, *.docx, *.xlsx");
						return false;
					}
					else
					{
						//display the div tag containing the animated GIF. Browsers have an issue annimating a file
						//which is placed within a hidden element. setTimeout is used to reset the element's inner
						//html
						setTimeout('document.getElementById("processing").innerHTML = document.getElementById("processing").innerHTML', 200);	
						document.getElementById("processing").style.display = "";
						document.getElementById("upload").style.display = "none";
						document.getElementById("uploadButton").style.display = "none";
						return true;
					}
				 
				}
				else
				{
					document.getElementById("processing").style.display = "none";
					document.getElementById("upload").style.display = "";
					document.getElementById("uploadButton").style.display = "";
					alert("Please select a file to upload.");
					return false;
				}
			}
		</script>
	</HEAD>
	<body MS_POSITIONING="GridLayout">
	<noscript>In order to use the system, please make sure that Javascript is enabled on your machine</noscript>
		<form name="frmUpload" method="post" action="Upload.aspx?AYID=0826C4E-7647-4BA2-B29B-B2DB3572A15&amp;pid=F25E2E964FA6FC5A0A1125EE45BD9C64AB816A34&amp;q=206276&amp;a=531745294&amp;s=7590" id="frmUpload" enctype="multipart/form-data">
<input type="hidden" name="__EVENTTARGET" id="__EVENTTARGET" value="" />
<input type="hidden" name="__EVENTARGUMENT" id="__EVENTARGUMENT" value="" />
<input type="hidden" name="__VIEWSTATE" id="__VIEWSTATE" value="/wEPDwUKMTA0MDkwODkyMmQYAQUeX19Db250cm9sc1JlcXVpcmVQb3N0QmFja0tleV9fFgIFCWJ0blN1Ym1pdAUGSW1hZ2UxRTZt5VUu9Ybv/Ib0MNAw4unDfM8=" />

<script type="text/javascript">
<!--
var theForm = document.forms['frmUpload'];
if (!theForm) {
    theForm = document.frmUpload;
}
function __doPostBack(eventTarget, eventArgument) {
    if (!theForm.onsubmit || (theForm.onsubmit() != false)) {
        theForm.__EVENTTARGET.value = eventTarget;
        theForm.__EVENTARGUMENT.value = eventArgument;
        theForm.submit();
    }
}
// -->
</script>


<input type="hidden" name="__EVENTVALIDATION" id="__EVENTVALIDATION" value="/wEWAgLCnLTmBQLf2eqGA3wgrXcIPOEelOlmcI6i8REE+4AS" />
			<div align="center">
				<table cellSpacing="0" cellPadding="0" width="350" align="center" border="0">
					<tr>
						<td class="HelpBoxes" vAlign="top" align="left" rowSpan="5"><IMG height="1" src="../Images/common_images/spacer.gif" alt="" width="1"></td>
						<td class="HelpBoxes" colSpan="2"><IMG height="1" src="../Images/common_images/spacer.gif" alt=""  width="348"></td>
						<td class="HelpBoxes" vAlign="top" align="left" rowSpan="5"><IMG height="1" src="../Images/common_images/spacer.gif" alt=""  width="1"></td>
					</tr>
					<tr>
						<td class="HelpBoxes" vAlign="middle" align="left">&nbsp;<font class="HelpBoxesFont" size="2"><b>File 
									Upload</b></font></td>
						<td class="HelpBoxes" vAlign="middle" align="right">&nbsp; <A href="javascript:self.close();">
								<IMG src="../Images/common_images/close_window_large.gif" alt="Close Window" border="0"></A>&nbsp;</td>
					</tr>
					<tr>
						<td vAlign="top" align="left" colSpan="2" height="3"><IMG height="3" src="../Images/common_images/spacer.gif" alt=""  width="100"></td>
					</tr>
					<tr>
						<td vAlign="top" align="center" colSpan="2">
							<table cellSpacing="0" cellPadding="0" width="300" border="0">
								<tr>
									<td class="BasePageFont" vAlign="top" align="left">
										<div id="Msg"></div>
									</td>
								</tr>
								
								<tr>
									<td class="BasePageFont" vAlign="top" align="left">
										<div id="upload" align="justify">
											<br>
											Please select a file to upload using the "Browse..." button below. If you 
											experience difficulties, please contact technical support.
											<br>
											<br>
											<label for="fileUpload">The file cannot exceed
											500
											KB in size and should be in .doc, .wpd, .rtf, .xls, .pdf, .docx, .xlsx or .txt format. 
											<i>For Macintosh users, please note that the filename must include the appropriate three- or four-letter extension.</i> Also, please do not attempt to upload a document that 
											is password-protected or that contains macros. This will cause the process to 
											fail.</label>
											
											<br>
										</div>
										<div id="processing" style="DISPLAY:none;" align="justify">
										
										<span class="BasePageFont">Your document is being uploaded and converted into PDF 
												format. If the process is successful, this window will close automatically and 
												you will see a 'view document' and a 'delete' button appear next to the 
												question. If the process is not successful, you will receive an error message 
												with additional details. </span>
										
											
												<div align="center">
													<IMG src="../Images/common_images/Processing.gif" alt="Upload is in process">
												</div>										
										</div>
										<div align="center">
											<br>
									<input type="file" name="fileUpload" id="fileUpload" style="width:100%;" /><br />
                                   		<br>
												<br>
										</div>
										<div id="uploadButton" align="center">
										<input src="../Images/common_images/uploaddocument_large_n.gif" name="Image1" type="image" id="Image1" onclick="javascript:return processing();" alt="Upload Document" />
						                						
												<br>
												<br>
										</div>
									</td>
								</tr>
								
							</table>
						</td>
					</tr>
					<tr>
						<td class="HelpBoxes"><IMG height="1" src="../Images/common_images/spacer.gif" alt=""  width="198"></td>
						<td class="HelpBoxes"><IMG height="1" src="../Images/common_images/spacer.gif" alt=""  width="150"></td>
					</tr>
					<tr>
						<td vAlign="top" align="left"><IMG height="1" src="../Images/common_images/spacer.gif" alt=""  width="1"></td>
						<td colSpan="2"><IMG height="1" src="../Images/common_images/spacer.gif" alt=""  width="348"></td>
						<td vAlign="top" align="left"><IMG height="1" src="../Images/common_images/spacer.gif" alt=""  width="1"></td>
					</tr>
				</table>
			</div>
		</form>
	</body>
</HTML>
