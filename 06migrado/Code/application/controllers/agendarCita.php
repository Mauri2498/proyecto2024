<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AgendarCita extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('agendarCita_Model'); 
        $this->load->model('Servicios_model');  
    }
	public function agendar()
	{
		$data['pacientes'] = $this->agendarCita_Model->listaPacientesDisponibles()->result();
        $data['servicios'] = $this->Servicios_model->listarservicios()->result();
		$this->load->view('inc/head');
		$this->load->view('inc/menu');
		$this->load->view('agendarCita',$data);
		$this->load->view('inc/footer');
	}
	public function agendarcita() {
		$data = array(
            'fechaAtencion' => $this->input->post('fechaAtencion'),
            'horaAtencion' => $this->input->post('horaAtencion'),
            'usuario_idusuario' => $this->input->post('usuario_idusuario'),
            'servicios_idservicios' => $this->input->post('servicios_idservicios')
        );

        if ($this->agendarCita_Model->agendar_cita($data)) {
            $this->session->set_flashdata('success', 'Cita agendada correctamente.');
        } else {
            $this->session->set_flashdata('error', 'Error al agendar la cita.');
        }
        redirect('agendarCita/agendar');
    }
	public function modificar()
	{
		$idagendarcita=$_POST['idagendarcita']; 
		$data['citas']=$this->agendarCita_Model->recuperarcita($idagendarcita);
		$data['pacientes'] = $this->agendarCita_Model->listaPacientes()->result(); 
    	$data['servicios'] = $this->Servicios_model->listarservicios()->result();
		$this->load->view('inc/head');
		$this->load->view('inc/menu');
		$this->load->view('modificarCita',$data);
		//$this->load->view('inc/footer');
	}
	public function modificarbd()
	{
    $idagendarcita = $this->input->post('idagendarcita');
    $data = array(
        'fechaAtencion' => strtoupper($this->input->post('fechaAtencion')),
        'horaAtencion' => strtoupper($this->input->post('horaAtencion')),
        'servicios_idservicios' => strtoupper($this->input->post('servicios_idservicios')) 
    );

    $this->agendarCita_Model->modificarcita($idagendarcita, $data);
    redirect('agendarCita/listaCitas', 'refresh');
	}
	
	public function listaCitas()
	{
		$data['citas'] = $this->agendarCita_Model->getCitas();
		$this->load->view('inc/head');
		$this->load->view('inc/menu');
		$this->load->view('listaDeCitas', $data);
		$this->load->view('inc/footer');
	}

	public function deshabilitarbd()
	{
		$idagendarcita=$_POST['idagendarcita']; 
		$data['estadoCita']='0';
		$this->agendarCita_Model->modificarEstadoCita($idagendarcita,$data);
		redirect('agendarCita/listaCitas','refresh');
	}
	public function habilitarbd()
	{
		$idagendarcita=$_POST['idagendarcita']; 
		$data['habilitado']='1';
		$this->agendarCita_Model->modificarEstadoCita($idagendarcita,$data);
		redirect('agendarCita/deshabilitados','refresh');
	}
	public function eliminarbd()
	{
		$idagendarcita=$_POST['idagendarcita']; 
		$this->agendarCita_Model->eliminarcita($idagendarcita);
		redirect('agendarCita/listaCitas','refresh');
	}
	public function eliminarbdAtendidos()
	{
		$idagendarcita=$_POST['idagendarcita']; 
		$this->agendarCita_Model->eliminarcita($idagendarcita);
		redirect('agendarCita/citasatendidas','refresh');
	}
	public function citasatendidas()
	{
		$data['cita'] = $this->agendarCita_Model->listaAtendidos();
		$this->load->view('inc/head');
		$this->load->view('inc/menu');
		$this->load->view('atendidos', $data);
		$this->load->view('inc/footer');
	}

}
