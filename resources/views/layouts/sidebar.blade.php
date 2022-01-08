<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Navigation</div>
                <a class="nav-link" href="/">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                @if(auth()->user()->role == 1)
                <a class="nav-link" href="/client">
                    <div class="sb-nav-link-icon"><i class="fas fa-user-alt"></i></div>
                    Client
                </a>
                <a class="nav-link" href="/payment">
                    <div class="sb-nav-link-icon"><i class="fas fa-comment-dollar"></i></div>
                    Payment
                </a>
                <a class="nav-link" href="/form">
                    <div class="sb-nav-link-icon"><i class="fas fa-align-left"></i></div>
                    Form
                </a>
                <a class="nav-link" href="/notice">
                    <div class="sb-nav-link-icon"><i class="far fa-bell"></i></div>
                    Notice
                </a>
                
                <a class="nav-link" href="/admin">
                    <div class="sb-nav-link-icon"><i class="fas fa-user-alt"></i></div>
                    Admin
                </a>

                <a class="nav-link" href="#">
                    <div class="sb-nav-link-icon"><i class="fas fa-user-alt"></i></div>
                    Report
                </a>
                @else
                <a class="nav-link" href="/application">
                    <div class="sb-nav-link-icon"><i class="fas fa-align-left"></i></div>
                    Application
                </a>
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-comment-dollar"></i></div>
                    Payment
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="/client_payment_report">Payment</a>
                        <a class="nav-link" href="/pay_info">Payment Gateway</a>
                    </nav>
                </div>
                @endif
                {{-- <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Drop
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="layout-static.html">Static Navigation</a>
                        <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>
                    </nav>
                </div> --}}
                <div class="text-right d-none d-md-inline" style="margin-right: -15px;">
                    <button style="border: 1px solid #000 !important; padding: 7px 10px 7px 10px;" class="rounded-circle border-0" id="sidebarToggle"><i class="fas fa-angle-left"></i></button>
                </div>
            </div>
        </div>
        <div class="sb-sidenav-footer" style = "color: #fff;">
            <div class="small">Logged in as : {{ auth()->user()->name }}</div>
            
            <br>
            @if( auth()->user()->role == 2 )
                <h4>Reg No : <b>{{ auth()->user()->reg_no }}</b></h4>
            @endif
        </div>
    </nav>
</div>