<?php
/**
 * System generated by SysGen (System Generator with Formdin Framework) 
 * Download SysGen: https://github.com/bjverde/sysgen
 * Download Formdin Framework: https://github.com/bjverde/formDin
 * 
 * SysGen  Version: 1.9.0-alpha
 * FormDin Version: 4.7.5-alpha
 * 
 * System appev2 created in: 2019-09-01 16:03:50
 */
class SelfilhosmenuVO
{
    private $idmenu_pai = null;
    public function __construct( $idmenu_pai=null ) {
        $this->setIdmenu_pai( $idmenu_pai );
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
}
?>