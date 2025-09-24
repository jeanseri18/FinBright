# 🖥️ Plateforme Fin'Bright

Ce dépôt contient le code source du **Back Office** de la plateforme **Fin'Bright**.  
Il permet aux administrateurs d'accéder à une interface de gestion complète des utilisateurs, des contenus et des actions métier liées à la plateforme.


## ⚙️ Technologies utilisées

- **Langage** : PHP 8.4.8  
- **Framework** : Laravel 12.19.3  
- **Base de données** : MySQL  
- **Templating** : Blade + Blade Components  
- **UI** : Metronic (Tailwind CSS + Vue.js)  
- **Authentification** : Laravel Breeze + Spatie Permission  
- **Gestion de version** : Git  


## 🚀 Installation en local

Voici les étapes pour installer et exécuter le projet en local :

### 1. Cloner le dépôt

```bash
git clone https://github.com/jeanseri18/FinBright.git
cd FinBright/finbright-website
```

### 2. Se placer sur la branche backoffices

```bash
git checkout backoffices
```

### 3. Installer les dépendances PHP

```bash
composer install
```

### 4. Installer les dépendances front-end

```bash
php artisan storage:link
npm install
npm run dev
```

### 5. Configurer l’environnement

Créer un fichier .env :
```bash
cp .env.example .env
```

Générer la clé d’application :
```bash
php artisan key:generate
```

Puis configurer la base de données :
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=8889
DB_DATABASE=finBright_db
DB_USERNAME=root
DB_PASSWORD=root
```

### 6. Lancer les migrations

```bash
php artisan migrate
```

### 7. Lancer les seeders

```bash
php artisan db:seed
```

### 8. Lancer le serveur de développement

```bash
php artisan serve
```

Accéder ensuite à l'adresse :
http://localhost:8000



## 👤 Connexions test

Voici des identifiants de démonstration :

**Admin**
- **Email** : admin@test.com
- **Mot de passe** : adminpass

**Emprunteur**
- **Email** : emprunteur@test.com
- **Mot de passe** : empruntpass

**Investisseur (Personne physique)**
- **Email** : investisseur.physique@test.com
- **Mot de passe** : investpass

**Investisseur (Personne morale)**
- **Email** : investisseur.morale@test.com
- **Mot de passe** : investpass



## 🔁 Déploiement / Merge

Le développement du Back Office se fait sur la branche backoffices.
Une fois validé, un merge sera effectué vers la branche principale (main) pour générer une version finale et stable.



## 🧾 Licence

Ce projet est soumis à la licence...



## 📩 Contact

Pour toute question technique ou besoin de démo :
<!-- Moussa Fofana – hello@moussa-fofana.com – Digit'Comm -->
