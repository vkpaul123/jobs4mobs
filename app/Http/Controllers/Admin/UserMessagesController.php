<?php

namespace App\Http\Controllers\Admin;

use App\Contactadmin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserMessagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function loadInbox() {
    	$messages = Contactadmin::all();

    	return view('Admin.homepage.adminInbox')
    	->with(compact('messages'));
    }

    public function editMessage($id) {
    	$message = Contactadmin::find($id);

        $message->markMessageRead = Auth::user()->name;
        $message->save();

    	return redirect(route('admin.contact.showMessage', $id));
    }

    public function showMessage($id) {
        $message = Contactadmin::find($id);

        return view('Admin.homepage.adminInboxMessage')
        ->with(compact('message'));
    }

    public function deleteMessage($id) {
    	Contactadmin::where('id', $id)->delete();

        return redirect()->back()
        ->with('status', 'Message Deleted.');
    }
}
