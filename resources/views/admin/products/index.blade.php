@extends('admin.layouts.app')
@section('title', 'List Products')
@section('form', 'Products')
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
                                    <th>Descripton</th>
                                    <th>Sale</th>
                                    <th>Quantity</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product )
                                <tr>
                                    <td class="serial"> {{$product->id}}</td>
                                    <td><img src="{{ $product->images ? asset('upload/' . $product->images->url) : 'upload/default.png' }}" width="180px"></td>
                                    <td>  <span class="name"> {{$product->name}} </span> </td>
                                    <td> <span class="product">{{$product->description}}</span> </td>
                                    <td> <span class="product">{{ number_format($product->sale)}}</span> </td>
                                    <td> <span class="product">{{ number_format($product->quantity)}}</span> </td>
                                    <td>
                                        <a href="{{route('products.edit', $product->id)}}" class="badge btn btn-info">Edit</a>
                                        <form action="{{route('products.destroy', $product->id)}}" method="post" id="form-delete{{ $product->id }}">
                                            @csrf
                                            @method('delete')
                                        </form>
                                        <button class="badge btn btn-delete btn-danger" data-id={{ $product->id }}  >Delete</button>
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