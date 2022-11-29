<div class="table-responsive">
    <table class="table table-bordered">
        <tr>
            <th>{{ __('messages.Nachname') }}</th>
            <td>
                @if (!empty($person->nachname))
                    {{ $person->nachname }}
                @else
                    -
                @endif
            </td>
        </tr>
        <tr>
            <th>{{ __('messages.Vorname') }}</th>
            <td>
                @if (!empty($person->vorname))
                    {{ $person->vorname }}
                @else
                    -
                @endif
            </td>
        </tr>
        <tr>
            <th>{{ __('messages.Status') }}</th>
            <td>
                @if (!empty($person->status_list->bezeichnung))
                    <span class='fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-danger-light text-danger'>
                        {{ $person->status_list->bezeichnung }} </span>
                @else
                    -
                @endif
            </td>
        </tr>
        <tr>
            <th>{{ __('messages.Organisations') }}</th>
            <td>
                @php
                    if (sizeof($person->organisation_detalis) > 0) {
                        foreach ($person->organisation_detalis as $value) {
                            echo "<span class='fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-info-light text-info' style='margin-right:3px; margin-top:3px'>" . $value->titel . '</span>';
                        }
                    }
                @endphp
            </td>
        </tr>
        <tr>
            <th>{{ __('messages.Netzwerkpartner') }}</th>
            <td>
                @php
                    if (sizeof($person->netzwerkpartner_detalis) > 0) {
                        foreach ($person->netzwerkpartner_detalis as $value) {
                            echo "<span class='fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-warning-light text-warning' style='margin-right:3px; margin-top:3px'>" . $value->bezeichnung . '</span>';
                        }
                    }
                @endphp
            </td>
        </tr>
    </table>
</div>
