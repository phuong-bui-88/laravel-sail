<?php

namespace App\Support;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;

class DripEmailer extends Model
{
    public function send(User $user) {
        Mail::send('emails.welcome', ['first_name' => 'foo', 'last_name' => 'bar', 'email' => $user->email], function ($m) use ($user) {
            $m->from('hello@app.com', 'Your Application');

            $m->to($user->email, $user->name)->subject('Your Reminder!');
        });
    }
}
