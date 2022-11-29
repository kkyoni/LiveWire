<div class="table-responsive">
    <table class="table table-bordered">
        <tr>
            <th>{{ __('messages.Text') }}</th>
            <td>
                @if (!empty($note->text))
                    {{ $note->text }}
                @else
                    -
                @endif
            </td>
        </tr>
        <tr>
            <th>{{ __('messages.User Id') }}</th>
            <td>
                @if (!empty($note->user_list))
                    {{ $note->user_list->first_name . ' ' . $note->user_list->last_name }}
                @else
                    -
                @endif
            </td>
        </tr>
    </table>
</div>
