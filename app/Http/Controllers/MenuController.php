<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{

    public function index()
    {
        $menu = Menu::latest()->paginate(5);
        return view('menu.index', compact('menu'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('menu.create');
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
}
