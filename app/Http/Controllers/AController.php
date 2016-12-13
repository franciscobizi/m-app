<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use App\Models\CRUD_DB;

class AController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    /*
     * METHOD THAT LISTS USERS
     */
    public function AUsers(Request $request)
    {
        $u = new CRUD_DB();
        $field = $u->select_all('t_users');
        
        return view('users',[
            'usuario'=>$field,
            'person'=>$request->session()->get('person'),
            'rule'=>$request->session()->get('rule'),
            'name'=>$request->session()->get('name'),
            'pass'=>$request->session()->get('pass')
            ]
        );
    }
    /*
     * METHOD THAT LISTS MILITANTES
     */
    public function AClients(Request $request)
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
     * METHOD THAT SEARCH MILITANTE
     */
    public function MSearch(Request $request)
    {
        $militantes = [
            'id'         => '1',
            'name'       => 'Marcos Mbanza',
            'email'      => 'marcos@marcos.com',
            'fone'       => '+244943738336',
            'created_at' => date('d-m-Y')
            
        ];
        $nomilitantes = [
            'id'         => '',
            'name'       => '',
            'email'      => '',
            'fone'       => '',
            'created_at' => ''
            
        ];
        
        if($request->msearch == 'marcos' || $request->msearch == '943738335' || $request->msearch == '7888')
        {
           return view('clients',[
                'usuarios'=>$militantes,
                'person'=>$request->session()->get('person'),
                'rule'=>$request->session()->get('rule'),
                'name'=>$request->session()->get('name'),
                'pass'=>$request->session()->get('pass')
                ]
            );  
        }
        else
        {
           return view('clients',[
                'usuarios'=>$nomilitantes,
                'person'=>$request->session()->get('person'),
                'rule'=>$request->session()->get('rule'),
                'name'=>$request->session()->get('name'),
                'pass'=>$request->session()->get('pass')
                ]
            ); 
        }
        
    }
    /*
     * METHOD THAT LISTS EVENTS
     */
    public function AEvents(Request $request)
    {
        $events = [
            'id'         => '1',
            'desc'       => '7 Congresso do partido',
            'local'      => 'Cabassango',
            'resp'       => 'Felix Kuabi',
            'data' => date('d-m-Y')
            
        ];
        
        return view('events',[
            'events'=>$events,
            'person'=>$request->session()->get('person'),
            'rule'=>$request->session()->get('rule'),
            'name'=>$request->session()->get('name'),
            'pass'=>$request->session()->get('pass')
            ]
        );
    }
    
    
}
