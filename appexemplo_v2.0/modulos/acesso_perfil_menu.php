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

defined('APLICATIVO') or die();

$primaryKey = 'IDPERFILMENU';
$frm = new TForm('Relacionar Perfil com Menu',700);
$frm->setShowCloseButton(false);
$frm->setFlat(true);
$frm->setMaximize(true);
$frm->setHelpOnLine('Ajuda',600,980,'ajuda/ajuda_tela.php',null);

include 'modulos/acesso_aviso.php';
$frm->addHiddenField( 'BUSCAR' ); //Campo oculto para buscas
$frm->addHiddenField( $primaryKey );   // coluna chave da tabela
$controllerAcesso_perfil = new Acesso_perfil();
$listAcesso_perfil = $controllerAcesso_perfil->selectAll();
$frm->addSelectField('IDPERFIL', 'Perfil',TRUE,$listAcesso_perfil,null,null,null,null,null,null,' ',null);
$controllerAcesso_menu = new Acesso_menu();
$listAcesso_menu = $controllerAcesso_menu->selectAll();
$frm->addSelectField('IDMENU', 'Menu',TRUE,$listAcesso_menu,null,null,null,null,null,null,' ',null);
//$frm->addTextField('SIT_ATIVO', 'SIT_ATIVO',1,true,1);
//$frm->addDateField('DAT_INCLUSAO', 'DAT_INCLUSAO',true);
//$frm->addDateField('DAT_UPDATE', 'DAT_UPDATE',false);

$frm->addButton('Buscar', null, 'btnBuscar', 'buscar()', null, true, false);
$frm->addButton('Salvar', null, 'Salvar', null, null, false, false);
$frm->addButton('Limpar', null, 'Limpar', null, null, false, false);


$acao = isset($acao) ? $acao : null;
switch( $acao ) {
    //--------------------------------------------------------------------------------
    case 'Limpar':
        $frm->clearFields();
    break;
    //--------------------------------------------------------------------------------
    case 'Salvar':
        try{
            if ( $frm->validate() ) {
                $vo = new Acesso_perfil_menuVO();
                $frm->setVo( $vo );
                $controller = new Acesso_perfil_menu();
                $resultado = $controller->save( $vo );
                if($resultado==1) {
                    $frm->setMessage('Registro gravado com sucesso!!!');
                    $frm->clearFields();
                }else{
                    $frm->setMessage($resultado);
                }
            }
        }
        catch (DomainException $e) {
            $frm->setMessage( $e->getMessage() );
        }
        catch (Exception $e) {
            MessageHelper::logRecord($e);
            $frm->setMessage( $e->getMessage() );
        }
    break;
    //--------------------------------------------------------------------------------
    case 'gd_excluir':
        try{
            $id = $frm->get( $primaryKey ) ;
            $controller = new Acesso_perfil_menu();
            $resultado = $controller->delete( $id );
            if($resultado==1) {
                $frm->setMessage('Registro excluido com sucesso!!!');
                $frm->clearFields();
            }else{
                $frm->setMessage($resultado);
            }
        }
        catch (DomainException $e) {
            $frm->setMessage( $e->getMessage() );
        }
        catch (Exception $e) {
            MessageHelper::logRecord($e);
            $frm->setMessage( $e->getMessage() );
        }
    break;
}


function getWhereGridParameters(&$frm)
{
    $retorno = null;
    if($frm->get('BUSCAR') == 1 ){
        $retorno = array(
                'IDPERFILMENU'=>$frm->get('IDPERFILMENU')
                ,'IDPERFIL'=>$frm->get('IDPERFIL')
                ,'IDMENU'=>$frm->get('IDMENU')
                ,'SIT_ATIVO'=>$frm->get('SIT_ATIVO')
                ,'DAT_INCLUSAO'=>$frm->get('DAT_INCLUSAO')
                ,'DAT_UPDATE'=>$frm->get('DAT_UPDATE')
        );
    }
    return $retorno;
}

if( isset( $_REQUEST['ajax'] )  && $_REQUEST['ajax'] ) {
    $maxRows = ROWS_PER_PAGE;
    $whereGrid = getWhereGridParameters($frm);
    $controller = new Acesso_perfil_menu();
    $page = PostHelper::get('page');
    $dados = $controller->selectAllPagination( $primaryKey, $whereGrid, $page,  $maxRows);
    $realTotalRowsSqlPaginator = $controller->selectCount( $whereGrid );
    $mixUpdateFields = $primaryKey.'|'.$primaryKey
                    .',IDPERFIL|IDPERFIL'
                    .',IDMENU|IDMENU'
                    .',SIT_ATIVO|SIT_ATIVO'
                    .',DAT_INCLUSAO|DAT_INCLUSAO'
                    .',DAT_UPDATE|DAT_UPDATE'
                    ;
    $gride = new TGrid( 'gd'                        // id do gride
    				   ,'Relações. Qtd: '.$realTotalRowsSqlPaginator // titulo do gride
    				   );
    $gride->addKeyField( $primaryKey ); // chave primaria
    $gride->setData( $dados ); // array de dados
    $gride->setRealTotalRowsSqlPaginator( $realTotalRowsSqlPaginator );
    $gride->setMaxRows( $maxRows );
    $gride->setUpdateFields($mixUpdateFields);
    $gride->setUrl( 'acesso_perfil_menu.php' );

	$gride->addColumn($primaryKey,'id',null,'center');
	$gride->addColumn('IDPERFIL','Id Perfil',null,'center');
	$gride->addColumn('NOM_PERFIL','Perfil');
	$gride->addColumn('IDMENU','Id Menu',null,'center');
	$gride->addColumn('NOM_MENU','Menu');
	//$gride->addColumn('SIT_ATIVO','SIT_ATIVO');
	$gride->addColumn('DAT_INCLUSAO','Data da Inclusão',null,'center');
	$gride->addColumn('DAT_UPDATE','Data da Alteração',null,'center');

    $gride->show();
    die();
}

$frm->addHtmlField('gride');
$frm->addJavascript('init()');
$frm->show();

?>
<script>
function init() {
    var Parameters = {"BUSCAR":""
                    ,"IDPERFILMENU":""
                    ,"IDPERFIL":""
                    ,"IDMENU":""
                    ,"SIT_ATIVO":""
                    ,"DAT_INCLUSAO":""
                    ,"DAT_UPDATE":""
                    };
    fwGetGrid('acesso_perfil_menu.php','gride',Parameters,true);
}
function buscar() {
    jQuery("#BUSCAR").val(1);
    init();
}
</script>