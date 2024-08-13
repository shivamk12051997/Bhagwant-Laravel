@extends('layouts.admin.app')

@section('title', 'Challan - '.($challan->challan_no ?? 'N/A'))

@section('breadcrumb-items')
    <li class="breadcrumb-item">Challan Out</li>
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
                  {{-- <div class="media-size-email mb-3"><img class="me-3 rounded-circle" src="{{ asset('user.png') }}" alt="" width="80px"></div> --}}
                  <h5>{{ $challan->challan_no ?? 'N/A' }} <br></h5>
                  <small class="text-muted">Total Items({{ count(json_decode($challan->lot_no_ids ?? '[]') ?? []) }}) - {{ $challan->in_out ?? 'N/A' }}</small>
                  <br>
                  
                  <span class="badge badge-{{ ($challan->status ?? '') == 1 ? 'success':'danger' }}">{{ ($challan->status ?? '') == 1 ? 'Complete':'Incomplete' }}</span>
                </div>
                <hr>
                <ul>
                  {{-- @dd($item->sent_pcs) --}}
                  <li><b>Date:</b> {{ date('d M, Y', strtotime($challan->date)) }}</li>
                  <li><b>Party Name:</b> {{ $challan->party->name ?? 'N/A' }}</li>
                  <li><b>Price:</b> {{ $challan->price ?? 'N/A' }}</li>
                  <li><b>Sent PCs:</b> {{ $sent_pcs = $challan->sent_pcs->sum('pcs') ?? 'N/A' }}</li>
                  <li><b>Received PCs:</b> {{ $received_pcs = ($challan->received_pcs ?? '') == '' ? 0:$challan->received_pcs->sum('pcs') }}</li>
                  <li><b>Remaining PCs:</b> {{ $sent_pcs - $received_pcs }}</li>
                  <li><b>Sent Total Amount:</b> {{ $sent_pcs * $challan->price }}</li>
                  <li><b>Received Total Amount:</b> {{ $received_pcs * $challan->price }}</li>
                  <li><b>Remarks:</b> {{ $challan->remarks ?? '-' }}</li>
                </ul>
                <hr>
                <div class="lot-details">
                  <h6>Lot Details:</h6>
                  @foreach (($challan->sent_pcs ?? []) as $key => $lot_activity_sent)
                    @php
                      $lot_no = \App\Models\LotNo::find($lot_activity_sent->lot_no_id);
                    @endphp
                    <a href="{{route('lot_no.show',$lot_no->id)}}" class="btn btn-xs btn-{{ $lot_no->is_complete == 1 ? 'success':'primary' }}">{{ $key+1 }}. {{ $lot_no->lot_no ?? 'N/A' }}</a></li>
                  @endforeach
                </div>
              </div>
            </div>
        </div>
        <div class="col-xl-9 col-md-12 box-col-12">
          @if (($sent_pcs - $received_pcs) != 0)
          <div class="card" id="challan_in_form">
            <div class="card-header">
              <h4>Challan In Form</h4>
            </div>
            <form action="{{ route('challan_in.insert') }}" method="POST" class="card-body">
              @csrf
              <input type="hidden" name="id" value="0">
              <input type="hidden" name="in_out" value="In">
              <input type="hidden" name="challan_out_id" value="{{ $challan->id ?? 'N/A' }}">
              <div class="row">
                <div class="col-md-4 form-group mb-3">
                  <h6>Date<span>*</span></h6>
                  <input type="date" class="form-control" name="date" id="" value="{{ date('Y-m-d') }}" required>
                </div>
                <div class="col-md-4 form-group mb-3">
                  <h6>Challan In No.<span>*</span></h6>
                  <input type="text" class="form-control" name="challan_no" id="" value="" required>
                </div>
                <div class="col-md-4 form-group mb-3">
                  <h6>Party<span>*</span></h6>
                  <input type="hidden" name="party_id" value="{{ $challan->party->id ?? 'N/A' }}">
                  <input type="text" name="" class="form-control" value="{{ $challan->party->name ?? 'N/A' }}" readonly>
                </div>
                <div class="col-md-4 form-group mb-3">
                  <h6>Price <span>*</span></h6>
                  <input type="number" step="any" class="form-control" name="price" value="{{ $challan->price ?? '' }}" readonly required>
                </div>
                <div class="col-md-4 form-group mb-3">
                  <h6>Received PCs <span>*</span></h6>
                  @php
                    $remaining_pcs = ($challan->sent_pcs->sum('pcs') ?? 0) - (($challan->received_pcs ?? '') == '' ? 0:$challan->received_pcs->sum('pcs'));
                  @endphp
                  <input type="number" step="any" class="form-control" id="total_received_pcs" name="total_received_pcs" oninput="calculate_total_amount()" max="{{ $remaining_pcs }}" value="{{ $remaining_pcs }}" required>
                </div>
                <div class="col-md-4 form-group mb-3">
                  <h6>Total Amount<span>*</span></h6>
                  <input type="number" step="any" class="form-control" id="total_amount" value="{{ $challan->lot_activities->sum('pcs') * ($challan->price ?? 0) }}" readonly required>
                </div>
              </div>
              <div class="table-responsive">
                <table class="table table-striped table-hover">
                  <thead>
                    <tr>
                      <th>Sr. No.</th>
                      <th>Lot No.</th>
                      <th>Sent PCs</th>
                      <th>Received PCs</th>
                    </tr>
                  </thead>
                  <tbody>
                    {{-- @foreach (json_decode($challan->lot_no_ids ?? '[]') as $key => $lot_no_id) --}}
                    @foreach (($challan->sent_pcs ?? []) as $key => $lot_activity_sent)
                      @php
                        $lot_no = \App\Models\LotNo::find($lot_activity_sent->lot_no_id);
                        $lot_activity_received = \App\Models\LotNoActivity::where('lot_no_id',$lot_no->id)->where('challan_out_id',$challan->id)->where('action','Received From Party')->get()->sum('pcs');
                      @endphp
                      @if (($lot_activity_received ?? 0) != $lot_no->pcs)
                        <tr>
                          <td>{{ $key+1 }} <input type="hidden" name="lot_no[{{ $key }}][lot_no_id]" value="{{ $lot_activity_sent->lot_no_id }}" required></td>
                          <td>{{ $lot_no->lot_no ?? 'N/A' }}</td>
                          <td>{{ $lot_no->pcs ?? 'N/A' }}</td>
                          <td>
                            <input type="number" name="lot_no[{{ $key }}][received_pcs]" class="form-control received_pcs" max="{{ ($lot_activity_sent->pcs ?? 0) - ($lot_activity_received ?? 0) }}" value="{{ ($lot_activity_sent->pcs ?? 0) - ($lot_activity_received ?? 0) }}" readonly required>
                            <small>Old Received PCs: {{ $lot_activity_received ?? 'N/A' }}</small>
                          </td>
                        </tr>
                      @endif
                    @endforeach
                  </tbody>
                </table>
              </div>
              <div class="form-group mt-3">
                <h6>Remarks</h6>
                <textarea class="form-control" name="remarks" id="" cols="30" rows="3"></textarea>
              </div>
              <hr>
              <div class="text-center">
                <button type="submit" class="btn btn-primary">Save</button>
              </div>
            </form>
          </div>
          @endif
            <div class="card">
              <div class="card-header">
                <h4>Challan In History</h4>
              </div>
              <div class="card-body">
                <div class="dt-ext table-responsive">
                  <table class="table table-striped table-hover Datatable nowrap" id="datatable-excel">
                      <thead>
                          <tr>
                            <th>#</th>
                            <th>Challan Out No.</th>
                            <th>Challan In No.</th>
                            <th>Date</th>
                            <th>Created At</th>
                            <th>Sent PCS</th>
                            <th>Received PCS</th>
                            <th>Price</th>
                            <th>Lot No.</th>
                            <th>Options</th>
                          </tr>
                      </thead>
                      <tbody>
                        @forelse ((App\Models\Challan::where('in_out','In')->where('challan_out_id',$challan->id)->get() ?? []) as $item)
                          <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $item->challan_out->challan_no ?? 'N/A' }}</td>
                            <td>{{ $item->challan_no ?? 'N/A' }}</td>
                            <td>{{ ($item->date ?? '') == '' ? "N/A" : date('d M,Y',strtotime($item->date)) }}</td>
                            <td>{{ date('d M,Y',strtotime($item->created_at)) }}</td>
                            <td>{{ $sent_pcs = $item->challan_out->sent_pcs->sum('pcs') ?? 'N/A' }}</td>
                            <td>{{ $item->lot_activities->sum('pcs') ?? 'N/A' }}</td>
                            <td>{{ $item->lot_activity->price ?? 'N/A' }}</td>
                            <td>
                              @foreach (($item->lot_activities ?? []) as $lot_activity)
                                  @php
                                      $lot_no = App\Models\LotNo::find($lot_activity->lot_no_id);
                                  @endphp
                                  <a href="{{route('lot_no.show',$lot_no->id)}}" class="badge badge-{{ $lot_no->is_complete == 1 ? 'success':'primary' }}">{{ $lot_no->lot_no ?? '-' }}</a>
                              @endforeach
                            </td>
                            <td>
                              <a href="#" class="text-warning p-1 f-22" data-toggle="tooltip" title="Edit" data-bs-toggle="modal" data-bs-target="#edit_modal" onclick="edit_challan_in({{ $item->id }}, 'In')">
                                <i class="fa fa-edit"></i>
                              </a>
                            </td>
                          </tr>
                        @endforeach
                        <tr>
                          <th></th>
                          <th></th>
                          <th></th>
                          <th></th>
                          <th class="text-end">Total:</th>
                          <th>{{ $sent_pcs ?? 'N/A' }}</th>
                          <th>{{ $received_pcs ?? 'N/A' }}</th>
                          <th>Total Earning: {{ ($received_pcs ?? 0) * ($challan->price ?? 0) }}</th>
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

@section('script')

<script>
  $(document).ready(function() {
    var title = "{{ ($challan->challan_no ?? 'N/A') }} - Challan In History";

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
        }
      ],
    });
  });
</script>

<script>
  function calculate_total_amount(){
      var total_received_pcs =  $('#challan_in_form #total_received_pcs').val();
      var price = Number($('#challan_in_form input[name="price"]').val());
      $('#challan_in_form #total_amount').val(total_received_pcs * price);

      $('#challan_in_form .received_pcs').each(function() {
        console.log(total_received_pcs);
        var max_pcs = Number($(this).attr('max'));
        if(max_pcs < total_received_pcs){
          $(this).val(max_pcs);
          total_received_pcs -= max_pcs;
        }else{
          $(this).val(total_received_pcs);
          total_received_pcs -= total_received_pcs;
        }
      });
  }
  function edit_challan_in(id, in_out){
    var remaining_pcs = '{{ $remaining_pcs ?? 0 }}';
      $('#ajax_html').html('<div class="loader-box"><div class="loader-37"></div></div>');
      $.get('{{ url('challan/edit') }}/'+id, { in_out:in_out, remaining_pcs:remaining_pcs }, function(data){
          $('#ajax_html').removeClass();
          $('#ajax_html').addClass('modal-dialog modal-xl');
          $('#ajax_html').html(data);
      });
  }
</script>
@endsection