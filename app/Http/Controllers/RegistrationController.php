<?php

namespace App\Http\Controllers;
use App\User;
use App\Historique;

use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    
   public function create()
    {
        return view('creation.user');
    }
    public function store(Request $request)
    {
       
         $this->validate( request(),[
            'name'=>'required|max:255',
            'email'=>'required|max:255|unique:users|email',
            'password'=>'required|confirmed|min:8',
             'type'=>'required'
            
        ]);
    $user = User::create([

'name' => request('name'),
'email' => request('email'),
'password' => \Hash::make(request('password')),
'type' =>request('type'),
  'droits' =>''  
    ]);
        $information='Nom: '.$user->name."</br>".' Email: '.$user->email."</br>".' Type: '.$user->type;
        $historique = Historique::create([

'actoin' => 'Insertion',
'table' => 'Utilisateur',
'information' => $information,
'user_id' =>$request->user()->id,
'user_name' =>$request->user()->name
    ]);
        
        session()->flash('message','Utlisateur Créer!');
        
  return redirect()->action('UsersController@users');        
      
      
        
    }
    
    
    
    
    
}
