<div class="table-responsive">
    <table class="table table-bordered">
        <tr>
            <th>{{ __('messages.organisation') }}</th>
            <td>
                @if (!empty($branchoffice->organisation_id))
                    {{ $branchoffice->organisations_list->titel }}
                @else
                    -
                @endif
            </td>
        </tr>
        <tr>
            <th>{{ __('messages.bezeichnung') }}</th>
            <td>
                @if (!empty($branchoffice->bezeichnung))
                    {{ $branchoffice->bezeichnung }}
                @else
                    -
                @endif
            </td>
        </tr>
        <tr>
            <th>{{ __('messages.einteilung') }}</th>
            <td>
                @if ($branchoffice->einteilung == '1')
                    A
                @elseif($branchoffice->einteilung == '2')
                    B
                @elseif($branchoffice->einteilung == '3')
                    C
                @else
                    -
                @endif
            </td>
        </tr>
        <tr>
            <th>{{ __('messages.feei_member') }}</th>
            <td>
                @if (!empty($branchoffice->feei_member))
                    {{ $branchoffice->feei_member }}
                @else
                    -
                @endif
            </td>
        </tr>
        <tr>
            <th>{{ __('messages.adresse') }}</th>
            <td>
                @if (!empty($branchoffice->adresse))
                    {{ $branchoffice->adresse }}
                @else
                    -
                @endif
            </td>
        </tr>
        <tr>
            <th>{{ __('messages.ort') }}</th>
            <td>
                @if (!empty($branchoffice->ort_id))
                    {{ $branchoffice->ort_list->plz }}
                @else
                    -
                @endif
            </td>

        </tr>
        <tr>
            <th>{{ __('messages.telefon') }}</th>
            <td>
                @if (!empty($branchoffice->telefon))
                    {{ $branchoffice->telefon }}
                @else
                    -
                @endif
            </td>
        </tr>
        <tr>
            <th>{{ __('messages.Status') }}</th>
            <td>
                @if (!empty($branchoffice->status_list->bezeichnung))
                    {{ $branchoffice->status_list->bezeichnung }}
                @else
                    -
                @endif
            </td>
        </tr>
    </table>
</div>
