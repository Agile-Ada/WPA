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
?>
<!DOCTYPE html>
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
            <li class="active"><a href="About-WPA-Emergency-Medicine-Staffing.php">About Us</a></li>
            <li><a href="WPA-Emergency-Medicine-Leadership.php">Leadership</a></li>
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


      <div class="container2">
      <img src="images/Staff1.jpg">
      </div><!-- /container2 -->

    <div class="container">

      <div class="visible-xs col-lg-12 lead">
	<p>Effective, Efficient and Quality (Double EQ) Emergency Medicine Staffing</p>
      </div>

    <div class="row">
    <div class="col-sm-8">
    <p class="lead3">About Us</p>
<p>
<i>WPA Emergency Medicine Staffing, LLC</i> was established by a group of Emergency Physicians with decades of healthcare experience.
</p>
<p>
We specialize in placing quality physicians and providers in short and long-term locum tenen positions within healthcare facilities.
</p>
<p>
Headquartered in Western Pennsylvania as lifelong residents we understand the culture and people of the communities we serve.
</p>
<p>
As physicians, we know first-hand the skills and qualifications required to staff a successful healthcare facility.
</p>
<p>
Our goal is to provide facilities with effective, efficient and quality on-demand staff necessary for the continuity of care and preservation of revenue.
</p>
<p>
Our physicians and providers are carefully screened and provided with professional liability insurance.
</p>
<p>
<i>WPA Emergency Medicine Staffing, LLC</i> provides quality physicians and providers supplemental part-time income or a flexible full-time career option.
</p>
<p>
Contact us today to discuss what <i>WPA Emergency Medicine Staffing, LLC</i> can do for you.
</p>



    </div><!-- /col-sm-8 -->
    <div class="col-sm-4">
    <p class="lead3">Contact Form</p>
  <p class="disclaimer">All information provided will be kept confidential.</p>
<?php if(!empty($errors)){ echo "<p class='err'>".nl2br($errors)."</p>";}?>
<div id='contact_form_errorloc' class='form-group err'></div>
  <form method="POST" name="contact_form" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" onsubmit="return checkEmail();">
  <p>
    <label for='name'>Name</label>
    <input type="text"  class="form-control" name="name" placeholder="Name" value='<?php echo htmlentities($name) ?>'>
  </p>
  <p>
    <label for='email'>Email address</label>
    <input type="text"  class="form-control" name="email" placeholder="Enter email" value='<?php echo htmlentities($visitor_email) ?>'>
  </p>
  <p>
    <label for='phone'>Phone</label>
    <input type="text"  class="form-control" name="phone" placeholder="Phone"value='<?php echo htmlentities($phone) ?>'>
  </p>
  <p>
    <label for='message'>Message</label>
    <textarea  class="form-control" name="message" rows="4"><?php echo htmlentities($user_message) ?></textarea>
    <p class="help-block"></p>
  </p>
  <p>
  <img src="captcha_code_file.php?rand=<?php echo rand(); ?>" id='captchaimg' ><br>
  <label for='message'>Enter the code above here :</label><br>
  <input id="6_letters_code" name="6_letters_code" type="text" class="form-control" width="50%"><br>
  <small>Can't read the image? click <a href='javascript: refreshCaptcha();'>here</a> to refresh</small>
  </p>
  <button type="submit" value="Submit" name='submit' class="btn btn-default">Submit</button>
</form>
<script language="JavaScript">
var frmvalidator  = new Validator("contact_form");
//remove the following two lines if you like error message box popups
frmvalidator.EnableOnPageErrorDisplaySingleBox();
frmvalidator.EnableMsgsTogether();

frmvalidator.addValidation("name","req","Please provide your name"); 
frmvalidator.addValidation("email","req","Please provide your email"); 
frmvalidator.addValidation("phone","req","Please provide your phone"); 
frmvalidator.addValidation("email","email","Please enter a valid email address"); 
frmvalidator.addValidation("6_letters_code","req","The captcha code doesn't match"); 
</script>
<script language='JavaScript' type='text/javascript'>
function refreshCaptcha()
{
	var img = document.images['captchaimg'];
	img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
}
</script>
	</div>
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
