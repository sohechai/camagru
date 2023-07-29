#!/bin/bash

set -e

# wait service postgres
until psql -h postgres -U $POSTGRES_USER -c '\l'; do
  echo "Attente du démarrage du serveur PostgreSQL..."
  sleep 2
done

# creation user avec privileges
echo "[Création du user...]"
psql -h postgres -U $POSTGRES_USER -c "CREATE USER $POSTGRES_USER WITH PASSWORD '$POSTGRES_PASSWORD';"
# psql -h postgres -U $POSTGRES_USER -c "ALTER USER $POSTGRES_USER WITH SUPERUSER;"

# creation de la bdd
echo "[Création de la bdd...]"
psql -h postgres -U $POSTGRES_USER -c "CREATE DATABASE $POSTGRES_DB OWNER $POSTGRES_USER;"

# créations des tables avec init-db.sql
echo "[Création des tables...]"
# psql -h postgres -U $POSTGRES_USER -d $POSTGRES_DB -f /docker-entrypoint-initdb.d/init-db.sql

