@extends('admin.layouts.app')
@section('title', 'List Users')
@section('content')
<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Table</a></li>
                            <li class="active">@yield('title')</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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
                                        <a href="{{route('users.edit', $user->id)}}" class="badge btn btn-secondary">Edit</a>
                                        <form action="{{route('users.destroy', $user->id)}}" method="post" id="form-delete{{ $user->id }}">
                                            @csrf
                                            @method('delete')
                                        <button class="badge btn btn-delete btn-danger" data-id={{ $user->id }} onclick="return confirm('Delete it??');" >Delete</button>
                                        </form>
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