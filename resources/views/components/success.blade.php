@if (session()->has('success'))
    <div class="alert alert-primary">{{ session('success') }}</div>
@endif
