<table class="table table-hover table-bordered table-striped toggle-arrow-tiny"
       id="exampleFooAccordion"
       data-sorting="true" data-show-toggle="true" data-toggle-column="last">
    <thead>
    <tr>
        <th data-name="title">ID</th>
        <th data-name="address">TransactionID</th>
        <th data-name="address">Ngày cấp</th>
        <th data-name="status">Trạng thái</th>
    </tr>
    </thead>
    <tbody>
    @foreach($data as $row)
        <tr>
            <td><a href="/did/detail/{{$row->uuid}}">{{ $row->code }}</a> </td>
            <td>{{$row->cred_ex_id}}</td>
            <td>{{$row->created_at}}</td>
            <td>
                <span class="badge badge-table @if($row->isIssued===1) badge-success @else badge-danger @endif"> @if($row->isIssued===1) Active @else Suspend @endif</span>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

{!! $data->links() !!}


