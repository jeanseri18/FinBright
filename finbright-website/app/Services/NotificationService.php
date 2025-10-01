<?php 

namespace App\Services;

use App\Models\Notification;
use App\Models\User;

class NotificationService
{
    /**
     * Crée une notification
     */
    public function notify(User $user, string $type, string $message, array $data = [])
    {
        // Vérifier si une notification identique existe déjà
        $query = Notification::where('user_id', $user->id)
            ->where('type', $type)
            ->where('is_read', false);

        $exists = $query->first();

        if ($exists) {
            // Mettre à jour la notification existante
            $exists->update([
                'message' => $message,
                'data'    => $data,
            ]);
            return $exists;
        }

        // Sinon on crée une nouvelle notification
        return Notification::create([
            'user_id'         => $user->id,
            'type'            => $type,
            'message' => $message, // peut contenir du HTML
            'data'    => $data,    // ex: ['buttons' => '<button>Accepter</button>']
        ]);
    }

    /**
     * Marquer une notification comme lue
     */
    public function markAsRead(Notification $notification)
    {
        $notification->update(['is_read' => true]);
    }

    /**
     * Récupérer toutes les notifications d’un utilisateur
     */
    public function getUserNotifications($user, $unreadOnly = false)
    {
        $query = Notification::where('notifiable_id', $user->id)
            ->where('notifiable_type', get_class($user))
            ->latest();

        if ($unreadOnly) {
            $query->where('is_read', false);
        }

        return $query->get();
    }
}