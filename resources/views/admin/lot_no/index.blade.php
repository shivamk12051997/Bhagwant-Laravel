@extends('layouts.admin.app')

@section('title', 'Lot No')

@section('css')
   
@endsection

@section('breadcrumb-items')
    {{-- <li class="breadcrumb-item">Lot No</li> --}}
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex">
                        <h4 class="card-title">{{ request()->page_name ?? 'All' }} Lot No</h4>
                        <a href="#" class="btn btn-primary ms-auto col-auto" data-bs-toggle="modal" data-bs-target="#edit_modal" onclick="edit_modal(0)">Add Lot No.</a>
                    </div>
                    <div class="card-body">
                        <div class="dt-ext ">
                            <div id="datatable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                                <div class="row justify-content-between">
                                    <div class="col-sm-12 col-md-6 col-lg-auto">
                                        <div class="dataTables_length" id="datatable_length">
                                            <select name="datatable_length" id="datatable_page_show">
                                                <option value="50">50 entries</option>
                                                <option value="100">100 entries</option>
                                                <option value="150">150 entries</option>
                                                <option value="200">200 entries</option>
                                                <option value="300">300 entries</option>
                                            </select> 
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-auto">
                                        <input type="number" name="lot_no_from" class="form-control form-control-sm" id="lot_no_from" placeholder="From...">
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-auto">
                                        <input type="number" name="lot_no_to" class="form-control form-control-sm" id="lot_no_to" placeholder="To...">
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-auto">
                                        <div class="dataTables_length" id="datatable_length">
                                            <select name="status"  id="status">
                                                <option value="All">All Work Role (Status)</option>
                                                <option value="Cutting" {{ (request()->status ?? '') == 'Cutting' ? 'selected':'' }}>Cutting</option>
                                                <option value="Printing/Embroidery" {{ (request()->status ?? '') == 'Printing/Embroidery' ? 'selected':'' }}>Printing/Embroidery</option>
                                                <option value="Sewing Machine" {{ (request()->status ?? '') == 'Sewing Machine' ? 'selected':'' }}>Sewing Machine</option>
                                                <option value="Overlock" {{ (request()->status ?? '') == 'Overlock' ? 'selected':'' }}>Overlock</option>
                                                <option value="Kaj Button" {{ (request()->status ?? '') == 'Kaj Button' ? 'selected':'' }}>Kaj Button</option>
                                                <option value="Thread Cutting" {{ (request()->status ?? '') == 'Thread Cutting' ? 'selected':'' }}>Thread Cutting</option>
                                                <option value="Press" {{ (request()->status ?? '') == 'Press' ? 'selected':'' }}>Press</option>
                                                <option value="Packing" {{ (request()->status ?? '') == 'Packing' ? 'selected':'' }}>Packing</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-auto">
                                        <div id="datatable_filter" class="dataTables_filter">
                                            <input type="search" id="datatable_search" class="form-control form-control-sm" placeholder="Search..." aria-controls="datatable">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12" id="get_datatable"></div>
                            </div>
                        </div>
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
        });
        $('#datatable_wrapper').on('input' ,function(){
            get_datatable();
        });
        $(document).on('click','.pages a',function(n){
            n.preventDefault();
            var page = $(this).attr('href').split("page=")[1];
            get_datatable(page);
        });
        function get_datatable(page){
            $('#get_datatable').html('<div class="loader-box"><div class="loader-37"></div></div>');
            var value = $('#datatable_page_show').val();
            var search = $('#datatable_search').val();
            var status = $('#status').val();
            var page = page ?? 1;
            var lot_no_from = $('#lot_no_from').val();
            var lot_no_to = $('#lot_no_to').val();
            var page_name = '{{ request()->page_name ?? 'All' }}';
            $.get('{{ route("lot_no.datatable") }}?page='+page+'&value='+value+'&search='+search+'', { _token: "{{csrf_token() }}",status:status, lot_no_from:lot_no_from, lot_no_to:lot_no_to, page_name:page_name}, function(data){
                $('#get_datatable').html(data);
                feather.replace();
            });
        }
        function edit_modal(id){
            $('#ajax_html').html('<div class="loader-box"><div class="loader-37"></div></div>');
            $.get('{{ url('lot_no/edit') }}/'+id, function(data){
                $('#ajax_html').removeClass();
                $('#ajax_html').addClass('modal-dialog modal-lg');
                $('#ajax_html').html(data);
            });
        }
        function store_form(event){
            var form = event.target;
            var form_data = $(form).serializeArray();
            var form_name = $('#form_name').val();
            if(form_name == 'Lot No.'){
                $.post('{{ route('lot_no.insert') }}', form_data, function(data){
                    if(data != 0){
                        $.notify({ title:'Success', message:'Lot No Saved Successfully' }, { type:'success', });
                        var current_page = $('span[aria-current="page"] span').text();
                        get_datatable(current_page);
                        $('#edit_modal').modal('hide');
                        $('input.form-control').val('');
                    }else{
                        $('#error_box').show(200);
                        $('#lot_no').addClass('is-invalid');
                        $('button[type="submit"]').removeClass('disabled',false);
                        $('button[type="submit"]').text('Save');
                    }
                });
            }
            if(form_name == 'Lot Activity'){
                $.post('{{ route('lot_no.activity_insert') }}', form_data, function(data){
                    $.notify({ title:'Success', message:'Lot Activity Saved Successfully' }, { type:'success', });
                    var lot_no_id = $('#lot_no_id').val();
                    if(data.action == 'Packing' || data.action == 'Received From Party'){
                        $('#lot_no_id_tr'+lot_no_id+' .status').html('<span class="badge badge-success">'+data.action+'</span>');
                    }else{
                        $('#lot_no_id_tr'+lot_no_id+' .status').html('<span class="btn btn-primary btn-xs" data-bs-toggle="modal" data-bs-target="#edit_modal" onclick="edit_lot_activity_modal('+data.lot_no_id+', 0)">'+data.action+'</span>');
                    }
                    $('#edit_modal').modal('hide');
                    $('input.form-control').val('');
                }); 
            }
        }
        
    </script>
    <script>
        function edit_lot_activity_modal(lot_no_id, lot_activity_id){
            $('#ajax_html').html('<div class="loader-box"><div class="loader-37"></div></div>');
            $.get('{{ url('lot_no/activity') }}',{lot_no_id:lot_no_id, lot_activity_id:lot_activity_id}, function(data){
                $('#ajax_html').removeClass();
                $('#ajax_html').addClass('modal-dialog');
                $('#ajax_html').html(data);
            });
        }
    </script>
@endsection
