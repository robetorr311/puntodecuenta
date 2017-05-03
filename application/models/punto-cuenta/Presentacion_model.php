<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class  Presentacion_model extends CI_Model 
{
	private $table_documento='sys_puntodecuenta.documento';
	public $limit;
	public $offset;
	
    public function guardar($id,$numero,$fecha,$presentante,$asunto,$argumentacion,$propuesta,$cargo,$monto,$hcentro,$husuario) {
        $sql="select * from sys_puntodecuenta.fpresentacion($id,'$numero','$fecha','$presentante','$asunto','$argumentacion','$propuesta','$cargo','$monto',$hcentro,$husuario)";
		$rlista=pg_exec($sql);
    }	
	public function iddoc(){
		$sql="SELECT nextval('sys_puntodecuenta.documento_id_seq');";
		$rlista=pg_exec($sql);
		$reg = pg_numrows($rlista);
		for ($d=0; $d < $reg; $d++){
			$hdetallepiso= "" .pg_result($rlista, $d, 0). "";
		}
		return $hdetallepiso;		
	}
	public function eliminar($id){
		$this->db->where('id', $id);
		$this->db->delete('sys_puntodecuenta.documento'); 
	}	
    public function listado(){
   	$lista="SELECT * from sys_puntodecuenta.documento where hcentro=$hcentro order by sys_puntodecuenta.documento.id;";
	$rlista=pg_exec($lista);
	$salida = pg_fetch_all($rlista);
	pg_free_result($rlista);
	return $salida;
	}		
    public function puntodecuenta($id) {
        $this->db->select('*');
		$this->db->from('sys_puntodecuenta.documento');
		$data = array('id =' => $id);
		$this->db->where($data);
		return $this->db->get();
    }	
    public function actualizar($id,$nombre, $telefono , $correo , $direccion , $twitter) {
        $sql="select * from sys_puntodecuenta.ucentro($id,'$nombre', '$telefono' , '$correo' , '$direccion' , '$twitter')";
		$rlista=pg_exec($sql);
    }
	public function registro($id)	{
			if (empty($result)){	$result=array(); }
			if (empty($numero)){	$numero=""; }
			if (empty($fecha)){	$fecha=""; }
			if (empty($asunto)){	$asunto=""; }
			if (empty($monto)){	$monto=""; }
			if (empty($argumentacion)){	$argumentacion=""; }
			if (empty($propuesta)){	$propuesta=""; }
			if (empty($comentarios)){	$comentarios=""; }
			if (empty($referencia)){	$referencia=""; }
			if (empty($presentante)){	$presentante=""; }
			if (empty($cargo)){	$cargo=""; }
			$this->db->select('*');
			$this->db->from('sys_puntodecuenta.documento');			
			$this->db->where('id', $id); 
			$consulta = $this->db->get();
			if($consulta->num_rows() > 0)
			{
				foreach ($consulta->result_array() as $registro)
				{
					$numero =$registro['numero'];
					$fecha =$registro['fecha'];
					$asunto =$registro['asunto'];
					$argumentacion =$registro['argumentacion'];
					$propuesta =$registro['propuesta'];
					$comentarios =$registro['comentarios'];
					$presentante =$registro['presentante'];
					$cargo =$registro['cargo'];
					$monto =$registro['monto'];
					$hcentro =$registro['hcentro'];
				}
			}
			$anio=substr ($fecha , 0 , 4);
			$mes=substr ($fecha , 5 , 2);
			$dia=substr ($fecha , 8 , 2);
			$fecha="$dia/$mes/$anio";
			$result=array( $id,
			$numero,
			$fecha,
			$asunto,
			$argumentacion,
			$propuesta,
			$comentarios,
			$referencia,
			$presentante,
			$cargo,
			$monto,
			$hcentro);
			return $result;			
	} 
    public function listados($inicio,$direccion,$hcentro){
		if (empty($salida)){ $salida= array(); }
		if (empty($retorno)){ $retorno= array(); }
		$lista="SELECT * from sys_puntodecuenta.documento where hcentro=$hcentro order by sys_puntodecuenta.documento.id;";
		$rlista=pg_exec($lista);
		$reg = pg_numrows($rlista);	
		pg_free_result($rlista);
		if ($direccion==1){
			$r = $inicio+6;
			if ($r>=$reg){
				if ($reg<6){
					$lista="SELECT * from sys_puntodecuenta.documento where hcentro=$hcentro order by sys_puntodecuenta.documento.id;";
					$rlista=pg_exec($lista);
					$salida = pg_fetch_all($rlista);
					$inicio=0;
					$retorno= array($salida,$inicio);
					pg_free_result($rlista);					
				}
				else {
					$inicio=$reg-6;
					$lista="SELECT * from sys_puntodecuenta.documento where hcentro=$hcentro order by sys_puntodecuenta.documento.id offset $inicio;";
					$rlista=pg_exec($lista);
					$salida = pg_fetch_all($rlista);
					$retorno= array($salida,$inicio);
					pg_free_result($rlista);				
				}
			}
			else {
					$lista="SELECT * from sys_puntodecuenta.documento where hcentro=$hcentro order by sys_puntodecuenta.documento.id offset $inicio limit 6;";
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
					$lista="SELECT * from sys_puntodecuenta.documento where hcentro=$hcentro order by sys_puntodecuenta.documento.id;";
					$rlista=pg_exec($lista);
					$salida = pg_fetch_all($rlista);
					$inicio=0;
					$retorno= array($salida,$inicio);
					pg_free_result($rlista);					
				}	
				else {
		
					$lista="SELECT * from sys_puntodecuenta.documento where hcentro=$hcentro order by sys_puntodecuenta.documento.id limit 6;";
					$rlista=pg_exec($lista);
					$salida = pg_fetch_all($rlista);
					$inicio=$inicio+6;
					$retorno= array($salida,$inicio);
					pg_free_result($rlista);					
				}					
			}
			else {
					$inicio=$rf;
					$lista="SELECT * from sys_puntodecuenta.documento where hcentro=$hcentro order by sys_puntodecuenta.documento.id offset $r limit 6;";		
					$rlista=pg_exec($lista);
					$salida = pg_fetch_all($rlista);
					$retorno= array($salida,$inicio);
					pg_free_result($rlista);			
			}
		}
				

		return $retorno;	
	}
    public function contenido($inicio,$direccion){
		if (empty($salida)){ $salida= array(); }
		if (empty($retorno)){ $retorno= array(); }
		$lista="SELECT * from sys_puntodecuenta.documento  order by sys_puntodecuenta.documento.id;";
		$rlista=pg_exec($lista);
		$reg = pg_numrows($rlista);	
		pg_free_result($rlista);
		if ($direccion==1){
			$r = $inicio+6;
			if ($r>=$reg){
				if ($reg<6){
					$lista="SELECT * from sys_puntodecuenta.documento  order by sys_puntodecuenta.documento.id;";
					$rlista=pg_exec($lista);
					$salida = pg_fetch_all($rlista);
					$inicio=0;
					$retorno= array($salida,$inicio);
					pg_free_result($rlista);					
				}
				else {
					$inicio=$reg-6;
					$lista="SELECT * from sys_puntodecuenta.documento  order by sys_puntodecuenta.documento.id offset $inicio;";
					$rlista=pg_exec($lista);
					$salida = pg_fetch_all($rlista);
					$retorno= array($salida,$inicio);
					pg_free_result($rlista);				
				}
			}
			else {
					$lista="SELECT * from sys_puntodecuenta.documento  order by sys_puntodecuenta.documento.id offset $inicio limit 6;";
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
					$lista="SELECT * from sys_puntodecuenta.documento  order by sys_puntodecuenta.documento.id;";
					$rlista=pg_exec($lista);
					$salida = pg_fetch_all($rlista);
					$inicio=0;
					$retorno= array($salida,$inicio);
					pg_free_result($rlista);					
				}	
				else {
		
					$lista="SELECT * from sys_puntodecuenta.documento  order by sys_puntodecuenta.documento.id limit 6;";
					$rlista=pg_exec($lista);
					$salida = pg_fetch_all($rlista);
					$inicio=$inicio+6;
					$retorno= array($salida,$inicio);
					pg_free_result($rlista);					
				}					
			}
			else {
					$inicio=$rf;
					$lista="SELECT * from sys_puntodecuenta.documento  order by sys_puntodecuenta.documento.id offset $r limit 6;";		
					$rlista=pg_exec($lista);
					$salida = pg_fetch_all($rlista);
					$retorno= array($salida,$inicio);
					pg_free_result($rlista);			
			}
		}
				

		return $retorno;	
	}
    public function contenido_usuario($inicio,$direccion,$husuario){
		if (empty($salida)){ $salida= array(); }
		if (empty($retorno)){ $retorno= array(); }
		$lista="SELECT * from sys_puntodecuenta.documento where husuario=$husuario order by sys_puntodecuenta.documento.id;";
		$rlista=pg_exec($lista);
		$reg = pg_numrows($rlista);	
		pg_free_result($rlista);
		if ($direccion==1){
			$r = $inicio+6;
			if ($r>=$reg){
				if ($reg<6){
					$lista="SELECT * from sys_puntodecuenta.documento where husuario=$husuario order by sys_puntodecuenta.documento.id;";
					$rlista=pg_exec($lista);
					$salida = pg_fetch_all($rlista);
					$inicio=0;
					$retorno= array($salida,$inicio);
					pg_free_result($rlista);					
				}
				else {
					$inicio=$reg-6;
					$lista="SELECT * from sys_puntodecuenta.documento where husuario=$husuario order by sys_puntodecuenta.documento.id offset $inicio;";
					$rlista=pg_exec($lista);
					$salida = pg_fetch_all($rlista);
					$retorno= array($salida,$inicio);
					pg_free_result($rlista);				
				}
			}
			else {
					$lista="SELECT * from sys_puntodecuenta.documento where husuario=$husuario order by sys_puntodecuenta.documento.id offset $inicio limit 6;";
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
					$lista="SELECT * from sys_puntodecuenta.documento where husuario=$husuario order by sys_puntodecuenta.documento.id;";
					$rlista=pg_exec($lista);
					$salida = pg_fetch_all($rlista);
					$inicio=0;
					$retorno= array($salida,$inicio);
					pg_free_result($rlista);					
				}	
				else {
		
					$lista="SELECT * from sys_puntodecuenta.documento where husuario=$husuario order by sys_puntodecuenta.documento.id limit 6;";
					$rlista=pg_exec($lista);
					$salida = pg_fetch_all($rlista);
					$inicio=$inicio+6;
					$retorno= array($salida,$inicio);
					pg_free_result($rlista);					
				}					
			}
			else {
					$inicio=$rf;
					$lista="SELECT * from sys_puntodecuenta.documento where husuario=$husuario order by sys_puntodecuenta.documento.id offset $r limit 6;";		
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
