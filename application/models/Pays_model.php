<?php

class Pays_model extends CI_Model
{
 
	function insertPays($data)
	{
		$this->db->insert('pays', $data);
		return $this->db->insert_id();
	}

	function getAllPays()
	{
		return $this->db->get('pays')->result();
	}

	function getOnePays($id)
	{
		$this->db->where('id',$id);
        $query=$this->db->get('pays');
        return $query->row();
	}

	function updatePays($data,$id)
	{
		$this->db->where('id',$id);
        $this->db->update('pays',$data);
        if ($this->db->affected_rows() >= 0) {
            return true; 
        } else {
            return false; 
        }
	}

	function deletePays($id)
	{
		$this->db->where('id',$id);
        $this->db->delete('pays');
        if ($this->db->affected_rows() >= 0) {
            return true; 
        } else {
            return false; 
        }
	}
}

