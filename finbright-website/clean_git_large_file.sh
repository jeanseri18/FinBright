#!/bin/bash

set -e

# === CONFIGURATION ===
BRANCH="backoffices"
FILE_TO_REMOVE="finbright-website/Archive.zip"
BACKUP_BRANCH="backup-clean"

# Vérifie que git-filter-repo est installé
if ! command -v git-filter-repo &> /dev/null
then
    echo "❌ git-filter-repo n'est pas installé. Installe-le avec : brew install git-filter-repo"
    exit 1
fi

echo "✅ Création d'une branche de sauvegarde : $BACKUP_BRANCH"
git checkout "$BRANCH"
git checkout -b "$BACKUP_BRANCH"

echo "🧹 Suppression de $FILE_TO_REMOVE de l'historique Git sur la branche $BRANCH"
git checkout "$BRANCH"
git filter-repo --force --path "$FILE_TO_REMOVE" --invert-paths

echo "📤 Force push de la branche nettoyée vers GitHub"
git push origin "$BRANCH" --force

echo "✅ Nettoyage terminé avec succès."
echo "💡 Tu peux maintenant comparer et fusionner avec la branche $BACKUP_BRANCH si nécessaire :"
echo "    git diff $BACKUP_BRANCH $BRANCH"
