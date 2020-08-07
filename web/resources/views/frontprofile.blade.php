<!DOCTYPE html>
<html lang="en">
    <head>
        <title>WEB</title>
    </head>
    <body class="card-header">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <form method="POST" action="{{ route('store') }}">
                            @csrf
                            <div class="row justify-content-center">
                                <div class="col-lg-12">
                                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                                        <div  class="bg-red"  style="background-color:coral"><h4 class="card-header"><center>User Edit Information</h></div>
                                            <div class="card-body">
                                                <input type="text" name="id" value="{{ $editdata->id}}" hidden="">
                                                    <div class="form-row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="small mb-1" for="inputFirstName">Name</label>
                                                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Please Enter Your Name"  value="{{ $editdata->name}}" required autocomplete="name" autofocus>
                                                                @error('name') <span class="invalid-feedback" role="alert">  <strong>{{ $message }}</strong></span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="small mb-1" for="inputLastName">City</label>
                                                                <input id="city" type="city" placeholder="Enter Title" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ $editdata->city}}" required autocomplete="city">
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
                                                                <label class="small mb-1" for="inputEmailAddress">Email</label>
                                                                <input id="email" type="email" placeholder="Please Enter Your Email" class="form-control @error('email') is-invalid @enderror" name="email"  value="{{ $editdata->email}}" required autocomplete="email">
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
                                                                <label class="small mb-1" for="inputEmailAddress">Country</label>
                                                                <input id="country" type="country" placeholder="Please Enter Your country" class="form-control @error('country') is-invalid @enderror" name="title"  value="{{ $editdata->country}}" required autocomplete="country">

                                                                @error('title')
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
                                                            <input id="state" type="state" placeholder="Please Enter Your state" class="form-control @error('state') is-invalid @enderror" name="state"  value="{{ $editdata->state}}" required autocomplete="state">
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
                                                            <label class="small mb-1" for="inputPassword">Date of Birth</label>
                                                                <input id="dob" type="text"  class="form-control @error('dob') is-invalid @enderror" name="dob" value="{{$editdata->dob}}"required autocomplete="dob">
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
                                                                <input id="address" type="address" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ $editdata->address}}" required autocomplete="address"  >
                                                                    @error('address')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group mt-4 mb-0">
                                                        <center><button type="submit" class="red_btn" >  {{ __('Update') }} </button></center>
                                                    </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                </main>
            </div>
        </div>
    </body>
</html>