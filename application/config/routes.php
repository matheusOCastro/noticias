<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'home';
$route['economia'] = 'home/economia';
$route['politica'] = 'home/politica';
$route['educacao'] = 'home/educacao';
$route['esportes'] = 'home/esportes';
$route['musica'] = 'home/musica';
$route['mundo'] = 'home/mundo';
$route['tecnologia'] = 'home/tecnologia';
$route['pesquisar'] = 'home/pesquisar';

$route['login'] = 'home/login';
$route['adm/logout'] = 'adm/logout';
$route['adm/acao'] = 'adm/acao';
$route['adm/noticias'] = 'adm/noticias';
$route['adm/autor'] = 'adm/autor';
$route['adm/inativar_noticia'] = 'adm/inativar_noticia';
$route['adm/inativar_autor'] = 'adm/autor';
$route['adm/cadastrar_autor'] = 'adm/cadastrar_autor';
$route['adm/cadastrar_noticia'] = 'adm/cadastrar_noticia';
$route['adm/editar_autor'] = 'adm/editar_autor';
$route['adm/gravar_edicao_autor'] = 'adm/gravar_edicao_autor';
$route['adm/editar_noticia'] = 'adm/editar_noticia';
$route['adm/gravar_edicao_noticia'] = 'adm/gravar_edicao_noticia';

$route['constr'] = 'home/constr';

$route['404_override'] = '';
$route['translate_uri_dashes'] = true;
