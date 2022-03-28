<?php
require_once("model.php");
class Account extends Model
{
       
    function CheckEmail($email)
    {
        $query =  "SELECT email FROM nguoidung WHERE email = '$email'";
        $result = $this->conn->query($query) -> num_rows;
        return $result == 1 ? "Email đã được sử dụng" : "";
    }

    function Register($data)
    {
        $checkEmail = $this->CheckEmail($data['email']);
        if(!empty($checkEmail)) {
            echo $checkEmail;
            return;
        }

        $k = "";
        $v = "";
        foreach ($data as $key => $value) {
            $k .= $key . ",";
            $v .= "'" . $value . "',";
        }
        $k = trim($k, ",");
        $v = trim($v, ",");
        $query = "INSERT INTO NguoiDung($k) VALUES ($v);";
        $result = $this->conn->query($query);

        echo $result ? "" : "Đăng ký Không thành công";
    }


    function Login($data)
    {
        $query = "SELECT * FROM nguoidung  WHERE email = '$data->email' AND matKhau = '".md5($data->password)."'";
        $login = $this->conn->query($query)->fetch_assoc();
        $res = new stdClass();

        if ($login == NULL) {
            $res->error = "Email hoặc mật khẩu sai";
            echo json_encode($res);
            return;
        } 
        if ($login['trangThai'] == 0) {
            $res->error = "Tài khoản của bản đã bị khóa";
            echo json_encode($res);
            return;
        }

        if($login['idQuyen'] == 1)
            $_SESSION['isAdmin'] = true;
        if($login['idQuyen'] == 2)
            $_SESSION['isEmployee'] = true;  
        if($login['idQuyen'] == 3)
            $_SESSION['isCustomer'] = true;
        
        $_SESSION['login'] = $login;  
        $res->error = "";
        $res->name = $login['tenND'];      
        echo json_encode($res);
    } 

    function Logout()
    {
        if(isset($_SESSION['isAdmin']))
            unset($_SESSION['isAdmin']);   
        if(isset($_SESSION['isEmployee']))
            unset($_SESSION['isEmployee']);     
        if(isset($_SESSION['isCustomer']))
            unset($_SESSION['isCustomer']);

        unset($_SESSION['login']);
        header('location: ?act=home');
    }


    
    // function account()
    // {
    //     $id = $_SESSION['login']['MaND'];
    //     return $this->conn->query("SELECT * from NguoiDung where MaND = $id")->fetch_assoc();
    // }
    // function update_account($data)
    // {
    //     $v = "";
    //     foreach ($data as $key => $value) {
    //         $v .= $key . "='" . $value . "',";
    //     }
    //     $v = trim($v, ",");

    //     $query = "UPDATE NguoiDung SET  $v   WHERE  MaND = " . $_SESSION['login']['MaND'];

    //     $result = $this->conn->query($query);
        
    //     if ($result == true) {
    //         setcookie('doimk', 'Cập nhật tài khoản thành công', time() + 2);
    //         header('Location: ?act=taikhoan&xuli=account#doitk');
    //     } else {
    //         setcookie('doimk', 'Mật khẩu xác nhận không đúng', time() + 2);
    //         header('Location: ?act=taikhoan&xuli=account#doitk');
    //     }
    // }
    // function error()
    // {
    //     header('location: ?act=errors');
    // }
}
