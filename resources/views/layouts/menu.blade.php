@php
$urlAdmin=config('fast.admin_prefix');
@endphp

@can('dashboard')
@php
$isDashboardActive = Request::is($urlAdmin);
@endphp
<li class="nav-item">
    <a href="{{ route('dashboard') }}" class="nav-link {{ $isDashboardActive ? 'active' : '' }}">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>@lang('menu.dashboard')</p>
    </a>
</li>
@endcan

{{-- @can('generator_builder.index')
@php
$isUserActive = Request::is($urlAdmin.'*generator_builder*');
@endphp
<li class="nav-item">
    <a href="{{ route('generator_builder.index') }}" class="nav-link {{ $isUserActive ? 'active' : '' }}">
        <i class="nav-icon fas fa-coins"></i>
        <p>@lang('menu.generator_builder.title')</p>
    </a>
</li>
@endcan --}}

@can('attendances.index')
@php
$isUserActive = Request::is($urlAdmin.'*attendances*');
@endphp

<li class="nav-item">
    <a href="{{ route('attendances.index') }}" class="nav-link {{ $isUserActive ? 'active' : '' }}">
        <i class="nav-icon fas fa-calendar-alt"></i>

        <p>@lang('menu.attendances.title')</p>
    </a>
</li>
@endcan

@canany(['users.index','roles.index','permissions.index'])
@php
$isUserActive = Request::is($urlAdmin.'*users*');
$isRoleActive = Request::is($urlAdmin.'*roles*');
$isPermissionActive = Request::is($urlAdmin.'*permissions*');
@endphp
<li class="nav-item {{($isUserActive||$isRoleActive||$isPermissionActive)?'menu-open':''}} ">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-shield-virus"></i>
        <p>
            @lang('menu.user.title')
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview" style="margin-left: 20px;">
        @can('users.index')
        <li class="nav-item">
            <a href="{{ route('users.index') }}" class="nav-link {{ $isUserActive ? 'active' : '' }}">
                <i class="nav-icon fas fa-users"></i>
                <p>
                    @lang('menu.user.users')
                </p>
            </a>
        </li>
        @endcan
        @can('roles.index')
        <li class="nav-item">
            <a href="{{ route('roles.index') }}" class="nav-link {{ $isRoleActive ? 'active' : '' }}">
                <i class="nav-icon fas fa-user-shield"></i>
                <p>
                    @lang('menu.user.roles')
                </p>
            </a>
        </li>
        @endcan
        @can('permissions.index')
        <li class="nav-item ">
            <a href="{{ route('permissions.index') }}" class="nav-link {{ $isPermissionActive ? 'active' : '' }}">
                <i class="nav-icon fas fa-shield-alt"></i>
                <p>
                    @lang('menu.user.permissions')
                </p>
            </a>
        </li>
        @endcan
    </ul>
</li>
@endcan

{{-- CLIENTS --}}
@canany(['clients.index','clients.create'])
@php
$isClientActive = Request::is($urlAdmin.'*clients*');
$isClientcreate = Request::is($urlAdmin.'*clients/create*');
if($isClientcreate){
    $isClientActive =false;
}

$isRoleActive = Request::is($urlAdmin.'*roles*');
$isPermissionActive = Request::is($urlAdmin.'*permissions*');
@endphp
<li class="nav-item {{($isClientActive||$isClientcreate)?'menu-open':''}} ">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-shield-virus"></i>
        <p>
            @lang('Clients')
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview" style="margin-left: 20px;">
        @can('clients.index')
        <li class="nav-item">
            <a href="{{ route('clients.index') }}" class="nav-link {{ $isClientActive ? 'active' : '' }}">
                <i class="nav-icon fas fa-user-shield"></i>
                <p>All Clients</p>
            </a>
        </li>
        @endcan
        @can('clients.create')
        <li class="nav-item">
            <a href="{{ route('clients.create') }}" class="nav-link {{ $isClientcreate ? 'active' : '' }}">
                <i class="nav-icon fas fa-user-shield"></i>
                <p>Add Client</p>
            </a>
        </li>
        @endcan
    </ul>
</li>
@endcan
{{-- END CLIENTS --}}

{{-- Quotation --}}
@canany(['quotations.index','quotations.create'])
@php
$isquotationsActive = Request::is($urlAdmin.'*quotations*');
$isquotationproduct = Request::is($urlAdmin.'*quotationProducts*');
$isquotationscreate = Request::is($urlAdmin.'*quotations/create*');
if($isquotationscreate){
    $isquotationsActive =false;
}

@endphp
<li class="nav-item {{($isquotationsActive||$isquotationscreate||$isquotationproduct)?'menu-open':''}} ">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-shield-virus"></i>
        <p>
            @lang('Quotations')
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview" style="margin-left: 20px;">
        @can('quotations.index')
        <li class="nav-item">
            <a href="{{ route('quotations.index') }}" class="nav-link {{ $isquotationsActive ? 'active' : '' }}">
                <i class="nav-icon fas fa-user-shield"></i>
                <p>All Quotations</p>
            </a>
        </li>
        @endcan
        @can('quotations.create')
        <li class="nav-item">
            <a href="{{ route('quotations.create') }}" class="nav-link {{ $isquotationscreate ? 'active' : '' }}">
                <i class="nav-icon fas fa-user-shield"></i>
                <p>Add Quotation</p>
            </a>
        </li>
        @endcan
        @can('quotationProducts.index')
        <li class="nav-item">
            <a href="{{ route('quotationProducts.index') }}" class="nav-link {{ $isquotationproduct ? 'active' : '' }}">
                <i class="nav-icon fas fa-user-shield"></i>
                <p>Quotation Products</p>
            </a>
        </li>
        @endcan
    </ul>
</li>
@endcan
{{-- END quotation --}}

{{-- INVOICE --}}
@canany(['invoices.index','invoices.create','invoicesProducts'])
@php
$isinvoicesActive = Request::is($urlAdmin.'*invoices*');
$isinvoiceproduct = Request::is($urlAdmin.'*invoicesProducts*');
$isinvoicescreate = Request::is($urlAdmin.'*invoices/create*');
if($isinvoicescreate||$isinvoiceproduct){
    $isinvoicesActive =false;
}

@endphp
<li class="nav-item {{($isinvoicesActive||$isinvoiceproduct||$isinvoicescreate)?'menu-open':''}} ">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-shield-virus"></i>
        <p>
            @lang('Invoices')
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview" style="margin-left: 20px;">
        @can('invoices.index')
        <li class="nav-item">
            <a href="{{ route('invoices.index') }}" class="nav-link {{ $isinvoicesActive ? 'active' : '' }}">
                <i class="nav-icon fas fa-user-shield"></i>
                <p>All Invoices</p>
            </a>
        </li>
        @endcan
        @can('invoices.create')
        <li class="nav-item">
            <a href="{{ route('invoices.create') }}" class="nav-link {{ $isinvoicescreate ? 'active' : '' }}">
                <i class="nav-icon fas fa-user-shield"></i>
                <p>Add Invoice</p>
            </a>
        </li>
        @endcan
        @can('invoicesProducts.index')
        <li class="nav-item">
            <a href="{{ route('invoicesProducts.index') }}" class="nav-link {{ $isinvoiceproduct ? 'active' : '' }}">
                <i class="nav-icon fas fa-user-shield"></i>
                <p>Invoice Products</p>
            </a>
        </li>
        @endcan
    </ul>
</li>
@endcan
{{-- END INVOICE --}}

@can('fileUploads.index')
<li class="nav-item">
    <a href="{{ route('fileUploads.index') }}" class="nav-link {{ Request::is('fileUploads*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-file-alt"></i>
        <p>@lang('models/fileUploads.plural')</p>
    </a>
</li>
@endcan

<!-- Reports -->
<li class="nav-item">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-file"></i>
        <p>
            Reports
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview" style="margin-left: 20px;">
        <li class="nav-item">
            <a href="{{ route('trialbalance') }}" class="nav-link {{ $isinvoicesActive ? 'active' : '' }}">
                <i class="nav-icon fas fa-file"></i>
                <p>Trial Balance</p>
            </a>
        </li>
    </ul>
</li>

<li class="nav-item">
    <a href="{{ route('vendors.index') }}"
       class="nav-link {{ Request::is('vendors*') ? 'active' : '' }}">
        <p>@lang('models/vendors.plural')</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('taxes.index') }}"
       class="nav-link {{ Request::is('taxes*') ? 'active' : '' }}">
        <p>@lang('models/taxes.plural')</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('officeDetails.index') }}"
       class="nav-link {{ Request::is('officeDetails*') ? 'active' : '' }}">
        <p>@lang('models/officeDetails.plural')</p>
    </a>
</li>
{{--
<li class="nav-item">
    <a href="{{ route('quotations.index') }}"
       class="nav-link {{ Request::is('quotations*') ? 'active' : '' }}">
        <p>@lang('models/quotations.plural')</p>
    </a>
</li> --}}

{{-- <li class="nav-item">
    <a href="{{ route('quotationProducts.index') }}"
       class="nav-link {{ Request::is('quotationProducts*') ? 'active' : '' }}">
        <p>@lang('models/quotationProducts.plural')</p>
    </a>
</li> --}}

<li class="nav-item">
    <a href="{{ route('jobOrders.index') }}"
       class="nav-link {{ Request::is('jobOrders*') ? 'active' : '' }}">
        <p>@lang('models/jobOrders.plural')</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('banks.index') }}"
       class="nav-link {{ Request::is('banks*') ? 'active' : '' }}">
        <p>@lang('models/banks.plural')</p>
    </a>
</li>

{{-- <li class="nav-item">
    <a href="{{ route('invoices.index') }}"
       class="nav-link {{ Request::is('invoices*') ? 'active' : '' }}">
        <p>@lang('models/invoices.plural')</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('invoicesProducts.index') }}"
       class="nav-link {{ Request::is('invoicesProducts*') ? 'active' : '' }}">
        <p>@lang('models/invoicesProducts.plural')</p>
    </a>
</li> --}}

<li class="nav-item">
    <a href="{{ route('transections.index') }}"
       class="nav-link {{ Request::is('transections*') ? 'active' : '' }}">
        <p>@lang('models/transections.plural')</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('purchaseOrders.index') }}"
       class="nav-link {{ Request::is('purchaseOrders*') ? 'active' : '' }}">
        <p>@lang('models/purchaseOrders.plural')</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('purchaseorderproducts.index') }}"
       class="nav-link {{ Request::is('purchaseorderproducts*') ? 'active' : '' }}">
        <p>@lang('models/purchaseorderproducts.plural')</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('chartofaccounts.index') }}"
       class="nav-link {{ Request::is('chartofaccounts*') ? 'active' : '' }}">
        <p>@lang('models/chartofaccounts.plural')</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('ledgers.index') }}"
       class="nav-link {{ Request::is('ledgers*') ? 'active' : '' }}">
        <p>@lang('models/ledgers.plural')</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('reciptvouchers.index') }}"
       class="nav-link {{ Request::is('reciptvouchers*') ? 'active' : '' }}">
        <p>@lang('models/reciptvouchers.plural')</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('paymentvouchers.index') }}"
       class="nav-link {{ Request::is('paymentvouchers*') ? 'active' : '' }}">
        <p>@lang('models/paymentvouchers.plural')</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('generalvouchers.index') }}"
       class="nav-link {{ Request::is('generalvouchers*') ? 'active' : '' }}">
        <p>Journal Voucher</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('accountsHeads.index') }}"
       class="nav-link {{ Request::is('accountsHeads*') ? 'active' : '' }}">
        <p>@lang('models/accountsHeads.plural')</p>
    </a>
</li>

