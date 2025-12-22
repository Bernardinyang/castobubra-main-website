<?php

namespace App\Http\Controllers\ComingSoon;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\StoreGridnoxContactRequest;
use App\Models\ComingSoonSliderImage;
use App\Models\SUGContact;
use App\Models\GridnoxContact;
use App\Models\SubscriberList;
use App\Models\SUGExco;
use App\Models\WiseTalk;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ComingSoonController extends Controller
{
    /**
     * @throws \Exception
     */
    public function index(): Factory|View|Application
    {
        $slider_images = ComingSoonSliderImage::all();
        $quotes = WiseTalk::all();
        $board_of_trustees = SUGExco::orderBy('order', 'asc')->get();

        return view('coming_soon.home', [
            'slider_images' =>$slider_images,
            'bots' =>$board_of_trustees,
            'quote' => $quotes[random_int(0, count($quotes) - 1)],
        ]);
    }

    public function storeContact(StoreContactRequest $request): string
    {
        $added = SUGContact::create(array_merge($request->validated(), [
            'unique_id' => strtoupper(Str::random(10)),
        ]));

        if($added) {
            $headers = "From:" . $request->names . "<" . $request->email . ">";
            mail('sug@castobubra.ng', 'Message from CASTObubra contact form', $request->message, $headers);

            return 'sent';
        }

        return 'not-sent';
    }

    public function storeSubscription(Request $request): string
    {
        $exists = SubscriberList::where('email', $request->email)->first();

        if(!$exists) {
            $added = SubscriberList::create([
                'email' => $request->email
            ]);

            if ($added) {
                return 'sent';
            }

            return 'not-sent';
        }

        return 'already-exist';
    }

    public function storeQuote(StoreGridnoxContactRequest $request): ?RedirectResponse
    {
        $added = GridnoxContact::create(array_merge($request->validated(), [
            'unique_id' => strtoupper(Str::random(10)),
        ]));

        if($added) {
            return redirect()->back()->with('status', 'Message sent, GRIDNOX will get back to you ASAP!');
        }

        return null;
    }
}
