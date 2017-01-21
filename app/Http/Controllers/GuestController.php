<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use App\Models\CRUD_DB;
use App\Models\T_guest;
use App\Models\Model;

class GuestController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    /*
     * METHOD THAT LISTS MILITANTES
     */
    public function listGuest(Request $request)
    {
        $comments = new CRUD_DB();
        $militantes = $comments->getHasMany('t_guests','t_adresses');
        $comments->getPush('t_events',10);
        
        return view('clients',[
            'guests'=>$militantes,
            'person'=>$request->session()->get('person'),
            'rule'=>$request->session()->get('rule'),
            'name'=>$request->session()->get('name'),
            'noth' => $request->session()->get('noth'),
            'pass'=>$request->session()->get('pass'),
            'listN'=> $comments->notification
            ]
        );
    }
    /*
     * METHOD THAT ADD MILITANTES
     */
    public function addGuest(Request $request)
    {
        if(empty($request->nome) || empty($request->birth) || empty($request->grau) || empty($request->phone) || empty($request->morada) || empty($request->cidade) || empty($request->mail) || empty($request->func))
        {
            return redirect('militantes')->with('isempty', 'Os campos não podem estar vazios!');
        }
        else
        {
        
            $guest = [
                'name' => $request->nome,
                'birth' => $request->birth,
                'grau'  => $request->grau,
                'grole' => $request->func,
                'created_at' => date('Y-m-d')

            ];
            $guest = array_map('strip_tags', $guest);
            $guest = array_map('trim', $guest);
            $nome = strip_tags($request->nome);
            $nome = trim($nome);
            
            $insert = new CRUD_DB();
            $name = $insert->getRowGuest('t_guests', $nome);
            
            if($name == true)
            {
                return redirect('militantes')->with('isuser', 'Já existe um militante com esse nome!');
}
            else
            { 
                $lastId = $insert->setRowToMany('t_guests', $guest);
                $insert->setRow('t_adresses', ['city'=>$request->cidade,'adress'=>$request->morada,'email'=>$request->mail,'phone'=>$request->phone,'guestid'=>$lastId,'created_at'=>date('Y-m-d')]);
                return redirect('militantes')->with('nuser', 'Militante cadastrado com sucesso!');
            }
        }
    }
    /*
     * METHOD THAT UPDATE MILITANTES
     */
    public function updateGuest(Request $request)
    {
        if(empty($request->nome) || empty($request->birth) || empty($request->grau) || empty($request->phone) || empty($request->morada) || empty($request->cidade) || empty($request->mail) || empty($request->func))
        {
            return redirect('militantes')->with('isempty', 'Os campos não podem estar vazios!');
        }
        else
        {
        
            $guest = [
                'name' => $request->nome,
                'birth' => $request->birth,
                'grau'  => $request->grau,
                'grole' => $request->func,
                'created_at' => date('Y-m-d')

            ];
            
            $adress =  [
                'city'=>$request->cidade,
                'adress'=>$request->morada,
                'email'=>$request->mail,
                'phone'=>$request->phone,
                'guestid'=>$lastId,
                'created_at'=>date('Y-m-d')
            ];
            
            $guest = array_map('strip_tags', $guest);
            $guest = array_map('trim', $guest);
            
            $lastId = $insert->upd('t_guests', $guest);
            $insert->setRow('t_adresses', $adress);
            return redirect('militantes')->with('nuser', 'Militante cadastrado com sucesso!');
            
        } 
    }
    /*
     * METHOD TO REMOVE MILITANTES FROM THE SYSTEM
     */
    public function removeGuest(Request $request)
    {
        $remove = new CRUD_DB();
        $remove->removeRow('t_guests','id', $request->gid);
        $remove->removeRow('t_adresses','guestid', $request->gid);
        
        return redirect('militantes')->with('duser', 'Militante deletado com sucesso!');
        
    }
    /*
     * METHOD TO SEARCH A MILITANTE FROM THE TABLE
     */
    public function searchGuest(Request $request)
    {
        $criteria = $request->search;
        $guest = new CRUD_DB();
        $guest->getPush('t_events',10);
        $tab = ['t_guests','t_adresses'];
        $rows = $guest->getRelation($tab,"WHERE t1.id = t2.guestid AND t2.phone = {$criteria} ",""
                . "t1.id, t1.name, t1.status, t1.created_at, t1.grau, t1.grole, t1.birth, t2.phone, t2.email, t2.city, t2.adress, t2.guestid");
        
        return view('clients',[
            'buscar' => $rows,
            'person'=>$request->session()->get('person'),
            'rule'=>$request->session()->get('rule'),
            'name'=>$request->session()->get('name'),
            'noth' => $request->session()->get('noth'),
            'pass'=>$request->session()->get('pass'),
            'listN'=> $guest->notification
            ]);
        /*if($rows == false)
        {
            //dd("Ta no falso");
            return redirect('militantes')->with(['search' => $rows ]);
        }
        else
        {
            //dd("Ta no True");   
            return redirect('militantes')->with(['search' => $rows ]);
        }*/
        
        
    }
    
}