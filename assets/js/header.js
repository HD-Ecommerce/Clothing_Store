import { section } from "./sections.js";
import { ajax_app } from "./ajax_app.js";

const header = (function () {
  const $ = document.querySelector.bind(document);
  const $$ = document.querySelectorAll.bind(document);

  function FeaturedProduct() {
    const rs = ajax_app.Get("?act=product&handle=featured");
    rs.then((result) => {
      $(".search__container .related__product-list").innerHTML =
        section.renderProducts2(JSON.parse(result));
    });
  }

  function ToggleSearch() {
    const searchContainer = $(".search__container");
    searchContainer.classList.toggle("active");

    if (!searchContainer.classList.contains("active")) return;
    FeaturedProduct();
  }

  // Open/close search container
  function SearchHandle() {
    $("#search-btn").addEventListener("click", ToggleSearch);
    $("#close-search-btn").addEventListener("click", ToggleSearch);
  }

  // Open/close user container
  function UserHandle() {
    $("#user-btn").addEventListener("click", () => {
      const userContainer = $(".user__container");
      userContainer.classList.toggle("active");
    });
  }

  function renderItemMiniCart(list) {
    if (!list) return "";

    let html = "",
      price,
      oldprice;
    list.forEach((item) => {
      price = item.phanTram
        ? item.donGia - (item.donGia / 100) * item.phanTram
        : item.donGia;
      oldprice = item.phanTram ? numeral(item.donGia).format("0,0") + " ₫" : "";
      html += `<li>
                  <div
                    class="product__thumbnail"
                    style="
                      background-image: url(./assets/img/products/${
                        item.linkAnh
                      });
                    "
                  >
                  </div>
                  <div>
                    <h6>${item.tenSP}</h6>
                    <span class="product__variation">${item.mau}, ${
        item.size
      }</span>
                    <div>
                      <strong>${numeral(price).format("0,0")} ₫</strong>
                      <span class = "old-price" >
                        ${oldprice}
                      </span>
                    </div>
                    <p class="qty">SL: ${item.soLuong}</p>
                  </div>
                </li>`;
    });

    return html;
  }

  async function LoadMiniCart(idKH) {
    const idND = idKH
      ? idKH
      : await ajax_app.Get("?act=account&handle=getUserID");
    const empty = '<h5 class = "qty-0" >Không có sản phẩm nào!</h5>';
    const listNode = $(".cart__container .mini__cart ul");

    console.log(idND);
    if (idND != -1) {
      let listProduct = await ajax_app.Post(
        "?act=cart&handle=listCart",
        "idND=" + idND
      );

      listProduct = JSON.parse(listProduct);
      console.log(listProduct);
      listNode.innerHTML =
        listProduct.length > 0 ? renderItemMiniCart(listProduct) : empty;
    } else {
      listNode.innerHTML = empty;
    }
  }

  //  Open/close mini cart
  function ToggleMiniCart() {
    const miniCart = $(".cart__container");
    miniCart.classList.toggle("active");

    miniCart.classList.contains("active") && LoadMiniCart();
  }

  function MiniCartHandle() {
    $("#cart-btn").addEventListener("click", ToggleMiniCart);
    $("#close-mini-cart").addEventListener("click", ToggleMiniCart);
  }

  // Open/close side nav
  function ToggleSideNav() {
    const sideNav = document.querySelector(".side__nav");
    sideNav.classList.toggle("active");
  }

  function SideNavHandle() {
    $("#side__toggle-btn").addEventListener("click", ToggleSideNav);
    $(".side__nav-close").addEventListener("click", ToggleSideNav);
  }

  function HeaderHandle() {
    SearchHandle();
    UserHandle();
    MiniCartHandle();
    SideNavHandle();
  }

  return {
    HeaderHandle,
    LoadMiniCart,
  };
})();

export { header };
