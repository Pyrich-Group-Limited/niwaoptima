
<li class="nav-item" id="myTaskLayouts">
    <a class="nav-link" href="#">
        <i class="fas  fa-square-poll-vertical menu-icon"></i>
        <span class="menu-title">Report</span>
        <i class="menu-arrow"></i>
    </a>
    <ul class="nav flex-column sub-menu">
        @can('read account statement')
            <li class="nav-item">
                <a class="nav-link" href="{{ route('report.account.statement') }}">Account Statement</a>
            </li>
        @endcan
        @can('read invoice summary')
            <li class="nav-item">
                <a class="nav-link" href="{{ route('report.invoice.summary') }}">Invoice Summary</a>
            </li>
        @endcan
        @can('read bill summary')
            <li class="nav-item">
                <a class="nav-link" href="{{ route('report.bill.summary') }}">Bill Summary</a>
            </li>
        @endcan
        @can('read product stock')
            <li class="nav-item">
                <a class="nav-link" href="{{ route('report.product.stock.report') }}">Product Stock</a>
            </li>
        @endcan
        @can('read cash flow')
            <li class="nav-item">
                <a class="nav-link" href="{{ route('report.monthly.cashflow') }}">Cash Flow</a>
            </li>
        @endcan
        @can('read income summary')
            <li class="nav-item">
                <a class="nav-link" href="{{ route('report.income.summary') }}">Income Summary</a>
            </li>
        @endcan
        @can('read expense summary')
            <li class="nav-item">
                <a class="nav-link" href="{{ route('report.expense.summary') }}">Expense Summary</a>
            </li>
        @endcan
        @can('approve or decline document niwaexpresspaymentmodule')
            <li class="nav-item">
                <a class="nav-link" href="{{ route('report.income.vs.expense.summary') }}">Income Vs Expense</a>
            </li>
        @endcan
        @can('read tax summary')
            <li class="nav-item">
                <a class="nav-link" href="{{ route('report.tax.summary') }}">Tax Summary</a>
            </li>
        @endcan

    </ul>
</li>
