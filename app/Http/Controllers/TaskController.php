<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidateTaskRequest;
use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TaskController extends Controller
{
    public function index(/*Validate_task $request*/)
    {
        //echo "<h1>List Task</h1>";
        // pour afficher chaque user ces taches specifique
        // User::create([
        //     'name' => 'sourouya',
        //     'email' => 'sourouya@gmail.com',
        //     'role'=>'admin',
        //     'password'=>Hash::make('sourouya')
        // ]);

        // dd(Auth::user()->id);
        if (isset(Auth::user()->id)) {
            $contenu=Task::All()->where('id_user','=',Auth::user()->id);
        } else {
            $contenu=[];
        }
       
        $title="listes de taches";
        // dump(Auth::user());
        return  view('tasks.index',compact('contenu','title'));

        

    }


    public function search(Request $request)
{
        $query = $request->get('query');

        // Recherche par titre
       
        if (isset(Auth::user()->id)) {
           $tasks = \App\Models\Task::where('title', 'like', "%{$query}%")
                                        ->where('id_user', Auth::user()->id)
                                        ->get();

            return response()->json($tasks);
        } 
        
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $title='Ajouter une tache';
        return  view('tasks.create',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
        //
        //   echo "<h1>create Task </h1>";
        // $tache= new Task();
        // $tache->title=$name;
        // $tache->status= ($status==1) ? true:false;
        // $tache->save();
        // return to_route('liste_task');
    // }

    public function store(ValidateTaskRequest $a_valide)
{
    // echo "enregistrer";
    // dd($request);
    // $valide=$request->validate([
    //     'title' => 'required|min:3',
    //     'status' => 'required'
    // ]);

   
    // dd($a_valide);
    $valide=$a_valide->validated();
    // dd($valide);
    // dd(Session()->all());
    if (count($valide)==2) {
       
       
        // dd($valide);
        // Task::create([
        //     'title'=>$request->title,
        //     'status'=> (int) $request->status
        // ]);
        $valide['id_user']=Auth::user()->id;
        // dd($valide);
        Task::create($valide);
        return redirect()->route('liste.task')
                        ->with('success', 'Tache créé !');

    }

    return redirect()->back()->with('erros','creation echouer');
}

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        //
        //echo "<h1>show Task $id</h1>";
        $contenu=task::findOrfail($id);
        $title="Detail de l'article $id";
        return  view('tasks.detail',compact('contenu','title'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        //echo "<h1>update Task </h1>";
      // dd($id);
        $task=Task::findOrfail($id);
        // dd($task);
        $title='update Task';
        return view('tasks.edit',compact('title','task'));
        
       
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ValidateTaskRequest $request)
    {
        //
         // $contenu=Task::findOrfail($id);
        // $contenu->title=$name;
        // $contenu->save();

        //     $valide=$request->validate([
        //     'title' => 'required',
        //     'status' => 'required'
        // ]);

        // dd($request->id);
        $valide=$request->validated();



       // dd($valide);
         //dd($valide);
        if (count($valide)==2) {
            DB::table("tasks")->where('id',$request->id)->update($valide);



            // Task::update($valide);
            return redirect()->route('liste.task')
                            ->with('success', 'Mise a jours avec succèe !');

        }


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        echo "<h1>delete $id</h1>";
        $contenu=Task::findOrfail($id);
        $contenu->delete();
        return to_route('liste.task');
    }
}
