<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta http-equiv="window-target" content="_top">
<meta content="telephone=no" name="format-detection">
<meta name="msapplication-TileColor" content="#f55">
<meta name="msapplication-square150x150logo" content="images/ico.png">

<?php
if ($_SESSION['Ecommerce'] == 'ecommerce1') {
      include 'config/inc/title/title_ecommerce1.php';
} elseif ($_SESSION['Ecommerce'] == 'ecommerce2') {
      include 'config/inc/title/title_ecommerce2.php';
} elseif ($_SESSION['Ecommerce'] == 'ecommerce3') {
      include 'config/inc/title/title_ecommerce3.php';
} else {
      include "config/inc/title/title_$_SESSION[dir].php";
}
?>
<link rel="stylesheet" href="<?php echo $IncPath ?>/content/<?php echo $_SESSION['Ecommerce'] != '' ? $_SESSION['Ecommerce'] : $dir ?>/css/styles.css">
<link rel="stylesheet" href="<?php echo $IncPath ?>/content/css/bootstrap.min.css">
<script src="<?php echo $IncPath ?>/content/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo $IncPath ?>/content/js/jquery-3.7.1.min.js"></script>
<script src="<?php echo $IncPath ?>/content/js/jquery-ui.min.js"></script>