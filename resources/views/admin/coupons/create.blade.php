@extends('admin.layouts.app')
@section('title', 'Create Coupon')
@section('form', 'Coupons' )
@section('content')

<div class="content">
    <div class="animated fadeIn">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <strong>Create New Coupon</strong> 
                </div>
                <div class="card-body card-block">
                    <form action=" {{route('coupons.store')}} " method="post" class="form-horizontal" >
                        @csrf
                        <div class="row form-group">
                            <div class="col col-md-2"><label for="text-input" class=" form-control-label">Name</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="text-input" value="{{old('name')}}" name="name" placeholder="Name" class="form-control">
                                @error('name')
                                <span class="text-danger"> {{$message}} </span>
                            @enderror
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-2"><label for="text-input" class=" form-control-label">Value</label></div>
                            <div class="col-12 col-md-9"><input type="number" id="text-input" value="{{old('value')}}" name="value" placeholder="Value" class="form-control">
                                @error('value')
                                <span class="text-danger"> {{$message}} </span>
                            @enderror
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-2"><label for="select" class=" form-control-label">Type</label></div>
                            <div class="col-12 col-md-9">
                                <select name="type" id="select" class="form-control">
                                    <option value="">None</option>
                                    <option value="money" {{ old('type') == 'money' ? 'selected' : '' }}> Money </option>
                                    <option value="cash" {{ old('type') == 'cash' ? 'selected' : '' }}> Cash </option>
                                </select>
                                @error('type')
                                <span class="text-danger"> {{$message}} </span>
                            @enderror
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-2"><label for="text-input" class=" form-control-label">Expery Date</label></div>
                            <div class="col-12 col-md-9"><input type="date" id="text-input" value="{{old('expery_date')}}" name="expery_date" class="form-control">
                                @error('expery_date')
                                <span class="text-danger"> {{$message}} </span>
                            @enderror
                            </div>
                        </div>

                        <div class="col col-md-2">
                            <button type="submit" class="btn btn-info btn-sm">
                               Submit
                            </button>
                            <a href="{{route('coupons.index')}}" type="back" class="btn btn-back btn-danger btn-sm" >
                                Back
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div><!-- .animated -->
@endsection