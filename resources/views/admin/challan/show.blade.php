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
                  <li><b>Sent PCs:</b> {{ $challan->sent_pcs->sum('pcs') ?? 'N/A' }}</li>
                  <li><b>Received PCs:</b> {{ ($challan->received_pcs ?? '') == '' ? 0:$challan->received_pcs->sum('pcs') }}</li>
                  <li><b>Total Amount:</b> {{ $challan->total_amount ?? 'N/A' }}</li>
                  <li><b>Remarks:</b> {{ $challan->remarks ?? '-' }}</li>
                </ul>
              </div>
            </div>
        </div>
        <div class="col-xl-9 col-md-12 box-col-12">
            <div class="card">
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
                    <input type="number" step="any" class="form-control" id="total_received_pcs" value="{{ ($challan->sent_pcs->sum('pcs') ?? 0) - (($challan->received_pcs ?? '') == '' ? 0:$challan->received_pcs->sum('pcs')) }}" readonly required>
                  </div>
                  <div class="col-md-4 form-group mb-3">
                    <h6>Total Amount<span>*</span></h6>
                    <input type="number" step="any" class="form-control" id="total_amount" value="{{ $challan->lot_activities->sum('pcs') * ($challan->price ?? 0) }}" readonly required>
                  </div>
                </div>
                <div class="table-responsive" oninput="calculate_total_amount()">
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
                        <tr>
                          <td>{{ $key+1 }} <input type="hidden" name="lot_no[{{ $key }}][lot_no_id]" value="{{ $lot_activity_sent->lot_no_id }}" required></td>
                          <td>{{ $lot_no->lot_no ?? 'N/A' }}</td>
                          <td>{{ $lot_no->pcs ?? 'N/A' }}</td>
                          <td>
                            <input type="number" name="lot_no[{{ $key }}][received_pcs]" class="form-control received_pcs" max="{{ ($lot_activity_sent->pcs ?? 0) - ($lot_activity_received ?? 0) }}" value="{{ ($lot_activity_sent->pcs ?? 0) - ($lot_activity_received ?? 0) }}">
                            <small>Old Received PCs: {{ $lot_activity_received ?? 'N/A' }}</small>
                          </td>
                        </tr>
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
                            <th>Sent PCS</th>
                            <th>Received PCS</th>
                            <th>Lot No.</th>
                          </tr>
                      </thead>
                      <tbody>
                        @forelse ((App\Models\Challan::where('in_out','In')->where('challan_out_id',$challan->id)->get() ?? []) as $item)
                          <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $item->challan_out->challan_no ?? 'N/A' }}</td>
                            <td>{{ $item->challan_no ?? 'N/A' }}</td>
                            <td>{{ ($item->date ?? '') == '' ? "N/A" : date('d M,Y',strtotime($item->date)) }}</td>
                            <td>{{ $sent_pcs = $item->challan_out->sent_pcs->sum('pcs') ?? 'N/A' }}</td>
                            <td>{{ $received_pcs = ($item->challan_out->received_pcs ?? '') == '' ? 0 : $item->challan_out->received_pcs->sum('pcs') }}</td>
                            <td>
                              @foreach (($item->lot_activities ?? []) as $lot_activity)
                                  @php
                                      $lot_no = App\Models\LotNo::find($lot_activity->lot_no_id);
                                  @endphp
                                  <a href="{{route('lot_no.show',$lot_no->id)}}" class="badge badge-{{ $lot_no->is_complete == 1 ? 'success':'primary' }}">{{ $lot_no->lot_no ?? '-' }}</a>
                              @endforeach
                            </td>
                          </tr>
                        @endforeach
                      </tbody>
                  </table>
                </div>
              </div>
            </div>
        </div>
      </div>
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
      var total_received_pcs = 0;
      $('.received_pcs').each(function() {
          total_received_pcs += Number($(this).val()); // Corrected operator
      });
      $('#total_received_pcs').val(total_received_pcs);
      var price = Number($('input[name="price"]').val());
      $('#total_amount').val(total_received_pcs * price); // Ensure multiplication
  }
</script>
@endsection