<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Usuario_model extends CI_Model
{

	public function listausuarios()
	{
		$this->db->select('*');
		$this->db->from('usuario');
		$this->db->where_in('estadoUsuario', [1, 3]);
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
		$this->db->insert('usuario', $data);
	}
	public function validar_usuario($usuario, $contrasenia)
	{
		$this->db->select('idUsuario, usuario, nombre, apellidos, tipoUsuario');
		$this->db->from('usuario');
		$this->db->where('usuario', $usuario);
		$this->db->where('clave', sha1($contrasenia));
		return $this->db->get();
	}
	public function agregarUsuarioYCita($userData, $citaData)
	{
		$this->db->trans_start();

		// Insertar el nuevo usuario
		$this->db->insert('usuario', $userData);
		$userId = $this->db->insert_id();

		// Agregar el ID del usuario a los datos de la cita
		$citaData['usuario_idusuario'] = $userId;

		// Insertar la cita
		$this->db->insert('agendarcita', $citaData);

		$this->db->trans_complete();

		return $this->db->trans_status();
	}
	public function agregarYagendar($data, $idservicios, $fechaAtencion, $horaAtencion)
	{
		$this->db->trans_start();

		$this->db->insert('usuario', $data);
		$idUsuario = $this->db->insert_id();

		$data2 = [
			'servicios_idservicios' => $idservicios,
			'usuario_idusuario' => $idUsuario,
			'fechaAtencion' => $fechaAtencion,
			'horaAtencion' => $horaAtencion
		];
		$this->db->insert('agendarCita', $data2);

		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE) {
			return false;
		}

		return true;
	}
	public function modificarUsuario($idusuario, $data)
	{
		$this->db->where('idusuario', $idusuario);
		$this->db->update('usuario', $data);
	}
	public function recuperarUsuario($idusuario)
	{
		$this->db->select('*');
		$this->db->from('usuario');
		$this->db->where('idusuario', $idusuario);
		return $this->db->get();
	}

	public function eliminarUsuario($idusuario)
	{
		//$this->db->from('usuario');
		$this->db->where('idusuario', $idusuario);
		$this->db->update('usuario', ['estadoUsuario' => 0]);
	}

	public function validar($usuario, $clave)
	{
		$this->db->select('*');
		$this->db->from('usuario');
		$this->db->where('usuario', $usuario);
		$this->db->where('clave', $clave);
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


	public function generarTokenRestablecimiento($correo)
	{
		$token = bin2hex(random_bytes(50)); // Genera un token aleatorio
		$expiry = date('Y-m-d H:i:s', strtotime('+5 minutes')); // Token válido por 1 hora

		$this->db->set('reiniciarToken', $token);
		$this->db->set('tokenExpirado', $expiry);
		$this->db->where('correo', $correo);
		$this->db->update('usuario');

		return $token;
	}

	public function verificarToken($token)
	{
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
	public function restablecerContrasenia($idusuario, $nuevaContrasenia)
	{
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


	public function obtenerUsuarioPorCorreo($correo)
	{
		$this->db->where('correo', $correo);
		$query = $this->db->get('usuario');
		return $query->row();
	}

	public function actualizarContrasenia($idusuario, $nuevaContrasenia)
	{
		$data = array(
			'clave' => sha1($nuevaContrasenia)
		);
		$this->db->where('idusuario', $idusuario);
		$this->db->update('usuario', $data);
	}

	public function obtenerUsuarioPorNombre($usuario)
	{
		$this->db->where('usuario', $usuario);
		$query = $this->db->get('usuario');
		return $query->row(); // Retorna una fila como objeto
	}

	public function actualizarEstadoUsuario($idusuario, $estado)
	{
		$this->db->set('estadoUsuario', $estado);
		$this->db->where('idusuario', $idusuario);
		$this->db->update('usuario');
	}
}
