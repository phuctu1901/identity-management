<table class="card-block table table-hover table-bordered table-striped toggle-arrow-tiny"
       id="exampleFooAccordion"
       data-sorting="true" data-show-toggle="true" data-toggle-column="last" style="background: white">
    <thead>
    <tr>
        <th data-name="title">ID</th>
        <th data-name="address">My DID</th>
        <th data-name="address">Their DID</th>
        <th data-name="address">Label</th>
        <th data-name="address">Created At</th>
        <th data-name="address">Updated At</th>
        <th data-name="status">State</th>
    </tr>
    </thead>
    <tbody>
    @foreach($data as $row)
        <tr>
            <td><a href="/connection/detail/{{$row->id}}">{{ $row->id }}</a> </td>
            <td>{{$row->my_did}}</td>
            <td>{{$row->their_did}}</td>
            <td>{{$row->their_label}}</td>
            <td>{{$row->created_at}}</td>
            <td>{{$row->updated_at}}</td>
            <td>
                <span class="badge badge-table @if($row->state==='response') badge-success @else badge-danger @endif"> @if($row->state==='response') Connected @else Await @endif</span>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

{!! $data->links() !!}


{{--'id',--}}
{{--'invitation_key',--}}
{{--'invitation_mode',--}}
{{--'initiator',--}}
{{--'their_label',--}}
{{--'my_did',--}}
{{--'their_did',--}}
{{--'routing_state',--}}
{{--'state',--}}
{{--'accept',--}}
{{--'created_at',--}}
{{--'updated_at'--}}
