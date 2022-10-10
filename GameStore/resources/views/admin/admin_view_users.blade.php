@extends('admin.admin_panel')

@section('title','Activity')

@section('admin_content')

<div class="grid grid-cols-1 content-center">
    <table class="border-collapse table-auto">
        @foreach ($users as $act )
            @if ($act->role_id == 3)
                <tr class="p-3 hover:bg-gray-400">
                    <td class="p-3"><a class="text-xl" href="show-activity/{{ $act->id }}">{{ $act->name }}</a></td>
                </tr>   
            @endif
        @endforeach
    </table>
</div>


@stop