@extends('layouts.admin')
@section('content')

    <div class="row layout-top-spacing">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h3 class="card-title">السائقين</h3>
                    <div class="card-text">
                        <a class="btn btn-success" href="{{route('admin.drivers.create')}}"><i class="fa fa-plus"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive mb-4 mt-4">
                        <table id="drivers" class="table table-hover non-hover" style="width:100%">
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
                            @foreach(\App\User::where('type', 'سائق')->get() as $item)
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
                                                <a href="{{route('admin.drivers.show', $item)}}" title="عرض">
                                                    <i class="fa fa-eye text-dark"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{route('admin.drivers.edit', $item)}}" title="تعديل"><i class="text-primary fa fa-edit"></i></a>
                                            </li>
                                            <li>
                                                <form action="{{route('admin.drivers.destroy', $item)}}" method="post"
                                                      onsubmit="return confirm('هل انت متاكد؟')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="delete-btn" type="submit" title="حذف"><i class="text-danger fa fa-trash"></i></button>
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
@section('js')
    <x-datatable id="drivers" mass="{{route('admin.drivers.mass.destroy')}}"></x-datatable>
@endsection
