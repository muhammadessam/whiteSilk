@extends('layouts.admin')
@section('content')

    <div class="row layout-top-spacing">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3>{{$user['name']}}</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label><strong>البريد:</strong></label>
                                <div class="form-control">
                                    {{$user['email']}}
                                </div>
                            </div>
                            <div class="form-group">
                                <label><strong>الصورة:</strong></label>
                                <div class="img-content">
                                    <img src="{{asset($user['img'])}}" alt="" style="width: 100px; height: 100px">
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label><strong>الهاتف:</strong></label>
                                <div class="form-control">
                                    {{$user['phone']}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    الادوار
                </div>
                <div class="card-body">
                    <form action="{{route('admin.role.user.store', $user)}}" method="post">
                        @csrf
                        @foreach(\Silber\Bouncer\Database\Role::all() as $role)
                            <div class="form-group">
                                <label class="switch s-icons s-outline s-outline-default mr-2 s-outline-success">
                                    <input type="checkbox" {{$user->roles->contains($role) ? 'checked' : ''}} name="roles[]" value="{{$role['id']}}">
                                    <span class="slider round"></span>
                                </label>
                                <label>{{$role['name']}}</label>
                            </div>
                        @endforeach

                        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> حفظ</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
