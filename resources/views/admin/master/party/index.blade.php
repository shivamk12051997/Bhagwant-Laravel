@extends('layouts.admin.app')

@section('title', 'Party')

@section('css')
   
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Master Fields</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <form class="row align-items-center" action="{{ route('master.party.insert') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="0">
                    <input type="hidden" name="status" value="1">
                    <div class="col-md-4 form-group mb-3">
                        <h6>Party Name <span>*</span></h6>
                        <input type="text" class="form-control" name="name" id="" placeholder="Enter Party Name" required>
                    </div>
                    <div class="col-md-4 form-group mb-3">
                        <h6>Phone Number <span>*</span></h6>
                        <input type="text" class="form-control" name="phone" id="" placeholder="Enter Phone Number"  required>
                    </div>
                    <div class="col-md-2 form-group mb-3">
                        <h6>Price <span>*</span></h6>
                        <input type="number" step="any" class="form-control" name="price" id="" value="{{ $party->price ?? '' }}" required>
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
                    <h4 class="card-title">All Party</h4>
                    {{-- <a href="#" class="btn btn-primary ms-auto" data-bs-toggle="modal" data-bs-target="#edit_modal" onclick="edit_modal(0)">Add Party</a> --}}
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
            $.get('{{ url('master/party/status') }}/'+id, function(data){
                $.notify({ title:'Success', message:'Party Status Changed Successfully' }, { type:'success', });
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
            $.get('{{ url('master/party/edit') }}/'+id, function(data){
                $('#ajax_html').html(data);
            });
        }
        function get_datatable(){
            $('#get_datatable').html('<div class="loader-box"><div class="loader-37"></div></div>');
            $.get('{{ route('master.party.datatable') }}', function(data){
                $('#get_datatable').html(data);
            });
        }

        $(document).on('submit','form',function(event){
            event.preventDefault();
            var form = event.target;
            var form_data = new FormData(form);
            $.ajax({
                url: $(event.target).attr('action'),
                type: 'POST',
                data: form_data,
                processData: false,
                contentType: false,
                success: function(data){
                    if((data.id ?? '') != ''){
                        $.notify({ title:'Success', message:data.message }, { type:'success', });
                        get_datatable();
                        $('#edit_modal').modal('hide');
                        $('form button[type="submit"]').html('Save');
                        $('form button[type="submit"]').removeClass('disabled');
                    }else{
                        $.notify({ title:'Error', message:data }, { type:'danger', });
                        $('form button[type="submit"]').html('Save');
                        $('form button[type="submit"]').removeClass('disabled');
                    }
                }
            });
        });
        // function store_form(event){
        //     var form = event.target;
        //     var form_data = $(form).serializeArray();
        //     $('#edit_modal').modal('hide');
        //     $.post('{{ route('master.party.insert') }}', form_data, function(data){
        //         if(data != 0){
        //             $.notify({ title:'Success', message:'Party Saved Successfully' }, { type:'success', });
        //             get_datatable();
        //             $('input.form-control').val('');
        //         }else{
        //             $.notify({ title:'Error', message:'Party Name Has Already Been Added' }, { type:'danger', });
        //         }
        //     });
        // }
    </script>
@endsection
