@extends('layouts.default-sidebar')
@section('content')

<div class="col-sm-9 col-lg-10">
    <div class="container">
        <h1>Create Purchase Order</h1>
        <div class="card">
            <div class="card-body">
                <form action="">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-gorup">
                                <label>Purchase Order Number <span style="color: #F00">*</span></label>
                                <input type="text" name="ordernumber" class="form-control" required autofocus>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-gorup">
                                <label>Outlets<span style="color: #F00">*</span></label>
                                <select name="outlet" class="form-control" required>
                                    <option value=""></option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-gorup">
                                <label>Suppliers<span style="color: #F00">*</span></label>
                                <select name="supplier" class="form-control" required>
                                    <option value=""></option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Created Date <span style="color: #F00">*</span></label>
                                <input type="text" name="date" readonly class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Note</label>
                                <input type="text" name="note" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row" style="padding-top: 7px">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Search Product <span style="color: #F00">*</span></label>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</section>
@stop
