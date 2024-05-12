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
                        <h4 class="card-title">All Lot No</h4>
                        <a href="#" class="btn btn-primary ms-auto col-auto" data-bs-toggle="modal" data-bs-target="#edit_modal" onclick="edit_modal(0)">Add Lot No.</a>
                    </div>
                    <div class="card-body">
                        <div class="dt-ext ">
                            <div id="datatable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                                <div class="row justify-content-between">
                                    <div class="col-sm-12 col-md-6 col-lg-auto">
                                        <div class="dataTables_length" id="datatable_length">
                                            <label>Show 
                                                <select name="datatable_length" class="form-select" id="datatable_page_show">
                                                    <option value="50">50</option>
                                                    <option value="100">100</option>
                                                    <option value="150">150</option>
                                                    <option value="200">200</option>
                                                    <option value="300  ">300</option>
                                                </select> entries
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-auto">
                                        <div class="dataTables_length" id="datatable_length">
                                            <label>Work Role (Status): 
                                                <select name="status" class="form-select" id="status">
                                                    <option value="All">All</option>
                                                    <option value="Cutting" {{ (request()->status ?? '') == 'Cutting' ? 'selected':'' }}>Cutting</option>
                                                    <option value="Printing/Embroidery" {{ (request()->status ?? '') == 'Printing/Embroidery' ? 'selected':'' }}>Printing/Embroidery</option>
                                                    <option value="Sewing Machine" {{ (request()->status ?? '') == 'Sewing Machine' ? 'selected':'' }}>Sewing Machine</option>
                                                    <option value="Overlock" {{ (request()->status ?? '') == 'Overlock' ? 'selected':'' }}>Overlock</option>
                                                    <option value="Kaj Button" {{ (request()->status ?? '') == 'Kaj Button' ? 'selected':'' }}>Kaj Button</option>
                                                    <option value="Thread Cutting" {{ (request()->status ?? '') == 'Thread Cutting' ? 'selected':'' }}>Thread Cutting</option>
                                                    <option value="Press" {{ (request()->status ?? '') == 'Press' ? 'selected':'' }}>Press</option>
                                                    <option value="Packing" {{ (request()->status ?? '') == 'Packing' ? 'selected':'' }}>Packing</option>
                                                </select>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-auto">
                                        <div id="datatable_filter" class="dataTables_filter">
                                            <label>Search:<input type="search" id="datatable_search" class="form-control form-control-sm" placeholder="" aria-controls="datatable"></label>
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
        $('#datatable_wrapper').on('change keyup' ,function(){
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
            $.get('{{ route("lot_no.datatable") }}?page='+page+'&value='+value+'&search='+search+'', { _token: "{{csrf_token() }}",status:status}, function(data){
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
                        get_datatable();
                        $('#edit_modal').modal('hide');
                        $('input.form-control').val('');
                    }else{
                        $('#error_box').show(200);
                        $('#lot_no').addClass('is-invalid');
                    }
                });
            }
            if(form_name == 'Lot Activity'){
                $.post('{{ route('lot_no.activity_insert') }}', form_data, function(data){
                    $.notify({ title:'Success', message:'Lot Activity Saved Successfully' }, { type:'success', });
                    get_datatable();
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
