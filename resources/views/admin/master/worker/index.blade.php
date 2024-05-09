@extends('layouts.admin.app')

@section('title', 'Worker Master')

@section('css')
   
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Master Fields</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <form class="row align-items-center" enctype="multipart/form-data" onsubmit="event.preventDefault(); store_form(event);">
                    @csrf
                    <input type="hidden" name="id" value="0">
                    <input type="hidden" name="status" value="1">
                    <div class="col-md-3 form-group mb-3">
                        <h6>Worker Name <span>*</span></h6>
                        <input type="text" class="form-control" name="name" id="" placeholder="Enter Worker Name" required>
                    </div>
                    <div class="col-md-3 form-group mb-3">
                        <h6>Worker Code/ID <span>*</span></h6>
                        <input type="text" class="form-control" name="worker_code" id="" placeholder="Enter Worker Code/ID"  required>
                    </div>
                    <div class="col-md-3 form-group mb-3">
                        <h6>Worker Role <small class="text-muted">(Multiple)</small> <span>*</span></h6>
                        <select class="form-select js-example-basic-multiple" name="role[]" multiple id="" required>
                            <option value="Cutting">Cutting</option>
                            <option value="Printing/Embroidery">Printing/Embroidery</option>
                            <option value="Sewing Machine">Sewing Machine</option>
                            <option value="Overlock">Overlock</option>
                            <option value="Linking">Linking</option>
                            <option value="Kaj Button">Kaj Button</option>
                            <option value="Thread Cutting">Thread Cutting</option>
                            <option value="Press">Press</option>
                            <option value="Packing">Packing</option>
                        </select>
                    </div>
                    <div class="col-md-2 form-group mb-3">
                        <h6>Price <span>*</span></h6>
                        <input type="number" step="any" class="form-control" name="price" id="" value="{{ $worker->price ?? '' }}" required>
                    </div>
                    <div class="col-md-1 form-group pt-2">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- All Client Table Start -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex">
                    <h4 class="card-title">All Worker Master</h4>
                    {{-- <a href="#" class="btn btn-primary ms-auto" data-bs-toggle="modal" data-bs-target="#edit_modal" onclick="edit_modal(0)">Add Worker Master</a> --}}
                </div>
                    <div class="card-body" id="get_datatable">
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- All Client Table End -->
    </div>


    <div class="modal fade" id="edit_modal" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog" id="ajax_html">
            
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function(){
            get_datatable();
            $('.js-example-basic-multiple').select2();
        });
        function change_status(id){
            $('#ajax_html').html('<div class="loader-box"><div class="loader-37"></div></div>');
            $.get('{{ url('master/worker/status') }}/'+id, function(data){
                $.notify({ title:'Success', message:'Worker Master Status Changed Successfully' }, { type:'success', });
                if(data == 1){
                    $('#status_'+id).addClass('badge-success');
                    $('#status_'+id).removeClass('badge-danger');
                    $('#status_'+id).text('Active');
                }else{
                    $('#status_'+id).addClass('badge-danger');
                    $('#status_'+id).removeClass('badge-success');
                    $('#status_'+id).text('Inactive');
                }
            });
        }
        function edit_modal(id){
            $('#ajax_html').html('<div class="loader-box"><div class="loader-37"></div></div>');
            $.get('{{ url('master/worker/edit') }}/'+id, function(data){
                $('#ajax_html').html(data);
            });
        }
        function get_datatable(){
            $('#get_datatable').html('<div class="loader-box"><div class="loader-37"></div></div>');
            $.get('{{ route('master.worker.datatable') }}', function(data){
                $('#get_datatable').html(data);
            });
        }
        function store_form(event){
            var form = event.target;
            var form_data = $(form).serializeArray();
            $('#edit_modal').modal('hide');
            $.post('{{ route('master.worker.insert') }}', form_data, function(data){
                if(data != 0){
                    $.notify({ title:'Success', message:'Worker Master Saved Successfully' }, { type:'success', });
                    get_datatable();
                    $('input.form-control').val('');
                }else{
                    $.notify({ title:'Error', message:'Worker Master Name Has Already Been Added' }, { type:'danger', });
                }
            });
        }
    </script>
@endsection
