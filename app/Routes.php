<?php defined('INITIALIZED') OR exit('You cannot access this file directly');
/*
 * Padrão para a escrita de rotas:
 * Router::define('URL', 'Controller/Method');
 *
 * // Use '{var_name}' to indicate that the method needs a parameter identified by 'var_name' in the array
 * Router::define('URL/{id}', 'Controller/Method');
 * Router::define('URL/{name}/show', 'Controller/Method');
 *
 * OBS: A primeira rota válida será sempre a rota utilizada, portanto se forem definidas mais de uma rota para a mesma
 * URL, as que vierem após a primeira não serão utilizadas.
 *
 */

Router::define('entrar', 'UserController/login');
Router::define('cadastro', 'UserController/cadastro');
Router::define('sair', 'UserController/logout');
Router::define('meusdados', 'UserController/meusDados');
Router::define('meusdados/alterarsenha', 'UserController/alterarSenha');

Router::define('criar', 'ProcessController/novoProcesso');
Router::define('processo/cancelar', 'ProcessController/cancelarCriacao');
Router::define('processo/{id}', 'ProcessController/verProcesso');
Router::define('processo/{id}/apagar', 'ProcessController/apagarProcesso');
Router::define('api/feature/{id}', 'ProcessController/consultaFeature');


// Rotas para a construção das parada
//Router::define('cc/tasksmgmt', 'ConstructorController/createTasksMgmt');
Router::define('cc/phases', 'ConstructorController/createPhases');
Router::define('cc/features', 'ConstructorController/createFeatures');
