@extends('layouts.admin.app')

@section('title', 'Master Lot')

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
                    <h4 class="card-title">All Master Lots</h4>
                    <a href="#" class="btn btn-primary ms-auto" data-bs-toggle="modal" data-bs-target="#edit_modal" onclick="edit_modal(0)">Add Master Lot</a>
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
        function edit_modal(id){
            $('#ajax_html').html('<div class="loader-box"><div class="loader-37"></div></div>');
            $.get('{{ url('master/master_lot/edit') }}/'+id, function(data){
                $('#ajax_html').removeClass();
                $('#ajax_html').addClass('modal-dialog modal-xl');
                $('#ajax_html').html(data);
            });
        }
        function get_datatable(){
            $('#get_datatable').html('<div class="loader-box"><div class="loader-37"></div></div>');
            $.get('{{ route('master.master_lot.datatable') }}', function(data){
                $('#get_datatable').html(data);
            });
        }
        function store_form(event){
            var form = event.target;
            var form_data = $(form).serializeArray();
            $.post('{{ route('master.master_lot.insert') }}', form_data, function(data){
                if(data != 0){
                    $('#edit_modal').modal('hide');
                    $.notify({ title:'Success', message:'Master Lot Saved Successfully' }, { type:'success', });
                    get_datatable();
                    $('input.form-control').val('');
                }else{
                    $.notify({ title:'Error', message:'Master Lot Number Has Already Been Added' }, { type:'danger', });
                }
            });
        }
    </script>
@endsection
