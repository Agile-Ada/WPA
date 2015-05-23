<?php 
$your_email ='info@wpamedstaffing.com';// <<=== update to your email address

session_start();
$errors = '';
$name = '';
$visitor_email = '';
$phone = '';
$user_message = '';

if(isset($_POST['submit']))
{
	
	$name = $_POST['name'];
	$visitor_email = $_POST['email'];
	$phone = $_POST['phone'];
	$user_message = $_POST['message'];
	///------------Do Validations-------------
	if(empty($name)||empty($visitor_email))
	if(empty($phone))
	{
		$errors .= "\n Name, Email and Phone are required fields. ";	
	}
	if(IsInjected($visitor_email))
	{
		$errors .= "\n Bad email value!";
	}
	if(empty($_SESSION['6_letters_code'] ) ||
	  strcasecmp($_SESSION['6_letters_code'], $_POST['6_letters_code']) != 0)
	{
	//Note: the captcha code is compared case insensitively.
	//if you want case sensitive match, update the check above to
	// strcmp()
		$errors .= "\n The captcha code doesn't match";
	}
	
	if(empty($errors))
	{
		//send the email
		$to = $your_email;
		$subject="Form submission from site visitor";
		$from="WPA Website";
		$ip = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '';
		
		$body = "Contact form submission from wpamedstaffing.com:\n\n".
		"Name: $name\n".
		"Email: $visitor_email \n".
		"Phone: $phone\n".
		"Message: \n ".
		"$user_message\n\n".
		"IP: $ip\n";	
		
		$headers = "From: $from \r\n";
		$headers .= "Reply-To: $visitor_email \r\n";
		
		mail($to, $subject, $body,$headers);
		
		header('Location: Contact-WPA-Thank-You.html');
	}
}

// Function to validate against any email injection attempts
function IsInjected($str)
{
  $injections = array('(\n+)',
              '(\r+)',
              '(\t+)',
              '(%0A+)',
              '(%0D+)',
              '(%08+)',
              '(%09+)'
              );
  $inject = join('|', $injections);
  $inject = "/$inject/i";
  if(preg_match($inject,$str))
    {
    return true;
  }
  else
    {
    return false;
  }
}
?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="WPA Emergency Medicine Staffing, LLC is an Emergency Medicine Staffing Company serving Pennsylvania with Effective, Efficient, and quality emergency medicine physicians.">
    <link rel="shortcut icon" href="assets/ico/favicon.ico">

    <title>WPA Emergency Medicine Staffing, LLC | Pennsylvania Locum Tenens Opportunities</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/wpa-template.css" rel="stylesheet">
    <link href="css/responsive-slider.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
    <script src="//use.edgefonts.net/cabin;source-sans-pro:n2,i2,n3,n4,n6,n7,n9.js"></script>
    <script language="JavaScript" src="scripts/gen_validatorv31.js" type="text/javascript"></script>	

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-62104768-1', 'wpamedstaffing.com');
  ga('send', 'pageview');

</script>
  </head>

  <body>

    <div class="container-fluid">
      <div class="row">
        <div class="top-blend">
	<div class="test"><img src="images/bg-topfade.jpg"></div>
	</div>
	</div><!-- /row -->
    </div><!-- /container-fluid -->

    <div class="container-fluid">
      <div class="row">
        <div class="col-left2"></div>
        <div class="col-middle2">

       <div class="navbar navbar-default ">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="visible-xs navbar-brand" href="tel:8884610860">Contact Us: 888-461-0860</a>
        </div><!-- /navbr-header -->

        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="index.html">Home</a></li>
            <li><a href="Locum-Tenens.php">For Hospitals</a></li>
            <li><a href="Locum-Tenens-Opportunities.php">Physicians/Providers</a></li>
            <li><a href="About-WPA-Emergency-Medicine-Staffing.php">About Us</a></li>
            <li class="active"><a href="WPA-Emergency-Medicine-Leadership.php">Leadership</a></li>
            <li><a href="Contact-WPA-Emergency-Medicine-Staffing.php">Contact Us</a></li>
          </ul>
	  <ul class="nav navbar-nav navbar-right">
            <li><a href="https://sites.google.com/a/wpamedstaffing.com/wpa---staff-portal/">Staff Login</a></li>
          </ul>
  
        </div><!--/.nav-collapse -->

    </div><!-- /navbar navbar-default -->

	</div><!-- /col-middle2 -->

        <div class="col-right2">        
	<img class="hidden-xs" src="images/bg-topangleright.png">
	</div>
      </div><!-- /row -->

      <div class="row">
	<div class="hidden-xs col-left3"></div>
	<div class="col-middle3"><a href="index.html"><img src="images/WPALogo.png"></a> 
	<p class="hidden-xs">Effective, Efficient and Quality (Double EQ)<br />Emergency Medicine Staffing</p>
	</div>
	<div class="hidden-xs col-right3"></div>

      </div><!-- /row -->
    </div><!-- /container-fluid -->


    <div class="container">

      <div class="visible-xs col-lg-12 lead">
	<p>Effective, Efficient and Quality (Double EQ) Emergency Medicine Staffing</p>
      </div>

    <div class="row">
    <div class="col-sm-12">

	<h4>Leadership</h4>
	<hr>
    </div>
    </div>

    <div class="row">
    <div class="col-sm-4">
    <p class="lead3">Dr. Brian Wieczorek</p>
    <p class="main1"><img src="images/Dr-Brian-Wieczorek.jpg" style="width:120px">
Dr. Brian Wieczorek MD graduated from the University of Pittsburgh at Johnstown with a BS in Mechanical Engineering Technology in 1989 and worked as a Mechanical Engineer for a large manufacturing firm and a Defense Contractor until switching careers to medicine with entrance into Medical School in 1992.  He graduated from the Penn State College of Medicine in 1996 and went on to become Board Certified in Emergency Medicine through Geisinger Medical Center Residency in Danville, PA with extensive Flight Physician time with Geisinger's LifeFlight Program.
</p>
<p>
Dr. Wieczorek joined Latrobe Hospital in 1999 and moved to Conemaugh Memorial Medical Center in 2000.  While at Conemaugh for 13 years, he served as MedStar's Air Ambulance Medical Director from 2004 to 2009.  He was also teaching faculty from the start of Conemaugh's Emergency Medicine Residency Program starting in 2007 until his departure in August 2013 to co-found WPA Emergency Medicine Staffing, LLC with Dr. Neil Yoder and Dr. Lisa Golden. 
</p>

    </div><!-- /col-sm-4 -->
	<div class="col-sm-4">

    <p class="lead3">Dr. Lisa Golden</p>
    <p class="main1"><img src="images/Dr-Lisa-Golden.jpg" style="width:120px">

Lisa Golden, MD attended the University of Pittsburgh where she was the recipient of the Chancellor's Undergraduate Merit Scholarship covering full tuition, room, board, and fees. She graduated magna cum laude with a Bachelor of Science degree in Neuroscience in 1993 and was admitted to Phi Beta Kappa honor society her junior year.  Subsequently, she received her Doctor of Medicine degree from the Medical College of Pennsylvania in 1997. Dr. Golden completed a residency in Emergency Medicine at Allegheny General Hospital in 2000 and is board certified in Emergency Medicine.
</p>
<p>
Dr. Golden has been employed in a variety of clinical and non-clinical positions in Pennsylvania and North Carolina. She is an avid fan of Pitt athletics and an active volunteer in the Pitt Alumni Association where she currently serves as Vice President.
</p>

    </div><!-- /col-sm-4 -->
	<div class="col-sm-4">

    <p class="lead3">Dr. Neil Yoder</p>
Dr. Neil Yoder graduated from Lake Erie College of Osteopathic Medicine in 2005 and went on to become Board Certified in Emergency Medicine through St. Vincent Mercy Medical Center in Toledo, OH. Dr. Yoder also completed fellowship in EMS Medicine from St. Vincent Mercy in Toledo, OH and served as a flight physician with the St. Vincent Life Flight air ambulance program. During fellowship, Dr. Yoder became the Adult Medical Director for Kalitta Meflight air ambulance service in Ypsilanti Michigan. After fellowship, Dr. Yoder joined Conemaugh Memorial Medical Center in 2010 as part of the teaching faculty for the Conemaugh Emergency Medicine Residency Program. Dr. Yoder also served as Conemaugh's Medical Command Facility Medical Director, Medical Director of Air Methods' Medstar air ambulance program, and Medical Director of the Conemaugh EMS Consortium.  Dr. Yoder then went on to co-found WPA Emergency Medicine Staffing, LLC with Dr. Brian Wieczorek and Dr. Lisa Golden.  


    </div><!-- /col-sm-4 -->

    </div><!-- /row -->

    </div><!-- /.container -->

    <div class="container-fluid red-black">
    <div class="logo-container">
	<div class="contact-wpa">
	<p><b>WPA Emergency Medicine Staffing, LLC</b><br />
	513 Rt 259, Ligonier, PA 15658<br />
	<a href="mailto:info@wpamedstaffing.com">info@wpamedstaffing.com</a> <br />
	888-461-0860</p>
	    <a class="btn btn-sm btn-linkedin" href="http://www.facebook.com/WPAmedstaffing"><i class="fa fa-lg fa-linkedin"></i></a>&nbsp;
	    <a class="btn btn-sm btn-facebook" href="http://www.linkedin.com/company/wpa-emergency-medicine-staffing-llc"><i class="fa fa-lg fa-facebook"></i></a>
	</div>
    </div><!-- /logo-container -->
    </div><!-- /.container -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>

  </body>
</html>
