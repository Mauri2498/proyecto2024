<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Servicios_model extends CI_Model {
    public function listarservicios() {
        $this->db->select('*');
        $this->db->from('servicios');
        $this->db->where_in('estadoServicio', [1]);
        return $this->db->get();
    }	
    
    public function agregarservicio($data)
	{
		$this->db->insert('servicios',$data);
	}
    public function modificarServicio($idservicios, $data) {
        $this->db->where('idservicios', $idservicios);
        $this->db->update('servicios', $data);
    }

    public function recuperarServicio($idservicios) {
        $this->db->select('*');
        $this->db->from('servicios');
        $this->db->where('idservicios', $idservicios);
        return $this->db->get();
    }

    public function eliminarServicio($idservicios) {
        $this->db->where('idservicios', $idservicios);
		$this->db->update('servicios', ['estadoServicio' => 0]);
    }

    
}
