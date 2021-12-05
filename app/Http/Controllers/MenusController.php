<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class MenusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $menus = Menu::latest()->get();
//        return view('CMS.menus.index',compact('menus'));
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
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required|unique:menus,title',
            'content'=>'required',
        ]);

        $menu = new Menu();
        $menu ->title=$request->get('title');
        $menu ->content=$request->get('content');
        if ($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
            $request->image->move(public_path('projects_images/'), $imageName);
            $menu ->image=($imageName);
        }
        session()->flash('menu_added');
        return redirect()->route('menus.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Menu $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Menu $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Menu $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'title'=>'required',
            'content'=>'required',
        ]);

        $menu->update($request->all());
        session()->flash('menu_updated');
        return redirect()->route('menus.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Menu $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        Menu::findOrFail($id)->delete();
        session()->flash('menu_deleted');
        return redirect()->route('menus.index');
    }
}
