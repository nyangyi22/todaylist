<?php

use App\Http\Controllers\TodoController;
use App\Models\League;
use App\Models\Team;
use App\Models\Todo;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

// Route::get('/', [TodoController::class, 'index']);
// Route::get('/', function () {
//     return view('todos.index', [
//         'todos' =>Todo::all()    
//     ]);
// });
Route::post('/todos', [TodoController::class, 'store'])->name('todos.store');
Route::delete('/todos/{id}', [TodoController::class, 'destroy'])->name('todos.destroy');


Route::get('/leagues/{league:slug}',function(League $league){
    dd($league->teams);
});

// Route::get('/test',function(){
//     DB::listen(function($query){
//         // logger($query->sql,$query->bindings);
//         // Log::info('asdafadf');
//         logger($query->sql);
//     });
// });

Route::get('/', function () {
    return view('teams.team', [
        // 'teams' =>Team::all()
        'teams' =>Team::with('league')->get()//eager loading//lazy loading 
    ]);
});