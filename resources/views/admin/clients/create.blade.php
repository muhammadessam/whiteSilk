@extends('layouts.admin')
@section('content')
    <div class="row layout-top-spacing">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="d-inline-block">اضافة جديد</h3>
                    <div class="d-inline-block float-right">
                        <a href="{{route('admin.clients.index')}}" title="عرض الكل" class="btn btn-primary"><i class="fa fa-list"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.clients.store')}}" class="form" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">الاسم</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{old('name')}}">
                            <x-error title="name"></x-error>
                        </div>
                        <div class="form-group">
                            <label for="email">البريد</label>
                            <input type="email" name="email" id="email" class="form-control" value="{{old('email')}}">
                            <x-error title="email"></x-error>
                        </div>
                        <div class="form-group">
                            <label for="phone">الهاتف</label>
                            <input type="text" name="phone" id="phone" class="form-control" value="{{old('phone')}}">
                            <x-error title="phone"></x-error>
                        </div>
                        <div class="form-group">
                            <label for="password">كلمة المرور</label>
                            <input type="password" name="password" id="password" class="form-control" value="{{old('password')}}">
                            <x-error title="password"></x-error>
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">تاكيد كلمة المرور</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" value="{{old('password_confirmation')}}">
                            <x-error title="password_confirmation"></x-error>
                        </div>

                        <x-number name="credit" value="{{old('credit')}}" title="الرصيد"></x-number>

                        <x-img></x-img>


                        <button class="btn btn-success" type="submit"><i class="fa fa-plus"></i> حفظ</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        firstUpload = new FileUploadWithPreview('img_temp')
    </script>
@endsection
