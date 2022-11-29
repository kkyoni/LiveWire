@foreach (json_decode($roles->permissions) as $key => $area)
    <div class="form-group row">
        <div class="mb-4">
            <label class="form-label" for="example-text-input-alt">{{ $key }}</label>
            <input type="checkbox" @if (old('true') || (!old('submit') && $area)) checked='checked' @endif name="check[]"
                value="{{ $key }}">
        </div>
    </div>
@endforeach
@section('styles')
@endsection
@section('scripts')
@endsection
