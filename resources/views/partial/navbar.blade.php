<nav class="pcoded-navbar">
    <div class="pcoded-inner-navbar main-menu">
        <div class="pcoded-navigatio-lavel">Navigation</div>
        <ul class="pcoded-item pcoded-left-item">
            <li class="pcoded-hasmenu  {{ (request()->is('admin/index*')) || (request()->is('admin/'))  ? 'active pcoded-trigger' : '' }}  ">
                <a href="javascript:void(0)" >
                    <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                    <span class="pcoded-mtext">Dashboard</span>
                </a>
                <ul class="pcoded-submenu">
                    <li class="active">
                        <a href="{{route('admin.index_route')}}">
                            <span class="pcoded-mtext">Dashboard</span>
                        </a>
                    </li>

                </ul>
            </li>

        </ul>
        <ul class="pcoded-item pcoded-left-item">

            <li class="pcoded-hasmenu  {{ (request()->is('admin/customer'))||(request()->is('admin/customer.show'))   || (request()->is('admin/ActiveCustomer')) ||(request()->is('admin/DisActiveCustomer')) ||(request()->is('admin/customer_archive'))? 'active pcoded-trigger' : '' }} ">
                <a href="javascript:void(0) "  >
                    <span class="pcoded-micon"><i class="feather icon-users"></i></span>
                    <span class="pcoded-mtext">Users </span>
                </a>
                <ul class="pcoded-submenu  active ">
                    <li class="{{ (request()->is('admin/customer')) ? 'active' : '' }}">
                        <a href="{{route('customer.index')}}" >
                            <span class="pcoded-mtext">All Customers </span>
                        </a>
                    </li>
                    <li class="{{ (request()->is('admin/ActiveCustomer')) ? 'active' : '' }}">
                        <a href="{{route('customer.active')}}">
                            <span class="pcoded-mtext">Active</span>
                        </a>
                    </li>
                    <li class="{{ (request()->is('admin/DisActiveCustomer')) ? 'active' : '' }}">
                        <a href="{{route('customer.disactive')}}">
                            <span class="pcoded-mtext">Dis Active</span>
                        </a>
                    </li>
                    <li class="{{ (request()->is('admin/customer_archive')) ? 'active' : '' }}">
                        <a href="{{route('customer_archive.index')}}">
                            <span class="pcoded-mtext">Archives</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="pcoded-hasmenu  {{ (request()->is('admin/park')) || (request()->is('admin/ActivePark')) || (request()->is('admin/DisActivePark')) ? 'active pcoded-trigger' : '' }}">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="feather icon-server"></i></span>
                    <span class="pcoded-mtext">Parks </span>
                </a>
                <ul class="pcoded-submenu">
                    <li class="{{ (request()->is('admin/park')) ? 'active' : '' }} ">
                        <a href="{{route('park.index')}}">
                            <span class="pcoded-mtext">All</span>
                        </a>
                    </li>

                    <li class="{{ (request()->is('admin/ActivePark')) ? 'active' : '' }} ">
                        <a href="{{route('park.active')}}">
                            <span class="pcoded-mtext">Active</span>
                        </a>
                    </li>
                    <li class="{{ (request()->is('admin/DisActivePark')) ? 'active' : '' }} ">
                        <a href="{{route('park.disactive')}}">
                            <span class="pcoded-mtext">Dis Active</span>
                        </a>
                    </li>

                </ul>
            </li>
            </li>
            <li class="pcoded-hasmenu {{ (request()->is('admin/interval')) || (request()->is('admin/ActiveInterval')) || (request()->is('admin/DisActiveInterval'))  ? 'active pcoded-trigger' : '' }}">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="feather icon-watch"></i></span>
                    <span class="pcoded-mtext"> Intervals  </span>
                </a>
                <ul class="pcoded-submenu">
                    <li class="{{ (request()->is('admin/interval')) ? 'active' : '' }} ">
                        <a href="{{route('interval.index')}}">
                            <span class="pcoded-mtext">Intervals</span>
                        </a>
                    </li>
                    <li class=" {{ (request()->is('admin/ActiveInterval')) ? 'active' : '' }}">
                        <a href="{{route('interval.active')}}">
                            <span class="pcoded-mtext">Active Intervals</span>
                        </a>
                    </li>
                    <li class=" {{ (request()->is('admin/DisActiveInterval')) ? 'active' : '' }}">
                        <a href="{{route('interval.disactive')}}">
                            <span class="pcoded-mtext">DisActive Intervals</span>
                        </a>
                    </li>

                </ul>
            </li>
            <li class="pcoded-hasmenu {{ (request()->is('admin/reservation')) || (request()->is('admin/reservation_archive')) ||(request()->is('admin/FinishReservation')) ||(request()->is('admin/CancelReservation')) || (request()->is('admin/BusyReservation')) ? 'active pcoded-trigger' : '' }}">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="feather icon-clipboard"></i></span>
                    <span class="pcoded-mtext">Reservations </span>
                </a>
                <ul class="pcoded-submenu">
                    <li class="{{ (request()->is('admin/reservation')) ? 'active' : '' }} ">
                        <a href="{{route('reservation.index')}}">
                            <span class="pcoded-mtext">Reservations</span>
                        </a>
                    </li>

                    <li class=" {{ (request()->is('admin/BusyReservation')) ? 'active' : '' }}">
                        <a href="{{route('reservation.busy')}}">
                            <span class="pcoded-mtext">Busy</span>
                        </a>
                    </li>
                    <li class=" {{ (request()->is('admin/FinishReservation')) ? 'active' : '' }}">
                        <a href="{{route('reservation.finish')}}">
                            <span class="pcoded-mtext">Finished</span>
                        </a>
                    </li>
                    <li class="{{ (request()->is('admin/CancelReservation')) ? 'active' : '' }}">
                        <a href="{{route('reservation.cancel')}}">
                            <span class="pcoded-mtext">Cancel</span>
                        </a>
                    </li>
                    <li class=" {{ (request()->is('admin/reservation_archive')) ? 'active' : '' }}">
                        <a href="{{route('reservation_archive.index')}}">
                            <span class="pcoded-mtext">Archives</span>
                        </a>
                    </li>
                </ul>
            </li>

{{--            <li class="pcoded-hasmenu ">--}}
{{--                <a href="javascript:void(0)">--}}
{{--                    <span class="pcoded-micon"><i class="feather icon-shopping-cart"></i></span>--}}
{{--                    <span class="pcoded-mtext">E-Commerce</span>--}}
{{--                    <span class="pcoded-badge label label-danger">NEW</span>--}}
{{--                </a>--}}
{{--                <ul class="pcoded-submenu">--}}
{{--                    <li class="">--}}
{{--                        <a href="default/product.html">--}}
{{--                            <span class="pcoded-mtext">Product</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="">--}}
{{--                        <a href="default/product-list.html">--}}
{{--                            <span class="pcoded-mtext">Product List</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="">--}}
{{--                        <a href="default/product-edit.html">--}}
{{--                            <span class="pcoded-mtext">Product Edit</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="">--}}
{{--                        <a href="default/product-detail.html">--}}
{{--                            <span class="pcoded-mtext">Product Detail</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="">--}}
{{--                        <a href="default/product-cart.html">--}}
{{--                            <span class="pcoded-mtext">Product Card</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="">--}}
{{--                        <a href="default/product-payment.html">--}}
{{--                            <span class="pcoded-mtext">Credit Card Form</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </li>--}}
{{--            <li class="pcoded-hasmenu ">--}}
{{--                <a href="javascript:void(0)">--}}
{{--                    <span class="pcoded-micon"><i class="feather icon-mail"></i></span>--}}
{{--                    <span class="pcoded-mtext">Email</span>--}}
{{--                </a>--}}
{{--                <ul class="pcoded-submenu">--}}
{{--                    <li class="">--}}
{{--                        <a href="default/email-compose.html">--}}
{{--                            <span class="pcoded-mtext">Compose Email</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="">--}}
{{--                        <a href="default/email-inbox.html">--}}
{{--                            <span class="pcoded-mtext">Inbox</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="">--}}
{{--                        <a href="default/email-read.html">--}}
{{--                            <span class="pcoded-mtext">Read Mail</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="pcoded-hasmenu ">--}}
{{--                        <a href="javascript:void(0)">--}}
{{--                            <span class="pcoded-mtext">Email Template</span>--}}
{{--                        </a>--}}
{{--                        <ul class="pcoded-submenu">--}}
{{--                            <li class="">--}}
{{--                                <a href="files/extra-pages/email-templates/email-welcome.html">--}}
{{--                                    <span class="pcoded-mtext">Welcome Email</span>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li class="">--}}
{{--                                <a href="files/extra-pages/email-templates/email-password.html">--}}
{{--                                    <span class="pcoded-mtext">Reset Password</span>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li class="">--}}
{{--                                <a href="files/extra-pages/email-templates/email-newsletter.html">--}}
{{--                                    <span class="pcoded-mtext">Newsletter Email</span>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li class="">--}}
{{--                                <a href="files/extra-pages/email-templates/email-launch.html">--}}
{{--                                    <span class="pcoded-mtext">App Launch</span>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li class="">--}}
{{--                                <a href="files/extra-pages/email-templates/email-activation.html">--}}
{{--                                    <span class="pcoded-mtext">Activation Code</span>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </li>--}}
        </ul>
{{--        <div class="pcoded-navigatio-lavel">UI Element</div>--}}
{{--        <ul class="pcoded-item pcoded-left-item">--}}
{{--            <li class="pcoded-hasmenu">--}}
{{--                <a href="javascript:void(0)">--}}
{{--                    <span class="pcoded-micon"><i class="feather icon-box"></i></span>--}}
{{--                    <span class="pcoded-mtext">Basic Components</span>--}}
{{--                </a>--}}
{{--                <ul class="pcoded-submenu">--}}
{{--                    <li class=" ">--}}
{{--                        <a href="default/alert.html">--}}
{{--                            <span class="pcoded-mtext">Alert</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class=" ">--}}
{{--                        <a href="default/breadcrumb.html">--}}
{{--                            <span class="pcoded-mtext">Breadcrumbs</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class=" ">--}}
{{--                        <a href="default/button.html">--}}
{{--                            <span class="pcoded-mtext">Button</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class=" ">--}}
{{--                        <a href="default/box-shadow.html">--}}
{{--                            <span class="pcoded-mtext">Box-Shadow</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class=" ">--}}
{{--                        <a href="default/accordion.html">--}}
{{--                            <span class="pcoded-mtext">Accordion</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class=" ">--}}
{{--                        <a href="default/generic-class.html">--}}
{{--                            <span class="pcoded-mtext">Generic Class</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class=" ">--}}
{{--                        <a href="default/tabs.html">--}}
{{--                            <span class="pcoded-mtext">Tabs</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class=" ">--}}
{{--                        <a href="default/color.html">--}}
{{--                            <span class="pcoded-mtext">Color</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class=" ">--}}
{{--                        <a href="default/label-badge.html">--}}
{{--                            <span class="pcoded-mtext">Label Badge</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class=" ">--}}
{{--                        <a href="default/progress-bar.html">--}}
{{--                            <span class="pcoded-mtext">Progress Bar</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class=" ">--}}
{{--                        <a href="default/preloader.html">--}}
{{--                            <span class="pcoded-mtext">Pre-Loader</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class=" ">--}}
{{--                        <a href="default/list.html">--}}
{{--                            <span class="pcoded-mtext">List</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class=" ">--}}
{{--                        <a href="default/tooltip.html">--}}
{{--                            <span class="pcoded-mtext">Tooltip And Popover</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class=" ">--}}
{{--                        <a href="default/typography.html">--}}
{{--                            <span class="pcoded-mtext">Typography</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class=" ">--}}
{{--                        <a href="default/other.html">--}}
{{--                            <span class="pcoded-mtext">Other</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </li>--}}
{{--            <li class="pcoded-hasmenu">--}}
{{--                <a href="javascript:void(0)">--}}
{{--                    <span class="pcoded-micon"><i class="feather icon-gitlab"></i></span>--}}
{{--                    <span class="pcoded-mtext">Advance Components</span>--}}
{{--                </a>--}}
{{--                <ul class="pcoded-submenu">--}}
{{--                    <li class=" ">--}}
{{--                        <a href="default/draggable.html">--}}
{{--                            <span class="pcoded-mtext">Draggable</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class=" ">--}}
{{--                        <a href="default/bs-grid.html">--}}
{{--                            <span class="pcoded-mtext">Grid Stack</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class=" ">--}}
{{--                        <a href="default/light-box.html">--}}
{{--                            <span class="pcoded-mtext">Light Box</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class=" ">--}}
{{--                        <a href="default/modal.html">--}}
{{--                            <span class="pcoded-mtext">Modal</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class=" ">--}}
{{--                        <a href="default/notification.html">--}}
{{--                            <span class="pcoded-mtext">Notifications</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class=" ">--}}
{{--                        <a href="default/notify.html">--}}
{{--                            <span class="pcoded-mtext">PNOTIFY</span>--}}
{{--                            <span class="pcoded-badge label label-info">NEW</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class=" ">--}}
{{--                        <a href="default/rating.html">--}}
{{--                            <span class="pcoded-mtext">Rating</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class=" ">--}}
{{--                        <a href="default/range-slider.html">--}}
{{--                            <span class="pcoded-mtext">Range Slider</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class=" ">--}}
{{--                        <a href="default/slider.html">--}}
{{--                            <span class="pcoded-mtext">Slider</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class=" ">--}}
{{--                        <a href="default/syntax-highlighter.html">--}}
{{--                            <span class="pcoded-mtext">Syntax Highlighter</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class=" ">--}}
{{--                        <a href="default/tour.html">--}}
{{--                            <span class="pcoded-mtext">Tour</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class=" ">--}}
{{--                        <a href="treeview.html">--}}
{{--                            <span class="pcoded-mtext">Tree View</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class=" ">--}}
{{--                        <a href="default/nestable.html">--}}
{{--                            <span class="pcoded-mtext">Nestable</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class=" ">--}}
{{--                        <a href="default/toolbar.html">--}}
{{--                            <span class="pcoded-mtext">Toolbar</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class=" ">--}}
{{--                        <a href="default/x-editable.html">--}}
{{--                            <span class="pcoded-mtext">X-Editable</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </li>--}}
{{--            <li class="pcoded-hasmenu">--}}
{{--                <a href="javascript:void(0)">--}}
{{--                    <span class="pcoded-micon"><i class="feather icon-package"></i></span>--}}
{{--                    <span class="pcoded-mtext">Extra Components</span>--}}
{{--                </a>--}}
{{--                <ul class="pcoded-submenu">--}}
{{--                    <li class=" ">--}}
{{--                        <a href="default/session-timeout.html">--}}
{{--                            <span class="pcoded-mtext">Session Timeout</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class=" ">--}}
{{--                        <a href="default/session-idle-timeout.html">--}}
{{--                            <span class="pcoded-mtext">Session Idle Timeout</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class=" ">--}}
{{--                        <a href="default/offline.html">--}}
{{--                            <span class="pcoded-mtext">Offline</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </li>--}}
{{--            <li class=" ">--}}
{{--                <a href="default/animation.html">--}}
{{--                                    <span class="pcoded-micon"><i--}}
{{--                                            class="feather icon-aperture rotate-refresh"></i><b>A</b></span>--}}
{{--                    <span class="pcoded-mtext">Animations</span>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--            <li class=" ">--}}
{{--                <a href="default/sticky.html">--}}
{{--                    <span class="pcoded-micon"><i class="feather icon-cpu"></i></span>--}}
{{--                    <span class="pcoded-mtext">Sticky Notes</span>--}}
{{--                    <span class="pcoded-badge label label-danger">HOT</span>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--            <li class="pcoded-hasmenu">--}}
{{--                <a href="javascript:void(0)">--}}
{{--                    <span class="pcoded-micon"><i class="feather icon-command"></i></span>--}}
{{--                    <span class="pcoded-mtext">Icons</span>--}}
{{--                </a>--}}
{{--                <ul class="pcoded-submenu">--}}
{{--                    <li class=" ">--}}
{{--                        <a href="default/icon-font-awesome.html">--}}
{{--                            <span class="pcoded-mtext">Font Awesome</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class=" ">--}}
{{--                        <a href="default/icon-themify.html">--}}
{{--                            <span class="pcoded-mtext">Themify</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class=" ">--}}
{{--                        <a href="default/icon-simple-line.html">--}}
{{--                            <span class="pcoded-mtext">Simple Line Icon</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class=" ">--}}
{{--                        <a href="default/icon-ion.html">--}}
{{--                            <span class="pcoded-mtext">Ion Icon</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class=" ">--}}
{{--                        <a href="default/icon-material-design.html">--}}
{{--                            <span class="pcoded-mtext">Material Design</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class=" ">--}}
{{--                        <a href="default/icon-icofonts.html">--}}
{{--                            <span class="pcoded-mtext">Ico Fonts</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class=" ">--}}
{{--                        <a href="default/icon-weather.html">--}}
{{--                            <span class="pcoded-mtext">Weather Icon</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class=" ">--}}
{{--                        <a href="default/icon-typicons.html">--}}
{{--                            <span class="pcoded-mtext">Typicons</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class=" ">--}}
{{--                        <a href="default/icon-flags.html">--}}
{{--                            <span class="pcoded-mtext">Flags</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </li>--}}
{{--        </ul>--}}
{{--        <div class="pcoded-navigatio-lavel">Forms</div>--}}
{{--        <ul class="pcoded-item pcoded-left-item">--}}
{{--            <li class="pcoded-hasmenu">--}}
{{--                <a href="javascript:void(0)">--}}
{{--                    <span class="pcoded-micon"><i class="feather icon-clipboard"></i></span>--}}
{{--                    <span class="pcoded-mtext">Form Components</span>--}}
{{--                </a>--}}
{{--                <ul class="pcoded-submenu">--}}
{{--                    <li class=" ">--}}
{{--                        <a href="default/form-elements-component.html">--}}
{{--                            <span class="pcoded-mtext">Form Components</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class=" ">--}}
{{--                        <a href="default/form-elements-add-on.html">--}}
{{--                            <span class="pcoded-mtext">Form-Elements-Add-On</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class=" ">--}}
{{--                        <a href="default/form-elements-advance.html">--}}
{{--                            <span class="pcoded-mtext">Form-Elements-Advance</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class=" ">--}}
{{--                        <a href="default/form-validation.html">--}}
{{--                            <span class="pcoded-mtext">Form Validation</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </li>--}}
{{--            <li class=" ">--}}
{{--                <a href="default/form-picker.html">--}}
{{--                    <span class="pcoded-micon"><i class="feather icon-edit-1"></i></span>--}}
{{--                    <span class="pcoded-mtext">Form Picker</span>--}}
{{--                    <span class="pcoded-badge label label-warning">NEW</span>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--            <li class=" ">--}}
{{--                <a href="default/form-select.html">--}}
{{--                    <span class="pcoded-micon"><i class="feather icon-feather"></i></span>--}}
{{--                    <span class="pcoded-mtext">Form Select</span>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--            <li class=" ">--}}
{{--                <a href="default/form-masking.html">--}}
{{--                    <span class="pcoded-micon"><i class="feather icon-shield"></i></span>--}}
{{--                    <span class="pcoded-mtext">Form Masking</span>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--            <li class=" ">--}}
{{--                <a href="default/form-wizard.html">--}}
{{--                    <span class="pcoded-micon"><i class="feather icon-tv"></i></span>--}}
{{--                    <span class="pcoded-mtext">Form Wizard</span>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--            <li class="pcoded-hasmenu">--}}
{{--                <a href="javascript:void(0)">--}}
{{--                    <span class="pcoded-micon"><i class="feather icon-book"></i></span>--}}
{{--                    <span class="pcoded-mtext">Ready To Use</span>--}}
{{--                    <span class="pcoded-badge label label-danger">HOT</span>--}}
{{--                </a>--}}
{{--                <ul class="pcoded-submenu">--}}
{{--                    <li class=" ">--}}
{{--                        <a href="default/ready-cloned-elements-form.html">--}}
{{--                            <span class="pcoded-mtext">Cloned Elements Form</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class=" ">--}}
{{--                        <a href="default/ready-currency-form.html">--}}
{{--                            <span class="pcoded-mtext">Currency Form</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class=" ">--}}
{{--                        <a href="default/ready-form-booking.html">--}}
{{--                            <span class="pcoded-mtext">Booking Form</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class=" ">--}}
{{--                        <a href="default/ready-form-booking-multi-steps.html">--}}
{{--                            <span class="pcoded-mtext">Booking Multi Steps Form</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class=" ">--}}
{{--                        <a href="default/ready-form-comment.html">--}}
{{--                            <span class="pcoded-mtext">Comment Form</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class=" ">--}}
{{--                        <a href="default/ready-form-contact.html">--}}
{{--                            <span class="pcoded-mtext">Contact Form</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class=" ">--}}
{{--                        <a href="default/ready-job-application-form.html">--}}
{{--                            <span class="pcoded-mtext">Job Application Form</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class=" ">--}}
{{--                        <a href="default/ready-js-addition-form.html">--}}
{{--                            <span class="pcoded-mtext">JS Addition Form</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class=" ">--}}
{{--                        <a href="default/ready-login-form.html">--}}
{{--                            <span class="pcoded-mtext">Login Form</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class=" ">--}}
{{--                        <a href="default/ready-popup-modal-form.html" target="_blank">--}}
{{--                            <span class="pcoded-mtext">Popup Modal Form</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class=" ">--}}
{{--                        <a href="default/ready-registration-form.html">--}}
{{--                            <span class="pcoded-mtext">Registration Form</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class=" ">--}}
{{--                        <a href="default/ready-review-form.html">--}}
{{--                            <span class="pcoded-mtext">Review Form</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class=" ">--}}
{{--                        <a href="default/ready-subscribe-form.html">--}}
{{--                            <span class="pcoded-mtext">Subscribe Form</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class=" ">--}}
{{--                        <a href="default/ready-suggestion-form.html">--}}
{{--                            <span class="pcoded-mtext">Suggestion Form</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class=" ">--}}
{{--                        <a href="default/ready-tabs-form.html">--}}
{{--                            <span class="pcoded-mtext">Tabs Form</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </li>--}}
{{--        </ul>--}}
{{--        <div class="pcoded-navigatio-lavel">Tables</div>--}}
{{--        <ul class="pcoded-item pcoded-left-item">--}}
{{--            <li class="pcoded-hasmenu">--}}
{{--                <a href="javascript:void(0)">--}}
{{--                    <span class="pcoded-micon"><i class="feather icon-credit-card"></i></span>--}}
{{--                    <span class="pcoded-mtext">Bootstrap Table</span>--}}
{{--                </a>--}}
{{--                <ul class="pcoded-submenu">--}}
{{--                    <li class=" ">--}}
{{--                        <a href="default/bs-basic-table.html">--}}
{{--                            <span class="pcoded-mtext">Basic Table</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class=" ">--}}
{{--                        <a href="default/bs-table-sizing.html">--}}
{{--                            <span class="pcoded-mtext">Sizing Table</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class=" ">--}}
{{--                        <a href="default/bs-table-border.html">--}}
{{--                            <span class="pcoded-mtext">Border Table</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class=" ">--}}
{{--                        <a href="default/bs-table-styling.html">--}}
{{--                            <span class="pcoded-mtext">Styling Table</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </li>--}}
{{--            <li class="pcoded-hasmenu">--}}
{{--                <a href="javascript:void(0)">--}}
{{--                    <span class="pcoded-micon"><i class="feather icon-inbox"></i></span>--}}
{{--                    <span class="pcoded-mtext">Data Table</span>--}}
{{--                    <span class="pcoded-mcaret"></span>--}}
{{--                </a>--}}
{{--                <ul class="pcoded-submenu">--}}
{{--                    <li class=" ">--}}
{{--                        <a href="default/dt-basic.html">--}}
{{--                            <span class="pcoded-mtext">Basic Initialization</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class=" ">--}}
{{--                        <a href="default/dt-advance.html">--}}
{{--                            <span class="pcoded-mtext">Advance Initialization</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class=" ">--}}
{{--                        <a href="default/dt-styling.html">--}}
{{--                            <span class="pcoded-mtext">Styling</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class=" ">--}}
{{--                        <a href="default/dt-api.html">--}}
{{--                            <span class="pcoded-mtext">API</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class=" ">--}}
{{--                        <a href="default/dt-ajax.html">--}}
{{--                            <span class="pcoded-mtext">Ajax</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class=" ">--}}
{{--                        <a href="default/dt-server-side.html">--}}
{{--                            <span class="pcoded-mtext">Server Side</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class=" ">--}}
{{--                        <a href="default/dt-plugin.html">--}}
{{--                            <span class="pcoded-mtext">Plug-In</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class=" ">--}}
{{--                        <a href="default/dt-data-sources.html">--}}
{{--                            <span class="pcoded-mtext">Data Sources</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </li>--}}
{{--            <li class=" ">--}}
{{--                <a href="default/foo-table.html">--}}
{{--                    <span class="pcoded-micon"><i class="feather icon-hash"></i></span>--}}
{{--                    <span class="pcoded-mtext">FooTable</span>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--            <li class="pcoded-hasmenu ">--}}
{{--                <a href="javascript:void(0)">--}}
{{--                    <span class="pcoded-micon"><i class="feather icon-airplay"></i></span>--}}
{{--                    <span class="pcoded-mtext">Handson Table</span>--}}
{{--                </a>--}}
{{--                <ul class="pcoded-submenu">--}}
{{--                    <li class="">--}}
{{--                        <a href="default/handson-appearance.html">--}}
{{--                            <span class="pcoded-mtext">Appearance</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="">--}}
{{--                        <a href="default/handson-data-operation.html">--}}
{{--                            <span class="pcoded-mtext">Data Operation</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="">--}}
{{--                        <a href="default/handson-rows-cols.html">--}}
{{--                            <span class="pcoded-mtext">Rows Columns</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="">--}}
{{--                        <a href="default/handson-columns-only.html">--}}
{{--                            <span class="pcoded-mtext">Columns Only</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="">--}}
{{--                        <a href="default/handson-cell-features.html">--}}
{{--                            <span class="pcoded-mtext">Cell Features</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="">--}}
{{--                        <a href="default/handson-cell-types.html">--}}
{{--                            <span class="pcoded-mtext">Cell Types</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="">--}}
{{--                        <a href="default/handson-integrations.html">--}}
{{--                            <span class="pcoded-mtext">Integrations</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="">--}}
{{--                        <a href="default/handson-rows-only.html">--}}
{{--                            <span class="pcoded-mtext">Rows Only</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="">--}}
{{--                        <a href="default/handson-utilities.html">--}}
{{--                            <span class="pcoded-mtext">Utilities</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </li>--}}
{{--            <li class="">--}}
{{--                <a href="default/editable-table.html">--}}
{{--                    <span class="pcoded-micon"><i class="feather icon-edit"></i></span>--}}
{{--                    <span class="pcoded-mtext">Editable Table</span>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--        </ul>--}}
{{--        <div class="pcoded-navigatio-lavel">Chart And Maps</div>--}}
{{--        <ul class="pcoded-item pcoded-left-item">--}}
{{--            <li class="pcoded-hasmenu ">--}}
{{--                <a href="javascript:void(0)">--}}
{{--                    <span class="pcoded-micon"><i class="feather icon-pie-chart"></i></span>--}}
{{--                    <span class="pcoded-mtext">Charts</span>--}}
{{--                </a>--}}
{{--                <ul class="pcoded-submenu">--}}
{{--                    <li class="">--}}
{{--                        <a href="default/chart-google.html">--}}
{{--                            <span class="pcoded-mtext">Google Chart</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="">--}}
{{--                        <a href="default/chart-echart.html">--}}
{{--                            <span class="pcoded-mtext">Echarts</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="">--}}
{{--                        <a href="default/chart-chartjs.html">--}}
{{--                            <span class="pcoded-mtext">ChartJs</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="">--}}
{{--                        <a href="default/chart-list.html">--}}
{{--                            <span class="pcoded-mtext">List Chart</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="">--}}
{{--                        <a href="default/chart-float.html">--}}
{{--                            <span class="pcoded-mtext">Float Chart</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="">--}}
{{--                        <a href="default/chart-knob.html">--}}
{{--                            <span class="pcoded-mtext">Knob chart</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="">--}}
{{--                        <a href="default/chart-morris.html">--}}
{{--                            <span class="pcoded-mtext">Morris Chart</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="">--}}
{{--                        <a href="chart-nvd3.html">--}}
{{--                            <span class="pcoded-mtext">Nvd3 Chart</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="">--}}
{{--                        <a href="default/chart-peity.html">--}}
{{--                            <span class="pcoded-mtext">Peity Chart</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="">--}}
{{--                        <a href="default/chart-radial.html">--}}
{{--                            <span class="pcoded-mtext">Radial Chart</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="">--}}
{{--                        <a href="default/chart-rickshaw.html">--}}
{{--                            <span class="pcoded-mtext">Rickshaw Chart</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="">--}}
{{--                        <a href="default/chart-sparkline.html">--}}
{{--                            <span class="pcoded-mtext">Sparkline Chart</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="">--}}
{{--                        <a href="default/chart-c3.html">--}}
{{--                            <span class="pcoded-mtext">C3 Chart</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </li>--}}
{{--            <li class="pcoded-hasmenu ">--}}
{{--                <a href="javascript:void(0)">--}}
{{--                    <span class="pcoded-micon"><i class="feather icon-map"></i></span>--}}
{{--                    <span class="pcoded-mtext">Maps</span>--}}
{{--                </a>--}}
{{--                <ul class="pcoded-submenu">--}}
{{--                    <li class="">--}}
{{--                        <a href="default/map-google.html">--}}
{{--                            <span class="pcoded-mtext">Google Maps</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="">--}}
{{--                        <a href="default/map-vector.html">--}}
{{--                            <span class="pcoded-mtext">Vector Maps</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="">--}}
{{--                        <a href="default/map-api.html">--}}
{{--                            <span class="pcoded-mtext">Google Map Search API</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="">--}}
{{--                        <a href="default/location.html">--}}
{{--                            <span class="pcoded-mtext">Location</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </li>--}}
{{--            <li class="">--}}
{{--                <a href="files/extra-pages/landingpage/index.html" target="_blank">--}}
{{--                    <span class="pcoded-micon"><i class="feather icon-navigation-2"></i></span>--}}
{{--                    <span class="pcoded-mtext">Landing Page</span>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--        </ul>--}}

{{--        <div class="pcoded-navigatio-lavel">App</div>--}}
{{--        <ul class="pcoded-item pcoded-left-item">--}}
{{--            <li class=" ">--}}
{{--                <a href="default/chat.html">--}}
{{--                    <span class="pcoded-micon"><i class="feather icon-message-square"></i></span>--}}
{{--                    <span class="pcoded-mtext">Chat</span>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--            <li class="pcoded-hasmenu ">--}}
{{--                <a href="javascript:void(0)">--}}
{{--                    <span class="pcoded-micon"><i class="feather icon-globe"></i></span>--}}
{{--                    <span class="pcoded-mtext">Social</span>--}}
{{--                </a>--}}
{{--                <ul class="pcoded-submenu">--}}
{{--                    <li class="">--}}
{{--                        <a href="default/fb-wall.html">--}}
{{--                            <span class="pcoded-mtext">Wall</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="">--}}
{{--                        <a href="default/message.html">--}}
{{--                            <span class="pcoded-mtext">Messages</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </li>--}}
{{--            <li class="pcoded-hasmenu ">--}}
{{--                <a href="javascript:void(0)">--}}
{{--                    <span class="pcoded-micon"><i class="feather icon-check-circle"></i></span>--}}
{{--                    <span class="pcoded-mtext">Task</span>--}}
{{--                </a>--}}
{{--                <ul class="pcoded-submenu">--}}
{{--                    <li class="">--}}
{{--                        <a href="default/task-list.html">--}}
{{--                            <span class="pcoded-mtext">Task List</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="">--}}
{{--                        <a href="default/task-board.html">--}}
{{--                            <span class="pcoded-mtext">Task Board</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="">--}}
{{--                        <a href="default/task-detail.html">--}}
{{--                            <span class="pcoded-mtext">Task Detail</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="">--}}
{{--                        <a href="default/issue-list.html">--}}
{{--                            <span class="pcoded-mtext">Issue List</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </li>--}}
{{--            <li class="pcoded-hasmenu ">--}}
{{--                <a href="javascript:void(0)">--}}
{{--                    <span class="pcoded-micon"><i class="feather icon-bookmark"></i></span>--}}
{{--                    <span class="pcoded-mtext">To-Do</span>--}}
{{--                </a>--}}
{{--                <ul class="pcoded-submenu">--}}
{{--                    <li class="">--}}
{{--                        <a href="default/todo.html">--}}
{{--                            <span class="pcoded-mtext">To-Do</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="">--}}
{{--                        <a href="default/notes.html">--}}
{{--                            <span class="pcoded-mtext">Notes</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </li>--}}
{{--            <li class="pcoded-hasmenu ">--}}
{{--                <a href="javascript:void(0)">--}}
{{--                    <span class="pcoded-micon"><i class="feather icon-image"></i></span>--}}
{{--                    <span class="pcoded-mtext">Gallery</span>--}}
{{--                </a>--}}
{{--                <ul class="pcoded-submenu">--}}
{{--                    <li class="">--}}
{{--                        <a href="default/gallery-grid.html">--}}
{{--                            <span class="pcoded-mtext">Gallery-Grid</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="">--}}
{{--                        <a href="default/gallery-masonry.html">--}}
{{--                            <span class="pcoded-mtext">Masonry Gallery</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="">--}}
{{--                        <a href="default/gallery-advance.html">--}}
{{--                            <span class="pcoded-mtext">Advance Gallery</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </li>--}}
{{--            <li class="pcoded-hasmenu ">--}}
{{--                <a href="javascript:void(0)">--}}
{{--                    <span class="pcoded-micon"><i class="feather icon-search"></i><b>S</b></span>--}}
{{--                    <span class="pcoded-mtext">Search</span>--}}
{{--                </a>--}}
{{--                <ul class="pcoded-submenu">--}}
{{--                    <li class="">--}}
{{--                        <a href="default/search-result.html">--}}
{{--                            <span class="pcoded-mtext">Simple Search</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="">--}}
{{--                        <a href="default/search-result2.html">--}}
{{--                            <span class="pcoded-mtext">Grouping Search</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </li>--}}
{{--            <li class="pcoded-hasmenu ">--}}
{{--                <a href="javascript:void(0)">--}}
{{--                    <span class="pcoded-micon"><i class="feather icon-award"></i></span>--}}
{{--                    <span class="pcoded-mtext">Job Search</span>--}}
{{--                    <span class="pcoded-badge label label-danger">NEW</span>--}}
{{--                </a>--}}
{{--                <ul class="pcoded-submenu">--}}
{{--                    <li class="">--}}
{{--                        <a href="default/job-card-view.html">--}}
{{--                            <span class="pcoded-mtext">Card View</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="">--}}
{{--                        <a href="default/job-details.html">--}}
{{--                            <span class="pcoded-mtext">Job Detailed</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="">--}}
{{--                        <a href="default/job-find.html">--}}
{{--                            <span class="pcoded-mtext">Job Find</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="">--}}
{{--                        <a href="default/job-panel-view.html">--}}
{{--                            <span class="pcoded-mtext">Job Panel View</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </li>--}}
{{--        </ul>--}}
{{--        <div class="pcoded-navigatio-lavel">Extension</div>--}}
{{--        <ul class="pcoded-item pcoded-left-item">--}}
{{--            <li class="pcoded-hasmenu ">--}}
{{--                <a href="javascript:void(0)">--}}
{{--                    <span class="pcoded-micon"><i class="feather icon-file-plus"></i></span>--}}
{{--                    <span class="pcoded-mtext">Editor</span>--}}
{{--                </a>--}}
{{--                <ul class="pcoded-submenu">--}}
{{--                    <li class="">--}}
{{--                        <a href="default/ck-editor.html">--}}
{{--                            <span class="pcoded-mtext">CK-Editor</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="">--}}
{{--                        <a href="default/wysiwyg-editor.html">--}}
{{--                            <span class="pcoded-mtext">WYSIWYG Editor</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="">--}}
{{--                        <a href="default/ace-editor.html">--}}
{{--                            <span class="pcoded-mtext">Ace Editor</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="">--}}
{{--                        <a href="default/long-press-editor.html">--}}
{{--                            <span class="pcoded-mtext">Long Press Editor</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </li>--}}
{{--        </ul>--}}
{{--        <ul class="pcoded-item pcoded-left-item">--}}
{{--            <li class="pcoded-hasmenu ">--}}
{{--                <a href="javascript:void(0)">--}}
{{--                    <span class="pcoded-micon"><i class="feather icon-file-minus"></i></span>--}}
{{--                    <span class="pcoded-mtext">Invoice</span>--}}
{{--                </a>--}}
{{--                <ul class="pcoded-submenu">--}}
{{--                    <li class="">--}}
{{--                        <a href="default/invoice.html">--}}
{{--                            <span class="pcoded-mtext">Invoice</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="">--}}
{{--                        <a href="default/invoice-summary.html">--}}
{{--                            <span class="pcoded-mtext">Invoice Summary</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="">--}}
{{--                        <a href="default/invoice-list.html">--}}
{{--                            <span class="pcoded-mtext">Invoice List</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </li>--}}
{{--            <li class="pcoded-hasmenu ">--}}
{{--                <a href="javascript:void(0)">--}}
{{--                    <span class="pcoded-micon"><i class="feather icon-calendar"></i></span>--}}
{{--                    <span class="pcoded-mtext">Event Calendar</span>--}}
{{--                </a>--}}
{{--                <ul class="pcoded-submenu">--}}
{{--                    <li class="">--}}
{{--                        <a href="default/event-full-calender.html">--}}
{{--                            <span class="pcoded-mtext">Full Calendar</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="">--}}
{{--                        <a href="default/event-clndr.html">--}}
{{--                            <span class="pcoded-mtext">CLNDER</span>--}}
{{--                            <span class="pcoded-badge label label-info">NEW</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </li>--}}
{{--            <li class="">--}}
{{--                <a href="image-crop.html">--}}
{{--                    <span class="pcoded-micon"><i class="feather icon-scissors"></i></span>--}}
{{--                    <span class="pcoded-mtext">Image Cropper</span>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--            <li class="">--}}
{{--                <a href="default/file-upload.html">--}}
{{--                    <span class="pcoded-micon"><i class="feather icon-upload-cloud"></i></span>--}}
{{--                    <span class="pcoded-mtext">File Upload</span>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--            <li class="">--}}
{{--                <a href="default/change-loges.html">--}}
{{--                    <span class="pcoded-micon"><i class="feather icon-briefcase"></i><b>CL</b></span>--}}
{{--                    <span class="pcoded-mtext">Change Loges</span>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--        </ul>--}}
{{--        <div class="pcoded-navigatio-lavel">Other</div>--}}
{{--        <ul class="pcoded-item pcoded-left-item">--}}
{{--            <li class="pcoded-hasmenu ">--}}
{{--                <a href="javascript:void(0)">--}}
{{--                    <span class="pcoded-micon"><i class="feather icon-list"></i></span>--}}
{{--                    <span class="pcoded-mtext">Menu Levels</span>--}}
{{--                </a>--}}
{{--                <ul class="pcoded-submenu">--}}
{{--                    <li class="">--}}
{{--                        <a href="javascript:void(0)">--}}
{{--                            <span class="pcoded-mtext">Menu Level 2.1</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="pcoded-hasmenu ">--}}
{{--                        <a href="javascript:void(0)">--}}
{{--                            <span class="pcoded-mtext">Menu Level 2.2</span>--}}
{{--                        </a>--}}
{{--                        <ul class="pcoded-submenu">--}}
{{--                            <li class="">--}}
{{--                                <a href="javascript:void(0)">--}}
{{--                                    <span class="pcoded-mtext">Menu Level 3.1</span>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}
{{--                    <li class="">--}}
{{--                        <a href="javascript:void(0)">--}}
{{--                            <span class="pcoded-mtext">Menu Level 2.3</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </li>--}}
{{--            <li class="">--}}
{{--                <a href="javascript:void(0)" class="disabled">--}}
{{--                    <span class="pcoded-micon"><i class="feather icon-power"></i></span>--}}
{{--                    <span class="pcoded-mtext">Disabled Menu</span>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--            <li class="">--}}
{{--                <a href="default/sample-page.html">--}}
{{--                    <span class="pcoded-micon"><i class="feather icon-watch"></i></span>--}}
{{--                    <span class="pcoded-mtext">Sample Page</span>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--        </ul>--}}
{{--        <div class="pcoded-navigatio-lavel">Support</div>--}}
{{--        <ul class="pcoded-item pcoded-left-item">--}}
{{--            <li class="">--}}
{{--                <a href="http://html.codedthemes.com/Adminty/doc" target="_blank">--}}
{{--                    <span class="pcoded-micon"><i class="feather icon-monitor"></i></span>--}}
{{--                    <span class="pcoded-mtext">Documentation</span>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--            <li class="">--}}
{{--                <a href="#" target="_blank">--}}
{{--                    <span class="pcoded-micon"><i class="feather icon-help-circle"></i></span>--}}
{{--                    <span class="pcoded-mtext">Submit Issue</span>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--        </ul>--}}
    </div>

</nav>
