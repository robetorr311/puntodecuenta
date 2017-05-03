<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class  Centro_model extends CI_Model 
{
	private $table_documento='sys_puntodecuenta.centro';
	public $limit;
	public $offset;
	
    public function guardar($nombre, $telefono , $correo , $direccion ) {
        $sql="select * from sys_puntodecuenta.fcentro('$nombre', '$telefono' , '$correo' , '$direccion' )";
		$rlista=pg_exec($sql);
    }
    public function actualizar($id,$nombre, $telefono , $correo , $direccion ) {
        $sql="select * from sys_puntodecuenta.ucentro($id,'$nombre', '$telefono' , '$correo' , '$direccion' )";
		$rlista=pg_exec($sql);
    }
	public function registro($id)	{
			if (empty($result)){	$result=array(); }
			if (empty($telefono)){	$telefono=""; }
			if (empty($correo)){	$correo=""; }
			if (empty($direccion)){	$direccion=""; }
			$this->db->select('*');
			$this->db->from('sys_puntodecuenta.centro');			
			$this->db->where('id', $id); 
			$consulta = $this->db->get();
			if($consulta->num_rows() > 0)
			{
				foreach ($consulta->result_array() as $registro)
				{
					$telefono =$registro['telefono'];
					$correo =$registro['correo'];
					$direccion =$registro['direccion'];
					$nombre =$registro['nombre'];					
				}
			}
			$result=array( $id,
						   $telefono,
						   $correo,
						   $direccion,
						   $nombre);
			return $result;			
	}
	public function listado(){
		if (empty($salida)){ $salida= array(); }
		$lista="SELECT * from sys_puntodecuenta.centro order by sys_puntodecuenta.centro.id;";
		$rlista=pg_exec($lista);
		$salida = pg_fetch_all($rlista);
		pg_free_result($rlista);
		return $salida;
	}
	public function listado_usuarios($husuario){		
		if (empty($salida)){ $salida= array(); }
		$lista="SELECT hcentro, centro from sys_puntodecuenta.vistausuarios where husuario=$husuario order by sys_puntodecuenta.vistausuarios.centro;";
		$rlista=pg_exec($lista);
		$salida = pg_fetch_all($rlista);
		pg_free_result($rlista);
		return $salida;
	}	
	public function eliminar($id){
		$this->db->where('id', $id);
		$this->db->delete('sys_puntodecuenta.centro'); 
	}
	public function correlativo($id)	{
			if (empty($result)){	$result=array(); }
			if (empty($correlativo_pto)){	$correlativo_pto=""; }
			$this->db->select('correlativo_pto');
			$this->db->from('sys_puntodecuenta.centro');			
			$this->db->where('id', $id); 
			$consulta = $this->db->get();
			if($consulta->num_rows() > 0)
			{
				foreach ($consulta->result_array() as $registro)
				{
					$correlativo_pto =$registro['correlativo_pto'];		
				}
			}
			return $correlativo_pto;			
	}
	public function correlativo_inf($id)	{
			if (empty($result)){	$result=array(); }
			if (empty($correlativo_inf)){	$correlativo_inf=""; }
			$this->db->select('correlativo_inf');
			$this->db->from('sys_puntodecuenta.centro');			
			$this->db->where('id', $id); 
			$consulta = $this->db->get();
			if($consulta->num_rows() > 0)
			{
				foreach ($consulta->result_array() as $registro)
				{
					$correlativo_inf =$registro['correlativo_inf'];		
				}
			}
			return $correlativo_inf;			
	}	 	 
    public function listados_centro($inicio,$direccion){
		if (empty($salida)){ $salida= array(); }
		if (empty($retorno)){ $retorno= array(); }
		$lista="SELECT * from sys_puntodecuenta.centro order by sys_puntodecuenta.centro.id;";
		$rlista=pg_exec($lista);
		$reg = pg_numrows($rlista);	
		pg_free_result($rlista);
		if ($direccion==1){
			$r = $inicio+6;
			if ($r>=$reg){
				if ($reg<6){
					$lista="SELECT * from sys_puntodecuenta.centro order by sys_puntodecuenta.centro.id;";
					$rlista=pg_exec($lista);
					$salida = pg_fetch_all($rlista);
					$inicio=0;
					$retorno= array($salida,$inicio);
					pg_free_result($rlista);					
				}
				else {
					$inicio=$reg-6;
					$lista="SELECT * from sys_puntodecuenta.centro order by sys_puntodecuenta.centro.id offset $inicio;";
					$rlista=pg_exec($lista);
					$salida = pg_fetch_all($rlista);
					$retorno= array($salida,$inicio);
					pg_free_result($rlista);				
				}
			}
			else {
					$lista="SELECT * from sys_puntodecuenta.centro order by sys_puntodecuenta.centro.id offset $inicio limit 6;";
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
					$lista="SELECT * from sys_puntodecuenta.centro order by sys_puntodecuenta.centro.id;";
					$rlista=pg_exec($lista);
					$salida = pg_fetch_all($rlista);
					$inicio=0;
					$retorno= array($salida,$inicio);
					pg_free_result($rlista);					
				}	
				else {
		
					$lista="SELECT * from sys_puntodecuenta.centro order by sys_puntodecuenta.centro.id limit 6;";
					$rlista=pg_exec($lista);
					$salida = pg_fetch_all($rlista);
					$inicio=$inicio+6;
					$retorno= array($salida,$inicio);
					pg_free_result($rlista);					
				}					
			}
			else {
					$inicio=$rf;
					$lista="SELECT * from sys_puntodecuenta.centro order by sys_puntodecuenta.centro.id offset $r limit 6;";		
					$rlista=pg_exec($lista);
					$salida = pg_fetch_all($rlista);
					$retorno= array($salida,$inicio);
					pg_free_result($rlista);			
			}
		}
				

		return $retorno;	
	}
}
/* End of file contacts_model.php */
