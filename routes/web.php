<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return redirect()->route('categoria.index');

});

// Route::get('zadga', function(){
// 	$dep=DB::select('SELECT  nomb,  COUNT(*)
//                     FROM departamento d,  ciudad c
//                     where d.id_dep=c.depa
//                     group by  d.nomb ');
//     return view('categoria.proto',compact('dep'));
// } );
Route::get('categoria','App\Http\Controllers\index@index')->name('categoria.index');

Route::get('login','App\Http\Controllers\registro@viewlogin')->name('login');

Route::get('registro', 'App\Http\Controllers\registro@viewregistro')->name('registro');
Route::post('registrar', 'App\Http\Controllers\registro@store')->name('registrar');
Route::post('iniciar/sistema', 'App\Http\Controllers\loginController@login')->name('iniciar');
Route::get('/superu/{id}', 'App\Http\Controllers\index@user')->name('inicio');
Route::get('/suario/{id}','App\Http\Controllers\index@usuario')->name('inius');
Route::get('home/{$id}', 'App\Http\Controllers\inicio@index')->name('home');
Route::get('/logout', 'App\Http\Controllers\loginController@logout')->name('logout');
Route::get('/informacion/user{id}','App\Http\Controllers\UsrController@info')->name('infoRut');

Route::get('/ususer/{id}','App\Http\Controllers\User@index')->name('iniUs');
Route::get('/empleados/{id}','App\Http\Controllers\Empleados@index')->name('inicioEm');

Route::get('/RegistroUs/{id}','App\Http\Controllers\UsrController@reDisct')->name('register');
Route::get('/formularioAd','App\Http\Controllers\UsrController@form')->name('formulario');
Route::get('/listaUserWold','App\Http\Controllers\UsrController@listU')->name('listUs');
Route::get('/listaUserEmp','App\Http\Controllers\UsrController@listE')->name('list_em');
Route::get('/listaUserAdm','App\Http\Controllers\UsrController@listA')->name('list_ad');
Route::get('/listaUserUs','App\Http\Controllers\UsrController@listUs')->name('list');
Route::get('/usuarios','App\Http\Controllers\UsrController@index')->name('list_us');
Route::post('/usersI', 'App\Http\Controllers\UsrController@insertar')->name('insertar');
Route::post('/usersIsert/{id}', 'App\Http\Controllers\UsrController@insertar2')->name('insertar2');
Route::get('userUser/{id}','App\Http\Controllers\UsrController@editarUs')->name('editaruser');
Route::put('editUs/{id}','App\Http\Controllers\UsrController@editUs')->name('editarUs');
Route::put('editar/user/{id}','App\Http\Controllers\UsrController@editarU')->name('edit');
Route::put('/edit/user/{id}', 'App\Http\Controllers\UsrController@editarPas')->name('editP');

Route::get('/sistemConstrumega/registro_empresa','App\Http\Controllers\contrumega@formureg')->name('regiempre');
Route::get('/sistemConstrumega/lista_empresa','App\Http\Controllers\contrumega@listaempre')->name('empresas');
Route::get('/sistemConstrumega/lista_empleado','App\Http\Controllers\contrumega@emplempresa')->name('empempl');
Route::put('/sistemConstrumega/editar_empleado/{id}','App\Http\Controllers\contrumega@editempre')->name('edit_emp');
Route::get('/sistemConstrumega/visitar_empleado','App\Http\Controllers\contrumega@vistaremp')->name('visitas');
Route::get('/sistemConstrumega/solicitar_visita','App\Http\Controllers\contrumega@solitempre')->name('solitvisita');
Route::post('/sistemConstrumega/registrar_empre','App\Http\Controllers\contrumega@registrarempre')->name('regiEmpre');
Route::post('/sistemConstrumega/editar_empre','App\Http\Controllers\contrumega@editarempre')->name('editempre');
Route::get('/sistemConstrumega/designar_visita','App\Http\Controllers\contrumega@designar')->name('designarV');
Route::post('/sistemConstrumega/designar_insert','App\Http\Controllers\contrumega@insertd')->name('insertdesig');
Route::get('/sistemConstrumega/eliminar','App\Http\Controllers\contrumega@elemp')->name('delemp');
Route::get('/sistemConstrumega/formulariogeneral','App\Http\Controllers\contrumega@formulgen')->name('formugene');
Route::post('/sistemConstrumega/insertgen','App\Http\Controllers\contrumega@intgeneral')->name('insertgen');
Route::get('/sistemConstrumega/regist/{id}','App\Http\Controllers\contrumega@registvis')->name('registvisit');
Route::get('/sistemConstrumega/registrar_visit/{id}','App\Http\Controllers\contrumega@registvisitas')->name('cofirmarv');
Route::get('/sistemConstrumega/prueb','App\Http\Controllers\contrumega@prueba')->name('prueba');
Route::get('/sistemConstrumega/verempresa/{id}','App\Http\Controllers\contrumega@registrarV')->name('verempre');
// Auth::routes();

// Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');

// Route::group(['middleware' => 'auth'], function () {
// 	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
// 	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
// 	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
// 	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
// 	Route::get('{page}', ['as' => 'page.index', 'uses' => 'App\Http\Controllers\PageController@index']);
// });

