<?php

defined("BASEPATH") or exit("No direct script access allowed");

require APPPATH . "/libraries/REST_Controller.php";

use Restserver\Libraries\REST_Controller;

class Register extends REST_Controller
{
    function __construct($config = "rest")
    {
        parent::__construct($config);
        $this->load->library('form_validation');
        $this->load->database();
    }

    public function index_post()
    {
        $this->form_validation->set_rules("email", "Email", "required|trim|valid_email");
        $this->form_validation->set_rules("username", "Username", "required|trim");
        $this->form_validation->set_rules("password", "Password", "required|trim");
        $this->form_validation->set_rules("alamat", "Alamat", "required");
        $this->form_validation->set_rules("no_hp", "No_Hp", "required");

        $validasi = $this->form_validation->run();

        if($validasi == true){
            $data = [
                "email"         => htmlspecialchars($this->input->post("email", true)),
                "username"      => htmlspecialchars($this->input->post("username", true)),
                "password"      => password_hash($this->input->post("password"), PASSWORD_DEFAULT),
                "alamat"        => htmlspecialchars($this->input->post("alamat")),
                "no_hp"         => htmlspecialchars($this->input->post("no_hp"))
            ];
            $regisStatus = $this->db->insert("user", $data);
            if($regisStatus){
                $response["status"] = true;
                $response["message"] = "Register berhasil";
                $response["data"] = [
                    "username" => $data["username"],
                ];         
                // $this->response(array("status" => "success", "message" => "Registrasi berhasil", "code" => 200));
            }else{
                $response["status"] = false;
                $response["message"] = "Register gagal";
            }
        }else{
            $response["status"] = false;
            $response["message"] = "Masukan data dengan benar!";
        }
        $json = json_encode($response, JSON_PRETTY_PRINT);
        echo $json;
    }
    
}