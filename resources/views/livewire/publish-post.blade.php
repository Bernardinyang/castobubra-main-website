<div class="row mt-3">
    <div class="col-12">
        <div class="form-group">
            <div class="custom-control custom-switch">
                <input id="publish" type="checkbox" wire:change="publish"
                       class="custom-control-input" {{ $published_at ? 'checked' : '' }} wire:model="published_at">
                <label for="publish" class="custom-control-label">Publish</label>
            </div>
        </div>
    </div>
</div>
