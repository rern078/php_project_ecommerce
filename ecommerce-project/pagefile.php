<?php
function getPageFile($PageName)
{
    $pagefile = "index.php";
    switch ($PageName) {
        case "/":
            $pagefile = "index.php";
            break;
        case "product-category":
            $pagefile = "product-category.php";
            break;
        case "about":
            $pagefile = "about.php";
            break;
        case "faq":
            $pagefile = "faq.php";
            break;
        case "contact":
            $pagefile = "contact.php";
            break;
    }
    return $pagefile;
}
?>