<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;

class TodoController extends Controller{
    //
    public function create(Request $request) {
        $todo = new Todo;

        $todo->name = $request->name;
        $todo->description = $request->description;

        $todo->save();

        return redirect('/todos');

    }
    public function showAll(){
        $todos = Todo::all();
        $data['todos'] = $todos;
        return view('todos.index', $data);

    }
     
    public function delete(Request $request){
        $todo = Todo:: find($request->id);
        // dd($request->id);
        $todo->delete();
        return redirect('/todos');
    }
  
    public function edit(Request $request){
        
        $todo = Todo::find($request->id);
        $todo->name= $request->name;
        $todo->description= $request->description;
        $todo->save();

        return redirect('/todos');
    }


}
