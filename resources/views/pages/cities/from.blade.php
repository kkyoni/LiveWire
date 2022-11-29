<form>
    <div class="pt-5">
        <ul class="nav nav-pills nav-fill">
            <li class="nav-item">
                <a class="nav-link {{ $currentSection != 1 ? '' : 'active' }}"
                    href="#step1">{{ __('messages.Grunddaten') }}</a>
            </li>
        </ul>
        <div class="row pt-3">
            {{-- Step 1 --}}
            <div id="step1" class="needs-validation" style="display: {{ $currentSection != 1 ? 'none' : '' }}">
                <div class="form-group row {{ $errors->first('text') ? 'has-error' : '' }}">

                    <div class="mb-4">
                        <label class="form-label" for="example-text-input-alt">{{ __('messages.plz') }}</label>
                        <span class="text-danger">*</span>
                        {!! Form::text('plz', null, [
                            'class' => 'form-control',
                            'wire:model' => 'plz',
                            'id' => 'example-text-input-alt',
                            'placeholder' => 'Postleitzahl',
                            'aria-describedby' => 'plz',
                        ]) !!}
                        @error('plz')
                            <span class="help-block">
                                <font color="red"> {{ $message }} </font>
                            </span>
                        @enderror
                    </div>

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
                        <label class="form-label"
                            for="example-text-input-alt">{{ __('messages.bundesland_id') }}</label>
                        {!! Form::select('bundesland_id', $bundesland_list, $this->bundesland_id, [
                            'class' => 'form-control',
                            'id' => 'bundesland_id',
                            'wire:model' => 'bundesland_id',
                            'aria-describedby' => 'bundesland_id',
                            'placeholder' => 'Choose Bundesland...',
                        ]) !!}
                        @error('bundesland_id')
                            <span class="help-block">
                                <font color="red"> {{ $message }} </font>
                            </span>
                        @enderror
                    </div>
                    @if (empty($this->cities))
                        <div class="mb-4">
                            <label class="form-label" for="example-text-input-alt">{{ __('messages.land_id') }}</label>
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
                    @endif
                    <div id="step1" style="display: {{ $currentSection != 1 ? 'none' : '' }}">
                        <button wire:click.prevent="step1()"
                            class="btn btn-success">{{ __('messages.Finish') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
