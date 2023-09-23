@push('head')
<link
        href="/favicon.ico"
        id="favicon"
        rel="icon"
>
@endpush

<div class="h2 d-flex align-items-center">
    @auth
    @endauth

    <p class="my-0 {{ auth()->check() ? 'd-none d-xl-block' : '' }}">
       XeInitor
        <small class="align-top opacity">Demo Bash</small>
    </p>
</div>