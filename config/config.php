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
            return mysqli_query($this->connect, "SELECT * FROM `device`");
        } else {
            return mysqli_query($this->connect, "SELECT * FROM 'device' WHERE id='$id'");
        }
    }

    public function get_role($role){
        return mysqli_query($this->connect, "SELECT * FROM device WHERE role='$role'");
    }

    public function tombolControl($id, $x)
    {
        $id_ = intval($id);
        $val = intval($x);
        $update = mysqli_query($this->connect, "UPDATE `device` SET value = $val WHERE id= $id_");
        return $update;
    }
    //----------------------------------------------------------------------------------------------------------------------//

    //API
    public function getDevice($id = null)
    {
        if ($id === null) {
            $data = mysqli_query($this->connect, "SELECT * FROM `device`");
        } else {
            $data = mysqli_query($this->connect, "SELECT * FROM `device` WHERE id=$id");
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
        return mysqli_query($this->connect, "UPDATE `device` SET value= $value WHERE `device`.`id` = $id;");
    }
    //-----------------------------------------------------------------------------------------------------------------------//

    //AUTHENTICATIONS
    public function login($username, $password)
    {
        $query = mysqli_query($this->connect, "SELECT * FROM user WHERE username='$username'");
        $data_user = $query->fetch_array();
        if ($data_user['password'] == $password) {
            $_SESSION['username'] = $data_user['username'];
            $_SESSION['is_login'] = TRUE;
            return TRUE;
        }
    }
    //------------------------------------------------------------------------------------------------------------------------//
}
