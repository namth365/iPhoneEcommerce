@extends('admin.layouts.app')
@section('title', 'Edit Role '.$role->name)
@section('form', 'Roles')
@section('content')

<div class="content">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong>@yield('title')</strong> {{$role->name}}
                    </div>
                    <div class="card-body card-block">
                        <form action=" {{route('roles.update', $role->id)}} " method="post" class="form-horizontal">
                            @csrf
                            @method('put')
                            <div class="row form-group">
                                <div class="col col-md-2"><label for="text-input"
                                        class=" form-control-label">Name</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="text-input"
                                        value="{{old('name') ?? $role->name }}" name="name" class="form-control">
                                    @error('name')
                                    <span class="text-danger"> {{$message}} </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-2"><label for="text-input"
                                        class=" form-control-label">Display Name</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="text-input"
                                        value="{{old('display_name') ?? $role->display_name}}" name="display_name"
                                        class="form-control">
                                    @error('display_name')
                                    <span class="text-danger"> {{$message}} </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-2"><label for="select"
                                        class=" form-control-label">Group</label></div>
                                <div class="col-12 col-md-9">
                                    <select name="group" id="select" class="form-control" value=" {{$role->group}}">
                                        <option {{$role->group== 'system' ?'selected' :''}} value="system">
                                            System</option>
                                        <option {{$role->group== 'user' ?'selected' :''}} value="user">
                                            User</option>
                                    </select>
                                </div>
                                @error('group')
                                <span class="text-danger"> {{$message}} </span>
                                @enderror
                            </div>
                            <div class="row form-group">
                                <div class="col col-2"><label class=" form-control-label">Permissions</label></div>
                                @foreach ($permissions as $groupName => $permission)
                                <div class="col col-2">
                                    <strong class="">{{$groupName}}</strong>
                                    <div class="form-check col col-md-2">
                                        @foreach ($permission as $item)
                                        <div class="checkbox">
                                            <label for="checkbox1" class="form-check-label ">
                                                <input type="checkbox" id="checkbox1" name="permission_ids[]"
                                                    {{$role->permissions->contains('name', $item->name) ? 'checked'
                                                : '' }}
                                                value="{{$item->id}}" class="form-check-input">
                                                {{$item->display_name}}
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
                                <a href="{{route('roles.index')}}" type="reset" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Unsaved data! Back??');">
                                    Back
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection