<?php
$act = isset($_GET['act']) ? $_GET['act'] : "home";
$handle = isset($_GET['handle']) ? $_GET['handle'] : "index";
switch ($act) {
    case 'home':
        // BANNER
        require_once("banner/banner.php");
        // NEW PRODUCTS
        require_once("sections/newProducts.php");
        // SEASON
        require_once("sections/season.php");
        // FEATURED PRODUCTS
        require_once("sections/featuredProducts.php");
        break;
    case 'product':
        switch($handle) {
            case 'detail': 
                require_once('product/detail.php');
                break;
            case 'filter':
                require_once('product/filter.php');
                break;
        }
        break;
}
?>