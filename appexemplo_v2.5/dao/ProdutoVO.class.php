<?php
class ProdutoVO {
	private $idproduto = null;
	private $nom_produto = null;
	private $modelo = null;
	private $versao = null;
	private $idmarca = null;
	private $idtipo_produto = null;
	public function __construct( $idproduto=null, $nom_produto=null, $modelo=null, $versao=null, $idmarca=null, $idtipo_produto=null ) {
		$this->setIdproduto( $idproduto );
		$this->setNom_produto( $nom_produto );
		$this->setModelo( $modelo );
		$this->setVersao( $versao );
		$this->setIdmarca( $idmarca );
		$this->setIdtipo_produto( $idtipo_produto );
	}
	//--------------------------------------------------------------------------------
	public function setIdproduto( $strNewValue = null )
	{
		$this->idproduto = $strNewValue;
	}
	public function getIdproduto()
	{
		return $this->idproduto;
	}
	//--------------------------------------------------------------------------------
	public function setNom_produto( $strNewValue = null )
	{
		$this->nom_produto = $strNewValue;
	}
	public function getNom_produto()
	{
		return $this->nom_produto;
	}
	//--------------------------------------------------------------------------------
	public function setModelo( $strNewValue = null )
	{
		$this->modelo = $strNewValue;
	}
	public function getModelo()
	{
		return $this->modelo;
	}
	//--------------------------------------------------------------------------------
	public function setVersao( $strNewValue = null )
	{
		$this->versao = $strNewValue;
	}
	public function getVersao()
	{
		return $this->versao;
	}
	//--------------------------------------------------------------------------------
	public function setIdmarca( $strNewValue = null )
	{
		$this->idmarca = $strNewValue;
	}
	public function getIdmarca()
	{
		return $this->idmarca;
	}
	//--------------------------------------------------------------------------------
	public function setIdtipo_produto( $strNewValue = null )
	{
		$this->idtipo_produto = $strNewValue;
	}
	public function getIdtipo_produto()
	{
		return $this->idtipo_produto;
	}
	//--------------------------------------------------------------------------------
}
?>