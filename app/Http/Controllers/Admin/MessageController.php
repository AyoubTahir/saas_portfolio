<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Message;
use App\Services\Perform;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Support\SaveModel\SaveModel;
use App\Http\Requests\MessageRequest;

class MessageController extends Controller
{

    public function store(MessageRequest $request, $user_id)
    {
        $row =  User::where('id', $user_id)->firstOrFail();

        if ($row) {

            $request['user_id'] = $user_id;

            $message = new Message();

            $data = $request->only(array_keys($message->saveableFields()));

            (new SaveModel($message, $data))->execute();
        }

        return redirect("/" . str_replace(' ', '-', $row->name) . "#contact")->with(['success' => 'Your message was sent successfully']);
    }
}
