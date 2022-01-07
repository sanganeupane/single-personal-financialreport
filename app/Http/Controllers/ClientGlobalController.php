<?php

namespace App\Http\Controllers;

use App\Imports\GlobalNetPositionCumulativeImport;
use App\User;
use Illuminate\Http\Request;
use App\ClientClosing;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ClientClosingImport;
use App\Imports\ClientExpiredImport;
use App\Imports\ClientClosingChargesImport;
use App\Imports\ClientExpiredChargesImport;
use App\Exports\ClientClosingExport;


class ClientGlobalController extends Controller
{

    public function showGlobal()
    {
        if (\Illuminate\Support\Facades\Auth::user()->role == "admin") {

            $usernames = User::select('*')->where('status', 1)->orderby('name', 'asc')->get();
            return view('imports.imnet', compact('usernames'));
        } else {
            return redirect()->back()->with('error', 'you are not allowed');
        }
    }

    public function store(Request $request)
    {

        if (\Illuminate\Support\Facades\Auth::user()->role == "admin") {

            $method_type = $request->method_type;
//        echo "hello";
            $file = $request->file('file');
            $fileName = "f-" . $file->getClientOriginalName();
            $savePath = public_path('upload/');

            $posted_to = $request->posted_to;


            try {
                $file->move($savePath, $fileName);
                ClientClosing::query()->where('posted_to', $posted_to)->delete();


                $data = Excel::import(new ClientClosingImport($posted_to), $savePath . $fileName);
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
