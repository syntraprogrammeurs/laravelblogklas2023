<!-- resources/views/components/_alert.blade.php -->
@props(['type' => 'success', 'message'])
@slot('title')@endslot

<div data-alert {{ $attributes->merge(['class' => 'alert alert-' . $type . ' alert-dismissible fade show']) }} role="alert">
    <strong>{{ $title ?? ucfirst($type) }}!</strong> {{ $message }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const alerts = document.querySelectorAll('[data-alert]');

        alerts.forEach(function(alert) {
            window.setTimeout(function() {
                $(alert).alert('close');
            }, 5000);
        });
    });
</script>
