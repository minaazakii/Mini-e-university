@extends('layouts.app')
@section('content')
    @if($layout=='home')

    @elseif($layout=='search')
    <div class="container-fluid">
        <div class="row">
        @foreach($users as $user)
                <div class="d-flex ">
                <div class="col-sm-4  p-5  rounded mt-5 m-3">
                    <div class="card mx-5 " style="width: 18rem;">
                        <form action="{{route('profile',$user)}}"></form>
                        <img src="{{ $user->image }}" class="card-img-top " alt="no image">
                        <div class="card-body ">
                          <h5 class="card-title text-capitalize"><a class="link-dark" href="{{ route('profile',$user) }}"> {{ $user->username }}</a></h5>
                          <p class="card-text">Email: {{ $user->email }}</p>
                          <p class="card-text text-capitalize">Faculty of {{ $user->faculty }}</p>
                          @auth
                            @if($user == auth()->user())
                                <form action="{{ route('profile',$user) }}">
                                    @csrf
                                    <button class="fileInput">Edit </button>
                                </form>
                            @endif
                        @endauth
                        </div>
                    </div>
                </div>
                </div>
        @endforeach
        </div>
    </div>
        @endif
@endsection

