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
class Acesso_userDAO 
{

    private static $sqlBasicSelect = 'select
                                      iduser
                                     ,login_user
                                     ,pwd_user
                                     ,sit_ativo
                                     ,dat_inclusao
                                     ,dat_update
                                     ,idpessoa
                                     from form_exemplo.acesso_user ';

    private $tpdo = null;

    public function __construct() {
        $tpdo = New TPDOConnectionObj();
        $this->setTPDOConnection($tpdo);
    }
    public function getTPDOConnection()
    {
        return $this->tpdo;
    }
    public function setTPDOConnection($TPDOConnection)
    {
        $this->tpdo = $TPDOConnection;
    }
    private function processWhereGridParameters( $whereGrid )
    {
        $result = $whereGrid;
        if ( is_array($whereGrid) ){
            $where = ' 1=1 ';
            $where = SqlHelper::getAtributeWhereGridParameters($where, $whereGrid, 'IDUSER', SqlHelper::SQL_TYPE_NUMERIC);
            $where = SqlHelper::getAtributeWhereGridParameters($where, $whereGrid, 'LOGIN_USER', SqlHelper::SQL_TYPE_TEXT_LIKE);
            $where = SqlHelper::getAtributeWhereGridParameters($where, $whereGrid, 'PWD_USER', SqlHelper::SQL_TYPE_TEXT_LIKE);
            $where = SqlHelper::getAtributeWhereGridParameters($where, $whereGrid, 'SIT_ATIVO', SqlHelper::SQL_TYPE_TEXT_LIKE);
            $where = SqlHelper::getAtributeWhereGridParameters($where, $whereGrid, 'DAT_INCLUSAO', SqlHelper::SQL_TYPE_TEXT_LIKE);
            $where = SqlHelper::getAtributeWhereGridParameters($where, $whereGrid, 'DAT_UPDATE', SqlHelper::SQL_TYPE_TEXT_LIKE);
            $where = SqlHelper::getAtributeWhereGridParameters($where, $whereGrid, 'IDPESSOA', SqlHelper::SQL_TYPE_NUMERIC);
            $result = $where;
        }
        return $result;
    }
    //--------------------------------------------------------------------------------
    public function selectById( $id )
    {
        if( empty($id) || !is_numeric($id) ){
            throw new InvalidArgumentException(Message::TYPE_NOT_INT.'class:'.__METHOD__);
        }
        $values = array($id);
        $sql = self::$sqlBasicSelect.' where iduser = ?';
        $result = $this->tpdo->executeSql($sql, $values);
        return $result;
    }
    //--------------------------------------------------------------------------------
	public function selectByLogin( $login )
	{
		if( empty($login) || !is_string($login) ){
			throw new InvalidArgumentException(Message::TYPE_NOT_INT.'class:'.__METHOD__);
		}
		$values = array($login);
		$sql = self::$sqlBasicSelect.' where login_user = ?';
		$result = $this->tpdo->executeSql($sql, $values );
		return $result;
	}    
    //--------------------------------------------------------------------------------
    public function selectCount( $where=null )
    {
        $where = $this->processWhereGridParameters($where);
        $sql = 'select count(iduser) as qtd from form_exemplo.acesso_user';
        $sql = $sql.( ($where)? ' where '.$where:'');
        $result = $this->tpdo->executeSql($sql);
        return $result['QTD'][0];
    }
    //--------------------------------------------------------------------------------
    public function selectAllPagination( $orderBy=null, $where=null, $page=null,  $rowsPerPage= null )
    {
        $rowStart = SqlHelper::getRowStart($page,$rowsPerPage);
        $where = $this->processWhereGridParameters($where);

        $sql = self::$sqlBasicSelect
        .( ($where)? ' where '.$where:'')
        .( ($orderBy) ? ' order by '.$orderBy:'')
        .( ' LIMIT '.$rowStart.','.$rowsPerPage);

        $result = $this->tpdo->executeSql($sql);
        return $result;
    }
    //--------------------------------------------------------------------------------
    public function selectAll( $orderBy=null, $where=null )
    {
        $where = $this->processWhereGridParameters($where);
        $sql = self::$sqlBasicSelect
        .( ($where)? ' where '.$where:'')
        .( ($orderBy) ? ' order by '.$orderBy:'');

        $result = $this->tpdo->executeSql($sql);
        return $result;
    }
    //--------------------------------------------------------------------------------
    public function insert( Acesso_userVO $objVo )
    {
        $values = array(  $objVo->getLogin_user() 
                        , $objVo->getPwd_user() 
                        , $objVo->getSit_ativo() 
                        , $objVo->getIdpessoa() 
                        );
        $sql = 'insert into form_exemplo.acesso_user(
                                 login_user
                                ,pwd_user
                                ,sit_ativo
                                ,idpessoa
                                ) values (?,?,?,?)';
        $result = $this->tpdo->executeSql($sql, $values);
        return $result;
    }
    //--------------------------------------------------------------------------------
    public function update ( Acesso_userVO $objVo )
    {
        $values = array( $objVo->getLogin_user()
                        ,$objVo->getPwd_user()
                        ,$objVo->getSit_ativo()
                        ,$objVo->getIdpessoa()
                        ,$objVo->getIduser() );
        $sql = 'update form_exemplo.acesso_user set 
                                 login_user = ?
                                ,pwd_user = ?
                                ,sit_ativo = ?
                                ,idpessoa = ?
                                where iduser = ?';
        $result = $this->tpdo->executeSql($sql, $values);
        return $result;
    }
    //--------------------------------------------------------------------------------
	public function updateSenha ( Acesso_userVO $objVo )
	{
	    $values = array( $objVo->getPwd_user()
	                   , $objVo->getLogin_user()
	    );
	    $sql = 'update form_exemplo.acesso_user set
								pwd_user = ?
								where login_user = ?';
        $result = $this->tpdo->executeSql($sql, $values);
        return $result;
	}    
    //--------------------------------------------------------------------------------
    public function delete( $id )
    {
        if( empty($id) || !is_numeric($id) ){
            throw new InvalidArgumentException(Message::TYPE_NOT_INT.'class:'.__METHOD__);
        }
        $values = array($id);
        $sql = 'delete from form_exemplo.acesso_user where iduser = ?';
        $result = $this->tpdo->executeSql($sql, $values);
        return $result;
    }
    //--------------------------------------------------------------------------------
    public function getVoById( $id )
    {
        if( empty($id) || !is_numeric($id) ){
            throw new InvalidArgumentException(Message::TYPE_NOT_INT.'class:'.__METHOD__);
        }
        $result = $this->selectById( $id );
        $result = \ArrayHelper::convertArrayFormDin2Pdo($result,false);
        $result = $result[0];
        $vo = new Acesso_userVO();
        $vo = \FormDinHelper::setPropertyVo($result,$vo);
        return $vo;
    }
}
?>