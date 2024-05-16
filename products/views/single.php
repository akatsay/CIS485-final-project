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
<link href="../../styles.css" rel="stylesheet" type="text/css" />
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
    include '../../components/header.php';
    ?>
<!-- header ends -->
<!-- slider begins -->
    <?php
    include '../../components/slider.php';
    ?>
<!-- slider ends -->   
        <!-- content begins -->
       			<?php
              include '../model/product.php'
            ?>
    <!-- content ends --> 
<!-- bottom begin -->
<?php
    include '../../components/footer.php';
    ?>
<!-- bottom end --> 
</div>
</body>
</html>