<x-guest-layout>
   <!-- MAIN CONTAINER -->
   <div class="grid">
        <!-- Sub container -->
        <div class="bg-white flex flex-col mx-auto items-center rounded-xl my-16 p-5 space-y-2 w-96">
            <!-- LOGO -->
            <div class="inline-block w-32 h-32 py-14 bg-green-500 font-bold text-white text-center rounded-full">
                Agri Connect
            </div>

            <!-- Mot de bienvenue -->
            <h3 class="text-gray-800 font-bold text-xl mb-1">Bienvenu sur l'appli !</h3>
            <p class="text-sm font-normal text-gray-600 mb-7">Pas encore de compte ? Enregistrez-vous !</p>

            <!-- Formulaire -->
            <div class="w-5/6">
                <form method="POST" action="#">
                    <!-- Name -->
                    <div class="mt-2">
                        <label for="name" class="block text-gray-700">Nom d'utilisateur</label>
                        <input id="name"
                               class="text-sm block border-green-200 rounded-lg mt-1 w-full focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50"
                               type="text" name="name" required autofocus/>
                    </div>

                    <!-- Email Address -->
                    <div class="mt-4">
                        <label for="email" class="block text-gray-700">Email</label>
                        <input id="email"
                               class="text-sm block border-green-200 rounded-lg mt-1 w-full focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50"
                               type="email" name="email" required/>
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <label for="password" class="block text-gray-700">Mot de passe</label>
                        <input id="password"
                               class="text-sm block border-green-200 rounded-lg mt-1 w-full focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50"
                               type="password" name="password" required/>
                    </div>

                    <!-- Confirm Password -->
                    <div class="mt-4">
                        <label for="password_confirmation" class="block text-gray-700">Confirmation du mot de passe</label>
                        <input id="password_confirmation"
                               class="text-sm block border-green-200 rounded-lg mt-1 w-full focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50"
                               type="password" name="password_confirmation" required/>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit"
                            class="block transition focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50 ease-in-out delay-100 hover:-translate-y-0.5 hover:scale-110 block w-3/5 bg-green-600 mt-4 py-2 rounded-lg text-white font-semibold mb-2 mx-auto">
                        S'enregistrer
                    </button>

                    <!-- Already have an account -->
                    <!-- <div class="flex flex-col items-center justify-end mt-5">
                        <label class="text-gray-700">Vous avez déjà un compte ?</label>
                        <a class="block transition inline-block text-sm mt-2 p-1.5 bg-green-600 rounded text-white hover:-translate-y-0.5 hover:scale-110 hover:font-bold"
                           href="#">
                            Cliquez ici
                        </a>
                    </div> -->

                    <div class="card-footer text-center pt-0 px-lg-2 px-1">
                            <p class="mb-4 text-sm mx-auto">
                            Vous avez déjà un compte ?
                                <a href="#" class="text-sm inline-block text-green-500 hover:underline"> Se Connecter</a>
                            </p>
                        </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
