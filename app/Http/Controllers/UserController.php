<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\RoleUsers;
use App\Models\Roles;
use Notify;
use Yajra\DataTables\DataTables;
use Auth;
use Illuminate\Support\Facades\Validator;
use App\Helpers\Helper;
use Bugsnag\BugsnagLaravel\Facades\Bugsnag;
use RuntimeException;

class UserController extends Controller
{
    protected $authLayout = '';
    protected $pageLayout = '';
    /**
     *  * * * * * * * * * * * * Create a new controller instance.
     *  * * * * * * * * * * * *
     *  * * * * * * * * * * * @return void
     *  * * * * * * * * * * */
    public function __construct()
    {
        $this->authLayout = 'auth.';
        $this->pageLayout = 'pages.users.';
        $this->middleware('auth');
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function for Index User
    ------------------------------------------------------------------------------------*/
    public function index(Request $request)
    {
        $userRole = '';
        $userRole = Helper::checkPermission(['user.show']);
        if (!$userRole) {
            $message = "Sie sind nicht berechtigt, auf dieses Modul zuzugreifen.";
            return view('errors.permission', compact('message'));
        }
        $permission_data['hasUpdatePermission'] = Helper::checkPermission(['user.edit']);
        $permission_data['hasDeletePermission'] = Helper::checkPermission(['user.delete']);
        if ($request->ajax()) {
            $data = User::with('role_list')->where('id', '!=', Auth::user()->id)->orderBy('updated_at', 'desc');
            return Datatables::of($data)->addIndexColumn()
                ->addColumn('roletype', function ($row) {
                    $list = $row->role_list->permission_list->name;
                    return $list;
                })
                ->addColumn('ist_aktivi', function ($row) {
                    if ($row->ist_aktivi == 'true') {
                        return '<div class="form-check form-switch form-check-inline change_status" data-id="' . $row->id . '" val="true">
                    <input class="form-check-input" type="checkbox" value="true" id="example-switch-inline1" name="example-switch-inline1" checked>
                    </div>';
                    } else {
                        return '<div class="form-check form-switch form-check-inline change_status" data-id="' . $row->id . '" val="false">
                    <input class="form-check-input" type="checkbox" value="false" id="example-switch-inline1" name="example-switch-inline1">
                    </div>';
                    }
                })
                ->addColumn('action', function ($row) use ($permission_data) {
                    $action  = '';
                    if ($permission_data['hasUpdatePermission']) {
                        $action .= '<a href=' . route('users.edit', [$row->id]) . ' class="btn btn-warning btn-sm me-1 mb-3 btn-circle" data-toggle="tooltip" title="Bearbeiten!"><i class="fa fa-pencil"></i></a>';
                    }
                    if ($permission_data['hasDeletePermission']) {
                        $action .= '<a href="javascript:void(0)" class="btn btn-danger btn-sm me-1 mb-3 btn-circle deleteuser" data-id ="' . $row->id . '" data-toggle="tooltip" title="Löschen!"><i class="fa fa-trash"></i></a>';
                    }
                    $action .= '<a href="javascript:void(0)" class="btn btn-info btn-sm me-1 mb-3 btn-circle showuser" data-id="' . $row->id . '" data-toggle="tooltip" title="Aussicht!"><i class="fa fa-eye"></i></a>';
                    return $action;
                })
                ->rawColumns(['action', 'ist_aktivi', 'roletype'])
                ->make(true);
        }
        return view($this->pageLayout . 'index');
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function for Create Users
    ------------------------------------------------------------------------------------*/
    public function create()
    {
        $userRole = Helper::checkPermission(['user.create']);
        if (!$userRole) {
            $message = "Sie sind nicht berechtigt, auf dieses Modul zuzugreifen.";
            return view('errors.permission', compact('message'));
        }
        $role_list = Roles::pluck('name', 'id');
        return view($this->pageLayout . 'create', compact('role_list'));
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function for Store Users
    ------------------------------------------------------------------------------------*/
    public function store(Request $request)
    {
        $customMessages = [
            'first_name.required' => 'Vorname ist erforderlich',
            'last_name.required' => 'Nachname ist erforderlich',
            'email.required' => 'E-Mailadresse wird benötigt',
            'email.unique' => 'Eindeutige E-Mail-Adresse',
            'email.regex' => 'Geben Sie die richtige E-Mail an',
            'password.required' => 'Passwort wird benötigt',
            'roles_permissions.required' => 'Rollenberechtigungen sind erforderlich',
        ];
        $validatedData = Validator::make($request->all(), [
            'first_name'        => 'required',
            'last_name'         => 'required',
            'roles_permissions' => 'required',
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
                'ist_aktivi' => $request->get('ist_aktivi'),
                'password'  => \Hash::make($request->get('password')),
            ]);
            if (!empty($user)) {
                RoleUsers::create([
                    'user_id' => $user->id,
                    'role_id' => $request->roles_permissions,
                ]);
            }
            Notify::success('Benutzer erstellt', $title = "Erfolgreich..!");
            return redirect()->route('users.index');
        } catch (\Exception $e) {
            Bugsnag::notifyException(new RuntimeException($e));
            return back()->with(['alert-type' => 'danger', 'message' => $e->getMessage()]);
        }
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function for Edit Users
    ---------------------------------------------------------------------------------- */
    public function edit($id)
    {
        $userRole = Helper::checkPermission(['notes.edit']);
        if (!$userRole) {
            $message = "Sie sind nicht berechtigt, auf dieses Modul zuzugreifen.";
            return view('errors.permission', compact('message'));
        }
        try {
            $role_list = Roles::get();
            $users = User::with(['role_list'])->where('id', $id)->first();
            if (!empty($users)) {
                return view($this->pageLayout . 'edit', compact('users', 'role_list'));
            } else {
                Notify::error('Benutzer bearbeiten Nicht gefunden');
                return redirect()->route('users.index');
            }
        } catch (\Exception $e) {
            Bugsnag::notifyException(new RuntimeException($e));
            return back()->with(['alert-type' => 'danger', 'message' => $e->getMessage()]);
        }
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function for Update Users
    ------------------------------------------------------------------------------------*/
    public function update(Request $request, $id)
    {
        $customMessages = [
            'first_name.required' => 'Vorname ist erforderlich',
            'last_name.required' => 'Nachname ist erforderlich',
            'email.required' => 'E-Mailadresse wird benötigt',
            'email.unique' => 'Eindeutige E-Mail-Adresse',
            'email.regex' => 'Geben Sie die richtige E-Mail an',
            'roles_permissions.required' => 'Rollenberechtigungen sind erforderlich',
        ];
        $validatedData = Validator::make($request->all(), [
            'first_name'        => 'required',
            'last_name'         => 'required',
            'roles_permissions' => 'required',
            'email'             => 'required|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix|email|unique:users,email,' . $id,
        ], $customMessages);
        try {
            $oldDetails = User::find($id);
            if (!empty($request->get('password'))) {
                $password = \Hash::make($request->get('password'));
            } else {
                $password = $oldDetails->password;
            }
            User::where('id', $id)->update([
                'first_name' => $request->get('first_name'),
                'last_name' => $request->get('last_name'),
                'email' => $request->get('email'),
                'ist_aktivi' => $request->get('ist_aktivi'),
                'password'  => $password
            ]);
            if (!empty($id)) {
                RoleUsers::where('user_id', $id)->update([
                    'role_id' => $request->get('roles_permissions'),
                ]);
            }
            Notify::success('Benutzer aktualisiert', $title = "Erfolgreich..!");
            return redirect()->route('users.index');
        } catch (\Exception $e) {
            Bugsnag::notifyException(new RuntimeException($e));
            return back()->with(['alert-type' => 'danger', 'message' => $e->getMessage()]);
        }
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function for Delete User
    ------------------------------------------------------------------------------------*/
    public function delete($id)
    {
        try {
            $user = User::where('id', $id)->first();
            $user->delete();
            Notify::success('Benutzer gelöscht', $title = "Erfolgreich..!");
            return response()->json(['status' => 'success', 'title' => 'Success!!', 'message' => 'Benutzer erfolgreich gelöscht..!']);
        } catch (\Exception $e) {
            Bugsnag::notifyException(new RuntimeException($e));
            return back()->with(['alert-type' => 'danger', 'message' => $e->getMessage()]);
        }
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function for Show User
    ------------------------------------------------------------------------------------*/
    public function show(Request $request)
    {
        $user = User::with('role_list')->where('id', $request->id)->first();
        return view($this->pageLayout . 'show', compact('user'));
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function for Update profile details
    ---------------------------------------------------------------------------------- */
    public function updateProfile()
    {
        $user = User::where('id', Auth::user()->id)->first();
        if (empty($user)) {
            return redirect()->to('dashboard');
        }
        return view($this->pageLayout . 'updateprofile', compact('user'));
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function for Update profile details
    ---------------------------------------------------------------------------------- */
    public function updateProfileDetail(Request $request)
    {
        $customMessages = [
            'first_name.required' => 'Vorname ist erforderlich',
            'last_name.required' => 'Nachname ist erforderlich',
            'email.required' => 'E-Mailadresse wird benötigt',
            'email.unique' => 'Eindeutige E-Mail-Adresse',
            'email.regex' => 'Geben Sie die richtige E-Mail an',
        ];
        $validatedData = Validator::make($request->all(), [
            'first_name'        => 'required',
            'last_name'         => 'required',
            'email'             => 'required|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix|email|unique:users,email,' . Auth::user()->id,
        ], $customMessages);
        if ($validatedData->fails()) {
            return redirect()->back()->withErrors($validatedData)->withInput();
        }
        try {
            User::where('id', Auth::user()->id)->update([
                'first_name'         => $request->first_name,
                'last_name'          => $request->last_name,
                'email'          => $request->email,
            ]);
            Notify::success('Benutzerprofil', $title = "Erfolgreich..!");
            return redirect()->back();
        } catch (\Exception $e) {
            Bugsnag::notifyException(new RuntimeException($e));
            return back()->with(['alert-type' => 'danger', 'message' => $e->getMessage()]);
        }
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function for update Password
    ---------------------------------------------------------------------------------- */
    public function updatePassword(Request $request)
    {
        try {
            $validatedData = Validator::make($request->all(), [
                'old_password'          => 'required',
                'password'              => 'required|min:6',
                'password_confirmation' => 'required|min:6',
            ], [
                'old_password.required'          => 'Das Feld für das aktuelle Passwort ist erforderlich.',
                'password.required'              => 'Das neue Passwortfeld ist erforderlich.',
                'password_confirmation.required' => 'Das Feld Passwort bestätigen ist erforderlich.'
            ]);
            $validatedData->after(function () use ($validatedData, $request) {
                if ($request->get('password') !== $request->get('password_confirmation')) {
                    $validatedData->errors()->add('password_confirmation', 'Das Bestätigungskennwort stimmt nicht überein.');
                }
            });
            if ($validatedData->fails()) {
                return redirect()->back()->withErrors($validatedData)->withInput();
            }
            if (\Hash::check($request->get('old_password'), auth()->user()->password) === false) {
                return redirect()->back();
            }
            $user = auth()->user();
            $user->password = \Hash::make($request->get('password'));
            $user->save();
            Notify::success('Aktualisierung des Benutzerkennworts', $title = "Erfolgreich..!");
            return redirect()->back();
        } catch (Exception $e) {
            Bugsnag::notifyException(new RuntimeException($e));
            return back()->with(['alert-type' => 'danger', 'message' => $e->getMessage()]);
        }
    }

    public function chnage_status(Request $request, $id)
    {
        try {
            if ($request->val == 'true') {
                $val = "false";
            } else {
                $val = "true";
            }
            User::where('id', $id)->update([
                'ist_aktivi'          => $val,
            ]);
            Notify::success('Änderung des Benutzerstatus', $title = "Erfolgreich..!");
            return response()->json(['status' => 'success', 'title' => 'Success!!', 'message' => 'Statusänderung des Benutzers erfolgreich..!']);
        } catch (\Exception $e) {
            Bugsnag::notifyException(new RuntimeException($e));
            return back()->with(['alert-type' => 'danger', 'message' => $e->getMessage()]);
        }
    }
}
