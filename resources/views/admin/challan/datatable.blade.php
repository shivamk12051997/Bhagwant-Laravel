<div class="dt-ext table-responsive">
    <table class="table table-striped table-hover nowrap" id="datatable-excel">
        <thead>
            <tr>
                <th>#</th>
                <th>Challan No.</th>
                <th>Date</th>
                <th>Party Name</th>
                <th>{{ request()->in_out == 'Out' ? 'Sent' : 'Received' }} PCS</th>
                <th>Price</th>
                <th>Total Amount</th>
                <th>Lot No.</th>
                <th>Options</th>
            </tr>
        </thead>
        <tbody>
            @php
                $total_sent_pcs = 0;
                $total_received_pcs = 0;
                $total_amount = 0;
            @endphp
            @foreach ($challan as $key => $item)
            <tr>
                <td>{{ $challan->firstItem() + $loop->index }}</td>
                <td>{{ $item->challan_no ?? 'N/A' }}</td>
                <td>{{ ($item->date ?? '') == '' ? "N/A" : date('d M,Y',strtotime($item->date)) }}</td>
                <td>{{ $item->party->name ?? 'N/A' }}</td>
                <td>{{ $item->lot_activities->sum('pcs') ?? 'N/A' }}</td>
                <td>{{ $item->price ?? 'N/A' }}</td>
                <td>{{ $item->lot_activities->sum('pcs') * ($item->price ?? 0) }}</td>
                <td>
                    @foreach (($item->lot_activities ?? []) as $lot_activity)
                        @php
                            $lot_no = App\Models\LotNo::find($lot_activity->lot_no_id);
                        @endphp
                        <a href="{{route('lot_no.show',$lot_no->id)}}" class="badge badge-{{ $lot_no->is_complete == 1 ? 'success':'primary' }}">{{ $lot_no->lot_no ?? '-' }}</a>
                    @endforeach
                </td>
                <td>
                    <a href="#" class="text-warning p-1 f-22" data-toggle="tooltip" title="Edit" data-bs-toggle="modal" data-bs-target="#edit_modal" onclick="edit_modal({{ $item->id }},'{{ $item->in_out }}')">
                        <i class="fa fa-edit"></i>
                    </a>
                </td>
                @php
                $total_sent_pcs += $item->sent_pcs ?? 0;
                $total_received_pcs += $item->received_pcs ?? 0;
                $total_amount += $item->total_amount ?? 0;
            @endphp
            </tr>
            @endforeach
            <tr>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th>Total: {{ $total_sent_pcs ?? 0 }}</th>
                <th>Total: {{ $total_received_pcs ?? 0 }}</th>
                <th></th>
                <th>Total: {{ $total_amount ?? 0 }}</th>
                <th></th>
                <th></th>
            </tr>
        </tbody>
    </table>
</div>
<div>
    {{$challan->links()}}
</div>

<script>
    $(document).ready(function() {
    var title = "{{ 'All Worker Salary - '.date('d M, Y', strtotime($request->from_date)). ' - '.date('d M, Y', strtotime($request->to_date)) }}";

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