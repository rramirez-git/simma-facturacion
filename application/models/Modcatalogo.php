<?php
class Modcatalogo extends MY_Model
{
	protected $base_table			= "catalogo_gv";
	protected $general_view			= "catalogo_gv";
	protected $particular_view		= "catalogo_gv";
	protected $definition_file		= 'catalogo.json';
	protected $order_by				= "nombre";
	protected $reload_constructor	= true;
	public function getCatalogo($idCatalogo)
	{
		$this->db->where('idcatalogo',$idCatalogo);
		$regs=$this->db->get('catalogo');
		$this->db->reset_query();
		if($regs->num_rows()>0)
		{
			$res=$regs->row_array();
			$this->db->where("idcatalogodet in (select idopcion from relcatcatdet where idcatalogo = $idCatalogo)");
			$this->db->order_by('descripcion');
			$regs=$this->db->get('catalogodet');
			$this->db->reset_query();
			if($regs->num_rows()>0) $res["opciones"]=$regs->result_array();
			else $res["opciones"]=array();
			return $res;
		}
		return false;
	}
	public function getAll()
	{
		$this->db->order_by('descripcion');
		$regs=$this->db->get('catalogo');
		$this->db->reset_query();
		if($regs->num_rows()==0)
			return false;
		return $regs->result_array();
	}
	public function addNewCatalog($nombre)
	{
		$this->db->insert('catalogo',array('descripcion'=>$nombre));
		$id = $this->db->insert_id();
		$this->db->reset_query();
		return $id;
	}
	public function updateCatalog($idcatalogo,$nombre)
	{
		$this->db->where('idcatalogo',$idcatalogo);
		$this->db->update('catalogo',array('descripcion'=>$nombre));
		$this->db->reset_query();
		return $idcatalogo;
	}
	public function addNewOption($idcatalogo,$nombre)
	{
		$this->db->insert('catalogodet',array("descripcion"=>$nombre));
		$id=$this->db->insert_id();
		$this->db->reset_query();
		$this->db->insert('relcatcatdet',array(
			'idcatalogo'=>$idcatalogo,
			'idopcion'=>$id
		));
		$this->db->reset_query();
		return true;
	}
	public function deleteOption($idopcion)
	{
		$this->db->where('idopcion',$idopcion);
		$this->db->delete('relcatcatdet');
		$this->db->reset_query();
	}
	public function getIdOption($idCatalogo,$opcion)
	{
		$this->db->where("descripcion = '$opcion' and idcatalogodet in (select idopcion from relcatcatdet where idcatalogo = $idCatalogo)");
		$regs=$this->db->get('catalogodet');
		$this->db->reset_query();
		if($regs->num_rows()>0)
			return $regs->result_array()[0]["idcatalogodet"];
		return false;
	}
}
?>
