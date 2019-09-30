@foreach($todaysale as $t)
<div class="row isimodel" style="color: #5f6468; background-color: #ededed;">
    <div id="divcash" class="col-sm-12 mt-3">Cash : {{ $t->cash }}</div>
</div>
<div class="row isimodel">
    <div id="divnett" class="col-sm-12 mt-3">Nett : {{ $t->nett }}</div>
</div>
<div class="row isimodel" style="background-color: #ededed; color: #5f6468;">
    <div id="divvisa" class="col-sm-12 mt-3">VISA : {{ $t->visa }}</div>
</div>
<div class="row isimodel" style="color: #5f6468;">
    <div id="divmaster" class="col-sm-12 mt-3">MASTER : {{ $t->master_card }}</div>
</div>
<div class="row isimodel" style="background-color: #005b8a; color:white;">
    <div id="divcheq" class="col-sm-12 mt-3">Cheque : {{ $t->cheque }}</div>
</div>
@endforeach