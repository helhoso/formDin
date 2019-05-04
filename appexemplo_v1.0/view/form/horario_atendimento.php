<?php
/**
 * System generated by SysGen (System Generator with Formdin Framework) 
 * Download SysGen: https://github.com/bjverde/sysgen
 * Download Formdin Framework: https://github.com/bjverde/formDin
 * 
 * SysGen  Version: 1.3.1-alpha
 * FormDin Version: 4.4.3-alpha
 * 
 * System xx created in: 2019-04-11 00:32:52
 */

defined('APLICATIVO') or die();

//d($_REQUEST);

$primaryKey = 'IDHORARIO_ATENDIMENTO';
$frm = new TForm('Cadastro de Horários de atendimentos',800,950);
$frm->setFlat(true);
$frm->setMaximize(true);

$html1 = 'Esse form foi criado com o <a href="https://github.com/bjverde/sysgen">Sysgen 1.3.0</a></i>, depois alterado para atender o requisito.
          <br>Esse tela simula o cadastro de atendimento de horarios de um Dentista.
          <br>
          <br><b>REPARE no Campo oculto HORARIOHIDDEN</b>.
          <br>
          <br>Utiliza a tabela HORARIO_ATENDIMENTO do banco de dados bdApoio.s3db ( sqlite )  ';


$frm->addHiddenField( 'BUSCAR' ); //Campo oculto para buscas
$frm->addHiddenField( $primaryKey );   // coluna chave da tabela
$frm->addHiddenField( 'HORARIOHIDDEN' );   // coluna chave da tabela

$frm->addHtmlField('html1', $html1, null, null, null, null)->setCss('border', '1px solid #ffeb3b')->setCss('background-color', '#ffffcc')->setCss('margin-bottom', '10px');

$listPessoa = Pessoa::selectAll();
$frm->addSelectField('IDPESSOA_DENTISTA', 'Dentista', true, $listPessoa);

$listHorarios = array('08:00'=>'08:00','09:00'=>'09:00','10:00'=>'10:00','16:00'=>'16:00','17:00'=>'17:00','18:00'=>'18:00');
$frm->addCheckField('HORARIO','Horários:',TRUE,$listHorarios,null,null,null,4);


$frm->addButton('Buscar', null, 'btnBuscar', 'buscar()', null, true, false);
$frm->addButton('Salvar', null, 'Salvar', null, null, false, false);
$frm->addButton('Limpar', null, 'Limpar', null, null, false, false);


$acao = isset($acao) ? $acao : null;
switch( $acao ) {
    //--------------------------------------------------------------------------------
    case 'Limpar':
        $frm->clearFields();
    break;
    case 'Salvar':
        try{
            if ( $frm->validate() ) {
                $vo = new Horario_atendimentoVO();
                $frm->setVo( $vo );
                $class = new Horario_atendimento();
                $resultado = $class->save( $vo );
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
            $class = new Horario_atendimento();
            $resultado = $class->delete( $id );
            if($resultado==1) {
                $frm->setMessage('Registro excluido com sucesso!!!');
                $frm->clearFields();
            }else{
                $frm->clearFields();
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
    //--------------------------------------------------------------------------------
    case 'gd_alterar':
        $listSel = array(0=> RequestHelper::get('HORARIOHIDDEN') );
        $frm->setFieldValue('HORARIO',$listSel);
    break;
}


function getWhereGridParameters(&$frm)
{
    $retorno = null;
    if($frm->get('BUSCAR') == 1 ){
        $retorno = array(
                'IDHORARIO_ATENDIMENTO'=>$frm->get('IDHORARIO_ATENDIMENTO')
                ,'IDPESSOA_DENTISTA'=>$frm->get('IDPESSOA_DENTISTA')
                ,'HORARIO'=>$frm->get('HORARIO')
        );
    }
    return $retorno;
}

if( isset( $_REQUEST['ajax'] )  && $_REQUEST['ajax'] ) {
    $maxRows = ROWS_PER_PAGE;
    $whereGrid = getWhereGridParameters($frm);
    $dados = Horario_atendimento::selectAll( $primaryKey, $whereGrid );
    $mixUpdateFields = $primaryKey.'|'.$primaryKey
                    .',IDPESSOA_DENTISTA|IDPESSOA_DENTISTA'
                    .',HORARIO|HORARIOHIDDEN'
                    ;
    $gride = new TGrid( 'gd'                        // id do gride
    				   ,'Gride with SQL Pagination' // titulo do gride
    				   );
    $gride->addKeyField( $primaryKey ); // chave primaria
    $gride->setData( $dados ); // array de dados
    $gride->setMaxRows( $maxRows );
    $gride->setUpdateFields($mixUpdateFields);
    $gride->setUrl( 'view/form/horario_atendimento.php' );

    $gride->addColumn($primaryKey,'id');
    $gride->addColumn('IDPESSOA_DENTISTA','idPessoa');
    $gride->addColumn('NOM_PESSOA','Nome');
    $gride->addColumn('HORARIO','Horário');


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
                    ,"IDHORARIO_ATENDIMENTO":""
                    ,"IDPESSOA_DENTISTA":""
                    ,"HORARIO":""
                    };
    fwGetGrid('view/form/horario_atendimento.php','gride',Parameters,true);
}
function buscar() {
    jQuery("#BUSCAR").val(1);
    init();
}
</script>