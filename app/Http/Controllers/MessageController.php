<?php

namespace App\Http\Controllers;
use Mail;
use App\Message;
use Illuminate\Http\Request;

use App\User;
use App\Historique;
use Illuminate\Http\Response;
class MessageController extends Controller
{
    public function PostMessage(Request $request)
    {
    	 $this->validate( request(),[
            'name'=>'required',
            'email1'=>'required|email',
           'subject'=>'required|min:3',
            'msg' =>'required|min:10'
           
        ]);

        $data = array(
            'email1' => $request->email1,
          'name' => $request->name,
      'subject' => $request->subject,
      'msg' => $request->msg

  );
       
    	 Mail::send('emails.contact',$data, function($message) use ($data){
           $message->from($data[ 'email1'],$data[ 'name']);
           $message->to('roufi94.kass@gmail.com');
           $message->subject($data[ 'subject']);
         });
       
         return back()->with('flash_message','Votre message a été envoyer');

    }
	public function PostMessage2(Request $request)
    {
    	 $this->validate( request(),[
            'name'=>'required',
            'email'=>'required|email',
           'a_file'=>'required|mimes:txt,pdf,ppt,docx,doc,pdf',
            'msg' =>'required|min:10'
           
        ]);

        $data = array(
            'email' => $request->email,
          'name' => $request->name,
      'a_file'=> $request->a_file,
      'msg' => $request->msg

  );
       
    	 Mail::send('emails.carrier',$data, function($message) use ($data){
           $message->from($data['email']);
           $message->to('roufi94.kass@gmail.com');
		 $message->attach($data['a_file']->getRealPath(),array(
		 'as'=>'a_file.'.$data['a_file']->getClientOriginalExtension(),
		 'mime'=>$data['a_file']->getMimeType())
		 );
          
         });
       
         return back()->with('flash_message','Votre message a été envoyer');

    }
    public function newsletter(Request $request)
    {
       $this->validate( request(),[
            
            'email'=>'required|email'
          
        ]);
       $message=new Message;
       $message->email=request('email');
       $message->nom='';
       $message->sujet='';
       $message->description='';
       $message->fichier='';
        $message->type='newsletter';
        $message->save();
         return back()->with('flash_message1','Votre message a été envoyer');

    }

 public function newsletterdelete(Message $message,Request $request)
    {
      
      $information='Email: '.$message->email."<br>";
        $historique = Historique::create([

'actoin' => 'Suppression',
'table' => 'NewsLetter',
'information' => $information,
'user_id' =>$request->user()->id,
'user_name' =>$request->user()->name
    ]);
        $message->delete();
           session()->flash('message','NewsLetter Supprimer!'); 
       return redirect()->action('UsersController@newsletter'); 

    }
    


}
