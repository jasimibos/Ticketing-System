<!DOCTYPE html>
<html lang="en">
    @include('layouts.header')
    <body class="sb-nav-fixed">

        @include('layouts.navbar')
        
        <div id="layoutSidenav">
            @include('layouts.sidebar')

	        <div id="layoutSidenav_content">

	            @yield('main_section')

		        @include('layouts.footer')
		        
	    	</div>
        </div>

        @include('layouts.script')

    </body>
</html>
