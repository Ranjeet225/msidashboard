@include('admin.common.header')
@include('admin.common.sidebar')
<!--**********************************
 Content body start
***********************************-->
<div class="content-body">
    <div class="container-fluid">

        <div class="row">
            <div class="col-xl-12">

                <div class="mb-3">
                    <a href="{{route('create.country')}}"
                        class="btn btn-primary btn-sm">Add Country</a>
                </div>
                <div class="filter cm-content-box box-primary">
                    <div class="content-title SlideToolHeader">
                        <div class="cpa">
                            <i class="fa-solid fa-file-lines me-1"></i>Country List
                        </div>
                    </div>
                    <div class="cm-content-body form excerpt">
                        <div class="card-body pb-4">
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>S.No</th>
                                            <th>Country Name</th>
                                            <th>Country Code</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 1;
                                        @endphp
                                        @if ($country->count() > 0)
                                            @foreach ($country as $item)
                                                <tr>
                                                    <td>{{ $i }}</td>
                                                    <td>{{ ucfirst($item->name) }}</td>
                                                    <td>{{ ucfirst($item->country_code) }}</td>

                                                    <td class="text-nowrap">
                                                        <a title="Edit"
                                                            href="{{route('edit.country',[$item->id])}}"
                                                            class="btn btn-warning btn-sm content-icon">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                    </td>
                                                    <td class="text-nowrap">
                                                        <a title="Delete"
                                                            href="{{route('delete.country',[$item->id])}}"
                                                            class="btn btn-warning btn-sm content-icon">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                @php
                                                    $i++;
                                                @endphp
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="4">Data Not Found!</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                                <div class="d-flex align-items-center justify-content-between flex-wrap">
                                    {{-- <p class="mb-2 me-3">Page 1 of 5, showing 2 records out of 8 total, starting on record 1, ending on 2</p> --}}
                                    <nav aria-label="Page navigation example mb-2">
                                        <ul class="pagination mb-2 mb-sm-0">
                                            <li class="page-item">
                                                <a class="page-link" href="{{ $country->previousPageUrl() }}">
                                                    <i class="fa-solid fa-angle-left"></i>
                                                </a>
                                            </li>

                                            <!-- Display each page link -->
                                            @for ($i = 1; $i <= $country->lastPage(); $i++)
                                                <li class="page-item {{ $country->currentPage() == $i ? 'active' : '' }}">
                                                    <a class="page-link"
                                                        href="{{ $country->url($i) }}">{{ $i }}</a>
                                                </li>
                                            @endfor

                                            <li class="page-item">
                                                <a class="page-link" href="{{ $country->nextPageUrl() }}">
                                                    <i class="fa-solid fa-angle-right"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </nav>

                                </div>
                            </div>
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
<div class="modal fade" id="basicModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Country</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
            <div class="modal-body">
                <div id="responseMessage"></div>
                <form id="ajaxForm" method="post">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" class="form-control" name="title" placeholder="Title">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Status</label>

                        <select class="default-select  form-control wide" name="status">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                    <button id="sendmemessage" type="button" class="btn btn-primary">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>


{{-- edit modal --}}

{{-- <div class="modal fade" id="editModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Country</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
            <div class="modal-body">
                <div id="responseMessages"></div>
                <form id="ajaxupdate" method="post">
                    @csrf
                    <input type="hidden" id="id" name="id">
                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" class="form-control" name="title" placeholder="Title" id="title">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Status</label>

                        <select class="default-select  form-control wide" name="status" id="status">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                    <button id="updatedata" type="button" class="btn btn-primary">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div> --}}


<div id="DeleteModal" class="modal fade">
    <div class="modal-dialog modal-confirm">
        <div class="modal-content">
            <div class="modal-header flex-column">
                <div class="icon-box">
                    <i class="fa fa-times"></i>
                </div>
                <h4 class="modal-title w-100">Are you sure?</h4>
            </div>
            <div class="modal-body">
                <p>Do you really want to delete these records? This process cannot be undone.</p>
            </div>
            <div class="modal-footer justify-content-center">
                <button onclick="CloseModal()" type="button" class="btn btn-secondary"
                    data-dismiss="modal">Cancel</button>
                <form id="deleteForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="submit" class="btn btn-danger" value="Delete">
                </form>

            </div>
        </div>
    </div>
</div>

@include('admin.common.footer')

<script>
    $(document).ready(function() {
        $('#sendmemessage').on('click', function() {
            var formData = $('#ajaxForm').serialize();
            $.ajax({
                url: '{{ url('/admin/roles') }}',
                type: 'post',
                data: formData,
                success: function(response) {
                    $('#responseMessage').html('<span class="alert alert-success">' +
                        response.message + '</span>');
                    setTimeout(() => {
                        location.reload();
                    }, 2000);
                },
                error: function(xhr) {
                    var response = JSON.parse(xhr.responseText);
                    var errorsHtml = '<div class="alert alert-danger">';
                    $.each(response.errors, function(key, value) {
                        errorsHtml += '<span>' + value + '</span>';
                    });
                    errorsHtml += '</div>';
                    $('#responseMessage').html(errorsHtml);
                }
            });
        });


        $('#updatedata').on('click', function() {
            var formData = $('#ajaxupdate').serialize();
            var id = $("#id").val();
            $.ajax({
                url: '{{ url('/admin/roles') }}/' + id,
                type: 'put',
                data: formData,
                success: function(response) {
                    $('#responseMessages').html('<span class="alert alert-success">' +
                        response.message + '</span>');
                    setTimeout(() => {
                        location.reload();
                    }, 2000);
                },
                error: function(xhr) {
                    var response = JSON.parse(xhr.responseText);
                    var errorsHtml = '<div class="alert alert-danger">';
                    $.each(response.errors, function(key, value) {
                        errorsHtml += '<span>' + value + '</span>';
                    });
                    errorsHtml += '</div>';
                    $('#responseMessages').html(errorsHtml);
                }
            });
        });
    });

    function EditRoles(id) {
        $.ajax({
            method: "GET",
            url: "{{ url('/admin/roles') }}/" + id + "/edit",
            success: function(res) {
                if (res.status == true) {
                    $('#editModal').modal('show');
                    var data = res.data;
                    $('#id').val(data.id);
                    $('#title').val(data.title);
                    $('#status').val(data.status);
                } else {
                    console.error("Server returned an error:", response);
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    }

    function DeleteData(id) {
        $("#deleteid").val(id);
        var url = "{{ url('/admin/roles/') }}" + '/' + id;
        $('#deleteForm').attr('action', url);
        $('#DeleteModal').modal('show');
    }

    function CloseModal() {
        $('#DeleteModal').modal('hide');
    }
</script>
