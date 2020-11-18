<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
$route['default_controller'] = 'Landing';
$route['404_override'] = '';
$route['translate_uri_dashes'] = TRUE;
$route['Auth'] = 'Auth';
$route['Kurikulum'] = 'Kurikulum';
$route['Kurikulum/absensi-siswa'] = 'Kurikulum/Absensi_siswa';
$route['Kurikulum/absensi-guru'] = 'Kurikulum/Absensi_guru';
$route['Kurikulum/rpp'] = 'Kurikulum/Rpp';
$route['Kurikulum/silabus'] = 'Kurikulum/Silabus';
$route['Kurikulum/materi'] = 'Kurikulum/Materi';
$route['Kurikulum/penyerahan-materi'] = 'Kurikulum/Penyerahan-materi';
$route['Kurikulum/jadwal'] = 'Kurikulum/Jadwal';
$route['Kurikulum/jurnal'] = 'Kurikulum/Jurnal';
$route['Kurikulum/ruang'] = 'Kurikulum/Ruang';
$route['Kurikulum/hari-pelajaran'] = 'Kurikulum/Hari_pelajaran';
$route['Kurikulum/guru-mapel'] = 'Kurikulum/Guru_mapel';
$route['Kurikulum/sesi-pelajaran'] = 'Kurikulum/Sesi_pelajaran';
$route['Kurikulum/mapel'] = 'Kurikulum/Mapel';
$route['Kurikulum/daftar-nilai'] = 'Kurikulum/Daftar_nilai';
$route['Kurikulum/pengelola-nilai'] = 'Kurikulum/Pengelola_nilai';
$route['Kurikulum/e-rapot'] = 'Kurikulum/E_rapot';
$route['Kesiswaan'] = 'Kesiswaan';
$route['Kesiswaan/pelanggaran-siswa'] = 'Kesiswaan/Pelanggaran_siswa';
$route['Kesiswaan/absensi-siswa'] = 'Kesiswaan/Absensi_siswa';
$route['Kesiswaan/siswa-belum-berkelas'] = 'Kesiswaan/Siswa-belum-berkelas';
$route['Kesiswaan/siswa-sudah-berkelas'] = 'Kesiswaan/Siswa-sudah-berkelas';
$route['Humas'] = 'Humas';
$route['Humas/dudi-prakerin'] = 'Humas/Dudi_prakerin';
$route['Perpustakaan'] = 'Perpustakaan';
$route['e-book'] = 'Perpustakaan/e_book';


// API URI's
$route['api-perpus/(:any)'] = 'API/Api_perpus/$1';
$route['api-rpp/(:any)'] = 'API/Api_rpp/$1';
$route['api-silabus/(:any)'] = 'API/Api_silabus/$1';
$route['api-jadwal/(:any)'] = 'API/Api_jadwal/$1';
