@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
@if(session()->has('error'))
    <div class="alert alert-danger">
        {{ session()->get('error') }}
    </div>
@endif
@if ($errors->any())
    <div class="alert alert-danger">
        Validation Failed!!!!
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.modal_btn').click();
        })
    </script>
@endif