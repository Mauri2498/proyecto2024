
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AgendarCita_model extends CI_Model
{
	public function listaPacientes()
	{
		$this->db->select('*');
		$this->db->from('usuario');
		$this->db->where('tipoUsuario', 'PACIENTE');
		return $this->db->get();
	}

	public function tieneCitas($idusuario)
	{
		$this->db->where('usuario_idusuario', $idusuario);
		$query = $this->db->get('agendarcita');
		return $query->num_rows() > 0;
	}
	public function obtenerPacientesConCitas()
	{
		$this->db->select('usuario.idusuario, usuario.nombre, usuario.apellidos');
		$this->db->from('agendarcita');
		$this->db->join('usuario', 'agendarcita.usuario_idusuario = usuario.idusuario');
		$this->db->group_by('usuario.idusuario');
		$query = $this->db->get();
		return $query;
	}
	public function getCitas()
	{
		$this->db->select('agendarcita.idagendarcita AS idAgendarCita, agendarcita.fechaAtencion, agendarcita.horaAtencion, agendarcita.estadoCita, usuario.nombre AS nombreUsuario, usuario.apellidos AS apellidosUsuario, servicios.nombreServicio AS nombreServicio');
		$this->db->from('agendarcita');
		$this->db->join('usuario', 'agendarcita.usuario_idusuario = usuario.idusuario');
		$this->db->join('servicios', 'agendarcita.servicios_idservicios = servicios.idservicios');
		$this->db->where('agendarcita.estadoCita', 1);
		$query = $this->db->get();
		return $query->result();
	}
	public function listaPacientesDisponibles()
	{
		$this->db->select('usuario.idusuario, usuario.nombre, usuario.apellidos');
		$this->db->from('usuario');
		$this->db->where('usuario.tipoUsuario', 'PACIENTE');
		$this->db->where_not_in('usuario.idusuario', "SELECT usuario_idusuario FROM agendarcita WHERE estadoCita = 1 OR estadoCita = 2", false);
		return $this->db->get();
	}

	public function agendar_cita($data)
	{
		$this->db->insert('agendarcita', $data);
	}

/* 	public function eliminarcita($idagendarcita)
	{
		$this->db->where('idagendarcita', $idagendarcita);
		$this->db->delete('agendarcita');
	}  */

	public function modificarcita($idagendarcita, $data)
	{
		$this->db->where('idagendarcita', $idagendarcita);
		$this->db->update('agendarcita', $data);
	}

	public function recuperarcita($idagendarcita)
	{
		$this->db->select('agendarcita.*, usuario.nombre AS nombreUsuario, usuario.apellidos AS apellidosUsuario');
		$this->db->from('agendarcita');
		$this->db->join('usuario', 'agendarcita.usuario_idusuario = usuario.idusuario');
		$this->db->where('idagendarcita', $idagendarcita);
		return $this->db->get();
	}

	public function listaAtendidos()
	{
		$this->db->select('agendarcita.idagendarcita AS idAgendarCita, agendarcita.fechaAtencion, agendarcita.horaAtencion, agendarcita.estadoCita, usuario.nombre AS nombreUsuario, usuario.apellidos AS apellidosUsuario, servicios.nombreServicio AS nombreServicio');
		$this->db->from('agendarcita');
		$this->db->join('usuario', 'agendarcita.usuario_idusuario = usuario.idusuario');
		$this->db->join('servicios', 'agendarcita.servicios_idservicios = servicios.idservicios');
		$this->db->where('agendarcita.estadoCita', 2);
		return $this->db->get();
	}

	public function modificarEstadoCita($idagendarcita, $data)
	{
		$this->db->where('idagendarcita', $idagendarcita);
		$this->db->update('agendarcita', $data);
	}
}
