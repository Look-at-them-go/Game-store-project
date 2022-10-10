@extends('admin.admin_panel')

@section('title','Crate Manager')

@section('admin_content')

    <form class="space-y-3" action="/admin/add-manager" method="post">
        @csrf
        Name:
        <input type="text" name="name"><br>
        Email:
        <input type="email" name="email" id=""><br>
        Password:
        <input type="text" name="pass" id=""><br>

        <input class="p-2 rounded hover:bg-indigo-300 cursor-pointer" type="submit" value="Submit">
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