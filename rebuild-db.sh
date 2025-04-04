#!/bin/bash

# Arrêter et supprimer les conteneurs existants
echo "🛑 Arrêt des conteneurs..."
docker-compose -f docker/docker-compose.yml down
docker rmi -f $(docker images -q) && docker volume rm $(docker volume ls -q) && docker network rm $(docker network ls -q) && docker container rm $(docker container ls -q) && docker image rm $(docker image ls -q) 
docker system prune -a

# Supprimer le volume de la base de données
echo "🗑️  Suppression du volume de la base de données..."
docker volume rm docker_db-data

# Reconstruire et redémarrer les conteneurs
echo "🏗️  Reconstruction des conteneurs..."
cd docker
docker-compose build

echo "🚀 Démarrage des conteneurs..."
cd ..
sh docker-run.sh

echo "✅ Base de données reconstruite avec succès!" 