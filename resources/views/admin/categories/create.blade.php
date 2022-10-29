@extends('admin.layouts.app')
@section('title', 'Create Category')
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
                            <li><a href="#">Forms</a></li>
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
                            <button type="submit" class="btn btn-success btn-sm">
                               Submit
                            </button>
                            <a href="{{route('categories.index')}}" type="reset" class="btn btn-danger btn-sm" onclick="return confirm('Unsaved data! Back??');">
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