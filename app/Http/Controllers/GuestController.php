<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use App\Models\CRUD_DB;

class GuestController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    /*
     * METHOD THAT LISTS MILITANTES
     */
    public function listGuest(Request $request)
    {
        $militantes = [
            'id'         => '1',
            'name'       => 'Marcos Mbanza',
            'email'      => 'marcos@marcos.com',
            'fone'       => '+244943738336',
            'created_at' => date('d-m-Y')
            
        ];
        
        return view('clients',[
            'usuarios'=>$militantes,
            'person'=>$request->session()->get('person'),
            'rule'=>$request->session()->get('rule'),
            'name'=>$request->session()->get('name'),
            'pass'=>$request->session()->get('pass')
            ]
        );
    }
    /*
     * METHOD THAT ADD MILITANTES
     */
    public function addGuest(Request $request)
    {
        if(empty($request->name) || empty($request->birth) || empty($request->grau) || empty($request->phone))
        {
            return redirect('militantes')->with('isempty', 'Os campos não podem estar vazios!');
        }
        else
        {
        
            $guest = [
                'name' => $request->name,
                'birth' => $request->birth,
                'grau'  => $request->grau,
                'grole' => '',
                'created_at' => date('Y-m-d')

            ];
            
            $insert = new CRUD_DB();
            $name = $insert->getRowGuest('t_guest', $request->name);
            
            if($name == true)
            {
                return redirect('militantes')->with('isuser', 'Já existe um militante com esse nome!');

            }
            else
            { 
                $lastId = $insert->setRowToMany('t_guest', $guest);
                $insert->setRow('t_adress', ['city'=>'','adress'=>'','email'=>'','phone'=>$request->phone,'guestid'=>$lastId,'created_at'=>date('Y-m-d')]);
                $insert->setRow('t_cotas', ['cota'=>'','de'=>'','para'=>'','guestid'=>$lastId,'created_at'=>date('Y-m-d')]);
                return redirect('militantes')->with('nuser', 'Militante cadastrado com sucesso!');

            }
        }
    }
    /*
     * METHOD THAT UPDATE MILITANTES
     */
    public function updateGuest(Request $request)
    {
        $militantes = [
            'id'         => '1',
            'name'       => 'Marcos Mbanza',
            'email'      => 'marcos@marcos.com',
            'fone'       => '+244943738336',
            'created_at' => date('d-m-Y')
            
        ];
        
        return view('clients',[
            'usuarios'=>$militantes,
            'person'=>$request->session()->get('person'),
            'rule'=>$request->session()->get('rule'),
            'name'=>$request->session()->get('name'),
            'pass'=>$request->session()->get('pass')
            ]
        );
    }
    
}