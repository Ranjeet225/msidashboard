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
                    <a href="{{route('create.slider')}}"
                        class="btn btn-primary btn-sm">Add Slider</a>
                </div>
                <div class="filter cm-content-box box-primary">
                    <div class="content-title SlideToolHeader">
                        <div class="cpa">
                            <i class="fa-solid fa-file-lines me-1"></i>Slider List
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
                                            <th>Content</th>
                                            <th>Status</th>
                                            <th>Show</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 1;
                                        @endphp
                                        @if ($slider->count() > 0)
                                        @foreach ($slider as $item)
                                            <tr>
                                                <td>{{ $i }}</td>
                                                <td>{!! $item->discription !!}</td>
                                                <td>
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input flexSwitchCheckChecked" data-id="{{$item->id}}" type="checkbox" role="switch" {{ $item->status == '1' ? 'checked' : '' }}>
                                                    </div>
                                                </td>
                                                <td class="text-nowrap">
                                                    <a title="show" href="{{ route('show.slider',[$item->id]) }}" class="btn btn-warning btn-sm content-icon">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                </td>
                                                <td class="text-nowrap">
                                                    <a title="Edit" href="{{ route('edit.slider',[$item->id]) }}" class="btn btn-warning btn-sm content-icon">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                </td>
                                                <td class="text-nowrap">
                                                    <a title="Delete" href="{{ route('delete.slider',[$item->id]) }}" class="btn btn-warning btn-sm content-icon">
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
                                                <td colspan="8">Data Not Found!</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                                <div class="d-flex align-items-center justify-content-between flex-wrap">
                                    {{-- <p class="mb-2 me-3">Page 1 of 5, showing 2 records out of 8 total, starting on record 1, ending on 2</p> --}}
                                    <nav aria-label="Page navigation example mb-2">
                                        <ul class="pagination mb-2 mb-sm-0">
                                            <li class="page-item">
                                                <a class="page-link" href="{{ $slider->previousPageUrl() }}">
                                                    <i class="fa-solid fa-angle-left"></i>
                                                </a>
                                            </li>

                                            <!-- Display each page link -->
                                            @for ($i = 1; $i <= $slider->lastPage(); $i++)
                                                <li class="page-item {{ $slider->currentPage() == $i ? 'active' : '' }}">
                                                    <a class="page-link"
                                                        href="{{ $slider->url($i) }}">{{ $i }}</a>
                                                </li>
                                            @endfor

                                            <li class="page-item">
                                                <a class="page-link" href="{{ $slider->nextPageUrl() }}">
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
<script src="{{asset('admin/assets/js/jquery-3.7.1.js')}}"></script>
<script>
    $(document).ready(function(){
        $('.flexSwitchCheckChecked').change(function(){
            var isChecked = $(this).prop("checked");
            var slider_id = $(this).attr("data-id");
            var status = isChecked ? "1" : "0";
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ route('statusUpdate') }}",
                type: 'POST',
                data: { status: status, slider_id: slider_id },
                success: function(response) {
                    window.location.reload();
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    });
</script>

@include('admin.common.footer')
