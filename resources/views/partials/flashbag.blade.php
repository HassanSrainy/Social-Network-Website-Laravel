@if (session()->has('success'))
<x-alert type="success">
    {{session('success')}}
</x-alert>
@endif
@if (session()->has('warning'))
<x-alert type="warning">
    {{session('warning')}}
</x-alert>
@endif
