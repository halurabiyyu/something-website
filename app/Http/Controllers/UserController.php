<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Log;


class UserController extends Controller
{
    public function index()
    {
        $breadcrumb = (object)[
            'title' => 'Daftar User',
            'list' => ['Home', 'User']
        ];

        $page = (object)[
            'title' => 'Daftar user yang terdaftar dalam sistem'
        ];

        $activeMenu = 'user';

        return view('admin.user.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu]);
    }

    public function create() {}

    public function store(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|string',
                'username' => 'required|string|max:100',
                'name' => 'required|string|max:100',
                'password' => 'required|string',
            ]);

            UserModel::create([
                'level_id' => 1,
                'email' => $request->email,
                'username' => $request->username,
                'name' => $request->name,
                'password' => Hash::make($request->password),
            ]);
            return redirect('/login')->with('success', 'register successful, please login');
        } catch (\Exception $e) {
            return redirect('/register')->with('error', $e->getMessage());
            //throw $th;
        }
    }

    public function list(Request $request)
    {
        try {
            Log::info('DataTables request received');

            $users = UserModel::select('user_id', 'username', 'name', 'level_id');
            Log::info('User  count: ' . $users->count());

            $datatable = DataTables::of($users)
                ->addIndexColumn()
                ->addColumn('aksi', function ($user) {
                    $btn  = '<a href="' . url('/admin/users/' . $user->user_id) . '" class="btn btn-info btn-sm">Detail</a> ';
                    $btn .= '<a href="' . url('/admin/users/' . $user->user_id . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                    $btn .= '<form class="d-inline-block" method="POST" action="' . url('/admin/users/' . $user->user_id) . '">' . csrf_field() . method_field('DELETE') . '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');">Hapus</button></form>';
                    return $btn;
                })
                ->rawColumns(['aksi']);

            $result = $datatable->make(true);
            Log::info('DataTables response generated');

            return $result;
        } catch (\Exception $e) {
            Log::error('DataTables error: ' . $e->getMessage());
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function count(){
        $users = UserModel::count();
        return $users;
    }
}
