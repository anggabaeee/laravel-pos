@extends('layouts.default-sidebar')
@section('content')
<style>
    h1 {
        color: #5f6468;
    }

    .panel {
        margin-bottom: 10px;
    }

    @media (max-width: 767.98px) {
        .panel {
            margin-bottom: 40px;
        }
    }

    /* customer */
    .master-form {
        background-color: white;
        padding: 20px;
        border-radius: 10px;
    }

    .form-group label {
        font-weight: bold;
    }

</style>
<div class="col-sm-9 col-lg-10 mt">

        <h1 class="mt-2">Add Gift Card</h1>
</div>
</section>
@stop
