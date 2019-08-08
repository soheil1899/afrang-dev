<?php
/**
 * Created by PhpStorm.
 * User: soheil
 * Date: 4/14/2019
 * Time: 11:46 AM
 */

namespace App\Http\Controllers\Admin;


use App\m_group;
use App\m_menu;
use App\ModalMarket\p_group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;

class MenuController
{
    function MenuGroup()
    {
        return view('admin.runcompnent', array('name' => 'menugraoup'))->with('title', trans('site.Menu Group'));
    }

    function SaveMenuGroup(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'lang' => 'required',
        ]);
        if ($request->id == null) {
            $save = new  m_group();
        } else {
            $save = m_group::where('id', $request->id)->first();
        }
        $save->name = $request->name;
        $save->lang = $request->lang;
        $save->save();
    }

    function getMenuGroup()
    {
        return m_group::with('toLang')->get();
    }

    function LoadMenuGroup(Request $request)
    {
        return m_group::where('id', $request->id)->first();
    }

    function DeleteMenuGroup(Request $request)
    {
        $menu = m_group::where('id', $request->id)->with('toGroupMenu')->first();
        if ($menu->toGroupMenu()->count() != 0) {
            foreach ($menu->toGroupMenu()->get() as $key) {
                Storage::disk('media')->deleteDirectory('/other/menu/' . $key->id);
            };
            $menu->toGroupMenu()->delete();
            $menu->toGroupMenu()->detach();

        }

        $menu->delete();

    }


    // submenus
    function Menus(Request $request)
    {
        return view('admin.runcompnent', array('name' => 'submenu', 'id' => $request->id))->with('title', trans('site.Menu Group'));
    }

    function Savemenu(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'url' => 'required',
        ]);
        if ($request->thisid != 'null') {
            $save = m_menu::where('id', $request->thisid)->first();
        } else {
            $save = new m_menu();
        }

        $save->name = $request->name;
        $save->icon = $request->icon;
        $save->parent = $request->parent;
        $save->url = $request->url;
        $save->subname = $request->subname;

        Storage::disk('media')->makeDirectory('other/menu/' . $save->id);
        if ($request->image != 'undefined') {
            $image = new ImageManager();
            $image->make($request->image->getRealPath())->save(public_path() . '/media/other/menu/' . $save->id . '/orginal.png');
            $image->make($request->image->getRealPath())->resize('50', '50')->save(public_path() . '/media/other/menu/' . $save->id . '/medium.png');
            $image->make($request->image->getRealPath())->resize('100', '100')->save(public_path() . '/media/other/menu/' . $save->id . '/large.png');
            $save->image = true;

        }

        $save->save();
        $save->toGroupMenu()->sync($request->id);
    }


    function LoadSubMenu(Request $request)
    {
        return m_group::where('id', $request->id)->with('toGroupMenu')->first();
    }

    function EditSubMenu(Request $request)
    {
        $result = m_menu::where('id', $request->id)->first();
        if ($result->image == true) {
            $result->image = '/media/other/menu/' . $request->id . '/medium.png';
        }
        return $result;
    }

    function DeleteSubMenu(Request $request)
    {
        $sub = m_menu::where('id', $request->id)->with('toParentMenu')->first();

        if ($sub->toParentMenu()->count() == 0) {
            Storage::disk('media')->deleteDirectory('/other/menu/' . $sub->id);
            $sub->toGroupMenu()->detach();

            $sub->delete();
        } else {
            return abort(422, trans('market.You Must Be First Delete The Children.'));
        }
    }

    function DeleteImage(Request $request)
    {
        $menu = m_menu::where('id', $request->ImageId)->first();

        Storage::disk('media')->delete('/other/menu/' . $menu->id . '/orginal.png');
        Storage::disk('media')->delete('/other/menu/' . $menu->id . '/large.png');
        Storage::disk('media')->delete('/other/menu/' . $menu->id . '/medium.png');

        $menu->image = null;
        $menu->save();

    }


}