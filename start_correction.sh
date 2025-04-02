#!/bin/bash

DOCKER_COMPOSE_FILE="./docker/docker-compose.yml"

cleanup_services() {
    docker-compose -f $DOCKER_COMPOSE_FILE down --rmi all
    echo "$(tput setaf 2)Tous les services Docker ont été arrêtés et les images ont été supprimées.$(tput sgr0)"
    echo ""
}

check_running_containers() {
    docker_ps=$(docker ps -q)
    if [ -n "$docker_ps" ]; then
        echo "$(tput setaf 1)Attention: Des conteneurs Docker sont encore en cours d'exécution.$(tput sgr0)"
        echo "Veuillez arrêter tous les conteneurs avant de continuer."
        exit 1
    fi
}

rebuild_services() {
    docker-compose -f $DOCKER_COMPOSE_FILE down
    docker-compose -f $DOCKER_COMPOSE_FILE up -d --build
    echo "$(tput setaf 2)Les services Docker ont été reconstruits et redémarrés.$(tput sgr0)"
    echo ""
    echo "$(tput setaf 6)=== LOGS DES SERVICES ===$(tput sgr0)"
    docker-compose -f $DOCKER_COMPOSE_FILE logs -f
}

start_services() {
    docker-compose -f $DOCKER_COMPOSE_FILE up -d
    echo "$(tput setaf 2)Les services ont été démarrés.$(tput sgr0)"
    echo "Vous pouvez maintenant accéder aux services via $(tput setaf 4)http://localhost:8000$(tput sgr0)"
    echo ""
    echo "$(tput setaf 6)=== LOGS DES SERVICES ===$(tput sgr0)"
    docker-compose -f $DOCKER_COMPOSE_FILE logs -f
}

stop_services() {
    docker-compose -f $DOCKER_COMPOSE_FILE down
    echo "$(tput setaf 2)Les services Docker ont été arrêtés.$(tput sgr0)"
    echo ""
}

show_menu() {
    echo "$(tput setaf 6)=== MENU DE GESTION DES SERVICES DOCKER ===$(tput sgr0)"
    echo "1. Nettoyer et reconstruire les services"
    echo "2. Démarrer les services"
    echo "3. Arrêter les services"
    echo "4. Redémarrer les services"
    echo "5. Quitter"
    echo ""
    read -p "Votre choix : " choice
    echo ""
}

main() {
    clear
    while true; do
        show_menu
        case $choice in
            1)
                cleanup_services
                ;;
            2)
                start_services
                ;;
            3)
                stop_services
                ;;
            4)
                check_running_containers
                rebuild_services
                ;;
            5)
                echo "Fin du programme."
                exit 0
                ;;
            *)
                echo "$(tput setaf 1)Choix invalide. Veuillez choisir une option valide.$(tput sgr0)"
                ;;
        esac
    done
}

main
