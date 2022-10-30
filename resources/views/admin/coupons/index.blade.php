@extends('admin.layouts.app')
@section('title', 'List Coupons')
@section('form', 'Coupons')
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
                                    <th>Type</th>
                                    <th>Value</th>
                                    <th>Expery Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($coupons as $coupon )
                                <tr>
                                    <td class="serial"> {{$coupon->id}}</td>
                                    <td> <span class="name"> {{$coupon->name}} </span> </td>
                                    <td> <span class="name"> {{$coupon->type}} </span> </td>
                                    <td><span class="">{{$coupon->value}}</span></td>
                                    <td><span class="">{{date('d-m-Y', strtotime($coupon->expery_date))}}</span></td>
                                    <td>
                                        <a href="{{route('coupons.edit', $coupon->id)}}" class="badge btn btn-info">Edit</a>
                                        <form action="{{route('coupons.destroy', $coupon->id)}}" method="post" id="form-delete{{ $coupon->id }}">
                                            @csrf
                                            @method('delete')
                                        </form>
                                        <button class="badge btn btn-delete btn-danger" data-id={{ $coupon->id }}  >Delete</button>
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