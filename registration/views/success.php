<?php

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>MyFreeCssTemplates.com free CSS template</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="../../styles.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="../nivo-slider.css" type="text/css" media="screen" />
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
    <style type="text/css">
	.form_settings
{ margin: 15px 0 0 0;}

.form_settings p
{ padding: 0 0 0px 0;}

.form_settings span
{ float: left; 
  width: 200px; 
  text-align: left;}
  
.form_settings input, .form_settings textarea
{ padding: 5px; 
  width: 299px; 
  font: 100% arial; 
  border: 1px solid #E5E5DB; 
  background: #FFF; 
  color: #47433F;}
  
.form_settings .submit
{ font: 100% arial; 
  border: 2px; 
  width: 99px; 
  margin: 1 1 1 1;  
  height: 33px;
  padding: 2px 0 3px 0;
  cursor: pointer; 
  background: #3B3B3B; 
  color: #FFF;}

.form_settings textarea, .form_settings select
{ font: 100% arial; 
  width: 299px;}

.form_settings select
{ width: 310px;}

.form_settings .checkbox
{ margin: 4px 0; 
  padding: 0; 
  width: 14px;
  border: 0;
  background: none;}

  .form_settings input[type="text"],input[type="password"]{border:solid darkred 1px;margin-bottom:2px}

  .form_settings span{font-weight: bolder;color:darkred}
</style>
</head>
<body>

<div id="main">
<!-- header begins -->
    <?php
    include '../../components/header.php';
    ?>
<!-- header ends -->
<!-- slider begins -->
    <?php
    include '../../components/slider.php';
    ?>
<!-- slider ends -->

<!-- content begins -->
        <div id="content" style="border:solid darkred 15px;">
            
            <div class="hh1">REGISTRATION</div>
            <p>&nbsp;</p>
            <!-- -------------------------------------------------  -->
            <form action="./model/register.php" method="post" style="font-size: 1.5em;">
                <div class="form_settings">
                    <p>User Successfully registered</p>
                    <br><span>&nbsp;</span><a style="margin-left:20px" href="/redleaves/login">Login</a>
                    </p>
                </div>
            </form>
            
            <!-- -------------------------------------------------  -->
            <div style="clear:both"></div>
        </div>
<!-- content ends --> 

<!-- bottom begin -->
<?php
    include '../../components/footer.php';
    ?>
<!-- bottom end --> 

</div>
</body>
</html>