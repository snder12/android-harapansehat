<?php

defined("BASEPATH") or exit("No direct script access allowed");

require APPPATH . "/libraries/REST_Controller.php";

use Restserver\Libraries\REST_Controller;

class Kondisikesehatan extends REST_Controller
{
    function __construct($config = "rest")
    {
        parent::__construct($config);
        $this->load->database();
    }

    public function index_get()
    {
        $id_kondisikesehatan = $this->get("id_kondisikesehatan");
        if($id_kondisikesehatan == ""){
            $kondisikesehatan = $this->db->get("kondisikesehatan")->result();
        } else {
            $this->db->where("id_kondisikesehatan", $id_kondisikesehatan);
            $kondisikesehatan = $this->db->get("kondisikesehatan")->result();
        }
        $this->response(array("result"=>$kondisikesehatan));
    }

    public function index_post()
    {
        $data = array(
            "id_kondisikesehatan"       => $this->post("id_kondisikesehatan"),
            "berat_badan"               => $this->post("berat_badan"),
            "tinggi_badan"              => $this->post("tinggi_badan"),
            "tekanan_darah"             => $this->post("tekanan_darah"),
            "mata_minus"                => $this->post("mata_minus"),
            "riwayat_penyakit"          => $this->post("riwayat_penyakit")
        );

        $insert = $this->db->insert("kondisikesehatan", $data);
        if($insert){
            $response["status"] = true;
            $response["message"] = "Data ditambahkan";
            $response["data"] = [
                "id_kondisikesehatan"       => $data("id_kondisikesehatan"),
                "berat_badan"               => $data("berat_badan"),
                "tinggi_badan"              => $data("tinggi_badan"),
                "tekanan_darah"             => $data("tekanan_darah"),
                "mata_minus"                => $data("mata_minus"),
                "riwayat_penyakit"          => $data("riwayat_penyakit")
            ];   
        } else {
            $response["status"] = false;
            $response["message"] = "Data gagal ditambahkan";
        }
        $json = json_encode($response, JSON_PRETTY_PRINT);
        echo $json;
    }

    public function index_put()
    {
        $id_kondisikesehatan = $this->put("id_kondisikesehatan");
        $data = array(
            "id_kondisikesehatan"       => $this->put("id_kondisikesehatan"),
            "berat_badan"               => $this->put("berat_badan"),
            "tinggi_badan"              => $this->put("tinggi_badan"),
            "tekanan_darah"             => $this->put("tekanan_darah"),
            "mata_minus"                => $this->put("mata_minus"),
            "riwayat_penyakit"          => $this->put("riwayat_penyakit")
        );

        $this->db->where("id_kondisikesehatan", $id_kondisikesehatan);
        $update = $this->db->update("kondisikesehatan", $data);
        if($update){
            $this->response($data);
        }else{
            $this->response(array("status" => "fail"));
        }
    }
    


}