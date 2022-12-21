<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationControler extends Controller
{
    public function notification()
    {
        $notification = new \MBarlow\Megaphone\Types\Important(
            'Expected Downtime!', // Notification Title
            'We are expecting some downtime today at around 15:00 UTC for some planned maintenance. Read more on a blog post!', // Notification Body
            'https://example.com/link', // Optional: URL. Megaphone will add a link to this URL within the Notification display.
            'Read More...' // Optional: Link Text. The text that will be shown on the link button.
        );

        $user = \App\Models\User::find(1);

        $user->notify($notification);

    }
}
