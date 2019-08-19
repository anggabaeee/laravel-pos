@extends('layouts.default-sidebar')
@section('content')
<style>
    .form-group label {
        font-weight: normal;
    }

</style>
<div class="col-sm-9 col-lg-10">
    <div class="container">
        <h1>Create Return Order</h1>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Customers <span style="color: #F00">*</span></label>
                            <div style="position: relative; width: 294px;">
                                <select name="searchcustomers" class="form-control" style="height: 60px;">
                                    <option value="">Search Customers</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Outlets <span style="color: #F00">*</span></label>
                            <select name="outlets" placeholder="Search Outlets" class="form-control">
                                <option value="">Search Outlets</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-7">
                        <div class="form-group">
                            <label>Remark</label>
                            <textarea name="remark" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <label>Refund Amount (SGD)</label>
                    </div>
                    <div class="col-md-4">
                        <input type="text" name="sgd" class="form-control">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
@stop
