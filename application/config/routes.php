<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
    DEFAULT URL
*/ 
$route['default_controller'] = 'controller';
$route['assets/(:any)'] = 'assets/$1';
$route['404_override'] = 'controller/page_not_found';
$route['translate_uri_dashes'] = TRUE;

/*
    CUTOM URL
    =========================================
    (:num) is used to determine the relevant segment in the form of numbers
    (:any) is used to determine the relevant segments in all characters
*/

// HOME
$route['home'] = 'controller';

// USERS CONTROLLER
$route['users/add'] = 'Users/addNewUser';
$route['user/delete/(:num)'] = 'Users/DeleteUser/$1';
$route['user/edit'] = 'Users/editUser';
$route['user/logout'] = 'controller/logout';

// BRANCH CONTROLLER
$route['branch/add'] = 'Branch/addNewBranch';
$route['branch/edit'] = 'Branch/editBranch';
$route['branch/delete/(:num)'] = 'Branch/DeleteBranch/$1';

// TREATMENT CONTROLLER
$route['treatment/add'] = 'Treatment/addNewTreatment';
$route['treatment/add/price'] = 'Treatment/addNewTreatmentPrice';
$route['treatment/delete/(:num)'] = 'Treatment/DeleteTreatment/$1';

// AUTH CONTROLLER
$route['login'] = 'Auth/login';
$route['login/check'] = 'Auth/login_check';
$route['pin'] = 'Auth/pin';
$route['pin/check'] = 'Auth/pin_check';
