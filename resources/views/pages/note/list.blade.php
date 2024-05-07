@extends('master')

@section('content')

@if($notes->count() > 0)
<div class="container mt-3">
    <div class="row">
        <div class="col">

            <h4>
                List of Notes
                <a class="btn-sm btn-success" href="{{route('note.add')}}">Add Note</a>
            </h4>
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
                            <a class="btn-sm btn-primary" href="{{route('note.view', $note->id)}}">View</a>
                            <a class="btn-sm btn-warning" href="{{route('note.edit', $note->id)}}">Edit</a>
                            <a class="btn-sm btn-danger" href="{{route('note.delete', $note->id)}}">Delete</a>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
            {{$notes->links()}}
        </div>
    </div>
</div>
@else
<div class="container mt-3">
    <div class="row">
        <div class="col">
            <div class="alert alert-info" role="alert">
                <h4 class="alert-heading">No notes found!</h4>
                <p>It seems you haven't added any notes yet. Start adding your notes now to stay organized and productive.</p>
                <hr>
                <p class="mb-0">Click the button below to create your first note.</p>
            </div>
            <a class="btn btn-success" href="{{ route('note.add') }}">Create Note</a>
        </div>
    </div>
</div>

@endif

@endsection