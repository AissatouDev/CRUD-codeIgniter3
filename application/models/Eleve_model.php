<?php

class Eleve_model extends CI_Model
{
	function insertStudent($data)
	{
		$this->db->insert('eleves', $data);
		if ($this->db->affected_rows() >= 0) {
			return true;
		} else {
			return false;
		}
	}

	function getStudents()
	{
		$query = $this->db->get('eleves');
		return $query->result_array();
	}

	function getStudent($id)
    {
        $this->db->where('id',$id);
        $query=$this->db->get('eleves');
        return $query->row();

    }

    function updateStudent($data,$id)
    {
        $this->db->where('id',$id);
        $this->db->update('eleves',$data);
        if ($this->db->affected_rows() >= 0) {
            return true; 
        } else {
            return false; 
        }
    }

    function deleteStudent($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('eleves');
        if ($this->db->affected_rows() >= 0) {
            return true; 
        } else {
            return false; 
        }
    }
}
