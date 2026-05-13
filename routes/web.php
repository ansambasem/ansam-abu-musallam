<?php

use Illuminate\Support\Facades\Route;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\Factory;

Route::get('/', function () {
    return view('welcome');
});

Route::get(uri: '/about' , action: function(): Factory|View{
$name ='ansam';

$departments =[
'01' =>'Tichnical',
'2' => 'financial',
'3' => 'Sales'

];
     //return view( 'about' , ['name' => $name]);
    //return view( view:'about')->with( key: 'name', value : $name);
    return view( view:'about' , data: compact('name' , 'departments'));

});
Route::post(uri: '/about' , action: function(): Factory|View{

$name =$_POST['name'];
$departments =[
'01' =>'Tichnical',
'2' => 'financial',
'3' => 'Sales'

];
  return view( view:'about' , data: compact('name'));

 //return view( view:'about');

});

