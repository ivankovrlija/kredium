<div class="sidebar-wrapper">
    <ul>
        <li class="{{ (request()->is('dashboard*')) ? 'active' : '' }}"><a href="/dashboard">Dashboard</a></li>
        <li class="{{ (request()->is('clients*')) ? 'active' : '' }}"><a href="/clients">Clients</a></li>
        <li class="{{ (request()->is('report*')) ? 'active' : '' }}"><a href="/reports">Report</a></li>
    </ul>
</div>