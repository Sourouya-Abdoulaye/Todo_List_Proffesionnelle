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
            return view('admin.index');
        }

        return redirect('/');
        
    }

    public function tasks() {
        if (isset(Auth::user()->role) && Auth::user()->role == 'admin') {
            $contenu=Task::all()->where('id',Auth::user()->id);
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


}
