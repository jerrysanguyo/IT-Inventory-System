<?php
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Yajra\DataTables\Facades\DataTables;
use App\DataTables\UsersDataTable;

class AccountsController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function accounts(UsersDataTable $dataTable)
    {
        return $dataTable->render('admin.account');
    }
}