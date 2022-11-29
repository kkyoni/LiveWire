<form>
    <div class="form-group row {{ $errors->first('bezeichnung') ? 'has-error' : '' }}">
        <div class="mb-4">
            <label class="form-label" for="example-text-input-alt">{{ __('messages.bezeichnung') }}</label>
            <span class="text-danger">*</span>
            {!! Form::text('bezeichnung', null, [
                'class' => 'form-control',
                'wire:model' => 'bezeichnung',
                'id' => 'example-text-input-alt',
                'placeholder' => 'bezeichnung',
                'aria-describedby' => 'bezeichnung',
            ]) !!}
            @error('bezeichnung')
                <span class="help-block">
                    <font color="red"> {{ $message }} </font>
                </span>
            @enderror
        </div>
    </div>
    <button wire:click.prevent="final()" class="btn btn-success">{{ __('messages.Finish') }}</button>
</form>
