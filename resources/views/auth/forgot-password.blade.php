<x-guest-layout>
<div class="card shadow-lg p-4" style="max-width: 400px; width: 100%;">
        <!-- Bouton Retour -->
        <a href="javascript: history.go(-1)" class="btn btn-success btn-sm mb-3">
            &larr; Retour
        </a>

        <!-- Titre -->
        <h2 class="text-center text-dark mb-3">Mot de passe oublié ?</h2>

        <!-- Texte d'explication -->
        <p class="text-muted text-center">
            Entrez votre adresse e-mail et nous vous enverrons un lien pour réinitialiser votre mot de passe.
        </p>

        <!-- Formulaire -->
        <form>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" class="form-control" placeholder="monadresse@mail.com" required>
            </div>

            <!-- Bouton Envoyer -->
            <button type="submit" class="btn btn-success w-100">
                Recevoir le lien de réinitialisation
            </button>
        </form>
    </div>
</x-guest-layout>
