<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AccountController extends Controller
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
        if (Auth::user()->customer->account == null){
            return view('accounts.create');
        }else{
            return redirect()->back();
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'amount' => 'required|numeric',
        ]);

        $customer_id = Auth::user()->customer->id;
do{


        $account_number = Str::random(10);

        $p = DB::table('accounts')
            ->select('*')
            ->where('account_number', '=', $account_number)
            ->first();
}while($p != null);


        $acc = Account::create([
            'customer_id' => $customer_id,
            'account_number' => $account_number,
            'amount' => $request->amount,
        ]);

        $successMsg = 'Successfully created new account.';
        return redirect('home')->with('msg' , $successMsg);
    }


    public function show(Account $account)
    {
        //
    }

    // public function edit($account_id)
    // {
    //     $account = Account::where('id',$account_id)->first();
    //     //->where('user_id',Auth::id())->first()
    //     if ($account === null) {
    //         return redirect()->back();
    //     }
    //     return view('accounts.edit')->with('account',$account);
    //    // return view('customer.edit');
    // }


    public function deposit($account_id)
    {
        $account = Account::where('id',$account_id)->first();
        //->where('user_id',Auth::id())->first()
        if ($account === null) {
            return redirect()->back();
        }
        return view('accounts.deposit')->with('account',$account);
       // return view('customer.edit');
    }

    public function withdraw($account_id)
    {
        $account = Account::where('id',$account_id)->first();
        //->where('user_id',Auth::id())->first()
        if ($account === null) {
            return redirect()->back();
        }
        return view('accounts.withdraw')->with('account',$account);
       // return view('customer.edit');
    }

    public function transfer($account_id)
    {
        $account = Account::where('id',$account_id)->first();
        //->where('user_id',Auth::id())->first()
        if ($account === null) {
            return redirect()->back();
        }
        return view('accounts.transfer')->with('account',$account);
       // return view('customer.edit');
    }


    public function add(Request $request, $account_id)
    {
        $account = Account::where('id',$account_id)->first();
        $amount = $request->amount;

        if ($account === null) {
            return redirect()->back();
        }

        $account->amount += $request->amount;
        $account->save();

        $successMsg = 'Successfully deposited '.$amount.'$ in your account.';
        return redirect('home')->with('msg' , $successMsg);
    }

    public function draw(Request $request, $account_id)
    {
        $account = Account::where('id',$account_id)->first();
        $amount = $request->amount;

        if ($account === null) {
            return redirect()->back();
        }
        //$account->update($request->amount);
        $account->amount -= $amount;
        $account->save();

        $successMsg = 'Successfully withdrawn '.$amount.'$ from your account.';
        return redirect('home')->with('msg' , $successMsg);
    }

    public function move(Request $request, $account_id)
    {
        $account1 = Account::where('id',$account_id)->first();
        $account2 = Account::where('account_number',$request->account_number)->first();
        $amount = $request->amount;

        if ($account1 === null or $account2 === null) {
            return redirect()->back()->with('msg' , 'Target Account doesn\'t exist');
        }
        //$account->update($request->amount);
        $account1->amount -= $amount;
        $account2->amount += $amount;
        $account1->save();
        $account2->save();

        $successMsg = 'Successfully transfered '.$amount.'$ to : '. $request->account_number;
        return redirect('home')->with('msg' , $successMsg);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function destroy(Account $account)
    {
        //
    }
}
