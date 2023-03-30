@props(['type','message'])
<div>
    @if (session('status'))
        <div class="alert alert-{{ $type }}">
            <strong>{{ $message }}</strong>
        </div>
    @endif
</div>

