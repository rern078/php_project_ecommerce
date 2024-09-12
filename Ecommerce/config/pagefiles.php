<?php
session_start();
function getPageFile($pageName)
{
      $pagefile = "resources/index/index_$_SESSION[dir].php";
      if ($_SESSION['id_provider'] == '') {
            $_SESSION['id_provider'] = 'SINGAPORE';
      }
      $commerce_design = false;
      if ($_SESSION['Ecommerce'] == 'ecommerce1' || $_SESSION['Ecommerce'] == 'ecommerce2' || $_SESSION['Ecommerce'] == 'ecommerce3') {
            $commerce_design = true;
      }
      switch ($pageName) {
            case 'home':
                  $pagefile = "resources/index/index_$_SESSION[dir].php";
                  break;
            case 'shop_grid':
                  $pagefile = "resources/views/shop/shop_grid.php";
                  break;
      }
      return $pagefile;
}
