<?php
class AutoridadeVO {
	private $idautoridade = null;
	private $dat_inclusao = null;
	private $dat_evento = null;
	private $ordem = null;
	private $cargo = null;
	private $nome_pessoa = null;
	public function __construct( $idautoridade=null, $dat_inclusao=null, $dat_evento=null, $ordem=null, $cargo=null, $nome_pessoa=null ) {
		$this->setIdautoridade( $idautoridade );
		$this->setDat_inclusao( $dat_inclusao );
		$this->setDat_evento( $dat_evento );
		$this->setOrdem( $ordem );
		$this->setCargo( $cargo );
		$this->setNome_pessoa( $nome_pessoa );
	}
	//--------------------------------------------------------------------------------
	public function setIdautoridade( $strNewValue = null )
	{
		$this->idautoridade = $strNewValue;
	}
	public function getIdautoridade()
	{
		return $this->idautoridade;
	}
	//--------------------------------------------------------------------------------
	public function setDat_inclusao( $strNewValue = null )
	{
		$this->dat_inclusao = $strNewValue;
	}
	public function getDat_inclusao()
	{
		return is_null( $this->dat_inclusao ) ? date( 'Y-m-d h:i:s' ) : $this->dat_inclusao;
	}
	//--------------------------------------------------------------------------------
	public function setDat_evento( $strNewValue = null )
	{
		$this->dat_evento = $strNewValue;
	}
	public function getDat_evento()
	{
		return is_null( $this->dat_evento ) ? date( 'Y-m-d h:i:s' ) : $this->dat_evento;
	}
	//--------------------------------------------------------------------------------
	public function setOrdem( $strNewValue = null )
	{
		$this->ordem = $strNewValue;
	}
	public function getOrdem()
	{
		return $this->ordem;
	}
	//--------------------------------------------------------------------------------
	public function setCargo( $strNewValue = null )
	{
		$this->cargo = $strNewValue;
	}
	public function getCargo()
	{
		return $this->cargo;
	}
	//--------------------------------------------------------------------------------
	public function setNome_pessoa( $strNewValue = null )
	{
		$this->nome_pessoa = $strNewValue;
	}
	public function getNome_pessoa()
	{
		return $this->nome_pessoa;
	}
	//--------------------------------------------------------------------------------
}
?>