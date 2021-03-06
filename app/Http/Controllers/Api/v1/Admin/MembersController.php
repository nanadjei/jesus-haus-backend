<?php

namespace App\Http\Controllers\Api\v1\Admin;

use App\Models\Member;
use App\Http\Controllers\Controller;

class MembersController extends Controller
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
        $members = Member::orderBy("id", "desc")->paginate(15);

        return responder()->success($members);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Member $member)
    {
        $member = $member->create(request()->validate($member->createRules()));

        return responder()->success($member);
    }

    /**
     * Search members by providing the name, phone or email
     */
    public function search($keyword)
    {
        $members = Member::where("first_name", "LIKE", "%" . $keyword . "%")->orWhere("last_name", "LIKE", "%" . $keyword . "%")->orWhere("phone", "LIKE", "%" . $keyword . "%")->orderBy("id", "desc")->paginate(15);
        return responder()->success($members)->respond();
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
    public function update(Member $member)
    {
        $member = tap($member)->update(request()->validate($member->createRules()))->fresh();

        return responder()->success($member);
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
