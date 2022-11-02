@extends('admin.layouts.app')
@section('title', 'List Roles')
@section('form', 'Roles')
@section('content')

<div class="content">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">@yield('title') Table</strong>
                        @if (session('message'))
                        <strong class="text-success"> {{session('message')}} </strong>
                          @endif
                    </div>
                   
                    <div class="card-body">
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th class="">#</th>
                                    <th>Name</th>
                                    <th>Display Name</th>
                                    <th>Group</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $role )
                                <tr>
                                    <td class="serial"> {{$role->id}}</td>
                                    <td>  <span class="name"> {{$role->name}} </span> </td>
                                    <td> <span class="product">{{$role->display_name}}</span> </td>
                                    <td><span class="">{{$role->group}}</span></td>
                                    <td>
                                        <a href="{{route('roles.edit', $role->id)}}" class="badge btn btn-info">Edit</a>
                                        <form action="{{route('roles.destroy', $role->id)}}" method="post" id="form-delete{{ $role->id }}">
                                            @csrf
                                            @method('delete')
                                        </form>
                                        <button class="badge btn btn-delete btn-danger" data-id={{ $role->id }} >Delete</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection