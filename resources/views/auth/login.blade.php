<x-guest-layout>
<!-- MAIN CONTAINER -->

<div class="grid">
    <!--Sub container-->
    <div class="bg-white flex flex-col mx-auto items-center rounded-xl my-16 p-5 space-y-2 w-96">
        <!--Nom-->
        <h1 class="inline-block font-bold text-2xl text-green-600">Saint claire</h1>
        
        <!--LOGO-->
        <div class="inline-block w-32 h-32 py-14 bg-green-500 font-bold text-white text-center rounded-full">
            LOGO
        </div>

        <!--Mot de bienvenue-->
        <br>
        <h3 class="text-gray-800 font-bold text-xl mb-1">Bienvenue sur l'appli !</h3>
        <p class="text-sm font-normal text-gray-600 mb-7">Connectez-vous !</p>

        <!-- Validation Errors -->
        <div class="w-5/6 text-sm">
            <hr class="border-green-100">
            <!-- Placeholder for validation errors -->
            <div class="text-red-500">
                <!-- Ici, vous pouvez afficher les erreurs de validation manuellement, si nécessaire -->
            </div>
        </div>

        <!--Formulaire-->
        <div class="w-5/6">
            <form method="POST" action="#">
                <!-- Email Address -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input id="email"
                        class="block text-sm border-green-200 rounded mt-1 w-full focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50"
                        type="email" name="email" required autofocus />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">Mot de passe</label>
                    <input id="password"
                        class="block text-sm border-green-200 rounded mt-1 w-full focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50"
                        type="password" name="password" required />
                </div>

                <!-- Forgot Password -->
                <div>
                    <a class="text-sm inline-block text-green-500 hover:underline" href="#">
                        Mot de passe oublié ?
                    </a>
                </div>

                <!-- Login button submit -->
                <button type="submit"
                    class="block transition focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50 ease-in-out delay-100 hover:-translate-y-0.5 hover:scale-110 block w-3/5 bg-green-600 mt-4 py-2 rounded-lg text-white font-semibold mb-2 mx-auto">
                    Se connecter
                </button>

                <!-- Sign up link -->
                <div class="flex flex-col items-center justify-end mt-5">
                    <p class="text-sm">Vous n'avez pas encore de compte ?</p>
                    <a class="block transition inline-block text-sm mt-2 p-1.5 bg-green-600 rounded text-white hover:-translate-y-0.5 hover:scale-110 hover:font-bold"
                       href="#">
                        Cliquez ici
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
</x-guest-layout>

