<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user =  Auth::user();
        $services = Service::all();
        //$user = User::find(5);
        //dd($user->name, $user->prenom);
        //dd($services);
        return view('Service.services-list',([
        'name' => $user->name,
        'prenom' => $user->prenom,
        'role' => $user->role,
        'departement' => $user->departement,
        'services'=>$services,

        ]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();

        $users = User::all();
        return view('service.add-service',([
        'name' => $user->name,
        'prenom' => $user->prenom,
        'role' => $user->role,
        'departement' => $user->departement,
         'users' =>$users,
        ]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $user = User::all();
        $request -> validate([
            'code_serve' => ['string', 'required','max:255'],
            'libelle'=>['string','required'],
            'email'=>['string','email','required'],
            'telephone'=>['string','required'],
            'room_number'=>['integer','required'],
            'status'=>['string','required'],
            'specialite' =>['string','required'],
            'chief_service_id' => 'nullable|exists:users,id',

        ]);

    //dd($request->all());
     Service::create($request->all());



        return redirect()->back()->with('ServiceCreated','Le service a été crée avec succès');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        $user = Auth ::user();

        $users = User::all();
        return view('service.edit-service',[
           'name' => $user->name,
            'prenom' => $user->prenom,
            'role' => $user->role,
            'departement' => $user->departement,
            'service'=>$service,
            'users' =>$users,
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
          $user = Auth::user();
            $user = User::all();
             $request -> validate([
            'code_serve' => ['string', 'required','max:255'],
            'libelle'=>['string','required'],
            'email'=>['string','email','required'],
            'telephone'=>['string','required'],
            'room_number'=>['string','required'],
            'status'=>['string','required'],
            'specialite'=>['string','required'],
            'chief_service_id' => 'nullable|exists:users,id',

        ]);

        $service->update($request->all());
        //dd($request->all());



    return redirect()->back()->with('ServiceUpdated','Informations mises à jour avec succès');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        $service->delete();

        return redirect()->back()->with('ServiceDeleted', 'Les informations du services ont été supprimées avec succès');
    }
}