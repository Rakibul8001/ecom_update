<div class="sismoo-sidebar-wrap">
    <div class="sismoo-sidebar left c-scrollbar">
        <div class="sismoo-side-nav-logo-wrap">
            <a href="{{ route('admin.dashboard') }}" class="d-block text-left">
                @if(get_setting('system_logo_white') != null)
                    <img class="mw-100" src="{{ uploaded_asset(get_setting('system_logo_white')) }}" class="brand-icon" alt="{{ get_setting('site_name') }}">
                @else
                    <img class="mw-100" src="{{ static_asset('assets/img/logo.png') }}" class="brand-icon" alt="{{ get_setting('site_name') }}">
                @endif
            </a>
        </div>
        <div class="sismoo-side-nav-wrap">
            <div class="px-20px mb-3">
                <input class="form-control bg-soft-secondary border-0 form-control-sm text-white" type="text" name="" placeholder="{{ translate('Search in menu') }}" id="menu-search" onkeyup="menuSearch()">
            </div>
            <ul class="sismoo-side-nav-list" id="search-menu">
            </ul>
            <ul class="sismoo-side-nav-list" id="main-menu" data-toggle="sismoo-side-menu">
                <li class="sismoo-side-nav-item">
                    <a href="{{route('admin.dashboard')}}" class="sismoo-side-nav-link">
                        <i class="las la-home sismoo-side-nav-icon"></i>
                        <span class="sismoo-side-nav-text">{{translate('Dashboard')}}</span>
                    </a>
                </li>

                <!-- POS Addon-->
                @if (addon_is_activated('pos_system'))
                    @if(Auth::user()->user_type == 'admin' || in_array('1', json_decode(Auth::user()->staff->role->permissions)))
                        <li class="sismoo-side-nav-item">
                            <a href="#" class="sismoo-side-nav-link">
                                <i class="las la-tasks sismoo-side-nav-icon"></i>
                                <span class="sismoo-side-nav-text">{{translate('POS System')}}</span>
                                @if (env("DEMO_MODE") == "On")
                                    <span class="badge badge-inline badge-danger">Addon</span>
                                @endif
                                <span class="sismoo-side-nav-arrow"></span>
                            </a>
                            <ul class="sismoo-side-nav-list level-2">
                                <li class="sismoo-side-nav-item">
                                    <a href="{{route('poin-of-sales.index')}}" class="sismoo-side-nav-link {{ areActiveRoutes(['poin-of-sales.index', 'poin-of-sales.create'])}}">
                                        <span class="sismoo-side-nav-text">{{translate('POS Manager')}}</span>
                                    </a>
                                </li>
                                <li class="sismoo-side-nav-item">
                                    <a href="{{route('poin-of-sales.activation')}}" class="sismoo-side-nav-link">
                                        <span class="sismoo-side-nav-text">{{translate('POS Configuration')}}</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endif
                @endif

            <!-- Product -->
                @if(Auth::user()->user_type == 'admin' || in_array('2', json_decode(Auth::user()->staff->role->permissions)))
                    <li class="sismoo-side-nav-item">
                        <a href="#" class="sismoo-side-nav-link">
                            <i class="las la-shopping-cart sismoo-side-nav-icon"></i>
                            <span class="sismoo-side-nav-text">{{translate('Products')}}</span>
                            <span class="sismoo-side-nav-arrow"></span>
                        </a>
                        <!--Submenu-->
                        <ul class="sismoo-side-nav-list level-2">
                            <li class="sismoo-side-nav-item">
                                <a class="sismoo-side-nav-link" href="{{route('products.create')}}">
                                    <span class="sismoo-side-nav-text">{{translate('Add New product')}}</span>
                                </a>
                            </li>
                            <li class="sismoo-side-nav-item">
                                <a href="{{route('products.all')}}" class="sismoo-side-nav-link">
                                    <span class="sismoo-side-nav-text">{{ translate('All Products') }}</span>
                                </a>
                            </li>
                            <li class="sismoo-side-nav-item">
                                <a href="{{route('products.admin')}}" class="sismoo-side-nav-link {{ areActiveRoutes(['products.admin', 'products.create', 'products.admin.edit']) }}" >
                                    <span class="sismoo-side-nav-text">{{ translate('In House Products') }}</span>
                                </a>
                            </li>
                            @if(get_setting('vendor_system_activation') == 1)
                                <li class="sismoo-side-nav-item">
                                    <a href="{{route('products.seller')}}" class="sismoo-side-nav-link {{ areActiveRoutes(['products.seller', 'products.seller.edit']) }}">
                                        <span class="sismoo-side-nav-text">{{ translate('Seller Products') }}</span>
                                    </a>
                                </li>
                            @endif
                            <li class="sismoo-side-nav-item">
                                <a href="{{route('digitalproducts.index')}}" class="sismoo-side-nav-link {{ areActiveRoutes(['digitalproducts.index', 'digitalproducts.create', 'digitalproducts.edit']) }}">
                                    <span class="sismoo-side-nav-text">{{ translate('Digital Products') }}</span>
                                </a>
                            </li>
                            <li class="sismoo-side-nav-item">
                                <a href="{{ route('product_bulk_upload.index') }}" class="sismoo-side-nav-link" >
                                    <span class="sismoo-side-nav-text">{{ translate('Bulk Import') }}</span>
                                </a>
                            </li>
                            <li class="sismoo-side-nav-item">
                                <a href="{{route('product_bulk_export.index')}}" class="sismoo-side-nav-link">
                                    <span class="sismoo-side-nav-text">{{translate('Bulk Export')}}</span>
                                </a>
                            </li>
                            <li class="sismoo-side-nav-item">
                                <a href="{{route('categories.index')}}" class="sismoo-side-nav-link {{ areActiveRoutes(['categories.index', 'categories.create', 'categories.edit'])}}">
                                    <span class="sismoo-side-nav-text">{{translate('Category')}}</span>
                                </a>
                            </li>
                            <li class="sismoo-side-nav-item">
                                <a href="{{route('brands.index')}}" class="sismoo-side-nav-link {{ areActiveRoutes(['brands.index', 'brands.create', 'brands.edit'])}}" >
                                    <span class="sismoo-side-nav-text">{{translate('Brand')}}</span>
                                </a>
                            </li>
                            <li class="sismoo-side-nav-item">
                                <a href="{{route('attributes.index')}}" class="sismoo-side-nav-link {{ areActiveRoutes(['attributes.index','attributes.create','attributes.edit'])}}">
                                    <span class="sismoo-side-nav-text">{{translate('Attribute')}}</span>
                                </a>
                            </li>
                            <li class="sismoo-side-nav-item">
                                <a href="{{route('colors')}}" class="sismoo-side-nav-link {{ areActiveRoutes(['attributes.index','attributes.create','attributes.edit'])}}">
                                    <span class="sismoo-side-nav-text">{{translate('Colors')}}</span>
                                </a>
                            </li>
                            <li class="sismoo-side-nav-item">
                                <a href="{{route('reviews.index')}}" class="sismoo-side-nav-link">
                                    <span class="sismoo-side-nav-text">{{translate('Product Reviews')}}</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif

                <!-- Auction Product -->
                @if(addon_is_activated('auction'))
                    <li class="sismoo-side-nav-item">
                        <a href="#" class="sismoo-side-nav-link">
                            <i class="las la-gavel sismoo-side-nav-icon"></i>
                            <span class="sismoo-side-nav-text">{{translate('Auction Products')}}</span>
                            @if (env("DEMO_MODE") == "On")
                                <span class="badge badge-inline badge-danger">Addon</span>
                            @endif
                            <span class="sismoo-side-nav-arrow"></span>
                        </a>
                        <!--Submenu-->
                        <ul class="sismoo-side-nav-list level-2">
                            <li class="sismoo-side-nav-item">
                                <a class="sismoo-side-nav-link" href="{{route('auction_products.create')}}">
                                    <span class="sismoo-side-nav-text">{{translate('Add New auction product')}}</span>
                                </a>
                            </li>
                            <li class="sismoo-side-nav-item">
                                <a href="{{route('auction.all_products')}}" class="sismoo-side-nav-link {{ areActiveRoutes(['auction_products.edit','product_bids.show']) }}">
                                    <span class="sismoo-side-nav-text">{{ translate('All Auction Products') }}</span>
                                </a>
                            </li>
                            <li class="sismoo-side-nav-item">
                                <a href="{{route('auction.inhouse_products')}}" class="sismoo-side-nav-link">
                                    <span class="sismoo-side-nav-text">{{ translate('Inhouse Auction Products') }}</span>
                                </a>
                            </li>
                            <li class="sismoo-side-nav-item">
                                <a href="{{route('auction.seller_products')}}" class="sismoo-side-nav-link">
                                    <span class="sismoo-side-nav-text">{{ translate('Seller Auction Products') }}</span>
                                </a>
                            </li>
                            <li class="sismoo-side-nav-item">
                                <a href="{{route('auction_products_orders')}}" class="sismoo-side-nav-link {{ areActiveRoutes(['auction_products_orders.index']) }}">
                                    <span class="sismoo-side-nav-text">{{ translate('Auction Products Orders') }}</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif

            <!-- Sale -->
                <li class="sismoo-side-nav-item">
                    <a href="#" class="sismoo-side-nav-link">
                        <i class="las la-money-bill sismoo-side-nav-icon"></i>
                        <span class="sismoo-side-nav-text">{{translate('Sales')}}</span>
                        <span class="sismoo-side-nav-arrow"></span>
                    </a>
                    <!--Submenu-->
                    <ul class="sismoo-side-nav-list level-2">
                        @if(Auth::user()->user_type == 'admin' || in_array('3', json_decode(Auth::user()->staff->role->permissions)))
                            <li class="sismoo-side-nav-item">
                                <a href="{{ route('all_orders.index') }}" class="sismoo-side-nav-link {{ areActiveRoutes(['all_orders.index', 'all_orders.show'])}}">
                                    <span class="sismoo-side-nav-text">{{translate('All Orders')}}</span>
                                </a>
                            </li>
                        @endif

                        @if(Auth::user()->user_type == 'admin' || in_array('4', json_decode(Auth::user()->staff->role->permissions)))
                            <li class="sismoo-side-nav-item">
                                <a href="{{ route('inhouse_orders.index') }}" class="sismoo-side-nav-link {{ areActiveRoutes(['inhouse_orders.index', 'inhouse_orders.show'])}}" >
                                    <span class="sismoo-side-nav-text">{{translate('Inhouse orders')}}</span>
                                </a>
                            </li>
                        @endif
                        @if(Auth::user()->user_type == 'admin' || in_array('5', json_decode(Auth::user()->staff->role->permissions)))
                            <li class="sismoo-side-nav-item">
                                <a href="{{ route('seller_orders.index') }}" class="sismoo-side-nav-link {{ areActiveRoutes(['seller_orders.index', 'seller_orders.show'])}}">
                                    <span class="sismoo-side-nav-text">{{translate('Seller Orders')}}</span>
                                </a>
                            </li>
                        @endif
                        @if(Auth::user()->user_type == 'admin' || in_array('6', json_decode(Auth::user()->staff->role->permissions)))
                            <li class="sismoo-side-nav-item">
                                <a href="{{ route('pick_up_point.order_index') }}" class="sismoo-side-nav-link {{ areActiveRoutes(['pick_up_point.order_index','pick_up_point.order_show'])}}">
                                    <span class="sismoo-side-nav-text">{{translate('Pick-up Point Order')}}</span>
                                </a>
                            </li>
                        @endif
                    </ul>
                </li>

                <!-- Deliver Boy Addon-->
                @if (addon_is_activated('delivery_boy'))
                    @if(Auth::user()->user_type == 'admin' || in_array('1', json_decode(Auth::user()->staff->role->permissions)))
                        <li class="sismoo-side-nav-item">
                            <a href="#" class="sismoo-side-nav-link">
                                <i class="las la-truck sismoo-side-nav-icon"></i>
                                <span class="sismoo-side-nav-text">{{translate('Delivery Boy')}}</span>
                                @if (env("DEMO_MODE") == "On")
                                    <span class="badge badge-inline badge-danger">Addon</span>
                                @endif
                                <span class="sismoo-side-nav-arrow"></span>
                            </a>
                            <ul class="sismoo-side-nav-list level-2">
                                <li class="sismoo-side-nav-item">
                                    <a href="{{route('delivery-boys.index')}}" class="sismoo-side-nav-link {{ areActiveRoutes(['delivery-boys.index'])}}">
                                        <span class="sismoo-side-nav-text">{{translate('All Delivery Boy')}}</span>
                                    </a>
                                </li>
                                <li class="sismoo-side-nav-item">
                                    <a href="{{route('delivery-boys.create')}}" class="sismoo-side-nav-link {{ areActiveRoutes(['delivery-boys.create'])}}">
                                        <span class="sismoo-side-nav-text">{{translate('Add Delivery Boy')}}</span>
                                    </a>
                                </li>
                                {{-- <li class="sismoo-side-nav-item">
                                    <a href="{{route('delivery-boys-payment-histories')}}" class="sismoo-side-nav-link {{ areActiveRoutes(['delivery-boys.index'])}}">
                                        <span class="sismoo-side-nav-text">{{translate('Payment Histories')}}</span>
                                    </a>
                                </li>
                                <li class="sismoo-side-nav-item">
                                    <a href="{{route('delivery-boys-collection-histories')}}" class="sismoo-side-nav-link {{ areActiveRoutes(['delivery-boys.create'])}}">
                                        <span class="sismoo-side-nav-text">{{translate('Collected Histories')}}</span>
                                    </a>
                                </li> --}}
                                <li class="sismoo-side-nav-item">
                                    <a href="{{route('delivery-boy.cancel-request')}}" class="sismoo-side-nav-link {{ areActiveRoutes(['delivery-boy.cancel-request'])}}">
                                        <span class="sismoo-side-nav-text">{{translate('Cancel Request')}}</span>
                                    </a>
                                </li>
                                <li class="sismoo-side-nav-item">
                                    <a href="{{route('delivery-boy-configuration')}}" class="sismoo-side-nav-link">
                                        <span class="sismoo-side-nav-text">{{translate('Configuration')}}</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endif
                @endif

            <!-- Refund addon -->
                @if (addon_is_activated('refund_request'))
                    @if(Auth::user()->user_type == 'admin' || in_array('7', json_decode(Auth::user()->staff->role->permissions)))
                        <li class="sismoo-side-nav-item">
                            <a href="#" class="sismoo-side-nav-link">
                                <i class="las la-backward sismoo-side-nav-icon"></i>
                                <span class="sismoo-side-nav-text">{{ translate('Refunds') }}</span>
                                @if (env("DEMO_MODE") == "On")
                                    <span class="badge badge-inline badge-danger">Addon</span>
                                @endif
                                <span class="sismoo-side-nav-arrow"></span>
                            </a>
                            <ul class="sismoo-side-nav-list level-2">
                                <li class="sismoo-side-nav-item">
                                    <a href="{{route('refund_requests_all')}}" class="sismoo-side-nav-link {{ areActiveRoutes(['refund_requests_all', 'reason_show'])}}">
                                        <span class="sismoo-side-nav-text">{{translate('Refund Requests')}}</span>
                                    </a>
                                </li>
                                <li class="sismoo-side-nav-item">
                                    <a href="{{route('paid_refund')}}" class="sismoo-side-nav-link">
                                        <span class="sismoo-side-nav-text">{{translate('Approved Refunds')}}</span>
                                    </a>
                                </li>
                                <li class="sismoo-side-nav-item">
                                    <a href="{{route('rejected_refund')}}" class="sismoo-side-nav-link">
                                        <span class="sismoo-side-nav-text">{{translate('rejected Refunds')}}</span>
                                    </a>
                                </li>
                                <li class="sismoo-side-nav-item">
                                    <a href="{{route('refund_time_config')}}" class="sismoo-side-nav-link">
                                        <span class="sismoo-side-nav-text">{{translate('Refund Configuration')}}</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endif
                @endif


            <!-- Customers -->
                @if(Auth::user()->user_type == 'admin' || in_array('8', json_decode(Auth::user()->staff->role->permissions)))
                    <li class="sismoo-side-nav-item">
                        <a href="#" class="sismoo-side-nav-link">
                            <i class="las la-user-friends sismoo-side-nav-icon"></i>
                            <span class="sismoo-side-nav-text">{{ translate('Customers') }}</span>
                            <span class="sismoo-side-nav-arrow"></span>
                        </a>
                        <ul class="sismoo-side-nav-list level-2">
                            <li class="sismoo-side-nav-item">
                                <a href="{{ route('customers.index') }}" class="sismoo-side-nav-link">
                                    <span class="sismoo-side-nav-text">{{ translate('Customer list') }}</span>
                                </a>
                            </li>
                            @if(get_setting('classified_product') == 1)
                                <li class="sismoo-side-nav-item">
                                    <a href="{{route('classified_products')}}" class="sismoo-side-nav-link">
                                        <span class="sismoo-side-nav-text">{{translate('Classified Products')}}</span>
                                    </a>
                                </li>
                                <li class="sismoo-side-nav-item">
                                    <a href="{{ route('customer_packages.index') }}" class="sismoo-side-nav-link {{ areActiveRoutes(['customer_packages.index', 'customer_packages.create', 'customer_packages.edit'])}}">
                                        <span class="sismoo-side-nav-text">{{ translate('Classified Packages') }}</span>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif

            <!-- Sellers -->
                @if((Auth::user()->user_type == 'admin' || in_array('9', json_decode(Auth::user()->staff->role->permissions))) && get_setting('vendor_system_activation') == 1)
                    <li class="sismoo-side-nav-item">
                        <a href="#" class="sismoo-side-nav-link">
                            <i class="las la-user sismoo-side-nav-icon"></i>
                            <span class="sismoo-side-nav-text">{{ translate('Sellers') }}</span>
                            <span class="sismoo-side-nav-arrow"></span>
                        </a>
                        <ul class="sismoo-side-nav-list level-2">
                            <li class="sismoo-side-nav-item">
                                @php
                                    $sellers = \App\Seller::where('verification_status', 0)->where('verification_info', '!=', null)->count();
                                @endphp
                                <a href="{{ route('sellers.index') }}" class="sismoo-side-nav-link {{ areActiveRoutes(['sellers.index', 'sellers.create', 'sellers.edit', 'sellers.payment_history','sellers.approved','sellers.profile_modal','sellers.show_verification_request'])}}">
                                    <span class="sismoo-side-nav-text">{{ translate('All Seller') }}</span>
                                    @if($sellers > 0)<span class="badge badge-info">{{ $sellers }}</span> @endif
                                </a>
                            </li>
                            <li class="sismoo-side-nav-item">
                                <a href="{{ route('sellers.payment_histories') }}" class="sismoo-side-nav-link">
                                    <span class="sismoo-side-nav-text">{{ translate('Payouts') }}</span>
                                </a>
                            </li>
                            <li class="sismoo-side-nav-item">
                                <a href="{{ route('withdraw_requests_all') }}" class="sismoo-side-nav-link">
                                    <span class="sismoo-side-nav-text">{{ translate('Payout Requests') }}</span>
                                </a>
                            </li>
                            <li class="sismoo-side-nav-item">
                                <a href="{{ route('settings.vendor_commission') }}" class="sismoo-side-nav-link">
                                    <span class="sismoo-side-nav-text">{{ translate('Seller Commission') }}</span>
                                </a>
                            </li>

                            @if (addon_is_activated('seller_subscription'))
                                <li class="sismoo-side-nav-item">
                                    <a href="{{ route('seller_packages.index') }}" class="sismoo-side-nav-link {{ areActiveRoutes(['seller_packages.index', 'seller_packages.create', 'seller_packages.edit'])}}">
                                        <span class="sismoo-side-nav-text">{{ translate('Seller Packages') }}</span>
                                        @if (env("DEMO_MODE") == "On")
                                            <span class="badge badge-inline badge-danger">Addon</span>
                                        @endif
                                    </a>
                                </li>
                            @endif
                            <li class="sismoo-side-nav-item">
                                <a href="{{ route('seller_verification_form.index') }}" class="sismoo-side-nav-link">
                                    <span class="sismoo-side-nav-text">{{ translate('Seller Verification Form') }}</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif
                @if(Auth::user()->user_type == 'admin' || in_array('22', json_decode(Auth::user()->staff->role->permissions)))
                    <li class="sismoo-side-nav-item">
                        <a href="{{ route('uploaded-files.index') }}" class="sismoo-side-nav-link {{ areActiveRoutes(['uploaded-files.create'])}}">
                            <i class="las la-folder-open sismoo-side-nav-icon"></i>
                            <span class="sismoo-side-nav-text">{{ translate('Uploaded Files') }}</span>
                        </a>
                    </li>
                @endif
            <!-- Reports -->
                @if(Auth::user()->user_type == 'admin' || in_array('10', json_decode(Auth::user()->staff->role->permissions)))
                    <li class="sismoo-side-nav-item">
                        <a href="#" class="sismoo-side-nav-link">
                            <i class="las la-file-alt sismoo-side-nav-icon"></i>
                            <span class="sismoo-side-nav-text">{{ translate('Reports') }}</span>
                            <span class="sismoo-side-nav-arrow"></span>
                        </a>
                        <ul class="sismoo-side-nav-list level-2">
                            <li class="sismoo-side-nav-item">
                                <a href="{{ route('in_house_sale_report.index') }}" class="sismoo-side-nav-link {{ areActiveRoutes(['in_house_sale_report.index'])}}">
                                    <span class="sismoo-side-nav-text">{{ translate('In House Product Sale') }}</span>
                                </a>
                            </li>
                            <li class="sismoo-side-nav-item">
                                <a href="{{ route('seller_sale_report.index') }}" class="sismoo-side-nav-link {{ areActiveRoutes(['seller_sale_report.index'])}}">
                                    <span class="sismoo-side-nav-text">{{ translate('Seller Products Sale') }}</span>
                                </a>
                            </li>
                            <li class="sismoo-side-nav-item">
                                <a href="{{ route('stock_report.index') }}" class="sismoo-side-nav-link {{ areActiveRoutes(['stock_report.index'])}}">
                                    <span class="sismoo-side-nav-text">{{ translate('Products Stock') }}</span>
                                </a>
                            </li>
                            <li class="sismoo-side-nav-item">
                                <a href="{{ route('wish_report.index') }}" class="sismoo-side-nav-link {{ areActiveRoutes(['wish_report.index'])}}">
                                    <span class="sismoo-side-nav-text">{{ translate('Products wishlist') }}</span>
                                </a>
                            </li>
                            <li class="sismoo-side-nav-item">
                                <a href="{{ route('user_search_report.index') }}" class="sismoo-side-nav-link {{ areActiveRoutes(['user_search_report.index'])}}">
                                    <span class="sismoo-side-nav-text">{{ translate('User Searches') }}</span>
                                </a>
                            </li>
                            <li class="sismoo-side-nav-item">
                                <a href="{{ route('commission-log.index') }}" class="sismoo-side-nav-link">
                                    <span class="sismoo-side-nav-text">{{ translate('Commission History') }}</span>
                                </a>
                            </li>
                            <li class="sismoo-side-nav-item">
                                <a href="{{ route('wallet-history.index') }}" class="sismoo-side-nav-link">
                                    <span class="sismoo-side-nav-text">{{ translate('Wallet Recharge History') }}</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif
                @if(Auth::user()->user_type == 'admin' || in_array('23', json_decode(Auth::user()->staff->role->permissions)))
                <!--Blog System-->
                    <li class="sismoo-side-nav-item">
                        <a href="#" class="sismoo-side-nav-link">
                            <i class="las la-bullhorn sismoo-side-nav-icon"></i>
                            <span class="sismoo-side-nav-text">{{ translate('Blog System') }}</span>
                            <span class="sismoo-side-nav-arrow"></span>
                        </a>
                        <ul class="sismoo-side-nav-list level-2">
                            <li class="sismoo-side-nav-item">
                                <a href="{{ route('blog.index') }}" class="sismoo-side-nav-link {{ areActiveRoutes(['blog.create', 'blog.edit'])}}">
                                    <span class="sismoo-side-nav-text">{{ translate('All Posts') }}</span>
                                </a>
                            </li>
                            <li class="sismoo-side-nav-item">
                                <a href="{{ route('blog-category.index') }}" class="sismoo-side-nav-link {{ areActiveRoutes(['blog-category.create', 'blog-category.edit'])}}">
                                    <span class="sismoo-side-nav-text">{{ translate('Categories') }}</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif

            <!-- marketing -->
                @if(Auth::user()->user_type == 'admin' || in_array('11', json_decode(Auth::user()->staff->role->permissions)))
                    <li class="sismoo-side-nav-item">
                        <a href="#" class="sismoo-side-nav-link">
                            <i class="las la-bullhorn sismoo-side-nav-icon"></i>
                            <span class="sismoo-side-nav-text">{{ translate('Marketing') }}</span>
                            <span class="sismoo-side-nav-arrow"></span>
                        </a>
                        <ul class="sismoo-side-nav-list level-2">
                            @if(Auth::user()->user_type == 'admin' || in_array('2', json_decode(Auth::user()->staff->role->permissions)))
                                <li class="sismoo-side-nav-item">
                                    <a href="{{ route('flash_deals.index') }}" class="sismoo-side-nav-link {{ areActiveRoutes(['flash_deals.index', 'flash_deals.create', 'flash_deals.edit'])}}">
                                        <span class="sismoo-side-nav-text">{{ translate('Flash deals') }}</span>
                                    </a>
                                </li>
                            @endif
                            @if(Auth::user()->user_type == 'admin' || in_array('7', json_decode(Auth::user()->staff->role->permissions)))
                                <li class="sismoo-side-nav-item">
                                    <a href="{{route('newsletters.index')}}" class="sismoo-side-nav-link">
                                        <span class="sismoo-side-nav-text">{{ translate('Newsletters') }}</span>
                                    </a>
                                </li>
                                @if (addon_is_activated('otp_system'))
                                    <li class="sismoo-side-nav-item">
                                        <a href="{{route('sms.index')}}" class="sismoo-side-nav-link">
                                            <span class="sismoo-side-nav-text">{{ translate('Bulk SMS') }}</span>
                                            @if (env("DEMO_MODE") == "On")
                                                <span class="badge badge-inline badge-danger">Addon</span>
                                            @endif
                                        </a>
                                    </li>
                                @endif
                            @endif
                            <li class="sismoo-side-nav-item">
                                <a href="{{ route('subscribers.index') }}" class="sismoo-side-nav-link">
                                    <span class="sismoo-side-nav-text">{{ translate('Subscribers') }}</span>
                                </a>
                            </li>
                            <li class="sismoo-side-nav-item">
                                <a href="{{route('coupon.index')}}" class="sismoo-side-nav-link {{ areActiveRoutes(['coupon.index','coupon.create','coupon.edit'])}}">
                                    <span class="sismoo-side-nav-text">{{ translate('Coupon') }}</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif

            <!-- Support -->
                @if(Auth::user()->user_type == 'admin' || in_array('12', json_decode(Auth::user()->staff->role->permissions)))
                    <li class="sismoo-side-nav-item">
                        <a href="#" class="sismoo-side-nav-link">
                            <i class="las la-link sismoo-side-nav-icon"></i>
                            <span class="sismoo-side-nav-text">{{translate('Support')}}</span>
                            <span class="sismoo-side-nav-arrow"></span>
                        </a>
                        <ul class="sismoo-side-nav-list level-2">
                            @if(Auth::user()->user_type == 'admin' || in_array('12', json_decode(Auth::user()->staff->role->permissions)))
                                @php
                                    $support_ticket = DB::table('tickets')
                                                ->where('viewed', 0)
                                                ->select('id')
                                                ->count();
                                @endphp
                                <li class="sismoo-side-nav-item">
                                    <a href="{{ route('support_ticket.admin_index') }}" class="sismoo-side-nav-link {{ areActiveRoutes(['support_ticket.admin_index', 'support_ticket.admin_show'])}}">
                                        <span class="sismoo-side-nav-text">{{translate('Ticket')}}</span>
                                        @if($support_ticket > 0)<span class="badge badge-info">{{ $support_ticket }}</span>@endif
                                    </a>
                                </li>
                            @endif

                            @php
                                $conversation = \App\Conversation::where('receiver_id', Auth::user()->id)->where('receiver_viewed', '1')->get();
                            @endphp
                            @if(Auth::user()->user_type == 'admin' || in_array('12', json_decode(Auth::user()->staff->role->permissions)))
                                <li class="sismoo-side-nav-item">
                                    <a href="{{ route('conversations.admin_index') }}" class="sismoo-side-nav-link {{ areActiveRoutes(['conversations.admin_index', 'conversations.admin_show'])}}">
                                        <span class="sismoo-side-nav-text">{{translate('Product Queries')}}</span>
                                        @if (count($conversation) > 0)
                                            <span class="badge badge-info">{{ count($conversation) }}</span>
                                        @endif
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif

            <!-- Affiliate Addon -->
                @if (addon_is_activated('affiliate_system'))
                    @if(Auth::user()->user_type == 'admin' || in_array('15', json_decode(Auth::user()->staff->role->permissions)))
                        <li class="sismoo-side-nav-item">
                            <a href="#" class="sismoo-side-nav-link">
                                <i class="las la-link sismoo-side-nav-icon"></i>
                                <span class="sismoo-side-nav-text">{{translate('Affiliate System')}}</span>
                                @if (env("DEMO_MODE") == "On")
                                    <span class="badge badge-inline badge-danger">Addon</span>
                                @endif
                                <span class="sismoo-side-nav-arrow"></span>
                            </a>
                            <ul class="sismoo-side-nav-list level-2">
                                <li class="sismoo-side-nav-item">
                                    <a href="{{route('affiliate.configs')}}" class="sismoo-side-nav-link">
                                        <span class="sismoo-side-nav-text">{{translate('Affiliate Registration Form')}}</span>
                                    </a>
                                </li>
                                <li class="sismoo-side-nav-item">
                                    <a href="{{route('affiliate.index')}}" class="sismoo-side-nav-link">
                                        <span class="sismoo-side-nav-text">{{translate('Affiliate Configurations')}}</span>
                                    </a>
                                </li>
                                <li class="sismoo-side-nav-item">
                                    <a href="{{route('affiliate.users')}}" class="sismoo-side-nav-link {{ areActiveRoutes(['affiliate.users', 'affiliate_users.show_verification_request', 'affiliate_user.payment_history'])}}">
                                        <span class="sismoo-side-nav-text">{{translate('Affiliate Users')}}</span>
                                    </a>
                                </li>
                                <li class="sismoo-side-nav-item">
                                    <a href="{{route('refferals.users')}}" class="sismoo-side-nav-link">
                                        <span class="sismoo-side-nav-text">{{translate('Referral Users')}}</span>
                                    </a>
                                </li>
                                <li class="sismoo-side-nav-item">
                                    <a href="{{route('affiliate.withdraw_requests')}}" class="sismoo-side-nav-link">
                                        <span class="sismoo-side-nav-text">{{translate('Affiliate Withdraw Requests')}}</span>
                                    </a>
                                </li>
                                <li class="sismoo-side-nav-item">
                                    <a href="{{route('affiliate.logs.admin')}}" class="sismoo-side-nav-link">
                                        <span class="sismoo-side-nav-text">{{translate('Affiliate Logs')}}</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endif
                @endif

            <!-- Offline Payment Addon-->
                @if (addon_is_activated('offline_payment'))
                    @if(Auth::user()->user_type == 'admin' || in_array('16', json_decode(Auth::user()->staff->role->permissions)))
                        <li class="sismoo-side-nav-item">
                            <a href="#" class="sismoo-side-nav-link">
                                <i class="las la-money-check-alt sismoo-side-nav-icon"></i>
                                <span class="sismoo-side-nav-text">{{translate('Offline Payment System')}}</span>
                                @if (env("DEMO_MODE") == "On")
                                    <span class="badge badge-inline badge-danger">Addon</span>
                                @endif
                                <span class="sismoo-side-nav-arrow"></span>
                            </a>
                            <ul class="sismoo-side-nav-list level-2">
                                <li class="sismoo-side-nav-item">
                                    <a href="{{ route('manual_payment_methods.index') }}" class="sismoo-side-nav-link {{ areActiveRoutes(['manual_payment_methods.index', 'manual_payment_methods.create', 'manual_payment_methods.edit'])}}">
                                        <span class="sismoo-side-nav-text">{{translate('Manual Payment Methods')}}</span>
                                    </a>
                                </li>
                                <li class="sismoo-side-nav-item">
                                    <a href="{{ route('offline_wallet_recharge_request.index') }}" class="sismoo-side-nav-link">
                                        <span class="sismoo-side-nav-text">{{translate('Offline Wallet Recharge')}}</span>
                                    </a>
                                </li>
                                @if(get_setting('classified_product') == 1)
                                    <li class="sismoo-side-nav-item">
                                        <a href="{{ route('offline_customer_package_payment_request.index') }}" class="sismoo-side-nav-link">
                                            <span class="sismoo-side-nav-text">{{translate('Offline Customer Package Payments')}}</span>
                                        </a>
                                    </li>
                                @endif
                                @if (addon_is_activated('seller_subscription'))
                                    <li class="sismoo-side-nav-item">
                                        <a href="{{ route('offline_seller_package_payment_request.index') }}" class="sismoo-side-nav-link">
                                            <span class="sismoo-side-nav-text">{{translate('Offline Seller Package Payments')}}</span>
                                            @if (env("DEMO_MODE") == "On")
                                                <span class="badge badge-inline badge-danger">Addon</span>
                                            @endif
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </li>
                    @endif
                @endif

            <!-- Paytm Addon -->
                @if (addon_is_activated('paytm'))
                    @if(Auth::user()->user_type == 'admin' || in_array('17', json_decode(Auth::user()->staff->role->permissions)))
                        <li class="sismoo-side-nav-item">
                            <a href="#" class="sismoo-side-nav-link">
                                <i class="las la-mobile-alt sismoo-side-nav-icon"></i>
                                <span class="sismoo-side-nav-text">{{translate('Paytm Payment Gateway')}}</span>
                                @if (env("DEMO_MODE") == "On")
                                    <span class="badge badge-inline badge-danger">Addon</span>
                                @endif
                                <span class="sismoo-side-nav-arrow"></span>
                            </a>
                            <ul class="sismoo-side-nav-list level-2">
                                <li class="sismoo-side-nav-item">
                                    <a href="{{ route('paytm.index') }}" class="sismoo-side-nav-link">
                                        <span class="sismoo-side-nav-text">{{translate('Set Paytm Credentials')}}</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endif
                @endif

            <!-- Club Point Addon-->
                @if (addon_is_activated('club_point'))
                    @if(Auth::user()->user_type == 'admin' || in_array('18', json_decode(Auth::user()->staff->role->permissions)))
                        <li class="sismoo-side-nav-item">
                            <a href="#" class="sismoo-side-nav-link">
                                <i class="lab la-btc sismoo-side-nav-icon"></i>
                                <span class="sismoo-side-nav-text">{{translate('Club Point System')}}</span>
                                @if (env("DEMO_MODE") == "On")
                                    <span class="badge badge-inline badge-danger">Addon</span>
                                @endif
                                <span class="sismoo-side-nav-arrow"></span>
                            </a>
                            <ul class="sismoo-side-nav-list level-2">
                                <li class="sismoo-side-nav-item">
                                    <a href="{{ route('club_points.configs') }}" class="sismoo-side-nav-link">
                                        <span class="sismoo-side-nav-text">{{translate('Club Point Configurations')}}</span>
                                    </a>
                                </li>
                                <li class="sismoo-side-nav-item">
                                    <a href="{{route('set_product_points')}}" class="sismoo-side-nav-link {{ areActiveRoutes(['set_product_points', 'product_club_point.edit'])}}">
                                        <span class="sismoo-side-nav-text">{{translate('Set Product Point')}}</span>
                                    </a>
                                </li>
                                <li class="sismoo-side-nav-item">
                                    <a href="{{route('club_points.index')}}" class="sismoo-side-nav-link {{ areActiveRoutes(['club_points.index', 'club_point.details'])}}">
                                        <span class="sismoo-side-nav-text">{{translate('User Points')}}</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endif
                @endif

            <!--OTP addon -->
                @if (addon_is_activated('otp_system'))
                    @if(Auth::user()->user_type == 'admin' || in_array('19', json_decode(Auth::user()->staff->role->permissions)))
                        <li class="sismoo-side-nav-item">
                            <a href="#" class="sismoo-side-nav-link">
                                <i class="las la-phone sismoo-side-nav-icon"></i>
                                <span class="sismoo-side-nav-text">{{translate('OTP System')}}</span>
                                @if (env("DEMO_MODE") == "On")
                                    <span class="badge badge-inline badge-danger">Addon</span>
                                @endif
                                <span class="sismoo-side-nav-arrow"></span>
                            </a>
                            <ul class="sismoo-side-nav-list level-2">
                                <li class="sismoo-side-nav-item">
                                    <a href="{{ route('otp.configconfiguration') }}" class="sismoo-side-nav-link">
                                        <span class="sismoo-side-nav-text">{{translate('OTP Configurations')}}</span>
                                    </a>
                                </li>
                                <li class="sismoo-side-nav-item">
                                    <a href="{{route('sms-templates.index')}}" class="sismoo-side-nav-link">
                                        <span class="sismoo-side-nav-text">{{translate('SMS Templates')}}</span>
                                    </a>
                                </li>
                                <li class="sismoo-side-nav-item">
                                    <a href="{{route('otp_credentials.index')}}" class="sismoo-side-nav-link">
                                        <span class="sismoo-side-nav-text">{{translate('Set OTP Credentials')}}</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endif
                @endif

                @if(addon_is_activated('african_pg'))
                    @if(Auth::user()->user_type == 'admin' || in_array('19', json_decode(Auth::user()->staff->role->permissions)))
                        <li class="sismoo-side-nav-item">
                            <a href="#" class="sismoo-side-nav-link">
                                <i class="las la-phone sismoo-side-nav-icon"></i>
                                <span class="sismoo-side-nav-text">{{translate('African Payment Gateway Addon')}}</span>
                                @if (env("DEMO_MODE") == "On")
                                    <span class="badge badge-inline badge-danger">Addon</span>
                                @endif
                                <span class="sismoo-side-nav-arrow"></span>
                            </a>
                            <ul class="sismoo-side-nav-list level-2">
                                <li class="sismoo-side-nav-item">
                                    <a href="{{ route('african.configuration') }}" class="sismoo-side-nav-link">
                                        <span class="sismoo-side-nav-text">{{translate('African PG Configurations')}}</span>
                                    </a>
                                </li>
                                <li class="sismoo-side-nav-item">
                                    <a href="{{route('african_credentials.index')}}" class="sismoo-side-nav-link">
                                        <span class="sismoo-side-nav-text">{{translate('Set African PG Credentials')}}</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endif
                @endif

            <!-- Website Setup -->
                @if(Auth::user()->user_type == 'admin' || in_array('13', json_decode(Auth::user()->staff->role->permissions)))
                    <li class="sismoo-side-nav-item">
                        <a href="#" class="sismoo-side-nav-link {{ areActiveRoutes(['website.footer', 'website.header'])}}" >
                            <i class="las la-desktop sismoo-side-nav-icon"></i>
                            <span class="sismoo-side-nav-text">{{translate('Website Setup')}}</span>
                            <span class="sismoo-side-nav-arrow"></span>
                        </a>
                        <ul class="sismoo-side-nav-list level-2">
                            <li class="sismoo-side-nav-item">
                                <a href="{{ route('website.header') }}" class="sismoo-side-nav-link">
                                    <span class="sismoo-side-nav-text">{{translate('Header')}}</span>
                                </a>
                            </li>
                            <li class="sismoo-side-nav-item">
                                <a href="{{ route('website.footer', ['lang'=>  App::getLocale()] ) }}" class="sismoo-side-nav-link {{ areActiveRoutes(['website.footer'])}}">
                                    <span class="sismoo-side-nav-text">{{translate('Footer')}}</span>
                                </a>
                            </li>
                            <li class="sismoo-side-nav-item">
                                <a href="{{ route('website.pages') }}" class="sismoo-side-nav-link {{ areActiveRoutes(['website.pages', 'custom-pages.create' ,'custom-pages.edit'])}}">
                                    <span class="sismoo-side-nav-text">{{translate('Pages')}}</span>
                                </a>
                            </li>
                            <li class="sismoo-side-nav-item">
                                <a href="{{ route('website.appearance') }}" class="sismoo-side-nav-link">
                                    <span class="sismoo-side-nav-text">{{translate('Appearance')}}</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif

            <!-- Setup & Configurations -->
                @if(Auth::user()->user_type == 'admin' || in_array('14', json_decode(Auth::user()->staff->role->permissions)))
                    <li class="sismoo-side-nav-item">
                        <a href="#" class="sismoo-side-nav-link">
                            <i class="las la-dharmachakra sismoo-side-nav-icon"></i>
                            <span class="sismoo-side-nav-text">{{translate('Setup & Configurations')}}</span>
                            <span class="sismoo-side-nav-arrow"></span>
                        </a>
                        <ul class="sismoo-side-nav-list level-2">
                            <li class="sismoo-side-nav-item">
                                <a href="{{route('general_setting.index')}}" class="sismoo-side-nav-link">
                                    <span class="sismoo-side-nav-text">{{translate('General Settings')}}</span>
                                </a>
                            </li>

                            <li class="sismoo-side-nav-item">
                                <a href="{{route('activation.index')}}" class="sismoo-side-nav-link">
                                    <span class="sismoo-side-nav-text">{{translate('Features activation')}}</span>
                                </a>
                            </li>
                            <li class="sismoo-side-nav-item">
                                <a href="{{route('languages.index')}}" class="sismoo-side-nav-link {{ areActiveRoutes(['languages.index', 'languages.create', 'languages.store', 'languages.show', 'languages.edit'])}}">
                                    <span class="sismoo-side-nav-text">{{translate('Languages')}}</span>
                                </a>
                            </li>

                            <li class="sismoo-side-nav-item">
                                <a href="{{route('currency.index')}}" class="sismoo-side-nav-link">
                                    <span class="sismoo-side-nav-text">{{translate('Currency')}}</span>
                                </a>
                            </li>
                            <li class="sismoo-side-nav-item">
                                <a href="{{route('tax.index')}}" class="sismoo-side-nav-link {{ areActiveRoutes(['tax.index', 'tax.create', 'tax.store', 'tax.show', 'tax.edit'])}}">
                                    <span class="sismoo-side-nav-text">{{translate('Vat & TAX')}}</span>
                                </a>
                            </li>
                            <li class="sismoo-side-nav-item">
                                <a href="{{route('pick_up_points.index')}}" class="sismoo-side-nav-link {{ areActiveRoutes(['pick_up_points.index','pick_up_points.create','pick_up_points.edit'])}}">
                                    <span class="sismoo-side-nav-text">{{translate('Pickup point')}}</span>
                                </a>
                            </li>
                            <li class="sismoo-side-nav-item">
                                <a href="{{ route('smtp_settings.index') }}" class="sismoo-side-nav-link">
                                    <span class="sismoo-side-nav-text">{{translate('SMTP Settings')}}</span>
                                </a>
                            </li>
                            <li class="sismoo-side-nav-item">
                                <a href="{{ route('payment_method.index') }}" class="sismoo-side-nav-link">
                                    <span class="sismoo-side-nav-text">{{translate('Payment Methods')}}</span>
                                </a>
                            </li>
                            <li class="sismoo-side-nav-item">
                                <a href="{{ route('file_system.index') }}" class="sismoo-side-nav-link">
                                    <span class="sismoo-side-nav-text">{{translate('File System & Cache Configuration')}}</span>
                                </a>
                            </li>
                            <li class="sismoo-side-nav-item">
                                <a href="{{ route('social_login.index') }}" class="sismoo-side-nav-link">
                                    <span class="sismoo-side-nav-text">{{translate('Social media Logins')}}</span>
                                </a>
                            </li>

                            <li class="sismoo-side-nav-item">
                                <a href="javascript:void(0);" class="sismoo-side-nav-link">
                                    <span class="sismoo-side-nav-text">{{translate('Facebook')}}</span>
                                    <span class="sismoo-side-nav-arrow"></span>
                                </a>
                                <ul class="sismoo-side-nav-list level-3">
                                    <li class="sismoo-side-nav-item">
                                        <a href="{{ route('facebook_chat.index') }}" class="sismoo-side-nav-link">
                                            <span class="sismoo-side-nav-text">{{translate('Facebook Chat')}}</span>
                                        </a>
                                    </li>
                                    <li class="sismoo-side-nav-item">
                                        <a href="{{ route('facebook-comment') }}" class="sismoo-side-nav-link">
                                            <span class="sismoo-side-nav-text">{{translate('Facebook Comment')}}</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="sismoo-side-nav-item">
                                <a href="javascript:void(0);" class="sismoo-side-nav-link">
                                    <span class="sismoo-side-nav-text">{{translate('Google')}}</span>
                                    <span class="sismoo-side-nav-arrow"></span>
                                </a>
                                <ul class="sismoo-side-nav-list level-3">
                                    <li class="sismoo-side-nav-item">
                                        <a href="{{ route('google_analytics.index') }}" class="sismoo-side-nav-link">
                                            <span class="sismoo-side-nav-text">{{translate('Analytics Tools')}}</span>
                                        </a>
                                    </li>
                                    <li class="sismoo-side-nav-item">
                                        <a href="{{ route('google_recaptcha.index') }}" class="sismoo-side-nav-link">
                                            <span class="sismoo-side-nav-text">{{translate('Google reCAPTCHA')}}</span>
                                        </a>
                                    </li>
                                    <li class="sismoo-side-nav-item">
                                        <a href="{{ route('google-map.index') }}" class="sismoo-side-nav-link">
                                            <span class="sismoo-side-nav-text">{{translate('Google Map')}}</span>
                                        </a>
                                    </li>
                                    <li class="sismoo-side-nav-item">
                                        <a href="{{ route('google-firebase.index') }}" class="sismoo-side-nav-link">
                                            <span class="sismoo-side-nav-text">{{translate('Google Firebase')}}</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>




                            <li class="sismoo-side-nav-item">
                                <a href="javascript:void(0);" class="sismoo-side-nav-link">
                                    <span class="sismoo-side-nav-text">{{translate('Shipping')}}</span>
                                    <span class="sismoo-side-nav-arrow"></span>
                                </a>
                                <ul class="sismoo-side-nav-list level-3">
                                    <li class="sismoo-side-nav-item">
                                        <a href="{{route('shipping_configuration.index')}}" class="sismoo-side-nav-link {{ areActiveRoutes(['shipping_configuration.index','shipping_configuration.edit','shipping_configuration.update'])}}">
                                            <span class="sismoo-side-nav-text">{{translate('Shipping Configuration')}}</span>
                                        </a>
                                    </li>
                                    <li class="sismoo-side-nav-item">
                                        <a href="{{route('countries.index')}}" class="sismoo-side-nav-link {{ areActiveRoutes(['countries.index','countries.edit','countries.update'])}}">
                                            <span class="sismoo-side-nav-text">{{translate('Shipping Countries')}}</span>
                                        </a>
                                    </li>
                                    <li class="sismoo-side-nav-item">
                                        <a href="{{route('cities.index')}}" class="sismoo-side-nav-link {{ areActiveRoutes(['cities.index','cities.edit','cities.update'])}}">
                                            <span class="sismoo-side-nav-text">{{translate('Shipping Cities')}}</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                        </ul>
                    </li>
                @endif


            <!-- Staffs -->
                @if(Auth::user()->user_type == 'admin' || in_array('20', json_decode(Auth::user()->staff->role->permissions)))
                    <li class="sismoo-side-nav-item">
                        <a href="#" class="sismoo-side-nav-link">
                            <i class="las la-user-tie sismoo-side-nav-icon"></i>
                            <span class="sismoo-side-nav-text">{{translate('Staffs')}}</span>
                            <span class="sismoo-side-nav-arrow"></span>
                        </a>
                        <ul class="sismoo-side-nav-list level-2">
                            <li class="sismoo-side-nav-item">
                                <a href="{{ route('staffs.index') }}" class="sismoo-side-nav-link {{ areActiveRoutes(['staffs.index', 'staffs.create', 'staffs.edit'])}}">
                                    <span class="sismoo-side-nav-text">{{translate('All staffs')}}</span>
                                </a>
                            </li>
                            <li class="sismoo-side-nav-item">
                                <a href="{{route('roles.index')}}" class="sismoo-side-nav-link {{ areActiveRoutes(['roles.index', 'roles.create', 'roles.edit'])}}">
                                    <span class="sismoo-side-nav-text">{{translate('Staff permissions')}}</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif
                @if(Auth::user()->user_type == 'admin' || in_array('24', json_decode(Auth::user()->staff->role->permissions)))
                    <li class="sismoo-side-nav-item">
                        <a href="#" class="sismoo-side-nav-link">
                            <i class="las la-user-tie sismoo-side-nav-icon"></i>
                            <span class="sismoo-side-nav-text">{{translate('System')}}</span>
                            <span class="sismoo-side-nav-arrow"></span>
                        </a>
                        <ul class="sismoo-side-nav-list level-2">
                            <li class="sismoo-side-nav-item">
                                <a href="{{ route('system_update') }}" class="sismoo-side-nav-link">
                                    <span class="sismoo-side-nav-text">{{translate('Update')}}</span>
                                </a>
                            </li>
                            <li class="sismoo-side-nav-item">
                                <a href="{{route('system_server')}}" class="sismoo-side-nav-link">
                                    <span class="sismoo-side-nav-text">{{translate('Server status')}}</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif

            <!-- Addon Manager -->
                @if(Auth::user()->user_type == 'admin' || in_array('21', json_decode(Auth::user()->staff->role->permissions)))
                    <li class="sismoo-side-nav-item">
                        <a href="{{route('addons.index')}}" class="sismoo-side-nav-link {{ areActiveRoutes(['addons.index', 'addons.create'])}}">
                            <i class="las la-wrench sismoo-side-nav-icon"></i>
                            <span class="sismoo-side-nav-text">{{translate('Addon Manager')}}</span>
                        </a>
                    </li>
                @endif
            </ul><!-- .sismoo-side-nav -->
        </div><!-- .sismoo-side-nav-wrap -->
    </div><!-- .sismoo-sidebar -->
    <div class="sismoo-sidebar-overlay"></div>
</div><!-- .sismoo-sidebar -->
