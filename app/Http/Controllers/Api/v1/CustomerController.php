<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Customer;
use App\Http\Resources\v1\CustomerResource;
use App\Http\Resources\v1\CustomerCollection;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Hiển thị tất cả người dùng
        return new CustomerCollection(Customer::paginate(10)); //paginate Dùng để phân trang.
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //tạo người dùng
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Lưu người dùng vào db
        $request -> validate([
            'name_customer' => 'required',
            'phone_customer' => 'required',
            'address_customer' => 'required',
            'email_customer' => 'required',
            'city_customer' => 'required'
        ]);

        $customer = Customer::create($request->all());
        //Trả về dữ liệu
        return new CustomerResource($customer);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //Hiển thị customer/5
        return new CustomerResource($customer);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //lấy customer/5 để update
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        //cập nhật người dùng
        $customer->update($request->all());
         //Trả về dữ liệu
         return new CustomerResource($customer);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //Xóa người dùng
        $customer->delete();
    }
}
