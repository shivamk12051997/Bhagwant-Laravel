@extends('layouts.admin.app')

@section('title', 'Worker Salary - '.($worker->name ?? 'N/A'))

@section('breadcrumb-items')
    <li class="breadcrumb-item active">Worker Salary</li>
@endsection

@section('css')
<style>
  table.dataTable input.form-check-input{
    height: 1em;
    border: 1px solid #0000005a;
  }
  .page-wrapper{
    overflow: revert;
  }
  .profile-card {
    position: sticky; /* Sticky positioning */
    top: 100px; /* Set top offset */
  }
</style>
@endsection

@section('content')

<div class="container-fluid">
    <div class="email-wrap bookmark-wrap">
      <div class="row">
        <div class="col-xl-3 box-col-6">
            <div class="card profile-card">
              <div class="card-body">
                <div class="text-center">
                  <div class="media-size-email mb-3"><img class="me-3 rounded-circle" src="{{ asset('user.png') }}" alt="" width="80px"></div>
                  <h5>{{ $worker->name ?? 'N/A' }} <br> <small class="text-muted">({{ $worker->worker_code ?? 'N/A' }})</small></h5>
                  
                  <span class="badge badge-{{ ($worker->status ?? '') == 1 ? 'success':'danger' }}">{{ ($worker->status ?? '') == 1 ? 'Active':'Inactive' }}</span>
                </div>
                <hr>
                <ul>
                  {{-- @php
                    $totalQty = 0;
                    $totalEarnings = 0;
                    foreach ($worker->lot_activities as $activity) {
                        $qty = optional($activity->lot_no)->pcs ?? 0;
                        $totalQty += $qty;
                        $totalEarnings += $qty * $activity->price;
                    }
                  @endphp --}}
                  <li><b>Total QTY:</b> {{ $total_pcs = $all_lot_activity->sum('pcs') ?? 0 }}</li>
                  <li><b>Total Earning:</b> {{ $total_earnings = ($all_lot_activity->sum('total_earning') ?? 0) + ($deleted_earnings ?? 0) }}</li>
                  <li><b>Paid Amount:</b> {{ $total_paid_amount = ($payment_history->sum('amount') ?? 0) }}</li>
                  <li><b>Balance Amount:</b> {{ $balance =  $total_earnings - $total_paid_amount }}</li>
                  {{-- <li><b>Phone Number:</b> {{ $worker->phone ?? 'N/A' }}</li> --}}
                  <li>
                    <b>Worker Role:</b> 
                    @foreach ((json_decode($worker->role ?? '[]') ?? []) as $role)
                        <span class="badge badge-primary ">{{ $role }}</span>
                    @endforeach
                  </li>
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
            <form class="card-body dark-timeline" action="{{ route('worker_salary.lot_activity.is_paid') }}" method="POST">
              @csrf
              <div class="dt-ext table-responsive">
                <table class="table table-striped table-hover Datatable nowrap" id="datatable-excel">
                    <thead>
                        <tr>
                          <th># <input type="checkbox" class="form-check-input" name="select_all" id="select_all" onchange="check_all()"></th>
                          <th>Is Paid?</th>
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
                      @php
                        $filter_total_earning = 0;
                        $filter_total_pcs = 0;
                      @endphp
                      @forelse ($lot_activity as $item)
                        <tr>
                          <td>{{ $loop->index + 1 }} <input type="checkbox" class="form-check-input" name="lot_no_activity_id[]" value="{{ $item->id }}" id=""></td>
                          <td>
                            <span class="badge badge-{{ $item->is_paid == '1' ? 'success':'danger' }}">{{ $item->is_paid == '1' ? 'Paid':'Unpaid' }}</span>
                          </td>
                          <td><a href="{{route('lot_no.show',$item->lot_no->id)}}" target="_blank">{{ $item->lot_no->lot_no ?? 'N/A' }}</a></td>
                          <td>{{ ($item->date ?? '') == '' ? "N/A" : date('d M,Y',strtotime($item->date)) }}</td>
                          <td>{{ $item->pcs ?? 'N/A' }}</td>
                          <td>{{ $item->price ?? 'N/A' }}</td>
                          <td>{{ $item->total_earning ?? 'N/A' }}</td>
                          <td>{{ $item->lot_no->size->name ?? 'N/A' }}</td>
                          <td>{{ $item->lot_no->color->name ?? 'N/A' }}</td>
                          <td>{{ date('d M,Y h:i A',strtotime($item->created_at)) }}</td>
                          @php
                            $filter_total_earning += $item->total_earning;
                            $filter_total_pcs += $item->pcs;
                          @endphp
                        </tr>
                      @endforeach
                      <tr>
                        <th></th>
                        <th class="text-end"></th>
                        <th></th>
                        <th class="text-end">Total PCS:</th>
                        <th>{{ $filter_total_pcs ?? 0 }}</th>
                        <th class="text-end">Total Earnings:</th>
                        <th>{{ $filter_total_earning ?? 0 }}</th>
                        <th class="text-end"></th>
                        <th></th>
                        <th></th>
                      </tr>
                    </tbody>
                </table>
              </div>
              <div class="form-group">
                <button class="btn btn-success me-3" name="is_paid" value="1">Save as Paid</button>
                <button class="btn btn-danger me-3" name="is_paid" value="0">Save as Unpaid</button>
              </div>
            </form>
          </div>
          <div class="card">
            <div class="card-header d-flex justify-content-between align-items-end">
              <h4 class="mb-0">Payment History</h4>
              <a href="javascript:void(0)" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit_modal" onclick="edit_payment_modal(0, 'Worker')">Add Payment</a>
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
                            <a href="javascript:void({{ $item->id }})" class="text-warning p-1 f-22" data-bs-toggle="modal" data-bs-target="#edit_modal" onclick="edit_payment_modal({{ $item->id }}, 'Worker')" data-toggle="tooltip" title="Edit">
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
                        <th>{{ $payment_history->sum('amount') ?? 0 }}</th>
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
  <div class="modal-dialog">
    <div class="modal-content" id="ajax_html">
        
    </div>
  </div>
</div>

@endsection

@section('script')
<script>
  function edit_payment_modal(id, role){
    var worker_id = '{{ $worker->id }}';
      $('#ajax_html').html('<div class="loader-box"><div class="loader-37"></div></div>');
      $.get('{{ url('payment_history/edit') }}/'+id, { role:role, worker_id:worker_id }, function(data){
          $('#ajax_html').removeClass();
          $('#ajax_html').addClass('modal-dialog modal-lg');
          $('#ajax_html').html(data);
      });
  }
</script>
<script>
  $(document).ready(function() {
    var title = "{{ ($worker->name ?? 'N/A') .' (Payment History) - '.date('d M, Y', strtotime($request->from_date)). ' - '.date('d M, Y', strtotime($request->to_date)) }}";

    $('#datatable-excel_2').DataTable({
      lengthMenu: [
        [10, 25, 50, -1], // Added options for 10, 25, 50, and all entries
        [10, 25, 50, "All"] // Display labels for the options
      ],
      dom: "lBfrtip",
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
    var title = "{{ ($worker->name ?? 'N/A') .' (Salary Details) - '.date('d M, Y', strtotime($request->from_date)). ' - '.date('d M, Y', strtotime($request->to_date)) }}";

    $('#datatable-excel').DataTable({
      lengthMenu: [
        [10, 25, 50, -1], // Added options for 10, 25, 50, and all entries
        [10, 25, 50, "All"] // Display labels for the options
      ],
      dom: "lBfrtip",
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