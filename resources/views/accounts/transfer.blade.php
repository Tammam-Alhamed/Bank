@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div>
                <a class="btn btn-primary" role="button" href="{{route('home')}}"> < Back</a>
            </div><br>
            <div>
                @if ($message = Session::get('msg'))
                    <div class="alert alert-primary">
                        {{$message}}
                    </div>
                @endif
            </div>
            <div class="card">
                <div style="font-size: 20px; font-weight: bold" class="card-header">{{ __('Customer informations') }}</div>
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
            </div> <br>

            <div class="card">
                <div style="font-size: 20px; font-weight: bold" class="card-header">{{ __('Transfering money') }}</div>
                <div class="card-body">
                    <form action="{{route('account.move' , ['id' => Auth::user()->customer->account->id])}}" method="POST" class="needs-validation" novalidate>
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-xs-3" style="padding-left: 30px">
                                <div class="form-floating mb-3">
                                    <label for="amount">Amount ($)</label>
                                    <input type="number" min="0" onkeypress="return event.charCode >= 48" class="form-control" name="amount" id="amount" size="10" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    <div class="invalid-feedback">
                                        * Please provide valid amount.
                                    </div>
                                </div>
                            </div>
                        </div>
<p style="padding-left: 10px">Transfer to: </p>
                        <div class="row">
                            <div class="col-xs-3" style="padding-left: 30px">
                                <div class="form-floating mb-3">
                                    <label for="account_number">Account number</label>
                                    <input type="text" class="form-control" name="account_number" id="account_number" size="20" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    <div class="invalid-feedback">
                                        * Please provide valid account number.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <button class="btn btn-danger" type="submit">Transfer</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    $(document).ready(function () {

      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      var forms = document.querySelectorAll('.needs-validation')

      // Loop over them and prevent submission
      Array.prototype.slice.call(forms)
        .forEach(function (form) {
          form.addEventListener('submit', function (event) {
            if (!form.checkValidity()) {
              event.preventDefault()
              event.stopPropagation()
            }

            form.classList.add('was-validated')
          }, false)
        })
    });
    </script>

@endsection
