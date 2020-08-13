@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h3>المدن</h3>
                    <div>
                        <a href="{{route('admin.cities.create')}}" class="btn btn-success"><i class="fa fa-plus"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="cities" class="table table-striped">
                            <thead>
                            <tr>
                                <th></th>
                                <th>الاسم</th>
                                <th>سعر التوصيل</th>
                                <th>الدولة</th>
                                <th>الحالة</th>
                                <th>اجراء</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach(\App\City::all() as $item)
                                <tr>
                                    <td>{{$item['id']}}</td>
                                    <td>{{$item['name']}}</td>
                                    <td>{{$item['price']}}</td>
                                    <td>{{$item->country->name}}</td>
                                    <td>
                                        @if($item['is_active'])
                                            <span class="badge badge-success"> Active </span>
                                        @else
                                            <span class="badge badge-danger"> Inactive </span>
                                        @endif
                                    </td>
                                    <td>
                                        <ul class="table-controls">
                                            <li>
                                                <a href="{{route('admin.cities.edit', $item)}}" title="تعديل"><i class="fa fa-edit text-primary"></i></a>
                                            </li>
                                            <li>
                                                <form action="{{route('admin.cities.destroy', $item)}}" method="post" onsubmit="return confirm('هل انت متاكد؟')">
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
@section('js')
    <x-datatable id="cities"></x-datatable>
@endsection
