@extends('vehicle.template')

@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p></p>
        </div>
    @endif

    <table class="table table-bordered table-responsive-lg">
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Body</th>
            <th>Created At</th>
        </tr>
        @foreach ($posts as $post)
            <tr>
                <td>{{$post->id}}</td>
                <td>{{$post->title}}</td>
                <td>{{$post->body}}</td>
                <td>{{$post->created_at->diffForHumans()}}</td>
            </tr>
        @endforeach
    </table>

    {!! $posts->links() !!}

@endsection
