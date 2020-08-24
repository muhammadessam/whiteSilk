@extends('layouts.admin')
@section('content')

    <div class="row layout-top-spacing">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3>{{$user['name']}}</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label><strong>البريد:</strong></label>
                                <div class="form-control">
                                    {{$user['email']}}
                                </div>
                            </div>
                            <div class="form-group">
                                <label><strong>الصورة:</strong></label>
                                <div class="img-content">
                                    <img src="{{asset($user['img'])}}" alt="" style="width: 100px; height: 100px">
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label><strong>الهاتف:</strong></label>
                                <div class="form-control">
                                    {{$user['phone']}}
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
                        الاشتركات
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="border-top-profile-tab" data-toggle="tab" href="#border-top-profile" role="tab" aria-controls="border-top-profile" aria-selected="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone">
                            <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                        </svg>
                        الادورا
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="border-top-contact-tab" data-toggle="tab" href="#border-top-contact" role="tab" aria-controls="border-top-contact" aria-selected="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                    </a>
                </li>

            </ul>
            <div class="tab-content" id="borderTopContent">
                <div class="tab-pane fade active show" id="border-top-home" role="tabpanel" aria-labelledby="border-top-home-tab">
                    <div class="widget-content widget-content-area">
                        <div class="row card-header d-flex justify-content-between">
                            <form class="form form-inline" action="{{route('admin.client.subscription.store')}}" method="post">
                                @csrf
                                <input type="hidden" name="client_id" value="{{$user['id']}}">
                                <select name="subscription_id" id="subscription_id" class="form-control">
                                    @foreach(\App\Subscription::all() as $item)
                                        <option value="{{$item['id']}}">{{$item['name']}}</option>
                                    @endforeach
                                </select>
                                <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i></button>
                            </form>

                            <div class="alert alert-info m-2">عند اضافة اشتراك سوف تلغي الاشتراكات القديمة ويفعل الاشتراك الاخير</div>
                        </div>
                        <div class="table-responsive">
                            <table id="subscriptionsTable" class="table table-bordered table-striped mb-4">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>الاسم</th>
                                    <th>سعر الاشتراك</th>
                                    <th>الحالة</th>
                                    <th>عدد القطع المتبقية</th>
                                    <th>تاريخ البدء</th>
                                    <th>تاريخ الانتهاء</th>
                                    <th>المبلغ المضاف</th>
                                    <th>اجراء</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($user->subscriptions->sortBy('id')  as $item)
                                    <tr>
                                        <td>{{$item->pivot->id}}</td>
                                        <td>{{$item['name']}}</td>
                                        <td>{{$item['price']}}</td>
                                        <td>
                                            @if($item->pivot->is_active)
                                                <span class="badge badge-success">فعال</span>
                                            @else
                                                <span class="badge badge-danger">منتهيl</span>
                                            @endif
                                        </td>
                                        <td>{{$item->pivot->remaining_pieces}}</td>
                                        <td>{{$item->pivot->start_date}}</td>
                                        <td>{{$item->pivot->end_date}}</td>
                                        <td>{{$item->pivot->credit}}</td>
                                        <td class="d-flex">
                                            <form action="{{route('admin.client.subscription.edit')}}" method="POST">
                                                @csrf
                                                <input type="hidden" name="client_id" value="{{$user->id}}">
                                                <input type="hidden" name="subscription_id" value="{{$item->id}}">
                                                <input type="hidden" name="pivot_id" value="{{$item->pivot->id}}">
                                                <button type="submit" class="delete-btn"><i class="fa fa-edit text-info"></i></button>
                                            </form>
                                            <form action="{{route('admin.client.subscription.destroy')}}" method="POST" onsubmit="return confirm('هل انت متاكد؟')">
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" name="client_id" value="{{$user->id}}">
                                                <input type="hidden" name="subscription_id" value="{{$item->id}}">
                                                <input type="hidden" name="pivot_id" value="{{$item->pivot->id}}">
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
                    <form action="{{route('admin.role.user.store', $user)}}" method="post">
                        @csrf
                        @foreach(\Silber\Bouncer\Database\Role::all() as $role)
                            <div class="form-group">
                                <label class="switch s-icons s-outline s-outline-default mr-2 s-outline-success">
                                    <input type="checkbox" {{$user->roles->contains($role) ? 'checked' : ''}} name="roles[]" value="{{$role['id']}}">
                                    <span class="slider round"></span>
                                </label>
                                <label>{{$role['name']}}</label>
                            </div>
                        @endforeach

                        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> حفظ</button>
                    </form>
                </div>

                <div class="tab-pane fade" id="border-top-contact" role="tabpanel" aria-labelledby="border-top-contact-tab">

                </div>

            </div>

        </div>
    </div>

@endsection
@section('js')
    <x-datatable id="subscriptionsTable" mass=""></x-datatable>
@endsection
