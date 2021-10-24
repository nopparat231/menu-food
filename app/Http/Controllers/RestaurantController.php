<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $res = DB::table('restaurants')
            ->select('*')->where('user_id', '=', Auth::user()->id)->limit(1)->get();

        if ($res->isEmpty()) {
            return view("restaurant/addRestaurant")->with(['res' => $res]);
        } else {
            return view("restaurant/addRestaurant")->with(['res' => $res]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$restaurant_name = $request->input('restaurant_name');

        $restaurant = Restaurant::create($request->all());

        return redirect('/')->with('completed', 'Restaurant created!');
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
