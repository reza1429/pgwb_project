<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Middleware\RoleCheck;

class MiddleController extends Controller
{
    public function __construct()
    {
        $this->middleware(RoleCheck::class);
    }
}
