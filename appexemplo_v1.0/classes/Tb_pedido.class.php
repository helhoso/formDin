<?php
/**
 * System generated by SysGen (System Generator with Formdin Framework) 
 * Download SysGen: https://github.com/bjverde/sysgen
 * Download Formdin Framework: https://github.com/bjverde/formDin
 * 
 * SysGen  Version: 0.8.0-alpha
 * FormDin Version: 4.2.6-alpha
 * 
 * System sysinfra created in: 2018-09-11 01:58:11
 */

class Tb_pedido {


	public function __construct(){
	}
	//--------------------------------------------------------------------------------
	public static function selectById( $id ){
		$result = Tb_pedidoDAO::selectById( $id );
		return $result;
	}
	//--------------------------------------------------------------------------------
	public static function selectCount( $where=null ){
		$result = Tb_pedidoDAO::selectCount( $where );
		return $result;
	}
	//--------------------------------------------------------------------------------
	public static function selectAll( $orderBy=null, $where=null ){
		$result = Tb_pedidoDAO::selectAll( $orderBy, $where );
		return $result;
	}
	//--------------------------------------------------------------------------------
	public static function save( Tb_pedidoVO $objVo ){
		$result = null;
		if( $objVo->getId_pedido() ) {
			$result = Tb_pedidoDAO::update( $objVo );
		} else {
			$result = Tb_pedidoDAO::insert( $objVo );
		}
		return $result;
	}
	//--------------------------------------------------------------------------------
	public static function delete( $id ){
		$result = Tb_pedidoDAO::delete( $id );
		return $result;
	}

}
?>