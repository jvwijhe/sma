<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\MessageUnlockRequest;
use App\Jobs\Messages\SendInvitesJob;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class MessageController extends Controller
{
    public function unlock(MessageUnlockRequest $request, $id)
    {
        $message = Message::findOrFail($id);

        $decryptedMessage = Crypt::decryptString($message->message);

        return response()->json([
            'message' => $decryptedMessage
        ]);
    }

    public function sendInvites(Request $request, $id)
    {
        $message = Message::findOrFail($id);


        // Dispatch job which sends the invits
        SendInvitesJob::dispatch($message);


        return response()->json([
            'message' => 'invites send'
        ]);
    }


}
