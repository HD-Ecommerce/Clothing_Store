<?php define('__ROOT__', dirname(dirname(__FILE__)));?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Shop THY</title>      
    <!-- jquery-ui -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
    <!-- box icon -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>

    <!-- Required Core stylesheet -->
    <link rel="stylesheet" href="./assets/js/node_modules/@glidejs/glide/dist/css/glide.core.min.css">

    <!-- Optional Theme stylesheet -->
    <link rel="stylesheet" href="./assets/js/node_modules/@glidejs/glide/dist/css/glide.theme.min.css">
    <!-- main css -->
    <link rel="stylesheet" href="./assets/css/style.css" />
  </head>
  <body>
    <main id="root" class="home">
      <?php
        // HEADER
        require_once("header_footer/header.php");
        // SEARCH CONTAINER
        require_once("search/searchContainer.php");
        // USER CONTAINER
        require_once("user/userContainer.php");
        // MINI CART 
        require_once("cart/miniCartContainer.php");
        // REDIRECT
        require_once("redirect.php");
        // FOOTER
        require_once("header_footer/footer.php");   
        // MODAL
        require_once("modal/modal.php");
      ?>
    </main>

    <!--===== JQUERY =====-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>    
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
    <script type="module" src="./assets/js/range.js" ></script>
    <!--===== GLIDE SLIDER =====-->
    <script src="./assets/js/node_modules/@glidejs/glide/dist/glide.min.js"></script>
    <script src="./assets/js/glide.js" ></script>
    <!--===== NUMERAL =====-->
    <script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>
    <!--===== MAIN JS =====-->
    <script type="module" src="./assets/js/app.js"></script>
    <script>
  
  </script>
  </body>
</html>
