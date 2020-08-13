@extends('layouts.admin')
@section('content')

    <div class="row layout-top-spacing">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h3 class="card-title">الصلاحيات</h3>
                    <div class="card-text">
                        <a class="btn btn-success" href="{{route('admin.users.create')}}"><i class="fa fa-plus"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive mb-4 mt-4">
                        <table id="roles" class="table table-hover non-hover" style="width:100%">
                            <thead>
                            <tr>
                                <th></th>
                                <th>الاسم</th>
                                <th>البريد</th>
                                <th>الهاتف</th>
                                <th>الصورة</th>
                                <th>اجراء</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach(\App\User::all() as $item)
                                <tr>
                                    <td>{{$item['id']}}</td>
                                    <td>{{$item['name']}}</td>
                                    <td>{{$item['email']}}</td>
                                    <td>{{$item['phone']}}</td>
                                    <td>
                                        <img class="rounded-circle" style="width: 100px;height: 100px;" src="{{asset($item['img'])}}" alt="">
                                    </td>
                                    <td>
                                        <ul class="table-controls">
                                            <li>
                                                <a href="{{route('admin.users.show', $item)}}" title="عرض">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{route('admin.users.edit', $item)}}" title="تعديل"><i class="fa fa-edit"></i></a>
                                            </li>
                                            <li>
                                                <form action="{{route('admin.users.destroy', $item)}}" method="post"
                                                      onsubmit="return confirm('هل انت متاكد؟')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="delete-btn" type="submit" title="حذف"><i class="fa fa-trash"></i></button>
                                                </form>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('javascript')
    <x-datatable id="roles"></x-datatable>
@endsection
