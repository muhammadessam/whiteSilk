@extends('layouts.admin')
@section('content')

    <div class="row layout-top-spacing">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3>{{$client['name']}}</h3>
                </div>
                <div class="card-body">
                    <div class="row">

                        <div class="col-6">
                            <x-showtext title="البريد" value="{{$client['email']}}"></x-showtext>

                            <x-showtext title="الرصيد" value="{{$client['credit']}}"></x-showtext>
                        </div>

                        <div class="col-6">
                            <x-showtext title="الهاتف" value="{{$client['phone']}}"></x-showtext>

                            <div class="form-group">
                                <label><strong>الصورة:</strong></label>
                                <div class="img-content">
                                    <img src="{{asset($client['img'])}}" style="width: 100px; height: 100px">
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
                    <a class="nav-link active" id="border-top-home-tab" data-toggle="tab" href="#subscriptions" role="tab" aria-controls="border-top-home" aria-selected="true">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                            <polyline points="9 22 9 12 15 12 15 22"></polyline>
                        </svg>
                        الاشتركات
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" id="border-top-contact-tab" data-toggle="tab" href="#orders" role="tab" aria-controls="border-top-contact" aria-selected="false">
                        <i class="fa fa-layer-group"></i>
                        الطلبات
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" id="border-top-contact-tab" data-toggle="tab" href="#fast-orders" role="tab" aria-controls="border-top-contact" aria-selected="false">
                       <i class="fa fa-shipping-fast"></i>
                        الطلبات المستعجلة
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" id="border-top-contact-tab" data-toggle="tab" href="#fast-orders" role="tab" aria-controls="border-top-contact" aria-selected="false">
                       <i class="fa fa-map-pin"></i>
                    العناوين
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" id="border-top-profile-tab" data-toggle="tab" href="#roles" role="tab" aria-controls="border-top-profile" aria-selected="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone">
                            <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                        </svg>
                        الادورا
                    </a>
                </li>

            </ul>
            <div class="tab-content" id="borderTopContent">

                <div class="tab-pane fade active show" id="subscriptions" role="tabpanel" aria-labelledby="border-top-home-tab">
                    @include('admin.clients.partials._subscriptions')
                </div>

                <div class="tab-pane fade" id="roles" role="tabpanel" aria-labelledby="border-top-profile-tab">
                    @include('admin.clients.partials._roles')
                </div>

                <div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="border-top-contact-tab">
                    @include('admin.clients.partials._orders')
                </div>

                <div class="tab-pane fade" id="fast-orders" role="tabpanel" aria-labelledby="border-top-contact-tab">
                    @include('admin.clients.partials._fast-orders')
                </div>

            </div>

        </div>
    </div>

@endsection
@section('js')
    <x-datatable id="subscriptionsTable" mass=""></x-datatable>
@endsection
