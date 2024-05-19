<li class="nav-item" id="myTask">
    <a class="nav-link" href="#">
        <i class="fas fa-check menu-icon"></i>
        <span class="menu-title">DTA Requests</span>
        <i class="menu-arrow"></i>
    </a>
    <ul class="nav flex-column sub-menu">
       <li class="nav-item">
            <a class="nav-link" href="{{ route('dtarequests.create') }}">New DTA Requests</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('dtarequests.index') }}">My DTA Applications</a>
        </li>
    </ul>
</li>