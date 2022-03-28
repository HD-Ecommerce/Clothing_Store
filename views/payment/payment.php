<!DOCTYPE html>
<html>
    <head>
        <title>Thanh toán</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../../assets/css/stylethanhtoan.css">
    </head>
    <body>
    <body class="nt-s nl-t" style="visibility: visible;">
        <div id="main">
            <div>
                <div class="_193wCc">
                    <div class="_3qBcH8">
                        <div class="container">
                            <div class="_13mnpg">
                                <a class="dlkJv9" href="../../">
                                    <div class="_2J1x0H">THY   |   Thanh toán</div>
                                    <!-- <div class="cart-page-logo__page-name">THY   |  Giỏ hàng</div> -->
                                </a>
                            </div>
                        </div>
                    </div>
                    <div role="main" class="_1WlhIE">
                        
                        <div class="_1p19xl">
                            <div class="ktZs2X">
                                <div class="_1_W4l_">
                                    <div class="_3GZI6L mpT3lP">
                                        <div class="_3NO6B5">Sản phẩm</div>
                                    </div>
                                    <div class="_3GZI6L _2vvZhb"></div>
                                    <div class="_3GZI6L">Đơn giá</div>
                                    <div class="_3GZI6L">Số lượng</div>
                                    <div class="_3GZI6L _17w1DK">Thành tiền</div>
                                </div>
                            </div>
                            <div>

                                <?php
                                    require_once('../../controllers/CartController.php');
                                    $controller_obj = new CartController();
                                    // Dùng id người đăng nhập
                                    $result = $controller_obj->list_payment(4);
                                    $tongTienHang = 0;
                                    while($row=mysqli_fetch_array($result)) {
                                        $dongia = $row['donGia'];
                                        $soluong = $row['soLuong'];
                                        $thanhtien = $dongia * $soluong;
                                        $tongTienHang += $thanhtien;
                                        $phiVanChuyen = 50000;
                                        ?>
                                        <div class="jNDkp2">
                                            <div>
                                                <div class="QjLA16">
                                                    <!-- Hãng -->
                                                    <!-- <div class="_2sALOn">
                                                        
                                                        <span class="_3xBVfW">Thời trang Unisex</span>
                                                        
                                                    </div> -->
                                                    <div class="_1oOvbg">
                                                        <div class="_3HkBPE _Fqc2-">
                                                            <div class="_1ASQkt _2rJzUE">
                                                                <img class="_1Qtf1H" src="../../assets/img/products/<?php echo $row['linkAnh'];?>" width="40" height="40">
                                                                <span class="_11r44J">
                                                                    <span class="_3F5vLQ"><?php echo $row['tenSP'];?></span>
                                                                </span>
                                                            </div>
                                                            <div class="_1ASQkt Aw_HtH">
                                                                <span class="_3y8KEH">Loại: <?php echo $row['size'].", ".$row['mau']?></span>
                                                            </div>
                                                            <div class="_1ASQkt" value="<?php echo $dongia;?>"><?php echo number_format($dongia, 0, ' ', ',');?> ₫</div>
                                                            <div class="_1ASQkt"><?php echo $soluong;?></div>
                                                            <div class="_1ASQkt _2z5WqO" name='ttien[]' value="<?php echo $thanhtien;?>"><?php echo number_format($thanhtien, 0, ' ', ',');?> ₫</div>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            
                                            <!-- <div class="_1MFx1Y">
                                                <div class="_3519w5">Tổng số tiền (2 sản phẩm):</div>
                                                <div class="-c5EIK">₫208.000</div>
                                            </div> -->
                                        </div>
                                    <?php ?>
                                <?php } ?>  
                            </div>
                        </div>
                        <div class="_1iurwE">
                            <!-- <div class="_1G9Cv7"></div> -->
                            <div class="_1gkIPw">
                                <div class="_1TKMuK">
                                    <div class="_20Qrq_">
                                        <div class="_2t2xOY">
                                            <svg height="16" viewBox="0 0 12 16" width="12" class="shopee-svg-icon icon-location-marker">
                                                <path d="M6 3.2c1.506 0 2.727 1.195 2.727 2.667 0 1.473-1.22 2.666-2.727 2.666S3.273 7.34 3.273 5.867C3.273 4.395 4.493 3.2 6 3.2zM0 6c0-3.315 2.686-6 6-6s6 2.685 6 6c0 2.498-1.964 5.742-6 9.933C1.613 11.743 0 8.498 0 6z" fill-rule="evenodd"></path>
                                            </svg>
                                        </div>
                                        <div>Địa chỉ nhận hàng</div>
                                    </div>
                                </div>
                                <div class="Jgz_oc">
                                    <div class="_2Pe7Hh">
                                        <select class="selectdc" name="diachi" id="diachi">
                                            <option value="diachi1">Nguyễn Văn Hoàn (+84) 965016595    338/51, Hoàng Diệu, Phường Bình Hiên, Quận Hải Châu, Đà Nẵng</option>
                                            <option value="diachi2">Nguyễn Thị Hoài (+84) 394854403    179/8 Phạm Hồng Thái, Phường 7, Thành Phố Vũng Tàu, Bà Rịa - Vũng Tàu</option>
                                        </select>
                                    </div>
                                </div>
                                <div></div>
                            </div>
                            <div class="_1CMLls">
                                <div class="_2cbALo _19UxTW">
                                    <div class="_2Bi0_l">
                                        
                                    </div>
                                </div>
                                <div class="_2cbALo _2i5d8_">
                                    <div class="_167h1y">Đơn vị vận chuyển:</div>
                                    <div class="_2v48Zq">
                                        <select class="selectvc" name="vanchuyen" id="vanchuyen">
                                            <option value="binhthuong">Bình thường</option>
                                            <option value="nhanh">Nhanh</option>
                                        </select>
                                    </div>
                                    <div class="_3aL7sd"></div>
                                    <div class="_1AYYHD"></div>
                                    
                                    <div class="_26DEZ8">Nhận hàng vào 15 Th01 - 18 Th01</div>
                                    <div class="_1OKizE" value="<?php echo $phiVanChuyen;?>">
                                        <?php echo number_format($phiVanChuyen, 0, ' ', ',');?> ₫
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="f23wB9">
                            <div class="qXX2_B">
                                <div class="_2SJQGt">
                                    <div class="_2u0cGK _1nfVQJ">Phương thức thanh toán</div>
                                    <div class="_3EPKkA">
                                        <select class="selectpttt" name="vanchuyen" id="vanchuyen">
                                            <option value="nhanhang">Thanh toán khi nhận hàng</option>
                                            <option value="tindung">Thẻ tín dụng</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="PC1-mc">
                                <div class="_1i3wS2 _1X3--o RihLPS">Tổng tiền hàng</div>
                                <div class="_1i3wS2 lsNObX RihLPS" value="<?php echo $tongTienHang;?>">
                                    <?php echo number_format($tongTienHang, 0, ' ', ',');?> ₫
                                </div>
                                <div class="_1i3wS2 _1X3--o _1tcGRT">Phí vận chuyển</div>
                                <div class="_1i3wS2 lsNObX _1tcGRT" value="<?php echo $phiVanChuyen;?>">
                                    <?php echo number_format($phiVanChuyen, 0, ' ', ',');?> ₫
                                </div>
                                <div class="_1i3wS2 _1X3--o _31KLpO">Tổng thanh toán:</div>
                                <?php $tongThanhToan = $tongTienHang+$phiVanChuyen;?>
                                <div class="_1i3wS2 _20-5lO lsNObX _31KLpO" value="<?php echo $tongThanhToan;?>">
                                    <?php echo number_format($tongThanhToan, 0, ' ', ',');?> ₫
                                </div>
                                <div class="_3swGZ9">
                                    <div class="RVLKaf">
                                        <div class="_28K0Ni">
                                            
                                        </div>
                                    </div>
                                    <a class="stardust-button stardust-button--primary stardust-button--large _1qSlAe" href="thanhtoan.php?idkh=<?php echo $_SESSION['login']['idND']?>">
                                        Đặt hàng
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>