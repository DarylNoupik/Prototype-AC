<x-guest-layout>
    <x-auth-card>
        <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
            'This is a secure area of the application. Please confirm your password before continuing.
        </div>
        <form>
            <div class="grid gap-6">
                <!-- Password -->
                <div class="space-y-2">
                    <label for="password" :value="Password" >
                        <input withicon id="password" class="block w-full mt-1" type="password" name="password"
                            required autocomplete="current-password" placeholder="{{ __('Password') }}" />
                </div>

                <div>
                    <button class="justify-center w-full">
                        {{ __('Confirm') }}
                    <button>
                </div>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>


