
<!--begin:Menu sub-->
<!--begin:Menu item-->
<div data-kt-menu-trigger="click" class="menu-item menu-accordion mb-1">
    <!--begin:Menu link-->
    <span class="menu-item">
        <a class="menu-link {{ Request::is('zoom-meeting*') ? 'active' : '' }}" href="{{ route('chats') }}">
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
            <span class="menu-title">Messenger</span>
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
        <a class="menu-link {{ Request::is('zoom-meeting*') ? 'active' : '' }}" href="{{ route('zoom-meeting.index') }}">
            <span class="menu-icon">
                <!--begin::Svg Icon | path: icons/duotune/communication/com012.svg-->
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-video3" viewBox="0 0 16 16">
                    <path d="M14 9.5a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm-6 5.7c0 .8.8.8.8.8h6.4s.8 0 .8-.8-.8-3.2-4-3.2-4 2.4-4 3.2Z"/>
                    <path d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h5.243c.122-.326.295-.668.526-1H2a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v7.81c.353.23.656.496.91.783.059-.187.09-.386.09-.593V4a2 2 0 0 0-2-2H2Z"/>
                  </svg>
                <!--end::Svg Icon-->
            </span>
            <span class="menu-title">ZOOM Meeting</span>
            <!-- <span class="menu-arrow"></span> -->
        </a>
    </span>
    <!--end:Menu link-->
</div>
<!--end:Menu item-->





