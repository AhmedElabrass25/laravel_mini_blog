<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index')->with('users', $users);
    }

    public function sendMail()
    {
        $data = ['name' => 'Ahmed'];

        Mail::to('receiver@gmail.com')->send(new TestMail($data));

        return "Email has been sent ✅";
    }
}
