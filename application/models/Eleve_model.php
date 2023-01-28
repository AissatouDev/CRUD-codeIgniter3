<?php

class Eleve_model extends CI_Model
{


	function insertStudent($data)
	{
		$this->db->insert('eleves', $data);
		return $this->db->insert_id();
	}

	function getStudents()
	{
		return $this->db->get('eleves')->result();
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
