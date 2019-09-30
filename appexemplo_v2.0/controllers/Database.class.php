<?php
/**
 * System generated by SysGen (System Generator with Formdin Framework) 
 * Download SysGen: https://github.com/bjverde/sysgen
 * Download Formdin Framework: https://github.com/bjverde/formDin
 * 
 * SysGen  Version: 1.9.0-alpha
 * FormDin Version: 4.7.5-alpha
 * 
 * System appev2 created in: 2019-09-01 16:03:51
 */
class Database
{
    private $dao = null;

    public function __construct()
    {
        $this->dao = new DatabaseDAO();
    }
    public function getDao()
    {
        return $this->dao;
    }
    public function setDao($dao)
    {
        $this->dao = $dao;
    }
    //--------------------------------------------------------------------------------
    public function showMultiplos()
    {
        $dados = $this->dao->selectAll( null, null );
        echo('<h1>SqLite</h1>');
        var_dump($dados);
        echo('<hr>');

        $controllersMarca = new Marca();
        $dados = $controllersMarca->selectAll();
        echo('<h1>MySql</h1>');
        var_dump($dados);
        echo('<hr>');

        $dao = new DatabaseDAO();
        $this->setDao($dao);
        $dados = $this->dao->selectAll( null, null );
        echo('<h1>SqLite</h1>');
        var_dump($dados);
        echo('<hr>');
        
        $controllersMarca = new Marca();
        $dados = $controllersMarca->selectAll();
        echo('<h1>MySql</h1>');
        var_dump($dados);
        echo('<hr>');
    }
    //--------------------------------------------------------------------------------
    public function showMsgQtds($msg, $tpdo, $objUser, $objUserPerfil)
    {
        echo '<hr>';
        echo '<h1>'.$msg.'</h1>';
        $inTransaction = $tpdo->inTransaction();
        if( $inTransaction == 1 ){
            echo '<br><b>In Transaction</b>';
        }else{
            echo '<br>NOT Transaction';
        }
        $qtd = $objUser->selectCount();
        echo '<br>Acesso_user: '.$qtd;
        $qtd = $objUserPerfil->selectCount();
        echo '<br>Acesso_user_menu: '.$qtd;
    }
    //--------------------------------------------------------------------------------
    public function commit()
    {
        $tpdo = New TPDOConnectionObj();
        try{            
            $tpdo->beginTransaction();
            
            $objUser = new Acesso_user($tpdo);
            $objUserPerfil = new Acesso_perfil_user($tpdo);
            
            $msg = 'Antes de iniciar a transação';
            $this->showMsgQtds($msg, $tpdo, $objUser, $objUserPerfil);
            //---------------------------------------

            
            $nome = 'userTransaction'.rand(1, 100);
            $objUserVO = new Acesso_userVO();
            $objUserVO->setLogin_user($nome);
            $objUserVO->setSit_ativo('S');
            
            //$objUser = new acesso_user();
            $daoUser = $objUser->getDao();
            $daoUser->setTPDOConnection($tpdo);
            $objUser->save($objUserVO);
            
            $where = array('LOGIN_USER'=>$nome);
            $dados = $objUser->selectAll(null,$where);
            
            $idUser = $dados['IDUSER'][0];


            $objPerfilUser = new Acesso_perfil_userVO();
            $objPerfilUser->setIdperfil(3);
            $objPerfilUser->setIduser($idUser);
            $objPerfilUser->setSit_ativo('S');
            
            //$objUserPerfil = new Acesso_user_menu();
            $objUserPerfil->getDao()->setTPDOConnection($tpdo);
            $objUserPerfil->save($objPerfilUser);

            $msg = 'Depois do include';
            $this->showMsgQtds($msg, $tpdo, $objUser, $objUserPerfil);
            
            //----------------            
            $objUserPerfil->deleteByIdUser($idUser);
            $objUser->delete($idUser);
            
            $msg = 'Deletando registros incluidos';
            $this->showMsgQtds($msg, $tpdo, $objUser, $objUserPerfil);
            
            $tpdo->commit();
        }
        catch (Exception $e) {
            $tpdo->rollBack();
            MessageHelper::logRecord($e);
            throw new Exception($e);
        }
    }
    //--------------------------------------------------------------------------------
    public function rollBack()
    {
        $tpdo = New TPDOConnectionObj();
        try{
            $tpdo->beginTransaction();
            
            $objUser = new Acesso_user($tpdo);
            $objUserPerfil = new Acesso_perfil_user($tpdo);
            
            $msg = 'Antes de iniciar a transação';
            $this->showMsgQtds($msg, $tpdo, $objUser, $objUserPerfil);
            //---------------------------------------
            
            
            $nome = 'userTransaction'.rand(1, 100);
            $objUserVO = new Acesso_userVO();
            $objUserVO->setLogin_user($nome);
            $objUserVO->setSit_ativo('S');
            
            //$objUser = new acesso_user();
            $daoUser = $objUser->getDao();
            $daoUser->setTPDOConnection($tpdo);
            $objUser->save($objUserVO);
            
            $where = array('LOGIN_USER'=>$nome);
            $dados = $objUser->selectAll(null,$where);
            
            $idUser = $dados['IDUSER'][0];
            
            
            $objPerfilUser = new Acesso_perfil_userVO();
            $objPerfilUser->setIdperfil(3);
            $objPerfilUser->setIduser($idUser);
            $objPerfilUser->setSit_ativo('S');           
            
            
            //$objUserPerfil = new Acesso_user_menu();
            $objUserPerfil->getDao()->setTPDOConnection($tpdo);
            $objUserPerfil->save($objPerfilUser);
            
            $msg = 'Depois do include';
            $this->showMsgQtds($msg, $tpdo, $objUser, $objUserPerfil);
            
            throw new  Exception('Gerenic Exception!!!!');            
            //----------------
            //$objUserPerfil->deleteByIdUser($idUser);
            //$objUser->delete($idUser);
            
            //$msg = 'Deletando registros incluidos';
            //$this->showMsgQtds($msg, $tpdo, $objUser, $objUserPerfil);            
                        
            $tpdo->commit();
        }
        catch (Exception $e) {
            $tpdo->rollBack();
            MessageHelper::logRecord($e);
            throw new Exception($e);
        }
    }
}
?>