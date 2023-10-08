-- -- Créer la base de données
-- CREATE DATABASE "$POSTGRES_DB";

-- -- Créer l'utilisateur camagru_user avec un mot de passe sécurisé
-- CREATE USER "$POSTGRES_USER" WITH ENCRYPTED PASSWORD '$POSTGRES_PASSWORD';

-- -- Accorder les privilèges à l'utilisateur sur la base de données
-- GRANT ALL PRIVILEGES ON DATABASE "$POSTGRES_DB" TO "$POSTGRES_USER";

-- Créer la table "users"
CREATE TABLE IF NOT EXISTS users (
    id SERIAL PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
);

-- Créer une contrainte d'unicité sur la colonne "email"
ALTER TABLE users ADD CONSTRAINT unique_email UNIQUE (email);

-- Créer une contrainte d'unicité sur la colonne "username"
ALTER TABLE users ADD CONSTRAINT unique_username UNIQUE (username);

-- Confirmation : Initialisation de la base de données terminée avec succès.
-- Vous pouvez trouver cette confirmation dans les logs du conteneur PostgreSQL.
