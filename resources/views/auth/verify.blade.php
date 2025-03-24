<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    @session("success")
    <p class="text-green">{{ $value }}</p>
    @endsession

    <form method="POST" action="{{ route('verify.post') }}">
        @csrf

        <p class="text-white">We have sent code to your register email, if you haven't received it, then click <a href="{{ route('verify.resend') }}">here</a>.</p>
        <br/>
        <!-- Email Address -->
        <div>
            <x-input-label for="code" :value="__('Code')" />
            <x-text-input id="code" class="block mt-1 w-full" type="code" name="code" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('code')" class="mt-2" />
        </div>

        @session("error")
        <p class="text-red">{{ $value }}</p>
        @endsession

        <div class="flex items-center justify-end mt-4">

            <x-primary-button class="ms-3">
                {{ __('verify') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
