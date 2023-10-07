<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <label for="name">{{ __('Name') }}</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus />
            </div>

            <!-- Email Address -->
            <div>
                <label for="email">{{ __('Email') }}</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required />
            </div>

            <!-- Password -->
            <div>
                <label for="password">{{ __('Password') }}</label>
                <input id="password" type="password" name="password" required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div>
                <label for="password_confirmation">{{ __('Confirm Password') }}</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required />
            </div>

            <!-- Type -->
            <div>
                <label for="type">{{ __('Type') }}</label>
                <select id="type" type="select" name="type" value="{{ old('type') }}">
                    <option value="student">Student</option>
                    <option value="partner">Industry Partner</option>
                </select>
            </div>


            <div>
                <a href="{{ route('login') }}" class="underline text-sm text-gray-600 hover:text-gray-900">
                    {{ __('Already registered?') }}
                </a>

                <button type="submit" class="ml-4">
                    {{ __('Register') }}
                </button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
