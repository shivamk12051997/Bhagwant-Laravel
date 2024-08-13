@extends('layouts.admin.app')

@section('title', 'Party Salary - '.($party->name ?? 'N/A'))

@section('breadcrumb-items')
    <li class="breadcrumb-item active">Party Salary</li>
@endsection

@section('css')
<style>
  table.dataTable input.form-check-input{
    height: 1em;
    border: 1px solid #0000005a;
  }
</style>
@endsection

@section('content')

<div class="container-fluid">
    <div class="email-wrap bookmark-wrap">
      <div class="row">
        <div class="col-xl-3 box-col-6">
            <div class="card">
              <div class="card-body">
                <div class="text-center">
                  <div class="media-size-email mb-3"><img class="me-3 rounded-circle" src="{{ asset('user.png') }}" alt="" width="80px"></div>
                  <h5>{{ $party->name ?? 'N/A' }} <br> <small class="text-muted">({{ $party->party_code ?? 'N/A' }})</small></h5>
                  
                  <span class="badge badge-{{ ($party->status ?? '') == 1 ? 'success':'danger' }}">{{ ($party->status ?? '') == 1 ? 'Active':'Inactive' }}</span>
                </div>
                <hr>
                <ul>
                  {{-- @php
                    $totalQty = 0;
                    $totalEarnings = 0;
                    foreach ($party->lot_activities as $activity) {
                        $qty = optional($activity->lot_no)->pcs ?? 0;
                        $totalQty += $qty;
                        $totalEarnings += $qty * $activity->price;
                    }
                  @endphp --}}
                  <li><b>Total QTY:</b> {{ $total_pcs = $party->lot_activities()->whereDate('created_at','>=',($request->from_date ?? date('Y-m-d', strtotime('-1 month'))))->whereDate('created_at','<=',($request->to_date ?? date('Y-m-d')))->sum('pcs') ?? 0 }}</li>
                  <li><b>Total Earning:</b> {{ $total_earnings = ($lot_activity->where('action','Received From Party')->sum('total_earning') ?? 0) + ($lot_activity_with_trashed->where('action','Received From Party')->sum('total_earning') ?? 0) }}</li>
                  <li><b>Paid Amount:</b> {{ $total_paid_amount = ($payment_history->sum('amount') ?? 0) }}</li>
                  <li><b>Material Amount:</b> {{ $total_material_amount = ($material_challan->sum('total_price') ?? 0) }}</li>
                  <li><b>Balance Amount:</b> {{ $balance =  $total_earnings - ($total_paid_amount + $total_material_amount) }}</li>
                  {{-- <li><b>Phone Number:</b> {{ $party->phone ?? 'N/A' }}</li> --}}
                </ul>
              </div>
            </div>
        </div>
        <div class="col-xl-9 col-md-12 box-col-12">
          <div class="card">
            <form class="card-header d-flex justify-content-between align-items-end" action="" method="GET">
              <h4 class="mb-0">Salary Details</h4>
              <div class="form-group">
                <label for="from">From Date</label>
                <input type="date" name="from_date" id="" value="{{ $request->from_date ?? date('Y-m-d', strtotime('-1 month')) }}" class="form-control">
              </div>
              <div class="form-group">
                <label for="to">To Date</label>
                <input type="date" name="to_date" id="" value="{{ $request->to_date ?? date('Y-m-d') }}" class="form-control">
              </div>
              <div class="form-group">
                <button class="btn btn-primary" id="filter">Get Data</button>
              </div>
            </form>
            <div class="card-body dark-timeline">
              <div class="dt-ext table-responsive">
                <table class="table table-striped table-hover Datatable nowrap" id="datatable-excel">
                    <thead>
                        <tr>
                          <th>#</th>
                          <th>Is Received?</th>
                          <th>Challan No.</th>
                          <th>Lot No.</th>
                          <th>Date</th>
                          <th>PCS</th>
                          <th>Per Price</th>
                          <th>Total Earn</th>
                          <th>Size</th>
                          <th>Color</th>
                          <th>Created Date</th>
                        </tr>
                    </thead>
                    <tbody>
                      @forelse ($lot_activity as $item)
                        <tr>
                          <td>{{ $loop->index + 1 }}</td>
                          <td>
                            <span class="badge badge-{{ $item->lot_no->is_complete == '1' ? 'success':'danger' }}" >{{ $item->lot_no->is_complete == '1' ? 'Received':'Not Received' }}</span>
                          </td>
                          <td><a href="{{route('challan.show',$item->challan_out_id)}}" target="_blank">{{ $item->challan_out->challan_no ?? 'N/A' }}</a></td>
                          <td><a href="{{route('lot_no.show',$item->lot_no->id)}}" target="_blank">{{ $item->lot_no->lot_no ?? 'N/A' }}</a></td>
                          <td>{{ ($item->date ?? '') == '' ? "N/A" : date('d M,Y',strtotime($item->date)) }}</td>
                          <td>{{ $item->pcs ?? 'N/A' }}</td>
                          <td>{{ $item->price ?? 'N/A' }}</td>
                          <td>{{ $item->total_earning ?? 'N/A' }}</td>
                          <td>{{ $item->lot_no->size->name ?? 'N/A' }}</td>
                          <td>{{ $item->lot_no->color->name ?? 'N/A' }}</td>
                          <td>{{ date('d M,Y h:i A',strtotime($item->created_at)) }}</td>
                        </tr>
                      @endforeach
                      <tr>
                        <th></th>
                        <th class="text-end">Paid Amount:</th>
                        <th>{{ $total_paid_amount ?? 0 }}</th>
                        <th class="text-end">Total PCS:</th>
                        <th>{{ $total_pcs ?? 0 }}</th>
                        <th class="text-end">Total Earnings:</th>
                        <th>{{ $total_earnings ?? 0 }}</th>
                        <th class="text-end">Balance Amount:</th>
                        <th>{{ $balance ?? 0 }}</th>
                        <th></th>
                      </tr>
                    </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header d-flex justify-content-between align-items-end">
              <h4 class="mb-0">Payment History</h4>
              <a href="javascript:void(0)" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit_modal" onclick="edit_payment_modal(0, 'Party')">Add Payment</a>
            </div>
            <div class="card-body">
              <div class="dt-ext table-responsive">
                <table class="table table-striped table-hover Datatable nowrap" id="datatable-excel_2">
                    <thead>
                        <tr>
                          <th>#</th>
                          <th>Payment Date</th>
                          <th>Payment Mode</th>
                          <th>Amount</th>
                          <th>Created Date</th>
                          <th>Options</th>
                        </tr>
                    </thead>
                    <tbody>
                      @forelse ($payment_history as $item)
                        <tr>
                          <td>{{ $loop->index + 1 }}</td>
                          <td>{{ ($item->payment_date ?? '') == '' ? "N/A" : date('d M,Y',strtotime($item->payment_date)) }}</td>
                          <td>{{ $item->payment_mode ?? 'N/A' }}</td>
                          <td>{{ $item->amount ?? 'N/A' }}</td>
                          <td>{{ date('d M,Y h:i A',strtotime($item->created_at)) }}</td>
                          <td>
                            <a href="javascript:void({{ $item->id }})" class="text-warning p-1 f-22" data-bs-toggle="modal" data-bs-target="#edit_modal" onclick="edit_payment_modal({{ $item->id }}, 'Party')" data-toggle="tooltip" title="Edit">
                              <i class="fa fa-edit"></i>
                            </a>
                            @if (auth()->user()->role_as == 'Admin')
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
                                            window.location.href = "{{ route('payment_history.delete',$item->id)}}";
                                        }
                                    })
                                });
                            </script>
                            @endif
                          </td>
                        </tr>
                      @endforeach
                      <tr>
                        <th></th>
                        <th></th>
                        <th class="text-end">Paid Amount:</th>
                        <th>{{ $total_paid_amount ?? 0 }}</th>
                        <th></th>
                        <th></th>
                      </tr>
                    </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header d-flex justify-content-between align-items-end">
              <h4 class="mb-0">Material History</h4>
              <a href="javascript:void(0)" class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#edit_modal" onclick="edit_material_modal(0)">Add Material Challan</a>
            </div>
            <div class="card-body">
              <div class="dt-ext table-responsive">
                <table class="table table-striped table-hover Datatable nowrap" id="datatable-excel_3">
                    <thead>
                        <tr>
                          <th>#</th>
                          <th>Challan No.</th>
                          <th>Party Name</th>
                          <th>Material Name / Unit</th>
                          <th>Price</th>
                          <th>QTY</th>
                          <th>Total Price</th>
                          <th>Send Date</th>
                          <th>Created At</th>
                          <th>Remarks</th>
                          <th>Options</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach ($material_challan as $key => $item)
                      <tr>
                          <td>{{ $key+1 }}</td>
                          <td>{{ $item->challan_no ?? 'N/A' }}</td>
                          <td><a href="{{route('party_salary.show',$item->party->id)}}" target="_blank" rel="noopener noreferrer">{{ $item->party->name ?? 'N/A' }} <small>({{ $item->party->party_code ?? 'N/A' }})</small></a></td>
                          <td>{{ $item->material_item->name ?? 'N/A' }} / <small>({{ $item->material_item->unit ?? 'N/A' }})</small></td>
                          <td>{{ $item->per_unit_price ?? 'N/A' }}</td>
                          <td>{{ $item->qty ?? 'N/A' }}</td>
                          <td>{{ $item->total_price ?? 'N/A' }}</td>
                          <td>{{ date('d M,Y',strtotime($item->send_date)) }}</td>
                          <td>{{ date('d M,Y h:i A',strtotime($item->created_at)) }}</td>
                          <td>{{ $item->remarks ?? 'N/A' }}</td>
                          <td>
                              <a href="#" class="text-warning p-1 f-22" data-bs-toggle="modal" data-bs-target="#edit_modal" onclick="edit_modal({{ $item->id }})" data-toggle="tooltip" title="Edit">
                                  <i class="fa fa-edit"></i>
                              </a>
                              @if (auth()->user()->role_as == 'Admin')
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
                                              window.location.href = "{{ route('material_challan.delete',$item->id)}}";
                                          }
                                      })
                                  });
                              </script>
                              @endif
                          </td>
                      </tr>
                      @endforeach
                      <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th class="text-end">Total Material Amount:</th>
                        <th>{{ $total_material_amount ?? 0 }}</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                      </tr>
                    </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


<div class="modal fade" id="edit_modal" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog" id="ajax_html">
        
  </div>
</div>
@endsection

@php
  $from_date = ($request->from_date ?? '') != '' ? date('d M, Y', strtotime($request->from_date)) : '';
  $to_date = ($request->to_date ?? '') != '' ? date('d M, Y', strtotime($request->to_date)) : '';
@endphp

@section('script')
<script>
  function edit_material_modal(id){
    var party_id = '{{ $party->id }}';
      $('#ajax_html').html('<div class="loader-box"><div class="loader-37"></div></div>');
      $.get('{{ url('material_challan/edit') }}/'+id, { party_id:party_id }, function(data){
          $('#ajax_html').removeClass();
          $('#ajax_html').addClass('modal-dialog modal-lg');
          $('#ajax_html').html(data);
      });
  }
  $(document).ready(function() {
    var title = "{{ ($party->name ?? 'N/A') .' (Material History) - '.$from_date. ' - '.$to_date }}";

    $('#datatable-excel_3').DataTable({
      lengthMenu: [
        [-1]
      ],
      dom: "Brt",
      ordering: false,
      buttons: [
        'copy',
        'excelHtml5',
        'csvHtml5',
        {
          extend: 'pdfHtml5',
          title: title,
          footer: true, // Include the footer
        },
        {
          extend: 'print',
          title: title,
          footer: true, // Include the footer
          customize: function (win) {
            $(win.document.body).find('h1').css('font-size', '25px');
          }
        }
      ],
    });
  });
</script>
<script>
  function edit_payment_modal(id, role){
    var party_id = '{{ $party->id }}';
      $('#ajax_html').html('<div class="loader-box"><div class="loader-37"></div></div>');
      $.get('{{ url('payment_history/edit') }}/'+id, { role:role, party_id:party_id }, function(data){
          $('#ajax_html').removeClass();
          $('#ajax_html').addClass('modal-dialog');
          $('#ajax_html').html(data);
      });
  }
  $(document).ready(function() {
    var title = "{{ ($party->name ?? 'N/A') .' (Payment History) - '.$from_date. ' - '.$to_date }}";

    $('#datatable-excel_2').DataTable({
      lengthMenu: [
        [-1]
      ],
      dom: "Brt",
      ordering: false,
      buttons: [
        'copy',
        'excelHtml5',
        'csvHtml5',
        {
          extend: 'pdfHtml5',
          title: title,
          footer: true, // Include the footer
        },
        {
          extend: 'print',
          title: title,
          footer: true, // Include the footer
          customize: function (win) {
            $(win.document.body).find('h1').css('font-size', '25px');
          }
        }
      ],
    });
  });
</script>

<script>
  function check_all(){
      if($('#select_all').is(':checked')){
          $('.form-check-input').prop('checked',true);
      }else{
          $('.form-check-input').prop('checked',false);
      }
  }
  $(document).ready(function() {
    var title = "{{ ($party->name ?? 'N/A') .' (Salary Details) - '.$from_date. ' - '.$to_date }}";

    $('#datatable-excel').DataTable({
      lengthMenu: [
        [-1]
      ],
      dom: "Brt",
      ordering: false,
      buttons: [
        'copy',
        'excelHtml5',
        'csvHtml5',
        {
          extend: 'pdfHtml5',
          title: title,
          footer: true, // Include the footer
        },
        {
          extend: 'print',
          title: title,
          footer: true, // Include the footer
          customize: function (win) {
            $(win.document.body).find('h1').css('font-size', '25px');
          }
        }
      ],
    });
  });
</script>
@endsection