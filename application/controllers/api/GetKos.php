<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH. "libraries/Format.php";
require APPPATH. "libraries/RestController.php";
use chriskacerguis\RestServer\RestController;

class GetKos extends RestController{
    public function __construct(){
        parent::__construct();
        $this->load->model('ModelKos');
    }

    public function index_get(){
        $ks = new ModelKos;
        $resultks= $ks->get_kos();
        $this->response($resultks,200);
    }

    public function KosId_get($no_kamar){ 
        $ks = new ModelKos;
        $resultks= $ks->get_ks_byid($no_kamar);
        $this->response($resultks,200);
    }

    public function AddKos_post(){
        $ks = new ModelKos;
        $data=[
            'no_kamar' => $this->input->post('no_kamar'),
            'nama' => $this->input->post('nama'),
            'tempat_tgl_lahir' => $this->input->post('tempat_tgl_lahir'),
            'alamat_asal' => $this->input->post('alamat_asal'),
        ];
        $addks= $ks->post_kos($data);
        if($addks > 0){
            $this->response(
                [
                    'status' => true,
                    'pesan' => 'insert berhasil',
                ], RestController::HTTP_OK
            );
        }
        else{
            $this->response(
                [
                    'status' => false,
                    'pesan' => 'insert gagal'
                ], RestController::HTTP_BAD_REQUEST
            );

        }
    }

    public function UpdateKos_put($no_kamar){
        $ks= new ModelKos;
        $data=[
            'nama' => $this->put('nama'),
            'tempat_tgl_lahir' => $this->put('tempat_tgl_lahir'),
            'alamat_asal' => $this->put('alamat_asal'),
        ];
        $putks= $ks->put_kos($no_kamar, $data);
        if($putks > 0){
            $this->response(
                [
                    'status' => true,
                    'pesan' => 'update berhasil',
                ], RestController::HTTP_OK
            );
        }
        else{
            $this->response(
                [
                    'status' => false,
                    'pesan' => 'update gagal'
                ], RestController::HTTP_BAD_REQUEST
            );

        }
    }

    public function DeleteKos_delete($no_kamar){
        $ks= new ModelKos;
        $delks= $ks->del_kos($no_kamar);
        if($delks > 0){
            $this->response(
                [
                    'status' => true,
                    'pesan' => 'delete berhasil',
                ], RestController::HTTP_OK
            );
        }
        else{
            $this->response(
                [
                    'status' => false,
                    'pesan' => 'delete gagal'
                ], RestController::HTTP_BAD_REQUEST
            );

        }
    }
}

?>