<?php
class ModelKos extends CI_Model
{
    public function get_kos(){
        $query = $this->db->get('kos');
        return $query->result();
    }

    public function get_kos_byid($no_kamar){
        $this->db->where('no_kamar', $no_kamar);
        $query = $this->db->get('kos');
        return $query->row();
    }

    public function post_kos($data){
        return $this->db->insert('kos', $data);
    }

    public function put_kos($no_kamar, $data){
        $this->db->where('no_kamar', $no_kamar);
        return $this->db->update('kos', $data);
    }

    public function del_kos($no_kamar){
		return $this->db->delete('kos', ['no_kamar'=>$no_kamar]);
    }
}

?>
