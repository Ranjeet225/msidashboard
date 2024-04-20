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
                        <h4 class="card-title">Add Service</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-validation">
                            <form action="{{route('store.service')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group">
                                            <label class="form-label">Add Title</label>
                                            <input type="text" name="title"   class="form-control"
                                                placeholder="title" required>
                                                <span class="text-danger name"></span>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group">
                                            <label class="form-label">Upload Image</label>
                                            <input type="file" name="images"   class="form-control"
                                                placeholder="name" required>
                                                <span class="text-danger name"></span>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group">
                                            <label class="form-label">Discription</label>
                                            <textarea name="content" required></textarea>
                                        </div>
                                    </div>

                                </div>
                                    <button  type="submit" class="btn btn-primary w-25 float-end">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<script src="{{asset('admin/assets/js/jquery-3.7.1.js')}}"></script>
{{-- <script>
    $(document).ready(function(){
        function fetchStates(country_id) {
            $('#state').empty();
            $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
            });
            $.ajax({
                url: "{{ route('states.get') }}",
                method: 'get',
                data: {
                    country_id: country_id
                },
                success: function(data){
                    if ($.isEmptyObject(data)) {
                        $('#state').append('<option value="">No records found</option>');
                    } else {
                        $.each(data, function(key, value){
                            $('#state').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                    }
                }
            });
        }
        fetchStates($('#country').val());
        $('#country').change(function(){
            var country_id = $(this).val();
            fetchStates(country_id);
        });
    });

</script> --}}
<script>
    CKEDITOR.replace('content');
</script>
<!--**********************************
    Content body end
***********************************-->
@include('admin.common.footer')

