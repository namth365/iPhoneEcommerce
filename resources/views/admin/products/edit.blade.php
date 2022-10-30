@extends('admin.layouts.app')
@section('title', 'Edit Product: '.$product->name )
@section('form', 'Products')
@section('content')

<div class="content">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong>@yield('title')</strong>
                    </div>
                    <div class="card-body card-block">
                        <form action=" {{route('products.update', $product->id)}} " method="post"
                            class="form-horizontal" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class=" input-group-static col-5 mb-4">
                                    <label>Image</label>
                                    <input type="file" accept="image/*" name="image" id="image-input"
                                        class="form-control">
                                    @error('image')
                                    <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-5">
                                    <img src="{{ $product->images ? asset('upload/' . $product->images->url) : 'upload/default.png' }}"
                                        id="show-image" alt="" style="width: 200px">
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-2"><label for="text-input"
                                        class=" form-control-label">Name</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="text-input"
                                        value="{{ old('name') ?? $product->name }}" name="name"
                                        class="form-control">
                                    @error('name')
                                    <span class="text-danger"> {{$message}} </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-2"><label for="text-input"
                                        class=" form-control-label">Description</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="text-input"
                                        value="{{ old('name') ?? $product->name }}" name="description"
                                        class="form-control">
                                    @error('description')
                                    <span class="text-danger"> {{$message}} </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-2"><label for="text-input"
                                        class=" form-control-label">Sizes</label></div>
                                <div class="col-3 ">
                                    <strong type="text" id="text-input"> Size </strong>
                                    <select name="size" id="select" class="form-control">
                                        <option value="64" {{ old('size') == '64' ? 'selected' : ''}}>64 GB</option>
                                        <option value="128" {{ old('size') == '128' ? 'selected' : ''}}>128 GB</option>
                                        <option value="512" {{ old('size') == '512' ? 'selected' : ''}}>512 GB</option>
                                        <option value="1000" {{ old('size') == '1000' ? 'selected' : ''}}>1 TB</option>
                                    </select>
                                </div>
                                <div class="col-3 ">
                                    <strong type="text" id="text-input"> Price </strong>
                                    <input type="number" id="text-input"
                                        value="{{ old('price') ?? $product->price }}" name="price"
                                        class="form-control">
                                </div>
                                <div class="col-3 ">
                                    <strong type="text" id="text-input"> Color </strong>
                                    <select name="color" id="select"  class="form-control">
                                        <option value="gold" {{ old('color') == 'gold' ? 'selected' : ''}}>Gold</option>
                                        <option value="purple" {{ old('color') == 'purple' ? 'selected' : ''}}>Purple</option>
                                        <option value="silver" {{ old('color') == 'silver' ? 'selected' : ''}}>Silver</option>
                                        <option value="black" {{ old('color') == 'black' ? 'selected' : ''}}>Black</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-2"><label for="text-input"
                                        class=" form-control-label">Sale</label></div>
                                <div class="col-12 col-md-9"><input type="number" id="text-input"
                                        value="{{ old('sale') ?? $product->sale}}" name="sale" class="form-control">
                                    @error('sale')
                                    <span class="text-danger"> {{$message}} </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-2"><label for="text-input"
                                        class=" form-control-label">Quantity</label></div>
                                <div class="col-12 col-md-9"><input type="number" id="text-input"
                                        value="{{old('quantity')?? $product->quantity}}" name="quantity"
                                        class="form-control">
                                    @error('quantity')
                                    <span class="text-danger"> {{$message}} </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-2"><label for="select"
                                        class=" form-control-label">Category</label></div>
                                <div class="col-12 col-md-9">
                                    <select name="category_ids[]" id="select" class="form-control">
                                        @foreach ($categories as $item)
                                        <option value="{{$item->id}}" {{ $product->categories->contains('id',
                                            $item->id) ? 'selected' : '' }} >{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('category_ids')
                                <span class="text-danger"> {{$message}} </span>
                                @enderror
                            </div>

                            <div class="col col-md-2">
                                <button type="submit" class="btn btn-success btn-sm">
                                    Submit
                                </button>
                                <a href="{{route('products.index')}}" type="reset" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Unsaved data! Back??');">
                                    Back
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div>
@endsection