@extends('layouts.app')

@section('content')

    <div class="container">
        <div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div>
                    @if ($message = Session::get('msg'))
                        <div class="alert alert-primary">
                            {{$message}}
                        </div>
                    @endif
                </div>
                <div class="card">
                    <div class="card-header" style="font-size: 20px; font-weight: bold">{{ __('Customer informations') }}</div>

                    <div class="card-body">
                        <p>
                                    {{ __('Name: ') }}
                            {{Auth::user()->customer->f_name}} {{Auth::user()->customer->l_name}}

                        </p>

                        <p>
                                    {{ __('Account number : ') }}
                            {{Auth::user()->customer->account->account_number}}
                        </p>

                        <p>
                                    {{ __('Current balance : ') }}
                            {{Auth::user()->customer->account->amount}} $
                        </p>
                    </div>
                </div><br>

                <div class="card">
                    <div class="card-header" style="font-size: 20px; font-weight: bold">{{ __('Actions') }}</div>

                    <div class="card-body">
                        <a class="btn btn-primary" href="{{route('customer.edit' , ['id' => Auth::user()->customer->id])}}">
                                    Edit customer informations </a>
                        <hr>
                        <a class="btn btn-success" href="{{route('account.deposit' , ['id' => Auth::user()->customer->account->id])}}">
                                    Make new deposit </a>
                        <hr>
                        <a class="btn btn-warning" href="{{route('account.withdraw' , ['id' => Auth::user()->customer->account->id])}}">
                                    Withdraw money </a>
                        <hr>
                        <a class="btn btn-danger" href="{{route('account.transfer' , ['id' => Auth::user()->customer->account->id])}}">
                                    Make a transaction to another account </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
