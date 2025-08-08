<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail; // Import the Mail facade
use App\Mail\ContactFormMail; // Import your Mailable class
use Illuminate\Support\Facades\Log; 

class ContactController extends Controller
{
    /**
     * Handle the submission of the contact form.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function send(Request $request)
    {
        // 1. Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20', // Phone is optional
            'message' => 'required|string',
        ]);

        try {
            // 2. Send the email to the admin
            // Replace 'admin@yourapp.com' with the actual admin email address
            Mail::to('admin@yourapp.com')->send(new ContactFormMail($validatedData));

            // 3. Redirect back with a success message
            return redirect()->back()->with('success', 'Your message has been sent successfully!');

        } catch (\Exception $e) {
            // Log the error for debugging
            Log::error('Contact form email failed: ' . $e->getMessage());

            // Redirect back with an error message
            return redirect()->back()->withInput()->withErrors(['email_send_error' => 'Failed to send your message. Please try again later.']);
        }
    }
}