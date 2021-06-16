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
$route['default_controller'] = 'C_Login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


$route['struktur'] = 'C_Struktur';
$route['strukturd/(:any)'] = 'C_Struktur/strukturd/$1';
$route['downline'] = 'C_Setting/downline';

$route['welcome'] = 'welcome';

// sejahtera
$route['sejahtera'] = 'C_Sejahtera';
$route['sejahtera-add'] = 'C_Sejahtera/add';
$route['sejahtera-edit/(:any)'] = 'C_Sejahtera/edit/$1';
$route['sejahtera-view/(:any)'] = 'C_Sejahtera/view/$1';
$route['sejahtera-anggota/(:any)'] = 'C_Sejahtera/anggota/$1';
$route['sejahtera-anggota-edit/(:any)/(:any)'] = 'C_Sejahtera/editanggota/$1/$2';

//sejahtera anggota
$route['hkesejahteraan'] = 'C_Sejahtera/history';


//setting
$route['akses'] = 'C_Setting';
$route['akses-admin'] = 'C_Setting/view/administrator';
$route['akses-Anggota'] = 'C_Setting/view/Anggota';
$route['akses-menunggukonfirm'] = 'C_Setting/view/Menunggu Konfirmasi Admin';
$route['akses-tidakaktif'] = 'C_Setting/view/Tidak Aktif';
$route['kode'] = 'C_Setting/vkode';

//profil
$route['profil'] = 'C_Profil';

//user
$route['anggota'] = 'C_User/all';
$route['calonanggota'] = 'C_User';
$route['anggota-add'] = 'C_User/add';
$route['anggota-addv/(:any)'] = 'C_User/addv/$1';
$route['anggota/l/(:any)'] = 'C_User/levelcheck/$1';
$route['laporan'] = 'C_User/laporan';
$route['user-aprove/(:any)'] = 'C_User/ttf/$1';
$route['user-aktivasi/(:any)'] = 'C_User/aktif/$1';
$route['user-view/(:any)'] = 'C_User/view/$1';
$route['user-edit/(:any)'] = 'C_User/edit/$1';
$route['user-konfirm/(:any)'] = 'C_User/konfirm/$1';
$route['user-etipe/(:any)'] = 'C_User/edittipe/$1';

//donasi
$route['donasi'] = 'C_Donasi';
$route['transaksi'] = 'C_Donasi/transaksi';
$route['donasi-add'] = 'C_Donasi/add';
$route['donasi-aprove/(:any)/(:any)/(:any)'] = 'C_Donasi/aprove/$1/$2/$3';
$route['donasi-bayar/(:any)/(:any)'] = 'C_Donasi/bayar/$1/$2';


//berita
$route['berita'] = 'C_Berita';
$route['berita-add'] = 'C_Berita/add';
$route['berita-view/(:any)'] = 'C_Berita/view/$1';
$route['berita-edit/(:any)'] = 'C_Berita/edit/$1';

//leveel
$route['level-view/(:any)'] = 'C_Level/view/$1';
$route['level-edit/(:any)'] = 'C_Level/edit/$1';
$route['level'] = 'C_Level';
$route['level-add'] = 'C_Level/add';

//voucher
$route['voucher'] = 'C_Voucher';


//kategori barang
$route['kategori'] = 'C_Kategoribarang';
$route['Kategori-edit/(:any)'] = 'C_Kategoribarang/edit/$1';


//master komisi
$route['masterkomisi'] = 'C_MKomisi';
$route['masterkomisi-edit/(:any)'] = 'C_MKomisi/edit/$1';
$route['masterkomisi-add'] = 'C_MKomisi/add';