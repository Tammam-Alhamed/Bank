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

    </div>

@endif
    <div class="card">
        <h5 class="card-header">Account</h5>
        <div class="card-body">
            <h6 class="card-title">Your account is almost ready, make your first deposit: </h5>

            <form action="{{route('account.store')}}" method="POST" class="needs-validation" novalidate>
                @csrf
                <div class="row">

                    <div class="col-xs-3" style="padding-right: 50px ; padding-left: 30px">
                        <div class="form-floating mb-3">
                            <label class="form-label" for="amount">amount ($)</label>
                            <input class="form-control" type="text" name="amount" id="amount" size="20" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                            <div class="invalid-feedback">
                                * This field is required.
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
            </form>

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
