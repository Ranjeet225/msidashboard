@include('vendor.common.header')
@include('vendor.common.sidebar')
<!--**********************************
 Content body start
***********************************-->
<div class="content-body">
    <div class="container-fluid">

        <div class="row">
            <div class="col-xl-12">

                
                <div class="filter cm-content-box box-primary">
                    <div class="content-title SlideToolHeader">
                        <div class="cpa">
                            </i>Password
                        </div>
                    </div>
                    <div class="cm-content-body form excerpt">
                        <div class="card-body pb-4">
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                        <form method="post" action="{{url('vendor/change-password')}}">
                            @csrf
                            <div class="col-md-6 col-x-6 col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Current Password</label>
                                    <input type="password" class="form-control" name="current_password" placeholder="***********" required>
                                </div>
                            </div>
                            <div class="col-md-6 col-x-6 col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">New Password</label>
                                    <input type="password" class="form-control" name="new_password" placeholder="***********" required>
                                </div>
                            </div>
                            <div class="col-md-6 col-x-6 col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">confirm Password</label>
                                    <input type="password" class="form-control" name="confirm_password" placeholder="***********" required>
                                </div>
                            </div>
                            <div class="col-md-6 col-x-6 col-lg-6">
                                <div class="mb-3">
                                    <input type="submit" class="btn btn-primary btn-sm" name="submit" value="Save">
                                </div>
                            </div>

                        </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--**********************************
 Content body end
***********************************-->





@include('vendor.common.footer')
