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

        return redirect()->route('index')->with('success','Utilisateur crée avec success...');
    }

    public function logins(){

      

        return view('logins');
    }

    public function loginAll(LoginLogin $request){

        $validate = $request->validate([
            'email'=>['required','email'],
            'password'=>['required']
        ]);

$credentials = $request->validated();
$email = $request->email;
$password = $request->password;


       
       if(Auth::attempt($credentials)){
        $request->session()->regenerate();
        return redirect()->route('index');
       }else{
        return redirect()->route('logins')->with('error','Donnees invalides');
       }
     
       
 
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('index');

    }

    public function listtodo(){

        $listTodo = Task::where('user_id',Auth::user()->id)->get();

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
}
