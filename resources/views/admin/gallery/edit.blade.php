@include('admin.common.header')
@include('admin.common.sidebar')
<style>
    #results {
        display: flex;
        flex-flow: wrap;
    }
</style>
<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
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
                        <h4 class="card-title">Update Image</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-validation">
                            <form action="{{route('update.gallery',[$gallery->id])}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group">
                                            <label class="form-label">Content</label>
                                            <textarea name="aboutimage" required>{{$gallery->aboutimage}}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group">
                                            <label class="form-label">Upload Image</label>
                                            <input type="file" name="images[]"  multiple class="form-control"
                                                placeholder="name" >
                                                <span class="text-danger name"></span>
                                            @error('images')
                                                {{$message}}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                    <button  type="submit" class="btn btn-primary w-25 float-end">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<script>
    CKEDITOR.replace('aboutimage');
</script>
<!--**********************************
    Content body end
***********************************-->
@include('admin.common.footer')

