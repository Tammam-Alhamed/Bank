@extends('layouts.app')

@section('content')

<div class="container">

    <div class="card">
        <h5 class="card-header">Customer</h5>
        <div class="card-body">
            <h6 class="card-title">Please fill in your personal informations</h5>

            <form action="{{route('customer.store')}}" method="POST" class="needs-validation" novalidate>
                @csrf
                <div class="row">

                    <div class="col-xs-3" style="padding-right: 50px ; padding-left: 30px">
                        <div class="form-floating mb-3">
                            <label class="form-label" for="f_name">First Name</label>
                            <input class="form-control" type="text" name="f_name" id="f_name" size="30" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                            <div class="invalid-feedback">
                                * This field is required.
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-3">
                        <div class="form-floating">
                            <label class="form-label" for="l_name">Last Name</label>
                            <input type="input" class="form-control" name="l_name" id="l_name" size="30" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                            <div class="invalid-feedback">
                                * This field is required.
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-3" style="padding-left: 30px">
                        <div class="form-floating mb-3">
                            <label for="gender">Gender</label>
                            <input type="text" class="form-control" name="gender" id="gender" size="20" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                            <div class="invalid-feedback">
                                * This field is required.
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-3" style="padding-left: 30px">
                        <div class="form-floating mb-3">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" name="address" id="address" size="30" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                            <div class="invalid-feedback">
                                * This field is required.
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-3" style="padding-left: 30px">
                        <div class="form-floating mb-3">
                            <label for="phone_number">Phone number (format: xxx-xxx xxx xxx)</label>
                            <input type="text" pattern="^\d{3}-\d{3} \d{3} \d{3}$" class="form-control" name="phone_number" id="phone_number" size="20" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                            <div class="invalid-feedback">
                                * Please provide a valid phone number
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



