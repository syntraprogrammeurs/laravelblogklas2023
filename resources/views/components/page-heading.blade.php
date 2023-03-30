<!-- resources/views/components/page-heading.blade.php -->

@props(['title', 'buttonText' => 'Generate Report', 'buttonUrl' => '#'])

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">{{ $title }}</h1>
    <a href="{{ $buttonUrl }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
        <i class="fas fa-download fa-sm text-white-50"></i> {{ $buttonText }}
    </a>
</div>
