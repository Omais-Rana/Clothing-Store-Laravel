<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ContactController extends Controller
{
    public function showForm()
    {
        return view('contact');
    }

    public function submitForm(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Prepare email details
        $details = [
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ];

        // Send email via Mailgun
        $recipient = 'prouser6969@gmail.com';
        $domain = env('MAILGUN_DOMAIN');
        $apiKey = env('MAILGUN_SECRET');

        $response = Http::withBasicAuth('api', $apiKey)
            ->asForm()
            ->post("https://api.mailgun.net/v3/$domain/messages", [
                'from' => $details['email'],
                'to' => $recipient,
                'subject' => $details['subject'],
                'html' => view('emails.contact', $details)->render(),
            ]);

        if ($response->successful()) {
            return back()->with('success', 'Your message has been sent successfully!');
        } else {
            return back()->with('error', 'Failed to send your message.');
        }
    }
}
