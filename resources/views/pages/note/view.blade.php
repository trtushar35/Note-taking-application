@extends('master')

@section('content')

<div class="container mt-5 mb-5">
    <div class="row d-flex justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="row">
                    <div class="col-md-12">
                        <div class="product p-4">
                            <div class="mt-4 mb-3">
                                <h5>Title: {{$note->title}}</h5>
                            </div>
                            <p class="about"><h6>Description:</h6> {{$note->description}}</p>
                            <p class="about"><h6>Created on:</h6> {{$note->created_at}}</p>
                            <p class="about"><h6>Modified:</h6> {{$note->updated_at}}</p>
                            
                            <div> 
                                <a class="btn btn-danger text-camel mr-2 px-4" href="{{route('note.list')}}" >Back</a> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection