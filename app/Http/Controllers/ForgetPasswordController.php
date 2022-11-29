<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Notify;
use Bugsnag\BugsnagLaravel\Facades\Bugsnag;
use RuntimeException;

class ForgetPasswordController extends Controller
{
    public function create()
    {
        return view('auth.forget-password');
    }
    public function store(Request $request, User $user)
    {
        $customMessages = [
            'email.required' => 'E-Mailadresse wird benötigt',
            'email.exists' => 'Nicht vorhandene E-Mail-Adresse',
            'email.regex' => 'Geben Sie die richtige E-Mail an',
        ];
        $validatedData = Validator::make($request->all(), [
            'email'             => 'required|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix|email|exists:users',
        ], $customMessages);
        if ($validatedData->fails()) {
            return redirect()->back()->withErrors($validatedData)->withInput();
        }
        $token = Str::random(64);
        $passwordReset = DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now(),
        ]);
        $user_name = User::where('email', $request->email)->first();
        $data = ['token' => $token, 'name' => $user_name->first_name . ' ' . $user_name->last_name];
        Mail::send('auth.emailMessage', ['data' => $data], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Reset Password Notification');
        });
        if (!$passwordReset) {
            return back()->withInput()->with('error', 'Ungültiges Token!');
        }
        $user = User::where('email', $request->email)->update(['password' => Hash::make($request->password)]);
        Notify::success('Wir haben Ihren Link zum Zurücksetzen des Passworts per E-Mail gesendet!', $title = "Erfolgreich..!");
        return redirect('/');
    }

    public function showResetPassword($token)
    {
        return view('auth.forget_password_link', ['token' => $token]);
    }

    public function storeResetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required',
        ]);
        $updatePassword = DB::table('password_resets')->where(['email' => $request->email, 'token' => $request->token])->first();
        if (!$updatePassword) {
            return back()->withInput()->with('error', 'Ungültiges Token!');
        }
        $user = User::where('email', $request->email)->update(['password' => Hash::make($request->password)]);
        DB::table('password_resets')->where(['email' => $request->email])->delete();
        Notify::success('Ihr Passwort wurde geändert!', $title = "Erfolgreich..!");
        return redirect('/');
    }
}
