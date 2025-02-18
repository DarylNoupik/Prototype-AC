<x-app-layout>
<div class="container profile-container">
        <div class="profile-header">
            <h3>Profil Utilisateur</h3>
        </div>
        <!-- Image de profil -->
        <div class="profile-img">
            <img src="{{ asset('images/images.png') }}" alt="Photo de profil">
            <label for="profileImage">
            <i class="bi bi-pencil-fill"></i>
            </label>
            <input type="file" id="profileImage" style="display: none;">
        </div>

        <!-- Informations de l'utilisateur -->
        <div class="profile-info">
            <h4>Imelda kmi</h4>
            <p>Admin<r/p>
        </div>

        <!-- Formulaire d’édition du profil -->
        <form action="/update-profile" method="POST" enctype="multipart/form-data" class="mt-4">
            <div class="form-group">
                <label for="name">Nom</label>
                <input type="text" class="form-control rounded-lg " id="name" name="name" value="imelda kmi" required>
            </div>
            <div class="form-group">
                <label for="email" style = "margin-top: 10px">Adresse Email</label>
                <input type="email" class="form-control rounded-lg" id="email" name="email" value="imelda.kmi@mail.com" required>
            </div>
            <div class="form-group">
                <label for="password" style = "margin-top: 10px">Mot de Passe</label>
                <input type="password" class="form-control rounded-lg" id="password" name="password" value="kouomi123">
            </div>

                <button type="submit" class="btn btn-success btn-custom ">Mettre à jour</button>
            
        </form>
    </div>

<style>
     .profile-container {
            max-width: 1000px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        .profile-header {
            background-color: #28a745;
            color: white;
            padding: 15px;
            border-radius: 15px 15px 0 0;
            text-align: center;
        }

        .profile-img {
            position: relative;
            width: 150px;
            height: 150px;
            border-radius: 50%;
            overflow: hidden;
            margin: 20px auto;
            border: 4px solid #28a745;
        }

        .profile-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .profile-img label {
            position: absolute;
            bottom: 10px;
            right: 10px;
            background: rgba(0, 0, 0, 0.6);
            color: white;
            border-radius: 50%;
            padding: 8px;
            cursor: pointer;
        }


        .form-control:focus {
           
            box-shadow: 0 0 5px rgba(40, 167, 69, 0.5);
            border-color: #28a745;
        }

        .btn-success {
            background-color: #28a745;
            border: none;
        }

        .btn-success:hover {
            background-color: #218838;
        }

        /* Boutons modernisés */
        .btn-custom {
        font-size: 0.9rem;
        font-weight: bold;
        border-radius: 8px;
        border: 2px solid;
        padding: 8px 15px;
        transition: all 0.3s ease;
        margin-top: 10px;
        margin-left: 400px;
        }

        .profile-info {
            text-align: center;
            margin-top: 10px;
        }

        .profile-info h4 {
            margin: 5px 0;
            font-size: 1.5rem;
            color: #333;
        }

        .profile-info p {
            margin: 0;
            color: #777;
            font-size: 1rem;
        }
</style>
</x-app-layout>