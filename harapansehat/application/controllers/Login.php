<?php

defined("BASEPATH") or exit("No direct script access allowed");

require APPPATH . "/libraries/REST_Controller.php";

use Restserver\Libraries\REST_Controller;

class Login extends REST_Controller
{
    function __construct($config = "rest")
    {
        parent::__construct($config);
        $this->load->library('session');
        $this->load->database();
    }

    public function index_post(){
        $username = $this->input->post("username");
        $password = $this->input->post("password");

        $response = [];

        $user = $this->db->get_where("user", ["username" => $username])->row_array();

        if($user == true){
            if(password_verify($password, $user["password"])){
                $data = [
                    "username" => $user["username"],
                ];

                $this->session->set_userdata($data);

                $response["status"] = true;
                $response["message"] = "Login Berhasil";
                $response["data"] = [
                    "id_user" => $user["id_user"], 
                    "username" => $user["username"],
                ];
            }else{
                $response["status"] = false;
                $response["message"] = "Password salah";
            }
        }else{
            $response["status"] = false;
            $response["message"] = "User tidak ditemukan, silahkan Register";
        }

        $json = json_encode($response, JSON_PRETTY_PRINT);
        echo $json;
    }
}