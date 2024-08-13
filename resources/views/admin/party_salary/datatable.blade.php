<div class="dt-ext table-responsive">
    <table class="table table-striped table-hover" id="datatable-excel">
        <thead>
            <tr>
                <th>#</th>
                <th>Party Code</th>
                <th>Name</th>
                <th>Total QTY</th>
                <th>Total Earnings</th>
                <th>Paid Amount</th>
                <th>Balance Amount</th>
                <th>Options</th>
            </tr>
        </thead>
        <tbody>
            @php
                $total_pcs = 0;
                $total_earnings = 0;
                $total_paid_amount = 0;
                $total_balance = 0;
            @endphp
            @foreach ($party as $key => $item)
            <tr>
                <td>{{ $party->firstItem() + $loop->index }}</td>
                <td>{{ $item->party_code ?? 'N/A' }}</td>
                <td>{{ $item->name ?? 'N/A' }}</td>
                @php
                    $pcs = ($item->lot_activities()->where('action','Received From Party')->whereDate('created_at','>=',($request->from_date ?? date('Y-m-d', strtotime('-1 month'))))->whereDate('created_at','<=',($request->to_date ?? date('Y-m-d')))->sum('pcs') ?? 0);
                    $earnings = ($item->lot_activities()->where('action','Received From Party')->whereDate('created_at','>=',($request->from_date ?? date('Y-m-d', strtotime('-1 month'))))->whereDate('created_at','<=',($request->to_date ?? date('Y-m-d')))->sum('total_earning') ?? 0) + ($item->lot_activities()->whereDate('created_at','>=',($request->from_date ?? date('Y-m-d', strtotime('-1 month'))))->whereDate('created_at','<=',($request->to_date ?? date('Y-m-d')))->where('is_paid','1')->where('deleted_at','!=',null)->withTrashed()->sum('total_earning') ?? 0);
                    $paid_amount = ($item->payment_histories()->whereDate('created_at','>=',($request->from_date ?? date('Y-m-d', strtotime('-1 month'))))->whereDate('created_at','<=',($request->to_date ?? date('Y-m-d')))->sum('amount') ?? 0);
                @endphp
                <td>{{ $pcs }}</td>
                <td>{{ $earnings  }}</td>
                <td>{{ $paid_amount }}</td>
                <td>{{ $balance = $earnings - $paid_amount }}</td>
                <td>
                    <a href="{{route('party_salary.show',$item->id)}}?from_date={{$request->from_date}}&to_date={{$request->to_date}}" class="text-primary p-1 f-22" data-toggle="tooltip" title="Show">
                        <i class="fa fa-eye"></i>
                    </a>
                </td>
                @php
                // $earnings = optional($item->lot_activities()->whereDate('created_at','>=',($request->from_date ?? date('Y-m-d', strtotime('-1 month'))))->whereDate('created_at','<=',($request->to_date ?? date('Y-m-d')))->selectRaw('SUM(pcs * price) AS total')->first())->total ?? 0;
                $total_pcs += $pcs ?? 0;
                $total_earnings += $earnings ?? 0;
                $total_paid_amount += $paid_amount ?? 0;
                $total_balance += $balance ?? 0;
            @endphp
            </tr>
            @endforeach
            <tr>
                <th></th>
                <th></th>
                <th>Total:</th>
                <th>{{ $total_pcs ?? 0 }}</th>
                <th>{{ $total_earnings ?? 0 }}</th>
                <th>{{ $total_paid_amount ?? 0 }}</th>
                <th>{{ $total_balance ?? 0 }}</th>
                <th></th>
            </tr>
        </tbody>
    </table>
</div>
<div>
    {{$party->links()}}
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