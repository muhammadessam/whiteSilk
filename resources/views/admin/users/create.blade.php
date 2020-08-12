@extends('layouts.admin')
@section('content')
    <div class="row layout-top-spacing">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="d-inline-block">اضافة مستخدم جديد</h3>
                    <div class="d-inline-block float-right">
                        <a href="{{route('admin.users.index')}}" class="btn btn-primary"><i class="fa fa-list"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.users.create')}}" class="form" method="post">
                        @csrf

                        <button type="submit"></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
