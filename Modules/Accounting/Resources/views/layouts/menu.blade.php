<li class="nav-item" id="myTaskLayouts">
    <a class="nav-link" href="#">
        <i class="fas fa-wallet menu-icon"></i>
        <span class="menu-title">Accounting System</span>
        <i class="menu-arrow"></i>
    </a>
    <ul class="nav flex-column sub-sub-menu">
        <li class="nav-item" id="myTaskLayouts">
            <a class="nav-link" href="#">
                <i class="fas fa-wallet menu-icon"></i>
                <span class="menu-title">Banking</span>
                <i class="menu-arrow"></i>
            </a>
            <ul class="nav flex-column sub-sub-menu">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('bank-account.index') }}">Account</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('bank-transfer.index') }}">Transfer</a>
                </li>
                
            </ul>
        </li>
        <li class="nav-item" id="myTaskLayouts">
            <a class="nav-link" href="#">
                <i class="fas fa-wallet menu-icon"></i>
                <span class="menu-title">Income</span>
                <i class="menu-arrow"></i>
            </a>
            <ul class="nav flex-column sub-sub-menu">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('revenue.index') }}">Revenue</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('credit.note') }}">Credit Note</a>
                </li>
                
            </ul>
        </li>
        <li class="nav-item" id="myTaskLayouts">
            <a class="nav-link" href="#">
                <i class="fas fa-wallet menu-icon"></i>
                <span class="menu-title">Purchases</span>
                <i class="menu-arrow"></i>
            </a>
            <ul class="nav flex-column sub-sub-menu">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('bill.index') }}">Bill</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('expense.index') }}">Expense</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('payments.index') }}">Payment</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('debit.note') }}">Debit Note</a>
                </li>
            </ul>
        </li>
        <li class="nav-item" id="myTaskLayouts">
            <a class="nav-link" href="#">
                <i class="fas fa-wallet menu-icon"></i>
                <span class="menu-title">Double Entry</span>
                <i class="menu-arrow"></i>
            </a>
            <ul class="nav flex-column sub-sub-menu">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('chart-of-account.index') }}">Chart Of Accounts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('journal-entry.index') }}">Journal Account</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('report.ledger') }}">Ledger Summary</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('report.balance.sheet') }}">Balance Sheet</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('report.profit.loss') }}">Profit & Loss</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('trial.balance') }}">Trial Balance</a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('budget.index') }}">
                <i class="fas fa-file menu-icon"></i>
                <span>Budget Planner</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('goal.index') }}">
                <i class="fas fa-file menu-icon"></i>
                <span>Financial Goal</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('productservice.index') }}">
                <i class="fas fa-file menu-icon"></i>
                <span>Product & Services</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('taxes.index') }}">
                <i class="fas fa-file menu-icon"></i>
                <span>Accounting Setup</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('report.monthly.cashflow') }}">
                <i class="fas fa-file menu-icon"></i>
                <span>Cash Flow</span>
            </a>
        </li>
        
    </ul>
</li>