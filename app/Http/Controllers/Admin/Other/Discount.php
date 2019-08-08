<?php


namespace App\Http\Controllers\Admin\Other;

use App\ModelMarket\p_discount_code;
use App\ModelMarket\p_group;
use App\ModelVideo\t_classroom;
use App\User;
use Illuminate\Http\Request;
use Morilog\Jalali\CalendarUtils;

class Discount
{
    function index(Request $request)
    {
        return view('admin.runcompnent', array('name' => 'DiscountCode'))->with('title', trans('site.DiscountCode'));

    }

    function Createcode(Request $request)
    {
        if ($request->data['expiretime'] != null) {
            $date = explode('/', $request->data['expiretime']);

            $date = CalendarUtils::toGregorian($date[0], $date[1], $date[2]);
            $geojiran = $date[0] . '/' . $date[1] . '/' . $date[2] . ' 00:00:00';

        } else {
            $geojiran = null;
        }
        if ($request->data['mode'] == "AddAccountCode") {

            $request->validate([
                'data.account' => 'required',

            ]);
        }
        if ($request->data['mode'] == "AddGroupCode") {

            $request->validate([
                'data.group' => 'required',

            ]);
        }

        for ($i = 1; $i <= $request->data['number']; $i++) {
            $digits_needed = self::createrandomkey($request->data['countnumber']);
            $count = p_discount_code::where('code', $digits_needed)->count();
            $save = new p_discount_code();
            $save->code = $digits_needed;
            if ($request->data['expiretime'] != null) {
                $save->expiretime = $geojiran;
            };
            $save->save();

            if ($request->data['mode'] == "AddAccountCode") {
                $save->toAccount()->sync($request->data['account']);
            };
            if ($request->data['mode'] == "AddGroupCode") {

                $save->toGroup()->sync($request->data['group']);
            };
        };


    }


    function createrandomkey($count)
    {
        $Caracteres = 'ABCDEFGHIJKLMOPQRSTUVXWYZ0123456789';
        $QuantidadeCaracteres = strlen($Caracteres);
        $QuantidadeCaracteres--;

        $Hash = NULL;
        for ($x = 1; $x <= $count; $x++) {
            $Posicao = rand(0, $QuantidadeCaracteres);
            $Hash .= substr($Caracteres, $Posicao, 1);
        }

        return $Hash;
    }

    function LoadListStore()
    {

        return User::whereHas('checkroll', function ($query) {
            $query->where('user', '3');
        })->get();
    }
    function GetGroupFinal(Request $request){
        $group=new p_group();
        $group=$group->with('toSubGroup')->get();
        return $group;
    }
    function GetOnlineClass(Request $request){
        $group=new t_classroom();
       // $group=$group->get();
        return $group->get();
    }
    function LoadCodes(Request $request){
        $list= new p_discount_code();
        return $list->with('toAccount','toGroup','toClassonline')->paginate($request->data['perpage']);

    }
}