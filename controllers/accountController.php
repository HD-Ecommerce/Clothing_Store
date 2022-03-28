<?php
require_once("models/account.php");
class AccountController
{
    var $account_model;
    public function __construct()
    {
        $this->account_model = new Account();
    }


    function Register()
    {
        $data = json_decode($_POST['data']);

        $data2 = array(
            'tenND'  => $data->name,
            'email'     => $data->email,
            'matKhau'  => md5($data->password),
            'idQuyen'   => 3,
            'trangThai' => 1,
        );

        $this->account_model->Register($data2);
    }
    
    function Login()
    {
        $data = json_decode($_POST['data']);
        $this->account_model->Login($data);
    }

    function Logout() {
        $this->account_model->Logout();
    }
    
    function GetUserID() {
        echo isset($_SESSION['login']) ? $_SESSION['login']['idND'] : -1;
    }
}
