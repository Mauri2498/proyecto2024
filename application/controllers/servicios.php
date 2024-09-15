<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Servicios extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Servicios_model'); 
		$this->load->model('AgendarCita_model'); 
    }	
	public function listaServicios()
	{
		$lista=$this->Servicios_model->listarservicios();
		$data['servicios']=$lista->result();
		$this->load->view('inc/head');
		$this->load->view('inc/menu');
		$this->load->view('listaDeServicios', $data);
		$this->load->view('inc/footer');
	}
	public function cobro()
	{
		$data['pacientes'] = $this->AgendarCita_model->obtenerPacientesConCitas()->result();
        $data['servicios'] = $this->Servicios_model->listarservicios()->result();
		$this->load->view('inc/head');
		$this->load->view('inc/menu');
		$this->load->view('cobros',$data);
		$this->load->view('inc/footer');
	}
	public function servicio() {
        $this->load->view('inc/menu');
        $this->load->view('agregarServicios');
    }

    public function agregarbd() {
        $data['nombreServicio'] = strtoupper($this->input->post('nombreServicio'));
		$data['costo'] = $this->input->post('costoServicio');
        $this->Servicios_model->agregarservicio($data);
        redirect('servicios/listaServicios');
    }

	public function modificar() {
		$idservicios = $this->input->post('idservicios');
		$data['servicio'] = $this->Servicios_model->recuperarServicio($idservicios)->row();
		//$this->load->view('inc/head');
		$this->load->view('inc/menu');
		$this->load->view('modificarServicios', $data);
		//$this->load->view('inc/footer');
	}

    public function modificarbd() {
        $idservicios = $this->input->post('idservicios');
        $data['nombreServicio'] = strtoupper($this->input->post('nombreServicio'));
		$data['costo'] = $this->input->post('costoServicio');
        $this->Servicios_model->modificarServicio($idservicios, $data);
        redirect('servicios/listaServicios');
    }

	public function eliminarbd() {
		$idservicios = $this->input->post('idservicios');
		$this->Servicios_model->eliminarServicio($idservicios);
		redirect('servicios/listaServicios');
	}

}
