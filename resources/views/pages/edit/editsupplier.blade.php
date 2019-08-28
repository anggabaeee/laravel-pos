@extends('layouts.default-sidebar')
@section('content')
<div class="col-sm-9 col-lg-10">
    <div class="container">
        <h1>Edit Supplier : </h1>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12" style="text-align: right;">
                        <a href="/setting/editsupplierdelete/{{ $supplier->id }}"><button class="btn btn-danger">Delete
                                Supplier</button></a>
                    </div>
                </div>
                <form method="post" action="/setting/editsupplierupdate/{{ $supplier->id }}">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Supplier Name <span style="color: #F00">*</span></label>
                                <input type="text" name="supplier_name" class="form-control" required maxlength="499"
                                    value="{{ $supplier->supplier_name }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Email <span style="color: #F00">*</span></label>
                                <input type="text" name="email" class="form-control" required maxlength="100"
                                    value="{{ $supplier->email }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Telephone <span style="color: #F00">*</span></label>
                                <input type="text" name="telephone" class="form-control" required maxlength="50"
                                    value="{{ $supplier->telephone }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Fax</label>
                                <input type="text" name="fax" class="form-control" maxlength="50" autocomplete="off"
                                    value="{{ $supplier->fax }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Supplier Addres <span style="color: #F00;">*</span></label>
                                <textarea name="supplier_addres" class="form-control" rows="4"
                                    value="{{ $supplier->supplier_addres }}"
                                    style="width: 100%">{{ $supplier->supplier_addres }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Status <span style="color: #F00">*</span></label>
                                <select name="status" class="form-control" required>
                                    @if ($supplier->status === 1)
                                    <option selected value="1">Active</option>
                                    <option value="0">Inactive</option>
                                    @else
                                    <option value="1">Active</option>
                                    <option selected value="0">Nonactive</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Supplier Tax</label>
                                <input type="text" name="supplier_tax" class="form-control" required maxlength="100"
                                    value="{{ $supplier->supplier_tax }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" style="width: 100%" value="add">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row" style="margin-top: 15px">
            <div class="col-md-2">
                <a href="{{ url('/setting/suppliers') }}">
                    <button class="btn btn-secondary" style="width: 60%"><i class="fa fa-chevron-left">
                            Back</i></button>
                </a>
            </div>
        </div>
        <br>
        <br>
        <br>
    </div>
</div>
@stop
</section>
