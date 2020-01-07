<?php

namespace App\Http\Controllers\Api\v1\Admin;

use App\Models\Member;
use App\Models\Cashflow;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(["jwt.admin.auth"]);
    }

    public function index()
    {
        $data["monthly_revenue"] = number_format(Cashflow::income()->whereMonth("created_at", now()->month)->sum("amount"));
        $data["monthly_expenses"] = number_format(Cashflow::expense()->whereMonth("created_at", now()->month)->sum("amount"));
        $data["members"] = number_format(Member::all()->count());
        return responder()->success($data);
    }
}
