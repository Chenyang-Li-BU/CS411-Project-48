<?php 
session_start();
$la=unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$_SERVER['REMOTE_ADDR']))['geoplugin_latitude'];
$lo=unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$_SERVER['REMOTE_ADDR']))['geoplugin_longitude'];
include('conn.php');
$end_point = 'https://accounts.google.com/o/oauth2/v2/auth';
$client_id = '1028429234083-qrqd0gigmrctl2jgi9iequms2l3olb1v.apps.googleusercontent.com';
$client_secret = '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';
$redirect_uri = 'http://www.googleauthor.site/login.php';
$scope = 'https://www.googleapis.com/auth/drive.metadata.readonly';
$authUrl = $end_point.'?'.http_build_query([
    'client_id'              => $client_id,
    'redirect_uri'           => $redirect_uri,              
    'scope'                  => $scope,
    'access_type'            => 'offline',
    'include_granted_scopes' => 'true',
    'state'                  => 'state_parameter_passthrough_value',
    'response_type'          => 'code',
]);
function getSSLPage($url) {
     $headerArray =array("Content-type:application/json;","Accept:application/json");
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); 
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch,CURLOPT_HTTPHEADER,$headerArray);
        $output = curl_exec($ch);
        curl_close($ch);
        $output = json_decode($output,true);
        return $output;
}
$r=[];
$h=[];
$n=0;
$t=[];
$js=0;
$a=getSSLPage("https://api.open-meteo.com/v1/forecast?latitude=$la&longitude=$lo&hourly=temperature_2m");
foreach($a['hourly']['time'] as $k => $v){
	if(($k)%24==0){
		$n++;
	}
	$r[date('Y-m-d',strtotime($v))]=$n;
	$h[date('H',strtotime($v))]=$n;
	
	$t[$n][]=$a['hourly']['temperature_2m'][$k];
}

$todd=date('Y-m-d',time());
$todh=date('h',time());
$today=$t[$r[$todd]][$todh-0];
$sql="select * from datas where Max >= $today and Min <= $today";

$rs=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($rs);
?>



<!DOCTYPE html>
<html lang="en">
<head>
<title>Weather</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="css/contactstyle.css" type="text/css" media="all" />
<link rel="stylesheet" href="css/faqstyle.css" type="text/css" media="all" />
<link href="css/single.css" rel='stylesheet' type='text/css' />
<link href="css/medile.css" rel='stylesheet' type='text/css' />
<!-- banner-slider -->
<link href="css/jquery.slidey.min.css" rel="stylesheet">
<!-- //banner-slider -->
<!-- pop-up -->
<link href="css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
<!-- //pop-up -->
<!-- font-awesome icons -->
<link rel="stylesheet" href="css/font-awesome.min.css" />
<!-- //font-awesome icons -->
<!-- js -->
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<!-- //js -->
<!-- banner-bottom-plugin -->
<link href="css/owl.carousel.css" rel="stylesheet" type="text/css" media="all">
<script src="js/owl.carousel.js"></script>
<script>
	$(document).ready(function() { 
		$("#owl-demo").owlCarousel({
	 
		  autoPlay: 3000, //Set AutoPlay to 3 seconds
	 
		  items : 5,
		  itemsDesktop : [640,4],
		  itemsDesktopSmall : [414,3]
	 
		});
	 
	}); 
</script> 

<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- start-smoth-scrolling -->
</head>
	
<body>
<!-- header -->
	<div class="header">
		<div class="container">
			<div class="w3layouts_logo">
				<a href="index.php"><h1 style="font-size:30px">Weather<span>OnLine</span></h1></a>
			</div>
			
			<div class="w3l_sign_in_register">
				<ul>
					<?php if(empty($_SESSION['usg'])):?>
					<li><a href="<?php echo $authUrl?>" >Login</a></li>
					<?php else:?>
						<li>Welcome:user</li>
						<li><a href="logout.php">Logout</a></li>
					<?php endif?>
				</ul>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
<!-- //header -->
<!-- bootstrap-pop-up -->
	<div class="modal video-modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
				
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
				</div>
			
			</div>
		</div>
	</div>

	<div class="movies_nav">
		<div class="container">
			<nav class="navbar navbar-default">
				<div class="navbar-header navbar-left">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
					<nav>
						<ul class="nav navbar-nav">
							<li class="active"><a href="index.php">Home</a></li>
							
						
						</ul>
					</nav>
				</div>
			</nav>	
		</div>
	</div>
<!-- //nav -->
<!-- banner -->
	
    <script src="js/jquery.slidey.js"></script>
    <script src="js/jquery.dotdotdot.min.js"></script>
	   <script type="text/javascript">
			$("#slidey").slidey({
				interval: 8000,
				listCount: 5,
				autoplay: false,
				showList: true
			});
			$(".slidey-list-description").dotdotdot();
		</script>
	<div class="Latest-tv-series">

		<h4 class="latest-text w3_latest_text w3_home_popular">Weather in recent days</h4>
		<div class="container">
		
					<table class="table" style="margin-left:-100px">
  
  <thead>
    <tr>
      <th >Date</th>
    <?php foreach($h as $k=>$v){?>
      <th ><?php echo $k; ?></th>
	
	<?php }?>
    </tr>
  </thead>
  <tbody>
   <?php  foreach($r as $k=>$v){?>
    <tr>
       <td><?php echo $k; ?></td>
       <?php foreach($t[$v] as $ke=>$va){?>
       	 <td ><?php echo $va; ?></td>
       <?php }?>
    </tr>
   <?php }?>
  </tbody>
</table>

		</div>
	</div>

	<div class="Latest-tv-series">

		<h4 class="latest-text w3_latest_text w3_home_popular">Today's weather</h4>
		<div class="container">

			<section class="slider">

				<div class="flexslider">
					<ul class="slides">
					
						<li>
							<div class="agile_tv_series_grid">
								<div class="col-md-6 agile_tv_series_grid_left">
									<div class="w3ls_market_video_grid1">
										<img src="images/h1-1.jpg" alt=" " class="img-responsive" style="height:312px"/>
										<a class="w3_play_icon" href="#small-dialog">
											<span class="glyphicon glyphicon-play-circle" aria-hidden="true"></span>
										</a>
									</div>
								</div>
								<div class="col-md-6 agile_tv_series_grid_right">
									<p class="fexi_header"></p>
						<p class="fexi_header_para">
										<h2><?php echo $today ?>℃ </h2><br>
											<?php if(!empty($row)):?>
										<a style="color:white;font-size:15px;margin-top:30px">Weather:<?php echo $row['Weather']?></a> <br>
										
										<a style="color:white;font-size:15px;margin-top:30px">Detail:<?php echo $row['detail']?></a> <br><br>
										<a style="color:white;font-size:25px;margin-top:30px">Clothing:<?php echo $row['Clothing']?></a> <br>
												<?php endif?>					
									</p>
								</div>
									<div class="clearfix"> </div>
								</div>
							</div>
						</li>
				

			</section>
				<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" property="" />
				<script defer src="js/jquery.flexslider.js"></script>
				<script type="text/javascript">
				$(window).load(function(){
				  $('.flexslider').flexslider({
					animation: "slide",
					start: function(slider){
					  $('body').removeClass('loading');
					}
				  });
				});
			  </script>
		</div>
	</div>
		<script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
	<div id="small-dialog" class="mfp-hide">
	</div>
	<div id="small-dialog1" class="mfp-hide">
	</div>
	<div id="small-dialog2" class="mfp-hide">
	</div>
	<script>
		$(document).ready(function() {
		$('.w3_play_icon,.w3_play_icon1,.w3_play_icon2').magnificPopup({
			type: 'inline',
			fixedContentPos: false,
			fixedBgPos: true,
			overflowY: 'auto',
			closeBtnInside: true,
			preloader: false,
			midClick: true,
			removalDelay: 300,
			mainClass: 'my-mfp-zoom-in'
		});
																		
		});
	</script>
	<div class="footer">
		<div class="container">
			<div class="w3ls_footer_grid">
				<div class="col-md-6 w3ls_footer_grid_left">
					<p>WEATHER</p>
				</div>
				
				<div class="clearfix"> </div>
			</div>
		
			
			<div class="clearfix"> </div>
		</div>
	</div>
<script src="js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
    $(".dropdown").hover(            
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideDown("fast");
            $(this).toggleClass('open');        
        },
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideUp("fast");
            $(this).toggleClass('open');       
        }
    );
});
</script>
	<script type="text/javascript">
		$(document).ready(function() {	
			$().UItoTop({ easingType: 'easeOutQuart' });				
			});
	</script>
</body>
</html>