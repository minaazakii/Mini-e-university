@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-sm-8 bg-white border border-1 border boxShadow my-5 rounded">
                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <legend class="my-3 text-center fw-bold text-decoration-underline"> Register</legend>
                    <div class="mb-3">
                      <label class="form-label my-2 mb-3"></label>
                      <input name="username" value="{{ old('username') }}" type="text" class="form-control input
                      @error('username') border-danger @enderror" placeholder="Username">
                    </div>

                    @error('username')
                        <div class="text-danger"> Username is Required </div>
                    @enderror

                    <div class="mb-3">
                      <label class="form-label my-2 mb-3"></label>
                      <input name="Email" type="email" value="{{ old('email') }}" class="form-control input
                      @error('email') border-danger @enderror" placeholder="email">
                    </div>

                    @error('email')
                        <div class="text-danger"> email is Required </div>
                    @enderror

                    <div class="mb-3">
                        <select name="faculty" class="form-control input mt-5">
                            <option value="" disabled selected hidden>Choose a faculty</option>
                            <option value="computer">Faculty of Computer</option>
                            <option value="law">Faculty of Law</option>
                            <option value="commerce">Faculty of Commerce</option>
                        </select>

                    </div>

                      @error('university')
                          <div class="text-danger"> Faculty is Required </div>
                      @enderror

                    <div class="mb-3">
                        <label class="form-label my-2 mb-3"></label>
                        <input name="password" type="password" class="form-control input
                        @error('password') border-danger @enderror" placeholder="Password">
                    </div>

                    @error('password')
                        <div class="text-danger"> Password is Required </div>
                    @enderror

                    <div class="mb-3">
                        <label class="form-label my-2 mb-3"></label>
                        <input name="password_confirmation" type="password" class="form-control input
                        @error('password_confirmation') border-danger @enderror" placeholder="Confirm Password">
                    </div>

                    @error('password_confirmation')
                        <div class="text-danger">Confirm Password</div>
                    @enderror

                    <div class="d-flex justify-content-center mb-2 p-5 ">
                        <button type="submit" class= " rounded-pill btn  button mx-2 ">Register</button>
                        <button type="submit" class= " rounded-pill btn  button mx-2 "><a class="text-decoration-none button" href="">back</a></button>
                    </div>

                  </form>
            </div>
        </div>
    </div>
@endsection
