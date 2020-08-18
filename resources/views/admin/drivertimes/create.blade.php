@extends('layouts.admin')
@section('content')
    <div class="row layout-top-spacing">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="d-inline-block">اضافة جديد</h3>
                    <div class="d-inline-block float-right">
                        <a href="" title="عرض الكل" class="btn btn-primary"><i class="fa fa-list"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.drivers-times.store')}}" class="form" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="from" class="font-weight-bold">بداية من:</label>
                            <input type="time" name="from" id="from" class="form-control" value="{{old('from')}}">
                            <x-error title="from"></x-error>

                        </div>
                        <div class="form-group">
                            <label for="from" class="font-weight-bold">نهاية الي :</label>
                            <input type="time" name="to" id="to" class="form-control" value="{{old('to')}}">
                            <x-error title="to"></x-error>

                        </div>
                        <div class="form-group">
                            <label for="max" class="font-weight-bold">اقصي عدد</label>
                            <input type="number" name="max" id="max" class="form-control" value="{{old('max')}}">
                            <x-error title="max"></x-error>
                        </div>

                        <button class="btn btn-success" type="submit"><i class="fa fa-plus"></i> حفظ</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
