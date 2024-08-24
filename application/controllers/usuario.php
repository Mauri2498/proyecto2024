<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Usuario extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Usuario_model');
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
		$lista = $this->usuario_model->listausuarios();
		$data['usuarios'] = $lista->result();
		$this->load->view('inc/head');
		$this->load->view('inc/menu');
		$this->load->view('listaDeUsuarios', $data);
		$this->load->view('inc/footer');
	}
	public function modificarU()
	{
		$idusuario = $_POST['idusuario'];
		$data['usuario'] = $this->usuario_model->recuperarUsuario($idusuario);
		$this->load->view('inc/head');
		$this->load->view('inc/menu');
		$this->load->view('formmodificar', $data);
		$this->load->view('inc/footer');
	}
	public function modificarbdU()
	{
		$idusuario = $_POST['idusuario'];
		$data['nombre'] = strtoupper($_POST['nombre']);
		$data['apellidos'] = strtoupper($_POST['apellidos']);
		$data['sexo'] = strtoupper($_POST['sexo']);
		$data['fechaNac'] = strtoupper($_POST['fechaNac']);
		$data['celular'] = $_POST['celular'];
		$data['tipoUsuario'] = strtoupper($_POST['tipoUsuario']);
		$data['usuario'] = $_POST['usuario'];
		$this->usuario_model->modificarUsuario($idusuario, $data);
		redirect('usuario/listaUsuarios', 'refresh');
	}
	public function eliminarbdU()
	{
		$idusuario = $_POST['idusuario'];
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
		/* 		$this->load->view('inc/menu'); */
		$this->load->view('ind');
		//$this->load->view('inc/footer');
		//$this->load->view('inc/pie');
	}
	public function vistaDoctorAdmin()
	{
		$this->load->view('inc/head');
		$this->load->view('inc/menu');
		$this->load->view('main');
		$this->load->view('inc/footer');
	}
	public function vistaDoctor()
	{
		$this->load->view('inc/head');
		$this->load->view('inc/menu');
		$this->load->view('main2');
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
		$this->load->view('inc/head');
		$this->load->view('inc/menu');
		$this->load->view('formulario');
		$this->load->view('inc/footer');
	}
	public function agregarU()
	{
		$this->load->view('inc/head');
		$this->load->view('inc/menu');
		$this->load->view('formularioU');
		$this->load->view('inc/footer');
	}
	public function agregarR()
	{
		//$this->load->view('inc/menu');
		$this->load->view('formularioR');
	}
	public function login()
	{
		$this->load->view('login3');
	}
	public function agregarbd()
	{
		$data['nombre'] = strtoupper($_POST['nombre']);
		$data['apellidos'] = strtoupper($_POST['apellidos']);
		$data['sexo'] = strtoupper($_POST['sexo']);
		$data['fechaNac'] = $_POST['fechaNac']; // No es necesario convertir a mayúsculas una fecha
		$data['celular'] = $_POST['celular'];
		$data['correo'] = $_POST['correo'];
		$data['usuario'] = $_POST['usuario'];
		$data['clave'] = sha1($_POST['contrasenia']); // Considera usar password_hash() para mayor seguridad
		$data['tipoUsuario'] = strtoupper($_POST['tipoUsuario']);
		$data['estadoUsuario'] = 0;

		$this->load->library('email');
		$this->email->from('europa2498@gmail.com', 'Consultorio Dental Reynolds');
		$this->email->to($data['correo']);
		$this->email->subject('Detalles de su cuenta');
		$this->email->message("Estimado/a {$data['nombre']} {$data['apellidos']},\n\n" .
			"Su cuenta ha sido creada exitosamente. A continuación, le proporcionamos sus detalles de acceso:\n\n" .
			"Usuario: {$data['usuario']}\n" .
			"Contraseña: $password\n\n" .
			"Haga clic en el siguiente enlace para activar su cuenta: <a href='" . site_url("usuario/activarCuenta/{$data['usuario']}") . "'>Verificar correo</a>\n\n" .
			"Saludos cordiales,\n" .
			"Consultorio Dental Reynolds");

		if ($this->email->send()) {
			$this->session->set_flashdata('success', 'Usuario registrado y correo enviado correctamente.');
		} else {
			$this->session->set_flashdata('error', 'Usuario registrado, pero no se pudo enviar el correo electrónico.');
		}
		$this->usuario_model->agregarusuario($data);

	}
	public function activarCuenta($usuario)
	{
		// Aquí buscamos al usuario por su nombre de usuario
		$this->load->model('Usuario_model');
		$usuarioData = $this->usuario_model->obtenerUsuarioPorNombre($usuario);

		if ($usuarioData && $usuarioData->estadoUsuario == 0) {
			// Si el estado del usuario es 0 (inactivo), lo activamos
			$this->usuario_model->actualizarEstadoUsuario($usuarioData->idusuario, 3);
			$this->session->set_flashdata('success', 'Su cuenta ha sido activada exitosamente.');
		} else {
			$this->session->set_flashdata('error', 'Cuenta inválida o ya está activada.');
		}

		// Redirigimos al login o a otra página
		redirect('usuario/login');
	}
	public function registrarYagendar()
	{
		$lista = $this->Servicios_model->listarservicios();
		$data['servicios'] = $lista->result();
		$this->load->view('inc/head');
		$this->load->view('inc/menu');
		$this->load->view('registrarYagendar', $data);
		$this->load->view('inc/footer');
	}
	public function agregarbdYagendarbd()
	{
		//lado izquierda coincide con el nombre de la base de datos, de las columnas 
		// el lado derecho es el name de el formulario 
		$data['nombre'] = strtoupper($_POST['nombre']);
		$data['apellidos'] = strtoupper($_POST['apellidos']);
		$data['sexo'] = strtoupper($_POST['sexo']);
		$data['fechaNac'] = $_POST['fechaNac'];
		$data['celular'] = $_POST['celular'];
		$data['correo'] = $_POST['correo'];
		$data['usuario'] = $_POST['usuario'];
		$password = $_POST['contrasenia'];
		$data['clave'] = sha1($password);
		$data['tipoUsuario'] = strtoupper($_POST['tipoUsuario']);
		$data['estadoUsuario'] = 3;

		$idservicios = $_POST['servicios_idservicios']; // Asegúrate de que este es el nombre correcto del campo
		$fechaAtencion = $_POST['fechaAtencion'];
		$horaAtencion = $_POST['horaAtencion'];

		$result = $this->usuario_model->agregarYagendar($data, $idservicios, $fechaAtencion, $horaAtencion);

		/* 		if ($result) {
			$this->session->set_flashdata('success', 'Usuario registrado y cita agendada correctamente.');
		} else {
			$this->session->set_flashdata('error', 'Hubo un problema al registrar el usuario o agendar la cita.');
		} */

		echo json_encode(['success' => $result]);

		// Enviar correo electrónico 
		$this->load->library('email');
		$this->email->from('europa2498@gmail.com', 'Consultorio Dental Reynolds');
		$this->email->to($data['correo']);
		$this->email->subject('Detalles de su cuenta');
		$resetLink = site_url("usuario/login");
		$this->email->message("Estimado/a {$data['nombre']} {$data['apellidos']},\n\n" .
			"Su cuenta ha sido creada exitosamente. A continuación, le proporcionamos sus detalles de acceso:\n\n" .
			"Usuario: {$data['usuario']}\n" .
			"Contraseña: $password\n\n" .
			"Haz clic en el siguiente enlace para poder acceder a su cuenta: <a href='" . $resetLink . "'>Link para entrar en el sistema</a>" .
			//"Le recomendamos que cambie su contraseña después de iniciar sesión.\n\n". 
			"Saludos cordiales,\n" .
			"Consultorio Dental Reynolds");

		if ($this->email->send()) {
			$this->session->set_flashdata('success', 'Usuario registrado y correo enviado correctamente.');
		} else {
			$this->session->set_flashdata('error', 'Usuario registrado, pero no se pudo enviar el correo electrónico.');
		}
		//$this->usuario_model->agregarusuario($data);
		//redirect('usuario/agregar'); // Redirige de vuelta al formulario 
	}
	public function agregarbdU()
	{
		//lado izquierda coincide con el nombre de la base de datos, de las columnas 
		// el lado derecho es el name de el formulario 
		$data['nombre'] = strtoupper($_POST['nombre']);
		$data['apellidos'] = strtoupper($_POST['apellidos']);
		$data['sexo'] = strtoupper($_POST['sexo']);
		$data['fechaNac'] = $_POST['fechaNac'];
		$data['celular'] = $_POST['celular'];
		$data['correo'] = $_POST['correo'];
		$data['usuario'] = $_POST['usuario'];
		$password = $_POST['contrasenia'];
		$data['clave'] = sha1($password);
		$data['tipoUsuario'] = strtoupper($_POST['tipoUsuario']);
		$data['estadoUsuario'] = 3;
		// Enviar correo electrónico 
		$this->load->library('email');
		$this->email->from('europa2498@gmail.com', 'Consultorio Dental Reynolds');
		$this->email->to($data['correo']);
		$this->email->subject('Detalles de su cuenta');
		$resetLink = site_url("usuario/login");
		$this->email->message("Estimado/a {$data['nombre']} {$data['apellidos']},\n\n" .
			"Su cuenta ha sido creada exitosamente. A continuación, le proporcionamos sus detalles de acceso:\n\n" .
			"Usuario: {$data['usuario']}\n" .
			"Contraseña: $password\n\n" .
			"Haz clic en el siguiente enlace para poder acceder a su cuenta: <a href='" . $resetLink . "'>Link para entrar en el sistema</a>" .
			//"Le recomendamos que cambie su contraseña después de iniciar sesión.\n\n". 
			"Saludos cordiales,\n" .
			"Consultorio Dental Reynolds");

		if ($this->email->send()) {
			$this->session->set_flashdata('success', 'Usuario registrado y correo enviado correctamente.');
		} else {
			$this->session->set_flashdata('error', 'Usuario registrado, pero no se pudo enviar el correo electrónico.');
		}
		$this->usuario_model->agregarusuario($data);
		//redirect('usuario/agregar'); // Redirige de vuelta al formulario 
	}
	//login session
	public function validarusuario()
	{
		$usuario = $_POST['usuario'];
		$clave = sha1($_POST['clave']);

		$consulta = $this->usuario_model->validar($usuario, $clave);
		if ($consulta->num_rows() > 0) {
			foreach ($consulta->result() as $row) {
				if ($row->estadoUsuario === '3') {
					$this->session->set_userdata('idusuario', $row->idusuario);
					$this->session->set_userdata('usuario', $row->usuario);
					$this->session->set_userdata('nombre', $row->nombre);
					$this->session->set_userdata('apellidos', $row->apellidos);
					$this->session->set_userdata('tipoUsuario', $row->tipoUsuario);
					redirect('usuario/cambiarContrasenia');
				} else {
					$this->session->set_userdata('idusuario', $row->idusuario);
					$this->session->set_userdata('usuario', $row->usuario);
					$this->session->set_userdata('nombre', $row->nombre);
					$this->session->set_userdata('apellidos', $row->apellidos);
					$this->session->set_userdata('tipoUsuario', $row->tipoUsuario);
					redirect('usuario/panel', 'refresh');
				}
			}
		} else {
			$data['error'] = 'El usuario o contraseña ingresados no son correctos.';
			$this->load->view('login3', $data);
		}
	}
	public function panel()
	{
		if ($this->session->userdata('usuario')) {
			$tipoUsuario = $this->session->userdata('tipoUsuario');

			switch ($tipoUsuario) {
				case 'ADMINISTRADOR':
					redirect('usuario/vistaDoctorAdmin', 'refresh');
					break;
				case 'DOCTOR':
					redirect('usuario/vistaDoctor', 'refresh');
					break;
				case 'PACIENTE':
					redirect('usuario/vistaPaciente', 'refresh');
					break;
				default:
					// Si el tipo de usuario no es reconocido, redirigir al login
					redirect('usuario/login', 'refresh');
					break;
			}
		} else {
			// Si no hay sesión iniciada, redirigir al login
			redirect('usuario/login', 'refresh');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('usuario/login', 'refresh');
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
			'clave' => sha1($nuevaContrasenia),
			'estadoUsuario' => 1
		);
		$this->usuario_model->modificarUsuario($idusuario, $data);

		$this->session->set_flashdata('success', 'Contraseña cambiada exitosamente.');
		redirect('usuario/logout');
	}
	public function solicitarRestablecimiento()
	{
		$this->load->view('solicitarRestablecimiento');
	}
	public function sinCorreo()
	{
		$this->load->view('formularioRestablecimiento');
	}
	public function procesarRestablecimiento()
	{
		$correo = $this->input->post('correo');
		$nuevaContrasenia = $this->input->post('nuevaContrasenia');
		$confirmarContrasenia = $this->input->post('confirmarContrasenia');

		if ($nuevaContrasenia !== $confirmarContrasenia) {
			$this->session->set_flashdata('error', 'Las contraseñas no coinciden.');
			redirect('usuario/solicitarRestablecimiento');
			return;
		}

		$usuario = $this->usuario_model->obtenerUsuarioPorCorreo($correo);
		if (!$usuario) {
			$this->session->set_flashdata('error', 'No se encontró un usuario con ese correo.');
			redirect('usuario/sinCorreo');
			return;
		}

		$this->usuario_model->actualizarContrasenia($usuario->idusuario, $nuevaContrasenia);
		$this->session->set_flashdata('success', 'Contraseña restablecida exitosamente.');
		redirect('usuario/res');
	}
	public function res()
	{
		$this->load->view('formularioRestablecimiento');
	}
	public function enviarEnlaceRestablecimiento()
	{
		$correo = $this->input->post('correo');
		// Verifica si el correo está registrado en la base de datos
		if (!$this->usuario_model->obtenerUsuarioPorCorreo($correo)) {
			$this->session->set_flashdata('error', 'El correo ingresado no está registrado en nuestro sistema.');
			redirect('usuario/solicitarRestablecimiento');
			return;
		}
		// Genera un token para restablecimiento de contraseña
		$token = $this->usuario_model->generarTokenRestablecimiento($correo);
		$this->load->library('email');
		$this->email->from('europa2498@gmail.com', 'Consultorio Dental Reynolds');
		$this->email->to($correo);
		$this->email->subject('Restablecimiento de Contraseña');
		$resetLink = site_url("usuario/restablecerContrasenia/$token");
		$this->email->message("Haz clic en el siguiente enlace para restablecer tu contraseña: <a href='" . $resetLink . "'>Link para poder restablecer la Contraseña</a>");
		if (!$this->email->send()) {
			$error = $this->email->print_debugger(array('headers'));
			log_message('error', 'Error al enviar correo: ' . $error);
			$this->session->set_flashdata('error', 'Hubo un problema al enviar el correo de restablecimiento.');
			redirect('usuario/solicitarRestablecimiento');
			return;
		}
		$this->session->set_flashdata('success', 'Se ha enviado un enlace de restablecimiento a tu correo electrónico.');
		redirect('usuario/solicitarRestablecimiento');
	}
	public function restablecerContrasenia($token)
	{
		$idusuario = $this->usuario_model->verificarToken($token);
		if ($idusuario) {
			$data['token'] = $token;
			$this->load->view('formularioRestablecimiento', $data);
		} else {
			echo "Token inválido o expirado";
		}
	}
	public function actualizarContrasenia()
	{
		$nuevaContrasenia = $this->input->post('nuevaContrasenia');
		$confirmarContrasenia = $this->input->post('confirmarContrasenia');

		if ($nuevaContrasenia !== $confirmarContrasenia) {
			$this->session->set_flashdata('error', 'Las contraseñas no coinciden.');
			redirect('usuario/cambiarContrasenia');
			return;
		}

		$idusuario = $this->session->userdata('idusuario');
		$this->usuario_model->actualizarContrasenia($idusuario, $nuevaContrasenia);
		$this->session->set_flashdata('success', 'Contraseña actualizada exitosamente.');
		redirect('usuario/login');
	}
}
