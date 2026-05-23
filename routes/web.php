<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

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

Route::get(uri:'tasks' , action: function(): Factory|View{
$tasks =DB::table(table:'tasks')->get();
return view( view:'tasks',data :compact(var_name:'tasks') );


});

Route::post(uri: 'create' , action: function(): Redirector|RedirectResponse{
    $task_name=$_POST['name'];
  DB::table('tasks')->insert(['name' => $task_name]);


return redirect()->back();



});


Route :: post('/delete/{id}',action:function($id): Redirector|RedirectResponse{

DB::table( table:'tasks')->where(column:'id', operator:$id)->delete();



return redirect()->back();
});
Route :: post(uri:'edit/{id}',action:function($id): Factory|View{

 $task = DB::table(table:'tasks')->where(column:'id', operator:$id)->first();
 $tasks = DB::table(table:'tasks')->get();
 return view('tasks', compact('task', 'tasks'));

});
Route::post('update' ,function():Redirector|RedirectResponse{
$id =$_POST['id'];
DB::table('tasks')->where('id' ,'=',$id)->update(['name' => $_POST['name']]);
return redirect(to:'tasks');
});
