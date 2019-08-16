@extends('layouts.default-sidebar')
@section('content')
<style>
    .panel {
        background-color: white;
        padding: 15px;
        border-radius: 10px;
    }

    .panel button {
        background-color: #0079c0;
        border-color: #015d93;
        font-family: Arial, Helvetica, sans-serif;
    }


</style>
<div class="col-sm-9 col-sm-offset-10 col-lg-10 col-lg-offset-2 main">
    <div class="container mt-3">
        <h1>Add New Expenses</h1>
        <form action="" class="mt-2 panel">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Expenses Number
                            <span style="color: #F00">*</span>
                        </label>
                        <input class="form-control" type="text" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Outlets
                            <span style="color: #F00">*</span>
                        </label>
                        <select class="form-control" type="text" required>
                            <option value="">Choose Outlet</option>
                            <option value="3">Uniqlo - Bugis Outlet</option>
                            <option value="2">Uniqlo - Changi Outlet</option>
                            <option value="1">Uniqlo - NEX Outlet</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Date
                            <span style="color: #F00">*</span>
                        </label>
                        <input class="form-control" type="date" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="">Reason
                            <span style="color: #F00">*</span>
                        </label>
                        <textarea name="reason" class="form-control" style="width: 100%; height: 70px;"
                            required></textarea>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="">Amount (SGD)
                            <span style="color: #F00">*</span>
                        </label>
                        <input class="form-control" type="text" required>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="">Date
                            <span style="color: #F00">*</span>
                        </label>
                        <select name="category" class="form-control" required>
                            <option value="">Choose Expenses Category</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">File (Less than 2MB)<span style="color: #F00">*</span><br>
                        <input type="file" id="real-file" hidden="hidden" />
                        <p class="border border-secondary rounded px-5 mt-2" id="custom-text" style=>No file chosen, yet.</p>
                         <button type="button" id="custom-button" class="btn btn-primary">CHOOSE A FILE</button>        
                        </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                        <button class="btn btn-primary" style="width: 100%;">Add</button>
                    </div>
                </div>
            </div>
        </form>
        <div class="col-md-2">
            <div class="form-group">
                <button class="btn btn-primary" style="width: 100%;">Add</button>
            </div>
        </div>
    </div>
</div>
<script>
const realFileBtn = document.getElementById("real-file");
const customBtn = document.getElementById("custom-button");
const customTxt = document.getElementById("custom-text");

customBtn.addEventListener("click", function() {
  realFileBtn.click();
});
realFileBtn.addEventListener("change", function() {
  if (realFileBtn.value) {
    customTxt.innerHTML = realFileBtn.value;
  } else {
    customTxt.innerHTML = "No file chosen, yet.";
  }
});

</script>
</section>
@stop
