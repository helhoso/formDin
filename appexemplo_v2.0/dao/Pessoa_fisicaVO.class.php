<?php
class Pessoa_fisicaVO {
	private $idpessoa_fisica = null;
	private $idpessoa = null;
	private $cpf = null;
	private $dat_nascimento = null;
	private $cod_municipio_nascimento = null;
	private $dat_inclusao = null;
	private $dat_alteracao = null;
	public function __construct( $idpessoa_fisica=null, $idpessoa=null, $cpf=null, $dat_nascimento=null, $cod_municipio_nascimento=null, $dat_inclusao=null, $dat_alteracao=null ) {
		$this->setIdpessoa_fisica( $idpessoa_fisica );
		$this->setIdpessoa( $idpessoa );
		$this->setCpf( $cpf );
		$this->setDat_nascimento( $dat_nascimento );
		$this->setCod_municipio_nascimento( $cod_municipio_nascimento );
		$this->setDat_inclusao( $dat_inclusao );
		$this->setDat_alteracao( $dat_alteracao );
	}
	//--------------------------------------------------------------------------------
	public function setIdpessoa_fisica( $strNewValue = null )
	{
		$this->idpessoa_fisica = $strNewValue;
	}
	public function getIdpessoa_fisica()
	{
		return $this->idpessoa_fisica;
	}
	//--------------------------------------------------------------------------------
	public function setIdpessoa( $strNewValue = null )
	{
		$this->idpessoa = $strNewValue;
	}
	public function getIdpessoa()
	{
		return $this->idpessoa;
	}
	//--------------------------------------------------------------------------------
	public function setCpf( $strNewValue = null )
	{
		$this->cpf = preg_replace('/[^0-9]/','',$strNewValue);
	}
	public function getCpf()
	{
		return $this->cpf;
	}
	//--------------------------------------------------------------------------------
	public function setDat_nascimento( $strNewValue = null )
	{
		$this->dat_nascimento = $strNewValue;
	}
	public function getDat_nascimento()
	{
		return is_null( $this->dat_nascimento ) ? date( 'Y-m-d h:i:s' ) : $this->dat_nascimento;
	}
	//--------------------------------------------------------------------------------
	public function setCod_municipio_nascimento( $strNewValue = null )
	{
		$this->cod_municipio_nascimento = $strNewValue;
	}
	public function getCod_municipio_nascimento()
	{
		return $this->cod_municipio_nascimento;
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
	public function setDat_alteracao( $strNewValue = null )
	{
		$this->dat_alteracao = $strNewValue;
	}
	public function getDat_alteracao()
	{
		return is_null( $this->dat_alteracao ) ? date( 'Y-m-d h:i:s' ) : $this->dat_alteracao;
	}
	//--------------------------------------------------------------------------------
}
?>