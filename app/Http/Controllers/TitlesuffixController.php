<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Titlesuffix;
use Notify;
use Yajra\DataTables\DataTables;
use Auth;
use Illuminate\Support\Facades\Validator;
use App\Helpers\Helper;
use Bugsnag\BugsnagLaravel\Facades\Bugsnag;
use RuntimeException;

class TitlesuffixController extends Controller
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
        $this->pageLayout = 'pages.titlesuffix.';
        $this->middleware('auth');
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function for Index Title suffix
    ------------------------------------------------------------------------------------*/
    public function index(Request $request)
    {
        $userRole = '';
        $userRole = Helper::checkPermission(['titlesuffix.show']);
        if (!$userRole) {
            $message = "Sie sind nicht berechtigt, auf dieses Modul zuzugreifen.";
            return view('errors.permission', compact('message'));
        }

        return view($this->pageLayout . 'index');
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function for Create Title suffix
    ------------------------------------------------------------------------------------*/
    public function create()
    {
        $userRole = Helper::checkPermission(['titlesuffix.create']);
        if (!$userRole) {
            $message = "Sie sind nicht berechtigt, auf dieses Modul zuzugreifen.";
            return view('errors.permission', compact('message'));
        }
        return view($this->pageLayout . 'create');
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function for Delete Title suffix
    ------------------------------------------------------------------------------------*/
    public function delete($id)
    {
        try {
            $titlesuffix = Titlesuffix::where('id', $id)->first();
            $titlesuffix->delete();
            Notify::success('Titelzusatz gelöscht', $title = "Erfolgreich..!");
            return response()->json(['status' => 'success', 'title' => 'Success!!', 'message' => 'Titlesuffix Deleted Successfully..!']);
        } catch (\Exception $e) {
            Bugsnag::notifyException(new RuntimeException($e));
            return back()->with(['alert-type' => 'danger', 'message' => $e->getMessage()]);
        }
    }

    /*-----------------------------------------------------------------------------------
    @Description: Function for Show Title suffix
    ------------------------------------------------------------------------------------*/
    public function show(Request $request)
    {
        $titlesuffix = Titlesuffix::where('id', $request->id)->first();
        return view($this->pageLayout . 'show', compact('titlesuffix'));
    }
}
