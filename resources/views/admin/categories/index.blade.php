@extends('admin.layouts.app')
@section('title', 'List Categories')
@section('form', 'Categories')
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
                                    <th>Parent ID</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category )
                                <tr>
                                    <td class="serial"> {{$category->id}}</td>
                                    <td> <span class="name"> {{$category->name}} </span> </td>
                                    <td><span class="">{{$category->parent_name}}</span></td>
                                    <td>
                                        <a href="{{route('categories.edit', $category->id)}}" class="badge btn btn-info">Edit</a>
                                        <form action="{{route('categories.destroy', $category->id)}}" method="post" id="form-delete{{ $category->id }}">
                                            @csrf
                                            @method('delete')
                                        </form>
                                        <button class="badge btn btn-delete btn-danger" data-id={{ $category->id }}  >Delete</button>
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