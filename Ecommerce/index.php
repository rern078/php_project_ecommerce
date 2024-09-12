<?php
session_start();
error_reporting(0);
$dir == 'pggaming';
$url = $_SERVER["REQUEST_URI"];
$domain = $_SERVER['SERVER_NAME'];
include('config/dbconnection.php');
if ($_GET['ecommerce'] != '' && $_GET['auth'] == 'admin') {
      $_SESSION['dir'] = $_GET['ecommerce'];
      // $_SESSION['web_id'] =2000;
}

if ($_SERVER['HTTP_HOST'] == '10.0.0.89:2036') {
      $_SESSION['dir'] = 'taobao';
      // $_SESSION['web_id'] =2000;
} elseif ($_SERVER['HTTP_HOST'] == '10.0.0.87:2036') {
      $_SESSION['dir'] = 'shopify';
      // $_SESSION['web_id'] =2000;
} elseif ($_SERVER['HTTP_HOST'] == '10.0.0.86:2036') {
      $_SESSION['dir'] = 'alibaba';
      // $_SESSION['web_id'] =2000;
} elseif ($_SERVER['HTTP_HOST'] == '10.0.0.85:2036') {
      $_SESSION['dir'] = 'taobao';
      // $_SESSION['web_id'] =2000;
}

$IncPath = "https://855tech-desktop.s3.ap-east-1.amazonaws.com";
$_SESSION['Isfafa'] = false;
$scoPath = "https://855tech-desktop.s3.ap-east-1.amazonaws.com";
if (is_numeric(str_replace(".", "", $_SERVER['HTTP_HOST']))) {
      if (strstr($_SERVER['REQUEST_URI'], 'Desktop')) {
            $IsIp = "/Desktop/";
      } else {
            $IsIp = "";
      }
} else {
      $IsIp = "/";
      $scoPath = "/";
}
$IncPath = '';
$_SESSION['Ecommerce'] = '';
$ecommerceArr1 = ['shopify'];
$ecommerceArr2 = ['taobao', '855test'];
$ecommerceArr3 = ['alibaba'];
if (strstr($_SERVER['SERVER_NAME'], '') || in_array($_SESSION['dir'], $ecommerceArr1)) {
      $_SESSION['Ecommerce'] = 'ecommerce1';
}
if (strstr($_SERVER['SERVER_NAME'], '') || in_array($_SESSION['dir'], $ecommerceArr2)) {
      $_SESSION['Ecommerce'] = 'ecommerce2';
}
if (strstr($_SERVER['SERVER_NAME'], '') || in_array($_SESSION['dir'], $ecommerceArr3)) {
      $_SESSION['Ecommerce'] = 'ecommerce3';
}
$ecommerce = $_SESSION['Ecommerce'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
      <?php require_once('config/inc/title/title.inc.php'); ?>
</head>

<body data-pages="<?php echo $pageUrl ?>" data-dir="<?php echo $_SESSION['dir'] ?>">
      <?php include 'config/pagefiles.php'; ?>
      <?php
      if ($_SESSION['Ecommerce'] == 'ecommerce1') {
            include('config/inc/header/header_ecommerce1.php');
      } elseif ($_SESSION['Ecommerce'] == 'ecommerce2') {
            include('config/inc/header/header_ecommerce2.php');
      } elseif ($_SESSION['Ecommerce'] == 'ecommerce3') {
            include('config/inc/header/header_ecommerce3.php');
      } else {
            include("config/inc/header/header_$_SESSION[dir].php");
      }
      ?>
      <!-- && strstr($PageFile, 'resources/views/index/index_') -->
      <?php
      if ($_SESSION['Ecommerce'] != '') {
            include('resources/views/index/index_' . $_SESSION['Ecommerce'] . '.php');
      } else {
            include($PageFile);
      }
      ?>
      <?php
      if ($_SESSION['Ecommerce'] != '') {
            include('config/inc/footer/footer_' . $_SESSION['Ecommerce'] . '.php');
      } else {
            include('config/inc/footer/footer_' . $_SESSION['dir'] . '.php');
      }
      ?>
</body>