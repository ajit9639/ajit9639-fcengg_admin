<?php
if(isset($_POST['email'])) {
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "info@fcengg.com";
    $email_subject = "Fire Care Engineer ";
 
    function died($error) {
        // your error code can go here
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }
 
 
    // validation expected data exists
    if(!isset($_POST['name']) ||
       
		        !isset($_POST['email']) ||
       
        !isset($_POST['comments'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
    }
 
     
 
    $name = $_POST['name']; // required
   
    $email_from = $_POST['email']; // required
   
    $comments = $_POST['comments']; // required
 
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$name)) {
    $error_message .= 'The First Name you entered does not appear to be valid.<br />';
  }
 
  
  if(strlen($comments) < 2) {
    $error_message .= 'The Comments you entered do not appear to be valid.<br />';
  }
 
  if(strlen($error_message) > 0) {
    died($error_message);
  }
 
    $email_message = "Form details below.\n\n";
 
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
 
     
 
    $email_message .= "Name: ".clean_string($name)."\n";
   
    $email_message .= "Email: ".clean_string($email_from)."\n";
    
    $email_message .= "Comments: ".clean_string($comments)."\n";
 
// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);  
?>
 
<!-- include your own success html here -->
 
<div class="alert alert-success" role="alert">Thank you for contacting us. We will be in touch with you very soon. Redirecting to contact page within 5 secs</div>
 
<?php
 
}
?>



<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Fire Care Engineers</title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="css/font-awesome.css" rel='stylesheet' type='text/css' />

<!--slider-->
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<link href="css/animate.css" rel="stylesheet" type="text/css">
<link href="css/hover.css" rel="stylesheet" media="all">
<link href="css/flexslider.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700,800,900" rel="stylesheet">
<link href="css/services.css" rel="stylesheet" type="text/css">
<link href="css/animate.min.css" rel="stylesheet"> 
<script src="js/bootstrap.min.js"></script>
<script src="js/wow.min.js"></script>
<script>
 new WOW().init();
</script>
<style>
.service_listing li{
	color:#181818;
}

.contact_form_label{
	 font-family: Raleway-Regular;
	 margin-bottom:20px;
}

.contact_form_input{
	margin-left:0px;
	width:100%;
	height:30px;
	margin-bottom:20px;
}


</style>
</head>

<body>

<nav class="navbar navbar-default navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header wow fadeInLeft animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInLeft;">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <h1><a class="navbar-brand" href="index.html"><img src="images/Fire_Care_logo.png" class="img-responsive" ></a></h1>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="index.html" >Home</a></li>
            <li><a href="about.html" >About Us</a></li>
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#" >Infrastructure<span class="caret"></span></a>
               <ul class="dropdown-menu">
          <li><a href="infrastructure_marketing-division.html">Marketing   Division</a></li>
          <li><a href="infrastructure_design-engineering.html">Design & Engineering Division</a></li>
          <li><a href="infrastructure_r-d.html">R&D Division</a></li>
          <li><a href="infrastructure_purchase-quality.html">Purchase & Quality Control Division</a></li>
          <li><a href="infrastructure_erection-supervision.html">Erection & Supervision Division</a></li>
          <li><a href="infrastructure_project-manager.html">Project Management Division</a></li>
          
        </ul>
              </li>
               <li><a href="services.html" >Services / Solutions</a></li>
              
              <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#" >Products<span class="caret"></span></a>
               <ul class="dropdown-menu">
          <li><a href="product_co2-flooding.html">Co2 Flooding System</a></li>
          <li><a href="product_automatic-hydrant-wet-riser.html">Automatic Hydrant Wet Riser System</a></li>
          <li><a href="product_high-velocity-water-spray.html">High Velocity Water Spray System</a></li>
          <li><a href="product_medium-velocity-water-spray.html">Medium Velocity Water Spray System</a></li>
          <li><a href="product_fire-detection.html">Fire Detection & Alarm System</a></li>
          <li><a href="product_automatic-foam-flooding.html">Automatic Foam Flooding System</a></li>
          <li><a href="product_public-address.html">Public Address System</a></li>
          <li><a href="product_access-control.html">Accesss Control System</a></li>
          <li><a href="Fire_Extinguishers.html">Fire Extinguishers System</a></li>
          
        </ul>
              </li>
			  
            <li><a href="gallery.html" >Gallery</a></li>
              <li><a href="contact.php"  style="color:#001321">Contact</a></li>
           
          </ul>
         
            <!--<div class="social wow fadeInRight animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInRight;">
				<ul>
					<li><a href="#" class="facebook"> </a></li>
					<li><a href="#" class="facebook twitter"> </a></li>
					<li><a href="#" class="facebook chrome"> </a></li>
					<li><a href="#" class="facebook in"> </a></li>
				</ul>		
			</div>-->
        <div class="clearfix"></div>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

<!-----------caption container-------------->
<div style="clear:both"></div>
<div class="container-fluid caption_container">
 <div class="container">
  <h3>Contact Us</h3>
 </div>
</div>


<!--------Slider end------------>  
<!----------services section---------->
<br>
<br>
<br>
<div class="container infrastructure">
 <div class="row">
      
     <div class="col-md-6 col-sm-6 service_listing">
       <h3 class="animated ">Contact Us through mail</h3>
        <br> <br>
       <form name="contactform" method="post" action="contact.php">
<table width="100%" class="contact_form">
<tr>
 <td valign="top">
  <label for="name" class="contact_form_label">Name </label>
 </td>
 <td valign="top">
  <input  type="text" name="name" maxlength="50" size="30" class="contact_form_input">
 </td>
</tr>

<tr>
 <td valign="top">
  <label for="email" class="contact_form_label">Email Address </label>
 </td>
 <td valign="top">
  <input  type="text" name="email" maxlength="80" size="30" class="contact_form_input">
 </td>
</tr>

<tr>
 <td valign="top">
  <label for="comments" class="contact_form_label">Comments </label>
 </td>
 <td valign="top">
  <textarea  name="comments" maxlength="1000" cols="25" rows="6" class="contact_form_input" style="height:150px;"></textarea>
 </td>
</tr>
<tr>
 <td colspan="2" style="text-align:center">
  <input class="btn btn-danger" type="submit" value="Submit">   
 </td>
</tr>
</table>
</form><br>
 
      </div>
      <div class="col-md-6 col-sm-6" style="padding-top:15px;">
      <div class="col-sm-12">
        <!--<img src="images/infrastructure_design_banner1.jpg" class="img-responsive"/> -->
        <br>
        <div class="col-md-12 foot-left">
			  <h3 style="font-size:3em; font-family: Raleway-ExtraBold;">Get In Touch</h3>
					
				<br>
						<div class="contact-btm">
							<span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>
						  <p>Flat.No-7424, Kedarnath Building 2nd- Floor<p>

<p>Vijaya Garden, Baridih, Jamshedpur</p> 

 <p>Jharkhand, (INDIA)
</p>
			  </div>
						<div class="contact-btm">
							<span class="glyphicon glyphicon-earphone" aria-hidden="true"></span>
							<p> +91 8271643984, +91 7206799784</p>
						<div class="contact-btm">
						</div>
							<span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
							<p>info@fcengg.com /firecareengineers@gmail.com</p>
						</div>
						<div class="clearfix"></div>

			</div>      
      </div>
      </div>
      </div>
 </div> 
</div>
<br>
<br>

<!----------services section end---------> 



<!-- footer-top -->	
	<div class="footer-top wow fadeInDown"  data-wow-duration=".8s" data-wow-delay=".2s">
		<div class="container">
			<div class="col-md-4 foot-left">
				<h3>About Us</h3>
				
				<p>Among the several Fire Fighting Engineering and Consultation Companies, We proudly acclaim ourselves as one of the leading company, since the recent years. Our potential to the overall efficiency is highly based on the strength of a team of expert engineers who provide the clients with their excellence advice on the type of Fire Fighting Systems, taking into consideration of National and International design codes and standards such as NBC, TAC, NFPA, FM etc., according to their needs.</p>
			</div>
            
            <div class="col-md-4 foot-left" style="text-align:center">
			<h3>Quick Links</h3>
			<a href="index.html"><p>Home</p></a>
            <a href="about.html"><p>About Us</p></a>
            <a href="#"><p>Infrastructure</p></a>
            <a href="#"><p>Products</p></a>
            <a href="services.html"><p>Services</p></a>
            <a href="gallery.html"><p>Gallery</p></a>
            <a href="contact.html"><p>Contact</p></a>
			</div>
            
			<div class="col-md-4 foot-left">
			  <h3>Get In Touch</h3>
					
				
						<div class="contact-btm">
							<span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>
						  <p>H.No-1 A, G- Floor  Manager<p>

<p>Room, Golmuri, Jamshedpur</p> 

 <p>Jharkhand, (INDIA)
</p>
			  </div>
						<div class="contact-btm">
							<span class="glyphicon glyphicon-earphone" aria-hidden="true"></span>
							<p> +91 8271643984, +91 7206799784</p>
						<div class="contact-btm">
						</div>
							<span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
							<p>info@fcengg.com</p>
						</div>
						<div class="clearfix"></div>

			</div>
			
			
				<div class="clearfix"></div>
		</div>
	</div>
<!-- /footer-top -->							
<!--- footer ---->	
<div class="footer wow fadeInDown"  data-wow-duration=".8s" data-wow-delay=".2s">
	<div class="container">
		<p>© 2017 Fire Care Engineers. All Rights Reserved</p>
	</div>
</div>
<a href="#" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 0;"></span> <span id="toTopHover" style="opacity: 0;"> </span></a>
<!--- footer ---->



<script src="js/bootstrap.js"></script>



</body>
</html>
