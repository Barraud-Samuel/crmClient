<?php

namespace App\Http\Controllers;

use App\Operation;
use App\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class OperationsController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $operations = Operation::orderBy('created_at', 'desc')->paginate(10);
        $clients = Client::all();
        return view('operations.index')->with('operations',$operations)->with('clients',$clients);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function CLcreate($id)
    {
        $client = Client::pluck('clientName','id');
        return view('operations.CLcreate')->with('clientId',$id)->with('client',$client);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $client = Client::pluck('clientName','id');
        return view('operations.create')->with('client',$client);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'client_id'=>'required',
            'status'=>'required'
        ]);

        //enregistration de l'opetration en bdd
        $operation = new Operation;
        $operation->client_id = $request->input('client_id');
        $operation->url = $request->input('url');
        $operation->lang = $request->input('lang');
        $operation->langSecond = $request->input('langSecond');
        $operation->numberParticipants = $request->input('numberParticipant');
        $operation->status = $request->input('status');
        $operation->loginAdmin = $request->input('loginAdmin');
        $operation->passwordAdmin = $request->input('passwordAdmin');
        $operation->save();

        return redirect('/clients/'.$operation->client_id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $operation = Operation::find($id);
        $client = Client::pluck('clientName','id');
        //return $client;
        return view('operations.edit')->with('operation',$operation)->with('client',$client);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'client_id'=>'required',
            'status'=>'required'
        ]);

        //enregistration de l'opetration en bdd
        $operation = Operation::find($id);
        $operation->client_id = $request->input('client_id');
        $operation->url = $request->input('url');
        $operation->lang = $request->input('lang');
        $operation->langSecond = $request->input('langSecond');
        $operation->numberParticipants = $request->input('numberParticipant');
        $operation->status = $request->input('status');
        $operation->loginAdmin = $request->input('loginAdmin');
        $operation->passwordAdmin = $request->input('passwordAdmin');
        $operation->save();

        return redirect('/clients/'.$operation->client_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $operation = Operation::find($id);
        $operation->delete();
        return redirect(url()->previous())->with('success','Operation supprimé ');
    }
}
