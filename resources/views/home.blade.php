@extends('layouts.app')
@section('content')

    <div class="container text-center">

        <div class="active-cyan-4 mb-3">
            <form action="">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="search" placeholder="Search" value="{{$search}}">
                    <div class="input-group-append">
                        <button class="btn btn-outline-success" type="button">Search</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="table-responsive">

        <table id="data-table" class="display table table-striped table-dark">
            <thead>
            <tr>
                <th>Link</th>
                <th>Paper Name</th>
                <th>Course Name</th>
                <th>Course Code</th>
                <th>Paper Year</th>
            </tr>
            </thead>
            <tbody>
                @foreach($papers as $paper)
                    <tr>
                        <td><a href="{{$paper->url}}">Download here</a></td>
                        <td>{{$paper->paper_name}}</td>
                        <td>{{$paper->name}}</td>
                        <td>{{$paper->code}}</td>
                        <td>{{$paper->year}}</td>
                    </tr>
                @endforeach
            </tbody>

        </table>
            <div class="text-center d-inline-flex">
                {{ $papers->links() }}
            </div>
        </div>

        <table class="table table-dark table-striped m-auto" style="width: fit-content">
            <thead>
                <th>
                    Users online in the last 1 minute
                </th>
            </thead>
            @foreach($users as $user)
            @if ($user->isOnline())
                <tr>
                    <td>{{$user->name}}</td>
                </tr>
            @endif
            @endforeach
        </table>
    </div>
@endsection
