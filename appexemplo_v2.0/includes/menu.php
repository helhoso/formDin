<?php
/**
 * System generated by SysGen (System Generator with Formdin Framework) 
 * Download SysGen: https://github.com/bjverde/sysgen
 * Download Formdin Framework: https://github.com/bjverde/formDin
 * 
 * SysGen  Version: 0.9.0
 * FormDin Version: 4.2.6-alpha
 * 
 * System ap2v created in: 2018-11-21 23:30:53
 */

$menu = new TMenuDhtmlx();
$menu->add(1, null, 'Menu', null, null, 'menu-alt-512.png');
$menu->add(1.1,1,'marca','modulos/marca.php');
$menu->add(1.2,1,'pedido','modulos/pedido.php');
$menu->add(1.3,1,'pedido_item','modulos/pedido_item.php');
$menu->add(1.4,1,'produto','modulos/produto.php');

$menu->add(2, null, 'Pessoas', null, null);
$menu->add(21,2,'pessoa','modulos/pessoa.php');
$menu->add(22,2,'pessoa_fisica','modulos/pessoa_fisica.php');
$menu->add(23,2,'pessoa_juridica','modulos/pessoa_juridica.php');

$menu->add(3, null, 'Autoridades', null, null);
$menu->add(31, 3, 'Cadastro Autoridades', 'modulos/autoridade.php', null);

$menu->add(7, null, 'Tabelas de Apoio', null, null, 'table16.gif');
$menu->add(71, 7,'Região', 'modulos/regiao.php', null, null, null, false, null);
$menu->add(72, 7,'UF','modulos/uf.php');
$menu->add(73, 7,'Município','modulos/municipio.php');
$menu->add(74, 7,'Meta Tipo','modulos/meta_tipo.php');
$menu->add(75, 7,'Tipo','modulos/tipo.php');

$menu->add(8, null, 'Acesso', null, null, 'icon-key-yellow.png');
$menu->add(81, 8, 'Usuários', 'modulos/acesso_user.php', null, 'user916.gif');
$menu->add(82, 8, 'Pefil de Acesso', 'modulos/acesso_perfil.php', null, 'icon_mask.png');
$menu->add(83, 8, 'Menu', 'modulos/acesso_menu.php', null, 'icon-menu.png');
$menu->add(84, 8, 'Relacionar Perfil com Menu','modulos/acesso_perfil_menu.php');
$menu->add(85, 8, 'Relacionar Perfil com Usuário','modulos/acesso_perfil_user.php');
$menu->add(86, 8, 'Alterar a minha senha','modulos/acesso_senha.php', null, 'lock16.gif');

$menu->add(9, null, 'Sobre', 'modulos/sys_about.php', null, 'information-circle.jpg');

$menu->add(10,null,'Config Ambiente',null,null,'setting-gear-512.png');
$menu->add(101,10,'Ambiente Resumido','modulos/sys_environment_summary.php',null,'information-circle.jpg');
$menu->add(102,10,'PHPInfo','modulos/sys_environment.php',null,'php_logo.png');
$menu->add(104,10,'Gerador VO/DAO','../base/includes/gerador_vo_dao.php');
$menu->add(105,10,'Gerador Form VO/DAO','../base/includes/gerador_form_vo_dao.php',null,'smiley-1-512.png');


$menu->add(11, null, 'Banco Transação', null, null, 'data_base.png');
$menu->add(11.1, 11, 'Commit', 'modulos/database_commit.php', null, '../../'.DIR_ROOT.'/images/database_commit.png');
$menu->add(11.2, 11, 'Rollback', 'modulos/database_rollback.php', null, '../../'.DIR_ROOT.'/images/database_rollback.png');

$menu->getXml();
?>