<?php
//index.php

$error = '';
$name = '';
$email = '';
$experience = '';
$message = '';

function clean_text($string)
{
 $string = trim($string);
 $string = stripslashes($string);
 $string = htmlspecialchars($string);
 return $string;
}

if(isset($_POST["submit"]))
{
 if(empty($_POST["name"]))
 {
  $error .= '<p><label class="text-danger">Please Enter your Name</label></p>';
 }
 else
 {
  $name = clean_text($_POST["name"]);
  if(!preg_match("/^[a-zA-Z ]*$/",$name))
  {
   $error .= '<p><label class="text-danger">Only letters and white space allowed</label></p>';
  }
 }
 if(empty($_POST["email"]))
 {
  $error .= '<p><label class="text-danger">Please Enter your Email</label></p>';
 }
 else
 {
  $email = clean_text($_POST["email"]);
  if(!filter_var($email, FILTER_VALIDATE_EMAIL))
  {
   $error .= '<p><label class="text-danger">Invalid email format</label></p>';
  }
 }
 if(empty($_POST["experience"]))
 {
  $error .= '<p><label class="text-danger">Experience is required</label></p>';
 }
 else
 {
  $experience = clean_text($_POST["experience"]);
 }
 if(empty($_POST["message"]))
 {
  $error .= '<p><label class="text-danger">Message is required</label></p>';
 }
 else
 {
  $message = clean_text($_POST["message"]);
 }

 if($error == '')
 {
  $file_open = fopen("contact_data.csv", "a");
  $no_rows = count(file("contact_data.csv"));
  if($no_rows > 1)
  {
   $no_rows = ($no_rows - 1) + 1;
  }
  $form_data = array(
   'sr_no'  => $no_rows,
   'name'  => $name,
   'email'  => $email,
   'experience' => $experience,
   'message' => $message
  );
  fputcsv($file_open, $form_data);
  $error = '<label class="text-success">Thank you for contacting us</label>';
  $name = '';
  $email = '';
  $experience = '';
  $message = '';
 }
}

?>

<!Doctype html>
<html>
<head>
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js">
</script>
<link rel = "stylesheet" href = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<script src = "https://maxcdn.bootstrapcdn.com/bootstrap/3.7.7/js/bootstrap.min.js">
</script>
<script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

<style type = "text/css">
*{

	margin :0px;
	padding:0px;
}
.bgimage{
	background-image : url('https://laverne.edu/hr/wp-content/uploads/sites/26/2013/01/Human-Resources.jpg');
	background-size: 100% 100%;
	width : 100%;
	height :70vh;
}
.menu{
    width:100%;
    height : 100px;
    background-color : rgba(0,0,0,0.5);

}
.leftmenu{
    width : 45%;
    line-height :100px;
    float : left;

}
.leftmenu h4{
    padding-left:70px;
    font-weight: bold;
    color : white;
    font-size : 22px;
    font-family

}
.rightmenu{
	width : 55%;
	height : 100px;
	float : right;
}
.rightmenu ul{
    margin-left :200px;

}

.rightmenu ul li{
    display : inline-block;
    list-style : none;
    font-size : 15px;
    color : white;
    font-weight : bold;
    line-height : 100px;
    margin-left:40px;
    text-transform : uppercase;
}
#firstlist{
    color : orange;
}
.rightmenu ul li{
    color : orange;

}
.text{
    width : 100%;
    margin-top:185px;
    text-transform:uppercase;
    text-align: center;
    color:white;
}
.text h4{
   font-size:14px;
   color : black;
}
.text h1{
   font-size: 60px;
   color : black;
   margin:14px;
}
.text h3{
   font-size : 14px;
   color : black;
}
#table{
    margin:2px;
    border : 2px solid black;
}
#col1{
	background-image:url("https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTV32Vds9IoYYEhkWsfOy-Zixi_cWHlL1QCEbXIGlyXv8F3t0AN");
    border : 8px solid white;
}
#col2{
	background-image:url("http://cdn.designblognews.com/wp-content/uploads/2016/04/medical-and-health-elements-vector-vector-other-free-download-1459594822g48kn.jpg");
    border : 4px solid white;
}
#col3{
	background-color : lightblue;
    border : 4px solid white;
}#col4{
	background-color : lightgreen;
    border : 4px solid white;
}#col5{
	background-color : cyan;
    border : 4px solid white;
}
</style>
<title></title>
</head>
<body>
	<div class = "bgimage">
		
		<div class = "menu">
		   
		    <div class = "leftmenu">
               
               <h4>LEARN SIMPLY</h4>
           
           </div>
           
           <div class = "rightmenu">
           	<ul>
           		<li onclick = "f1()">HOME</li>
           		
           		<li onclick = "f2()">JOIN US</li>
           		
           		<li onclick = "f3()">CONTACT US</li>
           		
           		<li onclick = "f4()">ABOUT US</li>
            </ul>
           
           </div>
        
        </div>
        
        <div class = "text">
        	<h4>PRESENTED TO YOU BY TEAM ERUDITES</h4>
        	
        	<h1>LETS HIRE YOU</h1>
        	
        	<h3>GET HIRED BY YOUR TALENT</h3>
        <script = "text/javascript">
             function f1(){
             	alert("ALREADY ON HOME PAGE");
             }
             function f2(){

             }
        </script>
      </div>
   </div>
  <br/><br/>
  <div class="container">
   <h2 align="center">PLEASE FILL THE DETAILS</h2>
   <br />
   <div class="col-md-6" style="margin:0 auto; float:none;">
    <form method="post">
     <h3 align="center">Contact Form</h3>
     <br />
     <?php echo $error; ?>
     <div class="form-group">
      <label>Enter Name</label>
      <input type="text" name="name" placeholder="Enter Name" class="form-control" value="<?php echo $name; ?>" />
     </div>
     <div class="form-group">
      <label>Enter Email</label>
      <input type="text" name="email" class="form-control" placeholder="Enter Email" value="<?php echo $email; ?>" />
     </div>
     <div class="form-group">
      <label>Enter Experience</label>
      <input type="text" name="experience" class="form-control" placeholder="Enter Experience" value="<?php echo $experience; ?>" />
     </div>
     <div class="form-group">
      <label>Enter Message</label>
      <textarea name="message" class="form-control" placeholder="Enter Message"><?php echo $message; ?></textarea>
     </div>
     <div class="form-group" align="center">
      <input type="submit" name="submit" class="btn btn-info" value="Submit" />
 
     </div>
    </form>
   </div>
  </div>
 </body>
</html>