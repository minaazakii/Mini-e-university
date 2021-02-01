@extends('layouts.app')
@section('content')

        <div class="container">
            <div class="row  justify-content-center ">
                <div class="col-sm-8 bg-white border border-1 boxShadow p-5 rounded mt-5">
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <legend class="my-3 text-center fw-bold text-decoration-underline"> Login</legend>
                        @if(session()->has('loginError'))
                            <div class="text-white bg-danger rounded text-center py-3">
                                {{ session('loginError') }}
                            </div>
                        @endif
                        <div class="mb-3">
                          <label class="form-label my-2 mb-3"></label>
                          <input name="username" type="text" class="form-control input @error('username')
                           border-bottom border-danger @enderror" placeholder="Username">
                        </div>

                        @error('username')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror

                        <div class="mb-3">
                            <label class="form-label my-2 mb-3"></label>
                            <input name="password" type="password" class="form-control input @error('password')
                            border-bottom border-danger @enderror"" placeholder="Password">
                          </div>

                          @error('password')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror

                        <div class="d-flex justify-content-center mb-2 p-5 ">
                            <button type="submit" class= " rounded-pill btn  button mx-2 ">Login</button>
                        </div>

                      </form>
                </div>
            </div>
        </div>
                </div>
            </div>
    </div>


@endsection
