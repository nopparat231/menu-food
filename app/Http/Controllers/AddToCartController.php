<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use App\Models\Orders;

class AddToCartController extends Controller
{
    public function index()
    {
        $cookie_data = stripslashes(Cookie::get('shopping_cart'));
        $cart_data = json_decode($cookie_data, true);
        return view('Cart')
            ->with('cart_data', $cart_data);
    }

    public function addtocart(Request $request)
    {

        $menu_id = $request->input('menu_id');
        $order_quantity = $request->input('order_quantity');

        if (Cookie::get('shopping_cart')) {
            $cookie_data = stripslashes(Cookie::get('shopping_cart'));
            $cart_data = json_decode($cookie_data, true);
        } else {
            $cart_data = array();
        }

        $item_id_list = array_column($cart_data, 'menu_id');
        $menu_id_is_there = $menu_id;

        if (in_array($menu_id_is_there, $item_id_list)) {
            foreach ($cart_data as $keys => $values) {
                if ($cart_data[$keys]["id"] == $menu_id) {
                    $cart_data[$keys]["order_quantity"] = $request->input('order_quantity');
                    $menu_data = json_encode($cart_data, JSON_UNESCAPED_UNICODE);
                    $minutes = 60;
                    Cookie::queue(Cookie::make('shopping_cart', $menu_data, $minutes));
                    return response()->json(['status' => '"' . $cart_data[$keys]["menu_name"] . '" Already Added to Cart', 'status2' => '2']);
                }
            }
        } else {
            $menu = DB::table('menus')
                ->where('id', $menu_id)->first();
            $menu_name = $menu->menu_name;
            $menu_image = $menu->menu_img;
            $menu_price = $menu->menu_price;

            if ($menu) {
                $item_array = array(
                    'id' => $menu_id,
                    'menu_name' => $menu_name,
                    'order_quantity' => $order_quantity,
                    'menu_image' => $menu_image,
                    'menu_price' => $menu_price

                );
                $cart_data[] = $item_array;

                $item_data = json_encode($cart_data, JSON_UNESCAPED_UNICODE);
                $minutes = 60;

                Cookie::queue(Cookie::make('shopping_cart', $item_data, $minutes));
                return response()->json(['status' => '"' . $menu_name . '" Added to Cart']);
            }
        }
    }

    public function cartloadbyajax()
    {
        if (Cookie::get('shopping_cart')) {
            $cookie_data = stripslashes(Cookie::get('shopping_cart'));
            $cart_data = json_decode($cookie_data, true);
            $totalcart = count($cart_data);

            echo json_encode(array('totalcart' => $totalcart), JSON_UNESCAPED_UNICODE);
            die;
            return;
        } else {
            $totalcart = "0";
            echo json_encode(array('totalcart' => $totalcart), JSON_UNESCAPED_UNICODE);
            die;
            return;
        }
    }

    public function updatetocart(Request $request)
    {
        $prod_id = $request->input('id');
        $quantity = $request->input('order_quantity');

        if (Cookie::get('shopping_cart')) {
            $cookie_data = stripslashes(Cookie::get('shopping_cart'));
            $cart_data = json_decode($cookie_data, true);

            $item_id_list = array_column($cart_data, 'id');
            $prod_id_is_there = $prod_id;

            if (in_array($prod_id_is_there, $item_id_list)) {
                foreach ($cart_data as $keys => $values) {
                    if ($cart_data[$keys]["id"] == $prod_id) {
                        $cart_data[$keys]["order_quantity"] =  $quantity;
                        $item_data = json_encode($cart_data, JSON_UNESCAPED_UNICODE);
                        $minutes = 60;
                        Cookie::queue(Cookie::make('shopping_cart', $item_data, $minutes));
                        return response()->json(['status' => '"' . $cart_data[$keys]["menu_name"] . '" Quantity Updated']);
                    }
                }
            }
        }
    }

    public function deletefromcart(Request $request)
    {
        $prod_id = $request->input('id');

        $cookie_data = stripslashes(Cookie::get('shopping_cart'));
        $cart_data = json_decode($cookie_data, true);

        $item_id_list = array_column($cart_data, 'id');
        $prod_id_is_there = $prod_id;

        if (in_array($prod_id_is_there, $item_id_list)) {
            foreach ($cart_data as $keys => $values) {
                if ($cart_data[$keys]["id"] == $prod_id) {
                    unset($cart_data[$keys]);
                    $item_data = json_encode($cart_data, JSON_UNESCAPED_UNICODE);
                    $minutes = 60;
                    Cookie::queue(Cookie::make('shopping_cart', $item_data, $minutes));
                    return response()->json(['status' => 'Item Removed from Cart']);
                }
            }
        }
    }

    public function clearcart()
    {
        Cookie::queue(Cookie::forget('shopping_cart'));
        return response()->json(['status' => 'Your Cart is Cleared']);
    }


}
