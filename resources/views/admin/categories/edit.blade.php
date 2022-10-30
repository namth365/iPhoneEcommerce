@extends('admin.layouts.app')
@section('title', 'Edit Category '.$category->name)
@section('form', 'Categories')
@section('content')

<div class="content">
    <div class="animated fadeIn">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <strong>@yield('title')</strong>  {{$category->name}}
                </div>
                <div class="card-body card-block">
                    <form action=" {{route('categories.update', $category->id)}} " method="post" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="row form-group">
                            <div class="col col-md-2"><label for="text-input" class=" form-control-label">Name</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="text-input" value="{{old('name') ?? $category->name }}" name="name" class="form-control">
                                @error('name')
                                <span class="text-danger"> {{$message}} </span>
                            @enderror
                            </div>
                        </div>
                        @if ($category->childrens->count() < 1)
                        <div class="row form-group">
                            <div class="col col-md-2"><label for="select" class=" form-control-label">Parent Category</label></div>
                            <div class="col-12 col-md-9">
                                <select name="parent_id" id="select" class="form-control">
                                    @foreach ($parentCategories as $item )
                                    <option value="{{$item->id}}" 
                                         {{(old('parent_id') ?? $category->parent_id) == $item->id ? 'selected' : ''}} > 
                                         {{$item->name}} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        @endif
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