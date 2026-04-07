<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Routing\Route;

class AdminController extends Controller
{
    //les statistique
    public function index() {
        if (isset(Auth::user()->role) && Auth::user()->role == 'admin') {
            $tasks = Task::orderBy('created_at','desc')->get();
            $users = User::all();
            return view('admin.index', compact('tasks', 'users'));
        }

        return redirect('/');
        
    }

    public function tasks() {
        if (isset(Auth::user()->role) && Auth::user()->role == 'admin') {
            $contenu=Task::all()->where('id_user',Auth::user()->id);
            $title='admin tasks';
            return view('admin.task',compact('contenu','title'));
        }

        return redirect('/');
        
    }



    public function users() {
        if (isset(Auth::user()->role) && Auth::user()->role == 'admin') {
            $users=User::all();
            return view('admin.user',compact('users'));

        }

        return redirect('/');
    }


    public function editUser($id) {
        if (isset(Auth::user()->role) && Auth::user()->role == 'admin') {
            $user=User::findOrFail($id);
            return view('admin.updateForm',compact('user'));

        }

        return route('dashboard');
    }


    public function showUser($id) {
        if (isset(Auth::user()->role) && Auth::user()->role == 'admin') {
            $user=User::findOrFail($id);
            $tasks=Task::all()->where('id_user',$id);
            $title='detail utilisateur';
            return view('admin.showUser',compact('user','title','tasks'));

        }

        return route('dashboard');
    }

    public function updateUser(Request $request,$id) {
        if (isset(Auth::user()->role) && Auth::user()->role == 'admin') {
            $user=User::findOrFail($id);
            $user->name=$request->name;
            $user->email=$request->email;
            $user->role=$request->role;
            $user->save();
            return redirect()->route('admin.users');

        }

        return route('dashboard');
    }


    public function destroyUser($id) {
        if (isset(Auth::user()->role) && Auth::user()->role == 'admin') {
            $user=User::findOrFail($id);
            $user->delete();
            return redirect()->route('admin.users');

        }

        return route('dashboard');
    }


   













}
