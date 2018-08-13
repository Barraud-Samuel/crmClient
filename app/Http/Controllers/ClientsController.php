<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\ClientUser;
use App\Operation;

class ClientsController extends Controller
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
        //orderby
        //$clients = Client::orderBY('created_at','asc')->get();
        //pagination
        $clients = Client::orderBy('created_at', 'desc')->paginate(10);
        //return $clientUser;
        //$clients = Client::all();
        return view('clients.index')->with('clients',$clients);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clients.create');
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
            'clientName'=>'required',
            'status'=>'required',
        ]);

        //Create client
        $client = new Client;
        $client->clientName = $request->input('clientName');
        $client->clientMail = $request->input('clientMail');
        $client->priority = $request->input('priority');
        $client->status = $request->input('status');
        $client->urlSite = $request->input('urlSite');
        $client->numberParticipants = $request->input('numberParticipants');
        $client->clientComments = $request->input('clientComments');
        $client->country = $request->input('country');
        $client->loginAdmin = $request->input('loginAdmin');
        $client->passwordAdmin = $request->input('passwordAdmin');
        $client->save();

        return redirect('/clients')->with('success', 'Le client à bien été créée');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client = Client::find($id);
        //$clientUsers = ClientUser::orderBy('clientUser_rank','asc')->get();
        $clientUsers = ClientUser::where('clientId',$id)->orderBy('clientUser_rank','asc')->get();
        $clientOperations = Operation::where('client_id', $id)->orderBy('created_at','desc')->get();

        return view('clients.details')->with('client', $client)->with('clientUsers', $clientUsers)->with('clientOperations', $clientOperations);


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = Client::find($id);
        return view('clients.edit')->with('client', $client);
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
            'clientName'=>'required',
            'status'=>'required'
        ]);

        //Create client
        $client = Client::find($id);
        $client->clientName = $request->input('clientName');
        $client->clientMail = $request->input('clientMail');
        $client->priority = $request->input('priority');
        $client->status = $request->input('status');
        $client->urlSite = $request->input('urlSite');
        $client->numberParticipants = $request->input('numberParticipants');
        $client->clientComments = $request->input('clientComments');
        $client->country = $request->input('country');
        $client->loginAdmin = $request->input('loginAdmin');
        $client->passwordAdmin = $request->input('passwordAdmin');
        $client->save();

        return redirect('/clients')->with('success', 'Le client à bien été modifié');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = Client::find($id);
        $client->delete();
        return redirect('/clients')->with('success','Client supprimé ');
    }
}
