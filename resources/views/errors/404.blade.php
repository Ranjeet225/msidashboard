<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
	<!-- Title -->
	<title>404</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset("admin")}}/assets/images/favicon.png">
    <link href="{{asset("admin")}}/assets/css/style.css" rel="stylesheet">
	
</head>

<div class="fix-wrapper">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-5">
                    <div class="form-input-content text-center error-page">
                        <h1 class="error-text font-weight-bold">400</h1>
                        <h4><i class="fa fa-thumbs-down text-danger"></i> Bad Request</h4>
                        <p>Your Request resulted in an error</p>
						<div>
                            <a class="btn btn-primary" href="{{url('admin/login')}}">Back to Home</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!--**********************************
	Scripts
***********************************-->
<!-- Required vendors -->
<script src="{{asset("admin")}}/assets/vendor/global/global.min.js"></script>
<script src="{{asset("admin")}}/assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
<script src="{{asset("admin")}}/assets/js/custom.min.js"></script>
<script src="{{asset("admin")}}/assets/js/deznav-init.js"></script>
</body>
</html>