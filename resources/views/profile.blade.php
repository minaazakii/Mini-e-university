@extends('layouts.app')
@section('content')
        <div class="container-fluid">
            <div class="row">
                <div class="d-flex justify-content-start">
                <div class="col-sm-4  p-5  rounded mt-5 m-3">
                    <div class="card mx-5 boxShadow" style="width: 18rem;">
                        <img src="{{ $user->image }}" class="card-img-top" alt="no image">
                        <div class="card-body ">
                          <h5 class="card-title text-capitalize">{{ $user->username }}</h5>
                          <p class="card-text">Email: {{ $user->email }}</p>
                          <p class="card-text text-capitalize">Faculty of {{ $user->faculty }}</p>

                          <!--Upload photo -->
                          @if($user ==auth()->user())
                            <form action="{{ route('upload',$user) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="file" name="image" class=" border border-0" />
                                <button type="submit" class="btn btn-primary mt-3" >Change Photo</button>
                                @error('image')
                                    <div class="text-danger mt-2">
                                        The Chosen File Must Be an Image
                                    </div>
                                @enderror
                            </form>
                        @endif
                        </div>
                      </div>
                </div>

                    <div class="col-sm-4 boxShadow rounded mt-5 m-3">
                        <h4 class="text-center text-decoration-underline mb-3">Uploaded Assignments</h4>
                        @foreach ($assignment as $assign)
                        <form action="{{ route('delete.assignment',$assign) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a href=""> {{ $assign->name }}</a>
                            @if($user==auth()->user())
                                <button class="delete" type="submit">Delete</button>
                            @endif
                        </form>

                        <form action="{{ route('download',$assign->id)}}" method="GET">
                            @csrf
                            <button class="download my-3 " type="submit"> Download </button>
                        </form>
                        @endforeach

                    </div>


                </div>

            </div>
    </div>


@endsection
