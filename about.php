<?php
  if (!isset($_SESSION['user'])) {
    session_start();
  }
  if (!isset($_SESSION['user']) || empty($_SESSION['user'])) {
    header('Location: ./login');
    exit();
  }

  $userid = $_SESSION['user'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>MyFreeCssTemplates.com free CSS template</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="styles.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="nivo-slider.css" type="text/css" media="screen" />
<style>
    .title
    {
        color:white;
        margin-left:10px;
        background-color:darkred;
        font-family: Arial,Helvetica,sans-serif;
        font-size: small;
        /*margin-left: .5em;*/
        /*margin-bottom: .1em;*/
        float: right;
       width: 30%;
       font-weight:bolder;
       font-size: 1.5em;
       font-variant: small-caps;
       text-align:right;
       /*background:url(images/h1.jpg);*/
       padding:20px;
    }
    .left
    {
        float: left;
        width: auto;
        margin-right: 10px;
    }
    /*
    #content
    { 
      text-align: left;
      width: 550px;
      padding: 0;
    }
    */
    .size
    {
        text-align: justify;
        font: 1.7em sans-serif;
        /*color: darkred;*/
        margin: 0px;
        padding: 5px
    }
    </style>
</head>
<body>

<div id="main">
<!-- header begins -->
<?php
    include './components/header.php';
    ?>
<!-- header ends -->
<!-- slider begins -->
    <?php
    include './components/slider.php';
    ?>
<!-- slider ends -->
        <!-- content begins -->
       			<div id="content" style="border:solid darkred 15px;">
                	
                    <div class="hh1">ABOUT US</div>
                    <p>&nbsp;</p>
                    <!-- -------------------------------------------------  -->
                    <span style="float: left;width: auto; margin-right: 10px;"><img style="width:100px;" src="images/maleicon.png"  alt="example graphic" /></span>
                    <div style="font-size: 1.5em">
                    <div style="font-weight:bold;color:darkred">John Doe</div> Role: Designer Email: johndoe@abc.com<br>
                    Worked on the prototype and layout design of the project. Also responsible for
                    the menu part of the project.
                    </div>
                    <p /><p style="clear:both"></p>
                    <span style="float: left;width: auto; margin-right: 10px;"><img src="images/femaleicon.png" style="width:100px;" alt="example graphic" /></span>
                    <div style="font-size: 1.5em">
                    <div style="font-weight:bold;color:darkred">Jane Smith</div>  Role: Tester Email:  janedoe@abc.com<br>	
                    Main responsiblityes includs checking for errors such us broken links and design inconsistencies. Main
                    contact person for the project.
                    </div>
                    
                    <!-- -------------------------------------------------  -->
                    <div style="clear:both"></div>
                    
                    
        		</div>
    <!-- content ends --> 
<!-- bottom begin -->
<?php
    include './components/footer.php';
    ?>
<!-- bottom end --> 
</div>


</body>
</html>
