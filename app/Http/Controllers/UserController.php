<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    // 1. عرض قائمة المستخدمين
    public function index() {
        $users = DB::table('users')->get();
        return view('users.index', compact('users'));
    }

    // 2. إضافة مستخدم جديد
    public function store(Request $request) {
        DB::table('users')->insert([
            'name'  => $request->name,
            'email' => $request->email,
            'created_at' => now(),
        ]);
        return redirect()->back();
    }

    // 3. حذف مستخدم
    public function destroy($id) {
        DB::table('users')->where('id', $id)->delete();
        return redirect()->back();
    }
}