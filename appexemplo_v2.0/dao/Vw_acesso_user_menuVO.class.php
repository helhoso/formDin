<?php
class Vw_acesso_user_menuVO {
	private $iduser = null;
	private $login_user = null;
	private $idperfil = null;
	private $nom_perfil = null;
	private $idmenu = null;
	private $nom_menu = null;
	public function __construct( $iduser=null, $login_user=null, $idperfil=null, $nom_perfil=null, $idmenu=null, $nom_menu=null ) {
		$this->setIduser( $iduser );
		$this->setLogin_user( $login_user );
		$this->setIdperfil( $idperfil );
		$this->setNom_perfil( $nom_perfil );
		$this->setIdmenu( $idmenu );
		$this->setNom_menu( $nom_menu );
	}
	//--------------------------------------------------------------------------------
	public function setIduser( $strNewValue = null )
	{
		$this->iduser = $strNewValue;
	}
	public function getIduser()
	{
		return $this->iduser;
	}
	//--------------------------------------------------------------------------------
	public function setLogin_user( $strNewValue = null )
	{
		$this->login_user = $strNewValue;
	}
	public function getLogin_user()
	{
		return $this->login_user;
	}
	//--------------------------------------------------------------------------------
	public function setIdperfil( $strNewValue = null )
	{
		$this->idperfil = $strNewValue;
	}
	public function getIdperfil()
	{
		return $this->idperfil;
	}
	//--------------------------------------------------------------------------------
	public function setNom_perfil( $strNewValue = null )
	{
		$this->nom_perfil = $strNewValue;
	}
	public function getNom_perfil()
	{
		return $this->nom_perfil;
	}
	//--------------------------------------------------------------------------------
	public function setIdmenu( $strNewValue = null )
	{
		$this->idmenu = $strNewValue;
	}
	public function getIdmenu()
	{
		return $this->idmenu;
	}
	//--------------------------------------------------------------------------------
	public function setNom_menu( $strNewValue = null )
	{
		$this->nom_menu = $strNewValue;
	}
	public function getNom_menu()
	{
		return $this->nom_menu;
	}
	//--------------------------------------------------------------------------------
}
?>