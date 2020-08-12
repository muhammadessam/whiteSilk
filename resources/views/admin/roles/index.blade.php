@extends('layouts.admin')
@section('content')

    <div class="row layout-top-spacing">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h3 class="card-title">الصلاحيات</h3>
                        <div class="card-text">
                            <a class="btn btn-success" href="{{route('admin.roles.create')}}"><i class="fa fa-plus"></i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive mb-4 mt-4">
                            <table id="html5-extension" class="table table-hover non-hover" style="width:100%">
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
                                                    <a href="{{route('admin.roles.show', $item)}}" data-toggle="tooltip"
                                                       data-placement="top"
                                                       title="عرض" data-original-title="Settings">
                                                        <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true"
                                                             focusable="false" width="1.4em" height="1em"
                                                             style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);"
                                                             preserveAspectRatio="xMidYMid meet"
                                                             viewBox="0 0 1792 1280">
                                                            <path
                                                                d="M1664 704q-152-236-381-353q61 104 61 225q0 185-131.5 316.5T896 1024T579.5 892.5T448 576q0-121 61-225q-229 117-381 353q133 205 333.5 326.5T896 1152t434.5-121.5T1664 704zM944 320q0-20-14-34t-34-14q-125 0-214.5 89.5T592 576q0 20 14 34t34 14t34-14t14-34q0-86 61-147t147-61q20 0 34-14t14-34zm848 384q0 34-20 69q-140 230-376.5 368.5T896 1280t-499.5-139T20 773Q0 738 0 704t20-69q140-229 376.5-368T896 128t499.5 139T1772 635q20 35 20 69z"
                                                                fill="#626262"/>
                                                        </svg>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="{{route('admin.roles.edit', $item)}}" data-toggle="tooltip"
                                                       data-placement="top"
                                                       title="تعديل" data-original-title="تعديل">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                             viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                             stroke-width="2" stroke-linecap="round"
                                                             stroke-linejoin="round"
                                                             class="feather feather-edit-2 text-success">
                                                            <path
                                                                d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                                                        </svg>
                                                    </a>
                                                </li>
                                                <li>
                                                    <form action="{{route('admin.roles.destroy', $item)}}" method="post"
                                                          onsubmit="return confirm('هل انت متاكد؟')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="delete-btn" type="submit" data-toggle="tooltip"
                                                                data-placement="top"
                                                                title="حذف" data-original-title="Delete">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                 height="24"
                                                                 viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                                 stroke-width="2" stroke-linecap="round"
                                                                 stroke-linejoin="round"
                                                                 class="feather feather-trash-2 text-danger">
                                                                <polyline points="3 6 5 6 21 6"></polyline>
                                                                <path
                                                                    d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                                <line x1="10" y1="11" x2="10" y2="17"></line>
                                                                <line x1="14" y1="11" x2="14" y2="17"></line>
                                                            </svg>
                                                        </button>
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
    </div>
@endsection
@section('javascript')
    <x-datatable></x-datatable>
@endsection
