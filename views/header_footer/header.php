<header class="header">
  <div class="nav">
    <div id="side__toggle-btn">
      <svg
        xmlns="http://www.w3.org/2000/svg"
        xmlns:xlink="http://www.w3.org/1999/xlink"
        aria-hidden="true"
        role="img"
        width="32"
        height="32"
        preserveAspectRatio="xMidYMid meet"
        viewBox="0 0 32 32"
      >
        <path
          d="M4 7v2h24V7zm0 8v2h24v-2zm0 8v2h24v-2z"
          fill="currentColor"
        ></path>
      </svg>
    </div>

    <div class="nav__logo">
      <a href="."> THY </a>
    </div>

    <div class="nav__left">
      <div class="nav__left-items">
         <?php foreach ($menu as $item) : ?> 
            <a href="?act=product&handle=filter&idDM=<?php echo $item['idDM'];?>">
              <?php echo $item['tenDM'];?>
            </a>
          <?php endforeach; ?> 
        <a href="/">blog</a>
      </div>
    </div>
    <div class="nav__right">
      <div id="search-btn">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          xmlns:xlink="http://www.w3.org/1999/xlink"
          aria-hidden="true"
          role="img"
          width="32"
          height="32"
          preserveAspectRatio="xMidYMid meet"
          viewBox="0 0 32 32"
        >
          <path
            d="M19 3C13.488 3 9 7.488 9 13c0 2.395.84 4.59 2.25 6.313L3.281 27.28L4.72 28.72l7.968-7.969A9.922 9.922 0 0 0 19 23c5.512 0 10-4.488 10-10S24.512 3 19 3zm0 2c4.43 0 8 3.57 8 8s-3.57 8-8 8s-8-3.57-8-8s3.57-8 8-8z"
            fill="currentColor"
          ></path>
        </svg>
      </div>
      <div id="user-btn">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          width="38"
          height="38"
          viewBox="0 0 38 38"
        >
          <path
            d="M19 5.9375C14.4222 5.9375 10.6875 9.67219 10.6875 14.25C10.6875 17.1119 12.1481 19.6531 14.3616 21.1529C10.1258 22.9698 7.125 27.1736 7.125 32.0625H9.5C9.5 26.8019 13.7394 22.5625 19 22.5625C24.2606 22.5625 28.5 26.8019 28.5 32.0625H30.875C30.875 27.1736 27.8742 22.971 23.6384 21.1518C24.7681 20.3891 25.6937 19.3612 26.3342 18.158C26.9747 16.9549 27.3106 15.613 27.3125 14.25C27.3125 9.67219 23.5778 5.9375 19 5.9375ZM19 8.3125C22.2929 8.3125 24.9375 10.9571 24.9375 14.25C24.9375 17.5429 22.2929 20.1875 19 20.1875C15.7071 20.1875 13.0625 17.5429 13.0625 14.25C13.0625 10.9571 15.7071 8.3125 19 8.3125Z"
            fill="black"
          />
        </svg>
      </div>
      <!-- <script>
        function chuyenCart(){
          window.location="views/cart/cart.php";
        } onclick="chuyenCart();"
      </script> -->
      <div id="cart-btn" >
      
        <svg
          xmlns="http://www.w3.org/2000/svg"
          xmlns:xlink="http://www.w3.org/1999/xlink"
          aria-hidden="true"
          role="img"
          width="32"
          height="32"
          preserveAspectRatio="xMidYMid meet"
          viewBox="0 0 32 32"
        >
          <path
            d="M16 3c-2.746 0-5 2.254-5 5v1H6.062L6 9.938l-1 18L4.937 29h22.125L27 27.937l-1-18L25.937 9H21V8c0-2.746-2.254-5-5-5zm0 2a3 3 0 0 1 3 3v1h-6V8a3 3 0 0 1 3-3zm-8.063 6H11v3h2v-3h6v3h2v-3h3.063l.875 16H7.063z"
            fill="currentColor"
          >
          </path>
        </svg>
        <span>2</span>
        </a>
    </div>
  </div>
  <div class="side__nav">
    <div class="side__nav-header">
      <a href="."> THY </a>
      <div class="side__nav-close">
        <svg
          id="close_nav"
          class="icon-close"
          xmlns="http://www.w3.org/2000/svg"
          viewBox="0 0 24 24"
        >
          <path
            d="M23.707.293h0a1,1,0,0,0-1.414,0L12,10.586,1.707.293a1,1,0,0,0-1.414,0h0a1,1,0,0,0,0,1.414L10.586,12,.293,22.293a1,1,0,0,0,0,1.414h0a1,1,0,0,0,1.414,0L12,13.414,22.293,23.707a1,1,0,0,0,1.414,0h0a1,1,0,0,0,0-1.414L13.414,12,23.707,1.707A1,1,0,0,0,23.707.293Z"
          ></path>
        </svg>
      </div>
    </div>
    <div class="nav__mobile">
      <?php foreach ($menu as $item) : ?> 
        <a href="?act=product&handle=filter&idDM=<?php echo $item['idDM'];?>">
          <?php echo $item['tenDM'];?>
        </a>
      <?php endforeach; ?> 
      <a class="" href="/">Blog</a>
      <?php if(isset($_SESSION['login'])) {?> 
        <a class="" href="/">Thông tin cá nhân</a>
        <?php if(isset($_SESSION['isAdmin']) || isset($_SESSION['isEmployee'])) {?>
          <a class="" href="admin">Trang quản trị</a>
        <?php } ?>
        <a class="" href="?act=account&handle=logout">Đăng xuất</a>
      <?php } else { ?> 
        <a class="login-btn" href="/">Đăng nhập</a>
        <a class="register-btn" href="/">Đăng ký</a>
      <?php }?> 
    </div>
    <div class="side__nav-footer">
      <h2>THY - Thời trang hiện đại®</h2>
    </div>
  </div>
</header>