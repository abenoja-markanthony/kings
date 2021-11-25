@extends('layouts.app')

@section('content')

<div class="container mt-4">
    
    <div class="row justify-content-center">

        <div class="alert alert-success" role="alert">
            Backup successfully done!
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        setTimeout(function () {
                window.location.href = '/home';
        }, 3000);
    });
</script>
@endsection
