<div class="dt-ext table-responsive">
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Phone Number</th>
                <th>Worker Role</th>
                <th>Total QTY</th>
                <th>Total Earnings</th>
                <th>Options</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($worker as $key => $item)
            <tr>
                <td>{{ $worker->firstItem() + $loop->index }}</td>
                <td>{{ $item->name ?? 'N/A' }}</td>
                <td>{{ $item->phone ?? 'N/A' }}</td>
                <td>{{ $item->role ?? 'N/A' }}</td>
                <td>{{ $item->lot_activities->where('created_at','>=',($request->from_date ?? date('Y-m-d', strtotime('-1 month'))))->where('created_at','<=',($request->to_date ?? date('Y-m-d')))->sum('pcs') ?? 'N/A' }}</td>
                <td>
                    {{ $item->lot_activities->where('created_at','>=',($request->from_date ?? date('Y-m-d', strtotime('-1 month'))))->where('created_at','<=',($request->to_date ?? date('Y-m-d')))->sum(function($activity) {
                        return $activity->pcs * $activity->price;
                    }) ?? 'N/A' }}
                </td>
                {{-- <td>{{ $item->lot_activities()->selectRaw('SUM (pcs*price) AS total')->first()->total ?? 'N/A' }}</td> --}}
                {{-- <td>
                    {{ $item->lot_activities()->selectRaw('SUM(pcs * price) AS total')->first()->total ?? 'N/A' }}
                </td> --}}
                <td>
                    <a href="{{route('worker_salary.show',$item->id)}}?from_date={{$request->from_date}}&to_date={{$request->to_date}}" class="text-primary p-1 f-22" data-toggle="tooltip" title="Show">
                        <i class="fa fa-eye"></i>
                    </a>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
</div>
<div>
    {{$worker->links()}}
</div>
