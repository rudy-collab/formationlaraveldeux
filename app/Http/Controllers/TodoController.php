<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\CreateTask;
use App\Http\Requests\LoginLogin;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class TodoController extends Controller
{
    //

    public function index(){

        $name='Thierry';

        return view('todolist', compact('name'));
    }

    public function register(){

        return view('register');
    }

    public function registerAll(LoginRequest $request){

       

        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=> Hash::make($request->password)
        ]);
        $credentials = $request->validated();
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->route('index');
           }else{
            return redirect()->route('register')->with('error','Donnees invalides');
           }
    }

    public function logins(){

        return view('logins');
    }

    public function loginAll(LoginLogin $request){


$credentials = $request->validated();

       if(Auth::attempt($credentials)){
        $request->session()->regenerate();
        return redirect()->route('index');
       }else{
        return redirect()->route('register')->with('error','Donnees invalides');
       }
     
       
 
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('index');

    }

    public function listtodo(){

        $listTodo = Task::where('user_id',Auth::user()->id)->orderBy('id','desc')->paginate(2);

        return view('listtodo', compact('listTodo'));
    }

    public function createTask(CreateTask $request){

        Task::create([
            'name'=> $request->titre,
            'description'=>$request->description,
            'user_id'=> Auth::user()->id
        ]);

        return redirect()->route('listtodo')->with('success','Tache crée avec success');
        
    }

    public function updateTask($id){

        $task = Task::find($id);

        return view('updateTask',compact('task'));
    }

    public function updateTaskAll(Request $request, $id){

     

        $taskId = Task::find($id);

        $taskId->update([
            'name'=> $request->titre,
            'description'=>$request->description,
            'user_id'=>Auth::user()->id
        ]);
        return redirect()->route('listtodo')->with('success','Donnée(s) modifiée(s) avec success...');
    }

    public function deleteTask($id){

     

        $taskId = Task::find($id);

        $taskId->delete();
        return redirect()->route('listtodo')->with('success','Donnée(s) supprimée(s) avec success...');
    }
}
