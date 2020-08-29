@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3>{{$subscription['name']}}</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <x-showtext title="الوصف" value="{{$subscription['description']}}"></x-showtext>
                        <x-showtext title="النوع" value="{{$subscription['type']}}"></x-showtext>
                        <x-showtext title="السعر" value="{{$subscription['price']}}"></x-showtext>
                        <x-showtext title="الرصيد المضاف الي المستخدم" value="{{$subscription['added_credit']}}"></x-showtext>
                        <x-showtext title="عدد الايام" value="{{$subscription['days']}}"></x-showtext>
                    </div>
                    <div class="col">
                        <x-showtext title="اجمالي عدد القطع" value="{{$subscription['pieces']}}"></x-showtext>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label class="font-weight-bold">الحالة</label>
                                    @if($subscription['is_active'])
                                        <div>
                                            <span class="badge badge-success"> فعال </span>
                                        </div>
                                    @else
                                        <div>
                                            <span class="badge badge-danger"> غير فعال </span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label class="font-weight-bold">الصورة</label>
                                    <div>
                                        <img class="rounded" src="{{asset($subscription['img'])}}" alt="photo" style="width: 100px; height: 100px;">
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>

        <div class="statbox widget box box-shadow mt-3">

            <div class="widget-content widget-content-area border-top-tab">
                <ul class="nav nav-tabs mb-3 mt-3" id="borderTop" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="border-top-home-tab" data-toggle="tab" href="#border-top-home" role="tab" aria-controls="border-top-home" aria-selected="true">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                <polyline points="9 22 9 12 15 12 15 22"></polyline>
                            </svg>
                            عناصر الاشتراك
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="border-top-profile-tab" data-toggle="tab" href="#border-top-profile" role="tab" aria-controls="border-top-profile" aria-selected="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone">
                                <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                            </svg>

                            طلبات السائقين
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="border-top-contact-tab" data-toggle="tab" href="#border-top-contact" role="tab" aria-controls="border-top-contact" aria-selected="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                            المشتركين
                        </a>
                    </li>

                </ul>
                <div class="tab-content" id="borderTopContent">
                    <div class="tab-pane fade active show" id="border-top-home" role="tabpanel" aria-labelledby="border-top-home-tab">
                        <div class="widget-content widget-content-area">
                            <div class="row card-header">
                                <form class="form form-inline" action="{{route('admin.subscription-attributes.store')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="subscription_id" value="{{$subscription['id']}}">
                                    <div class="form-group">
                                        <input type="text" name="key" id="key" class="mr-1 form-control" placeholder="اضافة اسم جديد ...">
                                        <x-error title="key"></x-error>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="value" id="value" class="form-control" placeholder="اضافة قيمة جديد ...">
                                        <x-error title="value"></x-error>
                                    </div>
                                    <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i></button>
                                </form>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped mb-4">
                                    <thead>
                                    <tr>
                                        <th>الاسم</th>
                                        <th>القيمة</th>
                                        <th>اجراء</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($subscription->attributes as $item)
                                        <tr>
                                            <td>{{$item['key']}}</td>
                                            <td>{{$item['value']}}</td>
                                            <td class="d-flex">
                                                <a href="{{route('admin.subscription-attributes.edit', $item)}}"><i class="fa fa-edit text-primary"></i></a>
                                                <form action="{{route('admin.subscription-attributes.destroy', $item)}}" method="post" onsubmit="return confirm('هل انت متاكد؟')">
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

                    <div class="tab-pane fade" id="border-top-profile" role="tabpanel" aria-labelledby="border-top-profile-tab">

                    </div>

                    <div class="tab-pane fade" id="border-top-contact" role="tabpanel" aria-labelledby="border-top-contact-tab">

                    </div>

                </div>

            </div>
        </div>
    </div>

@endsection
