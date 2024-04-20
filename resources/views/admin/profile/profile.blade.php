@include('admin.common.header')
@include('admin.common.sidebar')
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
                        <button href="" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#AdminAddModal">Add</button>
                    </div>
                    <div class="cm-content-body form excerpt">
                        <div class="card-body pb-4">
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                        <form method="post" action="{{url('admin/admin-change-password')}}">
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
                    <div class="col-xl-12">
                        <div class="table-responsive fs-14">
                            <table class="table display mb-4 dataTablesCard overflow-hidden card-table" id="example5">
                                <thead>
                                    <tr>

                                        <th>Sr No.</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th class="text-end">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @if($admin->count() > 0)
                                  @foreach($admin as $itemAdmin)
                                    <tr>

                                        <td>{{++$i}}</td>
                                        {{-- <td>
                                            @if($itemAdmin->created_at)
                                                {{$itemAdmin->created_at->format('Y-m-d H:i:s')}}
                                            @endif
                                        </td> --}}
                                        <td>{{$itemAdmin->name}}</td>
                                        <td>{{$itemAdmin->email}}</td>
                                        @if($itemAdmin->status==1)
                                          <td><span class="text-success">Active</span></td>
                                        @else
                                          <td><span class="text-warning">Inactive</span></td>
                                        @endif

                                        <td class="text-end">
                                            <div class="dropdown ms-auto">

                                                <div class="btn-link" data-bs-toggle="dropdown" >
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M11.0005 12C11.0005 12.5523 11.4482 13 12.0005 13C12.5528 13 13.0005 12.5523 13.0005 12C13.0005 11.4477 12.5528 11 12.0005 11C11.4482 11 11.0005 11.4477 11.0005 12Z" stroke="#3E4954" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path d="M18.0005 12C18.0005 12.5523 18.4482 13 19.0005 13C19.5528 13 20.0005 12.5523 20.0005 12C20.0005 11.4477 19.5528 11 19.0005 11C18.4482 11 18.0005 11.4477 18.0005 12Z" stroke="#3E4954" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path d="M4.00049 12C4.00049 12.5523 4.4482 13 5.00049 13C5.55277 13 6.00049 12.5523 6.00049 12C6.00049 11.4477 5.55277 11 5.00049 11C4.4482 11 4.00049 11.4477 4.00049 12Z" stroke="#3E4954" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    </svg>
                                                </div>

                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a  class="dropdown-item text-black" href="javascript:void(0);" onclick="EditAdmin({{ $itemAdmin->id }})">Edit</a>
                                                    <a class="dropdown-item text-black" href="javascript:void(0);" onclick="DeleteData({{ $itemAdmin->id }})">Delete</a>
                                                </div>

                                            </div>
                                        </td>
                                    </tr>
                                  @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>








                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="AdminAddModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Admin</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
            <div class="modal-body">
                <div id="responseMessage"></div>
                <form id="ajaxForm" method="post">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" placeholder=" name">
                        <span class="text-danger" id="name"></span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="email">
                        <span class="text-danger" id="email"></span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="password">
                        <span class="text-danger" id="password"></span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select class="default-select  form-control wide" name="status" id="status">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                        <span class="text-danger" id="status"></span>
                    </div>
                    <button id="sendmemessage" type="button" class="btn btn-primary">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="AdminEditModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Admin</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
            <div class="modal-body">
                <div id="responseMessagess"></div>
                <form id="ajaxupdate" method="post">
                    @csrf
                    <input type="hidden" name="id" id="id">
                    <div class="mb-3">
                        <label class="form-label">First Name</label>
                        <input type="text" class="form-control" name="name" placeholder="name" id="name">
                        <span class="text-danger" id="names"></span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="email" id="emails">
                        <span class="text-danger" id="emails"></span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="password">
                        <span class="text-danger" id="passwords"></span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select class="default  form-control wide" name="status" id="statuss" >
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                        <span class="text-danger" id="statusss"></span>
                    </div>
                    <button id="updatedata" type="button" class="btn btn-primary">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!--**********************************
 Content body end
***********************************-->

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
                <form id="deleteForm" method="get">
                    @csrf
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
                url: '{{ url("/admin/create-admin") }}',
                type: 'post',
                data: formData,
                success: function(response) {
                    $("#email").html("");
                    $("#name").html("");
                    $("#password").html("");
                    $("#status").html("");
                    $('#responseMessage').html('<span class="alert alert-success">' +
                        response.message + '</span>');
                    setTimeout(() => {
                        location.reload();
                    }, 2000);
                },
                error: function(xhr) {
                    var response = JSON.parse(xhr.responseText);
                    $("#email").html(response.errors.email);
                    $("#name").html(response.errors.name);
                    $("#last_name").html(response.errors.last_name);
                    $("#password").html(response.errors.password);
                    $("#status").html(response.errors.status);

                }
            });
        });
    });


    $('#updatedata').on('click', function() {
            var formData = $('#ajaxupdate').serialize();
            var id = $("#id").val();
            $.ajax({
                url: '{{ url('/admin/update-admin') }}/',
                type: 'post',
                data: formData,
                success: function(response) {
                    $('#responseMessagess').html('<span class="alert alert-success">' +
                        response.message + '</span>');
                    setTimeout(() => {
                        location.reload();
                    }, 2000);
                },
                error: function(xhr) {
                    $("#emails").html(response.errors.email);
                    $("#names").html(response.errors.name);
                    $("#passwords").html(response.errors.password);
                    $("#statuss").html(parseInt(response.errors.status));
                    // var response = JSON.parse(xhr.responseText);
                    // var errorsHtml = '<div class="alert alert-danger">';
                    // $.each(response.errors, function(key, value) {
                    //     errorsHtml += '<span>' + value + '</span>';
                    // });
                    // errorsHtml += '</div>';
                    // $('#responseMessages').html(errorsHtml);
                }
            });
    });

    function EditAdmin(id){
        $.ajax({
            method: "GET",
            url: "{{ url('/admin/edit-admin') }}/"+id ,
            success: function(res) {
                if (res.status == true) {
                    $('#AdminEditModal').modal('show');
                    var data = res.data;
                    $('#id').val(data.id);
                    $('#statuss').val(data.status);
                    $('#name').val(data.name);
                    $('#emails').val(data.email);
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
        var url = "{{ url('/admin/admindelete/') }}" + '/' + id;
        $('#deleteForm').attr('action', url);
        $('#DeleteModal').modal('show');
    }

    function CloseModal() {
        $('#DeleteModal').modal('hide');
    }
</script>
