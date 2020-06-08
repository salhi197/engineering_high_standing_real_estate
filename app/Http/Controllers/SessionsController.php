<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
class SessionsController extends Controller
{
   
    
     public function create()
    {
        return view('sessions.create');
    }
    
    public function store(Request $req)
    {
    //accepte the authentification of the user
          $remember = $req->get('remember');
        if(!auth()->attempt(['email' => $req->email, 'password' => $req->password], $remember))
        {
            
           
         return back()->withErrors([
             'password'=>'vérifiez votre email ou votre mot de passe',
             'email' => 'vérifiez votre email ou votre mot de passe',
         ]);
        }
        if(Auth::user()->droits=="")
         {return view('dashboard.index');
        }
        else
        {
            return back();
        }
     
    }
      public function destroy()
    {
        
        
       \Auth::logout();
       return view('sessions.create');
        
    }
    
   
}
