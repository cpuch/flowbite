{{-- resources/views/components/alert.blade.php --}}

<div {{ $attributes->class(["alert alert-$type"]) }}>
    {{ $slot }}
</div>
