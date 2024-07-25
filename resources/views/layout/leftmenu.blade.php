<div class="left-sidebar-pro">
    <nav id="sidebar" class="">
        <div class="sidebar-header">
            <a href="index.html"><img class="main-logo" src="{{ asset('public/')}}/assets/img/logo/logo.png"
                    alt="" /></a>
            <strong><a href="index.html"><img src="{{ asset('public/')}}/assets/img/logo/logosn.png"
                        alt="" /></a></strong>
        </div>
        <div class="left-custom-menu-adp-wrap comment-scrollbar">
            <nav class="sidebar-nav left-sidebar-menu-pro">
                <ul class="metismenu" id="menu1">
                    <li>
                        <a title="Landing Page" href="events.html" aria-expanded="false"><span><i
                                    class="fa-solid fa-grip"></i></span> <span
                                class="mini-click-non">Dashboard</span></a>
                    </li>
                    <li>
                        <a class="has-arrow" href="all-professors.html" aria-expanded="false"><span><i
                                    class="fa-solid fa-suitcase"></i></span> <span
                                class="mini-click-non">client</span></a>
                        <ul class="submenu-angle" aria-expanded="false">
                        </ul>
                    </li>
                    <li>
                        <a class="has-arrow" href="" aria-expanded="false"><i class="fa-solid fa-layer-group"></i> <span
                                class="mini-click-non">Leads</span></a>
                        <ul class="submenu-angle" aria-expanded="false">
                            <li><a href="{{ route('statusshow')}}"><i class="fa-solid fa-tachometer-alt"></i> Lead
                                    Status</a></li>
                            <li><a href=""><i class="fa-brands fa-sourcetree"></i> Lead Source</a></li>
                            <li><a href="{{route('Lead')}}"><i class="fa-solid fa-layer-group"></i> Lead details</a>
                            </li>

                        </ul>

                    </li>
                    <li>
                        <a class="has-arrow" href="{{route('showall')}}" aria-expanded="false"><i
                                class="fa-solid fa-user-plus"></i><span class="mini-click-non">Team</span></a>
                    </li>
                    <li>
                        <a class="has-arrow" href="{{route('showrole')}}" aria-expanded="false"><i
                                class="fa-solid fa-user-plus"></i><span class="mini-click-non">Roles and permission</span></a>
                    </li>
                   
                    <li>
                        <a class="has-arrow" href="{{route('showtask')}}" aria-expanded="false"><i
                                class="fa-solid fa-check"></i><span class="mini-click-non">Task</span></a>
                    </li>

                    <li>
                        <a class="has-arrow" href="{{route('showallticket')}}" aria-expanded="false"><i
                                class="fa-solid fa-ticket"></i><span class="mini-click-non">Ticket</span></a>
                    </li>

                    <li>
                        <a class="has-arrow" href="mailbox.html" aria-expanded="false"><i
                                class="fa-solid fa-gear"></i><span class="mini-click-non">Settings</span></a>
                        <ul class="submenu-angle form-mini-nb-dp" aria-expanded="false">
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </nav>
</div>