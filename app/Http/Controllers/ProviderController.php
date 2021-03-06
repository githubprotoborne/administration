<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $providers =DB::table('providers')
        ->get();
        return  view('provider/afficher',['providers'=>$providers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeForm(Request $request)
    {
        //
        return view('provider/creer');
    }
    
    public function store(Request $request)
    {
        //
        $accueil=$request->accueil!==null?$request->accueil:"";
        $horaires=$request->horaires!==null?$request->horaires:"";
        DB::table('providers')
        ->Insert(['provider_proposed_by'=>$request->nom,'provider_service'=>$request->service,'provider_phone'=>$request->phone,'provider_phone_timetable'=>$horaires,'provider_postal_address'=>$request->adresse,'provider_postal_address_timetable'=>$accueil,'provider_postal_address_timetable_rdv'=>$request->rdv,'provider_write_online'=>$request->url]);
        $providers =DB::table('providers')
        ->get();
        return  view('provider/afficher',['providers'=>$providers]);
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
        $providers =DB::table('providers')
        ->where('provider_id',$id)
        ->get();
        return view('provider/displayOne',['provider'=>$providers[0]]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
        $accueil=$request->accueil!==null?$request->accueil:"";
        $horaires=$request->horaires!==null?$request->horaires:"";

        DB::table('providers')
        ->where('provider_id', $id)  
    
        ->update(['provider_proposed_by'=>$request->nom,'provider_service'=>$request->service,'provider_phone'=>$request->phone,'provider_phone_timetable'=>$horaires,'provider_postal_address'=>$request->adresse,'provider_postal_address_timetable'=>$accueil,'provider_postal_address_timetable_rdv'=>$request->rdv,'provider_write_online'=>$request->url]);  // update the record in the DB. 
        $providers =DB::table('providers')
        ->get();
        return  view('provider/afficher',['providers'=>$providers]);
        
    }
    public function updateForm($id,$name)
    {
        //
        $providers =DB::table('providers')
        ->where('provider_id',$id)
        ->get();
        return view('provider/modifier',['provider'=>$providers[0]]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
