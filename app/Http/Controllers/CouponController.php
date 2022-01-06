<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests\CouponFrom;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('coupon.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CouponFrom $request)
    {
        // using CouponFrom for Validation

        // =======================
        // $request->validate([
        //     '*'=>'required',
        //     'coupon_name' => 'unique:coupons,coupon_name',
        //     'discount_percentage'=>'numeric|max:99|min:1',
        //     'validity'=>'date|after:today',
        //     'limit'=> 'numeric|min:1'
        // ]);
        Coupon::insert($request->except('_token')+[
            'created_at'=> Carbon::now()
        ]); //new method of insert data


        // Coupon::insert([
        //     'coupon_name '=> $request->coupon_name,
        //     'discount_percentage'=>$request->discount_percentage,
        //     'validity'=>$request->validity,
        //     'limit'=>$request->limit,
        //     'created_at'=> Carbon::now()
        // ]);
        return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function show(Coupon $coupon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function edit(Coupon $coupon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Coupon $coupon)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coupon $coupon)
    {
        //
    }
}
