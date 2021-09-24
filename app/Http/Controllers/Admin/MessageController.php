<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Message;
use App\Services\Perform;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Support\SaveModel\SaveModel;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\MessageRequest;

class MessageController extends Controller
{

    public function index()
    {
        $messages = Perform::index(Message::class, null, 10);

        return view('admin.contact.messages', compact(['messages']));
    }

    public function important()
    {
        $messages = Perform::indexWithFind(Message::class, ['important' => 1]);

        return view('admin.contact.messages', compact(['messages']));
    }

    public function show($id)
    {
        $message = Perform::findFirstOrFail(Message::class, $id);

        if ($message->readed == 0) {
            $message->update(['readed' => 1]);
        }

        return view('admin.contact.show', compact(['message']));
    }

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

    public function destroy(Request $request)
    {
        $upString = '';

        if (isset($request->change_status) && $request->change_status != '') {
            if ($request->change_status == 'unread') {
                $this->changeMessageStatus($request, 'readed', 1, 0);
            } elseif ($request->change_status == 'read') {
                $this->changeMessageStatus($request, 'readed', 0, 1);
            } elseif ($request->change_status == 'important') {
                $this->changeMessageStatus($request, 'important', 0, 1);
            }
            $upString = 'updated';
        } else {
            foreach ($request->ids as $id) {

                $Message = Perform::findFirstOrFail(Message::class, $id);

                $Message->delete();
            }
            $upString = 'deleted';
        }

        return redirect()->route('messages.index')->with(['success' => "Messages has been $upString."]);
    }

    private function changeMessageStatus($request, $statusName, $from, $to)
    {
        foreach ($request->ids as $id) {

            $message = Perform::findFirstOrFail(Message::class, $id);

            if ($message->$statusName == $from) {
                $message->update([$statusName => $to]);
            }
        }
    }
}
