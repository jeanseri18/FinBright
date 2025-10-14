<?php 

namespace App\Services;

use App\Models\Notification;
use Illuminate\Database\Eloquent\Model;

class NotificationService
{
    /**
     * Crée une notification pour un utilisateur ou un admin
     */
    public function notify(Model $user, string $type, string $message, array $data = [])
    {
        // Vérifie que le modèle passé est bien un User ou Admin
        if (!in_array(get_class($user), [\App\Models\User::class, \App\Models\Admin::class])) {
            throw new \InvalidArgumentException('L\'utilisateur doit être une instance de App\Models\User ou App\Models\Admin');
        }

        // Vérifier si une notification similaire existe déjà
        $query = Notification::where('notifiable_id', $user->id)
            ->where('notifiable_type', get_class($user))
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

        // Créer une nouvelle notification
        return Notification::create([
            'notifiable_id'   => $user->id,
            'notifiable_type' => get_class($user),
            'type'            => $type,
            'message'         => $message,
            'data'            => $data,
        ]);
    }

    /**
     * Marque une notification comme lue
     */
    public function markAsRead(Notification $notification)
    {
        $notification->update(['is_read' => true]);
    }

    /**
     * Récupère les notifications d’un utilisateur ou admin
     */
    public function getUserNotifications(Model $user, $unreadOnly = false)
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