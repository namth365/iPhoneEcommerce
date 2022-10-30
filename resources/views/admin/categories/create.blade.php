@extends('admin.layouts.app')
@section('title', 'Create Category')
@section('form', 'Categories' )
@section('content')

<div class="content">
    <div class="animated fadeIn">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <strong>Create New Category</strong> 
                </div>
                <div class="card-body card-block">
                    <form action=" {{route('categories.store')}} " method="post" class="form-horizontal" enctype="multipart/form-data">
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
                            <div class="col col-md-2"><label for="select" class=" form-control-label">Parent Category</label></div>
                            <div class="col-12 col-md-9">
                                <select name="parent_id" id="select" class="form-control">
                                    <option value="">None</option>
                                    @foreach ($parentCategories as $item )
                                    <option value="{{ $item->id }}" {{ old('parent_id') == $item->id ? 'selected' : '' }}> {{$item->name}} </option>
                                    @endforeach
                                </select>
                            </div>
                            @error('parent_id')
                            <span class="text-danger"> {{$message}} </span>
                        @enderror
                        </div>
                        <div class="col col-md-2">
                            <button type="submit" class="btn btn-info btn-sm">
                               Submit
                            </button>
                            <a href="{{route('categories.index')}}" type="back" class="btn btn-back btn-danger btn-sm" >
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