<div class="table-responsive">
    <table class="table table-bordered">
        <tr>
            <th>{{ __('messages.First Name') }}</th>
            <td>{{ $user->first_name }}</td>
        </tr>
        <tr>
            <th>{{ __('messages.Last Name') }}</th>
            <td>{{ $user->last_name }}</td>
        </tr>
        <tr>
            <th>{{ __('messages.Email') }}</th>
            <td>{{ $user->email }}</td>
        </tr>
        <tr>
            <th>{{ __('messages.is_activi') }}</th>
            <td>
                @if ($user->ist_aktivi == 'true')
                    <span class="badge bg-success">Aktiv</span>
                @else
                    <span class="badge bg-danger">Qeyri-aktiv</span>
                @endif
            </td>
        </tr>
        <tr>
            <th>{{ __('messages.RoleType') }}</th>
            <td>{{ $user->role_list->permission_list->name }}</td>
        </tr>
    </table>
</div>
