<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class  Informacion_model extends CI_Model 
{
	private $table_documento='sys_puntodecuenta.informacion';
	public $limit;
	public $offset;
	
    public function guardar($id,$numero,$fecha,$para,$de,$cargopara,$cargode,$asunto,$sintesis,$conclusiones,$hcentro,$husuario) {
        $sql="select * from sys_puntodecuenta.finformacion($id,'$numero','$fecha','$para','$de','$cargopara','$cargode','$asunto','$sintesis','$conclusiones',$hcentro,$husuario)";
		$rlista=pg_exec($sql);
    }	
	public function iddoc(){
		$sql="SELECT nextval('sys_puntodecuenta.informacion_id_seq');";
		$rlista=pg_exec($sql);
		$reg = pg_numrows($rlista);
		for ($d=0; $d < $reg; $d++){
			$hdetallepiso= "" .pg_result($rlista, $d, 0). "";
		}
		return $hdetallepiso;		
	}
	public function eliminar($id){
		$this->db->where('id', $id);
		$this->db->delete('sys_puntodecuenta.informacion'); 
	}		
    public function puntodeinformacion($id) {
        $this->db->select('*');
		$this->db->from('sys_puntodecuenta.informacion');
		$data = array('id =' => $id);
		$this->db->where($data);
		return $this->db->get();
    }
    public function listado(){
   	$lista="SELECT * from sys_puntodecuenta.informacion where hcentro=$hcentro order by sys_puntodecuenta.informacion.id;";
	$rlista=pg_exec($lista);
	$salida = pg_fetch_all($rlista);
	pg_free_result($rlista);
	return $salida;
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
			if (empty($sintesis)){	$sintesis=""; }
			if (empty($conclusiones)){	$conclusiones=""; }
			if (empty($comentarios)){	$comentarios=""; }
			if (empty($para)){	$para=""; }
			if (empty($de)){	$de=""; }
			if (empty($cargopara)){	$cargopara=""; }
			if (empty($cargode)){	$cargode=""; }
			$this->db->select('*');
			$this->db->from('sys_puntodecuenta.informacion');			
			$this->db->where('id', $id); 
			$consulta = $this->db->get();
			if($consulta->num_rows() > 0)
			{
				foreach ($consulta->result_array() as $registro)
				{
					$numero=$registro['numero'];
					$fecha=$registro['fecha'];
					$asunto=$registro['asunto'];
					$sintesis=$registro['sintesis'];
					$conclusiones=$registro['conclusiones'];
					$comentarios=$registro['comentarios'];
					$para=$registro['para'];
					$de=$registro['de'];
					$cargopara=$registro['cargopara'];
					$cargode=$registro['cargode'];
					$hcentro=$registro['hcentro'];
				}
			}
			$anio=substr ($fecha , 0 , 4);
			$mes=substr ($fecha , 5 , 2);
			$dia=substr ($fecha , 8 , 2);
			$fecha="$dia/$mes/$anio";
			$result=array($id,
					$numero,
					$fecha,
					$asunto,
					$sintesis,
					$conclusiones,
					$comentarios,
					$para,
					$de,
					$cargopara,
					$cargode,
					$hcentro);
			return $result;			
	} 
    public function listados($inicio,$direccion,$hcentro){
		if (empty($salida)){ $salida= array(); }
		if (empty($retorno)){ $retorno= array(); }
		$lista="SELECT * from sys_puntodecuenta.informacion where hcentro=$hcentro order by sys_puntodecuenta.informacion.id;";
		$rlista=pg_exec($lista);
		$reg = pg_numrows($rlista);	
		pg_free_result($rlista);
		if ($direccion==1){
			$r = $inicio+6;
			if ($r>=$reg){
				if ($reg<6){
					$lista="SELECT * from sys_puntodecuenta.informacion where hcentro=$hcentro order by sys_puntodecuenta.informacion.id;";
					$rlista=pg_exec($lista);
					$salida = pg_fetch_all($rlista);
					$inicio=0;
					$retorno= array($salida,$inicio);
					pg_free_result($rlista);					
				}
				else {
					$inicio=$reg-6;
					$lista="SELECT * from sys_puntodecuenta.informacion where hcentro=$hcentro order by sys_puntodecuenta.informacion.id offset $inicio;";
					$rlista=pg_exec($lista);
					$salida = pg_fetch_all($rlista);
					$retorno= array($salida,$inicio);
					pg_free_result($rlista);				
				}
			}
			else {
					$lista="SELECT * from sys_puntodecuenta.informacion where hcentro=$hcentro order by sys_puntodecuenta.informacion.id offset $inicio limit 6;";
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
					$lista="SELECT * from sys_puntodecuenta.informacion where hcentro=$hcentro order by sys_puntodecuenta.informacion.id;";
					$rlista=pg_exec($lista);
					$salida = pg_fetch_all($rlista);
					$inicio=0;
					$retorno= array($salida,$inicio);
					pg_free_result($rlista);					
				}	
				else {
		
					$lista="SELECT * from sys_puntodecuenta.informacion where hcentro=$hcentro order by sys_puntodecuenta.informacion.id limit 6;";
					$rlista=pg_exec($lista);
					$salida = pg_fetch_all($rlista);
					$inicio=$inicio+6;
					$retorno= array($salida,$inicio);
					pg_free_result($rlista);					
				}					
			}
			else {
					$inicio=$rf;
					$lista="SELECT * from sys_puntodecuenta.informacion where hcentro=$hcentro order by sys_puntodecuenta.informacion.id offset $r limit 6;";		
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
		$lista="SELECT * from sys_puntodecuenta.informacion  order by sys_puntodecuenta.informacion.id;";
		$rlista=pg_exec($lista);
		$reg = pg_numrows($rlista);	
		pg_free_result($rlista);
		if ($direccion==1){
			$r = $inicio+6;
			if ($r>=$reg){
				if ($reg<6){
					$lista="SELECT * from sys_puntodecuenta.informacion  order by sys_puntodecuenta.informacion.id;";
					$rlista=pg_exec($lista);
					$salida = pg_fetch_all($rlista);
					$inicio=0;
					$retorno= array($salida,$inicio);
					pg_free_result($rlista);					
				}
				else {
					$inicio=$reg-6;
					$lista="SELECT * from sys_puntodecuenta.informacion  order by sys_puntodecuenta.informacion.id offset $inicio;";
					$rlista=pg_exec($lista);
					$salida = pg_fetch_all($rlista);
					$retorno= array($salida,$inicio);
					pg_free_result($rlista);				
				}
			}
			else {
					$lista="SELECT * from sys_puntodecuenta.informacion  order by sys_puntodecuenta.informacion.id offset $inicio limit 6;";
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
					$lista="SELECT * from sys_puntodecuenta.informacion  order by sys_puntodecuenta.informacion.id;";
					$rlista=pg_exec($lista);
					$salida = pg_fetch_all($rlista);
					$inicio=0;
					$retorno= array($salida,$inicio);
					pg_free_result($rlista);					
				}	
				else {
		
					$lista="SELECT * from sys_puntodecuenta.informacion  order by sys_puntodecuenta.informacion.id limit 6;";
					$rlista=pg_exec($lista);
					$salida = pg_fetch_all($rlista);
					$inicio=$inicio+6;
					$retorno= array($salida,$inicio);
					pg_free_result($rlista);					
				}					
			}
			else {
					$inicio=$rf;
					$lista="SELECT * from sys_puntodecuenta.informacion  order by sys_puntodecuenta.informacion.id offset $r limit 6;";		
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
		$lista="SELECT * from sys_puntodecuenta.informacion where husuario=$husuario order by sys_puntodecuenta.informacion.id;";
		$rlista=pg_exec($lista);
		$reg = pg_numrows($rlista);	
		pg_free_result($rlista);
		if ($direccion==1){
			$r = $inicio+6;
			if ($r>=$reg){
				if ($reg<6){
					$lista="SELECT * from sys_puntodecuenta.informacion where husuario=$husuario order by sys_puntodecuenta.informacion.id;";
					$rlista=pg_exec($lista);
					$salida = pg_fetch_all($rlista);
					$inicio=0;
					$retorno= array($salida,$inicio);
					pg_free_result($rlista);					
				}
				else {
					$inicio=$reg-6;
					$lista="SELECT * from sys_puntodecuenta.informacion where husuario=$husuario order by sys_puntodecuenta.informacion.id offset $inicio;";
					$rlista=pg_exec($lista);
					$salida = pg_fetch_all($rlista);
					$retorno= array($salida,$inicio);
					pg_free_result($rlista);				
				}
			}
			else {
					$lista="SELECT * from sys_puntodecuenta.informacion where husuario=$husuario order by sys_puntodecuenta.informacion.id offset $inicio limit 6;";
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
					$lista="SELECT * from sys_puntodecuenta.informacion where husuario=$husuario order by sys_puntodecuenta.informacion.id;";
					$rlista=pg_exec($lista);
					$salida = pg_fetch_all($rlista);
					$inicio=0;
					$retorno= array($salida,$inicio);
					pg_free_result($rlista);					
				}	
				else {
		
					$lista="SELECT * from sys_puntodecuenta.informacion where husuario=$husuario order by sys_puntodecuenta.informacion.id limit 6;";
					$rlista=pg_exec($lista);
					$salida = pg_fetch_all($rlista);
					$inicio=$inicio+6;
					$retorno= array($salida,$inicio);
					pg_free_result($rlista);					
				}					
			}
			else {
					$inicio=$rf;
					$lista="SELECT * from sys_puntodecuenta.informacion where husuario=$husuario order by sys_puntodecuenta.informacion.id offset $r limit 6;";		
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
