@extends('admin.admin_panel')

@section('title','Create Admin')

@section('admin_content')

    <form class="space-y-3" action="/admin/add-admin" method="post">
        @csrf

        <span>Name:</span> 
        <input type="text" name="name"><br>
    
        <span>Email:</span>   
        <input type="email" name="email" id=""><br>

        <span>Password:</span>
        <input type="text" name="pass" id=""><br>
        <input class="p-2 rounded hover:bg-indigo-300 cursor-pointer" type="submit" value="Submit"><br>
    </form>

    @if (\Session::has('success'))
        <div class="alert alert-success text-green-600">
            <ul>
                <li>{!! \Session::get('success') !!}</li>
            </ul>
        </div>
    @endif

    <div>
        @if ($errors->any())
            <ul class="text-red-500">
            @foreach ($errors->all() as $error)
                <li>
                    {{ $error }}
                </li>
            @endforeach
            </ul>
        @endif
    </div>
@stop