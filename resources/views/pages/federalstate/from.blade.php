<form>
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

    <div class="mb-4">
        <label class="form-label" for="example-text-input-alt">{{ __('messages.Land id') }}</label>
        <span class="text-danger">*</span>
        {!! Form::select('land_id', $land_list, $this->land_id, [
            'class' => 'form-control',
            'id' => 'land_id',
            'wire:model' => 'land_id',
            'aria-describedby' => 'land_id',
            'placeholder' => 'Choose Land...',
        ]) !!}
        @error('land_id')
            <span class="help-block">
                <font color="red"> {{ $message }} </font>
            </span>
        @enderror
    </div>
    <button wire:click.prevent="final()" class="btn btn-success">{{ __('messages.Finish') }}</button>
</form>
