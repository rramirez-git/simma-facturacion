<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "inicio";
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route[ 'cfdi_parte_informacionaduanera/(:any)/(:any)/(:any)' ] = 'parteinformacionaduanera/$1/$2/$3';
$route[ 'cfdi_parte_informacionaduanera/(:any)/(:any)' ] = 'parteinformacionaduanera/$1/$2';
$route[ 'cfdi_parte_informacionaduanera/(:any)' ] = 'parteinformacionaduanera/$1';
$route[ 'cfdi_parte_informacionaduanera' ] = 'parteinformacionaduanera';

$route[ 'cfdi_parte/(:any)/(:any)/(:any)' ] = 'parte/$1/$2/$3';
$route[ 'cfdi_parte/(:any)/(:any)' ] = 'parte/$1/$2';
$route[ 'cfdi_parte/(:any)' ] = 'parte/$1';
$route[ 'cfdi_parte' ] = 'parte';

$route[ 'cfdi_doctorelacionado/(:any)/(:any)/(:any)' ] = 'doctorelacionado/$1/$2/$3';
$route[ 'cfdi_doctorelacionado/(:any)/(:any)' ] = 'doctorelacionado/$1/$2';
$route[ 'cfdi_doctorelacionado/(:any)' ] = 'doctorelacionado/$1';
$route[ 'cfdi_doctorelacionado' ] = 'doctorelacionado';

$route[ 'cfdi_pago/(:any)/(:any)/(:any)' ] = 'pago/$1/$2/$3';
$route[ 'cfdi_pago/(:any)/(:any)' ] = 'pago/$1/$2';
$route[ 'cfdi_pago/(:any)' ] = 'pago/$1';
$route[ 'cfdi_pago' ] = 'pago';

$route[ 'cfdi_concepto_impuestos/(:any)/(:any)/(:any)' ] = 'impuestos/$1/$2/$3';
$route[ 'cfdi_concepto_impuestos/(:any)/(:any)' ] = 'impuestos/$1/$2';
$route[ 'cfdi_concepto_impuestos/(:any)' ] = 'impuestos/$1';
$route[ 'cfdi_concepto_impuestos' ] = 'impuestos';

$route[ 'cfdi_concepto_informacionaduanera/(:any)/(:any)/(:any)' ] = 'informacionaduanera/$1/$2/$3';
$route[ 'cfdi_concepto_informacionaduanera/(:any)/(:any)' ] = 'informacionaduanera/$1/$2';
$route[ 'cfdi_concepto_informacionaduanera/(:any)' ] = 'informacionaduanera/$1';
$route[ 'cfdi_concepto_informacionaduanera' ] = 'informacionaduanera';

$route[ 'cfdi_concepto/(:any)/(:any)/(:any)' ] = 'concepto/$1/$2/$3';
$route[ 'cfdi_concepto/(:any)/(:any)' ] = 'concepto/$1/$2';
$route[ 'cfdi_concepto/(:any)' ] = 'concepto/$1';
$route[ 'cfdi_concepto' ] = 'concepto';

/* End of file routes.php */
/* Location: ./application/config/routes.php */