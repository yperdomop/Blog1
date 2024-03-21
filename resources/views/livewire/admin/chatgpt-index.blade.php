<div>
    <div class="form-group" style="position: relative;">
        {!! Form::label('chat', 'ChatGPT 3.5') !!}
        <div style="position: relative;">
            <textarea name="chat" wire:model.live="askText" class="form-control" style="padding-right: 40px;"></textarea>
        </div>
    </div>
    <button type="button" wire:click="submit" class="btn btn-primary">Enviar</button>

    <div class="form-group">
        {!! Form::label('gpt', 'ChatGPT Responde') !!}
        <textarea name="gpt" wire:model.live="response" class="form-control"></textarea>
    </div>


</div>
