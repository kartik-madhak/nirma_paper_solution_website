@extends('layouts.app')
@section('content')


<div class="container-fluid text-light">
    <h2 >Site Activity</h2>
    <h2 >Users Logged In </h2>

    <div class="table-responsive col-lg-6   mb-3">

        <table id="data-table" class="display table table-striped table-dark table-hover text-center">
            <thead>
            <th>
                Username
            </th>
            <th>First time login date</th>

            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->created_at->toDateString()}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
