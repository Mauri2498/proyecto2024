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


	public function generarTokenRestablecimiento($correo) {
		$token = bin2hex(random_bytes(50)); // Genera un token aleatorio
		$expiry = date('Y-m-d H:i:s', strtotime('+5 minutes')); // Token válido por 1 hora
		
		$this->db->set('reiniciarToken', $token);
		$this->db->set('tokenExpirado', $expiry);
		$this->db->where('correo', $correo);
		$this->db->update('usuario');
		
		return $token;
	}
	
	public function verificarToken($token) {
		$this->db->select('idusuario, tokenExpirado');
		$this->db->from('usuario');
		$this->db->where('reiniciarToken', $token);
		$query = $this->db->get();
		
		if ($query->num_rows() == 1) {
			$row = $query->row();
			if (strtotime($row->tokenExpirado) > time()) {
				return $row->idusuario;
			}
		}
		return false;
	}
	public function restablecerContrasenia($idusuario, $nuevaContrasenia) {
		$data = array(
			'clave' => sha1($nuevaContrasenia),
		);
		$this->db->where('idusuario', $idusuario);
		$this->db->update('usuario', $data);
	}

/* 	public function existeCorreo($correo) {
		$this->db->where('correo', $correo);
		$query = $this->db->get('usuario');
		return $query->num_rows() > 0;
	} */


	public function obtenerUsuarioPorCorreo($correo) {
		$this->db->where('correo', $correo);
		$query = $this->db->get('usuario');
		return $query->row();
	}
	
	public function actualizarContrasenia($idusuario, $nuevaContrasenia) {
		$data = array(
			'clave' => sha1($nuevaContrasenia)
		);
		$this->db->where('idusuario', $idusuario);
		$this->db->update('usuario', $data);
	}
}
