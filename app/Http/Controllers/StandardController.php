<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Standard;
use App\Historique;

class StandardController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
public function updateStandard(Standard $standard)
    {
        return view('modification.standards',compact('standard'));
    }
    public function update(Standard $standard,Request $request)
    {
        $this->validate( request(),[
            'securite'=>'required',
            'confort'=>'required',
           'esthetique'=>'required',
            'fonctoinnalite' =>'required'
        ]);
        $information='Standard: Globale'."<br>";
        $historique = Historique::create([

'actoin' => 'Modification',
'table' => 'Standards',
'information' => $information,
'user_id' =>$request->user()->id,
'user_name' =>$request->user()->name
    ]);
        
        
           $standard->update([
         'securite' => request('securite'),
        'confort' => request('confort'),
        'esthetique' => request('esthetique'),
             'fonctoinnalite' => request('fonctoinnalite')
]);
          session()->flash('message','Standards Modifier'); 
       return redirect()->action('UsersController@NoStandards'); 
    }
}
