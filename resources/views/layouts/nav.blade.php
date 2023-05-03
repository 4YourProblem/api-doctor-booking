<!DOCTYPE html>
<html lang="en">

<head>
    <title>ADMIN</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="Phoenixcoded" />

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body class="">
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    <nav class="pcoded-navbar  ">
        <div class="navbar-wrapper  ">
            <div class="navbar-content scroll-div ">
                <div class="main-menu-header">
                    <div class="user-details">
                        <span>ADMIN</span>
                    </div>
                </div>
                <ul class="nav pcoded-inner-navbar ">
                    <li class="nav-item pcoded-menu-caption">
                        <label>Management</label>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('user') }}" class="nav-link "><span class="pcoded-micon"></span><span
                                class="pcoded-mtext">Users</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('doctor') }}" class="nav-link "><span class="pcoded-micon"></span><span
                                class="pcoded-mtext">Doctors</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('patient') }}" class="nav-link "><span class="pcoded-micon"></span><span
                                class="pcoded-mtext">Patients</span></a>
                    </li>

                    <li class="nav-item pcoded-menu-caption">
                        <label>Doctor Requests</label>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('doctor.request') }}" class="nav-link "><span
                                class="pcoded-micon"></span><span class="pcoded-mtext">Approve Doctor</span></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="pcoded-main-container">
    </div>
    <script src="{{ asset('js/vendor-all.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/pcoded.min.js') }}"></script>
</body>

</html>
