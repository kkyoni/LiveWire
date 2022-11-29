@foreach (json_decode($roles->permissions) as $key => $area)
    <div class="form-group row">
        <div class="mb-4">
            <label class="form-label" for="example-text-input-alt">{{ $key }}</label>
            <input type="checkbox" class="form-check-input" @if (old('true') || (!old('submit') && $area)) checked='checked' @endif
                name="check[]" value="{{ $key }}" disabled>
        </div>
    </div>
@endforeach
