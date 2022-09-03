<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;
use Spatie\Permission\Models\Permission;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Permission::create([
        //   'name' => 'can restore user'
        // ]);
        // User::find(1)->assignRole('Super Admin');
        return view('home',[
            'users' => User::latest()->paginate(10)
        ]);
    }
    public function import(Request $request)
    {
        Excel::import(new UsersImport, $request->file('import'));
        return back();
    }
}
