@if(auth()->user()->hasRole('super-admin'))
<!--begin:Menu sub-->
<!--begin:Menu item-->
<div data-kt-menu-trigger="click" class="menu-item menu-accordion mb-1">
    <!--begin:Menu link-->
    <span class="menu-item">
        <a class="menu-link {{ Request::is('claimscompensation*') ? 'active' : '' }}" href="{{ route('type.index') }}">
            <span class="menu-icon">
                <!--begin::Svg Icon | path: icons/duotune/communication/com012.svg-->
                <span class="svg-icon svg-icon-2">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path opacity="0.3" d="M20 3H4C2.89543 3 2 3.89543 2 5V16C2 17.1046 2.89543 18 4 18H4.5C5.05228 18 5.5 18.4477 5.5 19V21.5052C5.5 22.1441 6.21212 22.5253 6.74376 22.1708L11.4885 19.0077C12.4741 18.3506 13.6321 18 14.8167 18H20C21.1046 18 22 17.1046 22 16V5C22 3.89543 21.1046 3 20 3Z" fill="currentColor"></path>
                        <rect x="6" y="12" width="7" height="2" rx="1" fill="currentColor"></rect>
                        <rect x="6" y="7" width="12" height="2" rx="1" fill="currentColor"></rect>
                    </svg>
                </span>
                <!--end::Svg Icon-->
            </span>
            <span class="menu-title">Type</span>
            <!-- <span class="menu-arrow"></span> -->
        </a>
    </span>
    <!--end:Menu link-->
</div>
<!--end:Menu item-->
<!--end:Menu sub-->
@endif

<!--begin:Menu sub-->
<!--begin:Menu item-->
<div data-kt-menu-trigger="click" class="menu-item menu-accordion mb-1">
    <!--begin:Menu link-->
    <span class="menu-item">
        <a class="menu-link {{ Request::is('request*') ? 'active' : '' }}" href="{{ route('request.index') }}">
            <span class="menu-icon">
                <!--begin::Svg Icon | path: icons/duotune/communication/com012.svg-->
                <span class="svg-icon svg-icon-2">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path opacity="0.3" d="M20 3H4C2.89543 3 2 3.89543 2 5V16C2 17.1046 2.89543 18 4 18H4.5C5.05228 18 5.5 18.4477 5.5 19V21.5052C5.5 22.1441 6.21212 22.5253 6.74376 22.1708L11.4885 19.0077C12.4741 18.3506 13.6321 18 14.8167 18H20C21.1046 18 22 17.1046 22 16V5C22 3.89543 21.1046 3 20 3Z" fill="currentColor"></path>
                        <rect x="6" y="12" width="7" height="2" rx="1" fill="currentColor"></rect>
                        <rect x="6" y="7" width="12" height="2" rx="1" fill="currentColor"></rect>
                    </svg>
                </span>
                <!--end::Svg Icon-->
            </span>
            <span class="menu-title">Request</span>
            <!-- <span class="menu-arrow"></span> -->
        </a>
    </span>
    <!--end:Menu link-->
</div>
<!--end:Menu item-->
<!--end:Menu sub-->

<!--begin:Menu sub-->
<!--begin:Menu item-->
<div data-kt-menu-trigger="click" class="menu-item menu-accordion mb-1">
    <!--begin:Menu link-->
    <span class="menu-item">
        <a class="menu-link" href="{{ route('appraisal.index') }}">
            <span class="menu-icon">
                <!--begin::Svg Icon | path: icons/duotune/communication/com012.svg-->
                <span class="svg-icon svg-icon-2">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path opacity="0.3" d="M20 3H4C2.89543 3 2 3.89543 2 5V16C2 17.1046 2.89543 18 4 18H4.5C5.05228 18 5.5 18.4477 5.5 19V21.5052C5.5 22.1441 6.21212 22.5253 6.74376 22.1708L11.4885 19.0077C12.4741 18.3506 13.6321 18 14.8167 18H20C21.1046 18 22 17.1046 22 16V5C22 3.89543 21.1046 3 20 3Z" fill="currentColor"></path>
                        <rect x="6" y="12" width="7" height="2" rx="1" fill="currentColor"></rect>
                        <rect x="6" y="7" width="12" height="2" rx="1" fill="currentColor"></rect>
                    </svg>
                </span>
                <!--end::Svg Icon-->
            </span>
            <span class="menu-title">Appraisal</span>
            <!-- <span class="menu-arrow"></span> -->
        </a>
    </span>
    <!--end:Menu link-->
</div>
<!--end:Menu item-->
<!--end:Menu sub-->


{{-- <!--begin:Menu item-->
<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
    <!--begin:Menu link-->
    <span class="menu-link">
        <span class="menu-icon">
            <!--begin::Svg Icon | path: icons/duotune/layouts/lay008.svg-->
            <span class="svg-icon svg-icon-2">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M20 7H3C2.4 7 2 6.6 2 6V3C2 2.4 2.4 2 3 2H20C20.6 2 21 2.4 21 3V6C21 6.6 20.6 7 20 7ZM7 9H3C2.4 9 2 9.4 2 10V20C2 20.6 2.4 21 3 21H7C7.6 21 8 20.6 8 20V10C8 9.4 7.6 9 7 9Z"
                        fill="currentColor" />
                    <path opacity="0.3"
                        d="M20 21H11C10.4 21 10 20.6 10 20V10C10 9.4 10.4 9 11 9H20C20.6 9 21 9.4 21 10V20C21 20.6 20.6 21 20 21Z"
                        fill="currentColor" />
                </svg>
            </span>
            <!--end::Svg Icon-->
        </span>
        <span class="menu-title">Approvals</span>
        <span class="menu-arrow"></span>
    </span>
    <!--end:Menu link-->

    <!--begin:Menu sub-->
    <div class="menu-sub menu-sub-accordion">
        <!--begin:Menu item-->
        <div class="menu-item">
            <!--begin:Menu link-->
            <a href="{{ route('type.index') }}"
                class="menu-link {{ Request::is('approval/type*') ? 'active' : '' }}">
                <span class="menu-bullet">
                    <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">Types</span>
            </a>
            <!--end:Menu link-->
        </div>
        <!--end:Menu item-->
        <!--begin:Menu item-->
        <div class="menu-item">
            <!--begin:Menu link-->
            <a href="{{ route('request.index') }}"
                class="menu-link {{ Request::is('approval/request*') ? 'active' : '' }}">
                <span class="menu-bullet">
                    <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">Requests</span>
            </a>
            <!--end:Menu link-->
        </div>
        <!--end:Menu item-->
        <!--begin:Menu item-->
        <div class="menu-item">
            <!--begin:Menu link-->
            <a href="{{ route('appraisal.index') }}"
                class="menu-link {{ Request::is('approval/appraisal*') ? 'active' : '' }}">
                <span class="menu-bullet">
                    <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">Appraisals</span>
            </a>
            <!--end:Menu link-->
        </div>
        <!--end:Menu item-->
    </div>
    <!--end:Menu sub-->

</div>
 --}}
