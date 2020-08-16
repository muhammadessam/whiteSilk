@extends('layouts.admin')
@section('content')
    <div class="row layout-top-spacing">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="d-inline-block">تعديل</h3>
                    <div class="d-inline-block float-right">
                        <a href="{{route('admin.subscription-types.index')}}" title="عرض الكل" class="btn btn-primary"><i class="fa fa-list"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <form class="form-inline" action="{{route('admin.subscription-types.update', $subscriptionType)}}" method="post">
                        @csrf
                        @method('PATCH')
                        <input class="form-control" type="text" name="name" id="name" placeholder="ادخل نوع جديد ..." value="{{$subscriptionType['name']}}">
                        <button type="submit" href="{{route('admin.subscription-types.create')}}" class="btn btn-success"><i class="fa fa-save"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
