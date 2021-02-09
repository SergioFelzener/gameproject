<?php 

// definindo timezone da aplicação
date_default_timezone_set('America/Sao_Paulo');
// ajustando a parte específica de tempo passando 4 parametros para portugues Brasil
setlocale(LC_TIME, 'pt-BR', 'pt-BR.uft-8', 'portuguese');

// constantes gerais
define('DAILE_TIME', 60 * 60 * 8);



//Pastas do projeto

// definindo constante com define vai pegar o path de dentro do dir models usa /../ para sair da pasta config 
define('MODEL_PATH', realpath(dirname(__FILE__) . '/../models'));
define('VIEW_PATH', realpath(dirname(__FILE__) . '/../views'));
define('TEMPLATE_PATH', realpath(dirname(__FILE__) . '/../views/template'));
define('CONTROLLER_PATH', realpath(dirname(__FILE__) . '/../controllers'));
define('EXCEPTION_PATH', realpath(dirname(__FILE__) . '/../exceptions'));

//carregando arquivo da pasta config.
require_once(realpath(dirname(__FILE__) . '/database.php'));
require_once(realpath(dirname(__FILE__) . '/loader.php'));
require_once(realpath(dirname(__FILE__) . '/session.php'));
require_once(realpath(dirname(__FILE__) . '/date_utils.php'));
require_once(realpath(MODEL_PATH . '/Model.php'));
require_once(realpath(MODEL_PATH . '/User.php'));
require_once(realpath(MODEL_PATH . '/Register.php'));
require_once(realpath(EXCEPTION_PATH . '/AppException.php'));
require_once(realpath(EXCEPTION_PATH . '/ValidationException.php'));


?>