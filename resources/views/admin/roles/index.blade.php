@extends('layouts.admin')
@section('content')

    <div class="row layout-top-spacing">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h3 class="card-title">الصلاحيات</h3>
                    <div class="card-text">
                        <a class="btn btn-success" href="{{route('admin.roles.create')}}"><i class="fa fa-plus"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive mb-4 mt-4">
                        <table id="roles" class="table table-hover non-hover" style="width:100%">
                            <thead>
                            <tr>
                                <th></th>
                                <th>الاسم</th>
                                <th>اجراء</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach(\Silber\Bouncer\Database\Role::all() as $item)
                                <tr>
                                    <td></td>
                                    <td>{{$item['name']}}</td>
                                    <td>
                                        <ul class="table-controls">
                                            <li>
                                                <a href="{{route('admin.roles.show', $item)}}" title="عرض"><i class="fa fa-eye text-dark"></i></a>
                                            </li>
                                            <li>
                                                <a href="{{route('admin.roles.edit', $item)}}" title="تعديل"><i class="fa fa-edit text-primary"></i></a>
                                            </li>
                                            <li>
                                                <form action="{{route('admin.roles.destroy', $item)}}" method="post" onsubmit="return confirm('هل انت متاكد؟')">
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
    <x-datatable id="roles"></x-datatable>
@endsection
