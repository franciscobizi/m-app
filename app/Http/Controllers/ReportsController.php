<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use App\Models\CRUD_DB;

class ReportsController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    
    /*
     * METHOD THAT LISTS EVENTS
     */
    public function listReports(Request $request)
    {
        $num = new CRUD_DB();
        $users = $num->countRows('t_users');
        $events = $num->countRows('t_events');
        $guest = $num->countRows('t_guest');
        $reports = [
          'users'=>$users,
          'events'=>$events,
          'guest'=>$guest
        ];
        
        return view('reports',[
            'reports'=>$reports,
            'person'=>$request->session()->get('person'),
            'rule'=>$request->session()->get('rule'),
            'name'=>$request->session()->get('name'),
            'pass'=>$request->session()->get('pass')
        ]);
        
    }
}
