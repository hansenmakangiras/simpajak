<ul class="navbar-item flex-row navbar-dropdown">
    <li class="nav-item dropdown apps-dropdown more-dropdown md-hidden">
        <div class="dropdown  custom-dropdown-icon">
            <a class="dropdown-toggle btn" href="#" role="button" id="appSection" data-toggle="dropdown" aria-haspopup="true"
               aria-expanded="false">{{ setAppDropdownText($page_name) }}
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                     stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down">
                    <polyline points="6 9 12 15 18 9"></polyline>
                </svg>
            </a>
            <div class="dropdown-menu dropdown-menu-right animated fadeInUp" aria-labelledby="appSection">
                <x-navbar-dropdown-btn />
            </div>
        </div>
    </li>
</ul>
