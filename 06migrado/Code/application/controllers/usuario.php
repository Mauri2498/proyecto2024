<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

    public function __construct() {
        parent::__construct();
        //$this->load->model('Usuario_model'); 
        $this->load->model('Servicios_model'); 
		$this->load->model('AgendarCita_model'); 
    }	
	public function listaCobros()
	{
		$this->load->view('inc/head');
		$this->load->view('inc/menu');
		$this->load->view('cobros');
		$this->load->view('inc/footer');
	}

	public function listaUsuarios()
	{
		$lista=$this->usuario_model->listausuarios();
		$data['usuarios']=$lista->result();
		$this->load->view('inc/head');
		$this->load->view('inc/menu');
		$this->load->view('listaDeUsuarios', $data);
		$this->load->view('inc/footer');
	}
	public function modificarU()
	{
		$idusuario=$_POST['idusuario']; 
		$data['usuario']=$this->usuario_model->recuperarUsuario($idusuario);
		$this->load->view('inc/head');
		$this->load->view('inc/menu');
		$this->load->view('formmodificar',$data);
		$this->load->view('inc/footer');
	}
	public function modificarbdU()
	{
	$idusuario = $_POST['idusuario']; 
	$data['nombre']=strtoupper($_POST['nombre']);
	$data['apellidos']=strtoupper($_POST['apellidos']);
	$data['sexo']=strtoupper($_POST['sexo']);
	$data['fechaNac']=strtoupper($_POST['fechaNac']);
    $data['celular'] = $_POST['celular'];
	$data['tipoUsuario']=strtoupper($_POST['tipoUsuario']);
	$data['usuario']=$_POST['usuario'];
    $this->usuario_model->modificarUsuario($idusuario, $data);
    redirect('usuario/listaUsuarios', 'refresh');
	}
	public function eliminarbdU()
	{
		$idusuario =$_POST['idusuario'];
		$this->load->model('agendarCita_model');
	
		if ($this->agendarCita_model->tieneCitas($idusuario)) {
			$this->session->set_flashdata('error', 'No se puede eliminar el usuario porque tiene citas asociadas.');
			redirect('usuario/listaUsuarios');
		} else {
			// Eliminar el usuario
			$this->usuario_model->eliminarUsuario($idusuario);
			redirect('usuario/listaUsuarios');
		}
	}
	public function intro()
	{
		//$this->load->view('inc/head');
/* 		$this->load->view('inc/menu'); */
		$this->load->view('ind');
		//$this->load->view('inc/footer');
		//$this->load->view('inc/pie');
	}

	public function vistaDoctor()
	{
		$this->load->view('inc/head');
		$this->load->view('inc/menu');
		$this->load->view('main');
		$this->load->view('inc/footer');
	}
	public function vistaPaciente()
	{
		$this->load->view('temp/headerTemp');
		$this->load->view('temp/mainTemp');
		$this->load->view('temp/footerTemp');
	}

	public function agregar()
	{
		$this->load->view('inc/menu');
		$this->load->view('formulario');
	}
	public function agregarR()
	{
		//$this->load->view('inc/menu');
		$this->load->view('formularioR');
	}
	public function login()
	{
		$this->load->view('loguin');
	}
	public function agregarbd()
	{
		//lado izquierda coincide con el nombre de la base de datos, de las columnas
		// el lado derecho es el name de el formulario
		$data['nombre']=strtoupper($_POST['nombre']);// 
		$data['apellidos']=strtoupper($_POST['apellidos']);// 
		$data['sexo']=strtoupper($_POST['sexo']);// 
		$data['fechaNac']=strtoupper($_POST['fechaNac']);// 
		$data['celular']=$_POST['celular'];
		$data['usuario']=$_POST['usuario'];// 
		$data['clave']=sha1($_POST['contrasenia']);// 
		$data['tipoUsuario']=strtoupper($_POST['tipoUsuario']);// 
		$this->usuario_model->agregarusuario($data);
		//redirect('usuario/agregar'); // Redirige de vuelta al formulario
	}
	//login session
	public function validarusuario(){
		$usuario=$_POST['usuario'];
		$clave=sha1($_POST['clave']);

		$consulta=$this->usuario_model->validar($usuario,$clave);//$tipo);
		if($consulta->num_rows()>0)
		{
			//usuario valido
			 foreach($consulta->result() as $row)
			{
				//$this->session->set_userdata('nombreVar','Valor')
				$this->session->set_userdata('idusuario',$row->idusuario);
				$this->session->set_userdata('usuario',$row->usuario);
				$this->session->set_userdata('nombre',$row->nombre);
				$this->session->set_userdata('apellidos',$row->apellidos);
				$this->session->set_userdata('tipoUsuario',$row->tipoUsuario);
				redirect('usuario/panel','refresh');
			} 
		}
		else
		{
			//acceso incorrecto - volvemos al login
			$data['error'] = 'El usuario o contraseña ingresados no son correctos.';
			$this->load->view('loguin', $data);
		}
	}
	public function panel()
	{
		if($this->session->userdata('usuario')) 
		{
			$tipoUsuario = $this->session->userdata('tipoUsuario');
			if ($tipoUsuario === 'DOCTOR') {
				redirect('usuario/vistaDoctor', 'refresh');
			} else {
				redirect('usuario/vistaPaciente', 'refresh');
			}
		} else {
			// Si no hay sesión iniciada, redirigir al login
			redirect('usuario/login', 'refresh');
		}
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('usuario/login','refresh');
	}
	public function cambiarContrasenia() 
	{ 
		//$this->load->view('inc/menu'); 
		$this->load->view('cambiarContrasenia'); 
	}
	public function cambiarContraseniabd() 
	{ 
		$actualContrasenia = $this->input->post('actualContrasenia'); 
		$nuevaContrasenia = $this->input->post('nuevaContrasenia'); 
		$confirmarContrasenia = $this->input->post('confirmarContrasenia'); 
		
		if ($nuevaContrasenia !== $confirmarContrasenia) { 
		$data['error'] = 'La nueva contraseña y la confirmación no coinciden.'; 
		$this->load->view('cambiarContrasenia', $data); 
		return; 
		} 
		
		$idusuario = $this->session->userdata('idusuario'); 
		$usuario = $this->session->userdata('usuario'); 
		
		$consulta = $this->usuario_model->validar_contra($usuario, sha1($actualContrasenia)); 
		if ($consulta->num_rows() == 0) { 
		$data['error'] = 'La contraseña actual es incorrecta.'; 
		$this->load->view('cambiarContrasenia', $data); 
		return; 
		} 
		
		$data = array( 
		'clave' => sha1($nuevaContrasenia) 
		); 
		$this->usuario_model->modificarUsuario($idusuario, $data); 
		
		$this->session->set_flashdata('success', 'Contraseña cambiada exitosamente.'); 
		redirect('usuario/logout'); 
	}
}
