<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    public function __construct()
    {
        //$this->middleware('guest');
    }

    public function index()
    {
        $menus =  DB::table('menus')
            ->join('restaurants', 'restaurants.id', '=', 'menus.restaurant_id')
            ->select(
                'menus.id as menu_id',
                'menus.user_id',
                'menus.restaurant_id',
                'menus.menu_name',
                'menus.menu_img',
                'menus.menu_price',
                'menus.menu_detail',
                'restaurant_name'
            )
            ->orderBy('menus.restaurant_id', 'DESC')
            ->get();

        $gmenus =  DB::table('menus')
            ->select('restaurant_id', DB::raw('count(*) as total'))
            ->groupBy('restaurant_id')
            ->get();


        $torders = DB::table('orders')
            ->select('menu_id', DB::raw('count(*) as torder'))
            ->where('orders_status', "=", 2)
            ->groupBy('menu_id')
            ->get();

        return view('welcome')->with(['menus' => $menus])->with(['gmenus' => $gmenus])->with(['torders' => $torders]);
    }

    public function findn(Request $request)
    {
        $findn = DB::table('menus')
            ->select('*')->where('restaurant_name', 'like', '%' . $request . '%')->limit(1)->get();
        return $findn;
    }

    public function create()
    {
        if (Auth::check()) {
            $res = DB::table('restaurants')
                ->select('*')->where('user_id', '=', Auth::user()->id)->limit(1)->get();

            if ($res->isEmpty()) {
                return view("restaurant/addRestaurant")->with(['res' => $res]);
            } else {
                return view('menu.create')->with(['res' => $res]);
            }
        }
    }


    public function store(Request $request)
    {
        request()->validate([
            'user_id' => 'required',
            'restaurant_id' => 'required',
            'menu_name' => 'required',
            'menu_img' => 'required',
            'menu_detail' => 'required',
        ]);


        Menu::create($request->all());
        return redirect()->route('menu.index')
            ->with('success', 'Menu created successfully.');
    }


    public function show(Menu $menu)
    {
        return view('menu.show', compact('menu'));
    }


    public function edit(Menu $menu)
    {
        return view('menu.edit', compact('menu'));
    }


    public function update(Request $request, Menu $menu)
    {
        request()->validate([
            'user_id' => 'required',
            'restaurant_id' => 'required',
            'menu_name' => 'required',
            'menu_img' => 'required',
            'menu_detail' => 'required',
        ]);
        $menu->update($request->all());
        return redirect()->route('menu.index')
            ->with('success', 'Menu updated successfully');
    }


    public function destroy(Menu $menu)
    {
        $menu->delete();
        return redirect()->route('menu.index')
            ->with('success', 'Menu deleted successfully');
    }

    public function findd(Request $request, $id)
    {

        $menus =  DB::table('menus')
            ->join('restaurants', 'restaurants.id', '=', 'menus.restaurant_id')
            ->select(
                'menus.id as menu_id',
                'menus.user_id',
                'menus.restaurant_id',
                'menus.menu_name',
                'menus.menu_img',
                'menus.menu_price',
                'menus.menu_detail',
                'restaurant_name'
            )
            ->where('restaurants.id', $id)
            ->orderBy('menus.restaurant_id', 'DESC')
            ->get();

        $gmenus =  DB::table('menus')
            ->select('restaurant_id', DB::raw('count(*) as total'))
            ->where('restaurant_id', $id)
            ->groupBy('restaurant_id')
            ->get();

        $torders = DB::table('orders')
            ->select('menu_id', DB::raw('count(*) as torder'))
            ->where('orders_status', "=", 2)
            ->groupBy('menu_id')
            ->get();

        return view('welcome')->with(['menus' => $menus])->with(['gmenus' => $gmenus])->with(['torders' => $torders]);
    }
}
