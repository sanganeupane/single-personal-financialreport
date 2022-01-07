<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FinancialYear;


class FinancialYearController extends Controller
{
    public function showfyear()
    {
        if (\Illuminate\Support\Facades\Auth::user()->role == "admin") {

            $fyears = FinancialYear::all()->sortByDesc('id');
            return view('SetData.fyear', compact('fyears'));
        } else {
            return redirect()->back()->with('error', 'you are not allowed');
        }
    }

    public function fyearstore(Request $request)
    {


        if (\Illuminate\Support\Facades\Auth::user()->role == "admin") {

            $fyear = new FinancialYear([
                'year' => $request->year,

            ]);
            try {

                $fyear->save();

            } catch (\Illuminate\Database\QueryException $e) {
                $errorCode = $e->errorInfo[1];
                return back()->withStatus('Duplicate');

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


    public function deletefyear($id)
    {
        $fyears = FinancialYear::findOrFail($id);
        $fyears->delete();
        return back()->with('deleted', '');


    }

}
