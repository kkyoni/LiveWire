<form>
    <div class="pt-5">
        <ul class="nav nav-pills nav-fill">
            <li class="nav-item">
                <a class="nav-link {{ $currentSection != 1 ? '' : 'active' }}" href="#step1">Notizen</a>
            </li>
        </ul>
        <div class="row pt-3">
            {{-- Step 1 --}}
            <div id="step1" class="needs-validation" style="display: {{ $currentSection != 1 ? 'none' : '' }}">

                <div class="form-group row {{ $errors->first('text') ? 'has-error' : '' }}">
                    <div class="mb-4">
                        <label class="form-label" for="example-text-input-alt">{{ __('messages.Notiz') }}</label>
                        <span class="text-danger">*</span>
                        {!! Form::text('text', null, [
                            'class' => 'form-control',
                            'wire:model' => 'text',
                            'id' => 'example-text-input-alt',
                            'placeholder' => 'Notiz',
                            'aria-describedby' => 'text',
                        ]) !!}
                        @error('text')
                            <span class="help-block">
                                <font color="red"> {{ $message }} </font>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>

            <div id="step1" style="display: {{ $currentSection != 1 ? 'none' : '' }}">
                <button wire:click.prevent="step1()" class="btn btn-success">Finish</button>
            </div>
        </div>
    </div>
</form>
