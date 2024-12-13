# Tir TPNote

## Introduction

Ce projet est une application de réservation d'événements. Les utilisateurs peuvent se connecter, s'inscrire et créer des réservations pour différents événements.

## Prérequis

- PHP 7.4 ou supérieur
- Composer
- Symfony CLI
- Un serveur web (par exemple, WAMP, XAMPP)

## Installation

1. Clonez le dépôt :
    ```bash
    git clone https://github.com/votre-utilisateur/votre-repo.git
    ```

2. Accédez au répertoire du projet :
    ```bash
    cd votre-repo
    ```

3. Installez les dépendances :
    ```bash
    composer install
    ```

4. Configurez votre base de données dans le fichier `.env` :
    ```dotenv
    DATABASE_URL=mysql://db_user:db_password@127.0.0.1:3306/db_name
    ```

5. Créez la base de données et exécutez les migrations :
    ```bash
    php bin/console doctrine:database:create
    php bin/console doctrine:migrations:migrate
    ```

6. Démarrez le serveur web :
    ```bash
    symfony server:start
    ```

## Utilisation

### Page de Login

1. Accédez à la page de login via `/login`.
2. Entrez votre nom d'utilisateur et votre mot de passe.
3. Cliquez sur le bouton "Login".
4. Si vous n'avez pas de compte, cliquez sur le lien "Switch to Register" pour accéder à la page d'inscription.

### Page de Register

1. Accédez à la page de register via `/register`.
2. Entrez votre nom d'utilisateur et votre mot de passe.
3. Cliquez sur le bouton "Register".
4. Si vous avez déjà un compte, cliquez sur le lien "Switch to Login" pour accéder à la page de login.

### Page de Réservation

1. Une fois connecté, accédez à la page de création de réservation via `/reservation/new`.
2. Remplissez les champs requis : date, créneau horaire, nom de l'événement et description (facultatif).
3. Cliquez sur le bouton "Submit" pour créer la réservation.

## Aide

Pour toute question ou problème, veuillez ouvrir une issue sur le dépôt GitHub.

## Contribuer

Les contributions sont les bienvenues ! Veuillez soumettre une pull request pour toute amélioration ou correction de bug.

## Licence

Ce projet est sous licence MIT. Voir le fichier [LICENSE](LICENSE) pour plus de détails.
