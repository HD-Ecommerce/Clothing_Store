<?php
require_once('./models/sanPhamModel.php');

class sanPhamController
{
    var $sp_model;
    public function __construct()
    {
        $this->sp_model = new sanPhamModel();
    }

    public function getAllSanPham()
    {
        $data =  array();
        $data = $this->sp_model->getAllSanPham();
        return $data;
    }

    public function add()
    {
        $data = array(
            'tenSP' => $_POST['tenSP'],
            'idLSP'  => $_POST['idLSP'],
            'donGia' => $_POST['donGia'],
            'mua' => $_POST['mua'],
            'moTa' => $_POST['MoTa'],
            'trangThai' => 1
        );
        foreach ($data as $key => $value) {
            if (strpos($value, "'") != false) {
                $value = str_replace("'", "\'", $value);
                $data[$key] = $value;
            }
        }
        $this->sp_model->add($data);
        require_once('./views/sanpham/sanPhamView.php');
    }

    public function getSanPhamById($id)
    {
        $result = $this->sp_model->getSanPhamById($id);
        return $result;
    }

    public function delete()
    {
        $data = array(
            'idSP' => $_GET['id'],
            'trangThai' => 0
        );
        foreach ($data as $key => $value) {
            if (strpos($value, "'") != false) {
                $value = str_replace("'", "\'", $value);
                $data[$key] = $value;
            }
        }
        $rs = $this->sp_model->update($data);
        if ($rs == true) {
            setcookie('msg', 'Xóa thành công', time() + 2);
            header('Location: ?mod=sanpham');
        } else {
            setcookie('msg', 'Xóa không thành công', time() + 2);
            header('Location: ?mod=sanpham');
        }
    }

    public function update()
    {
        $data = array(
            'idSP' => $_POST['idSP'],
            'tenSP' => $_POST['tenSP'],
            'idLSP'  => $_POST['idLSP'],
            'donGia' => $_POST['donGia'],
            'mua' => $_POST['mua'],
            'moTa' => $_POST['MoTa'],
            'trangThai' => 1
        );
        foreach ($data as $key => $value) {
            if (strpos($value, "'") != false) {
                $value = str_replace("'", "\'", $value);
                $data[$key] = $value;
            }
        }


        //kiểm tra đã chọn size chưa
        foreach ($_POST['mau'] as $value) {
            $ten = $value . "_size";
            if (empty($_POST[$ten])) {
                setcookie('msgsize', 'Vui lòng chọn size', time() + 2);
                header('Location: ?mod=sanpham&act=edit&id=' . $_POST['idSP']);
                return;
            }
        }
        //thêm màu chưa có
        // if (isset($_POST['mau'])) {

        //     foreach ($_POST['mau'] as $value) {
        //         //kiểm tra màu được chọn đã có trong csdl chưa
        //         $kt = $this->kiemTraMau($data['idSP'], $value);
        //         if (!$kt) {
        //             $arrayMau = array(
        //                 'idSP' => $_POST['idSP'],
        //                 'mau' => $value,
        //                 'trangThai' => 1
        //             );
        //             foreach ($arrayMau as $key => $value) {
        //                 if (strpos($value, "'") != false) {
        //                     $value = str_replace("'", "\'", $value);
        //                     $arrayMau[$key] = $value;
        //                 }
        //             }
        //             $this->sp_model->insertSizeMau($arrayMau);
        //         }
        //     }
        // }

        // //lấy màu đã có của sản phẩm
        // $listmau = $this->sp_model->getMauByIdSP($data['idSP']);
        // //đổi toàn bộ thành trạng thái 0
        // foreach ($listmau as $value) {
        //     $arrayMau = array(
        //         'idSP' => $_POST['idSP'],
        //         'mau' => $value['mau'],
        //         'trangThai' => 0
        //     );
        //     foreach ($arrayMau as $key => $value) {
        //         if (strpos($value, "'") != false) {
        //             $value = str_replace(
        //                 "'",
        //                 "\'",
        //                 $value
        //             );
        //             $arrayMau[$key] = $value;
        //         }
        //     }
        //     $this->sp_model->updateSizeMau($arrayMau);
        // }

        // //đổi trạng thái thành 1
        // foreach ($_POST['mau'] as $value) {
        //     $arrayMau = array(
        //         'idSP' => $_POST['idSP'],
        //         'mau' => $value,
        //         'trangThai' => 1
        //     );
        //     foreach ($arrayMau as $key => $value) {
        //         if (strpos($value, "'") != false) {
        //             $value = str_replace(
        //                 "'",
        //                 "\'",
        //                 $value
        //             );
        //             $arrayMau[$key] = $value;
        //         }
        //     }
        //     $this->sp_model->updateSizeMau($arrayMau);
        // }

        //thêm size cho từng màu
        foreach ($_POST['mau'] as $mau) {
            $ten = $mau . "_size";
            if (empty($_POST[$ten])) {
                setcookie('msgsize', 'Vui lòng chọn size', time() + 2);
                header('Location: ?mod=sanpham&act=edit&id=' . $_POST['idSP']);
                return;
            }
            foreach ($_POST[$ten] as $size) {
                //kiểm tra size đã có chưa
                $kt = $this->kiemTraSize($_POST['idSP'], $mau, $size);
                if (!$kt) { //thêm size chưa có
                    $arrayMau = array(
                        'idSP' => $_POST['idSP'],
                        'mau' => $mau,
                        'size' => $size,
                        'trangThai' => 1
                    );
                    foreach ($arrayMau as $key => $value) {
                        if (strpos($value, "'") != false) {
                            $value = str_replace(
                                "'",
                                "\'",
                                $value
                            );
                            $arrayMau[$key] = $value;
                        }
                    }
                    $this->sp_model->insertSizeMau($arrayMau);
                }
            }

            //lấy size đã có của sản phẩm
            $listSize = $this->sp_model->getSizeByIdSPMau($_POST['idSP'], $mau);

            // //đổi toàn bộ thành trạng thái 0
            foreach ($listSize as $size) {
                $arrayMau = array(
                    'idSP' => $_POST['idSP'],
                    'mau' => $mau,
                    'size' => $size['size'],
                    'trangThai' => 0
                );
                foreach ($arrayMau as $key => $value) {
                    if (strpos($value, "'") != false) {
                        $value = str_replace(
                            "'",
                            "\'",
                            $value
                        );
                        $arrayMau[$key] = $value;
                    }
                }
                $this->sp_model->updateSizeMau($arrayMau);
            }

            //đổi toàn bộ thành trạng thái 1
            foreach ($_POST[$ten] as $size) {
                $arrayMau = array(
                    'idSP' => $_POST['idSP'],
                    'mau' => $mau,
                    'size' => $size,
                    'trangThai' => 1
                );
                foreach ($arrayMau as $key => $value) {
                    if (strpos($value, "'") != false) {
                        $value = str_replace(
                            "'",
                            "\'",
                            $value
                        );
                        $arrayMau[$key] = $value;
                    }
                }
                $this->sp_model->updateSizeMau($arrayMau);
            }
            //upload ảnh
            $bienAnh = $_POST['idSP'] . "_" . $mau . "_img_file";
            if (!empty($_FILES[$bienAnh]['name'])) {
                foreach ($_FILES[$bienAnh]['name'] as $name => $value) {
                    $name_img = stripslashes($_FILES[$bienAnh]['name'][$name]);
                    $source_img = $_FILES[$bienAnh]['tmp_name'][$name];
                    $path_img = "upload/" . $name_img;
                    move_uploaded_file($source_img, $path_img);

                    //insert anh
                    //kiểm tra tên ảnh đã có chưa
                    $ktTenAnh = false;
                    $listTenAnh = $this->getAnhByIdSPMau($_POST['idSP'], $mau);
                    foreach ($listTenAnh as $anh) {
                        if ($anh['linkAnh'] == $name_img) {
                            $ktTenAnh = true;
                            break;
                        }
                    }
                    if (!empty($name_img) && !$ktTenAnh) {
                        $listAnh = array(
                            'linkAnh' => $name_img,
                            'idSP'  => $_POST['idSP'],
                            'mau' => $mau
                        );
                        foreach ($listAnh as $key => $value) {
                            if (strpos($value, "'") != false) {
                                $value = str_replace("'", "\'", $value);
                                $listAnh[$key] = $value;
                            }
                        }
                        $this->sp_model->insertAnh($listAnh);
                    } else {
                        if ($ktTenAnh) {
                            setcookie('msgsize', 'Tên ảnh đã có', time() + 2);
                            header('Location: ?mod=sanpham&act=edit&id=' . $_POST['idSP']);
                            return;
                        }
                    }
                }
            }
        }

        //đổi trạng thái màu trong csdl thành 0 đối với màu không chọn
        $listMau = $this->getMauByIdSP($_POST['idSP']);
        $strListMauChon = "";
        foreach ($_POST['mau'] as $mau) {
            $strListMauChon .= ", " . $mau;
        }

        //kiểm tra màu trong csdl có đc chọn không
        foreach ($listMau as $mau) {

            if (!str_contains($strListMauChon, $mau['mau'])) {
                $arrayMauK = array(
                    'idSP' => $_POST['idSP'],
                    'mau' => $mau['mau'],
                    'size' => $mau['size'],
                    'trangThai' => 0
                );
                foreach ($arrayMauK as $key => $value) {
                    if (strpos($value, "'") != false) {
                        $value = str_replace(
                            "'",
                            "\'",
                            $value
                        );
                        $arrayMauK[$key] = $value;
                    }
                }
                $this->sp_model->updateSizeMau($arrayMauK);
            }
        }

        $rs = $this->sp_model->update($data);
        if ($rs == true) {
            setcookie('msg', 'Cập nhật thành công', time() + 2);

            header('Location: ?mod=sanpham');
        } else {
            setcookie('msg', 'Cập nhật không thành công', time() + 2);

            header('Location: ?mod=sanpham&act=edit&id=' . $_POST['idSP']);
        }
    }

    public function getMauByIdSP($idSP)
    {
        return $this->sp_model->getMauByIdSP($idSP);
    }

    public function kiemTraMau($idSP, $mau)
    {
        return $this->sp_model->kiemTraMau($idSP, $mau);
    }

    public function kiemTraMauDaChon($idSP, $mau)
    {
        return $this->sp_model->kiemTraMauDaChon($idSP, $mau);
    }
    public function kiemTraSizeDaChon($idSP, $mau, $size)
    {
        return $this->sp_model->kiemTraSizeDaChon($idSP, $mau, $size);
    }
    public function kiemTraSize($idSP, $mau, $size)
    {
        return $this->sp_model->kiemTraSize($idSP, $mau, $size);
    }

    public function getAnhByIdSPMau($idSP, $mau)
    {
        return $this->sp_model->getAnhByIdSPMau($idSP, $mau);
    }
}