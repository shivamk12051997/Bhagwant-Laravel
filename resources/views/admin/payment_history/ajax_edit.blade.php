<form class="modal-content" action="{{ route('payment_history.insert') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{ $payment_history->id ?? 0 }}">
    <input type="hidden" name="role" value="{{ request()->role }}">
    <input type="hidden" name="worker_id" value="{{ request()->worker_id ?? '' }}">
    <input type="hidden" name="party_id" value="{{ request()->party_id ?? '' }}">
   
    <div class="modal-header">
        <h4 class="modal-title" id="mySmallModalLabel">{{ ($payment_history->id ?? 0) != 0 ? 'Edit':'Add' }} Payment </h4>
        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close" data-bs-original-title="" title=""></button>
    </div>
    <div class="modal-body dark-modal">
        <div class="row">
            <div class="col-md-12 form-group mb-3">
                <h6>Payment Date <span>*</span></h6>
                <input type="date" class="form-control" name="payment_date" id="" value="{{ $payment_history->payment_date ?? date('Y-m-d') }}" required>
            </div>
            <div class="col-md-12 form-group mb-3">
                <h6>Payment Mode <span>*</span></h6>
                <div class="form-check-size rtl-input">
                    <div class="form-check form-check-inline">
                      <input class="form-check-input me-2" id="Cash" type="radio" name="payment_mode" value="Cash" checked="">
                      <label class="form-check-label" for="Cash">Cash</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input me-2" id="Advance" type="radio" name="payment_mode" value="Advance">
                      <label class="form-check-label" for="Advance">Advance</label>
                    </div>
                </div>
            </div>
            <div class="col-md-12 form-group mb-3">
                <h6>Amount <span>*</span></h6>
                <input type="number" step="any" class="form-control" name="amount" id="" value="{{ $payment_history->amount ?? '' }}" required>
            </div>
            <div class="col-md-12 form-group mb-3">
                <h6>Remarks</h6>
                <textarea class="form-control" name="remarks" id="" cols="30" rows="3">{{ $payment_history->remarks ?? '' }}</textarea>
            </div>
        </div>
    </div>
    <div class="modal-footer text-end">
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
</form>