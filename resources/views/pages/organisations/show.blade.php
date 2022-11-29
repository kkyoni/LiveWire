<div class="table-responsive">
    <table class="table table-bordered">
        <tr>
            <th>{{ __('messages.Bezeichnung') }}</th>
            <td>
                @if (!empty($organisations->titel))
                    {{ $organisations->titel }}
                @else
                    -
                @endif
            </td>
        </tr>
        <tr>
            <th>{{ __('messages.Synonyme') }}</th>
            <td>
                @if (!empty($organisations->synonyme))
                    {{ $organisations->synonyme }}
                @else
                    -
                @endif
            </td>
        </tr>
        <tr>
            <th>{{ __('messages.Adresse') }}</th>
            <td>
                @if (!empty($organisations->adresse))
                    {{ $organisations->adresse }}
                @else
                    -
                @endif
            </td>
        </tr>
        <tr>
            <th>{{ __('messages.ort') }}</th>
            <td>
                @if (!empty($organisations->ort_id))
                    {{ $organisations->ort_list->plz }}
                @else
                    -
                @endif
            </td>
        </tr>
        <tr>
        <tr>
            <th>{{ __('messages.Status') }}</th>
            <td>
                @if (!empty($organisations->status_list->bezeichnung))
                    {{ $organisations->status_list->bezeichnung }}
                @else
                    -
                @endif
            </td>
        </tr>
    </table>
</div>
