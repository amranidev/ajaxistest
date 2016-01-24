@extends('layouts.MasterBt')
@section('title','Contact Bootstrap')
@section('content')
<button data-toggle="modal" data-target="#myModal" class = 'create btn btn-primary' data-link = '/ContactBt/create'><i class = 'material-icons'>add</i></button>
<table class = 'table table-hover'>
    <thead>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Date</th>
        <th>Phone</th>
        <th>Actions</th>
    </thead>
    <tbody>
        @foreach ($contacts as $test)
        <tr>
            <td>{{$test->firstname}}</td>
            <td>{{$test->lastname}}</td>
            <td>{{$test->date}}</td>
            <td>{{$test->phone}}</td>
            <td>
                <div class = 'row'>
                    <button data-toggle="modal" data-target="#myModal" class = 'delete btn btn-danger btn-xs' data-link = '/ContactBt/{{$test->id}}/delete'><i class = 'Small material-icons'>delete</i></button>
                    <button data-toggle="modal" data-target="#myModal" class = 'edit btn btn-success btn-xs'  data-link = '/ContactBt/{{$test->id}}/edit'><i class = 'material-icons'>mode_edit</i></button>
                    <button data-toggle="modal" data-target="#myModal" class = 'display btn btn-primary btn-xs'  data-link = '/ContactBt/{{$test->id}}/show'><i class = 'material-icons'>info</i></button>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
