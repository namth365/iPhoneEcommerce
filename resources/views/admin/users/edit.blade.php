@extends('admin.layouts.app')
@section('title', 'Edit User '.$user->name)
@section('form', 'User')
@section('content')

<div class="content">
    <div class="animated fadeIn">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <strong>@yield('title')</strong> {{$user->name}}
                </div>
                <div class="card-body card-block">
                    <form action=" {{route('users.update', $user->id)}} " method="post" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class=" input-group-static col-5 mb-4">
                                <label>Image</label>
                                <input type="file" accept="image/*" name="image" id="image-input" class="form-control" >
                                @error('image')
                                    <span class="text-danger"> {{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-5">
                                <img src="{{ $user->images ? asset('upload/' . $user->images->url) : 'upload/default.png' }}" id="show-image" alt="" style="width: 200px">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-2"><label for="text-input" class=" form-control-label">Name</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="text-input" value="{{ old('name') ?? $user->name }}" name="name"  class="form-control">
                                @error('name')
                                <span class="text-danger"> {{$message}} </span>
                            @enderror
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-2"><label for="text-input" class=" form-control-label">Email</label></div>
                            <div class="col-12 col-md-9"><input type="email" id="text-input" value="{{ old('email') ?? $user->email }}" name="email"  class="form-control">
                                @error('email')
                                <span class="text-danger"> {{$message}} </span>
                            @enderror
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-2"><label for="text-input" class=" form-control-label">Phone</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="text-input" value="{{ old('phone') ?? $user->phone }}" name="phone" class="form-control">
                                @error('phone')
                                <span class="text-danger"> {{$message}} </span>
                            @enderror
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label class=" form-control-label">Gender</label></div>
                            <div class="col col-md-9">
                                <div class="form-check"  >
                                    <div class="radio">
                                        <label for="radio1" class="form-check-label ">
                                            <input type="radio" id="radio1" name="gender" {{$user->gender == 'male' ?'checked' :''}} value="male" class="form-check-input">Male
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label for="radio2" class="form-check-label ">
                                            <input type="radio" id="radio2" name="gender" {{$user->gender == 'fe-male' ?'checked' :''}}  value="fe-male" class="form-check-input">Fe-Male
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-2"><label for="text-input" class=" form-control-label">Address</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="text-input" value="{{old('address') ?? $user->address}}" name="address"  class="form-control">
                                @error('address')
                                <span class="text-danger"> {{$message}} </span>
                            @enderror
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-2"><label for="text-input" class=" form-control-label">Password</label></div>
                            <div class="col-12 col-md-9"><input type="password" id="text-input" value="{{old('password')?? $user->password}}" name="password"  class="form-control">
                                @error('password')
                                <span class="text-danger"> {{$message}} </span>
                            @enderror
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-2"><label class=" form-control-label">Roles</label></div>
                            @foreach ($roles as $groupName => $role)
                            <div class="col col-2">
                                <strong class="">{{$groupName}}</strong> 
                                <div class="form-check col col-md-2">
                                @foreach ($role as $item)
                                    <div class="checkbox">
                                        <label for="checkbox1" class="form-check-label ">
                                            <input type="checkbox" id="checkbox1"  {{ $user->roles->contains('id', $item->id) ? 'checked' : '' }} name="role_ids[]" value="{{$item->id}}" class="form-check-input"> {{$item->display_name}}
                                        </label>
                                    </div>
                                @endforeach
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="col col-md-2">
                            <button type="submit" class="btn btn-success btn-sm">
                               Submit
                            </button>
                            <a href="{{route('users.index')}}" type="reset" class="btn btn-danger btn-sm" onclick="return confirm('Unsaved data! Back??');">
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