# Projet Agriculture Connectée

Ce projet est une application web d'agriculture connectée construite avec **Laravel 11**. Elle permet de gérer les données des capteurs simulés via des APIs, d'afficher les alertes, et de superviser des projets et équipes liés à l'agriculture connectée. Le projet utilise **Laravel Blade** pour le frontend (fullstack).

---

## Prérequis

Assurez-vous d'avoir les éléments suivants installés sur votre machine :

- **PHP ≥7.4** ou une version compatible avec Laravel 11
- **Composer** (gestionnaire de dépendances PHP)
- **Node.js ≥14.x** et **npm** (pour compiler les assets frontend)
- **Base de données** (MySQL, MariaDB ou autre)
- **Git** (pour la gestion de versions)
- **Serveur Web** comme Apache ou Nginx

---

## Installation et initialisation

Suivez les étapes ci-dessous pour configurer le projet sur votre machine locale.

### **1. Cloner le dépôt**

Clonez le dépôt à partir de votre serveur Git :
```bash
git clone <URL_DU_DEPOT>
cd agriculture-connectee
```

### **2. Installer les dépendances PHP**

Utilisez Composer pour installer les dépendances Laravel :
```bash
composer install
```

### **3. Configurer le fichier `.env`**

Copiez le fichier d'environnement exemple et modifiez-le :
```bash
cp .env.example .env
```

Ensuite, ouvrez le fichier `.env` et configurez les paramètres suivants :
```env
APP_NAME=AgricultureConnectee
APP_ENV=local
APP_KEY=base64:xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
APP_DEBUG=true
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=agriculture_connectee
DB_USERNAME=root
DB_PASSWORD=secret

BROADCAST_DRIVER=log
CACHE_DRIVER=file
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120
```
Générez la clé de l'application :
```bash
php artisan key:generate
```

### **4. Configurer la base de données**

Créez une base de données MySQL (ou autre) qui correspond au nom configuré dans `.env` (exemple : `agriculture_connectee`).

Puis exécutez les migrations pour créer les tables :
```bash
php artisan migrate
```

Optionnel : Vous pouvez exécuter les seeders si le projet en contient pour insérer des données initiales :
```bash
php artisan db:seed
```

### **5. Installer les dépendances frontend**

Installez les dépendances Node.js :
```bash
npm install
```

Compilez les assets frontend :
```bash
npm run dev
```

### **6. Lancer le serveur de développement**

Démarrez le serveur Laravel local :
```bash
php artisan serve
```
Le projet sera accessible à l'adresse : [http://localhost:8000](http://localhost:8000)

---

## Fonctionnalités principales

- **Gestion des utilisateurs** : Création, connexion, et authentification à deux facteurs (2FA).
- **Tableau de bord** : Visualisation des projets et des données des capteurs.
- **Gestion des alertes** : Notification en temps réel des alertes critiques.
- **Gestion des projets** : Création, modification, et suppression de projets.
- **Données des capteurs** : Simulation des données de capteurs via des APIs.

---

## Commandes utiles

- **Vider le cache** :
  ```bash
  php artisan cache:clear
  ```
- **Vider le cache de configuration** :
  ```bash
  php artisan config:clear
  ```
- **Exécuter les tests** :
  ```bash
  php artisan test
  ```

---

## Simuler les données des capteurs

Un endpoint API est prévu pour générer des données simulées de capteurs :

- **Route API** : `/api/simulate-data`
- **Exemple de réponse** :
  ```json
  {
      "temperature": 24,
      "humidity": 56,
      "soilMoisture": 32
  }
  ```
Utilisez un client API comme Postman ou Curl pour tester ce service.

---

## Technologies utilisées

- **Laravel 11**
- **Laravel Blade** (frontend)
- **MySQL** (base de données)
- **Node.js** (compilation des assets)
- **Pusher** ou Laravel Echo (notifications temps réel)
- **Chart.js** (visualisation des graphiques)

---

## Contribution

1. Forkez le dépôt.
2. Créez une branche pour votre fonctionnalité :
   ```bash
   git checkout -b nouvelle-fonctionnalite
   ```
3. Commitez vos modifications :
   ```bash
   git commit -m "Ajout d'une nouvelle fonctionnalité"
   ```
4. Poussez vers votre dépôt :
   ```bash
   git push origin nouvelle-fonctionnalite
   ```
5. Créez une Pull Request.

---

## Licence

Ce projet est sous licence [MIT](https://opensource.org/licenses/MIT).

