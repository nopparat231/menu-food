<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\DB;

class OrdersController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */

  public function __construct()
  {
    $this->middleware('auth');
  }


  public function index()
  {
    $menus =  DB::table('menus')
      ->join('orders', 'orders.menu_id', '=', 'menus.id')
      ->join('restaurants', 'restaurants.id', '=', 'menus.restaurant_id')
      ->join('users', 'users.id', '=', 'orders.user_id')
      ->select(
        'menus.id as menu_id',
        'menus.user_id',
        'menus.restaurant_id',
        'menus.menu_name',
        'menus.menu_img',
        'menus.menu_price as price',
        'menus.menu_detail',
        'restaurant_name',
        'restaurants.user_id as res_uid',
        'orders.id as orders_id',
        'orders.user_id as or_uid',
        'orders.menu_id',
        'orders.orders_detail',
        'orders.order_quantity',
        'orders.orders_status',
        'orders.created_at',
        'users.name as users_name'
      )
      // ->where('orders.user_id', '=', Auth::user()->id)
      ->where('orders.orders_status', '!=', 4)
      ->orderBy('menus.restaurant_id', 'DESC')
      ->get();

    $gmenus =  DB::table('menus')
      ->select('restaurant_id', DB::raw('count(*) as total'))
      ->groupBy('restaurant_id')
      ->get();

    return view('orders.MyOrder')->with(['menus' => $menus])->with(['gmenus' => $gmenus]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */

  public function create(Request $request)
  {

    for ($i = 0; $i < $request[0]["count_order"]; $i++) {

      $orders[] = [
        'user_id' => $request[$i]["user_id"],
        'menu_id' => $request[$i]["menu_id"],
        'orders_detail' => $request[$i]["orders_detail"],
        'order_quantity' => $request[$i]["order_quantity"],
        'orders_status' => 1
      ];
    }
    Orders::insert($orders);
    Cookie::queue(Cookie::forget('shopping_cart'));
    return response()->json(['success' => 'Orders Created Successfully.']);

    // return redirect('MyOrders')->route('MyOrders')
    //     ->with('success', 'orders created successfully.');

  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    return "OKOK";
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $findn = DB::table('menus')
      ->select('*')->where('restaurant_name', 'like', '%' . $id . '%')->limit(1)->get();

    return view("orders.MyOrder", $findn);
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
    $orders_status = $request->input('orders_status');

    // DB::table('orders')
    //   ->where('id', $id)
    //   ->update(['orders_status' => $orders_status]);

    if($orders_status){
      
    }

    //return response()->json(['status' => 'Orders Update Successfully.']);
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
