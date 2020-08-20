@extends('layouts.admin')
@section('content')
    <div class="row layout-top-spacing">
        <div class="col">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h3>الفروع</h3>
                    <div>
                        <a href="{{route('admin.branches.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="branches" class="table table-striped">
                            <thead>
                            <tr>
                                <th></th>
                                <th>الاسم</th>
                                <th>رقم الفاتورة المسبق</th>
                                <th>يدعم التطبيق</th>
                                <th>المدينة/المنطقة</th>
                                <th>تفاصيل العنوان</th>
                                <th>اجراء</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach(\App\Branch::all() as $item)
                                <tr>
                                    <td>{{$item['id']}}</td>
                                    <td>{{$item['name']}}</td>
                                    <td>{{$item['bill_prefix']}}</td>
                                    <td>
                                        @if($item['is_app'])
                                            <span class="badge badge-success">يدعم</span>
                                        @else
                                            <span class="badge badge-danger">لا يدعم</span>
                                        @endif
                                    </td>
                                    <td>{{$item->city ? $item->city->name : ''}} - {{$item->area ? $item->area->name : ''}}</td>
                                    <td>{{$item->details}}</td>
                                    <td class="d-flex">
                                        <a href="{{route('admin.branches.edit', $item)}}"><i class="fa fa-edit text-primary"></i></a>
                                        <form action="{{route('admin.branches.destroy', $item)}}" method="post" onsubmit="return confirm('هل انت متاكد ؟')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="delete-btn"><i class="fa fa-trash text-danger"></i></button>
                                        </form>
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
    <x-datatable id="branches" mass="{{route('admin.branches.mass.destroy')}}"></x-datatable>
@endsection
