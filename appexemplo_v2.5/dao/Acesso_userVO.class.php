<?php
/**
 * System generated by SysGen (System Generator with Formdin Framework) 
 * Download SysGen: https://github.com/bjverde/sysgen
 * Download Formdin Framework: https://github.com/bjverde/formDin
 * 
 * SysGen  Version: 1.9.0-alpha
 * FormDin Version: 4.7.5
 * 
 * System appev2 created in: 2019-09-10 09:04:46
 */
class Acesso_userVO
{
    private $iduser = null;
    private $login_user = null;
    private $pwd_user = null;
    private $sit_ativo = null;
    private $dat_inclusao = null;
    private $dat_update = null;
    private $idpessoa = null;
    public function __construct( $iduser=null, $login_user=null, $pwd_user=null, $sit_ativo=null, $dat_inclusao=null, $dat_update=null, $idpessoa=null ) {
        $this->setIduser( $iduser );
        $this->setLogin_user( $login_user );
        $this->setPwd_user( $pwd_user );
        $this->setSit_ativo( $sit_ativo );
        $this->setDat_inclusao( $dat_inclusao );
        $this->setDat_update( $dat_update );
        $this->setIdpessoa( $idpessoa );
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
    public function setPwd_user( $strNewValue = null )
    {
        $this->pwd_user = $strNewValue;
    }
    public function getPwd_user()
    {
        return $this->pwd_user;
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
    public function setIdpessoa( $strNewValue = null )
    {
        $this->idpessoa = $strNewValue;
    }
    public function getIdpessoa()
    {
        return $this->idpessoa;
    }
    //--------------------------------------------------------------------------------
}
?>