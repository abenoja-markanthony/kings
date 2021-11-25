<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Redirect;
use Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Middleware\RevalidateBackHistory;


class BackupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backup.index-backup');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function restore(Request $request)
    {

        $path=request('sql');
        $file = $request->file('sql');

        if($file!=''){
            if($file->getClientOriginalExtension()=='sql'){
                DB::unprepared(file_get_contents($path));
                return Redirect::back()->with('success', 'SQL has been restored successfully.');
            }else{
                return Redirect::back()->with('error', 'Invalid file! , please select (.sql) file only.');
            }
        }else{
            return Redirect::back()->with('error', 'Please select a file!');
        }
      
        
        
      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function backup(Request $request)
    {


        if(request('backup_type')=='sqlbackup'){
            \Illuminate\Support\Facades\Artisan::call('backup:run --only-db');
            return Redirect::back()->with('success', 'SQL has been backup successfully.');
        }else{
            \Illuminate\Support\Facades\Artisan::call('backup:run');
            return Redirect::back()->with('success', 'SQL has been backup successfully.');
        }
       
    }

  

}
