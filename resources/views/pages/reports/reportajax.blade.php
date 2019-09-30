@foreach($reportsale as $r)
<tr>
    <td>{{$r->date}}</td>
    <td>{{$r->id}}</td>
    <td>{{$r->outlet_id}}</td>
    <td>{{$r->payment_method_name}}</td>
    <td>{{$r->subtotal}}</td>
    <td>{{$r->tax}}</td>
    <td>{{$r->grandtotal}}</td>
</tr>
@endforeach