@extends('layouts.app')
@section('page-css')
    <link href="{{ asset('css/backup.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-10 offset-1  mt-4">
            @if(Session::has('success'))
                {{-- <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('success') }}</p> --}}
                <script>
                    $(document).ready(function(){
                        $("#success").css('display','block');
                        setTimeout(function() {
                            $("#success").css('display','none');
                            // $("#btn_backup" ).css( 'display', 'block' );
                            // $("#btn_execute" ).css( 'display', 'block' );
                        }, 3000);
                    });
                </script>
            @endif

            @if(Session::has('error'))
                <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('error') }}</p>
            @endif
            <div class="card p-4">
                <div class="card-header bg-info">
                    <h4>Backup and Restore</h4>
                </div>

                <div class="card-body mt-4">
                  <div class="row">
                      <div class="col-lg-6">
                            <h4>Backup SQL</h4>
                            <form action="{{ route('backup-sql') }}" method="POST" id="restore_form">
                                @csrf 
                                <div class="input-group mb-3">
                                    <select class="form-control" name="backup_type" >
                                        <option selected value="sqlbackup">Database(Dump SQL)</option>
                                        <option value="fullbackup">Full Backup</option>
                                    </select>
                                    <div class="input-group-append">
                                        <input type="submit" value="Backup"  onclick="showpopup();" class="btn btn-primary" disabled1 id="btn_backup">
                                    </div>
                                </div>
                            </form> <br><br>
                         
                      </div>
                      <div class="col-lg-6">
                        <h4>Execute SQL</h4>
                        <form enctype="multipart/form-data" action="{{ route('restore-sql') }}" method="POST" id="restore_form">
                            @csrf 
                            <div class="input-group mb-3">
                                <input type="file" name="sql" id="file1"  max-file-size="1"  onchange="enabled_btn(this);" required class="form-control" placeholder="Recipient's username" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <input type="submit" value="Execute"  onclick="showpopup();" name="execute" class="btn btn-primary" disabled id="btn_execute">
                                </div>
                            </div>
                        </form>
                      </div>
                  </div>
                </div>
              </div>  
        </div>
    </div>
</div>
<div id="loading">
    <img src="{{ asset('images/22.gif') }}" alt="Company Logo" class="logo" id='gif' >
   <p id="p1"> Downloading backup...</p>
</div>
<div id="success">
    <img src="{{ asset('images/check.gif') }}" alt="Company Logo" class="logo" id='gif' >
   <p id="p1"> Process Completed!</p>
</div>
        

        
@endsection



<script>
    function showpopup()
    {
        $("#loading").css('display','block');
        // $("#btn_backup" ).css( 'display', 'none' );
        // $("#btn_execute" ).css( 'display', 'none' );
    }
</script>

<script>
    function enabled_btn(file)
    {
        var FileSize = file.files[0].size / 1024 / 1024; // in MB
        if (FileSize > 20) {
            alert('File size exceeds 20 MB');
           $("#file1").val(''); //for clearing with Jquery
        } else {
            $("#btn_execute").prop('disabled',false);
        }
    }
</script>