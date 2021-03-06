<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use App\Models\CRUD_DB;

class EventsController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    /*
     * @METHOD THAT ADD EVENT
     */
    public function addEvents(Request $request)
    {
        $addEvent = new CRUD_DB();
        $nE = [
            'description'=> $request->desc,
            'local'=> $request->local,
            'locutor'=> $request->locutor,
            'temp'=> $request->tempo,
            'user_id'=> $request->uid
        ];
        
        $result = $addEvent->setRow('t_events', $nE);
        if(empty($request->desc) || empty($request->local) || empty($request->locutor) || empty($request->uid) || empty($request->tempo))
        {
           return redirect('eventos')->with('isempty', 'Os campos não podem estar vazios!'); 
        }
        elseif($result == TRUE)
        {
           return redirect('eventos')->with('sucess', 'Cadastrado com sucesso!'); 
        }
        else
        {
           return redirect('eventos')->with('nosucess', 'Problemas ao cadastrar. Tente novamente!'); 
        }
        
    }
    /*
     * METHOD THAT LISTS EVENTS
     */
    public function listEvents(Request $request)
    {
        $list = new CRUD_DB();
        $events = $list->getRows('t_events');
        $list->getPush('t_events', 10);
        if($events == false)
        {
            return view('events',[
                'Empty' => '',
                'person' => $request->session()->get('person'),
                'rule' => $request->session()->get('rule'),
                'name' => $request->session()->get('name'),
                'noth' => $request->session()->get('noth'),
                'pass' => $request->session()->get('pass'),
                'listN'=> $list->notification
            ]);
        }
        else
        {
            return view('events',[
                'event' => $events,
                'person' => $request->session()->get('person'),
                'rule' => $request->session()->get('rule'),
                'name' => $request->session()->get('name'),
                'noth' => $request->session()->get('noth'),
                'pass' => $request->session()->get('pass'),
                'listN'=> $list->notification
                ]
            );
        }
    }
    /*
     * METHOD TO REMOVE EVENTS FROM THE SYSTEM
     */
    public function removeEvents(Request $request)
    {
        $remove = new CRUD_DB();
        $remove->removeRow('t_events','id', $request->eid);
        
        return redirect('eventos')->with('dsucess', 'Evento removido com sucesso!');
        
    }
}
