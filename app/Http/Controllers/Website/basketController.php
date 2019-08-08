<?php


namespace App\Http\Controllers\Website;


use App\ModelMarket\c_credit;
use App\ModelMarket\c_credit_used;
use App\ModelVideo\t_classroom;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class basketController
{
    function addtobasket(Request $request){
        $request->validate([
            'methods' => ['required', function ($attribute, $value, $fail)  {

            }],
            'id' => ['required', function ($attribute, $value, $fail) use($request) {
                if($request->methods=='online'){
                    $currentclass=t_classroom::where('id',$value)->with('toBuyUser')->first();
                    if($currentclass->toBuyUser()->count()!=0){
                        return $fail(__('web.You have already bought this product. See your List in your panel'));
                    };
                    if (!Auth::check()) {
                        return $fail(__('web.Please Login User'));
                    }
                    if (Auth::check()) {

                        $my = $currentclass->price - $this->getCreditUser();
                        if ($currentclass->price <= $my) {


                            return $fail(
                                __('web.Your Have Not Enough Credit . Please Charge Your Credit. Click On Link') . __('<a href="/userpanel/addCredit?add=' . $my . '">') . __('web.Charge Credit You Need') . $my . __('web.Toman') . '</a>');

                        };
                    };

                };

            }],
        ]);

    }
    function getCreditUser(){

        $credit=c_credit::with('ToCredit')->whereHas('ToCredit',function ($query){
            $query->where('user', Auth::id());
        })->get()->sum('price');

        $creditused=c_credit_used::with('ToCreditUsed')->whereHas('ToCreditUsed',function ($query) {
            $query->where('user', Auth::id());
        })->get()->sum('price');
        return $credit-$creditused;

    }

}