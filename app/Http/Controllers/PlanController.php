<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plan;
use Illuminate\View\View;

class PlanController extends Controller
{
    public function index(): View
    {
        return view('plans');
    }
}
