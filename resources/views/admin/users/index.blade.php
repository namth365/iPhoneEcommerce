@extends('admin.layouts.app')
@section('title', 'List')
@section('form', 'User')
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
                                    <th>Avatar</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Gender</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user )
                                <tr>
                                    <td class="serial"> {{$user->id}}</td>
                                    <td><img src="{{ $user->images ? asset('upload/' . $user->images->url) : 'upload/default.png' }}" width="180px"></td>
                                    <td>  <span class="name"> {{$user->name}} </span> </td>
                                    <td> <span class="product">{{$user->email}}</span> </td>
                                    <td> <span class="product">{{$user->phone}}</span> </td>
                                    <td> <span class="product">{{$user->address}}</span> </td>
                                    <td><span class="">{{$user->gender}}</span></td>
                                    <td>
                                        <a href="{{route('users.edit', $user->id)}}" class="badge btn btn-info">Edit</a>
                                        <form action="{{route('users.destroy', $user->id)}}" method="post" id="form-delete{{ $user->id }}">
                                            @csrf
                                            @method('delete')
                                        </form>
                                        <button class="badge btn btn-delete btn-danger" data-id={{ $user->id }}  >Delete</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div>
@endsection