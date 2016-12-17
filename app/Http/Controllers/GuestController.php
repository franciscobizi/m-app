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
     * @METHOD THAT LISTS MILITANTES
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
    
    
}
