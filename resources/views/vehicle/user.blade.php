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
            <th>Name</th>
            <th>Username</th>
            <th>E-Mail</th>
            <th>Address</th>
            <th>Posts</th>
            <th>Company</th>
            <th>Website</th>
            <th>Phone</th>
            <th>Created At</th>
        </tr>
        @foreach ($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->username}}</td>
                <td>{{$user->email}}</td>
                <td>{{"{$user->address->city} - {$user->address->street}"}}</td>
                <td><a href="{{route('posts',$user->id)}}">{{"{$user->posts()->count()} posts"}}</a></td>
                <td>{{$user->company->name}}</td>
                <td>{{$user->website}}</td>
                <td>{{$user->phone}}</td>
                <td>{{$user->created_at->diffForHumans()}}</td>
            </tr>
        @endforeach
    </table>

    {!! $users->links() !!}

@endsection
