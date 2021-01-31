<?php

namespace App\Http\Controllers\Admin;

use App\Models\Menu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MenuController extends Controller
{
    public function index() {
        $menus = Menu::all();
        return view('admin.menus')->with('menus', $menus);
    }

    public function store(Request $request) {
        $menus = new Menu;

        $this->validate($request, [
            'imagePath' => 'image|nullable|max:2048',
            'dish' => 'required',
            'description' => 'required',
            'price' => 'required'
        ]);

        /**
         * Uploading image
         */
        if ($request->hasfile('imagePath')) {
            //When the Request has an image
            $fileNameWithExtension = $request->file('imagePath')->getClientOriginalName();// Getting Original Image name with Extension
            $fileName = pathinfo($fileNameWithExtension, PATHINFO_FILENAME); //Get Image Name only
            $extension = $request->file('imagePath')->getClientOriginalExtension(); //Get Image Extension only
            $fileNameToStore = $fileName . time() . '.' . $extension;// Creating new Image name with extension to store in the database
            $request->file('imagePath')->storeAs('public/menu_images/', $fileNameToStore);
        } else {
            //When the request does not have an image
            $fileNameToStore = 'noimage.jpg';
        }

        $menus->dish = $request->input('dish');

        $menus->description = $request->input('description');

        $menus->price = $request->input('price');

        $menus->imagePath = $fileNameToStore;

        $menus->save();

        return redirect('/admin/menus')->with('status','Menu Data saved successfully');
    }

    public function edit($id) {
        $menus = Menu::findOrFail($id);

       return view('admin.menus.edit')->with('menus', $menus);
    }

    public function update(Request $request, $id){
        $menus = Menu::findOrFail($id);

        $this->validate($request, [
            'dish' => 'required',
            'description' => 'required',
            'imagePath' => 'image|nullable|max:2048',
            'price' => 'required'
        ]);

        /**
         * Updating image
         */
        if ($request->hasfile('imagePath')) {
            //When the Request has an image
            $fileNameWithExtension = $request->file('imagePath')->getClientOriginalName();// Getting Original Image name with Extension
            $fileName = pathinfo($fileNameWithExtension, PATHINFO_FILENAME); //Get Image Name only
            $extension = $request->file('imagePath')->getClientOriginalExtension(); //Get Image Extension only
            $fileNameToStore = $fileName . time() . '.' . $extension;// Creating new Image name with extension to store in the database
            $request->file('imagePath')->storeAs('public/menu_images/', $fileNameToStore);
        } else {
            //When the request does not have an image
            $fileNameToStore = '';
        }

        $menus->dish = $request->input('dish');
        $menus->description = $request->input('description');
        $menus->price = $request->input('price');
        $menus->imagePath = $fileNameToStore;

        $menus->update();

        return redirect('/admin/menus')->with('status','Menu Data updated successfully');
    }

    public function delete($id) {
        $menus = Menu::findOrFail($id);

        $menus->delete();

        return redirect('/admin/menus')->with('status','Data deleted successfully');
    }
}
