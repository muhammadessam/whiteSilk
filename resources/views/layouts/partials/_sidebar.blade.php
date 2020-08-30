<!--  BEGIN SIDEBAR  -->
<div class="sidebar-wrapper sidebar-theme">

    <nav id="sidebar">
        <div class="shadow-bottom"></div>
        <ul class="list-unstyled menu-categories" id="accordionExample">

            <li class="menu">
                <a href="{{route('admin.home')}}" data-active="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                             fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                             stroke-linejoin="round" class="feather feather-home">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                            <polyline points="9 22 9 12 15 12 15 22"></polyline>
                        </svg>
                        <span>لوحة التحكم</span>
                    </div>
                </a>
            </li>

            <li class="menu">
                <a href="#users" data-toggle="collapse"
                   aria-expanded="{{request()->routeIs('admin.roles.*') || request()->routeIs('admin.users.*') || request()->routeIs('admin.addresses.*') ? 'true':'false'}}"
                   data-active="{{request()->routeIs('admin.roles.*') || request()->routeIs('admin.users.*') || request()->routeIs('admin.addresses.*') ? 'true':'false'}}"
                   class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                             fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                             stroke-linejoin="round" class="feather feather-users">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                            <circle cx="9" cy="7" r="4"></circle>
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                        </svg>
                        <span>المستخدمين</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                             fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                             stroke-linejoin="round" class="feather feather-chevron-right">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled {{request()->routeIs('admin.roles.*') || request()->routeIs('admin.users.*') || request()->routeIs('admin.addresses.*') ? 'show':''}}"
                    id="users" data-parent="#accordionExample">
                    <li class="{{request()->routeIs('admin.roles.*') ? 'active' : ''}}">
                        <a href="{{route('admin.roles.index')}}">الادوار</a>
                    </li>
                    <li class="{{request()->routeIs('admin.users.*') ? 'active' : ''}}">
                        <a href="{{route('admin.users.index')}}">المستخدمين</a>
                    </li>
                    <li class="{{request()->routeIs('admin.addresses.*') ? 'active' : ''}}">
                        <a href="{{route('admin.addresses.index')}}">العنوان</a>
                    </li>
                </ul>
            </li>


            <li class="menu">
                <a href="#countriesList" data-toggle="collapse"
                   aria-expanded="{{request()->routeIs('admin.countries.*') || request()->routeIs('admin.cities.*') ||request()->routeIs('admin.areas.*') ? 'true':'false'}}"
                   data-active="{{request()->routeIs('admin.countries.*') || request()->routeIs('admin.cities.*') ||request()->routeIs('admin.areas.*') ? 'true':'false'}}"
                   class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                             fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                             stroke-linejoin="round" class="feather feather-map">
                            <polygon points="1 6 1 22 8 18 16 22 23 18 23 2 16 6 8 2 1 6"></polygon>
                            <line x1="8" y1="2" x2="8" y2="18"></line>
                            <line x1="16" y1="6" x2="16" y2="22"></line>
                        </svg>
                        <span>الموقع</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                             fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                             stroke-linejoin="round" class="feather feather-chevron-right">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled {{request()->routeIs('admin.countries.*') || request()->routeIs('admin.cities.*') ||request()->routeIs('admin.areas.*') ?'show':''}}"
                    id="countriesList" data-parent="#accordionExample">
                    <li class="{{request()->routeIs('admin.countries.*') ? 'active' :''}}">
                        <a href="{{route('admin.countries.index')}}"> الدول </a>
                    </li>
                    <li class="{{request()->routeIs('admin.cities.*') ? 'active' :''}}">
                        <a href="{{route('admin.cities.index')}}"> المدن </a>
                    </li>
                    <li class="{{request()->routeIs('admin.areas.*') ? 'active' :''}}">
                        <a href="{{route('admin.areas.index')}}">المناطق </a>
                    </li>
                </ul>
            </li>

            <li class="menu">
                <a href="{{route('admin.subscriptions.index')}}" aria-expanded="false"
                   data-active="{{request()->routeIs('admin.subscriptions.*') ? 'true':'false'}}"
                   class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                             fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                             stroke-linejoin="round" class="feather feather-box">
                            <path
                                d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                            <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                            <line x1="12" y1="22.08" x2="12" y2="12"></line>
                        </svg>
                        <span>الاشتركات</span>
                    </div>
                </a>
            </li>


            <li class="menu">
                <a href="#elements" data-toggle="collapse"
                   data-active="{{request()->routeIs('admin.drivers-times.*') || request()->routeIs('admin.drivers.*') ? 'true' : 'false'}}"
                   aria-expanded="{{request()->routeIs('admin.drivers-times.*') || request()->routeIs('admin.drivers.*') ? 'true' : 'false'}}"
                   class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                             fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                             stroke-linejoin="round" class="feather feather-zap">
                            <polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon>
                        </svg>
                        <span>السائقين</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                             fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                             stroke-linejoin="round" class="feather feather-chevron-right">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled {{request()->routeIs('admin.drivers-times.*') || request()->routeIs('admin.drivers.*') ? 'show' : ''}}" id="elements" data-parent="#accordionExample">
                    <li class="{{request()->routeIs('admin.drivers.*') ? 'active' :''}} ">
                        <a href="{{route('admin.drivers.index')}}"> السائقين </a>
                    </li>
                    <li class="{{request()->routeIs('admin.drivers-times.*') ? 'active' :''}} ">
                        <a href="{{route('admin.drivers-times.index')}}"> اوقات السائقين </a>
                    </li>
                </ul>
            </li>

            <li class="menu">
                <a href="{{route('admin.clients.index')}}" aria-expanded="false"
                   data-active="{{request()->routeIs('admin.clients.*') ? 'true':'false'}}"
                   class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                             fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                             stroke-linejoin="round" class="feather feather-users">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                            <circle cx="9" cy="7" r="4"></circle>
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                        </svg>
                        <span>العملاء</span>
                    </div>
                </a>
            </li>

            <li class="menu">
                <a href="{{route('admin.price-list.index')}}"
                   data-active="{{request()->routeIs('admin.price-list.*') ? 'true':'false'}}"
                   class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                             fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                             stroke-linejoin="round" class="feather feather-airplay">
                            <path
                                d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path>
                            <polygon points="12 15 17 21 7 21 12 15"></polygon>
                        </svg>
                        <span>قائمة الاسعار</span>
                    </div>
                </a>
            </li>

            <li class="menu">
                <a href="#datatables" data-toggle="collapse"
                   aria-expanded="{{request()->routeIs('admin.driver-orders.*') || request()->routeIs('admin.driver-order-status.*') ? 'true':'false'}}"
                   data-active="{{request()->routeIs('admin.driver-orders.*') || request()->routeIs('admin.driver-order-status.*') ? 'true':'false'}}"
                   class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                             fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                             stroke-linejoin="round" class="feather feather-layout">
                            <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                            <line x1="3" y1="9" x2="21" y2="9"></line>
                            <line x1="9" y1="21" x2="9" y2="9"></line>
                        </svg>
                        <span>طلبات السائقين</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                             fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                             stroke-linejoin="round" class="feather feather-chevron-right">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled {{request()->routeIs('admin.driver-orders.*') || request()->routeIs('admin.driver-order-status.*') ? 'show':''}}" id="datatables" data-parent="#accordionExample">
                    <li class="{{request()->routeIs('admin.driver-order-status.*') ? 'active' :''}}">
                        <a href="{{route('admin.driver-order-status.index')}}"> حالة الطلب </a>
                    </li>
                    <li class="{{request()->routeIs('admin.driver-orders.*') ? 'active' :''}}">
                        <a href="{{route('admin.driver-orders.index')}}"> طلبات السائقين </a>
                    </li>

                </ul>
            </li>

            <li class="menu">
                <a href="#gifts" data-toggle="collapse"
                   aria-expanded="{{request()->routeIs('admin.couponUsage.*') || request()->routeIs('admin.coupons.*') ||  request()->routeIs('admin.giftCategory.*') || request()->routeIs('admin.giftcard.*') ? 'true':'false'}}"
                   class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                             fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                             stroke-linejoin="round" class="feather feather-layers">
                            <polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
                            <polyline points="2 17 12 22 22 17"></polyline>
                            <polyline points="2 12 12 17 22 12"></polyline>
                        </svg>
                        <span>الهدايا والكوبونات</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                             fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                             stroke-linejoin="round" class="feather feather-chevron-right">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled {{request()->routeIs('admin.couponUsage.*') || request()->routeIs('admin.coupons.*') || request()->routeIs('admin.giftCategory.*') || request()->routeIs('admin.giftcard.*') ? 'show':''}}" id="gifts" data-parent="#accordionExample">
                    <li class="{{request()->routeIs('admin.giftCategory.*') ? 'active':''}}">
                        <a href="{{route('admin.giftCategory.index')}}"> انواع كروت الهدايا </a>
                    </li>
                    <li class="{{request()->routeIs('admin.giftcard.*') ? 'active':''}}">
                        <a href="{{route('admin.giftcard.index')}}"> كروت الهدايا </a>
                    </li>
                    <li class="{{request()->routeIs('admin.giftCardUsage.*') ?'active':''}}">
                        <a href="{{route('admin.giftCardUsage.index')}}"> استخدام كروت الهدايا </a>
                    </li>
                    <li class="{{request()->routeIs('admin.coupons.*') ? 'active':''}}">
                        <a href="{{route('admin.coupons.index')}}"> الكوبونات </a>
                    </li>
                    <li class="{{request()->routeIs('admin.couponUsage.*') ? 'active':''}}">
                        <a href="{{route('admin.couponUsage.index')}}"> استخدام الكوبونات </a>
                    </li>
                </ul>
            </li>

            <li class="menu">
                <a href="#payment" data-toggle="collapse"
                   aria-expanded="{{request()->routeIs('admin.paymentsMethod.*') || request()->routeIs('admin.payments.*') ? 'true':'false'}}"
                   class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                             fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                             stroke-linejoin="round" class="feather feather-clipboard">
                            <path
                                d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path>
                            <rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect>
                        </svg>
                        <span>الدفع</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                             fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                             stroke-linejoin="round" class="feather feather-chevron-right">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled {{request()->routeIs('admin.paymentsMethod.*') || request()->routeIs('admin.payments.*')  ? 'show':''}}" id="payment" data-parent="#accordionExample">

                    <li class="{{request()->routeIs('admin.paymentsMethod.*') ? 'active':''}}">
                        <a href="{{route('admin.paymentsMethod.index')}}"> طرق الدفع </a>
                    </li>
                    <li class="{{request()->routeIs('admin.payments.*') ? 'active':''}}">
                        <a href="{{route('admin.payments.index')}}"> عمليات الدفع </a>
                    </li>

                </ul>
            </li>

            <li class="menu">
                <a href="#ordersLink" data-toggle="collapse"
                   aria-expanded="{{request()->routeIs('admin.orders.*') || request()->routeIs('admin.orderStatus.*') ? 'true':'false'}}"
                   class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                             fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                             stroke-linejoin="round" class="feather feather-layers">
                            <polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
                            <polyline points="2 17 12 22 22 17"></polyline>
                            <polyline points="2 12 12 17 22 12"></polyline>
                        </svg>
                        <span>الطلبات</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                             fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                             stroke-linejoin="round" class="feather feather-chevron-right">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled {{request()->routeIs('admin.orders.*') || request()->routeIs('admin.orderStatus.*')  ? 'show':''}}" id="ordersLink" data-parent="#accordionExample">

                    <li class="{{request()->routeIs('admin.orderStatus.*') ? 'active':''}}">
                        <a href="{{route('admin.orderStatus.index')}}"> حالة الطلب </a>
                    </li>
                    <li class="{{request()->routeIs('admin.orders.*') ? 'active':''}}">
                        <a href="{{route('admin.orders.index')}}"> الطلبات </a>
                    </li>

                </ul>
            </li>

            <li class="menu">
                <a href="{{route('admin.branches.index')}}"
                   data-active="{{request()->routeIs('admin.branches.*') ? 'true':'false'}}"
                   class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                             fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                             stroke-linejoin="round" class="feather feather-airplay">
                            <path
                                d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path>
                            <polygon points="12 15 17 21 7 21 12 15"></polygon>
                        </svg>
                        <span>الفروع</span>
                    </div>
                </a>
            </li>

        </ul>
    </nav>

</div>
