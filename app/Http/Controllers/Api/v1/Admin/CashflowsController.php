<?php

namespace App\Http\Controllers\Api\v1\Admin;

use App\Models\Cashflow;
use App\Http\Controllers\Controller;

class CashflowsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['jwt.admin.auth']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return responder()->success(Cashflow::with(['category'])->orderBy('created_at', 'desc')->paginate(15))->respond();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function byType(string $type)
    {
        $cashflow = Cashflow::where("type", $type)->with(['category'])->orderBy('created_at', 'desc')->paginate(15);

        return responder()->success($cashflow)->respond();
    }

    /**
     * Search cashflow by providing the type and search keyword
     */
    public function search($keyword)
    {
        $cashflow = Cashflow::where("receiver_or_giver", "LIKE", "%" . $keyword . "%")
            ->orWhere("amount", "=", $keyword)->with('category')->get();
        return responder()->success($cashflow)->respond();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Cashflow $cashflow)
    {
        $cashflow = $cashflow->create(array_merge(["staff_id" => auth('api')->id()], request()->validate($cashflow->createRules())));

        return responder()->success($cashflow)->respond();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Cashflow $cashflow)
    {
        $cashflow = tap($cashflow)->update(array_merge(["staff_id" => auth('api')->id()], request()->validate($cashflow->createRules())))->fresh();

        return responder()->success($cashflow)->respond();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
