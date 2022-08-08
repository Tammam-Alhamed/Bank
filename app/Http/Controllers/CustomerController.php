<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Faker\Extension\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
    }


    public function create()
    {
        if (Auth::user()->customer == null){
            return view('customers.create');
        }else{
            return redirect()->back();
        }
        //return view('customers.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'f_name' => 'required',
            'l_name' => 'required',
            'address' => 'required',
            'gender' => 'required',
            'phone_number' => 'required|max:15'
        ]);

        $cu = Customer::create([
            'user_id' => Auth::id(),
            'f_name' => $request->f_name,
            'l_name' => $request->l_name,
            'address' => $request->address,
            'gender' => $request->gender,
            'phone_number' => $request->phone_number,
        ]);
        //return view('accounts.create');
        return redirect('account/create');
    }

    public function show(Customer $customer)
    {

    }


    public function edit($customer_id)
    {
        $customer = Customer::where('id',$customer_id)->first();
        //->where('user_id',Auth::id())->first()
        if ($customer === null) {
            return redirect()->back();
        }
        return view('customers.edit')->with('customer',$customer);
       // return view('customer.edit');
    }


    public function update(Request $request, $customer_id)
    {
        $customer = Customer::find($customer_id)->first();

        $this->validate($request,[
            'f_name' => 'required',
            'l_name' => 'required',
            'address' => 'required',
            'gender' => 'required',
            'phone_number' => 'required|max:15'
        ]);

        $customer->update($request->all());

        // $customer->f_name = $request->f_name;
        // $customer->l_name = $request->l_name;
        // $customer->address = $request->address;
        // $customer->gender = $request->gender;
        // $customer->phone_number = $request->phone_number;

        // $customer->save;

        return redirect()->back()->with('msg', 'Updated successfully');
    }

    public function destroy(Customer $customer)
    {
        //
    }
}
