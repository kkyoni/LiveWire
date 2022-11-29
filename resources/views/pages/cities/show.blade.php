<div class="table-responsive">
    <table class="table table-bordered">
        <tr>
            <th>{{ __('messages.plz') }}</th>
            <td>{{ $cities->plz }}</td>
        </tr>
        <tr>
            <th>{{ __('messages.bezeichnung') }}</th>
            <td>{{ $cities->bezeichnung }}</td>
        </tr>
        <tr>
            <th>{{ __('messages.bundesland_id') }}</th>
            <td>
                @if ($cities->bundesland_id == '1')
                    bundesland Id
                @elseif($cities->bundesland_id == '2')
                    bundesland Id1
                @elseif($cities->bundesland_id == '3')
                    bundesland Id2
                @else
                    -
                @endif
            </td>
        </tr>
        <tr>
            <th>{{ __('messages.land_id') }}</th>

            <td>
                @if (!empty($cities->land_id))
                    {{ $cities->land_list->Bezeichnung }}
                @else
                    -
                @endif
        </tr>
    </table>
</div>
