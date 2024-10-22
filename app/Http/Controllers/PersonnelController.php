<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Personnel;
use App\Rules\UniqueEmail;
use App\Models\Departement;
use Illuminate\Http\Request;
use App\Models\DepartementGenerale;
use App\Models\DepartementSpeciale;
use Illuminate\Support\Facades\Auth;

class PersonnelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $personnels = Personnel::all();
        $services = Service::all();

        return view ('staff.staff',([
         'name' => $user->name,
        'prenom' => $user->prenom,
        'role' => $user->role,
        'departement' => $user->departement,
        'services'=>$services,
        'personnels'=>$personnels,
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
        $departementGenerale = DepartementGenerale::all();
        $departementSpeciale = DepartementSpeciale::all();

        $departements = array_merge($departementGenerale->toArray(),$departementSpeciale->toArray());

        return view('staff.add-staff',[
        'name' => $user->name,
        'prenom' => $user->prenom,
        'role' => $user->role,
        'departement' => $user->departement,
        'departements' =>$departements,
        ]);
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

        $request ->validate([
        'nom' => ['string','required'],
        'prenom'=> ['string','required'],
        'birthdate'=> ['string','required'],
        'qualification'=> ['string','required'],
        'ville'=> ['string','required'],
        'email'=> ['required', 'email', new UniqueEmail],
        'adresse'=> ['string','required'],
        'service_id'=> ['string','nullable'],
        'departement_id'=> ['string','nullable'],
        'telephone'=> ['string','required'],
        'departement'=> ['string','required'],
        'sexe'=> ['string','required'],
        ]);

        //dd($request->all());
        Personnel::create($request->all());

        return redirect()->back()->with('PersonnalAdded', 'Informations sauvegardées avec succès');
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