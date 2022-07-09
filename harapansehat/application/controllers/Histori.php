<?php

defined("BASEPATH") or exit("No direct script access allowed");

require APPPATH . "/libraries/REST_Controller.php";

use Restserver\Libraries\REST_Controller;

class Histori extends REST_Controller
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
            $histori = $this->db->get("histori")->result();
        } else {
            $this->db->where("id_antrian", $id_antrian);
            $histori = $this->db->get("histori")->result();
        }
        $this->response(array("result"=>$histori));
    }
}