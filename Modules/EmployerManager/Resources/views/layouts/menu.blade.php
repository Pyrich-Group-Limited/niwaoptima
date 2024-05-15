<!--begin:Menu item-->
{{-- <div data-kt-menu-trigger="click" class="menu-item here menu-accordion"> --}}
    <!--begin:Menu link-->
   {{--  <span class="menu-link">
        <span class="menu-icon">
            <!--begin::Svg Icon | path: icons/duotune/files/fil025.svg-->
            <span class="svg-icon svg-icon-3">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path opacity="0.3"
                        d="M14 2H6C4.89543 2 4 2.89543 4 4V20C4 21.1046 4.89543 22 6 22H18C19.1046 22 20 21.1046 20 20V8L14 2Z"
                        fill="currentColor" />
                    <path d="M20 8L14 2V6C14 7.10457 14.8954 8 16 8H20Z" fill="currentColor" />
                    <path
                        d="M10.3629 14.0084L8.92108 12.6429C8.57518 12.3153 8.03352 12.3153 7.68761 12.6429C7.31405 12.9967 7.31405 13.5915 7.68761 13.9453L10.2254 16.3488C10.6111 16.714 11.215 16.714 11.6007 16.3488L16.3124 11.8865C16.6859 11.5327 16.6859 10.9379 16.3124 10.5841C15.9665 10.2565 15.4248 10.2565 15.0789 10.5841L11.4631 14.0084C11.1546 14.3006 10.6715 14.3006 10.3629 14.0084Z"
                        fill="currentColor" />
                </svg>
            </span>
            <!--end::Svg Icon-->
        </span>
        <span class="menu-title">Employer Management</span>
        <span class="menu-arrow"></span>
    </span> --}}
    <!--end:Menu link-->
    <!--begin:Menu sub-->
   {{--  <div class="menu-sub menu-sub-accordion"> --}}
        <!--begin:Menu item-->
        <div class="menu-item">
            @if (in_array(Auth()->user()->staff->department_id, $departmentData['departmentIdsToCheck']) || \Auth::id() == 1)
            <!--begin:Menu link-->
            <a href="{{ route('employers.index') }}" class="menu-link {{ Request::is('employers*') ? 'active' : '' }}">
                <span class="menu-bullet">
                    <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">Employers</span>
            </a>
            <a href="{{ route('bulk.employer.upload') }}" class="menu-link {{ Request::is('employers*') ? 'active' : '' }}">
                <span class="menu-bullet">
                    <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">Bulk Employers Upload</span>
            </a>
            <a href="{{ route('employees.index') }}" class="menu-link {{ Request::is('employees*') ? 'active' : '' }}">
                <span class="menu-bullet">
                    <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">Employees</span>
            </a>
            <a href="{{ route('essp.payments') }}" class="menu-link {{ Request::is('essp.payments*') ? 'active' : '' }}">
                <span class="menu-bullet">
                    <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">Payments</span>
            </a>
            @endif
            @if (in_array(Auth()->user()->staff->department_id, $departmentData['departmentIdsToCheck']))
            <a href="{{ route('certificates') }}" class="menu-link {{ Request::is('employers*') ? 'active' : '' }}">
                <span class="menu-bullet">
                    <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">Certificates</span>
            </a>
            <a href="{{ route('change.signature') }}" class="menu-link {{ Request::is('employers*') ? 'active' : '' }}">
                <span class="menu-bullet">
                    <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">Change Signature</span>
            </a>
            @endif
            
            <!--end:Menu link-->
        </div>
        @include('claimscompensation::layouts.menu')
        <!--end:Menu item-->
    {{-- </div> --}}
    <!--end:Menu sub-->
{{-- </div> --}}
<!--end:Menu item-->
