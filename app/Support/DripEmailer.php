<?php

namespace App\Support;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;

/**
 * App\Support\DripEmailer
 *
 * @method static \Illuminate\Database\Eloquent\Builder|DripEmailer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DripEmailer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DripEmailer query()
 * @mixin \Eloquent
 * @mixin IdeHelperDripEmailer
 */
class DripEmailer extends Model
{
    public function send(User $user) {
        Mail::send('emails.welcome', ['first_name' => 'foo', 'last_name' => 'bar', 'email' => $user->email], function ($m) use ($user) {
            $m->from('hello@app.com', 'Your Application');

            $m->to($user->email, $user->name)->subject('Your Reminder!');
        });
    }
}
