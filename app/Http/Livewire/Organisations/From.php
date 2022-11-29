<?php

namespace App\Http\Livewire\Organisations;

use Livewire\Component;
use Illuminate\Http\Request;
use Notify;
use Yajra\DataTables\DataTables;
use App\Models\Organisations;
use App\Models\Topic;
use App\Models\User;
use App\Models\Person;
use App\Models\Person_organisation;
use App\Models\Functions;
use Auth;
use Illuminate\Support\Facades\Validator;
use App\Helpers\Helper;
use App\Models\City;
use App\Models\Organisation_themen;
use App\Models\User_organisation;
use App\Models\Status;
use Bugsnag\BugsnagLaravel\Facades\Bugsnag;
use PhpParser\Node\Stmt\Echo_;
use RuntimeException;

class From extends Component
{
    public $currentSection = 1;
    public $i = 1;
    public $i1 = 1;
    public $inputs1 = [];
    public $inputs = [];
    public $abteilung = [];
    public $abteilung_person = [];
    public $listeners = ['setSomeProperty', 'setSomePerson'];
    public $funktion_person_id, $funktion_id, $organisations, $organisationen_themen_id, $organisationen_id, $titel, $synonyme, $adresse, $ort_id, $email, $telefon, $fax, $web, $uid, $fb, $wkonr, $user_organisation_id, $status_id, $person_organisation_id;

    public function mount()
    {
        if (!empty($this->organisations)) {
            $organisations = Organisations::find($this->organisations->id);
            $i = 1;
            foreach ($organisations->themen_detalis as $key => $val) {
                $this->abteilung[$val->pivot->themengebiet_id] = $val->pivot->abteilung;
                $this->funktion_id[$val->pivot->themengebiet_id] = $val->pivot->funktion_id;
                $i++;
            }
            $i1 = 1;
            foreach ($organisations->person_detalis as $key => $val) {
                $this->abteilung_person[$val->pivot->person_id] = $val->pivot->abteilung;
                $this->funktion_person_id[$val->pivot->person_id] = $val->pivot->funktion_id;
                $i1++;
            }
            $this->functions_list = Functions::pluck('bezeichnung', 'id');
            $this->topic_list = Topic::pluck('bezeichnung', 'id');
            $this->user_list = User::pluck('first_name', 'id');
            $this->person_list = Person::pluck('nachname', 'id');
            $this->ort_list = City::pluck('plz', 'id');
            $this->status_list = Status::pluck('bezeichnung', 'id');
            $this->organisationen_id = $organisations->id;
            $this->organisationen_themen_id = $organisations->themen_detalis->pluck('id');
            $this->titel = $organisations->titel;
            $this->synonyme = $organisations->synonyme;
            $this->adresse = $organisations->adresse;
            $this->ort_id = $organisations->ort_id;
            $this->email = $organisations->email;
            $this->telefon = $organisations->telefon;
            $this->fax = $organisations->fax;
            $this->web = $organisations->web;
            $this->uid = $organisations->uid;
            $this->fb = $organisations->fb;
            $this->wkonr = $organisations->wkonr;
            $this->status_id = $organisations->status_id;
            $this->user_organisation_id = $organisations->user_detalis->pluck('id');
            $this->person_organisation_id = $organisations->person_detalis->pluck('id');
            $this->inputs = $organisations->themen_detalis->pluck('id');
            $this->inputs1 = $organisations->person_detalis->pluck('id');
        }
    }

    public function render()
    {
        $this->topic_list = Topic::pluck('bezeichnung', 'id');
        $this->user_list = User::pluck('first_name', 'id');
        $this->person_list = Person::pluck('nachname', 'id');
        $this->ort_list = City::get();
        $this->status_list = Status::pluck('bezeichnung', 'id');
        $this->functions_list = Functions::pluck('bezeichnung', 'id');
        return view('pages.organisations.from');
    }

    public function step1()
    {
        $customMessages = [
            'titel.required'                     => 'titel ist nötig',
            'adresse.required'                   => 'adresse ist nötig',
            'ort_id.required'                    => 'ort ist nötig',
            'telefon.required'                   => 'telefon  ist nötig',
            'status_id.required'                 => 'status ist nötig',
            'user_organisation_id.required'      => 'organisation ist nötig',
        ];
        $validatedData = $this->validate([
            'titel' => 'required',
            'adresse' => 'required',
            'ort_id' => 'required',
            'telefon'  => 'required',
            'status_id' => 'required',
            'user_organisation_id' => 'required',
        ], $customMessages);
        $this->currentSection = 2;
    }

    public function setSomeProperty($i)
    {
        $this->inputs = $i;
    }

    public function setSomePerson($i1)
    {
        $this->inputs1 = $i1;
    }

    public function step2()
    {
        try {
            $check_organisations =  Organisations::updateOrCreate(['id' => $this->organisationen_id], [
                'titel' => $this->titel,
                'synonyme' => $this->synonyme,
                'adresse' => $this->adresse,
                'ort_id' => $this->ort_id,
                'email' => $this->email,
                'telefon' => $this->telefon,
                'fax' => $this->fax,
                'web' => $this->web,
                'uid' => $this->uid,
                'fb' => $this->fb,
                'wkonr' => $this->wkonr,
                'status_id' => $this->status_id,
            ]);
            if (!empty($check_organisations)) {
                $delete_themen_organisation = Organisation_themen::where('organisation_id', $check_organisations->id)->get();
                if (!empty($delete_themen_organisation)) {
                    foreach ($delete_themen_organisation as $value) {
                        Organisation_themen::where('organisation_id', $value->organisation_id)->delete();
                    }
                }
                if (!empty($this->organisationen_themen_id)) {
                    foreach ($this->organisationen_themen_id as $key => $value) {
                        $check_organisations->themen_detalis()->attach('organisation_id', [
                            'themengebiet_id' => $value,
                            'abteilung' => @$this->abteilung[$value],
                            'funktion_id' => @$this->funktion_id[$value],
                        ]);
                    }
                }

                $delete_person_organisation = Person_organisation::where('organisation_id', $check_organisations->id)->get();
                if (!empty($delete_person_organisation)) {
                    foreach ($delete_person_organisation as $value) {
                        Person_organisation::where('organisation_id', $value->organisation_id)->delete();
                    }
                }
                if (!empty($this->person_organisation_id)) {
                    foreach ($this->person_organisation_id as $key => $value) {
                        $check_organisations->person_detalis()->attach('organisation_id', [
                            'person_id' => $value,
                            'abteilung' => @$this->abteilung_person[$value],
                            'funktion_id' => @$this->funktion_person_id[$value],
                        ]);
                    }
                }

                $delete_user_organisation = User_organisation::where('organisation_id', $check_organisations->id)->get();
                if (!empty($delete_user_organisation)) {
                    foreach ($delete_user_organisation as $value) {
                        User_organisation::where('organisation_id', $value->organisation_id)->delete();
                    }
                }
                if (!empty($this->user_organisation_id)) {
                    foreach ($this->user_organisation_id as $key => $value) {
                        $check_organisations->user_detalis()->attach($value);
                    }
                }
            }
            if (!empty($this->organisationen_id)) {
                $message = 'Organisationen aktualisiert';
            } else {
                $message = 'Organisationen erstellt';
            }
            Notify::success($message, $title = "Erfolgreich..!");
            return redirect()->route('organisations.index');
        } catch (\Exception $e) {
            Bugsnag::notifyException(new RuntimeException($e));
            return back()->with(['alert-type' => 'danger', 'message' => $e->getMessage()]);
        }
    }

    public function back($section)
    {
        $this->currentSection = $section;
    }

    public function clearForm()
    {
        $this->funktion_person_id = "";
        $this->funktion_id = "";
        $this->organisations = "";
        $this->organisationen_themen_id = "";
        $this->organisationen_id = "";
        $this->titel = "";
        $this->synonyme = "";
        $this->adresse = "";
        $this->ort_id = "";
        $this->email = "";
        $this->telefon = "";
        $this->fax = "";
        $this->web = "";
        $this->uid = "";
        $this->fb = "";
        $this->wkonr = "";
        $this->user_organisation_id = "";
        $this->status_id = "";
        $this->person_organisation_id = "";
    }
}
