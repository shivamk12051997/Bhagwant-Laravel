@extends('layouts.admin.app')

@section('title', 'Dashboard')

@section('css')
   
@endsection

@section('breadcrumb-items')
    {{-- <li class="breadcrumb-item">Dashboard</li> --}}
@endsection

@section('content')
<div class="container-fluid">
    <div class="row widget-grid">
        <a class="col-md-3" href="{{ route('lot_no.index') }}?page_name=All">
          <div class="card small-widget"> 
            <div class="card-body primary"> <span class="f-light">Total Lot No.</span>
              <div class="d-flex align-items-end gap-1">
                <h4 class="text-dark">{{ App\Models\LotNo::count(); }}</h4>
                {{-- <span class="font-primary f-12 f-w-500"><i class="icon-arrow-up"></i><span>+50%</span></span> --}}
              </div>
              <div class="bg-gradient font-primary"> 
                <i data-feather="gift"></i>
              </div>
            </div>
          </div>
        </a>
        <a class="col-md-3" href="{{ route('lot_no.index') }}?page_name=Complete">
          <div class="card small-widget"> 
            <div class="card-body warning"> <span class="f-light">Complete Lot No.</span>
              <div class="d-flex align-items-end gap-1">
                <h4 class="text-dark">{{ App\Models\LotNo::where('is_complete', '1')->count(); }}</h4>
                {{-- <span class="font-warning f-12 f-w-500"><i class="icon-arrow-up"></i><span>+50%</span></span> --}}
              </div>
              <div class="bg-gradient font-warning"> 
                <i data-feather="gift"></i>
              </div>
            </div>
          </div>
        </a>
        <a class="col-md-3" href="{{ route('lot_no.index') }}?page_name=Pending">
          <div class="card small-widget"> 
            <div class="card-body secondary"> <span class="f-light">Pending Lot No.</span>
              <div class="d-flex align-items-end gap-1">
                <h4 class="text-dark">{{ App\Models\LotNo::where('is_complete', '0')->count(); }}</h4>
                {{-- <span class="font-secondary f-12 f-w-500"><i class="icon-arrow-up"></i><span>+50%</span></span> --}}
              </div>
              <div class="bg-gradient font-secondary"> 
                <i data-feather="gift"></i>
              </div>
            </div>
          </div>
        </a>
    </div>
    <div class="row">
      <div class="col-md-12">
        <h5 class="text-primary">Lot Processing Activity</h5>
        <hr>
      </div>
      <a class="col-md-3" href="{{ route('lot_no.index') }}?status=Cutting">
        <div class="card small-widget"> 
          <div class="card-body secondary"> <span class="f-light">Cutting</span>
            <div class="d-flex align-items-end gap-1">
              <h4 class="text-dark">{{ App\Models\LotNo::where('status', 'Cutting')->count(); }}</h4>
              {{-- <span class="font-secondary f-12 f-w-500"><i class="icon-arrow-up"></i><span>+50%</span></span> --}}
            </div>
            <div class="bg-gradient font-secondary"> 
              <i data-feather="gift"></i>
            </div>
          </div>
        </div>
      </a>
      <a class="col-md-3" href="{{ route('lot_no.index') }}?status=Printing/Embroidery">
        <div class="card small-widget"> 
          <div class="card-body secondary"> <span class="f-light">Printing/Embroidery</span>
            <div class="d-flex align-items-end gap-1">
              <h4 class="text-dark">{{ App\Models\LotNo::where('status', 'Printing/Embroidery')->count(); }}</h4>
              {{-- <span class="font-secondary f-12 f-w-500"><i class="icon-arrow-up"></i><span>+50%</span></span> --}}
            </div>
            <div class="bg-gradient font-secondary"> 
              <i data-feather="gift"></i>
            </div>
          </div>
        </div>
      </a>
      <a class="col-md-3" href="{{ route('lot_no.index') }}?status=Sewing Machine">
        <div class="card small-widget"> 
          <div class="card-body secondary"> <span class="f-light">Sewing Machine</span>
            <div class="d-flex align-items-end gap-1">
              <h4 class="text-dark">{{ App\Models\LotNo::where('status', 'Sewing Machine')->count(); }}</h4>
              {{-- <span class="font-secondary f-12 f-w-500"><i class="icon-arrow-up"></i><span>+50%</span></span> --}}
            </div>
            <div class="bg-gradient font-secondary"> 
              <i data-feather="gift"></i>
            </div>
          </div>
        </div>
      </a>
      <a class="col-md-3" href="{{ route('lot_no.index') }}?status=Overlock">
        <div class="card small-widget"> 
          <div class="card-body secondary"> <span class="f-light">Overlock</span>
            <div class="d-flex align-items-end gap-1">
              <h4 class="text-dark">{{ App\Models\LotNo::where('status', 'Overlock')->count(); }}</h4>
              {{-- <span class="font-secondary f-12 f-w-500"><i class="icon-arrow-up"></i><span>+50%</span></span> --}}
            </div>
            <div class="bg-gradient font-secondary"> 
              <i data-feather="gift"></i>
            </div>
          </div>
        </div>
      </a>
      <a class="col-md-3" href="{{ route('lot_no.index') }}?status=Linking">
        <div class="card small-widget"> 
          <div class="card-body secondary"> <span class="f-light">Linking</span>
            <div class="d-flex align-items-end gap-1">
              <h4 class="text-dark">{{ App\Models\LotNo::where('status', 'Linking')->count(); }}</h4>
              {{-- <span class="font-secondary f-12 f-w-500"><i class="icon-arrow-up"></i><span>+50%</span></span> --}}
            </div>
            <div class="bg-gradient font-secondary"> 
              <i data-feather="gift"></i>
            </div>
          </div>
        </div>
      </a>
      <a class="col-md-3" href="{{ route('lot_no.index') }}?status=Kaj Button">
        <div class="card small-widget"> 
          <div class="card-body secondary"> <span class="f-light">Kaj Button</span>
            <div class="d-flex align-items-end gap-1">
              <h4 class="text-dark">{{ App\Models\LotNo::where('status', 'Kaj Button')->count(); }}</h4>
              {{-- <span class="font-secondary f-12 f-w-500"><i class="icon-arrow-up"></i><span>+50%</span></span> --}}
            </div>
            <div class="bg-gradient font-secondary"> 
              <i data-feather="gift"></i>
            </div>
          </div>
        </div>
      </a>
      <a class="col-md-3" href="{{ route('lot_no.index') }}?status=Thread Cutting">
        <div class="card small-widget"> 
          <div class="card-body secondary"> <span class="f-light">Thread Cutting</span>
            <div class="d-flex align-items-end gap-1">
              <h4 class="text-dark">{{ App\Models\LotNo::where('status', 'Thread Cutting')->count(); }}</h4>
              {{-- <span class="font-secondary f-12 f-w-500"><i class="icon-arrow-up"></i><span>+50%</span></span> --}}
            </div>
            <div class="bg-gradient font-secondary"> 
              <i data-feather="gift"></i>
            </div>
          </div>
        </div>
      </a>
      <a class="col-md-3" href="{{ route('lot_no.index') }}?status=Press">
        <div class="card small-widget"> 
          <div class="card-body secondary"> <span class="f-light">Press</span>
            <div class="d-flex align-items-end gap-1">
              <h4 class="text-dark">{{ App\Models\LotNo::where('status', 'Press')->count(); }}</h4>
              {{-- <span class="font-secondary f-12 f-w-500"><i class="icon-arrow-up"></i><span>+50%</span></span> --}}
            </div>
            <div class="bg-gradient font-secondary"> 
              <i data-feather="gift"></i>
            </div>
          </div>
        </div>
      </a>
      <a class="col-md-3" href="{{ route('lot_no.index') }}?status=Packing">
        <div class="card small-widget"> 
          <div class="card-body secondary"> <span class="f-light">Packing</span>
            <div class="d-flex align-items-end gap-1">
              <h4 class="text-dark">{{ App\Models\LotNo::where('status', 'Packing')->count(); }}</h4>
              {{-- <span class="font-secondary f-12 f-w-500"><i class="icon-arrow-up"></i><span>+50%</span></span> --}}
            </div>
            <div class="bg-gradient font-secondary"> 
              <i data-feather="gift"></i>
            </div>
          </div>
        </div>
      </a>
    </div>
</div>

@endsection

@section('script')

@endsection