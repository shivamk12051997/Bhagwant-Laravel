@extends('layouts.admin.app')

@section('title', 'View Lot No.')

@section('breadcrumb-items')
    <li class="breadcrumb-item active">Lot No.</li>
@endsection

@section('css')
<style>
  
.activity-dot-primary {
  min-width: 6px;
  height: 6px;
  background-color: #7366FF;
  border-radius: 100%;
  outline: 5px solid rgba(115, 102, 255, 0.25);
  position: relative;
  z-index: 2;
}

.timeline-dot-primary {
  min-width: 12px;
  height: 12px;
  background-color: #7366FF;
  outline: 5px solid rgba(115, 102, 255, 0.25);
  position: relative;
  z-index: 2;
}

.activity-dot-secondary {
  min-width: 6px;
  height: 6px;
  background-color: #FF3364;
  border-radius: 100%;
  outline: 5px solid rgba(255, 51, 100, 0.25);
  position: relative;
  z-index: 2;
}

.timeline-dot-secondary {
  min-width: 12px;
  height: 12px;
  background-color: #FF3364;
  outline: 5px solid rgba(255, 51, 100, 0.25);
  position: relative;
  z-index: 2;
}

.activity-dot-success {
  min-width: 6px;
  height: 6px;
  background-color: #54BA4A;
  border-radius: 100%;
  outline: 5px solid rgba(84, 186, 74, 0.25);
  position: relative;
  z-index: 2;
}

.timeline-dot-success {
  min-width: 12px;
  height: 12px;
  background-color: #54BA4A;
  outline: 5px solid rgba(84, 186, 74, 0.25);
  position: relative;
  z-index: 2;
}

.activity-dot-danger {
  min-width: 6px;
  height: 6px;
  background-color: #FC4438;
  border-radius: 100%;
  outline: 5px solid rgba(252, 68, 56, 0.25);
  position: relative;
  z-index: 2;
}

.timeline-dot-danger {
  min-width: 12px;
  height: 12px;
  background-color: #FC4438;
  outline: 5px solid rgba(252, 68, 56, 0.25);
  position: relative;
  z-index: 2;
}

.activity-dot-info {
  min-width: 6px;
  height: 6px;
  background-color: #16C7F9;
  border-radius: 100%;
  outline: 5px solid rgba(22, 199, 249, 0.25);
  position: relative;
  z-index: 2;
}

.timeline-dot-info {
  min-width: 12px;
  height: 12px;
  background-color: #16C7F9;
  outline: 5px solid rgba(22, 199, 249, 0.25);
  position: relative;
  z-index: 2;
}

.activity-dot-light {
  min-width: 6px;
  height: 6px;
  background-color: #f4f4f4;
  border-radius: 100%;
  outline: 5px solid rgba(244, 244, 244, 0.25);
  position: relative;
  z-index: 2;
}

.timeline-dot-light {
  min-width: 12px;
  height: 12px;
  background-color: #f4f4f4;
  outline: 5px solid rgba(244, 244, 244, 0.25);
  position: relative;
  z-index: 2;
}

.activity-dot-dark {
  min-width: 6px;
  height: 6px;
  background-color: #2c323f;
  border-radius: 100%;
  outline: 5px solid rgba(44, 50, 63, 0.25);
  position: relative;
  z-index: 2;
}

.timeline-dot-dark {
  min-width: 12px;
  height: 12px;
  background-color: #2c323f;
  outline: 5px solid rgba(44, 50, 63, 0.25);
  position: relative;
  z-index: 2;
}

.activity-dot-warning {
  min-width: 6px;
  height: 6px;
  background-color: #FFAA05;
  border-radius: 100%;
  outline: 5px solid rgba(255, 170, 5, 0.25);
  position: relative;
  z-index: 2;
}

.timeline-dot-warning {
  min-width: 12px;
  height: 12px;
  background-color: #FFAA05;
  outline: 5px solid rgba(255, 170, 5, 0.25);
  position: relative;
  z-index: 2;
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
                  <h5>{{ $worker->name ?? 'N/A' }}</h5>
                  <span class="badge badge-{{ ($worker->status ?? '') == 1 ? 'success':'danger' }}">{{ ($worker->status ?? '') == 1 ? 'Active':'Inactive' }}</span>
                </div>
                <hr>
                <ul>
                  @php
                    $totalQty = 0;
                    $totalEarnings = 0;
                    foreach ($worker->lot_activities as $activity) {
                        $qty = optional($activity->lot_no)->pcs ?? 0;
                        $totalQty += $qty;
                        $totalEarnings += $qty * $activity->price;
                    }
                  @endphp
                  <li><b>Total QTY:</b> {{ $totalQty ?? 'N/A' }}</li>
                  <li><b>Total Earning:</b> {{ $totalEarnings ?? 'N/A' }}</li>
                  <li><b>Phone Number:</b> {{ $worker->phone ?? 'N/A' }}</li>
                  <li><b>Worker Role:</b> {{ $worker->role ?? 'N/A' }}</li>
                </ul>
              </div>
            </div>
        </div>
        <div class="col-xl-9 col-md-12 box-col-12">
          <div class="card mb-0 notification main-timeline">
            <div class="card-header d-flex">
              <h4 class="mb-0">Salary Details</h4>
            </div>
            <div class="card-body dark-timeline">
              <div class="dt-ext table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                          <th>#</th>
                          <th>Lot No.</th>
                          <th>Color</th>
                          <th>Size</th>
                          <th>PCS</th>
                          <th>Per Price</th>
                          <th>Total Earn</th>
                          <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                      @forelse ($lot_activity as $item)
                        <tr>
                          <td>{{ $loop->index + 1 }}</td>
                          <td><a href="{{route('lot_no.show',$item->lot_no->id)}}" target="_blank">{{ $item->lot_no->lot_no ?? 'N/A' }}</a></td>
                          <td>{{ $item->lot_no->color->name ?? 'N/A' }}</td>
                          <td>{{ $item->lot_no->size->name ?? 'N/A' }}</td>
                          <td>{{ $item->pcs ?? 'N/A' }}</td>
                          <td>{{ $item->price ?? 'N/A' }}</td>
                          <td>{{ ($item->pcs ?? 0) * ($item->price ?? 0) }}</td>
                          <td>{{ date('d M,Y h:i A',strtotime($item->created_at)) }}</td>
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


<div class="modal fade" id="edit_modal" tabindex="-1" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" id="ajax_html">
        
    </div>
  </div>
</div>

@endsection

@section('script')
<script>
  function edit_modal(lot_no_id, lot_activity_id){
      $('#ajax_html').html('<div class="loader-box"><div class="loader-37"></div></div>');
      $.get('{{ url('lot_no/activity') }}',{lot_no_id:lot_no_id, lot_activity_id:lot_activity_id}, function(data){
          $('#ajax_html').removeClass();
          $('#ajax_html').addClass('modal-dialog modal-lg');
          $('#ajax_html').html(data);
      });
  }
  function store_form(event){
      var form = event.target;
      var form_data = $(form).serializeArray();
      var form_name = $('#form_name').val();
      $('#edit_modal').modal('hide');
      if(form_name == 'Lot Activity'){
          $.post('{{ route('lot_no.activity_insert') }}', form_data, function(data){
              $.notify({ title:'Success', message:'Lot Activity Saved Successfully' }, { type:'success', });
              // reload the webpage
              window.location.reload();
          });
      }
  }
</script>
@endsection