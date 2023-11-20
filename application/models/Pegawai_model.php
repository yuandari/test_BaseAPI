<?php

class Pegawai_model extends CI_Model
{
    public function get_data()
    {
        return $this->db->get('pegawai')->result();
    }

    public function insert($data)
    {
        $this->db->insert('pegawai', $data);
    }

    public function update($data, $where)
    {
        $this->db->update('pegawai', $data, $where);
    }

    public function delete($where)
    {
        $this->db->where($where);
        $this->db->delete('pegawai');
    }
}
