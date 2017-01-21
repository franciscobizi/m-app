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
        $num->getPush('t_events',10);
        
        $r_user_d = $num->getRowsByDate('t_users',0);
        $r_user_s = $num->getRowsByDate('t_users',7);
        $r_user_m = $num->getRowsByDate('t_users',30);
        $r_user_a = $num->getRowsByDate('t_users',365);
        $users_r = [
            'd' => $r_user_d,
            's' => $r_user_s,
            'm' => $r_user_m,
            'a' => $r_user_a
        ];
        $r_event_d = $num->getRowsByDate('t_events',0);
        $r_event_s = $num->getRowsByDate('t_events',7);
        $r_event_m = $num->getRowsByDate('t_events',30);
        $r_event_a = $num->getRowsByDate('t_events',365);
        $event_r = [
            'd' => $r_event_d,
            's' => $r_event_s,
            'm' => $r_event_m,
            'a' => $r_event_a
        ];
        
        $r_guest_d = $num->getRowsByDate('t_guests',0);
        $r_guest_s = $num->getRowsByDate('t_guests',7);
        $r_guest_m = $num->getRowsByDate('t_guests',30);
        $r_guest_a = $num->getRowsByDate('t_guests',365);
        
        $guest_r = [
            'd' => $r_guest_d,
            's' => $r_guest_s,
            'm' => $r_guest_m,
            'a' => $r_guest_a
        ];
        
        return view('reports',[
            'users_r' => $users_r,
            'event_r' => $event_r,
            'guest_r' => $guest_r,
            'person' => $request->session()->get('person'),
            'rule' => $request->session()->get('rule'),
            'name' => $request->session()->get('name'),
            'noth' => $request->session()->get('noth'),
            'pass' => $request->session()->get('pass'),
            'listN'=> $num->notification
        ]);
        
    }
}
