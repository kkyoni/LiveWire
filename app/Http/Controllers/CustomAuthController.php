<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\NetworkPartner;
use App\Models\Note;
use App\Models\Organisations;
use App\Models\Person;
use App\Models\RoleUsers;
use App\Models\Roles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session, Notify;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\App;
use Bugsnag\BugsnagLaravel\Facades\Bugsnag;
use RuntimeException;

class CustomAuthController extends Controller
{
    //
    public function index()
    {
        return view('auth.login');
    }

    public function customLogin(Request $request)
    {
        $customMessages = [
            'email.required' => 'E-Mailadresse wird benötigt',
            'email.exists' => 'Nicht vorhandene E-Mail-Adresse',
            'email.regex' => 'Geben Sie die richtige E-Mail an',
            'password.required'        => 'Passwort ist nötig',
        ];
        $validatedData = Validator::make($request->all(), [
            'email'             => 'required|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix|email|exists:users',
            'password' => 'required',
        ], $customMessages);
        if ($validatedData->fails()) {
            return redirect()->back()->withErrors($validatedData)->withInput();
        }
        if (\Auth::attempt([
            'email'     => $request->get('email'),
            'password'  => $request->get('password'),
        ])) {
            if (!empty($request->has('remmeber'))) {
                $email_cookie = $request->email;
                $password_cookie = $request->password;
                setcookie("email_cookie", $email_cookie, time() + 3600, '/');
                setcookie("password_cookie", $password_cookie, time() + 3600, '/');
            } else {
                if (isset($_COOKIE['email_cookie'])) {
                    setcookie("email_cookie", "", time() + 3600, '/');
                }
                if (isset($_COOKIE['password_cookie'])) {
                    setcookie("password_cookie", "", time() + 3600, '/');
                }
            }
            $remember_me = $request->has('remmeber') ? true : false;
            $loginAttempt = Auth::attempt(['email' => $request->get('email'), 'password' => $request->get('password')], $remember_me);
            if (Auth::user()->ist_aktivi == 'true') {
                Notify::success('Willkommen im Admin-Panel', $title = "Erfolgreich..!");
                return redirect()->route('dashboard');
            } else {
                Auth::logout();
                Notify::error('ist_aktivi ist Inaktiv', $title = "Fehler..!");
                return redirect("/");
            }
            // return redirect()->intended('users')->withSuccess('Signed in');
        } else {
            Notify::error('Anmeldedaten sind nicht gültig', $title = "Fehler..!");
            return redirect("/");
        }
    }

    public function registration()
    {
        return view('auth.register');
    }

    public function customRegistration(Request $request)
    {
        $customMessages = [
            'first_name.required' => 'Vorname ist erforderlich',
            'last_name.required' => 'Nachname ist erforderlich',
            'email.required' => 'E-Mailadresse wird benötigt',
            'email.unique' => 'Eindeutige E-Mail-Adresse',
            'email.regex' => 'Geben Sie die richtige E-Mail an',
            'password.required' => 'Passwort wird benötigt',
        ];
        $validatedData = Validator::make($request->all(), [
            'first_name'        => 'required',
            'last_name'         => 'required',
            'email'             => 'required|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix|email|unique:users,email',
            'password'          => 'required',
        ], $customMessages);
        if ($validatedData->fails()) {
            return redirect()->back()->withErrors($validatedData)->withInput();
        }
        try {
            $user = User::create([
                'first_name' => $request->get('first_name'),
                'last_name' => $request->get('last_name'),
                'email' => $request->get('email'),
                'password' => Hash::make($request->get('password'))
            ]);
            if (!empty($user)) {
                RoleUsers::create([
                    'user_id' => $user->id,
                    'role_id' => '2',
                ]);
                return redirect("dashboard")->withSuccess('Sie haben sich angemeldet');
            }
            Notify::success('Registrierung erfolgreich', $title = "Erfolgreich..!");
        } catch (\Exception $e) {
            Bugsnag::notifyException(new RuntimeException($e));
            return back()->with(['alert-type' => 'danger', 'message' => $e->getMessage()]);
        }
    }

    public function dashboard()
    {
        if (Auth::check()) {
            $user_total = User::count();
            $networkpartner_total = NetworkPartner::count();
            $note_total = Note::count();
            $organisations_total = Organisations::count();
            $person_total = Person::count();
            return view('dashboard', compact('user_total', 'networkpartner_total', 'note_total', 'organisations_total', 'person_total'));
        }
        return redirect("/")->withSuccess('Sie dürfen nicht zugreifen');
    }

    public function signOut()
    {
        Session::flush();
        Auth::logout();
        Notify::success('Abmeldung erfolgreich', $title = "Erfolgreich..!");
        return Redirect('/');
    }
}
