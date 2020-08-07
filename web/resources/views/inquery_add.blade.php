@extends('layouts.app2')
@section('content')
@yield('content')
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Create User</title>
    </head>
    <body >
       <table border="5">
           <tr>
            <td>
                 <form method="POST" action="{{ route('registration.store') }}">
                            @csrf
                            <div class="row justify-content-center">
                                <div class="col-lg-12">
                                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                                        <div  class="bg-red"  style="background-color:coral">

                                            <h4 class="card-header"><center>Create User</h></div>
                                            <div class="card-body">
                                                    <div class="form-row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="small mb-1" for="inputFirstName">Name</label>
                                                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Please Enter Your Name"  value="" required autocomplete="name" autofocus>
                                                                @error('name') <span class="invalid-feedback" role="alert">  <strong>{{ $message }}</strong></span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="small mb-1" for="inputLastName">Country</label>
                                                                <input id="country" type="text" placeholder="Enter Country Name" class="form-control @error('Country') is-invalid @enderror" name="country" value="" required autocomplete="Country">
                                                                @error('country')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="small mb-1" for="inputEmailAddress">Email</label>
                                                                <input id="email" type="email" placeholder="Please Enter Your Email" class="form-control @error('email') is-invalid @enderror" name="email"  value="" required autocomplete="email">
                                                                    @error('email')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                            </div> 
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="small mb-1" for="inputEmailAddress">State</label>
                                                                <input id="state" type="text" placeholder="Please Enter Your state" class="form-control @error('state') is-invalid @enderror" name="state"  value="" required autocomplete="state">

                                                                @error('state')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>



                                                    <div class="form-row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="small mb-1" for="inputEmailAddress">City</label>
                                                                <input id="city" type="text" placeholder="Please Enter Your city" class="form-control @error('city') is-invalid @enderror" name="city"  value="" required autocomplete="city">

                                                                @error('city')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>



                                                    <div class="form-row">
                                                        <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="small mb-1" for="inputPassword">Date of Birth</label>
                                                                <input id="dob" type="date" placeholder="Please Enter Your Website Name" class="form-control @error('dob') is-invalid @enderror" name="dob" value=""required autocomplete="dob">
                                                                @error('dob')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                        </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="small mb-1" for="inputConfirmPassword">Contact Address</label>
                                                                <textarea id="address" type="address" class="form-control @error('address') is-invalid @enderror" name="address" value="" required autocomplete="address"  ></textarea>
                                                                    @error('address')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                            </div>
                                                        </div>
                                                    </div>




                                                       <div class="form-row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="small mb-1" for="inputEmailAddress">Password</label>
                                                                <input id="password" type="password" placeholder="Please Enter Your Password" class="form-control @error('state') is-invalid @enderror" name="password"  value="" required autocomplete="password">

                                                                @error('password')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>

                                                   <div class="form-row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="small mb-1" for="inputEmailAddress">Retype Password</label>
                                                                <input id="password" type="password" name="password_confirmation" placeholder=" Retype Your Password" class="form-control @error('state') is-invalid @enderror" name="password"  value="" required autocomplete="password">

                                                                @error('password')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>





                                                    <div class="form-group mt-4 mb-0">
                                                        <center><button type="submit" class="red_btn" >  {{ __('Save') }} </button></center>
                                                    </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
            </td>
        </tr>
       </table>
    </body>
</html>
@stop

@section('pagescript')
<!--begin::Page Vendors(used by this page) -->

<!--end::Page Vendors -->

@endsection