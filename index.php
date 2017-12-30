
  <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
  <html>
  
  <head>
  
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name = "viewport" content = "initial-scale = 1, user-scalable = no">
  
  
  <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
  
  <link rel="stylesheet" type="text/css" href="doughnutit.css">
  <link rel="stylesheet" type="text/css" href="upload_css.css">
  
  
  

  <!-- Chart.js para os gráficos -->
  <script type="text/javascript" src="Chart.js"></script>
  
  
  <!-- Jquery -->
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
  
  <!--[if lt IE 9]>
			  <script src="excanvas.js"></script>
		  <![endif]-->
  <script type="text/javascript" src="jquery.min.js"></script>
  <script type="text/javascript" src="jquery.uploadfile.min.js"></script>
  <!-- Script com o plugin -->
  <script type="text/javascript" src="doughnutit.js"></script>
  <!-- Folha de estilos -->
  
  </head>
  <title>
  Music Classification
  </title>
  <style type="text/css">body, a:hover {cursor: url(http://ani.cursors-4u.net/others/oth-9/10.cur), progress !important;}
  
  /* Start by setting display:none to make this hidden.
   Then we position it in relation to the viewport window
   with position:fixed. Width, height, top and left speak
   speak for themselves. Background we set to 80% white with
   our animation centered, and no-repeating */
.modal {
    display:    none;
    position:   fixed;
    z-index:    1000;
    top:        0;
    left:       0;
    height:     100%;
    width:      100%;
    background: rgba( 255, 255, 255, .5 ) 
                url('http://i.stack.imgur.com/FhHRx.gif') 
                50% 50% 
                no-repeat;
}

/* When the body has the loading class, we turn
   the scrollbar off with overflow:hidden */
body.loading {
    overflow: hidden;   
}

/* Anytime the body has the loading class, our
   modal element will be visible */
body.loading .modal {
    display: block;
}

  
  </style><a href="http://www.cursors-4u.com/cursor/2013/04/11/music-note-vertical-resize.html" target="_blank" title="Music Note - Vertical Resize"><img src="http://cur.cursors-4u.net/cursor.png" border="0" alt="Music Note - Vertical Resize" style="position:absolute; top: 0px; right: 0px;" /></a>
  <body style="background:#000000;">
						
					  
			
		  <!--upload-->
		  
		  <table style="text-align:center ;margin: 0 auto">
         <!-- <tr><td align="center" colspan="2"><div class="uploadprompt">This is a Music Analyser!</div></td></tr>
		  <tr><td align="center" colspan="2"><div class="uploadprompt">Upload an MP3 to Classify its Genre!</div></td></tr>-->
		  <tr><td align="center" colspan="2"><div id="status"></div></td></tr>
		  
		  <tr><td align="center" colspan="2"><div id="mulitplefileuploader" style="text-align:left" align="left">Upload</div></td></tr>
          <tr><td><div class="modal"><!-- Place at bottom of page --></div></td></tr>

		  <tr><td><div id="status"></div></td></tr>
		  <tr><td align="center"><div id="myDoughnut"> </div></td>
		  <td align="center"><div id="mySmallDoughnut"> </div></td></tr>
		  <tr><td align="center"><div id="myMediumDoughnut"> </div></td>
		  <td align="center"><div id="myBigDoughnut"> </div></td></tr>
		  
  
  
  
		  </table>
		  <!--end upload-->
		   
			  
			  
   
  <script>

  $(document).ready(function()
  {
  
  var settings = {
	  //url: "upload.php",
	  url: "upload.php",
	  method: "POST",
	  allowedTypes:"mp3",
	  fileName: "myfile",
	  multiple: true,
	  onSuccess:function(files,data,xhr)
	  {
		  //console.log("success");
		  //$("#status").html("<font color='green'>Successful</font>");
		  //$("#status").html("<font color='green'>"+files+" </font>");
		  //$("#status").html("<font color='green'>"+data+" </font>");
		  //window.location.href = "http://localhost/myPortfo/musicAnalyser.php?file="+file;
		  
		  $('#myDoughnut').empty();
						   $('#mySmallDoughnut').empty();
						   $('#myMediumDoughnut').empty();
						   $('#myBigDoughnut').empty();
						   
			  $.ajax({  
				   type: 'POST',  
					url: 'musicClassification.php',
					//data: {"filename"},
					data: ({"filename": ""+files}),
					
					//dataType: "json",
					   success: function(res) {
						   
							
							
						   	 
							space1 = res.indexOf(' ');
							newstr1 = res.substring(0, space1);
							space2 = res.indexOf('~');
							newstr2 = res.substring(space1+1, space2);
							space3 = res.indexOf('-');
							newstr3 = res.substring(space2+1, space3);
							newstr4 = res.substring(space3+1);
	
							 //console.log(data);
				   //$("#status").html("<font color='green'>"+files+" </font>");
				   //$("#status2").html("<font color='green'>Analysing</font>");
				  // result = data.response;
				   //$("#status").html("<font color='green'>"+newstr1+newstr2+newstr3+newstr4+"</font>");
				   
					// $("#status4").html("<font color='green'>"+response+"</font>");
				  // $("#status3").html("<font color='green'>"+response[0].result+"</font>");
				  
				  
				  //stChartpc = <?//php echo $rockPC; ?>;
				  stChartpc = Math.floor((Math.random() * 100) + 1);
				  stChartpc = parseInt(newstr1);
				  //ndChartpc = <?//php echo $hiphopPC; ?>;
				  ndChartpc = Math.floor((Math.random() * 100) + 1);
				  ndChartpc = parseInt(newstr2);
				  //rdChartpc = <?//php echo $popPC?>;
				  rdChartpc = Math.floor((Math.random() * 100) + 1);
				  rdChartpc = parseInt(newstr3);
				  //thChartpc = <?//php echo $classicPC ?>;
				  thChartpc = Math.floor((Math.random() * 100) + 1);
				  thChartpc = parseInt(newstr4);
				  
				  var doughnutData = [
			  {value:stChartpc,color:"#ff4d4d"},
			  {value:100-stChartpc,color:"#dce0df"}
		  ];
  
		  $( "#myDoughnut" ).doughnutit({
			  dnData: doughnutData,
			  dnSize: 280,
			  dnInnerCutout: 60,
			  dnAnimation: true,
			  dnAnimationSteps: 60,
			  dnAnimationEasing: 'linear',
			  dnStroke: false,
			  dnShowText: true,
			  dnFontSize: '30px',
			  dnFontColor: "#819596",
			  dnText: 'ROCK',//'G1',
			  dnStartAngle: 90,
			  dnCounterClockwise: false,
			  
			  dnLeftCanvas: {
				  lcRadius: 5,
				  lcPreMargin: 20,//100,
				  lcMargin: 20,
				  lcHeight: 60,//100,
				  lcOffset: 5,//15,
				  lcLineWidth: 200,
				  lcSphereColor: '#819596',
				  lcSphereStroke: '#819596',				
				  lcTop:{
					  lcTopLineColor: '#819596',
					  lcTopDashLine: 0,
					  lcTopFontSize: '20px',
					  lcStrokeWidth: 3,
					  
					  //lcTopPreMargin: 30,
					  //lcTopMargin: 20,
					  //lcTopHeight: 70,
					  lctAbove: {						
						  lctText: 'PERCENTAGE',
						  lctOffset: 5,
						  lctImageOffsetRight: 5,
						  lctImageOffsetBottom: 0,
						  // lctImage: 'calendar.png',
					  },
					  lctBelow: {
						  lctText: stChartpc+'%',
						  lctFontSize: '50px',
						  lctOffset: 15,
						  lctOffset: 5,
						  lctImageOffsetRight: 5,
						  lctImageOffsetBottom: 0,
						  // lctImage: 'calendar.png'
					  }		        	
				  }
				  
			  }
		  });// End Doughnut
  
		  // SMALL DOUGHNUT :(
  
		  var smallDoughnutData = [
				  {value:ndChartpc,color:"#d9c54a"},
				  {value:100-ndChartpc,color:"#dce0df"}
			  ];
  
		  $( "#mySmallDoughnut" ).doughnutit({
			  dnData: smallDoughnutData,
			  dnSize: 280,
			  dnInnerCutout: 60,
			  dnAnimation: true,
			  dnAnimationSteps: 80,
			  dnAnimationEasing: 'linear',
			  dnStroke: false,
			  dnShowText: true,
			  dnFontSize: '30px',
			  dnFontOffset: 40,
			  dnFontColor: "#819596",
			  dnText: 'HipHop',//'G1',
			  dnStartAngle: 0,
			  dnCounterClockwise: false,
			  dnRightCanvas: {
				  rcRadius: 5,
				  rcPreMargin: 20,
				  rcMargin: 20,
				  rcHeight: 40,
				  rcOffset: 5,
				  rcLineWidth: 170,
				  rcSphereColor: '#819596',
				  rcSphereStroke: '#819596',				
				  rcTop:{
					  rcTopLineColor: '#819596',
					  rcTopDashLine: 0,
					  rcTopFontSize: '13px',
					  rcStrokeWidth: 1,
  
					  rcTopPreMargin: 30,
					  rcTopMargin: 20,
					  rcTopHeight: 70,
  
					  rctAbove: {						
						  rctText: 'PERCENTAGE',
						  rctOffset: 2,
						  rctImageOffsetRight: 5,
						  rctImageOffsetBottom: 0,
						  rctFontSize: '22px',
						  // rctImage: 'calendar.png',
					  },
					  rctBelow: {
						  rctText: ndChartpc+'%',
						  rctFontSize: '55px',
						  rctFontStyle: 'bold',
						  rctOffset: 2,
						  rctImageOffsetRight: 5,
						  rctImageOffsetBottom: 0,
						  // rctImage: 'calendar.png'
					  }		        	
				  }
			  }
		  });// End Doughnut
  
		  // MEDIUM DOUGHNUT :)
  
		  var mediumDoughnutData = [
				  {value:rdChartpc,color:"#4bc584"},
				  {value:100-rdChartpc,color:"#dce0df"}
			  ];
  
		  $( "#myMediumDoughnut" ).doughnutit({
			  dnData: mediumDoughnutData,
			  dnSize: 280,
			  dnInnerCutout: 60,
			  dnAnimation: true,
			  dnAnimationSteps: 100,
			  dnAnimationEasing: 'linear',
			  dnStroke: false,
			  dnShowText: true,
			  dnFontSize: '30px',
			  dnFontOffset: 30,
			  dnFontColor: "#819596",
			  dnText: 'Pop',
			  dnStartAngle: 0,
			  dnCounterClockwise: false,
			  dnLeftCanvas: {
				  lcRadius: 5,
				  lcPreMargin: 20,//100,
				  lcMargin: 20,
				  lcHeight: 60,//100,
				  lcOffset: 5,//15,
				  lcLineWidth: 200,
				  lcSphereColor: '#819596',
				  lcSphereStroke: '#819596',				
				  
				  lcBottom:{					
					  lcBottomDashLine: 0,
					  lcBottomFontSize: '15px',
					  lcBottomLineColor: '#819596',
					  lcStrokeWidth: 3,
					  
					  rcBottomPreMargin: 30,
					  rcBottomMargin: 20,
					  rcBottomHeight: 60,
					  lcbAbove: {
						  // lcbImage: 'calendar.png',
						  lcbImageOffsetBottom: 0,
						  lcbImageOffsetRight: 5,
						  lcbText: 'PERCENTAGE',//'NOTA G2',
						  lcbFontSize: '20px',
						  lcbOffset: 5
					  },
					  lcbBelow: {
						  lcbImage: '',//'calendar.png',
						  lcbImageOffsetRight: -10,
						  lcbImageOffsetBottom: 1,
						  lcbText: rdChartpc + '%',//'10/02/1994',
						  lcbOffset: 10,
						  lcbFontSize: '50px'
					  }		        	
				  }
			  }
		  });// End Doughnut
  
		  // BIG DOUGHNUT :D
  
		  var bigDoughnutData = [
				  {value:thChartpc,color:"#559EED"},
				  {value:100-thChartpc,color:"#dce0df"}
			  ];
  
		  $( "#myBigDoughnut" ).doughnutit({
			  dnData: bigDoughnutData,
			  dnSize: 280,
			  dnInnerCutout: 60,
			  dnAnimation: true,
			  dnAnimationSteps: 120,
			  dnAnimationEasing: 'linear',
			  dnStroke: false,
			  dnShowText: true,
			  dnFontSize: '30px',
			  dnFontOffset: 40,
			  dnFontColor: "#819596",
			  dnText: 'Classic',
			  dnStartAngle: -90,
			  dnCounterClockwise: false,
			  
			  dnRightCanvas: {
				  rcRadius: 5,
				  rcPreMargin: 20,
				  rcMargin: 20,
				  rcHeight: 40,
				  rcOffset: 5,
				  rcLineWidth: 170,
				  rcSphereColor: '#819596',
				  rcSphereStroke: '#819596',				
				  
				  rcBottom:{					
					  rcBottomDashLine: 0,
					  rcBottomFontSize: '15px',
					  rcBottomLineColor: '#819596',
					  rcStrokeWidth: 1,
  
					  rcBottomPreMargin: 30,
					  rcBottomMargin: 20,
					  rcBottomHeight: 60,
  
					  rcbAbove: {
						  // rcbImage: 'calendar.png',
						  rcbImageOffsetBottom: 0,
						  rcbImageOffsetRight: 5,
						  rcbText: 'PERCENTAGE',//'DATA DE G3',
						  rcbFontSize: '20px',
						  rcbOffset: 2
					  },
					  rcbBelow: {
						  rcbImage: '',//'calendar.png',
						  rcbImageOffsetRight: 5,
						  rcbImageOffsetBottom: 0,
						  rcbText: thChartpc+'%',//'20/10/2013',
						  rcbFontSize: '50px',
						  rcbOffset: 5
					  }		        	
				  }
			  }
		  });// End Doughnut
		  $(window).resize(function() {
	//$(".uploadprompt").css("align", "center");
	//$(".uploadprompt").css("text-align", "center");
	//$("#mulitplefileuploader").css("text-align", "center");
	//$("td#mulitplefileuploader").css("align", "center");
	//$("#mulitplefileuploader").css("align", "center");
	//$("#status").css("align", "center");
	//$("#status").css("text-align", "center");
	
  });
  
				   },
				   error: function(e, st, xh) {
					   $("#status2").html("<font color='green'>"+e+st+xh+"</font>");
				   }
				   
				   
			  })
  
			  
  
	  },
	  onError: function(files,status,errMsg)
	  {		
		  $("#status").html("<font color='red'>Upload is Failed</font>");
		  
	  }
  }
  
  $("#mulitplefileuploader").uploadFile(settings);
  //$('.ajax-file-upload-statusbar').empty();
  });
  $body = $("body");

$(document).on({
    ajaxStart: function() { $body.addClass("loading");    },
	
     ajaxStop: function() { $body.removeClass("loading"); }    
});
  
  </script>           
  

  
  
  
  
  </body>
  </html>