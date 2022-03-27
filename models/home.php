<?php
require_once("model.php");
class Home extends Model
{
    function LoadBanners() {
        $query = "SELECT * FROM banner WHERE trangthai = '1'";
        return $this->conn->query($query)->fetch_all(MYSQLI_ASSOC);
    }

    function NewProducts($limit, $dm) {
        $query = "SELECT
            sp.idSP,
            tenSP,
            donGia,
            hinhanh.linkAnh,
            slm.slMau,
            km.phanTram
        FROM
            sanpham sp
        JOIN hinhanh ON sp.idSP = hinhanh.idSP
        JOIN (SELECT m.idSP, COUNT(m.mau) as slMau FROM (SELECT DISTINCT idSP, mau FROM size_mau) as m GROUP BY m.idSP) slm
        ON slm.idSP = sp.idSP
        JOIN loaisanpham l ON l.idLSP = sp.idLSP
        LEFT JOIN chitietkhuyenmai ckm ON ckm.idSP = sp.idSP
        LEFT JOIN khuyenmai km ON ckm.idKM = km.idKM AND km.ngayKT > CURRENT_DATE
        WHERE l.idDM = $dm
        AND sp.trangThai = '1'
        GROUP BY sp.idSP
        ORDER BY sp.idSP DESC
        LIMIT $limit";
        return $this->conn->query($query)->fetch_all(MYSQLI_ASSOC);
    }

    function SeasonalProducts($limit, $dm, $season) {
        $query = "SELECT
            sp.idSP,
            tenSP,
            donGia,
            hinhanh.linkAnh,
            slm.slMau,
            km.phanTram
        FROM
            sanpham sp
        JOIN hinhanh ON sp.idSP = hinhanh.idSP
        JOIN (SELECT m.idSP, COUNT(m.mau) as slMau FROM (SELECT DISTINCT idSP, mau FROM size_mau) as m GROUP BY m.idSP) slm
        ON slm.idSP = sp.idSP
        JOIN loaisanpham l ON l.idLSP = sp.idLSP
        LEFT JOIN chitietkhuyenmai ckm ON ckm.idSP = sp.idSP
        LEFT JOIN khuyenmai km ON ckm.idKM = km.idKM AND km.ngayKT > CURRENT_DATE
        WHERE l.idDM = $dm
        AND sp.trangThai = '1'
        AND sp.mua = '$season'
        GROUP BY sp.idSP
        ORDER BY RAND()
        LIMIT $limit";
        return $this->conn->query($query)->fetch_all(MYSQLI_ASSOC);
    }

    function FeaturedProducts($rank, $dm) {
        $query = "SELECT
            sp.idSP,
            tenSP,
            donGia,
            hinhanh.linkAnh,
            slm.slMau,
            km.phanTram
        FROM
            sanpham sp
        JOIN hinhanh ON sp.idSP = hinhanh.idSP
        JOIN (SELECT m.idSP, COUNT(m.mau) as slMau FROM (SELECT DISTINCT idSP, mau FROM size_mau) as m GROUP BY m.idSP) slm
        ON slm.idSP = sp.idSP
        JOIN loaisanpham l ON l.idLSP = sp.idLSP
        JOIN size_mau sm on sm.idSP = sp.idSP
        JOIN chitietdonhang ct on ct.idSM = sm.idSM
        LEFT JOIN chitietkhuyenmai ckm ON ckm.idSP = sp.idSP
        LEFT JOIN khuyenmai km ON ckm.idKM = km.idKM AND km.ngayKT > CURRENT_DATE
        WHERE l.idDM = $dm
        AND sp.trangThai = '1'
        AND ct.idSM IN (
            SELECT idSM FROM (
                SELECT (DENSE_RANK() OVER (ORDER BY  sum(soLuong) DESC)) rank, idSM, sum(soLuong) FROM `chitietdonhang`
                GROUP BY idSM
                ORDER BY sum(soLuong) DESC) hot
            WHERE hot.rank <= $rank)
        GROUP BY sp.idSP";
        return $this->conn->query($query)->fetch_all(MYSQLI_ASSOC);
    }
}