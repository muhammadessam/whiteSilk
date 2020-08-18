@extends('layouts.admin')
@section('content')
    <div class="row layout-top-spacing">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="d-inline-block">اضافة جديد</h3>
                    <div class="d-inline-block float-right">
                        <a href="{{route('admin.drivers.index')}}" title="عرض الكل" class="btn btn-primary"><i class="fa fa-list"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.drivers.store')}}" class="form" method="post" enctype="multipart/form-data">
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
                            <input type="text" name="password" id="password" class="form-control" value="{{old('password')}}">
                            <x-error title="password"></x-error>
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">تاكيد كلمة المرور</label>
                            <input type="text" name="password_confirmation" id="password_confirmation" class="form-control" value="{{old('password_confirmation')}}">
                            <x-error title="password_confirmation"></x-error>
                        </div>
                        <div class="custom-file-container" data-upload-id="img_temp">
                            <label>اختر صورة<a href="javascript:void(0)" class="custom-file-container__image-clear" title="حذف">x</a></label>
                            <label class="custom-file-container__custom-file">
                                <input type="file" class="custom-file-container__custom-file__custom-file-input" accept="image/*" name="img_temp">
                                <input type="hidden" name="MAX_FILE_SIZE" value="10485760"/>
                                <span class="custom-file-container__custom-file__custom-file-control"></span>
                            </label>
                            <div class="custom-file-container__image-preview"></div>
                        </div>


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
