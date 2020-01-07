<?php

namespace App\Http\Controllers\Api\v1\Admin;

use App\Models\Member;
use App\Http\Controllers\Controller;
use App\Jobs\SendSmsToMembersJob;
use App\NotificationChannels\Mobiforte\Mobiforte;

class SmsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['jwt.admin.auth']);
    }

    /**
     * Send a notification via sms 
     * @param $member \App\Models\Member
     */
    public function send()
    {
        request()->validate(['message' => 'required|min:3']);

        if (empty(request()->selected_members_ids)) {
            foreach (Member::all() as $member) {
                SendSmsToMembersJob::dispatch($member, request()->sender_id, request()->message);
            }
        } else {
            foreach (request()->selected_members_ids as $id) {
                SendSmsToMembersJob::dispatch(Member::find($id), request()->sender_id, request()->message);
            }
        }
        return responder()->success("Sms sent");
    }

    /**
     * Get remaining sms balance.
     */
    public function balance(Mobiforte $sms)
    {
        return $sms->balance();
    }
}
