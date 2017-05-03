<?php

class Usuarios_model extends CI_Model
{
	public $tbl_name = 'sys_intranet_admin.usuario';
	
    public function __construct()
    {
        parent:: __construct();
    }
    
    public function get($usr)
    {
		return $this->db
		->where('usuario', $usr)
		->get($this->tbl_name);
	}

    public function is_valid($usuario, $clave)
	{
        $this->db->where('usuario', $usuario);
        $consulta = $this->db->get($this->tbl_name);

        if ($consulta->num_rows > 0) 
		{
            $consulta = $consulta->row();
            if ($consulta->clave == $clave)
			{
                if ($consulta->estatus == 0)
				{
                    $this->session->set_flashdata('data', 'Usuario bloqueado.');
                    return FALSE;
                }
				else
				{
					$this->session->set_userdata('usr_id', $consulta->id);
                    $this->session->set_userdata('usr_usuario', $consulta->usuario);
                    return TRUE;
                }
            }
			else
			{
                $this->session->set_flashdata('data', 'Contraseña Incorrecta.');
                return FALSE;
            }
        }
		else 
		{
            $this->session->set_flashdata('data', 'Usuario Incorrecto.');
            return FALSE;
        }
    }
 	public function eliminar($id){
		$this->db->where('id', $id);
		$this->db->delete('sys_puntodecuenta.usuarios_centro'); 
	}   
	public function has_access($usr_id, $ruta = array())
	{
		$r = '{';
		foreach($ruta as $item)
		{
			$r .= ($r != '{') ? ',' : '';
			$r.= strtolower($item);
		}
		$r  .= '}';
		
		$cond = array(
			'usr_id' => $usr_id,
			'rut_ruta' => $r,
		);
		$resultado = $this->db->where($cond)->get('sys_intranet_admin.v_usuario_area');

		if ($resultado->num_rows > 0)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	public function listado(){
		if (empty($salida)){ $salida= array(); }
		$lista="SELECT * from sys_intranet_admin.usuario order by sys_intranet_admin.usuario.id;";
		$rlista=pg_exec($lista);
		$salida = pg_fetch_all($rlista);
		pg_free_result($rlista);
		return $salida;
	}
    public function guardar($husuario,$hcentro) {
        $datos = array('husuario' => $husuario,
					   'hcentro' => $hcentro);

        $this->db->insert('sys_puntodecuenta.usuarios_centro', $datos);
    }  
    public function listados($inicio,$direccion){
		if (empty($salida)){ $salida= array(); }
		if (empty($retorno)){ $retorno= array(); }
	
		$lista="SELECT * from sys_puntodecuenta.vistausuarios  order by sys_puntodecuenta.vistausuarios.id;";
		$rlista=pg_exec($lista);
		$reg = pg_numrows($rlista);	
		pg_free_result($rlista);
		if ($direccion==1){
			$r = $inicio+6;
			if ($r>=$reg){
				if ($reg<6){
					$lista="SELECT * from sys_puntodecuenta.vistausuarios  order by sys_puntodecuenta.vistausuarios.id;";
					$rlista=pg_exec($lista);
					$salida = pg_fetch_all($rlista);
					$inicio=0;
					$retorno= array($salida,$inicio);
					pg_free_result($rlista);					
				}
				else {
					$inicio=$reg-6;
					$lista="SELECT * from sys_puntodecuenta.vistausuarios  order by sys_puntodecuenta.vistausuarios.id offset $inicio;";
					$rlista=pg_exec($lista);
					$salida = pg_fetch_all($rlista);
					$retorno= array($salida,$inicio);
					pg_free_result($rlista);				
				}
			}
			else {
					$lista="SELECT * from sys_puntodecuenta.vistausuarios  order by sys_puntodecuenta.vistausuarios.id offset $inicio limit 6;";
					$rlista=pg_exec($lista);
					$salida = pg_fetch_all($rlista);
					$inicio=$inicio+6;
					$retorno= array($salida,$inicio);
					pg_free_result($rlista);			
			}
		}
		else {
			$rf=$inicio-6;
			$r=$inicio-12;	
			if (($inicio<=0) or ($r<=0) or ($rf<=0)){
				if ($reg < 6){
					$lista="SELECT * from sys_puntodecuenta.vistausuarios  order by sys_puntodecuenta.vistausuarios.id;";
					$rlista=pg_exec($lista);
					$salida = pg_fetch_all($rlista);
					$inicio=0;
					$retorno= array($salida,$inicio);
					pg_free_result($rlista);					
				}	
				else {
		
					$lista="SELECT * from sys_puntodecuenta.vistausuarios  order by sys_puntodecuenta.vistausuarios.id limit 6;";
					$rlista=pg_exec($lista);
					$salida = pg_fetch_all($rlista);
					$inicio=$inicio+6;
					$retorno= array($salida,$inicio);
					pg_free_result($rlista);					
				}					
			}
			else {
					$inicio=$rf;
					$lista="SELECT * from sys_puntodecuenta.vistausuarios  order by sys_puntodecuenta.vistausuarios.id offset $r limit 6;";		
					$rlista=pg_exec($lista);
					$salida = pg_fetch_all($rlista);
					$retorno= array($salida,$inicio);
					pg_free_result($rlista);			
			}
		}
				

		return $retorno;	
	}
        		
}
