<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Con_formulario extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('mod_formulario');
		$this->load->model('mod_empresa');
		$this->load->model('mod_municipio');
	}

	public function index()
	{
		$data['empresa'] = $this->mod_empresa->lista_empresas();
		$data['municipios'] = $this->mod_municipio->lista_municipios();
		$data['tp_contrato'] = $this->mod_formulario->lista_contratos();

		$this->load->view('header');
		$this->load->view('barra_informacion');
		$this->load->view('formulario/formulario', $data);
		$this->load->view('footer');		
	}

	public function insertar_empleado()
	{
  		$con_empleador = $this->input->post('con_empleador');
  		$con_nombre = $this->input->post('con_nombre');
  		$con_cedula = $this->input->post('con_cedula');
  		$con_ced_exp = $this->input->post('con_ced_exp');  	
  		$con_lug_nac = $this->input->post('con_lug_nac');
  		$con_cargo = $this->input->post('con_cargo');
  		$con_per_sol = $this->input->post('con_per_sol');
  		$con_tp_mobra = $this->input->post('con_tp_mobra');
  		$con_tp_contrato = $this->input->post('con_tp_contrato');
  		$con_fech_icontrato = $this->input->post('con_fech_icontrato');
  		$con_fech_fcontrato = $this->input->post('con_fech_fcontrato');
  		$con_fren_trabajo = $this->input->post('con_fren_trabajo');
  		$con_campo = $this->input->post('con_campo');

		$session_data = $this->session->userdata('nueva_session');
		$usuario=$session_data['usu_id'];

		$data['empresa'] = $this->mod_empresa->lista_empresas();
		$data['municipios'] = $this->mod_municipio->lista_municipios();
		$data['tp_contrato'] = $this->mod_formulario->lista_contratos();
		
		$data['crearempleado'] = $this->mod_formulario->insertar_empleado($con_empleador, $con_nombre, $con_cedula, $con_ced_exp,
																		  $con_lug_nac, $con_cargo, $con_per_sol, $con_tp_mobra,
																		  $con_tp_contrato, $con_fech_icontrato, $con_fech_fcontrato,
																		  $con_fren_trabajo, $con_campo, $usuario);

		$vista_ajax = $this->load->view('formulario/formulario_ajax', $data, true);
		echo $vista_ajax;
	}	

	public function cargar_excel_contr()
	{
		$fname = $_FILES['ruta_contratista']['name'];
		$chk_ext = explode(".",$fname);

	    $cont=0;
	    if(strtolower(end($chk_ext)) == "csv")
	    { //extrae la exten
	        //si es correcto, entonces damos permisos de lectura para subir
	        $filename = $_FILES['ruta_contratista']['tmp_name'];
	        $handle = utf8_fopen_read($filename, "r"); 

	  		$session_data = $this->session->userdata('nueva_session');
			$usuario=$session_data['usu_id'];  


			if (val_campos_excel($handle) == true)
			{
		        while (($data = fgetcsv($handle, 1000, ";")) !== FALSE)
		        {
		            if(strpos($data[0], 'empleador')===false)
		            {
					//Insertamos los datos con los valores...
		         	  $this->mod_formulario->importarexcel_contr($data[6],$data[2],$data[3],$data[4],
		              $data[7],$data[11],$data[13],$data[14],$data[9],$data[15],$data[16],$data[17],$data[18],$usuario);
		  			  $cont++;	
		            }
		        }
			        //cerramos la lectura del archivo "abrir archivo" con un "cerrar archivo"
			        fclose($handle);
			        $resultado="Importación de contratista exitosa! ".$cont." Registros ingresados";
	        }
	        else
	        {
            	$resultado = "Dentro del archivo .CSV hay espacios en blanco, VERIFIQUE EL ARCHIVO";
	        }

	    }else{
	        //si aparece esto es posible que el archivo no tenga el formato adecuado, inclusive cuando es cvs, revisarlo para             //ver si esta separado por " , "
	        $resultado="Archivo invalido!";
	    }
			$data['resultado'] = $resultado;
			$data['empresa'] = $this->mod_empresa->lista_empresas();
			$data['municipios'] = $this->mod_municipio->lista_municipios();
			$data['tp_contrato'] = $this->mod_formulario->lista_contratos();

			$this->load->view('header');
			$this->load->view('barra_informacion');
			$this->load->view('formulario/formulario', $data);
			$this->load->view('footer');
	}	
}
/* End of file con_formulario.php */
/* Location: ./application/controllers/con_formulario.php */