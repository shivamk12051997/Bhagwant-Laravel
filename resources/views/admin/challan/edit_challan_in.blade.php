<form class="modal-content" enctype="multipart/form-data" action="{{ route('challan_in.insert') }}" method="POST" id="edit_challan_in_form">
    @csrf
    <input type="hidden" name="id" value="{{ $challan->id ?? 0 }}">
    <input type="hidden" name="in_out" value="In">
    <input type="hidden" name="challan_out_id" value="{{ $challan->challan_out_id ?? 'N/A' }}">
    <div class="modal-header">
        <h4 class="modal-title" id="mySmallModalLabel">{{ ($challan->id ?? 0) != 0 ? 'Edit':'Add' }} Challan {{ request()->in_out ?? '-' }} </h4>
        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close" data-bs-original-title="" title=""></button>
    </div>
    <div class="modal-body dark-modal">
        <div class="row">
            <div class="col-md-4 form-group mb-3">
              <h6>Date<span>*</span></h6>
              <input type="date" class="form-control" name="date" id="" value="{{ $challan->date ?? '' }}" required>
            </div>
            <div class="col-md-4 form-group mb-3">
              <h6>Challan In No.<span>*</span></h6>
              <input type="text" class="form-control" name="challan_no" id="" value="{{ $challan->challan_no ?? '' }}" required>
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
              <input type="number" step="any" class="form-control" id="total_received_pcs" max="{{ $challan->lot_activities->sum('pcs') + ($request->remaining_pcs ?? 0) }}" value="{{ ($challan->lot_activities->sum('pcs') ?? '') }}" required>
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
                @foreach ((App\Models\LotNoActivity::where('challan_id',$challan->id)->where('action','Received From Party')->get() ?? []) as $key => $lot_activity)
                  @php
                    $lot_no = \App\Models\LotNo::find($lot_activity->lot_no_id);
                    $lot_activity_received = \App\Models\LotNoActivity::where('lot_no_id',$lot_no->id)->where('challan_out_id',$challan->challan_out_id)->where('action','Received From Party')->get()->sum('pcs');
                  @endphp
                  <tr>
                    <td>{{ $key+1 }} <input type="hidden" name="lot_no[{{ $key }}][lot_no_id]" value="{{ $lot_activity->lot_no_id }}" required></td>
                    <td>{{ $lot_no->lot_no ?? 'N/A' }}</td>
                    <td>{{ $lot_no->pcs ?? 'N/A' }}</td>
                    <td>
                        
                      <input type="number" name="lot_no[{{ $key }}][received_pcs]" class="form-control received_pcs" max="{{ ($lot_no->pcs ?? 0) - (($lot_activity_received ?? 0) - ($lot_activity->pcs ?? 0)) }}" value="{{ ($lot_activity->pcs ?? 0) }}" readonly required>
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
    </div>
    <div class="modal-footer text-end">
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
</form>

<script>
    function calculate_total_amount(){
        var total_received_pcs = 0;
        $('#edit_challan_in_form .received_pcs').each(function() {
            total_received_pcs += Number($(this).val()); // Corrected operator
        });
        $('#edit_challan_in_form #total_received_pcs').val(total_received_pcs);
        var price = Number($('#edit_challan_in_form input[name="price"]').val());
        $('#edit_challan_in_form #total_amount').val(total_received_pcs * price); // Ensure multiplication
    }
</script>