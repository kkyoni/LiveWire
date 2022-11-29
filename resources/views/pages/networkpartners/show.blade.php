<div class="table-responsive">
    <table class="table table-bordered">
        <tr>
            <th>{{ __('messages.Bezeichnung') }}</th>
            <td>
                @if (!empty($networkpartner->bezeichnung))
                    {{ $networkpartner->bezeichnung }}
                @else
                    -
                @endif
            </td>
        </tr>
        <tr>
            <th>{{ __('messages.Synonyme') }}</th>
            <td>
                @if (!empty($networkpartner->synonyme))
                    {{ $networkpartner->synonyme }}
                @else
                    -
                @endif
            </td>
        </tr>
        <tr>
            <th>{{ __('messages.Adresse') }}</th>
            <td>
                @if (!empty($networkpartner->adresse))
                    {{ $networkpartner->adresse }}
                @else
                    -
                @endif
            </td>
        </tr>
        <tr>
            <th>{{ __('messages.ort') }}</th>
            <td>
                @if (!empty($networkpartner->ort_id))
                    {{ $networkpartner->ort_list->plz }}
                @else
                    -
                @endif
            </td>
        </tr>
        <tr>
        <tr>
            <th>{{ __('messages.Telefon') }}</th>
            <td>{{ $networkpartner->telefon }}</td>
        </tr>
    </table>
</div>
