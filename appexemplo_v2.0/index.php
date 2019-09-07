<?php
/*
 * Formdin Framework
 * Copyright (C) 2012 Ministério do Planejamento
 * Criado por Luís Eugênio Barbosa
 * Essa versão é um Fork https://github.com/bjverde/formDin
 *
 * ----------------------------------------------------------------------------
 * This file is part of Formdin Framework.
 *
 * Formdin Framework is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public License version 3
 * as published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public License version 3
 * along with this program; if not,  see <http://www.gnu.org/licenses/>
 * or write to the Free Software Foundation, Inc., 51 Franklin Street,
 * Fifth Floor, Boston, MA  02110-1301, USA.
 * ----------------------------------------------------------------------------
 * Este arquivo é parte do Framework Formdin.
 *
 * O Framework Formdin é um software livre; você pode redistribuí-lo e/ou
 * modificá-lo dentro dos termos da GNU LGPL versão 3 como publicada pela Fundação
 * do Software Livre (FSF).
 *
 * Este programa é distribuí1do na esperança que possa ser útil, mas SEM NENHUMA
 * GARANTIA; sem uma garantia implícita de ADEQUAÇÃO a qualquer MERCADO ou
 * APLICAÇÃO EM PARTICULAR. Veja a Licen?a Pública Geral GNU/LGPL em portugu?s
 * para maiores detalhes.
 *
 * Você deve ter recebido uma cópia da GNU LGPL versão 3, sob o título
 * "LICENCA.txt", junto com esse programa. Se não, acesse <http://www.gnu.org/licenses/>
 * ou escreva para a Fundação do Software Livre (FSF) Inc.,
 * 51 Franklin St, Fifth Floor, Boston, MA 02111-1301, USA.
 */

require_once('includes/constantes.php');
require_once('includes/config_conexao.php');

//FormDin version: 4.2.6-alpha
require_once '../base/classes/webform/TApplication.class.php';
require_once 'controllers/autoload_appev2.php';
require_once 'dao/autoload_appev2_dao.php';


define('DIR_ROOT'     , basename(__DIR__));

$app = new TApplication(); // criar uma instancia do objeto aplicacao
$app->setFormDinMinimumVersion(FORMDIN_VERSION_MIN_VERSION);
$app->setTitle(SYSTEM_NAME.' com FormDin '.FORMDIN_VERSION);
$app->setSUbTitle('Framework para Desenvolvimento de Aplicativos WEB');
$app->setSigla(APLICATIVO);
$app->setImgLogoPath('images/appv1_logo.png');
$app->setVersionSystem(SYSTEM_VERSION);
//$app->setUnit('Departamento de Informática - DI - IBAMA 2011');
//$app->setLoginFile('includes/tela_login.php');
$app->setLoginInfo('Bem-vindo');
$app->setMainMenuFile('includes/menu.php');
$app->setWaterMark('brasao_marca_dagua.png');

$app->setCssDefaultFormFile('css/css_form_default.css');

$app->run();
?>
