<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function registration()
    {
        return view('pages.registration');
    }

    public function registrationStore(Request $request)
    {
        // dd($request->all());
        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        ]);

        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate);
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => bcrypt($request->password),
            'role' => 'user'
        ]);

        notify()->success('Registered successful.');
        return redirect()->route('user.login');
    }

    public function loginForm()
    {
        return view('pages.login');
    }

    public function doLogin(Request $request)
    {
        // dd($request->all());
        $validate = Validator::make($request->all(), [

            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate);
        }

        $credential = $request->except('_token');
        $login = auth()->attempt($credential);
        if ($login) {
            return redirect()->route('note.list');
        }

        notify()->error('Invalid credentials.');
        return redirect()->back();
    }

    public function profileView()
    {
        return view('pages.profile.view');
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('user.login');
    }

    public function editProfile($userId)
    {
        $users = User::find($userId);

        return view('pages.profile.edit', compact('users'));
    }

    public function updateProfile(Request $request, $userId)
    {
        // dd($request->all());

        $users = User::find($userId);

        if ($users) {
            $fileName = $users->image;

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $fileName = date('Ymdhis') . '.' . $file->getClientOriginalExtension();
                $file->storeAs('/uploads', $fileName);
            }

            $users->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'image' => $fileName

            ]);

            notify()->success('Updated successfully.');
            return redirect()->route('profile.view');
        }
    }

    public function adminDashboard()
    {
        $users = User::where('role', 'user')->count();
        $notes = Note::count();
        return view('pages.admin.dashboard', compact('users', 'notes'));
    }

    public function userList()
    {
        $users = User::where('role', 'user')->get();
        return view('pages.admin.userList', compact('users'));
    }

    public function deleteUser($userId)
    {
        $user = User::findOrFail($userId);
        Note::where('user_id', $userId)->delete();
        $user->delete();

        notify()->success('User deleted successfully with all data.');
        return redirect()->back();
    }
}
