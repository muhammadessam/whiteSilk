@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h3>البلاد</h3>
                    <div>
                        <a href="{{route('admin.countries.create')}}" class="btn btn-success"><i class="fa fa-plus"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="countries" class="table table-hover non-hover">
                            <thead>
                            <tr>
                                <th></th>
                                <th>الاسم</th>
                                <th>الكود</th>
                                <th>الصورة</th>
                                <th>اجراء</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach(\App\Country::all() as $item)
                                <tr>
                                    <td>{{$item['id']}}</td>
                                    <td>{{$item['name']}}</td>
                                    <td>{{$item['code']}}</td>
                                    <td>
                                        <img class="rounded-circle" src="{{asset($item['img'])}}" alt="" style="width: 100px;height: 100px;">
                                    </td>
                                    <td>
                                        <ul class="table-controls">
                                            <li>
                                                <a href="{{route('admin.countries.edit', $item)}}" title="تعديل"><i class="fa fa-edit text-primary"></i></a>
                                            </li>
                                            <li>
                                                <form action="{{route('admin.countries.destroy', $item)}}" method="post" onsubmit="return confirm('هل انت متاكد؟')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="delete-btn text-danger" type="submit" title="حذف"><i class="fa fa-trash"></i></button>
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
    <x-datatable id="countries"></x-datatable>
@endsection
