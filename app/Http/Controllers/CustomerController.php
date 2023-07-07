<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\New_;


class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {   
        $search = $request->query('search');
        if(!empty($search)){
            $data= Customer::where('customers.id','like','%'.$search.'%')
            ->orwhere('customers.name','like','%'.$search.'%')
            ->paginate(10)->fragment('std');
        }
        else{
            $data = Customer::paginate(10);
        }
        
        return view('customer.data')->with([
            'customer' => $data,
            'search' => $search,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
   
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCustomerRequest $request)
    {
        $validate =$request->validated();
        $customer= New Customer;
        $customer->name = $request->name;
        $customer->alamat = $request->address;
        $customer->no_tlp= $request->phone;
        $customer->save();

        return redirect('customer')->with('msg','Add New Succes');
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerRequest $request, $id)
    {   
        $customer = New Customer;
        $data = $customer->find($id);
        $data->name = $request->name;
        $data->alamat = $request->address;
        $data->no_tlp= $request->phone;
        $data->save();

        return redirect('customer')->with('msg','Data Customer'.$data->name.' Berhasil diUpdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
