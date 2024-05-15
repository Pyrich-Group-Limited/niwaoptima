<li class="nav-item" id="myTaskLayouts">
    {{-- <a class="nav-link" href="#">
        <i class="fas fa-users menu-icon"></i>
        <span class="menu-title">HRM System</span>
        <i class="menu-arrow"></i>
    </a> --}}

    {{-- <ul class="nav flex-column sub-sub-menu"> --}}
    @if (auth()->check() && (in_array(auth()->user()->staff->department_id, [2]) || auth()->user()->hasRole('super-admin')))
<li class="nav-item" id="myTaskLayouts">
    <a class="nav-link" href="#">
        <i class="fas fa-wallet menu-icon"></i>
        <span class="menu-title">Payroll Setup</span>
        <i class="menu-arrow"></i>
    </a>
    <ul class="nav flex-column sub-sub-menu">

        <li class="nav-item">
            <a class="nav-link" href="{{ route('setsalary.index') }}">Set Salary</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('payslip.index') }}">Payslip</a>
        </li>

    </ul>
</li>
@endif

<li class="nav-item" id="myTaskLayouts">
    <a class="nav-link" href="#">
        <i class="fas fa-wallet menu-icon"></i>
        <span class="menu-title">Leave Management</span>
        <i class="menu-arrow"></i>
    </a>
    <ul class="nav flex-column sub-sub-menu">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('leave_request.create') }}">Apply for Leave</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('leave_request.index') }}">Leave Status</a>
        </li>

        {{-- <li class="nav-item">
                    <a class="nav-link" href="{{ route('leave.index') }}">Manage Leave</a>
                </li> --}}
        <li class="nav-item" id="myTaskLayouts">
            <a class="nav-link" href="#">
                <i class="fas fa-wallet menu-icon"></i>
                <span class="menu-title">Attendance</span>
                <i class="menu-arrow"></i>
            </a>
            <ul class="nav flex-column sub-sub-menu">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('attendanceemployee.index') }}">Mark Attendance</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('attendanceemployee.bulkattendance') }}">Bulk Attendance</a>
                </li>

            </ul>
        </li>

    </ul>
</li>

@if (auth()->check() && (in_array(auth()->user()->staff->department_id, [1]) || auth()->user()->hasRole('super-admin')))
    <li class="nav-item" id="myTaskLayouts">
        <a class="nav-link" href="#">
            <i class="fas fa-wallet menu-icon"></i>
            <span class="menu-title">Performance Setup</span>
            <i class="menu-arrow"></i>
        </a>
        <ul class="nav flex-column sub-sub-menu">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('indicator.index') }}">Indicator</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('appraisal_index.index') }}">Appraisal</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('goaltracking.index') }}">Goal Tracking</a>
            </li>

        </ul>
    </li>
@endif
@if (auth()->check() && (in_array(auth()->user()->staff->department_id, [1]) || auth()->user()->hasRole('super-admin')))
    <li class="nav-item" id="myTaskLayouts">
        <a class="nav-link" href="#">
            <i class="fas fa-wallet menu-icon"></i>
            <span class="menu-title">Training Setup</span>
            <i class="menu-arrow"></i>
        </a>
        <ul class="nav flex-column sub-sub-menu">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('training.index') }}">Training List</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('trainer.index') }}">Trainer</a>
            </li>
        </ul>
    </li>
@endif
@if (auth()->check() && (in_array(auth()->user()->staff->department_id, [1]) || auth()->user()->hasRole('super-admin')))
    <li class="nav-item" id="myTaskLayouts">
        <a class="nav-link" href="#">
            <i class="fas fa-wallet menu-icon"></i>
            <span class="menu-title">Recruitment Setup</span>
            <i class="menu-arrow"></i>
        </a>
        <ul class="nav flex-column sub-sub-menu">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('job.index') }}">Jobs</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('job.create') }}">Job Create</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('job-application.index') }}">Job Application</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('job.application.candidate') }}">Job Candidate</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('job.on.board') }}">Job On-boarding</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('custom-question.index') }}">Custom Question</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('interview-schedule.index') }}">Interview Schedule</a>
            </li>
            {{-- <li class="nav-item">
                    <a class="nav-link" href="{{ url('career/2/en') }}">Career</a>
                </li> --}}
        </ul>
    </li>
@endif

{{-- </ul> --}}
</li>
