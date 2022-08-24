<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use App\UserDatail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index() {


        //Utilizzato in caso si vlese bloccare l?utente che non possiede il ruolo di admin
        
        /*if(Auth::user()->role !== "admin"){
            abort(401);
        }*/
    

        $users = User::all();

        return view("admin.users.index", compact("users"));
    }

    public function edit($id) {
        
        //Utilizzato in caso si vlese bloccare l?utente che non possiede il ruolo di admin
        
        /*if(Auth::user()->role !== "admin"){
            abort(401);
        }*/
        $user = User::findOrFail($id);

        return view("admin.users.edit", compact('user'));
    }

    public function update(Request $request, $id){

        //Utilizzato in caso si vlese bloccare l?utente che non possiede il ruolo di admin
        
        /*if(Auth::user()->role !== "admin"){
            abort(401);
        }*/

        $data = $request->all();

        $user = User::findOrFail($id);

        $user->update($data);
        

        // visto che sono dati opzionali l'utente potrebbe non averli inseriti precedentemente
        // perciò devo crearli 
        // lo faccio creando una nuova istanza di UserDatail come si fa con il create
        if(!$user->details) {
            $user->details = new UserDatail();
            
            // inserisco poi la foreign key "user_id"
            $user->details->user_id = $user->id;
            
            $user->details->fill($data);
            $user->details->save();
        }else{
            // poi utilizzo il "update" per riempire i dati
            $user->details->update($data);
        }
        
        // tutto ciò eè posssibile per la funzione hasOne scritta nel model 

        

        $user->update($data);
        
        // dovrò sempre utilizzare $user->details, la parentisi dopo serve per altre cose
        
        return redirect()->route("admin.users.edit", $user->id);
    }
}
