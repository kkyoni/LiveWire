<?php

namespace App\Http\Livewire\Branchoffice;

use Livewire\Component;
use Illuminate\Http\Request;
use App\Models\BranchOffice;
use App\Models\Person;
use App\Models\City;
use App\Models\NetworkPartner;
use App\Models\Topic;
use App\Models\Organisations;
use App\Models\User;
use App\Models\Functions;
use Notify;
use Yajra\DataTables\DataTables;
use App\Models\Mitglied_themen;
use App\Models\Mitglied_netzwerkpartner;
use App\Models\User_mitglied;
use Auth;
use App\Models\Person_mitglied;
use Illuminate\Support\Facades\Validator;
use App\Helpers\Helper;
use App\Models\Status;
use Bugsnag\BugsnagLaravel\Facades\Bugsnag;
use RuntimeException;

class From extends Component
{
    public $i = 1;
    public $i1 = 1;
    public $i2 = 1;
    public $inputs2 = [];
    public $inputs1 = [];
    public $inputs = [];
    public $abteilung = [];
    public $abteilung_network = [];
    public $abteilung_person = [];
    public $listeners = ['setSomeProperty', 'setSomeNetwork', 'setSomeMitglied'];
    public $currentSection = 1;
    public $funktion_id_person, $funktion_id_network, $funktion_id, $branchoffice, $branchoffice_id, $organisation_id, $bezeichnung, $feei_id, $ort_id, $einteilung, $feei_kv, $feei_member, $ev_member, $adresse, $email, $telefon, $fax, $web, $status_id, $mitglied_netzwerkpartner_id, $mitglied_themen_id, $user_id, $person_mitglied_id;

    public function mount()
    {
        if (!empty($this->branchoffice)) {
            $branchoffice = BranchOffice::find($this->branchoffice->id);
            $i = 1;
            foreach ($branchoffice->themen_detalis as $key => $val) {
                $this->abteilung[$val->pivot->themengebiet_id] = $val->pivot->abteilung;
                $this->funktion_id[$val->pivot->themengebiet_id] = $val->pivot->funktion_id;
                $i++;
            }
            $i1 = 1;
            foreach ($branchoffice->network_detalis as $key => $val) {
                $this->abteilung_network[$val->pivot->netzwerkpartner_id] = $val->pivot->abteilung;
                $this->funktion_id_network[$val->pivot->netzwerkpartner_id] = $val->pivot->funktion_id;
                $i1++;
            }
            $i2 = 1;
            foreach ($branchoffice->person_detalis as $key => $val) {
                $this->abteilung_person[$val->pivot->person_id] = $val->pivot->abteilung;
                $this->funktion_id_person[$val->pivot->person_id] = $val->pivot->funktion_id;
                $i2++;
            }
            $this->ort_list = City::pluck('plz', 'id');
            $this->einteilung_list = array('1' => 'A', '2' => 'B', '3' => 'C');
            $this->status_list = Status::pluck('bezeichnung', 'id');
            $this->networkpartner_list = NetworkPartner::pluck('bezeichnung', 'id');
            $this->topic_list = Topic::pluck('bezeichnung', 'id');
            $this->person_list = Person::pluck('nachname', 'id');
            $this->organisations_list = Organisations::pluck('titel', 'id');
            $this->user_list = User::pluck('first_name', 'id');
            $this->functions_list = Functions::pluck('bezeichnung', 'id');
            $this->branchoffice_id = $branchoffice->id;
            $this->organisation_id = $branchoffice->organisation_id;
            $this->bezeichnung = $branchoffice->bezeichnung;
            $this->feei_id = $branchoffice->feei_id;
            $this->ort_id = $branchoffice->ort_id;
            $this->einteilung = $branchoffice->einteilung;
            $this->feei_kv = $branchoffice->feei_kv;
            $this->feei_member = $branchoffice->feei_member;
            $this->ev_member = $branchoffice->ev_member;
            $this->adresse = $branchoffice->adresse;
            $this->email = $branchoffice->email;
            $this->telefon = $branchoffice->telefon;
            $this->fax = $branchoffice->fax;
            $this->web = $branchoffice->web;
            $this->status_id = $branchoffice->status_id;
            $this->mitglied_netzwerkpartner_id = $branchoffice->network_detalis->pluck('id');
            $this->mitglied_themen_id = $branchoffice->themen_detalis->pluck('id');
            $this->user_id = $branchoffice->user_details->pluck('id');
            $this->person_mitglied_id = $branchoffice->person_detalis->pluck('id');
            $this->inputs = $branchoffice->themen_detalis->pluck('id');
            $this->inputs1 = $branchoffice->network_detalis->pluck('id');
            $this->inputs2 = $branchoffice->person_detalis->pluck('id');
        }
    }

    public function render()
    {
        $this->ort_list = City::get();
        $this->einteilung_list = array('1' => 'A', '2' => 'B', '3' => 'C');
        $this->status_list = Status::pluck('bezeichnung', 'id');
        $this->networkpartner_list = NetworkPartner::pluck('bezeichnung', 'id');
        $this->topic_list = Topic::pluck('bezeichnung', 'id');
        $this->person_list = Person::pluck('nachname', 'id');
        $this->organisations_list = Organisations::pluck('titel', 'id');
        $this->user_list = User::pluck('first_name', 'id');
        $this->functions_list = Functions::pluck('bezeichnung', 'id');
        return view('pages.branchoffice.from');
    }

    public function step1()
    {
        $customMessages = [
            'organisation_id.required'   => 'organisation ist nötig',
            'adresse.required'           => 'adresse ist nötig',
            'status_id.required'         => 'status ist nötig',
            'ort_id.required'            => 'ort ist nötig',
        ];
        $validatedData = $this->validate([
            'adresse'         => 'required',
            'organisation_id' => 'required',
            'status_id'       => 'required',
            'ort_id'          => 'required',
        ], $customMessages);
        $this->currentSection = 2;
    }

    public function step2()
    {
        try {
            $checkBranch = BranchOffice::updateOrCreate(['id' => $this->branchoffice_id], [
                'organisation_id' => $this->organisation_id,
                'bezeichnung' => $this->bezeichnung,
                'feei_id' => $this->feei_id,
                'ort_id' => $this->ort_id,
                'einteilung' => $this->einteilung,
                'feei_kv' => (bool) $this->feei_kv,
                'feei_member' => (bool) $this->feei_member,
                'ev_member' => (bool) $this->ev_member,
                'adresse' => $this->adresse,
                'email' => $this->email,
                'telefon' => $this->telefon,
                'fax' => $this->fax,
                'web' => $this->web,
                'status_id' => $this->status_id,
            ]);

            if (!empty($checkBranch)) {
                $delete_themen_branch = Mitglied_themen::where('mitglied_id', $checkBranch->id)->get();
                if (!empty($delete_themen_branch)) {
                    foreach ($delete_themen_branch as $value) {
                        Mitglied_themen::where('mitglied_id', $value->mitglied_id)->delete();
                    }
                }
                if (!empty($this->mitglied_themen_id)) {
                    foreach ($this->mitglied_themen_id as $key => $value) {
                        $checkBranch->themen_detalis()->attach('mitglied_id', [
                            'mitglied_id' => $checkBranch->id,
                            'themengebiet_id' => $value,
                            'abteilung' => @$this->abteilung[$value],
                            'funktion_id' => @$this->funktion_id[$value],
                        ]);
                    }
                }

                $delete_network_branch = Mitglied_netzwerkpartner::where('mitglied_id', $checkBranch->id)->get();
                if (!empty($delete_network_branch)) {
                    foreach ($delete_network_branch as $value) {
                        Mitglied_netzwerkpartner::where('mitglied_id', $value->mitglied_id)->delete();
                    }
                }
                if (!empty($this->mitglied_netzwerkpartner_id)) {
                    foreach ($this->mitglied_netzwerkpartner_id as $key => $value) {
                        $checkBranch->network_detalis()->attach('mitglied_id', [
                            'mitglied_id' => $checkBranch->id,
                            'netzwerkpartner_id' => $value,
                            'abteilung' => @$this->abteilung_network[$value],
                            'funktion_id' => @$this->funktion_id_network[$value],
                        ]);
                    }
                }
                $delete_person_branch = Person_mitglied::where('mitglied_id', $checkBranch->id)->get();
                if (!empty($delete_person_branch)) {
                    foreach ($delete_person_branch as $value) {
                        Person_mitglied::where('mitglied_id', $value->mitglied_id)->delete();
                    }
                }
                if (!empty($this->person_mitglied_id)) {
                    foreach ($this->person_mitglied_id as $key => $value) {
                        $checkBranch->person_detalis()->attach('mitglied_id', [
                            'mitglied_id' => $checkBranch->id,
                            'person_id' => $value,
                            'abteilung' => @$this->abteilung_person[$value],
                            'funktion_id' => @$this->funktion_id_person[$value],
                        ]);
                    }
                }

                $delete_User_mitglied = User_mitglied::where('mitglied_id', $checkBranch->id)->get();
                if (!empty($delete_User_mitglied)) {
                    foreach ($delete_User_mitglied as $value) {
                        User_mitglied::where('mitglied_id', $value->mitglied_id)->delete();
                    }
                }
                if (!empty($this->user_id)) {
                    foreach ($this->user_id as $key => $value) {
                        $checkBranch->user_details()->attach($value);
                    }
                }
            }
            if (!empty($this->branchoffice_id)) {
                $message = 'BranchOffice aktualisiert';
            } else {
                $message = 'BranchOffice erstellt';
            }
            Notify::success($message, $title = "Erfolgreich..!");
            return redirect()->route('branchoffice.index');
        } catch (\Exception $e) {
            Bugsnag::notifyException(new RuntimeException($e));
            return back()->with(['alert-type' => 'danger', 'message' => $e->getMessage()]);
        }
    }

    public function setSomeProperty($i)
    {
        $this->inputs = $i;
    }

    public function setSomeNetwork($i1)
    {
        $this->inputs1 = $i1;
    }

    public function setSomeMitglied($i2)
    {
        $this->inputs2 = $i2;
    }

    public function back($section)
    {
        $this->currentSection = $section;
    }

    public function clearForm()
    {
        $this->funktion_id_person = "";
        $this->funktion_id_network = "";
        $this->funktion_id = "";
        $this->branchoffice = "";
        $this->branchoffice_id = "";
        $this->organisation_id = "";
        $this->bezeichnung = "";
        $this->feei_id = "";
        $this->ort_id = "";
        $this->einteilung = "";
        $this->feei_kv = "";
        $this->feei_member = "";
        $this->ev_member = "";
        $this->adresse = "";
        $this->email = "";
        $this->telefon = "";
        $this->fax = "";
        $this->web = "";
        $this->status_id = "";
        $this->mitglied_netzwerkpartner_id = "";
        $this->mitglied_themen_id = "";
        $this->user_id = "";
        $this->person_mitglied_id = "";
    }
}
