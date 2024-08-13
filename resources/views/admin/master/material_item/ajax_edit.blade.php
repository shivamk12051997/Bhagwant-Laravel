<form class="modal-content" enctype="multipart/form-data" onsubmit="event.preventDefault(); store_form(event);">
    @csrf
    <input type="hidden" name="id" id="id" value="{{ $material_item->id ?? 0 }}">
    <input type="hidden" name="form_name" id="form_name" value="Material Item">
    <div class="modal-header">
        <h4 class="modal-title" id="mySmallModalLabel">{{ ($material_item->id ?? 0) != 0 ? 'Edit':'Add' }} Material Item </h4>
        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close" data-bs-original-title="" title=""></button>
    </div>
    <div class="modal-body dark-modal">
        <div class="row">
            <div class="col-md-12 form-group mb-3">
                <h6>Name <span>*</span></h6>
                <input type="text" class="form-control" name="name" id="" value="{{ $material_item->name ?? '' }}" required>
            </div>
            <div class="col-md-12 form-group mb-3">
                <h6>Unit <span>*</span></h6>
                <select class="form-select" name="unit" id="" required>
                    <option value="" selected disabled>Select Option...</option> 
                    <option value="PCs" {{ ($material_item->unit ?? '') == 'PCs' ? 'selected':'' }}>PCs</option> 
                    <option value="KG" {{ ($material_item->unit ?? '') == 'KG' ? 'selected':'' }}>KG</option> 
                    <option value="Meter" {{ ($material_item->unit ?? '') == 'Meter' ? 'selected':'' }}>Meter</option>
                </select>
            </div>
            <div class="col-md-12 form-group mb-3">
                <h6>Price <span>*</span></h6>
                <input type="number" step="any" class="form-control" name="price" id="" value="{{ $material_item->price ?? '' }}" required>
            </div>
            <div class="col-md-12 form-group">
                <h6>Status</h6>
                <label class="switch">
                    <input type="checkbox"  name="status" value="1" {{ ($material_item->status ?? 1) == 1 ? 'checked':'' }}><span class="switch-state"></span>
                </label>
            </div>
        </div>
    </div>
    <div class="modal-footer text-end">
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
</form>