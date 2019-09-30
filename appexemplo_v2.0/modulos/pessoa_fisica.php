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

defined('APLICATIVO') or die();
require_once 'modulos/includes/acesso_view_allowed.php';

$primaryKey = 'IDPESSOA_FISICA';
$frm = new TForm('Cadastro Simples Pessoa Física',800,950);
$frm->setShowCloseButton(false);
$frm->setFlat(true);
$frm->setMaximize(true);
$frm->setHelpOnLine('Ajuda',600,980,'ajuda/ajuda_tela.php',null);


$frm->addHiddenField( 'BUSCAR' ); //Campo oculto para buscas
$frm->addHiddenField( $primaryKey );   // coluna chave da tabela
$controllerVwPessoa = new Vw_pessoa();
$listPessoa = $controllerVwPessoa->selectAllPF('NOME');
$frm->addSelectField('IDPESSOA', 'IDPESSOA',true,$listPessoa,null,null,null,null,null,null,' ',null);
$frm->addCpfField('CPF', 'CPF',true);
//$frm->addTextField('CPF', 'CPF',11,true,11);

$frm->addDateField('DAT_NASCIMENTO', 'Data Nascimento',false);

$controllerUf = new Uf();
$listUf = $controllerUf->selectAll('NOM_UF');
$frm->addSelectField('COD_UF', 'UF',false,$listUf,null,null,null,null,null,null,' ',null);

$controllerMunicipio = new Municipio();
$listMunicipio = $controllerMunicipio->selectAll();
$frm->addSelectField('COD_MUNICIPIO_NASCIMENTO', 'Município Nascimento',false,$listMunicipio,null,null,null,null,null,null,' ',null);

$frm->combinarSelects('COD_UF', 'COD_MUNICIPIO_NASCIMENTO', 'vw_regiao_municipio', 'COD_UF', 'COD_MUNICIPIO', 'NOM_MUNICIPIO', null, null, 'Nenhum', null, null, true);

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
                $vo = new Pessoa_fisicaVO();
                $frm->setVo( $vo );
                $controller = new Pessoa_fisica();
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
            $controller = new Pessoa_fisica();
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
                'IDPESSOA_FISICA'=>$frm->get('IDPESSOA_FISICA')
                ,'IDPESSOA'=>$frm->get('IDPESSOA')
                ,'CPF'=>$frm->get('CPF')
                ,'DAT_NASCIMENTO'=>$frm->get('DAT_NASCIMENTO')
                ,'COD_MUNICIPIO_NASCIMENTO'=>$frm->get('COD_MUNICIPIO_NASCIMENTO')
                ,'DAT_INCLUSAO'=>$frm->get('DAT_INCLUSAO')
                ,'DAT_ALTERACAO'=>$frm->get('DAT_ALTERACAO')
        );
    }
    return $retorno;
}

if( isset( $_REQUEST['ajax'] )  && $_REQUEST['ajax'] ) {
    $maxRows = ROWS_PER_PAGE;
    $whereGrid = getWhereGridParameters($frm);
    $controller = new Pessoa_fisica();
    $page = PostHelper::get('page');
    $dados = $controller->selectAllPagination( $primaryKey, $whereGrid, $page,  $maxRows);
    $realTotalRowsSqlPaginator = $controller->selectCount( $whereGrid );
    $mixUpdateFields = $primaryKey.'|'.$primaryKey
                    .',IDPESSOA|IDPESSOA'
                    .',CPF|CPF'
                    .',DAT_NASCIMENTO|DAT_NASCIMENTO'
                    .',COD_MUNICIPIO_NASCIMENTO|COD_MUNICIPIO_NASCIMENTO'
                    .',DAT_INCLUSAO|DAT_INCLUSAO'
                    .',DAT_ALTERACAO|DAT_ALTERACAO'
                    ;
    $gride = new TGrid( 'gd'                        // id do gride
    				   ,'Pessoa Física. Qtd: '.$realTotalRowsSqlPaginator // titulo do gride
    				   );
    $gride->addKeyField( $primaryKey ); // chave primaria
    $gride->setData( $dados ); // array de dados
    $gride->setRealTotalRowsSqlPaginator( $realTotalRowsSqlPaginator );
    $gride->setMaxRows( $maxRows );
    $gride->setUpdateFields($mixUpdateFields);
    $gride->setUrl( 'pessoa_fisica.php' );

    $gride->addColumn($primaryKey,'id');
    $gride->addColumn('IDPESSOA','id Pessoa');
    $gride->addColumn('CPF','CPF');
    $gride->addColumn('DAT_NASCIMENTO','Data Nascimento');
    $gride->addColumn('COD_MUNICIPIO_NASCIMENTO','COD_MUNICIPIO_NASCIMENTO');
    $gride->addColumn('DAT_INCLUSAO','Data Inclusão');
    $gride->addColumn('DAT_ALTERACAO','Data Alteração');


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
                    ,"IDPESSOA_FISICA":""
                    ,"IDPESSOA":""
                    ,"CPF":""
                    ,"DAT_NASCIMENTO":""
                    ,"COD_MUNICIPIO_NASCIMENTO":""
                    ,"DAT_INCLUSAO":""
                    ,"DAT_ALTERACAO":""
                    };
    fwGetGrid('pessoa_fisica.php','gride',Parameters,true);
}
function buscar() {
    jQuery("#BUSCAR").val(1);
    init();
}
</script>