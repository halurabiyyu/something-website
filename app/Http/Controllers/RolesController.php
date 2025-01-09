<?php

namespace App\Http\Controllers;

// use Illuminate\Container\Attributes\Log;

use App\Models\Roles;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class RolesController extends Controller
{
    public function index(){
        $breadcrumb = (object)[
            'title' => 'Daftar Role',
            'list' => ['Home', 'Role']
        ];

        $page = (object)[
            'title' => 'Daftar role yang terdaftar dalam sistem'
        ];

        $activeMenu = 'role';

        return view('admin.role.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu]);
    }

    public function create(){

    }
    public function store(){

    }
    public function list(Request $request){
        try {
            Log::info('DataTables request received');

            $roles = Roles::select('role_id', 'code', 'name');
            Log::info('Role  count: ' . $roles->count());

            $datatable = DataTables::of($roles)
                ->addIndexColumn()
                ->addColumn('aksi', function ($role) {
                    $btn  = '<a href="' . url('/admin/roles/' . $role->role_id) . '" class="btn btn-info btn-sm">Detail</a> ';
                    $btn .= '<a href="' . url('/admin/roles/' . $role->role_id . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                    $btn .= '<form class="d-inline-block" method="POST" action="' . url('/admin/roles/' . $role->role_id) . '">' . csrf_field() . method_field('DELETE') . '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');">Hapus</button></form>';
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
    public function edit(){

    }
    public function update(){

    }
    // public function 
}
