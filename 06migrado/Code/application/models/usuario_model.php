<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model {
	public function listausuarios()
	{
		$this->db->select('*');
		$this->db->from('usuario');
		return $this->db->get();  
	}
	public function listaPacientes()
	{
        $this->db->select('*');
        $this->db->from('usuario');
        $this->db->where('tipoUsuario', 'PACIENTE');
        return $this->db->get();
	}
	

	public function agregarusuario($data)
	{
		$this->db->insert('usuario',$data);
	}
	public function validar_usuario($usuario, $contrasenia) {
        $this->db->select('idUsuario, usuario, nombre, apellidos, tipoUsuario');
        $this->db->from('usuario');
        $this->db->where('usuario', $usuario);
        $this->db->where('clave', sha1($contrasenia)); 
        return $this->db->get();
    }

	public function modificarUsuario($idusuario,$data)
	{
		$this->db->where('idusuario',$idusuario);
		$this->db->update('usuario',$data);
	}
	public function recuperarUsuario($idusuario)
	{
		$this->db->select('*');
		$this->db->from('usuario');
		$this->db->where('idusuario',$idusuario);
		return $this->db->get();
	}
	
	public function eliminarUsuario($idusuario)
	{
		$this->db->where('idusuario',$idusuario);
		$this->db->delete('usuario');
	}

	public function validar($usuario,$clave)
	{
		$this->db->select('*');
		$this->db->from('usuario');
		$this->db->where('usuario',$usuario);
		$this->db->where('clave',$clave);
		return $this->db->get(); 
	}

	
	public function cambiarContrasenia($idusuario, $nuevaContrasenia) 
	{ 
		$data = array( 
		'clave' => sha1($nuevaContrasenia)  
		); 
		$this->db->where('idusuario', $idusuario); 
		$this->db->update('usuario', $data); 
	}
	public function validar_contra($usuario, $contrasenia) 
	{ 
		$this->db->select('idusuario'); 
		$this->db->from('usuario'); 
		$this->db->where('usuario', $usuario); 
		$this->db->where('clave', $contrasenia);  
		return $this->db->get(); 
	}
}
