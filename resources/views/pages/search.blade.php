@extends('master')

@section('content')

<h2>Search result for '{{ request()->search }}' found {{$notes->count()}} notes.</h2>

@if($notes->count()>0)

<div class="container mt-3">
    <div class="row">
        <div class="col">

            <h4> Search result </h4>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Serial</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Creation Date</th>
                        <th scope="col">Last Modified</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($notes as $key=>$note)
                    <tr>
                        <th scope="row">{{$key+1}}</th>
                        <td>{{$note->title}}</td>
                        <td>{{$note->description}}</td>
                        <td>{{$note->created_at}}</td>
                        <td>{{$note->updated_at}}</td>
                        <td>
                            <a class="btn-sm btn-warning" href="{{route('note.edit', $note->id)}}">Edit</a>
                            <a class="btn-sm btn-danger" href="{{route('note.delete', $note->id)}}">Delete</a>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>

        </div>
    </div>
</div>

@else
<h1>No note found.</h1>
@endif


</div>
@endsection