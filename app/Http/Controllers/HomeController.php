<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function adminHome()
    {
        return view('adminHome');
    }

    public function Select2(Request $request)
    {
                /*
        AJAX request
        */
        $search = $request->search;

        if ($search == '') {
            $restaurants = Restaurant::orderby('restaurant_name', 'asc')->select('id', 'restaurant_name')->limit(5)->get();
        } else {
            $restaurants = Restaurant::orderby('restaurant_name', 'asc')->select('id', 'restaurant_name')->where('restaurant_name', 'like', '%' . $search . '%')->limit(5)->get();
        }

        $response = array();
        foreach ($restaurants as $restaurant) {
            $response[] = array(
                "id" => $restaurant->id,
                "text" => $restaurant->restaurant_name
            );
        }

        echo json_encode($response);
        exit;
    }
}
