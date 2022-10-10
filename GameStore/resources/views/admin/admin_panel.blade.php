@extends('layout')

@section('title','Admin Panel')

@section('menu')

<li class="py-2 hover:bg-indigo-300 rounded text-center">
    <a href="/admin/panel/game">ADD GAME</a>
</li>
<li class="py-2 hover:bg-indigo-300 rounded text-center">
    <a href="/admin/panel/genre">ADD GENRE</a>
</li>
<li class="py-2 hover:bg-indigo-300 rounded text-center">
    <a href="/admin/panel/modify">MODIFY GAMES</a>
</li>
<li class="py-2 hover:bg-indigo-300 rounded text-center">
    <a href="/admin/panel/activity">USER ACTIVITY</a>
</li>
<li class="py-2 hover:bg-indigo-300 rounded text-center">
    <a href="/admin/panel/make-admin">ADD ADMIN</a>
</li>
<li class="py-2 hover:bg-indigo-300 rounded text-center">
    <a href="/admin/panel/make-manager">ADD MANAGER</a>
</li>
<li class="py-2 hover:bg-indigo-300 rounded text-center">
    <a href="/">STORE PAGE</a>
</li>

@stop

@section('content')

    @yield('admin_content')

@stop