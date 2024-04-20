@include('admin.common.header')
@include('admin.common.sidebar')
<style>
    #results {
        display: flex;
        flex-flow: wrap;
    }
</style>
<!--**********************************
    Content body start
***********************************-->
<div class="content-body">
    <div class="container-fluid">
        {{-- <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Form</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Validation</a></li>
            </ol>
        </div> --}}
        <!-- row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <span id="responseMessage" class="pd-4"></span>
                    <div class="card-header">
                        <h4 class="card-title">Add Country</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-validation">
                            <form action="{{route('update.country',[$country->id])}}" method="put">
                                @csrf
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group">
                                            <label class="form-label">Country name</label>
                                            <input type="text" name="name" class="form-control"
                                                placeholder="name" value="{{$country->name}}" required>
                                                <span class="text-danger name"></span>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group">
                                            <label class="form-label">Country Slug</label>
                                            <input type="text" name="slug" class="form-control"
                                                placeholder="slug" value="{{$country->slug}}" required>
                                                <span class="text-danger slug"></span>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group">
                                            <label class="form-label">Country code</label>
                                            <input type="text" name="country_code" max="4445" class="form-control"
                                                placeholder="country_code" value="{{$country->country_code}}" required>
                                                <span class="text-danger country_code"></span>
                                        </div>
                                    </div>
                                </div>
                                    <button  type="submit" class="btn btn-primary w-25 float-right">Save</button>
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
@include('admin.common.footer')

