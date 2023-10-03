<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getPostsByUser($id){
        $contents = $this->user::with('posts')->find($id);

        return view('user.profile', compact('contents'));
    }
}
