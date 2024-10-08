<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cobro_model extends CI_Model {
    public function listacobros() {
        $this->db->select('
            cobro.idcobro,
            usuario.nombre AS nombrePaciente,
            usuario.apellidos AS apellidoPaciente,
            servicios.nombreServicio AS tipoAtencion,
            cobro.fechaCobro,
            cobro.total,
            cobro.monto,
            cobro.deuda
        ');
        $this->db->from('cobro');
        $this->db->join('agendarcita', 'cobro.agendarcita_idagendarcita = agendarcita.idagendarcita');
        $this->db->join('usuario', 'agendarcita.usuario_idusuario = usuario.idusuario');
        $this->db->join('servicios', 'agendarcita.servicios_idservicios = servicios.idservicios');
        return $this->db->get();
    }	

    public function guardarCobro($data) {
        $this->db->insert('cobro', $data);
        return $this->db->affected_rows() > 0;
    }
    public function obtenerDetallesPaciente($idUsuario) {
        $this->db->select('usuario.nombre, usuario.apellidos, servicios.nombreServicio, SUM(cobro.monto) AS pagado, servicios.costo AS total');
        $this->db->from('usuario');
        $this->db->join('agendarcita', 'usuario.idusuario = agendarcita.usuario_idusuario');
        $this->db->join('cobro', 'agendarcita.idagendarcita = cobro.agendarcita_idagendarcita', 'left');
        $this->db->join('servicios', 'agendarcita.servicios_idservicios = servicios.idservicios');
        $this->db->where('usuario.idusuario', $idUsuario);
        $query = $this->db->get();
        return $query->row();
    }
    public function obtenerCostoServicio($idServicio) {
        $this->db->select('costo');
        $this->db->from('servicios');
        $this->db->where('idservicios', $idServicio);
        $query = $this->db->get();
        return $query->row()->costo; // Devuelve el costo del servicio
    }

    public function obtenerIdAgendaCita($idUsuario, $idServicio) {
        $this->db->select('idagendarcita');
        $this->db->from('agendarcita');
        $this->db->where('usuario_idusuario', $idUsuario);
        $this->db->where('servicios_idservicios', $idServicio);
        $this->db->order_by('fechaAtencion', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->row() ? $query->row()->idagendarcita : NULL;
    }

}
