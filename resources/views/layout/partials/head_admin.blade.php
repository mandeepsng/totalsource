<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        @if(!Route::is(['appointment-list','blog','specialities','doctor-list','patient-list','reviews','transactions-list','settings','invoice-report','profile','login','register','forgot-password','lock-screen','error-404','error-500','blank-page','components','form-basic','form-inputs','form-horizontal','form-vertical','form-mask','form-validation','tables-basic','data-tables','invoice','calendar','blog-details','edit-blog','product-list','pharmacy-list']))
        <title>Totally Outsourcing - Dashboard</title>
        @endif
        @if(Route::is(['appointment-list']))
        <title>Totally Outsourcing - Appointment List Page</title>
        @endif
        @if(Route::is(['specialities']))
        <title>Totally Outsourcing - Specialities Page</title>
		@endif
        @if(Route::is(['doctor-list']))
        <title>Totally Outsourcing - Doctor List Page</title>
        @endif
        @if(Route::is(['patient-list']))
        <title>Totally Outsourcing - Patient List Page</title>
        @endif
        @if(Route::is(['reviews']))
        <title>Totally Outsourcing - Reviews Page</title>
        @endif
        @if(Route::is(['transactions-list']))
        <title>Totally Outsourcing - Transactions List Page</title>
        @endif
        @if(Route::is(['settings']))
        <title>Totally Outsourcing - Settings Page</title>
        @endif
        @if(Route::is(['invoice-report']))
        <title>Totally Outsourcing - Invoice Report Page</title>
        @endif
        @if(Route::is(['profile']))
        <title>Totally Outsourcing - Profile</title>
        @endif
        @if(Route::is(['login']))
        <title>Totally Outsourcing - Login</title>
		@endif
        @if(Route::is(['register']))
        <title>Totally Outsourcing - Register</title>
        @endif
        @if(Route::is(['forgot-password']))
        <title>Totally Outsourcing - Forgot Password</title>
        @endif
        @if(Route::is(['lock-screen']))
        <title>Totally Outsourcing - Lock Screen</title>
        @endif
        @if(Route::is(['error-404']))
        <title>Totally Outsourcing - Error 404</title>
		@endif
        @if(Route::is(['error-500']))
        <title>Totally Outsourcing - Error 500</title>
		@endif
        @if(Route::is(['blank-page']))
        <title>Totally Outsourcing - Blank Page</title>
        @endif
        @if(Route::is(['components']))
        <title>Totally Outsourcing - Components</title>
        @endif
        @if(Route::is(['form-basic']))
        <title>Totally Outsourcing - Basic Inputs</title>
        @endif
        @if(Route::is(['form-inputs']))
        <title>Totally Outsourcing - Form Input Groups</title>
        @endif
        @if(Route::is(['form-horizontal']))
        <title>Totally Outsourcing - Horizontal Form</title>
        @endif
        @if(Route::is(['form-vertical']))
        <title>Totally Outsourcing - Vertical Form</title>
        @endif
        @if(Route::is(['form-mask']))
        <title>Totally Outsourcing - Form Mask</title>
        @endif
        @if(Route::is(['form-validation']))
        <title>Totally Outsourcing - Form Validation</title>
        @endif
        @if(Route::is(['tables-basic']))
        <title>Totally Outsourcing - Tables Basic</title>
        @endif
        @if(Route::is(['data-tables']))
        <title>Totally Outsourcing - Data Tables</title>
        @endif
        @if(Route::is(['invoice']))
        <title>Totally Outsourcing - Invoice</title>
        @endif
        @if(Route::is(['calendar']))
        <title>Totally Outsourcing - Calendar</title>
        @endif
        @if(Route::is(['blog','blog-details']))
        <title>Totally Outsourcing - Blog Page</title>
        @endif
        @if(Route::is(['add-blog']))
        <title>Totally Outsourcing - Add Blog Page</title>
		@endif
        @if(Route::is(['edit-blog']))
        <title>Totally Outsourcing - Edit Blog Page</title>
        @endif
        @if(Route::is(['product-list']))
        <title>Totally Outsourcing - Product List Page</title>
        @endif
        @if(Route::is(['pharmacy-list']))
        <title>Totally Outsourcing - Pharmacy List Page</title>
        @endif
		<!-- Favicon -->
        @if(Route::is(['pending-blog']))

            title>Totally Outsourcing - Pending Blog Page</title>
            @endif
            <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets_admin/img/favicon.svg')}}">
		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{asset('assets_admin/css/bootstrap.min.css')}}">

		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="{{asset('assets_admin/css/font-awesome.min.css')}}">
        <!-- <link rel="stylesheet" href="{{asset('assets_admin/plugins/fontawesome/css/font-awesome.min.css')}}"> -->
        @if(Route::is(['blog','blog-details','add-blog','edit-blog','pending-blog']))
        <link rel="stylesheet" href="{{asset('assets_admin/plugins/fontawesome/css/all.min.css')}}">
		@endif
		<!-- Feathericon CSS -->
        <link rel="stylesheet" href="{{asset('assets_admin/css/feathericon.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets_admin/plugins/morris/morris.css')}}">
        <!-- Select2 CSS -->
		<link rel="stylesheet" href="{{asset('assets_admin/css/select2.min.css')}}">
        	<!-- Datetimepicker CSS -->
		<link rel="stylesheet" href="{{asset('assets_admin/css/bootstrap-datetimepicker.min.css')}}">

		<!-- Full Calander CSS -->
        <link rel="stylesheet" href="{{asset('assets_admin/plugins/fullcalendar/fullcalendar.min.css')}}">
        <!-- Datatables CSS -->
		<link rel="stylesheet" href="{{asset('assets_admin/plugins/datatables/datatables.min.css')}}">

		<!-- <link rel="stylesheet" href="assets/plugins/morris/morris.css"> -->

		<!-- Main CSS -->
        <link rel="stylesheet" href="{{asset('assets_admin/css/style.css')}}">
