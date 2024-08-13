<div class="dt-ext table-responsive">
    <table class="table table-striped table-hover nowrap" id="datatable-excel">
        <thead>
            <tr>
                <th>#</th>
                <th>Challan No.</th>
                <th>Date</th>
                <th>Created At</th>
                <th>Party Name</th>
                <th>Sent PCs</th>
                <th>Received PCs</th>
                <th>Remaining PCs</th>
                <th>Price</th>
                <th>Sent Total Amount</th>
                <th>Received Total Amount</th>
                <th>Lot No.</th>
                <th>Options</th>
            </tr>
        </thead>
        <tbody>
            @php
                $total_sent_pcs = 0;
                $total_received_pcs = 0;
                $total_remaining_pcs = 0;
                $sent_total_amount = 0;
                $received_total_amount = 0;
            @endphp
            @foreach ($challan as $key => $item)
            <tr>
                <td>{{ $challan->firstItem() + $loop->index }}</td>
                <td>{{ $item->challan_no ?? 'N/A' }}</td>
                <td>{{ ($item->date ?? '') == '' ? "N/A" : date('d M,Y',strtotime($item->date)) }}</td>
                <td>{{ date('d M,Y',strtotime($item->created_at)) }}</td>
                <td>{{ $item->party->name ?? 'N/A' }}</td>
                <td>{{ $sent_pcs = $item->sent_pcs->sum('pcs') ?? 'N/A' }}</td>
                <td>{{ $received_pcs = ($item->received_pcs ?? '') == '' ? 0 : $item->received_pcs->sum('pcs') }}</td>
                <td>{{ $remaining_pcs = $sent_pcs - $received_pcs }}</td>
                <td>{{ $item->price ?? 'N/A' }}</td>
                <td>{{ $sent_pcs * ($item->price ?? 0) }}</td>
                <td>{{ $received_pcs * ($item->price ?? 0) }}</td>
                <td>
                    @foreach (($item->lot_activities ?? []) as $lot_activity)
                        @php
                            $lot_no = App\Models\LotNo::find($lot_activity->lot_no_id);
                        @endphp
                        <a href="{{route('lot_no.show',$lot_no->id)}}" class="badge badge-{{ $lot_no->is_complete == 1 ? 'success':'primary' }}">{{ $lot_no->lot_no ?? '-' }}</a>
                    @endforeach
                </td>
                <td>
                    <a href="{{ route('challan.show', $item->id) }}" class="text-primary p-1 f-22" data-toggle="tooltip" title="View">
                        <i class="fa fa-eye"></i>
                    </a>
                    <a href="#" class="text-warning p-1 f-22" data-toggle="tooltip" title="Edit" data-bs-toggle="modal" data-bs-target="#edit_modal" onclick="edit_modal({{ $item->id }},'{{ $item->in_out }}')">
                        <i class="fa fa-edit"></i>
                    </a>
                </td>
                @php
                    $total_sent_pcs += $item->lot_activities->sum('pcs');
                    $total_received_pcs += $received_pcs;
                    $total_remaining_pcs += $remaining_pcs;
                    $sent_total_amount += $sent_pcs * ($item->price ?? 0);
                    $received_total_amount += $received_pcs * ($item->price ?? 0);
                @endphp
            </tr>
            @endforeach
            <tr>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th>Total: {{ $total_sent_pcs ?? 0 }}</th>
                <th>Total: {{ $total_received_pcs ?? 0 }}</th>
                <th>Total: {{ $total_remaining_pcs ?? 0 }}</th>
                <th></th>
                <th>Total: {{ $sent_total_amount ?? 0 }}</th>
                <th>Total: {{ $received_total_amount ?? 0 }}</th>
                <th></th>
                <th></th>
            </tr>
        </tbody>
    </table>
</div>
<div>
    {{$challan->links()}}
</div>

@php
if($request->from_date && $request->to_date){
    $title = "Challan ".$request->in_out." - ".date('d M, Y', strtotime($request->from_date)). ' - '.date('d M, Y', strtotime($request->to_date));
}else{
    $title = "Challan ".$request->in_out;
}
@endphp

<script>
    $(document).ready(function() {
    var title = "{{ $title }}";

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