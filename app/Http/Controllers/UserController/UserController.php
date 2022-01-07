<?php

namespace App\Http\Controllers\UserController;

use App\ClientClosing;
use App\FinancialStatement;
use App\GlobalNetPositionCumulative;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showusers()
    {
        if (\Illuminate\Support\Facades\Auth::user()->role == "admin") {


            $userData = User::select('*')->latest()->paginate('15');

            return view('pages.adminusers.showuser', compact('userData'));
        } else {
            return redirect()->back()->with('error', 'you are not allowed');
        }
    }


    public function adduser()
    {
        if (\Illuminate\Support\Facades\Auth::user()->role == "admin") {

            return view('pages.adminusers.adduser');
        } else {
            return redirect()->back()->with('error', 'you are not allowed');
        }
    }

    public function adduseraction(Request $request)
    {
        if (\Illuminate\Support\Facades\Auth::user()->role == "admin") {

            if ($request->isMethod('get')) {


                return redirect()->back()->with('error', 'invalid access');


            }

            if ($request->isMethod('post')) {

                $this->validate($request, [
                    'name' => 'required|min:1|max:230',
                    'username' => 'required|min:3|max:230|unique:users,username',
                    'address' => 'required',
                    'phone' => 'required',
                    'email' => 'required|email|unique:users,email',
                    'password' => 'required|min:1|confirmed',
                    'password_confirmation' => 'required',
                    'image' => 'mimes:jpg,jpe   g,gif,png',
                    'role' => 'required',

                ]);

                $data['name'] = $request->name;
                $data['username'] = $request->username;
                $data['address'] = $request->address;
                $data['phone'] = $request->phone;
                $data['email'] = $request->email;
                $data['password'] = bcrypt($request->password);

                if ($request->hasFile('image')) {
                    $file = $request->file('image');
                    $ext = strtolower($file->getClientOriginalExtension());
                    $imageName = md5(microtime()) . '.' . $ext;
                    $uploadPath = 'uploads/users';
                    if (!$file->move($uploadPath, $imageName)) {
                        return redirect()->with('error', 'File was not uploaded');
                    }

                    $data['image'] = $imageName;
                }


                $data['role'] = $request->role;

                if (User::create($data)) {
                    return redirect()->route('showusers')->with('success', 'user added successfully');
                } else {
                    return redirect()->back()->with('error', 'Data was not inserted');


                }

            }
        } else {
            return redirect()->back()->with('error', 'you are not allowed');
        }

    }

    public function editUser(Request $request)
    {
        if (\Illuminate\Support\Facades\Auth::user()->role == "admin") {

            $id = $request->id;
            $userData = User::findOrFail($id);
            return view('pages.adminusers.edituser', compact('userData'));
        } else {
            return redirect()->back()->with('error', 'you are not allowed');
        }
    }


    public function editUserAction(Request $request)
    {
        if (\Illuminate\Support\Facades\Auth::user()->role == "admin") {

            if ($request->isMethod('get')) {

                return redirect()->back()->with('error', 'you are not allowed to access this page ');


            }
            if ($request->isMethod('post')) {
                $id = $request->id;

                $this->validate($request, [
                    'name' => 'required|min:3|max:250',
                    'username' => 'required|min:3|max:230|unique:users,username,' . $request->id,
                    'address' => 'required',
                    'phone' => 'required',
                    'email' => 'required|email|unique:users,email,' . $request->id,
                    'password' => 'confirmed',
                    'password_confirmation' => '',
                    'image' => 'mimes:jpg,jpeg,gif,png',
                    'role' => 'required',

                ]);

                $data['name'] = $request->name;
                $data['username'] = $request->username;
                $data['address'] = $request->address;
                $data['phone'] = $request->phone;
                $data['email'] = $request->email;

//$dddd=strlen($request->password);
//dd($dddd);
                if (strlen($request->password) > 0) {
                    $data['password'] = bcrypt($request->password);
                } else {


                }

                if ($request->hasFile('image')) {
                    $file = $request->file('image');
                    $ext = strtolower($file->getClientOriginalExtension());
                    $imageName = md5(microtime()) . '.' . $ext;
                    $uploadPath = 'uploads/users';
                    if ($this->deleteFiles($id) && $file->move($uploadPath, $imageName)) {
                        $data['image'] = $imageName;
                    }

                    $data['image'] = $imageName;
                }
                $data['role'] = $request->role;


                if (User::findOrFail($id)->update($data)) {
                    return redirect()->route('showusers')->with('success', 'Data was edited successfully');
                } else {
                    return redirect()->back()->with('error', 'Data was not inserted');

                }

            }
        } else {
            return redirect()->back()->with('error', 'you are not allowed');
        }
    }


    public function deleteFiles($id)
    {
        $findData = User::findOrFail($id);
        $imageName = $findData->image;
        $filePath = 'uploads/users/' . $imageName;
        if (file_exists($filePath) && is_file($filePath)) {
            unlink($filePath);
        }
        return true;
    }


    public function deleteUserAction(Request $request)
    {
        if (\Illuminate\Support\Facades\Auth::user()->role == "admin") {


            $id = $request->id;

            $totalUser = ClientClosing::where('posted_to', '=', $id)->count();
            $totalUsers = FinancialStatement::where('posted_to', '=', $id)->count();
            $totalUserss = GlobalNetPositionCumulative::where('posted_to', '=', $id)->count();

            if ($totalUser > 0 || $totalUsers > 0 || $totalUserss > 0) {
                return redirect()->back()->with('error', 'Sorry!!!!! Data cannot delete related with other');

            } else {

                $this->deleteFiles($id);

                if ($this->deleteFiles($id) && User::findOrFail($id)->delete()) {
                    return redirect()->route("showusers")->with('success', "Data Deleted Successfully");
                }
            }
//        } else {
//            return redirect()->back()->with('error', 'you are not allowed');
        }

    }


    public function updateStatus(Request $request)
    {

        if (\Illuminate\Support\Facades\Auth::user()->role == "admin") {

            if ($request->isMethod('get')) {
                return redirect()->back();

            }
            if ($request->isMethod('post')) {
                $criteria = $request->criteria;
                $findUser = User::findorfail($criteria);
//                dd($findUser);

                if ($findUser->role == "admin") {
                    return redirect()->back()->with('error', 'Sorry!! Admin Status cannot be change');
                } else {
                    if (isset($_POST['active'])) {

                        $findUser->status = 0;
                        $message = 'user status was inactive';

                    }

                }
                if (isset($_POST['inactive'])) {


                    $findUser->status = 1;
                    $message = 'user status was active';

                }
                if ($findUser->update()) {
                    return redirect()->back()->with('error', $message);

                } else {
                    return redirect()->back()->with('error', 'there was a problems');

                }
            }

        } else {
            return redirect()->back()->with('error', 'you are not allowed');
        }

    }

}
