@extends('layouts.app')
@section('content')

        <div class="container">
            <div class="row  justify-content-center ">
                <div class="col-sm-8 bg-white boxShadow p-5 mt-5 rounded">
                    <form action="{{ route('upload.assignment',$user) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="file" class="fileInput" name="assignment">
                        <button class="fileInput" type="submit"> Upload Assignment</button>
                    </form>
                    @error('name')
                        <div class="text-danger mt-3 ">
                            {{ $message }}
                        </div>
                    @enderror

                    @if(session()->has('assignmentError'))
                        <div class="text-danger mt-3">
                            {{ session('assignmentError') }}
                        </div>
                    @elseif(session()->has('assignmentSuccess'))
                        <div class="text-success mt-3 ">
                            {{ session('assignmentSuccess') }}
                        </div>
                    @endif
                </div>
            </div>
    </div>


@endsection
