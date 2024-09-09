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
            case 'login':
                  $pagefile = "resources/login/login.php";
                  break;
            case 'signup':
                  $pagefile = "resources/signup/signup.php";
                  break;
            case 'forgotpassword':
                  $pagefile = "resources/forgotpassword/forgotpassword.php";
                  break;
            case 'resetpassword':
                  $pagefile = "resources/resetpassword/resetpassword.php";
                  break;
            case 'profile':
                  $pagefile = "resources/profile/profile.php";
                  break;
            case 'order':
                  $pagefile = "resources/order/order.php";
                  break;
            case 'orderdetail':
                  $pagefile = "resources/orderdetail/orderdetail.php";
                  break;
            case 'search':
                  $pagefile = "resources/search/search.php";
                  break;
            case 'cart':
                  $pagefile = "resources/cart/cart.php";
                  break;
            case 'checkout':
                  $pagefile = "resources/checkout/checkout.php";
                  break;
            case 'thankyou':
                  $pagefile = "resources/thankyou/thankyou.php";
                  break;
            case 'contact':
                  $pagefile = "resources/contact/contact.php";
                  break;
            case 'about':
                  $pagefile = "resources/about/about.php";
                  break;
            case 'privacy':
                  $pagefile = "resources/privacy/privacy.php";
                  break;
            case 'terms':
                  $pagefile = "resources/terms/terms.php";
                  break;
            case 'faqs':
                  $pagefile = "resources/faqs/faqs.php";
                  break;
            case 'blog':
                  $pagefile = "resources/blog/blog.php";
                  break;
            case 'blogdetail':
                  $pagefile = "resources/blogdetail/blogdetail.php";
                  break;
            case 'contactus':
                  $pagefile = "resources/contactus/contactus.php";
                  break;
            case 'admin':
                  $pagefile = "resources/admin/admin.php";
                  break;
            case 'adminlogin':
                  $pagefile = "resources/adminlogin/adminlogin.php";
                  break;
            case 'adminhome':
                  $pagefile = "resources/adminhome/adminhome.php";
                  break;
            case 'adminprofile':
                  $pagefile = "resources/adminprofile/adminprofile.php";
                  break;
            case 'adminorder':
                  $pagefile = "resources/adminorder/adminorder.php";
                  break;
            case 'adminorderdetail':
                  $pagefile = "resources/adminorderdetail/adminorderdetail.php";
                  break;
            case 'adminproduct':
                  $pagefile = "resources/adminproduct/adminproduct.php";
                  break;
            case 'adminproductdetail':
                  $pagefile = "resources/adminproductdetail/adminproductdetail.php";
                  break;
            case 'admincategory':
                  $pagefile = "resources/admincategory/admincategory.php";
                  break;
            case 'admincategorydetail':
                  $pagefile = "resources/admincategorydetail/admincategorydetail.php";
                  break;
            case 'shop':
                  $pagefile = "resources/views/shop/shop_grid.php";
                  break;
      }
      return $pagefile;
}
function pageUrl($pageName)
{
      $pageFilePath = getPageFile($pageName);

      $baseUrl = "http://10.0.0.89:2036/";
      return $baseUrl . $pageFilePath;
}
