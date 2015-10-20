@extends('layouts.MasterMt')
@section('title','Ajaxis Materialize')
@section('content')
<a href = '#modal1' class = 'create btn-floating btn-large blue modal-trigger' data-link = '/ContactMt/create/'><i class = 'material-icons'>add</i></a>

<table class = 'hoverable centered' id = 'friendTable'>
    <thead>
        <th>FirstName</th>
        <th>LastName</th>
        <th>Date</th>
        <th>Phone</th>
        <th>Action</th>
    </thead>
    <tbody>
        @foreach ($contacts as $test)
        <tr>
            <td>{{$test->firstname}}</td>
            <td>{{$test->lastname}}</td>
            <td>{{$test->date}}</td>
            <td>{{$test->phone}}</td>
            <td>
                <a href = '#modal1' class = 'delete btn-floating red  modal-trigger' data-link = '/ContactMt/{{$test->id}}/delete/'><i class="material-icons">delete</i></a>
                <a href = '#modal1' class = 'edit btn-floating green modal-trigger'  data-link = '/ContactMt/{{$test->id}}/edit/'><i class = 'material-icons'>system_update_alt</i></a>
                <a href = '#modal1'  class = 'show btn-floating blue modal-trigger'  data-link = '/ContactMt/{{$test->id}}/show/'><i class = 'material-icons'>add</i></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection