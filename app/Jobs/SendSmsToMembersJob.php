<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Notifications\MobiforteSmsNotification;

class SendSmsToMembersJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /** The sender id of the message. Eg; HOfm */
    protected $sender_id;
    /** The actual message to be sent. Eg; Lorem ipsum dolor set emit*/
    protected $message;
    /** The receiptient member. Eg; 0245052880 */
    protected $member;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($member, $sender_id, $message)
    {
        $this->member = $member;
        $this->sender_id = $sender_id ?: config('mobiforte.sender_id');
        $this->message = $message;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->member->notify(new MobiforteSmsNotification($this->sender_id, $this->message, $this->member->phone));
    }
}
