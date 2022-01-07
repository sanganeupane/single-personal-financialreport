<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\GlobalNetPositionCumulative;
use App\Imports\GlobalNetPositionCumulativeImport;
use App\Imports;
use App\Imports\GlobalNetPositionCumulativeChargeImport;
use App\Imports\GlobalNetPositionDetailsChargeImport;


use Maatwebsite\Excel\Facades\Excel;

class GlobalNetPositionController extends Controller
{


    public function showGlobalDerivative()
    {
        if (\Illuminate\Support\Facades\Auth::user()->role == "admin") {

            $usernames = User::select('*')->where('status', 1)->orderby('name', 'asc')->get();
            return view('imports.imderivative', compact('usernames'));

        } else {
            return redirect()->back()->with('error', 'you are not allowed');
        }
    }

    public function store(Request $request)
    {
        if (\Illuminate\Support\Facades\Auth::user()->role == "admin") {


            $file = $request->file('file');
            $fileName = "f-" . $file->getClientOriginalName();
            $savePath = public_path('upload/');
            $posted_to = $request->posted_to;

//        dd($file);

            try {
                $file->move($savePath, $fileName);
                GlobalNetPositionCumulative::query()->where('posted_to', $posted_to)->delete();


                $data = Excel::import(new GlobalNetPositionCumulativeImport($posted_to), $savePath . $fileName);

            } catch (\Exception $ex) {
                return back()->withStatus('Error');

            } catch (\Illuminate\Database\QueryException $ex) {
                return back()->withStatus('Error');
            }

            return back()->with('success', '');

        } else {
            return redirect()->back()->with('error', 'you are not allowed');
        }
    }

}
