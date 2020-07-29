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
|	https://codeigniter.com/user_guide/general/routing.html
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
$route['default_controller'] 											= 'Home';
$route[ADMINFOLDERNAME] 												= ADMINFOLDER."Login";
$route['404_override'] 													= '';
$route['translate_uri_dashes'] 											= FALSE;

//$route[HOME_INDEX] 													= 'Home/index';


$route[LOGIN_INDEX] 													= 'Login/index';
$route[LOGIN_BUYER] 													= 'Login/buyer';
$route[LOGIN_BUYER_OTP] 												= 'Login/buyerOTP';


$route[REGISTRATION_BUYER] 												= 'Registration/buyer';
$route[REGISTRATION_BUYER_OTP] 											= 'Registration/buyer_otp';

$route[REGISTRATION_STEP1] 												= 'Registration/step1';
$route[REGISTRATION_OTP] 												= 'Registration/otp';
$route[REGISTRATION_STEP2] 												= 'Registration/step2';
$route[REGISTRATION_STEP3] 												= 'Registration/step3';
$route[REGISTRATION_STEP4] 												= 'Registration/step4';

$route[SELLER_DASHBOARD] 												= 'Seller/dashboard';
$route[SELLER_COMPANYPROFILE]											= 'Seller/companyProfile';
$route[SELLER_MANAGEPRODUCTS]											= 'Seller/manageProducts';

$route[SELLER_UPDATEPRODUCTS."/(:num)"]									= 'Seller/updateProduct/$1';
$route[SELLER_VIEWPRODUCTS]												= 'Seller/viewProducts';
$route[SELLER_VIEWPRODUCTS."/(:num)"]									= 'Seller/viewProducts/$1';
$route[SELLER_VIEWPRODUCTS."/(:num)/(:any)"]							= 'Seller/viewProducts/$1/$2';
$route[SELLER_PHOTODOCS]												= 'Seller/photoDocs';
$route[SELLER_BUYERTOOLS]												= 'Seller/buyerTools';
$route[SELLER_SETTINGS]													= 'Seller/sellerSettings';

$route[SELLERPROFILE_INDEX."/(:any)"]									= 'Sellerprofile/index/$1';

$route[SELLERPROFILE_MORE."/(:any)/(:num)/(:num)"]						= 'Sellerprofile/more/$2/$3';

$route[HOME_SENDPRODUCTINQUIRY]											= 'Home/sendProductInquiry';

$route[HOME_PRODUCT_DETAILS."/(:any)/(:num)"]							= 'Home/productDetails/$1/$2';

$route[SELLER_BUYLEADS]													= "Seller/buyLeads/0/0";

$route[SELLER_BUYLEADS."/(:num)/(:num)"]								= "Seller/buyLeads/$1/$2";

$route[SELLER_BUYLEADS."/(:num)/(:any)/(:num)"]							= "Seller/buyLeads/$1/$2/$3";

$route[SELLER_BUYLEADS_VIEW."/(:num)/(:num)"]							= "Seller/buyLeadsView/$1/$2";

$route[SELLER_LEADMANAGER]												= 'Seller/leadManager';

$route[SELLER_LEADMANAGER."/(:num)"]									= 'Seller/leadManager/$1';

$route[SELLER_POST_REQUIREMENT]											= 'Seller/addPostRequirement';

$route[SELLER_VIEW_REQUIREMENT]											= 'Seller/viewRequirement';

$route[SELLER_LEADMANAGER_PRODUCTS."/(:num)/(:num)/(:num)"]				= 'Seller/leadManagerProduct/$1/$2/$3';

$route[SELLER_LEADMANAGER_PRODUCTS."/(:num)/(:num)/(:any)/(:num)"]		= 'Seller/leadManagerProduct/$1/$2/$3/$4';

$route[SELLER_LEADMANAGER_PRODUCTS_VIEW."/(:num)/(:num)/(:num)"]		= 'Seller/leadManagerProductView/$1/$2/$3';

$route[SELLER_SETTINGS_OTP]												= 'Seller/sellerSettingsOTP';

$route[HOME_SEARCH."/(:any)"]											= 'Home/search/$1';

$route[HOME_SEARCH."/(:any)/(:any)"]									= 'Home/search/$1/$2';

$route[FORGOT_PASSWORD_INDEX]											= 'Forgotpassword/index';

$route[FORGOT_PASSWORD_SELLER_OTP]										= 'Forgotpassword/sellerOTP';

$route[FORGOT_PASSWORD_CHANGE_PASSWORD]									= 'Forgotpassword/changePassword';

$route[SUPPORT_PIN_INDEX]												= 'Supportlogin/index';

$route[ABOUT]															= 'Static_pages/about';

$route[CONTACT]															= 'Static_pages/contact';

$route[PRIVACY]															= 'Static_pages/privacy';

$route[REFUND]															= 'Static_pages/refund';

$route[TERM]															= 'Static_pages/term';

$route[PRICE]															= 'Static_pages/price';

/* -------------------------------- ADMIN ROUTES -------------------------------------------- */
