@csrf
<input type="hidden" name="id" id="id" value="{{ $slider->id }}">
<div class="modal-header">
    <h4 class="modal-title" id="mySmallModalLabel">Edit Slider</h4>
    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close" data-bs-original-title="" title=""></button>
</div>
<div class="modal-body dark-modal">
    <div class="row">
        <div class="col-md-6 form-group mb-3">
            <h6>Upper Title</h6>
            <input type="text" class="form-control" name="upper_title" id="" value="{{ $slider->upper_title }}">
        </div>
        <div class="col-md-6 form-group mb-3">
            <h6>Middle Title <span>*</span></h6>
            <input type="text" class="form-control" name="middle_title" id="" value="{{ $slider->middle_title }}" required>
        </div>
        <div class="col-md-6 form-group mb-3">
            <h6>Bottom Title</h6>
            <input type="text" class="form-control" name="bottom_title" id="" value="{{ $slider->bottom_title }}">
        </div>
        <div class="col-md-6 form-group mb-3">
            <h6>Button Title <span>*</span></h6>
            <input type="text" class="form-control" name="btn_title" id="" value="{{ $slider->btn_title }}" required>
        </div>
        <div class="col-md-6 form-group mb-3">
            <h6>Button Link</h6>
            <input type="text" class="form-control" name="btn_link" id="" value="{{ $slider->btn_link }}">
        </div>
        <div class="col-md-6 form-group mb-3">
            <h6>Slider Image</h6>
            <input type="file" class="form-control w-75 d-inline-block" name="img" id="">
            <a href="{{ url($slider->img ?? '#') }}" target="_blank"><img src="{{ asset($slider->img ?? '#') }}" width="80px" alt=""></a>
        </div>
        <div class="col-md-6 form-group">
            <h6>Status <span>*</span></h6>
            <label class="switch">
                <input type="checkbox"  name="status" value="1" {{ $slider->status == 1 ? 'checked':'' }}><span class="switch-state"></span>
            </label>
        </div>
    </div>
</div>
<div class="modal-footer text-end">
    <button type="submit" class="btn btn-primary">Save</button>
</div>