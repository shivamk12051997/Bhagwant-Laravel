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
                  <li><b>Date:</b> {{ date('d M, Y', strtotime($challan->date)) }}</li>
                  <li><b>Party Name:</b> {{ $challan->party->name ?? 'N/A' }}</li>
                  <li><b>Price:</b> {{ $challan->price ?? 'N/A' }}</li>
                  <li><b>Sent PCs:</b> {{ $challan->sent_pcs ?? 'N/A' }}</li>
                  <li><b>Received PCs:</b> {{ $challan->received_pcs ?? '0' }}</li>
                  <li><b>Total Amount:</b> {{ $challan->total_amount ?? 'N/A' }}</li>
                  <li><b>Remarks:</b> {{ $challan->remarks ?? '-' }}</li>
                </ul>
              </div>
            </div>
        </div>
        <div class="col-xl-9 col-md-12 box-col-12">
            <div class="card">
              <div class="card-header">
                <h4>Challan In</h4>
              </div>
              <div class="card-body">
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
                    <select class="form-select" name="party_id" id="">
                      <option value="{{ $challan->party->id ?? 'N/A' }}" selected>{{ $challan->party->name ?? 'N/A' }}</option>
                    </select>
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
                      @foreach (json_decode($challan->lot_no_ids ?? '[]') as $key => $lot_no_id)
                      @php
                        $lot_no = \App\Models\LotNo::find($lot_no_id);
                        $lot_activity = \App\Models\LotNoActivity::where('lot_no_id',$lot_no->id)->where('challan_id',$challan->id)->where('action','Received From Party')->first();
                      @endphp
                      <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $lot_no->lot_no ?? 'N/A' }}</td>
                        <td>{{ $lot_no->pcs ?? 'N/A' }}</td>
                        <td>
                          <input type="number" name="received_pcs[]" class="form-control" id="" max="{{ ($lot_no->pcs ?? 0) - ($lot_activity->pcs ?? 0) }}" value="{{ ($lot_no->pcs ?? 0) - ($lot_activity->pcs ?? 0) }}">
                          <small>Old Received PCs: {{ $lot_activity->pcs ?? 'N/A' }}</small>
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
    var title = "";

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
@endsection