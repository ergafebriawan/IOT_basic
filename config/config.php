<?php
require "database.php";
class Config extends Database
{
    function __construct()
    {
        $this->connect = mysqli_connect($this->host, $this->username, $this->password, $this->database);
    }

    //PANEL
    public function getData($id = null)
    {
        if ($id === null) {
            return mysqli_query($this->connect, "SELECT * FROM `tbl_device`");
        } else {
            return mysqli_query($this->connect, "SELECT * FROM 'tbl_device' WHERE id_device='$id'");
        }
    }

    public function get_role($role){
        return mysqli_query($this->connect, "SELECT * FROM tbl_device WHERE role='$role'");
    }

    public function tombolControl($id, $x)
    {
        $id_ = intval($id);
        $val = intval($x);
        $update = mysqli_query($this->connect, "UPDATE `tbl_device` SET value = $val WHERE id= $id_");
        return $update;
    }
    //----------------------------------------------------------------------------------------------------------------------//

    //REPORT
    public function showReport(){
        return mysqli_query($this->connect, "SELECT * FROM tbl_monitoring;");
    }

    //---------------------------------------------------------------------------------------------------------------------//

    //API
    public function getDevice($id = null)
    {
        if ($id === null) {
            $data = mysqli_query($this->connect, "SELECT * FROM `tbl_device`");
        } else {
            $data = mysqli_query($this->connect, "SELECT * FROM `tbl_device` WHERE id_device=$id");
        }
        // $data = mysqli_query($this->connect, "SELECT * FROM `device`");
        $array_data = array();
        while ($baris = mysqli_fetch_assoc($data)) {
            $array_data[] = $baris;
        }

        return $array_data;
    }

    public function updateDevice($id, $value)
    {
        return mysqli_query($this->connect, "UPDATE `tbl_device` SET value= $value WHERE `tbl_device`.`id_device` = $id;");
    }

    public function addReport($mlx, $lm35, $image, $kondisi){
        return mysqli_query($this->connect, "INSERT INTO `tbl_monitoring` (`id_monitor`, `mlx19640`, `lm35`, `image`, `deteksi`, `created_at`) VALUES (NULL, '".$mlx."', '".$lm35."', '".$image."', '".$kondisi."', current_timestamp());");
    }

    //-----------------------------------------------------------------------------------------------------------------------//

    //AUTHENTICATIONS
    public function login($username, $password)
    {
        $query = mysqli_query($this->connect, "SELECT * FROM tbl_user WHERE username='$username'");
        $data_user = $query->fetch_array();
        if ($data_user['password'] == $password) {
            $_SESSION['username'] = $data_user['username'];
            $_SESSION['is_login'] = TRUE;
            return TRUE;
        }
    }
    //------------------------------------------------------------------------------------------------------------------------//
}
