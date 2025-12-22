<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordRequest;
use App\Http\Services\HelperService;
use App\Models\BoardOfTrustee;
use App\Models\Cause;
use App\Models\Contact;
use App\Models\Event;
use App\Models\ComingSoonSliderImage;
use App\Models\GridnoxContact;
use App\Models\PartnershipDataAnalytic;
use App\Models\PartnershipImage;
use App\Models\Staff;
use App\Models\SubscriberList;
use App\Models\SUGContact;
use App\Models\SystemSetting;
use App\Models\Testimonial;
use App\Models\User;
use App\Models\UserLoginInfo;
use App\Models\Volunteer;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function index()
    {
        $board_members_count = BoardOfTrustee::count();
        $system_users_count = User::count();
        $contact_count = Contact::count();
        $subscribers_count = SubscriberList::count();
        $coming_slider_image_count = ComingSoonSliderImage::count();
        $gridnox_count = GridnoxContact::count();

        return view('user.dashboard', [
            'board_members' => $board_members_count,
            'system_users' => $system_users_count,
            'contact' => $contact_count,
            'subscribers' => $subscribers_count,
            'coming_slider_image_count' => $coming_slider_image_count,
            'gridnox_count' => $gridnox_count,
        ]);
    }

    public function changePasswordAction()
    {
        return view('user.profile.security');
    }

    public function changePassword(ChangePasswordRequest $request, $id): ?RedirectResponse
    {
        if (Hash::check($request->current_password, auth()->user()->password)) {
            $changed = User::where('id', $id)->where('email', $request->email)->update([
                'password' => Hash::make($request->new_password)
            ]);

            if ($changed) {
                return redirect()->back()->with('status', 'You have successfully updated the password!');
            }
        } else {
            return redirect()->back()->with('error', 'The new password doesn\'t match the current password');
        }

        return null;
    }

    public function profileActivityAction(): Factory|View|Application
    {
        return view('user.profile.activity', [
            'activities' => UserLoginInfo::where('user_id', auth()->user()->id)->latest()->get()
        ]);
    }

    public function manageContacts(): Factory|View|Application
    {
        return view('user.contacts.manage', [
            'contacts' => Contact::latest()->get()
        ]);
    }

    public function deleteContact($unique_id): ?RedirectResponse
    {
        if (Contact::where('unique_id', $unique_id)->delete()) {
            return redirect()->route('user.contacts')
                ->with([
                    'status_type' => 'success',
                    'status_message' => 'You have successfully deleted this message!'
                ]);
        }

        return redirect()->route('user.contacts')
            ->with([
                'status_type' => 'danger',
                'status_message' => 'Something went wrong, try again later!'
            ]);
    }

    public function replyContact($unique_id): ?RedirectResponse
    {
        $contact = Contact::where('unique_id', $unique_id)->first();

        $subject = "Message from CASTObubra Contact Form";
        $headers = "From: " . $contact->email . "\r\n" . "Reply-To: " . $contact->email;

        if (mail(HelperService::getSettings()->app_email, $subject, $contact->message, $headers)) {
            return redirect()->back()
                ->with([
                    'status_type' => 'success',
                    'status_message' => 'You have successfully replied to this message!'
                ]);
        }

        return redirect()->back()
            ->with([
                'status_type' => 'danger',
                'status_message' => 'Something went wrong, try again later!'
            ]);
    }

    public function showContact(Contact $contact)
    {
        $updated = Contact::where([
            ['unique_id', $contact->unique_id],
            ['is_read', NULL],
            ['read_by', NULL],
        ])->update(['is_read' => now(), 'read_by' => auth()->user()->id]);

        if ($updated) {
            return redirect()->refresh();
        }

        return view('user.contacts.view', [
            'contact' => $contact
        ]);
    }

    public function manageSUGContacts(): Factory|View|Application
    {
        return view('user.sug_contacts.manage', [
            'contacts' => SUGContact::latest()->get()
        ]);
    }

    public function deleteSUGContact($unique_id): ?RedirectResponse
    {
        if (SUGContact::where('unique_id', $unique_id)->delete()) {
            return redirect()->route('user.sug_contacts')->with('status', 'You have successfully deleted this message!');
        }

        return null;
    }

    public function showSUGContact(SUGContact $contact)
    {
        $updated = SUGContact::where([
            ['unique_id', $contact->unique_id],
            ['is_read', NULL],
            ['read_by', NULL],
        ])->update(['is_read' => now(), 'read_by' => auth()->user()->id]);

        if ($updated) {
            return redirect()->refresh();
        }

        return view('user.sug_contacts.view', [
            'contact' => $contact
        ]);
    }

    public function manageSubscribers(): Factory|View|Application
    {
        return view('user.subscribers.manage', [
            'subscribers' => SubscriberList::latest()->get()
        ]);
    }

    public function manageGridnoxContacts(): Factory|View|Application
    {
        return view('user.gridnox.manage', [
            'gridnoxs' => GridnoxContact::latest()->get()
        ]);
    }

    public function deleteGridnoxContact($unique_id): ?RedirectResponse
    {
        if (GridnoxContact::where('unique_id', $unique_id)->delete()) {
            return redirect()->back()->with('status', 'You have successfully deleted this message!');
        }

        return null;
    }

    public function showGridnoxContact(GridnoxContact $gridnox_contact)
    {
        $updated = GridnoxContact::where([
            ['unique_id', $gridnox_contact->unique_id],
            ['is_read', NULL],
            ['read_by', NULL],
        ])->update(['is_read' => now(), 'read_by' => auth()->user()->id]);

        if ($updated) {
            return redirect()->refresh();
        }

        return view('user.gridnox.view', [
            'gridnox' => $gridnox_contact
        ]);
    }
}
