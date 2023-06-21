<!doctype html>
<html lang="en">
<head>
    <base href="/">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title>@yield('title')</title>
    <!-- Simple bar CSS -->
    <link rel="stylesheet" href="dashboard/css/simplebar.css">
    <!-- Fonts CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- Icons CSS -->
    <link rel="stylesheet" href="dashboard/css/feather.css">
    <link rel="stylesheet" href="dashboard/css/select2.css">
    <link rel="stylesheet" href="dashboard/css/dropzone.css">
    <link rel="stylesheet" href="dashboard/css/uppy.min.css">
    <link rel="stylesheet" href="dashboard/css/jquery.steps.css">
    <link rel="stylesheet" href="dashboard/css/jquery.timepicker.css">
    <link rel="stylesheet" href="dashboard/css/quill.snow.css">
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="dashboard/css/daterangepicker.css">
    <!-- App CSS -->
    <link rel="stylesheet" href="dashboard/css/app-light.css" id="lightTheme">
    <link rel="stylesheet" href="dashboard/css/app-dark.css" id="darkTheme" disabled>
    <link rel="icon" type="image/x-icon" href="front/img/favicon.ico">
</head>
<body class="vertical  light  ">
<div class="wrapper">
    <nav class="topnav navbar navbar-light">
        <button type="button" class="navbar-toggler text-muted mt-2 p-0 mr-3 collapseSidebar">
            <i class="fe fe-menu navbar-toggler-icon"></i>
        </button>
        <form class="form-inline mr-auto searchform text-muted">
            <input class="form-control mr-sm-2 bg-transparent border-0 pl-4 text-muted" type="search" placeholder="Type something..." aria-label="Search">
        </form>
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link text-muted my-2" href="#" id="modeSwitcher" data-mode="light">
                    <i class="fe fe-sun fe-16"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-muted my-2" href="./#" data-toggle="modal" data-target=".modal-shortcut">
                    <span class="fe fe-grid fe-16"></span>
                </a>
            </li>
            <li class="nav-item nav-notif">
                <a class="nav-link text-muted my-2" href="./#" data-toggle="modal" data-target=".modal-notif">
                    <span class="fe fe-bell fe-16"></span>
                    <span class="dot dot-md bg-success"></span>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-muted pr-0" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span class="avatar avatar-sm mt-2">
                <img src="./dashboard/assets/avatars/face-1.jpg" alt="..." class="avatar-img rounded-circle">
              </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="#">Profile</a>
                    <a class="dropdown-item" href="#">Settings</a>
                    <a class="dropdown-item" href="#">Activities</a>
                </div>
            </li>
        </ul>
    </nav>
    <aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
        <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
            <i class="fe fe-x"><span class="sr-only"></span></i>
        </a>
        <nav class="vertnav navbar navbar-light">
            <!-- nav bar -->
            <div class="w-100 mb-4 d-flex">
                <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="{{url("/admin/dashboard")}}">
                    <img src="./dashboard/assets/images/logo.png" alt="Shop Runner">
                </a>
            </div>
            <ul class="navbar-nav flex-fill w-100 mb-2">
                <li class="nav-item">
                    <a href="{{url("/admin/dashboard")}}" class="nav-link">
                        <i class="fe fe-home fe-16"></i>
                        <span class="ml-3 item-text">Dashboard</span>
                    </a>
                </li>
            </ul>
            <p class="text-muted nav-heading mt-4 mb-1">
                <span>Components</span>
            </p>
            <ul class="navbar-nav flex-fill w-100 mb-2">
                <li class="nav-item w-100">
                    <a class="nav-link" href="widgets.html">
                        <i class="fe fe-image fe-16"></i>
                        <span class="ml-3 item-text">Products</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url("/admin/orders")}}" class="nav-link">
                        <i class="fe fe-box fe-16"></i>
                        <span class="ml-3 item-text">Orders</span>
                        <span class="badge badge-pill badge-primary">New</span>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a href="#tables" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                        <i class="fe fe-grid fe-16"></i>
                        <span class="ml-3 item-text">Tables</span>
                    </a>
                    <ul class="collapse list-unstyled pl-4 w-100" id="tables">
                        <li class="nav-item">
                            <a class="nav-link pl-3" href="./table_basic.html"><span class="ml-1 item-text">Basic Tables</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pl-3" href="./table_advanced.html"><span class="ml-1 item-text">Advanced Tables</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pl-3" href="./table_datatables.html"><span class="ml-1 item-text">Data Tables</span></a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a href="#charts" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                        <i class="fe fe-pie-chart fe-16"></i>
                        <span class="ml-3 item-text">Charts</span>
                    </a>
                    <ul class="collapse list-unstyled pl-4 w-100" id="charts">
                        <li class="nav-item">
                            <a class="nav-link pl-3" href="./chart-inline.html"><span class="ml-1 item-text">Inline Chart</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pl-3" href="./chart-chartjs.html"><span class="ml-1 item-text">Chartjs</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pl-3" href="./chart-apexcharts.html"><span class="ml-1 item-text">ApexCharts</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pl-3" href="./datamaps.html"><span class="ml-1 item-text">Datamaps</span></a>
                        </li>
                    </ul>
                </li>
            </ul>
            <p class="text-muted nav-heading mt-4 mb-1">
                <span>Apps</span>
            </p>
            <ul class="navbar-nav flex-fill w-100 mb-2">
                <li class="nav-item w-100">
                    <a class="nav-link" href="calendar.html">
                        <i class="fe fe-calendar fe-16"></i>
                        <span class="ml-3 item-text">Calendar</span>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a href="#contact" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                        <i class="fe fe-book fe-16"></i>
                        <span class="ml-3 item-text">Contacts</span>
                    </a>
                    <ul class="collapse list-unstyled pl-4 w-100" id="contact">
                        <a class="nav-link pl-3" href="./contacts-list.html"><span class="ml-1">Contact List</span></a>
                        <a class="nav-link pl-3" href="./contacts-grid.html"><span class="ml-1">Contact Grid</span></a>
                        <a class="nav-link pl-3" href="./contacts-new.html"><span class="ml-1">New Contact</span></a>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a href="#profile" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                        <i class="fe fe-user fe-16"></i>
                        <span class="ml-3 item-text">Profile</span>
                    </a>
                    <ul class="collapse list-unstyled pl-4 w-100" id="profile">
                        <a class="nav-link pl-3" href="./profile.html"><span class="ml-1">Overview</span></a>
                        <a class="nav-link pl-3" href="./profile-settings.html"><span class="ml-1">Settings</span></a>
                        <a class="nav-link pl-3" href="./profile-security.html"><span class="ml-1">Security</span></a>
                        <a class="nav-link pl-3" href="./profile-notification.html"><span class="ml-1">Notifications</span></a>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a href="#fileman" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                        <i class="fe fe-folder fe-16"></i>
                        <span class="ml-3 item-text">File Manager</span>
                    </a>
                    <ul class="collapse list-unstyled pl-4 w-100" id="fileman">
                        <a class="nav-link pl-3" href="./files-list.html"><span class="ml-1">Files List</span></a>
                        <a class="nav-link pl-3" href="./files-grid.html"><span class="ml-1">Files Grid</span></a>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a href="#support" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                        <i class="fe fe-compass fe-16"></i>
                        <span class="ml-3 item-text">Help Desk</span>
                    </a>
                    <ul class="collapse list-unstyled pl-4 w-100" id="support">
                        <a class="nav-link pl-3" href="./support-center.html"><span class="ml-1">Home</span></a>
                        <a class="nav-link pl-3" href="./support-tickets.html"><span class="ml-1">Tickets</span></a>
                        <a class="nav-link pl-3" href="./support-ticket-detail.html"><span class="ml-1">Ticket Detail</span></a>
                        <a class="nav-link pl-3" href="./support-faqs.html"><span class="ml-1">FAQs</span></a>
                    </ul>
                </li>
            </ul>
            <p class="text-muted nav-heading mt-4 mb-1">
                <span>Extra</span>
            </p>
            <ul class="navbar-nav flex-fill w-100 mb-2">
                <li class="nav-item dropdown">
                    <a href="#pages" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                        <i class="fe fe-file fe-16"></i>
                        <span class="ml-3 item-text">Pages</span>
                    </a>
                    <ul class="collapse list-unstyled pl-4 w-100 w-100" id="pages">
                        <li class="nav-item">
                            <a class="nav-link pl-3" href="./page-orders.html">
                                <span class="ml-1 item-text">Orders</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pl-3" href="./page-timeline.html">
                                <span class="ml-1 item-text">Timeline</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pl-3" href="./page-invoice.html">
                                <span class="ml-1 item-text">Invoice</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pl-3" href="./page-404.html">
                                <span class="ml-1 item-text">Page 404</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pl-3" href="./page-500.html">
                                <span class="ml-1 item-text">Page 500</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pl-3" href="./page-blank.html">
                                <span class="ml-1 item-text">Blank</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a href="#auth" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                        <i class="fe fe-shield fe-16"></i>
                        <span class="ml-3 item-text">Authentication</span>
                    </a>
                    <ul class="collapse list-unstyled pl-4 w-100" id="auth">
                        <a class="nav-link pl-3" href="./auth-login.html"><span class="ml-1">Login 1</span></a>
                        <a class="nav-link pl-3" href="./auth-login-half.html"><span class="ml-1">Login 2</span></a>
                        <a class="nav-link pl-3" href="./auth-register.html"><span class="ml-1">Register</span></a>
                        <a class="nav-link pl-3" href="./auth-resetpw.html"><span class="ml-1">Reset Password</span></a>
                        <a class="nav-link pl-3" href="./auth-confirm.html"><span class="ml-1">Confirm Password</span></a>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a href="#layouts" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                        <i class="fe fe-layout fe-16"></i>
                        <span class="ml-3 item-text">Layout</span>
                    </a>
                    <ul class="collapse list-unstyled pl-4 w-100" id="layouts">
                        <li class="nav-item">
                            <a class="nav-link pl-3" href="./index.html"><span class="ml-1 item-text">Default</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pl-3" href="./index-horizontal.html"><span class="ml-1 item-text">Top Navigation</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pl-3" href="./index-boxed.html"><span class="ml-1 item-text">Boxed</span></a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </aside>

{{--    Main--}}
@yield('body')

</div> <!-- .wrapper -->
<script src="dashboard/js/jquery.min.js"></script>
<script src="dashboard/js/popper.min.js"></script>
<script src="dashboard/js/moment.min.js"></script>
<script src="dashboard/js/bootstrap.min.js"></script>
<script src="dashboard/js/simplebar.min.js"></script>
<script src='dashboard/js/daterangepicker.js'></script>
<script src='dashboard/js/jquery.stickOnScroll.js'></script>
<script src="dashboard/js/tinycolor-min.js"></script>
<script src="dashboard/js/config.js"></script>
<script src="dashboard/js/d3.min.js"></script>
<script src="dashboard/js/topojson.min.js"></script>
<script src="dashboard/js/datamaps.all.min.js"></script>
<script src="dashboard/js/datamaps-zoomto.js"></script>
<script src="dashboard/js/datamaps.custom.js"></script>
<script src="dashboard/js/Chart.min.js"></script>
<script>
    /* defind global options */
    Chart.defaults.global.defaultFontFamily = base.defaultFontFamily;
    Chart.defaults.global.defaultFontColor = colors.mutedColor;
</script>
<script src="dashboard/js/gauge.min.js"></script>
<script src="dashboard/js/jquery.sparkline.min.js"></script>
<script src="dashboard/js/apexcharts.min.js"></script>
<script src="dashboard/js/apexcharts.custom.js"></script>
<script src='dashboard/js/jquery.mask.min.js'></script>
<script src='dashboard/js/select2.min.js'></script>
<script src='dashboard/js/jquery.steps.min.js'></script>
<script src='dashboard/js/jquery.validate.min.js'></script>
<script src='dashboard/js/jquery.timepicker.js'></script>
<script src='dashboard/js/dropzone.min.js'></script>
<script src='dashboard/js/uppy.min.js'></script>
<script src='dashboard/js/quill.min.js'></script>
<script>
    $('.select2').select2(
        {
            theme: 'bootstrap4',
        });
    $('.select2-multi').select2(
        {
            multiple: true,
            theme: 'bootstrap4',
        });
    $('.drgpicker').daterangepicker(
        {
            singleDatePicker: true,
            timePicker: false,
            showDropdowns: true,
            locale:
                {
                    format: 'MM/DD/YYYY'
                }
        });
    $('.time-input').timepicker(
        {
            'scrollDefault': 'now',
            'zindex': '9999' /* fix modal open */
        });
    /** date range picker */
    if ($('.datetimes').length)
    {
        $('.datetimes').daterangepicker(
            {
                timePicker: true,
                startDate: moment().startOf('hour'),
                endDate: moment().startOf('hour').add(32, 'hour'),
                locale:
                    {
                        format: 'M/DD hh:mm A'
                    }
            });
    }
    var start = moment().subtract(29, 'days');
    var end = moment();

    function cb(start, end)
    {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
    }
    $('#reportrange').daterangepicker(
        {
            startDate: start,
            endDate: end,
            ranges:
                {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                }
        }, cb);
    cb(start, end);
    $('.input-placeholder').mask("00/00/0000",
        {
            placeholder: "__/__/____"
        });
    $('.input-zip').mask('00000-000',
        {
            placeholder: "____-___"
        });
    $('.input-money').mask("#.##0,00",
        {
            reverse: true
        });
    $('.input-phoneus').mask('(000) 000-0000');
    $('.input-mixed').mask('AAA 000-S0S');
    $('.input-ip').mask('0ZZ.0ZZ.0ZZ.0ZZ',
        {
            translation:
                {
                    'Z':
                        {
                            pattern: /[0-9]/,
                            optional: true
                        }
                },
            placeholder: "___.___.___.___"
        });
    // editor
    var editor = document.getElementById('editor');
    if (editor)
    {
        var toolbarOptions = [
            [
                {
                    'font': []
                }],
            [
                {
                    'header': [1, 2, 3, 4, 5, 6, false]
                }],
            ['bold', 'italic', 'underline', 'strike'],
            ['blockquote', 'code-block'],
            [
                {
                    'header': 1
                },
                {
                    'header': 2
                }],
            [
                {
                    'list': 'ordered'
                },
                {
                    'list': 'bullet'
                }],
            [
                {
                    'script': 'sub'
                },
                {
                    'script': 'super'
                }],
            [
                {
                    'indent': '-1'
                },
                {
                    'indent': '+1'
                }], // outdent/indent
            [
                {
                    'direction': 'rtl'
                }], // text direction
            [
                {
                    'color': []
                },
                {
                    'background': []
                }], // dropdown with defaults from theme
            [
                {
                    'align': []
                }],
            ['clean'] // remove formatting button
        ];
        var quill = new Quill(editor,
            {
                modules:
                    {
                        toolbar: toolbarOptions
                    },
                theme: 'snow'
            });
    }
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function()
    {
        'use strict';
        window.addEventListener('load', function()
        {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form)
            {
                form.addEventListener('submit', function(event)
                {
                    if (form.checkValidity() === false)
                    {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>
<script>
    var uptarg = document.getElementById('drag-drop-area');
    if (uptarg)
    {
        var uppy = Uppy.Core().use(Uppy.Dashboard,
            {
                inline: true,
                target: uptarg,
                proudlyDisplayPoweredByUppy: false,
                theme: 'dark',
                width: 770,
                height: 210,
                plugins: ['Webcam']
            }).use(Uppy.Tus,
            {
                endpoint: 'https://master.tus.io/files/'
            });
        uppy.on('complete', (result) =>
        {
            console.log('Upload complete! We’ve uploaded these files:', result.successful)
        });
    }
</script>
<script src="dashboard/js/apps.js"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-56159088-1"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag()
    {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());
    gtag('config', 'UA-56159088-1');
</script>
</body>
</html>
