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
                  <h5>{{ $lot_no->lot_no ?? 'N/A' }}</h5>
                  @if (($lot_no->is_complete ?? '') == '1' || ($lot_no->status ?? '') == 'Send To Party')
                    <span class="badge badge-{{ ($lot_no->is_complete ?? '') == 1 ? 'success':'primary' }}">{{ $lot_no->status ?? 'N/A' }}</span>
                  @else
                    <span class="btn btn-primary btn-xs" data-bs-toggle="modal" data-bs-target="#edit_modal" onclick="edit_modal({{ $lot_no->id }}, 0)">{{ $lot_no->status ?? 'N/A' }}</span>
                  @endif
                </div>
                <hr>
                <ul>
                  <li><b>Color:</b> {{ $lot_no->color->name ?? 'N/A' }}</li>
                  <li><b>Size:</b> {{ $lot_no->size->name ?? 'N/A' }}</li>
                  <li><b>PCS:</b> {{ $lot_no->pcs ?? 'N/A' }}</li>
                  <li><b>Gender:</b> {{ $lot_no->gender ?? 'N/A' }}</li>
                  <li><b>Press:</b> {{ $lot_no->press ?? 'N/A' }}</li>
                </ul>
              </div>
            </div>
        </div>
        <div class="col-xl-9 col-md-12 box-col-12">
          <div class="card mb-0 notification main-timeline">
            <div class="card-header d-flex">
              <h4 class="mb-0">Lot Activity</h4>
              @if (($lot_no->is_complete ?? '') != '1' && ($lot_no->status ?? '') != 'Send To Party')
              <a href="#" class="btn btn-primary ms-auto col-auto" data-bs-toggle="modal" data-bs-target="#edit_modal" onclick="edit_modal({{ $lot_no->id }}, 0)">Add Activity</a>
              @endif
            </div>
            <div class="card-body dark-timeline">
              <ul> 
                  @forelse (App\Models\LotNoActivity::where('lot_no_id',$lot_no->id)->get() as $item)
                  <li class="d-flex">
                      <div class="timeline-dot-secondary"></div>
                      <div class="w-100 ms-3">
                        <h6 class="mb-1">{{ $item->action ?? 'N/A' }} <small>({{ $item->worker->name ?? $item->party->name ?? 'N/A' }})</small>
                          @if (($item->action ?? '') != 'Send To Party' && ($item->action ?? '') != 'Received From Party')
                          <a href="javascript::void({{ $item->id }})" data-bs-toggle="modal" data-bs-target="#edit_modal" onclick="edit_modal({{ $lot_no->id }}, {{ $item->id }})" class="text-warning p-1 f-18" data-toggle="tooltip" title="Edit">
                            <i class="fa fa-edit"></i>
                          </a>
                          @endif
                          @if (auth()->user()->role_as == 'Admin')
                          <a id="Delete-{{$item->id}}" class="text-danger pointer p-1 f-18" data-toggle="tooltip" title="Delete">
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
                                          window.location.href = "{{ route('lot_no.activity.delete',$item->id)}}";
                                      }
                                  })
                              });
                          </script>
                          @endif
                        </h6>
                        <p class="d-flex justify-content-between mb-2">
                          <span class="date-content light-background">
                            Rs.{{ $item->price ?? 'N/A' }}
                            @if (($item->embroidery_action ?? '') == 'Out Source')
                            / {{ $item->embroidery_action ?? '' }} / PCs: {{ $item->pcs ?? 'N/A' }}
                            @endif
                          </span>
                          <span><b>Date:</b> {{ date('d M,Y',strtotime($item->date)) }}</span>
                          <span>{{ date('d M,Y h:i a',strtotime($item->created_at)) }} By {{ $item->created_by->name ?? 'N/A' }}</span>
                        </p>
                        
                        <p class="f-light">
                          {{ $item->remarks ?? 'N/A' }}
                        </p>
                        {{-- <div class="recent-images"> 
                          <ul> 
                            @foreach ($item->receipt->getMedia('imgs') ?? [] as $file)
                            <li class="media_id_{{ $file->id }}"> 
                              <a href="{{ $file->getURL() ?? '#' }}" target="_blank" class="recent-img-wrap"><img src="{{ $file->getURL('thumb') ?? '#' }}" width="50px" alt="chair"></a>
                            </li>
                            @endforeach
                          </ul>
                        </div> --}}
                      </div>
                  </li>
                  @empty
                  <li class="d-flex justify-content-center align-items-center py-5">
                      <h5>Sorry! No Any Activity Available Now...</h5>
                  </li>
                  @endforelse
              </ul>
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