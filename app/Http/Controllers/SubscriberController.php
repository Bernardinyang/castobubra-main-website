<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubscriberRequest;
use App\Models\SubscriberList;
use Illuminate\Http\RedirectResponse;

class SubscriberController extends Controller
{
    public function store(StoreSubscriberRequest $request): RedirectResponse
    {
        $subscriber = new SubscriberList;
        $subscriber->email = $request->email;

        if($subscriber->save()) {
            return redirect()->back()->with('status', 'You have successfully subscribed to our newsletter!')->with('status_type', 'success');
        }

        return redirect()->back()->with('status', 'Something went wrong, kindly try again!')->with('status_type', 'danger');
    }

    public function destroy(SubscriberList $subscriber)
    {
        $subscriber->delete();

        return view('website.unsubscribe');
    }
}
