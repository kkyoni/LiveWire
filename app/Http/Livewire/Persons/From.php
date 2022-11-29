<?php

namespace App\Http\Livewire\Persons;

use Livewire\Component;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Person;
use App\Models\Functions;
use App\Models\Topic;
use App\Models\Salutation;
use App\Models\Person_mitglied;
use App\Models\Person_themen;
use App\Models\User_person;
use App\Models\User;
use App\Models\Organisations;
use App\Models\NetworkPartner;
use App\Models\Titleprefix;
use App\Models\Titleawarded;
use App\Models\Person_netzwerkpartner;
use App\Models\Status;
use App\Models\Titlesuffix;
use Notify;
use Yajra\DataTables\DataTables;
use Auth;
use App\Helpers\Helper;
use App\Models\BranchOffice;
use App\Models\Person_organisation;
use Bugsnag\BugsnagLaravel\Facades\Bugsnag;
use RuntimeException;

use function Termwind\render;

class From extends Component
{
    public $currentSection = 1;
    public $i = 1;
    public $i1 = 1;
    public $i2 = 1;
    public $i3 = 1;
    public $inputs = [];
    public $inputs1 = [];
    public $inputs2 = [];
    public $inputs3 = [];
    public $abteilung = [];
    public $abteilung_organisation = [];
    public $abteilung_mitglied = [];
    public $abteilung_netzwerkpartner = [];
    public $listeners = ['setSomePerson', 'setSomeOrganisation', 'setSomeMitglied', 'setSomeNetworkPartner'];
    public $funktion_netzwerkpartner_id, $funktion_mitglied_id, $funktion_organisation_id, $funktion_id, $person, $person_id, $nachname, $vorname, $anrede_id, $person_themen_id, $user_id, $sprache, $anrede_brief_manuell, $anrede_adresse_manuell, $titel_id, $titel_verliehen_id, $titel_nachgestellt_id, $email, $telefon, $mobil, $email2, $telefon2, $mobil2, $fax, $person_id_assistenz, $person_id_assistenz2, $status_person_id, $sprach, $person_organisation_id, $person_mitglied_id, $person_stakeholder_id;

    public function mount()
    {
        if (!empty($this->person)) {
            $person = Person::find($this->person->id);
            $i = 1;
            foreach ($person->themen_detalis as $key => $val) {
                $this->abteilung[$val->pivot->themengebiet_id] = $val->pivot->abteilung;
                $this->funktion_id[$val->pivot->themengebiet_id] = $val->pivot->funktion_id;
                $i++;
            }
            $i1 = 1;
            foreach ($person->organisation_detalis as $key => $val) {
                $this->abteilung_organisation[$val->pivot->organisation_id] = $val->pivot->abteilung;
                $this->funktion_organisation_id[$val->pivot->organisation_id] = $val->pivot->funktion_id;
                $i1++;
            }
            $i2 = 1;
            foreach ($person->branchoffice_detalis as $key => $val) {
                $this->abteilung_mitglied[$val->pivot->mitglied_id] = $val->pivot->abteilung;
                $this->funktion_mitglied_id[$val->pivot->mitglied_id] = $val->pivot->funktion_id;
                $i2++;
            }
            $i3 = 1;
            foreach ($person->netzwerkpartner_detalis as $key => $val) {
                $this->abteilung_netzwerkpartner[$val->pivot->netzwerkpartner_id] = $val->pivot->abteilung;
                $this->funktion_netzwerkpartner_id[$val->pivot->netzwerkpartner_id] = $val->pivot->funktion_id;
                $i3++;
            }
            $this->topic_list = Topic::pluck('bezeichnung', 'id');
            $this->user_list = User::pluck('first_name', 'id');
            $this->organisations_list = Organisations::pluck('titel', 'id');
            $this->networkpartner_list = NetworkPartner::pluck('bezeichnung', 'id');
            $this->branchoffice_list = BranchOffice::pluck('bezeichnung', 'id');
            $this->status_list = Status::pluck('bezeichnung', 'id');
            $this->anrede_list = Salutation::pluck('bezeichnung', 'id');
            $this->titel_vorangestellt_list = Titleprefix::pluck('bezeichnung', 'id');
            $this->titel_verliehen_list = Titleawarded::pluck('bezeichnung', 'id');
            $this->titel_nachgestellt_list = Titlesuffix::pluck('bezeichnung', 'id');
            $this->person_assistenz_list = Person::pluck('nachname', 'id');
            $this->person_assistenz_list = Person::pluck('vorname', 'id');
            $this->functions_list = Functions::pluck('bezeichnung', 'id');
            $this->person_id = $person->id;
            $this->nachname = $person->nachname;
            $this->vorname = $person->vorname;
            $this->anrede_id = $person->anrede_id;
            $this->anrede_brief_manuell = $person->anrede_brief_manuell;
            $this->anrede_adresse_manuell = $person->anrede_adresse_manuell;
            $this->titel_id = $person->titel_id;
            $this->titel_verliehen_id = $person->titel_verliehen_id;
            $this->titel_nachgestellt_id = $person->titel_nachgestellt_id;
            $this->email = $person->email;
            $this->telefon = $person->telefon;
            $this->mobil = $person->mobil;
            $this->email2 = $person->email2;
            $this->telefon2 = $person->telefon2;
            $this->mobil2 = $person->mobil2;
            $this->fax = $person->fax;
            $this->person_themen_id = $person->themen_detalis->pluck('id');
            $this->user_id = $person->user_detalis->pluck('id');
            $this->person_organisation_id = $person->organisation_detalis->pluck('id');
            $this->person_mitglied_id = $person->branchoffice_detalis->pluck('id');
            $this->person_stakeholder_id = $person->netzwerkpartner_detalis->pluck('id');
            $this->person_id_assistenz = $person->person_id_assistenz;
            $this->person_id_assistenz2 = $person->person_id_assistenz2;
            $this->status_person_id = $person->status_person_id;
            $this->sprache = $person->sprache;
            $this->inputs = $person->themen_detalis->pluck('id');
            $this->inputs1 = $person->organisation_detalis->pluck('id');
            $this->inputs2 = $person->branchoffice_detalis->pluck('id');
            $this->inputs3 = $person->netzwerkpartner_detalis->pluck('id');
        }
    }

    public function render()
    {
        $this->topic_list = Topic::pluck('bezeichnung', 'id');
        $this->user_list = User::pluck('first_name', 'id');
        $this->organisations_list = Organisations::pluck('titel', 'id');
        $this->networkpartner_list = NetworkPartner::pluck('bezeichnung', 'id');
        $this->branchoffice_list = BranchOffice::pluck('bezeichnung', 'id');
        $this->status_list = Status::pluck('bezeichnung', 'id');
        $this->anrede_list = Salutation::pluck('bezeichnung', 'id');
        $this->titel_vorangestellt_list = Titleprefix::pluck('bezeichnung', 'id');
        $this->titel_verliehen_list = Titleawarded::pluck('bezeichnung', 'id');
        $this->titel_nachgestellt_list = Titlesuffix::pluck('bezeichnung', 'id');
        $this->person_assistenz_list = Person::pluck('nachname', 'id');
        $this->person_assistenz2_list = Person::pluck('vorname', 'id');
        $this->functions_list = Functions::pluck('bezeichnung', 'id');
        return view('pages.persons.from');
    }

    public function step1()
    {
        if (!empty($this->person)) {
            $customMessages = [
                'nachname.required'               => 'nachname ist nötig',
                'vorname.required'                => 'vorname ist nötig',
                'anrede_id.required'              => 'anrede id ist nötig',
                'email.required'                  => 'E-Mailadresse wird benötigt',
                'email.unique'                    => 'Eindeutige E-Mail-Adresse',
                'email.regex'                     => 'Geben Sie die richtige E-Mail an',
                'telefon.required'                => 'telefon  ist nötig',
                'status_person_id.required'       => 'status person id  ist nötig',
                'sprache.required'                => 'sprache  ist nötig',
            ];
            $validatedData = $this->validate([
                'nachname'  => 'required',
                'vorname'  => 'required',
                'anrede_id'  => 'required',
                'email'  => 'required|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix|email|unique:person,email,' . $this->person_id . ',id,deleted_at,NULL',
                'telefon'  => 'required',
                'status_person_id'  => 'required',
                'sprache' => 'required',
            ], $customMessages);
        } else {
            $customMessages = [
                'nachname.required'               => 'nachname ist nötig',
                'vorname.required'                => 'vorname ist nötig',
                'anrede_id.required'              => 'anrede id ist nötig',
                'email.required'                  => 'email  ist nötig',
                'email.unique'                    => 'Eindeutige E-Mail-Adresse',
                'email.regex'                     => 'Geben Sie die richtige E-Mail an',
                'telefon.required'                => 'telefon  ist nötig',
                'status_person_id.required'       => 'status person id  ist nötig',
                'sprache.required'                => 'sprache  ist nötig',
            ];
            $validatedData = $this->validate([
                'nachname'  => 'required',
                'vorname'  => 'required',
                'anrede_id'  => 'required',
                'email'    => 'required|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix|unique:person,email,NULL,id,deleted_at,NULL',
                'telefon'  => 'required',
                'status_person_id'  => 'required',
                'sprache' => 'required',
            ], $customMessages);
        }

        $this->currentSection = 2;
    }

    public function step2()
    {
        $this->currentSection = 3;
    }

    public function step3()
    {
        $this->currentSection = 4;
    }

    public function setSomePerson($i)
    {
        $this->inputs = $i;
    }

    public function setSomeOrganisation($i1)
    {
        $this->inputs1 = $i1;
    }

    public function setSomeMitglied($i2)
    {
        $this->inputs2 = $i2;
    }

    public function setSomeNetworkPartner($i3)
    {
        $this->inputs3 = $i3;
    }

    public function step4()
    {
        try {
            $check_person = Person::updateOrCreate(['id' => $this->person_id], [
                'nachname' => $this->nachname,
                'vorname' => $this->vorname,
                'anrede_id' => $this->anrede_id,
                'anrede_brief_manuell' => $this->anrede_brief_manuell,
                'anrede_adresse_manuell' => $this->anrede_adresse_manuell,
                'titel_id' => $this->titel_id,
                'titel_verliehen_id' => $this->titel_verliehen_id,
                'titel_nachgestellt_id' => $this->titel_nachgestellt_id,
                'email' => $this->email,
                'telefon' => $this->telefon,
                'mobil' => $this->mobil,
                'email2' => $this->email2,
                'telefon2' => $this->telefon2,
                'mobil2' => $this->mobil2,
                'fax' => $this->fax,
                'person_id_assistenz' => $this->person_id_assistenz,
                'person_id_assistenz2' => $this->person_id_assistenz2,
                'status_person_id' => $this->status_person_id,
                'sprache' => $this->sprache
            ]);
            if (!empty($check_person)) {
                $delete_person = Person_themen::where('person_id', $check_person->id)->get();
                if (!empty($delete_person)) {
                    foreach ($delete_person as $value) {
                        Person_themen::where('person_id', $value->person_id)->delete();
                    }
                }
                if (!empty($this->person_themen_id)) {
                    foreach ($this->person_themen_id as $key => $value) {
                        $check_person->themen_detalis()->attach('person_id', [
                            'person_id' => $check_person->id,
                            'themengebiet_id' => $value,
                            'abteilung' => @$this->abteilung[$value],
                            'funktion_id' => @$this->funktion_id[$value],
                        ]);
                    }
                }

                $delete_person_organisation = Person_organisation::where('person_id', $check_person->id)->get();
                if (!empty($delete_person_organisation)) {
                    foreach ($delete_person_organisation as $value) {
                        Person_organisation::where('person_id', $value->person_id)->delete();
                    }
                }
                if (!empty($this->person_organisation_id)) {
                    foreach ($this->person_organisation_id as $key => $value) {
                        $check_person->organisation_detalis()->attach('person_id', [
                            'person_id' => $check_person->id,
                            'organisation_id' => $value,
                            'abteilung' => @$this->abteilung_organisation[$value],
                            'funktion_id' => @$this->funktion_organisation_id[$value],
                        ]);
                    }
                }


                $delete_person_mitglied = Person_organisation::where('person_id', $check_person->id)->get();
                if (!empty($delete_person_mitglied)) {
                    foreach ($delete_person_mitglied as $value) {
                        Person_mitglied::where('person_id', $value->person_id)->delete();
                    }
                }
                if (!empty($this->person_mitglied_id)) {
                    foreach ($this->person_mitglied_id as $key => $value) {
                        $check_person->branchoffice_detalis()->attach('person_id', [
                            'person_id' => $check_person->id,
                            'mitglied_id' => $value,
                            'abteilung' => @$this->abteilung_mitglied[$value],
                            'funktion_id' => @$this->funktion_mitglied_id[$value],
                        ]);
                    }
                }

                $delete_person_netzwerkpartner = Person_netzwerkpartner::where('person_id', $check_person->id)->get();
                if (!empty($delete_person_netzwerkpartner)) {
                    foreach ($delete_person_netzwerkpartner as $value) {
                        Person_netzwerkpartner::where('person_id', $value->person_id)->delete();
                    }
                }
                if (!empty($this->person_stakeholder_id)) {
                    foreach ($this->person_stakeholder_id as $key => $value) {
                        $check_person->netzwerkpartner_detalis()->attach('person_id', [
                            'person_id' => $check_person->id,
                            'netzwerkpartner_id' => $value,
                            'abteilung' => @$this->abteilung_netzwerkpartner[$value],
                            'funktion_id' => @$this->funktion_netzwerkpartner_id[$value],
                        ]);
                    }
                }

                $delete_user_person = User_person::where('person_id', $check_person->id)->get();
                if (!empty($delete_user_person)) {
                    foreach ($delete_user_person as $value) {
                        User_person::where('person_id', $value->person_id)->delete();
                    }
                }
                if (!empty($this->user_id)) {
                    foreach ($this->user_id as $key => $value) {
                        $check_person->user_detalis()->attach($value);
                    }
                }
            }
            if (!empty($this->person_id)) {
                $message = 'Person aktualisiert';
            } else {
                $message = 'Person erstellt';
            }
            Notify::success($message, $title = "Erfolgreich..!");
            return redirect()->route('persons.index');
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
        $this->funktion_netzwerkpartner_id = "";
        $this->funktion_mitglied_id = "";
        $this->funktion_organisation_id = "";
        $this->funktion_id = "";
        $this->person = "";
        $this->person_id = "";
        $this->nachname = "";
        $this->vorname = "";
        $this->anrede_id = "";
        $this->person_themen_id = "";
        $this->user_id = "";
        $this->sprache = "";
        $this->anrede_brief_manuell = "";
        $this->anrede_adresse_manuell = "";
        $this->titel_id = "";
        $this->titel_verliehen_id = "";
        $this->titel_nachgestellt_id = "";
        $this->email = "";
        $this->telefon = "";
        $this->mobil = "";
        $this->email2 = "";
        $this->telefon2 = "";
        $this->mobil2 = "";
        $this->fax = "";
        $this->person_id_assistenz = "";
        $this->person_id_assistenz2 = "";
        $this->status_person_id = "";
        $this->sprach = "";
        $this->person_organisation_id = "";
        $this->person_mitglied_id = "";
        $this->person_stakeholder_id = "";
    }
}
