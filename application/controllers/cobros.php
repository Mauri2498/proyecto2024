<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cobros extends CI_Controller {
    public function listaCobros() {
        $this->load->model('Cobro_model');
        $lista = $this->Cobro_model->listacobros();
        $data['cobros'] = $lista->result(); 

        $this->load->view('inc/head');
        $this->load->view('inc/menu');
        $this->load->view('listaDeCobros', $data); 
        $this->load->view('inc/footer');
    }
	public function detallePaciente() {
        $idUsuario = $this->input->post('idUsuario');
        
        if (!$idUsuario) {
            echo "ID de usuario no proporcionado";
            return;
        }
        // Cargar el modelo
        $this->load->model('Cobro_model'); 
        // Obtener los detalles del paciente
        $detalles = $this->Cobro_model->obtenerDetallesPaciente($idUsuario);
        if (!$detalles) {
            echo "No se encontraron detalles para el usuario";
            return;
        }
        // Cargar la vista de los detalles
        $this->load->view('detalle_paciente', ['detalles' => $detalles]);
    }

	public function registrarCobro() {
        $idUsuario = $this->input->post('usuario_idusuario');
        $idServicio = $this->input->post('servicios_idservicios');
        $montoPagado = floatval($this->input->post('monto'));
        $fecha = $this->input->post('fecha');
        $descripcion = $this->input->post('descripcion');
    
        if (empty($idUsuario) || empty($idServicio) || empty($montoPagado) || empty($fecha)) {
            echo json_encode(['error' => 'Por favor, completa todos los campos.']);
            return;
        }
    
        $this->load->model('Cobro_model');
        $costoServicio = floatval($this->Cobro_model->obtenerCostoServicio($idServicio));
    
        if ($montoPagado > $costoServicio) {
            echo json_encode(['error' => 'El monto pagado no puede ser mayor que el costo del servicio.']);
            return;
        }
    
        $idAgendaCita = $this->Cobro_model->obtenerIdAgendaCita($idUsuario, $idServicio);
    
        if (!$idAgendaCita) {
            echo json_encode(['error' => 'No se encontró una cita agendada para este usuario y servicio.']);
            return;
        }
    
        $detallesPaciente = $this->Cobro_model->obtenerDetallesPaciente($idUsuario);
        $totalPagado = $detallesPaciente->pagado + $montoPagado; 
        $deudaRestante = $detallesPaciente->total - $totalPagado;
    
        $data = [
            'fechaCobro' => $fecha,
            'monto' => $montoPagado,
            'descripcion' => $descripcion,
            'agendarcita_idagendarcita' => $idAgendaCita,
            'total' => $detallesPaciente->total,  
            'deuda' => $deudaRestante             
        ];
    
        if ($this->Cobro_model->guardarCobro($data)) {
            echo json_encode([
                'success' => 'Cobro registrado correctamente.',
                'montoPagado' => number_format($totalPagado, 2),
                'deudaRestante' => number_format($deudaRestante, 2)
            ]);
        } else {
            echo json_encode(['error' => 'Error al registrar el cobro en la base de datos.']);
        }
    }
}
