<?php
class Acesso_menuVO {
	private $idmenu = null;
	private $nom_menu = null;
	private $idmenu_pai = null;
	private $url = null;
	private $tooltip = null;
	private $img_menu = null;
	private $imgdisabled = null;
	private $dissabled = null;
	private $hotkey = null;
	private $boolseparator = null;
	private $jsonparams = null;
	private $sit_ativo = null;
	private $dat_inclusao = null;
	private $dat_update = null;
	public function __construct( $idmenu=null, $nom_menu=null, $idmenu_pai=null, $url=null, $tooltip=null, $img_menu=null, $imgdisabled=null, $dissabled=null, $hotkey=null, $boolseparator=null, $jsonparams=null, $sit_ativo=null, $dat_inclusao=null, $dat_update=null ) {
		$this->setIdmenu( $idmenu );
		$this->setNom_menu( $nom_menu );
		$this->setIdmenu_pai( $idmenu_pai );
		$this->setUrl( $url );
		$this->setTooltip( $tooltip );
		$this->setImg_menu( $img_menu );
		$this->setImgdisabled( $imgdisabled );
		$this->setDissabled( $dissabled );
		$this->setHotkey( $hotkey );
		$this->setBoolseparator( $boolseparator );
		$this->setJsonparams( $jsonparams );
		$this->setSit_ativo( $sit_ativo );
		$this->setDat_inclusao( $dat_inclusao );
		$this->setDat_update( $dat_update );
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
	public function setIdmenu_pai( $strNewValue = null )
	{
		$this->idmenu_pai = $strNewValue;
	}
	public function getIdmenu_pai()
	{
		return $this->idmenu_pai;
	}
	//--------------------------------------------------------------------------------
	public function setUrl( $strNewValue = null )
	{
		$this->url = $strNewValue;
	}
	public function getUrl()
	{
		return $this->url;
	}
	//--------------------------------------------------------------------------------
	public function setTooltip( $strNewValue = null )
	{
		$this->tooltip = $strNewValue;
	}
	public function getTooltip()
	{
		return $this->tooltip;
	}
	//--------------------------------------------------------------------------------
	public function setImg_menu( $strNewValue = null )
	{
		$this->img_menu = $strNewValue;
	}
	public function getImg_menu()
	{
		return $this->img_menu;
	}
	//--------------------------------------------------------------------------------
	public function setImgdisabled( $strNewValue = null )
	{
		$this->imgdisabled = $strNewValue;
	}
	public function getImgdisabled()
	{
		return $this->imgdisabled;
	}
	//--------------------------------------------------------------------------------
	public function setDissabled( $strNewValue = null )
	{
		$this->dissabled = $strNewValue;
	}
	public function getDissabled()
	{
		return $this->dissabled;
	}
	//--------------------------------------------------------------------------------
	public function setHotkey( $strNewValue = null )
	{
		$this->hotkey = $strNewValue;
	}
	public function getHotkey()
	{
		return $this->hotkey;
	}
	//--------------------------------------------------------------------------------
	public function setBoolseparator( $strNewValue = null )
	{
		$this->boolseparator = $strNewValue;
	}
	public function getBoolseparator()
	{
		return $this->boolseparator;
	}
	//--------------------------------------------------------------------------------
	public function setJsonparams( $strNewValue = null )
	{
		$this->jsonparams = $strNewValue;
	}
	public function getJsonparams()
	{
		return $this->jsonparams;
	}
	//--------------------------------------------------------------------------------
	public function setSit_ativo( $strNewValue = null )
	{
		$this->sit_ativo = $strNewValue;
	}
	public function getSit_ativo()
	{
		return $this->sit_ativo;
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
	public function setDat_update( $strNewValue = null )
	{
		$this->dat_update = $strNewValue;
	}
	public function getDat_update()
	{
		return is_null( $this->dat_update ) ? date( 'Y-m-d h:i:s' ) : $this->dat_update;
	}
	//--------------------------------------------------------------------------------
}
?>