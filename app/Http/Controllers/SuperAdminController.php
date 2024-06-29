<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Models\Activity;

class SuperAdminController extends Controller
{
    public function index()
    {
        return view('pages.superadmin.dashboard');
    }

    public function indexSuperadmins()
    {
        $superadmins = User::where('role', 'superadmin')->get();
        return view('pages.superadmin.admins.index', compact('superadmins'));
    }

    public function create()
    {
        return view('pages.superadmin.admins.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'superadmin',
        ]);

        return redirect()->route('superadmin.superadmins.index')->with('success', 'Superadmin created successfully.');
    }

    public function edit($id)
    {
        $superadmin = User::findOrFail($id);
        return view('pages.superadmin.admins.edit', compact('superadmin'));
    }

    public function update(Request $request, $id)
    {
        $superadmin = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $superadmin->id,
        ]);

        if ($request->password) {
            $request->validate(['password' => 'string|min:8|confirmed']);
            $superadmin->password = Hash::make($request->password);
        }

        $superadmin->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $superadmin->password,
        ]);

        return redirect()->route('superadmin.superadmins.index')->with('success', 'Superadmin updated successfully.');
    }

    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return redirect()->route('superadmin.superadmins.index')->with('success', 'Superadmin deleted successfully.');
    }

    public function logs()
    {
        $logs = Activity::all();
        return view('pages.superadmin.logs', compact('logs'));
    }
}
