<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;

class UserController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function showReset()
    {
        return view('reset');
    }
    
    public function loGOut(Request $request)
    {
        $request->session()->forget('person');
        return redirect('/');
    }
    public function profile(Request $request)
    {
        $person = $request->session()->get('person');
        $rule = $request->session()->get('rule');
        return view('home',['person'=>$person,'rule'=>$rule]);
    }

    public function auth(Request $request)
    {
        
        $email = $request->mail;
        $pass = $request->pass;
        if($email == '' || $pass == '')
        {
            return view('welcome',['empty'=>'Os campos não podem estar vazios!']);
            
        }
        elseif($email != 'admin@admin.com' || $pass != '1111')
        {
            
            return view('welcome',['notfound'=>'O dados inseridos não estão cadastrados!']);
        }
        else
        {
            
            
            $request->session()->put('person', 'Admin');
            $request->session()->put('rule', 'Admin');
            return redirect('/home');
        }
    
    }
    
    public function resetPass(Request $request)
    {
        $email = $request->mail;
        
        if($email == '')
        {
            return view('reset',['empty'=>'O campo não pode estar vazio!']);
            //$data = ['field'=>'empty','msg'=>'O campo não pode estar vazio!'];
            //echo json_encode($data);
            //return Response::json($data);
        }
        elseif($email == 'admin@admin.com')
        {
            
            return view('reset',['ok'=>'Recuperado com sucesso! Vá ao seu email e siga as instruções.']);
        }
        else
        {
           return view('reset',['notfound'=>'O e-mail inserido não está cadastrado!']); 
        }
        
             
    }
}
