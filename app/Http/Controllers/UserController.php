<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use App\Models\USer;
use App\Models\CRUD_DB;

class UserController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    /*
     * /METHOD TO CREATE NEW USER
     */
    public function addUser(Request $request)
    {
        
        if(empty($request->mail) || empty($request->pass) || empty($request->funcao) || empty($request->nome))
        {
            return redirect('usuarios')->with('isempty', 'Os campos não podem estar vazios!');
        }
        else
        {
            $new_user  = new USer();
            $pssw = password_hash($request->pass, PASSWORD_BCRYPT, ['cost' => '12']);
            $result = $new_user->newUser('t_users', [ 
                'name' => $request->nome,
                'email' => $request->mail,
                'pass' => $pssw,
                'roles' => $request->funcao
                 ]
             );

            if(!empty($result))
            {
                return redirect('usuarios')->with('nuser', 'Usuário cadastrado com sucesso!');

            }
            else
            {    
                return redirect('usuarios')->with('isuser', 'Usuário já cadastrado. Tente com outro nome de usuário!');

            }
        }
    }
    /*
     * METHOD THAT LISTS USERS
     */
    public function listUsers(Request $request)
    {
        $u = new CRUD_DB();
        $field = $u->getRows('t_users');
        
        return view('users',[
            'usuario'=>$field,
            'person'=>$request->session()->get('person'),
            'rule'=>$request->session()->get('rule'),
            'name'=>$request->session()->get('name'),
            'pass'=>$request->session()->get('pass')
            ]
        );
    }
}
