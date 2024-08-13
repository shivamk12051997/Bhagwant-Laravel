@extends('layouts.admin.app')

@section('title', 'Color')

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
                    <div class="col-md-10 form-group mb-3">
                        <h6>Color Name <span>*</span></h6>
                        <input type="text" class="form-control" name="name" id="" placeholder="Enter Color Name" required>
                    </div>
                    <div class="col-auto form-group pt-2">
                        <button type="submit" class="btn btn-primary">Add Color</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- All Client Table Start -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex">
                    <h4 class="card-title">All Color</h4>
                    {{-- <a href="#" class="btn btn-primary ms-auto" data-bs-toggle="modal" data-bs-target="#edit_modal" onclick="edit_modal(0)">Add Color</a> --}}
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
        });
        function change_status(id){
            $('#ajax_html').html('<div class="loader-box"><div class="loader-37"></div></div>');
            $.get('{{ url('master/color/status') }}/'+id, function(data){
                $.notify({ title:'Success', message:'Color Status Changed Successfully' }, { type:'success', });
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
        
        function get_datatable(){
            $('#get_datatable').html('<div class="loader-box"><div class="loader-37"></div></div>');
            $.get('{{ route('master.color.datatable') }}', function(data){
                $('#get_datatable').html(data);
            });
        }
        function edit_modal(id){
            $('#ajax_html').html('<div class="loader-box"><div class="loader-37"></div></div>');
            $.get('{{ url('master/color/edit') }}/'+id, function(data){
                $('#ajax_html').html(data);
            });
        }
        function store_form(event){
            var form = event.target;
            var form_data = $(form).serializeArray();
            $('#edit_modal').modal('hide');
            $.post('{{ route('master.color.insert') }}', form_data, function(data){
                if(data != 0){
                    $.notify({ title:'Success', message:'Color Saved Successfully' }, { type:'success', });
                    get_datatable();
                    $('input.form-control').val('');
                }else{
                    $.notify({ title:'Error', message:'Color Name Has Already Been Added' }, { type:'danger', });
                }
            });
        }
    </script>
@endsection
