<?php

defined("BASEPATH") or exit("No direct script access allowed");

require APPPATH . "/libraries/REST_Controller.php";

use Restserver\Libraries\REST_Controller;

class Antrian extends REST_Controller
{
    function __construct($config = "rest")
    {
        parent::__construct($config);
        $this->load->database();
    }

    public function index_get()
    {
        $id_antrian = $this->get("id_antrian");
        if($id_antrian == ""){
            $antrian = $this->db->get("antrian")->result();
        } else {
            $this->db->where("id_antrian", $id_antrian);
            $antrian = $this->db->get("antrian")->result();
        }
        $this->response(array("result"=>$antrian));
    }

    public function index_post()
    {
        $data = array(
            "nama_pasien"       => $this->post("nama_pasien"),
            "usia"              => $this->post("usia"),
            "keluhan"           => $this->post("keluhan"),
            "jenis_kelamin"     => $this->post("jenis_kelamin"),
            "tanggal_lahir"     => $this->post("tanggal_lahir")
        );

        $update = $this->db->insert("antrian", $data);
        if($update){
            $response["status"] = true;
            $response["message"] = "Antrian ditambahkan";
            $response["data"] = [
                "nama_pasien"    => $data["nama_pasien"]
            ];
        }else{
            $response["status"] = false;
            $response["messsage"] = "Gagal menambah antrian";
        }
        $json = json_encode($response, JSON_PRETTY_PRINT);
        echo $json;
    }

    public function index_delete()
    {
        $id_antrian = $this->get("id_antrian");
        // $id_antriann = 3;
        $query = $this->db->query("INSERT INTO histori (id_antrian, nama_pasien, usia, keluhan, jenis_kelamin, tanggal_lahir) SELECT id_antrian, nama_pasien, usia, keluhan, jenis_kelamin, tanggal_lahir FROM antrian WHERE id_antrian = $id_antrian;");
        if($query){
            $response["status"] = true;
            $response["message"] = "Histori ditambahkan";
        }else{
            $response["status"] = false;
            $response["messsage"] = "Gagal menambah histori";
        }

        $json = json_encode($response, JSON_PRETTY_PRINT);
        echo $json;

        $query = $this->db->query("DELETE FROM antrian WHERE id_antrian = $id_antrian;");

        if($query){
            $response["status"] = true;
            $response["message"] = "Antrian dihapus";
        }else{
            $response["status"] = false;
            $response["messsage"] = "Gagal menghapus antrian";
        }

        $json = json_encode($response, JSON_PRETTY_PRINT);
        echo $json;

    }

}