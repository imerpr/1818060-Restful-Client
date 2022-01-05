<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kos extends CI_Controller 
{
    function __construct(){
        parent::__construct();
        $this->api="http://localhost/restful-server1/api/kos/";
        $this->load->library('Curl.php');
        $this->load->helper('url');
        $this->load->helper('form');
    }

    function index(){
        $data['kos']=json_decode($this->curl->simple_get($this->api),true);
        $this->load->view('listkos',$data);
    }

    function create(){
        if(isset($_POST['submit'])){
            $data=array(
                'no_kamar' =>$this->input->post('no_kamar'),
                'nama' =>$this->input->post('nama'),
                'tempat_tgl_lahir' =>$this->input->post('tempat_tgl_lahir'),
                'alamat_asal' =>$this->input->post('alamat_asal')
            );
            $insert=$this->curl->simple_post($this->api. '/add',$data,array(CURLOPT_BUFFERSIZE=>10));
            redirect('kos');
        }
        else{
            $this->load->view('createkos'); 

        }
    }
    function edit(){
        if(isset($_POST['submit'])){
            $no_kamar=$this->input->post('no_kamar');
            $data=array(
                'nama' =>$this->input->post('nama'),
                'tempat_tgl_lahir' =>$this->input->post('tempat_tgl_lahir'),
                'alamat_asal' =>$this->input->post('alamat_asal')
            );
            $update=$this->curl->simple_put($this->api.'/update/'.$no_kamar,$data,array(CURLOPT_BUFFERSIZE=>10));
            redirect('kos');
        }
        else{
            $no_kamar=$this->uri->segment(3);
            $data['kos']=json_decode($this->curl->simple_get($this->api.'/no_kamar/'.$no_kamar),true);
            $this->load->view('editkos',$data);
        }
    }
   
    function delete($no_kamar){
        if(empty($no_kamar)){
            redirect('kos');
        }
        else{
            $no_kamar=$this->uri->segment(3);
            $no_kamar['kos']=json_decode($this->curl->simple_delete($this->api.'/delete/'.$no_kamar),true);
            redirect('kos');
        }
    }
    
}
