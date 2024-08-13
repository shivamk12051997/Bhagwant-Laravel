@extends('layouts.admin.app')

@section('title', 'Material Challan')

@section('css')
   
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Master Fields</li>
@endsection

@section('content')
    <div class="container-fluid">
        <!-- All Client Table Start -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex">
                        <h4 class="card-title">All Material Challan</h4>
                        <a href="#" class="btn btn-primary ms-auto" data-bs-toggle="modal" data-bs-target="#edit_modal" onclick="edit_modal(0)">Add Material Challan</a>
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
                                                    <option value="300">300</option>
                                                </select> entries
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-auto">
                                        <div class="dataTables_length" id="datatable_length">
                                            <label>From Date:  
                                                <input type="date" name="from_date" class="form-control" id="from_date" value="">
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-auto">
                                        <div class="dataTables_length" id="datatable_length">
                                            <label>To Date:  
                                                <input type="date" name="to_date" class="form-control" id="to_date" value="">
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-auto">
                                        <div id="datatable_filter" class="dataTables_filter">
                                            <label>Search:<input type="search" id="datatable_search" class="form-control form-control-sm" placeholder="" aria-controls="datatable"></label>
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
            var from_date = $('#from_date').val();
            var to_date = $('#to_date').val();
            var page = page ?? 1;
            $.get('{{ route("material_challan.datatable") }}?page='+page+'&value='+value+'&search='+search+'', { from_date:from_date, to_date:to_date }, function(data){
                $('#get_datatable').html(data);
                feather.replace();
            });
        }
        function edit_modal(id){
            $('#ajax_html').html('<div class="loader-box"><div class="loader-37"></div></div>');
            $.get('{{ url('material_challan/edit') }}/'+id, function(data){
                $('#ajax_html').removeClass();
                $('#ajax_html').addClass('modal-dialog modal-lg');
                $('#ajax_html').html(data);
            });
        }
        function store_form(event){
            var form = event.target;
            var form_data = $(form).serializeArray();
            $('#edit_modal').modal('hide');
            $.post('{{ route('material_challan.insert') }}', form_data, function(data){
                if(data != 0){
                    $.notify({ title:'Success', message:'Material Challan Saved Successfully' }, { type:'success', });
                    get_datatable();
                    $('input.form-control').val('');
                }else{
                    $.notify({ title:'Error', message:'Material Challan Name Has Already Been Added' }, { type:'danger', });
                }
            });
        }
    </script>
@endsection
