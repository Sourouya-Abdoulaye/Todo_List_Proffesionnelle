<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Psy\Util\Str;



class ValidateTaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        //comme je pas encore fait system d'auth donc je met true
        //qui a l'autoristion
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        // $validation=validator([
        //     'nom'=>'Az',
        //     'age'=>19

        // ],[
        //     'nom'=>['required','min:3'],
        //     'age'=>'integer|required|min:18|max:55'
        // ],[
        //     'nom.required'=>'votre champs est requise',
        //     'nom.min'=>'la taille doit etre superieur a 3'
        // ]);

       
       // dd($validation->validated());
        //dd($request->validated());
        return [
            'title'=>['required','min:3',Rule::unique('tasks')->ignore($this->id)],
            'status'=>'in:0,1',
            'id_user'=>'require'
            // route()->parameter('post')
            // 'age'=>'integer|required|min:18|max:55',
            // 'pre'=>'required'
        ];[
            'title.required'=>'votre champs est requise',
            'title.min'=>'la taille doit etre superieur a 3'
        ];
    }


    //qui permet d'ajouter une valeur a une variable en cas de l'inexistance
    // protected function ajouter_si_n_existe_pas() {
    //     $this->merge([
    //         'pre'=> 'koffi'
    //     ]);
    // }
}

