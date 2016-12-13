<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;

class AController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function AUsers(Request $request)
    {
        $users = [
            'id'         => '1',
            'name'       => 'Francisco Bizi',
            'email'      => 'admin@admin.com',
            'fone'       => '+244943738335',
            'created_at' => date('d-m-Y')
            
        ];
        
        $person = $request->session()->get('person');
        $rule = $request->session()->get('rule');
        return view('users',['usuarios'=>$users,'person'=>$person,'rule'=>$rule]);
    }
    
    public function AClients(Request $request)
    {
        $users = [
            'id'         => '1',
            'name'       => 'Marcos Mbanza',
            'email'      => 'marcos@marcos.com',
            'fone'       => '+244943738336',
            'created_at' => date('d-m-Y')
            
        ];
        
        $person = $request->session()->get('person');
        $rule = $request->session()->get('rule');
        return view('clients',['usuarios'=>$users,'person'=>$person,'rule'=>$rule]);
    }
    
    public function MSearch(Request $request)
    {
        $users = [
            'id'         => '1',
            'name'       => 'Marcos Mbanza',
            'email'      => 'marcos@marcos.com',
            'fone'       => '+244943738336',
            'created_at' => date('d-m-Y')
            
        ];
        $usersa = [
            'id'         => '',
            'name'       => '',
            'email'      => '',
            'fone'       => '',
            'created_at' => ''
            
        ];
        
        $search = $request->msearch;
        $person = $request->session()->get('person');
        $rule = $request->session()->get('rule');
        
        if($search == 'marcos' || $search == '943738335' || $search == '7888')
        {
           return view('clients',['usuarios'=>$users,'person'=>$person,'rule'=>$rule,'search'=>'']);  
        }
        else
        {
           return view('clients',['usuarios'=>$usersa,'person'=>$person,'rule'=>$rule,'search'=>'']); 
        }
        
    }
    
    public function AEvents(Request $request)
    {
        $events = [
            'id'         => '1',
            'desc'       => '7 Congresso do partido',
            'local'      => 'Cabassango',
            'resp'       => 'Felix Kuabi',
            'data' => date('d-m-Y')
            
        ];
        
        $person = $request->session()->get('person');
        $rule = $request->session()->get('rule');
        return view('events',['events'=>$events,'person'=>$person,'rule'=>$rule]);
    }
    
    
}
