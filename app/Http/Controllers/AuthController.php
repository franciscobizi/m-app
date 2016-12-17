<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use App\Models\USer;

class AuthController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    /*
     * /METHOD TO ALLOW RESET PAGE
     */
    public function resetPage()
    {
        return view('reset');
    }
    /*
     * /METHOD TO LOGOUT FROM SYSTEM
     */
    public function logOut(Request $request)
    {
        $request->session()->forget('person');
        return redirect('/');
    }
    /*
     * /METHOD TO ALLOW USER PROFILE
     */
    public function userAcount(Request $request)
    {
        $person = $request->session()->get('person');
        $rule = $request->session()->get('rule');
        $name = $request->session()->get('name');
        $pass = $request->session()->get('pass');
        $id = $request->session()->get('id');
        return view('home',['person'=>$person,'rule'=>$rule,'name'=>$name,'pass'=>$pass,'id'=>$id]);
    }
    /*
     * /METHOD TO AUTHENTICATION
     */
    public function auth(Request $request)
    {
        
        $users = new USer();
        $user = $users->getEmail('t_users', $request->mail);
        
        if(empty($request->mail) || empty($request->pass))
        {
            return redirect('/')->with('isempty', 'Os campos não podem estar vazios!');
            
        }
        elseif($user == null)
        {
            return redirect('/')->with('noauth', 'Usuário não autorizado!');
        }
        elseif(password_verify($request->pass,$user->pass))
        { 
            $request->session()->put('person', $user->email);
            $request->session()->put('rule', $user->roles);
            $request->session()->put('name', $user->name);
            $request->session()->put('pass', $user->pass);
            $request->session()->put('id', $user->id);
            return redirect('home');
        }
        else
        {
            return redirect('/')->with('noauth', 'Usuário não autorizado!');
        }
    
    } 
    /*
     * /METHOD TO RESET PASSWORD
     */
    public function resetPass(Request $request)
    {
        $users = new USer();
        $user = $users->getEmail('t_users', $request->mail);
        if(empty($request->mail))
        {
            return redirect('reset')->with('isempty', 'O campo não pode estar vazio!');
        }
        elseif($user == null)
        {
            return redirect('reset')->with('noauth', 'Usuário não reconhecido!'); 
        }
        else
        {
            return redirect('reset')->with('auth', 'Senha recuperada. Vá ao seu e-mail e siga as instruções!');
        }
           
    }
}
