<?php

namespace App\Http\Controllers;

use Rules\Password;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect; 
use Session;
use DB;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function UserAuthCheck()
   {
    $user_id=Session::get('user_id');
    if ($user_id) {
        return;
        }
        else 
        {
            return Redirect::to('/')->send();
        }

    }


    public function PharmacieAuthCheck()
   {
       $user_role_id=Session::get('user_role_id');
        if ($user_role_id == 9) {
        return;
        }
        else 
        {
            return Redirect::to('/')->send();
        }
   }

    public function index()
    {   
         $email=Session::get('email');
         $acces=DB::table('users')
                ->where('email',$email)
                ->first();
        $this->UserAuthCheck(); 
        Session::put('user_role_id',$acces->user_role_id); 
        return view ('Accueil.dashboard');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('signup');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
             'password' => Hash::make($request->password),
             'role' => $request->role, // Optionnel, selon la logique d'application
            'departement' => $request->departement, // Option
        ]);


        Auth::login($user);

        return redirect()->back()->with('Compte créé avec succès'); // Modifier selon la route appropriée après l'inscription
    }



    public function all_sales()
    { 

        $this->PharmacieAuthCheck();
        $user_role_id=Session::get('user_role_id');
        $centre_id=Session::get('centre_id');
        $caisse="caisse";


        
        $all_ventes_info=DB::table('tbl_order')      
                   ->join('tbl_order_details','tbl_order_details.order_id','=','tbl_order.order_id')              
                   ->join('tbl_payment','tbl_payment.payment_id','=','tbl_order.payment_id')                   
                   ->join('tbl_guest','tbl_guest.guest_id','=','tbl_order.guest_id')                   
                   ->select('tbl_order.*','tbl_order_details.*','tbl_payment.*','tbl_guest.*')
                   ->where('payment_method','like',$caisse)
                   ->where('tbl_order.id_centre',$centre_id)
                   ->groupBy('tbl_order.order_id')
                   ->orderBy('tbl_order.order_id','DESC')
                   ->get();    
          
    
        return view ('Pharmacie.all_ventes')
        ->with(array('all_ventes_info'=>$all_ventes_info,));

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
    }
    
}