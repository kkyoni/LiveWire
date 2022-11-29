<?php

namespace App\Http\Livewire\Networkpartners;

use Livewire\Component;
use Illuminate\Http\Request;
use App\Models\NetworkPartner;
use App\Models\Person;
use App\Models\City;
use App\Models\Functions;
use Notify;
use Yajra\DataTables\DataTables;
use App\Models\Person_netzwerkpartner;
use Auth;
use Illuminate\Support\Facades\Validator;
use App\Helpers\Helper;
use Bugsnag\BugsnagLaravel\Facades\Bugsnag;
use RuntimeException;

class From extends Component
{
    public $i = 1;
    public $inputs = [];
    public $abteilung = [];
    public $listeners = ['setSomeNetwork'];
    public $currentSection = 1;
    public $funktion_id, $networkpartners, $networkpartners_id, $bezeichnung, $synonyme, $adresse, $ort_id, $email, $telefon, $web, $person_networkpartners_id;

    public function mount()
    {
        if (!empty($this->networkpartners)) {
            $networkpartners = NetworkPartner::find($this->networkpartners->id);
            $i = 1;
            foreach ($networkpartners->person_detalis as $key => $val) {
                $this->abteilung[$val->pivot->person_id] = $val->pivot->abteilung;
                $this->funktion_id[$val->pivot->person_id] = $val->pivot->funktion_id;
                $i++;
            }
            $this->person_list = Person::pluck('nachname', 'id');
            $this->ort_list = City::pluck('plz', 'id');
            $this->functions_list = Functions::pluck('bezeichnung', 'id');
            $this->networkpartners_id = $networkpartners->id;
            $this->bezeichnung = $networkpartners->bezeichnung;
            $this->synonyme = $networkpartners->synonyme;
            $this->adresse = $networkpartners->adresse;
            $this->ort_id = $networkpartners->ort_id;
            $this->email = $networkpartners->email;
            $this->telefon = $networkpartners->telefon;
            $this->web = $networkpartners->web;
            $this->person_networkpartners_id = $networkpartners->person_detalis->pluck('id');
            $this->inputs = $networkpartners->person_detalis->pluck('id');
        }
    }

    public function render()
    {
        $this->person_list = Person::pluck('nachname', 'id');
        $this->ort_list = City::get();
        $this->functions_list = Functions::pluck('bezeichnung', 'id');
        return view('pages.networkpartners.from');
    }

    public function step1()
    {
        $customMessages = [
            'bezeichnung.required'     => 'bezeichnung ist nötig',
        ];
        $validatedData = $this->validate([
            'bezeichnung' => 'required',
        ], $customMessages);
        $this->currentSection = 2;
    }

    public function setSomeNetwork($i)
    {
        $this->inputs = $i;
    }

    public function step2()
    {
        try {
            $checknetwork = NetworkPartner::updateOrCreate(['id' => $this->networkpartners_id], [
                'bezeichnung' => $this->bezeichnung,
                'synonyme' => $this->synonyme,
                'adresse' => $this->adresse,
                'ort_id' => $this->ort_id,
                'email' => $this->email,
                'telefon' => $this->telefon,
                'web' => $this->web,
            ]);

            if (!empty($checknetwork)) {
                $delete_network_person = Person_netzwerkpartner::where('netzwerkpartner_id', $checknetwork->id)->get();
                if (!empty($delete_network_person)) {
                    foreach ($delete_network_person as $value) {
                        Person_netzwerkpartner::where('netzwerkpartner_id', $value->netzwerkpartner_id)->delete();
                    }
                }
                if (!empty($this->person_networkpartners_id)) {
                    foreach ($this->person_networkpartners_id as $key => $value) {
                        $checknetwork->person_detalis()->attach('netzwerkpartner_id', [
                            'netzwerkpartner_id' => $checknetwork->id,
                            'person_id' => $value,
                            'abteilung' => @$this->abteilung[$value],
                            'funktion_id' => @$this->funktion_id[$value],
                        ]);
                    }
                }
            }
            if (!empty($this->networkpartners_id)) {
                $message = 'Werbenetzwerkpartner aktualisiert';
            } else {
                $message = 'Werbenetzwerkpartner erstellt';
            }
            Notify::success($message, $title = "Erfolgreich..!");
            return redirect()->route('networkpartners.index');
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
        $this->funktion_id = "";
        $this->networkpartners = "";
        $this->networkpartners_id = "";
        $this->bezeichnung = "";
        $this->synonyme = "";
        $this->adresse = "";
        $this->ort_id = "";
        $this->email = "";
        $this->telefon = "";
        $this->web = "";
        $this->person_networkpartners_id = "";
    }
}
