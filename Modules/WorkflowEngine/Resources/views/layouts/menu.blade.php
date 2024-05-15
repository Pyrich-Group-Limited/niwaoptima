<!--begin:Menu sub-->
<div class="menu-sub menu-sub-accordion">
    <!--begin:Menu item-->
    <div class="menu-item">
        <!--begin:Menu link-->
        <a href="{{ route('workflows.index') }}" class="menu-link {{ Request::is('workflows*') ? 'active' : '' }}">
            <span class="menu-bullet">
                <span class="bullet bullet-dot"></span>
            </span>
            <span class="menu-title">Workflows</span>
        </a>
        <!--end:Menu link-->
    </div>
    <!--end:Menu item-->
    <!--begin:Menu item-->
    <div class="menu-item">
        <!--begin:Menu link-->
        <a href="{{ route('workflowTypes.index') }}" class="menu-link {{ Request::is('workflowTypes*') ? 'active' : '' }}">
            <span class="menu-bullet">
                <span class="bullet bullet-dot"></span>
            </span>
            <span class="menu-title">Workflow Types</span>
        </a>
        <!--end:Menu link-->
    </div>
    <!--end:Menu item-->
    <!--begin:Menu item-->
    <div class="menu-item">
        <!--begin:Menu link-->
        <a href="{{ route('workflowInstances.index') }}" class="menu-link {{ Request::is('workflowInstances*') ? 'active' : '' }}">
            <span class="menu-bullet">
                <span class="bullet bullet-dot"></span>
            </span>
            <span class="menu-title">Workflow Instances</span>
        </a>
        <!--end:Menu link-->
    </div>
    <!--end:Menu item-->
    <!--begin:Menu item-->
    <div class="menu-item">
        <!--begin:Menu link-->
        <a href="{{ route('workflowSteps.index') }}" class="menu-link {{ Request::is('workflowSteps*') ? 'active' : '' }}">
            <span class="menu-bullet">
                <span class="bullet bullet-dot"></span>
            </span>
            <span class="menu-title">Workflow Steps</span>
        </a>
        <!--end:Menu link-->
    </div>
    <!--end:Menu item-->
    <!--begin:Menu item-->
    <div class="menu-inner flex-column collapse" id="kt_app_sidebar_menu_dashboards_collapse">
        <div class="menu-item">
            <!--begin:Menu link-->
            <a href="{{ route('workflowActivities.index') }}" class="menu-link {{ Request::is('workflowActivities*') ? 'active' : '' }}">
                <span class="menu-bullet">
                    <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">Workflow Activities</span>
            </a>
            <!--end:Menu link-->
        </div>
        <!--begin:Menu item-->
        <div class="menu-item">
            <!--begin:Menu link-->
            <a href="{{ route('fieldTypes.index') }}" class="menu-link {{ Request::is('fieldTypes*') ? 'active' : '' }}">
                <span class="menu-bullet">
                    <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">Field Types</span>
            </a>
            <!--end:Menu link-->
        </div>
        <!--end:Menu item-->
        <!--begin:Menu item-->
        <div class="menu-item">
            <!--begin:Menu link-->
            <a href="{{ route('forms.index') }}" class="menu-link {{ Request::is('forms*') ? 'active' : '' }}">
                <span class="menu-bullet">
                    <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">Forms</span>
            </a>
            <!--end:Menu link-->
        </div>
        <!--end:Menu item-->
        <!--begin:Menu item-->
        <div class="menu-item">
            <!--begin:Menu link-->
            <a href="{{ route('formFields.index') }}" class="menu-link {{ Request::is('formFields*') ? 'active' : '' }}">
                <span class="menu-bullet">
                    <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">Form Fields</span>
            </a>
            <!--end:Menu link-->
        </div>
        <!--end:Menu item-->
        <!--begin:Menu item-->
        <div class="menu-item">
            <!--begin:Menu link-->
            <a href="{{ route('actorTypes.index') }}" class="menu-link {{ Request::is('actorTypes*') ? 'active' : '' }}">
                <span class="menu-bullet">
                    <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">Actor Types</span>
            </a>
            <!--end:Menu link-->
        </div>
        <!--end:Menu item-->
        <!--begin:Menu item-->
        <div class="menu-item">
            <!--begin:Menu link-->
            <a href="{{ route('stepActivities.index') }}" class="menu-link {{ Request::is('stepActivities*') ? 'active' : '' }}">
                <span class="menu-bullet">
                    <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">Step Activities</span>
            </a>
            <!--end:Menu link-->
        </div>
        <!--end:Menu item-->
        <!--begin:Menu item-->
        <div class="menu-item">
            <!--begin:Menu link-->
            <a href="{{ route('stepTypes.index') }}" class="menu-link {{ Request::is('stepTypes*') ? 'active' : '' }}">
                <span class="menu-bullet">
                    <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">Step Types</span>
            </a>
            <!--end:Menu link-->
        </div>
        <!--end:Menu item-->
        <!--begin:Menu item-->
        <div class="menu-item">
            <!--begin:Menu link-->
            <a href="{{ route('actorRoles.index') }}" class="menu-link {{ Request::is('actorRoles*') ? 'active' : '' }}">
                <span class="menu-bullet">
                    <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">Actor Roles</span>
            </a>
            <!--end:Menu link-->
        </div>
        <!--end:Menu item-->
    </div>
    <!--end:Menu item-->

    <div class="menu-item">
        <div class="menu-content">
            <a class="btn btn-flex btn-color-primary d-flex flex-stack fs-base p-0 ms-2 mb-2 toggle collapsible collapsed" data-bs-toggle="collapse" href="#kt_app_sidebar_menu_dashboards_collapse" data-kt-toggle-text="Show Less">
                <span data-kt-toggle-text-target="true">Show All</span>
                <!--begin::Svg Icon | path: icons/duotune/general/gen036.svg-->
                <span class="svg-icon toggle-on svg-icon-2 me-0">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="currentColor" />
                        <rect x="6.0104" y="10.9247" width="12" height="2" rx="1" fill="currentColor" />
                    </svg>
                </span>
                <!--end::Svg Icon-->
                <!--begin::Svg Icon | path: icons/duotune/general/gen035.svg-->
                <span class="svg-icon toggle-off svg-icon-2 me-0">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="currentColor" />
                        <rect x="10.8891" y="17.8033" width="12" height="2" rx="1" transform="rotate(-90 10.8891 17.8033)" fill="currentColor" />
                        <rect x="6.01041" y="10.9247" width="12" height="2" rx="1" fill="currentColor" />
                    </svg>
                </span>
                <!--end::Svg Icon-->
            </a>
        </div>
    </div>
</div>
<!--end:Menu sub-->