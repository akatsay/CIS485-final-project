<?php
  if (!isset($_SESSION['user'])) {
    session_start();
  }
  if (!isset($_SESSION['user']) || empty($_SESSION['user'])) {
    header('Location: ../login');
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
<link href="../styles.css" rel="stylesheet" type="text/css" />
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
    include '../components/header.php';
    ?>
<!-- header ends -->
<!-- slider begins -->
    <?php
    include '../components/slider.php';
    ?>
<!-- slider ends -->   
        <!-- content begins -->
       			<div id="content"  style="border:solid darkred 15px;">
                	
                    <div class="hh1">PRODUCTS</div>
                    <p>&nbsp;</p>
                    <!-- -------------------------------------------------  -->
                    <div style="border:solid green 1px;background:#FFFFFF;float:left">
                        <span class="left"><a href="/sony.html"><img src="images/sony.png" style="width:200px" alt="example graphic" /></a></span>
                        <div class="title">SONY HD-TV</div>
                            <p class="size">
                             
                              The best in entertainment. Access a world of movies, TV and apps, and
                              enjoy every moment in picture quality that goes beyond Full HD. With
                              X-Reality PRO, you will enjoy stunning clarity, sharpness and a more
                              refined picture. <a href="sony.html">More...</a><br />
                              <span style="float:right;text-align:left;padding:.5em;">
                                    <a href="#" >Add to Cart</a>&nbsp;&nbsp;<a href="#">Goto Cart</a>
                            </span>
                            </p>
                        </div>

                        <p style="clear:both"></p>

                        <div style="border:solid green 1px;background:#FFFFFF;float:left">
                        <div class="title">PANASONIC HD-TV</div>
                            <span class="left"><a href="panasonic.html"><img src="images/panasonic.png" style="width:200px;" alt="example graphic" /></a></span>
                            <p class="size">
                               Features an advanced LED Backlight Design which produces a wider color
                               range Local Dimming along with the Black Graduation Drive to delivery
                               great blacks in your video Super Bright Panel helping to brighten up
                               the content XUMO Discovery. <a href="panasonic.html">More...</a><br />
                              <span style="float:right;text-align:left;padding:.5em;">
                            <a href="#">Add to Cart</a>&nbsp;&nbsp;<a href="#">Goto Cart</a>
                          </span>
                        </p>
                        </div>
                    
                        <p style="clear:both"></p>
                    
                        <div style="border:solid green 1px;background:#FFFFFF;float:left">
                        <div class="title">SAMSUNG HD-TV</div>
                            <span class="left"><a href="samsung.html"><img src="images/samsung.png" style="width:200px;" alt="example graphic" /></a></span>
                            <p class="size">
                                With a sleek, futuristic, metallic design, your TV enhances your living space.
                                The SAMSUNG Smart TVs take the simplicity and fun of webOS to an even greater level
                                of entertainment with webOS 3.0. For one reason, and one reason only – so you
                                can easily stay on top of your prime time viewing.Virtual Surround Plus enhances
                                sound to create a surround sound effect. <a href="samsung.html">More...</a><br />
                              <span style="float:right;text-align:left;padding:.5em;">
                            <a href="#">Add to Cart</a>&nbsp;&nbsp;<a href="#">Goto Cart</a>
                          </span>
                        </p>
                        </div>
                    <!-- -------------------------------------------------  -->
                    <div style="clear:both"></div>
                    
                    
        		</div>
<!-- bottom begin -->
<?php
    include '../components/footer.php';
    ?>
<!-- bottom end --> 
</div>


</body>
</html>
