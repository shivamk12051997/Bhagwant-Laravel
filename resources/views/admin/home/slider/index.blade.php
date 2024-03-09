@extends('layouts.admin.app')

@section('title', 'Home Slider')

@section('css')
   
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Home Sections</li>
@endsection

@section('content')
    <div class="container-fluid">
        <!-- All Client Table Start -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex">
                    <h4 class="card-title">All Sliders</h4>
                    <a href="#" class="btn btn-primary ms-auto" data-bs-toggle="modal" data-bs-target="#add_model">Add Slider</a>
                </div>
                    <div class="card-body">
                        <div class="dt-ext table-responsive">
                            <table class="display" id="responsive">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Upper Title</th>
                                        <th>Middle Title</th>
                                        <th>Bottom Title</th>
                                        <th>Button Title</th>
                                        <th>Button Link</th>
                                        <th>Slider Image</th>
                                        <th>Status</th>
                                        <th>Options</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($slider as $key => $item)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $item->upper_title ?? 'N/A' }}</td>
                                        <td>{{ $item->middle_title ?? 'N/A' }}</td>
                                        <td>{{ $item->bottom_title ?? 'N/A' }}</td>
                                        <td>{{ $item->btn_title ?? 'N/A' }}</td>
                                        <td><a href="{{ url($item->btn_link) }}" target="_blank">{{ $item->btn_link ?? 'N/A' }}</a></td>
                                        <td><a href="{{ url($item->img ?? '#') }}" target="_blank"><img src="{{ asset($item->img ?? '#') }}" alt="" width="100px"></a></td>
                                        <td>
                                            <span class="badge badge-{{ $item->status == '1' ? 'success':'danger' }}">{{ $item->status == '1' ? 'Active':'Inactive' }}</span>
                                        </td>
                                        <td>
                                            <a href="#" class="text-warning p-1 f-22" data-bs-toggle="modal" data-bs-target="#edit_model" onclick="edit_modal({{ $item->id }})" data-toggle="tooltip" title="Edit">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            
                                            <a id="Delete-{{$item->id}}" class="text-danger pointer p-1 f-22" data-toggle="tooltip" title="Delete">
                                                <i class="fa fa-trash-o"></i>
                                            </a>
                                            <script>
                                                $('#Delete-{{$item->id}}').click(function(){
                                                    swal({
                                                        title: "Are you sure?",
                                                        text: "You won't be able to revert this!",
                                                        icon: "warning",
                                                        buttons: true,
                                                        dangerMode: true,
                                                    })
                                                    .then((willDelete) => {
                                                        if (willDelete) {
                                                            window.location.href = "{{ route('home.slider.delete',$item->id)}}";
                                                        }
                                                    })
                                                });
                                            </script>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- All Client Table End -->
    </div>

    <div class="modal fade" id="add_model" tabindex="-1" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form action="{{ route('home.slider.insert') }}" method="post" class="modal-content" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" id="id" value="">
                <div class="modal-header">
                    <h4 class="modal-title" id="mySmallModalLabel">Add Slider</h4>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close" data-bs-original-title="" title=""></button>
                </div>
                <div class="modal-body dark-modal">
                    <div class="row">
                        <div class="col-md-6 form-group mb-3">
                            <h6>Upper Title</h6>
                            <input type="text" class="form-control" name="upper_title" id="">
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <h6>Middle Title <span>*</span></h6>
                            <input type="text" class="form-control" name="middle_title" id="" required>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <h6>Bottom Title</h6>
                            <input type="text" class="form-control" name="bottom_title" id="">
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <h6>Button Title <span>*</span></h6>
                            <input type="text" class="form-control" name="btn_title" id="" required>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <h6>Button Link</h6>
                            <input type="text" class="form-control" name="btn_link" id="">
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <h6>Slider Image <span>*</span></h6>
                            <input type="file" class="form-control" name="img" id="" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <h6>Status <span>*</span></h6>
                            <label class="switch">
                                <input type="checkbox"  name="status" value="1" checked><span class="switch-state"></span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer text-end">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade" id="edit_model" tabindex="-1" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form action="{{ route('home.slider.insert') }}" method="post" class="modal-content" id="edit_from" enctype="multipart/form-data">
                
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function edit_modal(id){
            $.get('{{ url('home/slider/edit') }}/'+id, function(data){
                $('#edit_from').html(data);
            });
        }
    </script>
@endsection
