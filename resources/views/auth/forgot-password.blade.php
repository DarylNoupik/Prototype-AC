<x-guest-layout>
    <x-auth-card>
    <div class="mb-4 text-sm dark:text-gray-400">
            <a href="javascript: history.go(-1)" class="block transition  focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50 ease-in-out delay-100 w-1/5 text-center bg-green-600 mt-1 py-2 rounded-lg text-white text-sm p-2 font-semibold mb-2 mx-auto">
                {{ __("< Retour") }}
            </a>
            {{ __("Vous avez oublié votre mot de passe ? Aucun problème. Il suffit de nous communiquer votre adresse électronique et nous vous enverrons un lien de réinitialisation du mot de passe qui vous permettra d'en choisir un nouveau.") }}
        </div>
        <form >

            <div class="grid gap-6">
                <!-- Email Address -->
                <div class="space-y-2">
                    <label for="email" :value="Email">
        
                        <input id="email" class="block text-sm border-green-200 rounded mt-1 w-full focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50" type="email" name="email"
                            :value="old('email')" required autofocus placeholder="{{ __('monadresse@mail.com') }}" />
                </div>

                <div>
                    <button class="block transition focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50 ease-in-out delay-100 hover:-translate-y-0.5 hover:scale-110 block bg-green-600 mt-1 py-2 rounded-lg text-white text-sm p-2 font-semibold mb-2 mx-auto">
                        {{ __("Recevoir le lien de réinitialisation du mot de passe") }}
                    </button>
                </div>
            </div>
        </form>
    </x-auth-card>
    <div class="h-96">
        &ensp;
    </div>
</x-guest-layout>
