<div class="col-md-6 form-group mb-3">
    <h6>Size <span>*</span></h6>
    <select class="form-select js-example-basic-single" name="size_id" id="size_id" required>
        <option value="" selected disabled>Select Option...</option>
        @foreach (App\Models\Size::whereIn('id', (json_decode($master_lot->size_ids ?? '[]') ?? []))->get() as $size)
            <option value="{{ $size->id }}">{{ $size->name }}</option>
        @endforeach
    </select>
</div>
<div class="col-md-6 form-group mb-3">
    <h6>Cutting Master <span>*</span></h6>
    <select class="form-select js-example-basic-single" name="worker_id" id="worker_id" required>
        <option value="" selected disabled>Select Option...</option>
        @foreach (App\Models\Worker::whereJsonContains('role','Cutting')->where('status',1)->latest()->get() as $worker)
            <option value="{{ $worker->id }}">{{ $worker->name }}</option>
        @endforeach
    </select>
</div>
<div class="col-md-3 form-group mb-3">
    <h6>Per Price <span>*</span></h6>
    <input type="number" step="any" class="form-control" name="price" id="price" value="{{ $master_lot->cutting_price ?? '' }}" required>
</div>
<div class="col-md-3 form-group mb-3">
    <h6>Date <span>*</span></h6>
    <input type="date" class="form-control" name="date" id="" value="{{ date('Y-m-d') }}" required>
</div>
@if (($master_lot->show_gender ?? '') == 'Yes')
<div class="col-md-3 form-group mb-3">
    <h6>Gender <span>*</span></h6>
    <div class="form-check-size rtl-input">
        <div class="form-check form-check-inline">
          <input class="form-check-input me-2" id="Male" type="radio" name="gender" value="Male" checked="">
          <label class="form-check-label" for="Male">Male</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input me-2" id="Female" type="radio" name="gender" value="Female" {{ ($lot_no->gender ?? '') == 'Female' ? 'checked':'' }}>
          <label class="form-check-label" for="Female">Female</label>
        </div>
    </div>
</div>
@endif
@if (($master_lot->show_press ?? '') == 'Yes')
<div class="col-md-3 form-group mb-3">
    <h6>Press <span>*</span></h6>
    <div class="form-check-size rtl-input">
        <div class="form-check form-check-inline">
          <input class="form-check-input me-2" id="Yes" type="radio" name="press" value="Yes" checked="">
          <label class="form-check-label" for="Yes">Yes</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input me-2" id="No" type="radio" name="press" value="No" {{ ($lot_no->press ?? '') == 'No' ? 'checked':'' }}>
          <label class="form-check-label" for="No">No</label>
        </div>
    </div>
</div>
@endif