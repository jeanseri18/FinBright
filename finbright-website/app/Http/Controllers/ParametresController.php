<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ParametresController extends Controller
{
    public function getIcons()
    {
        // Une liste de pays, qui pourrait être récupérée d'une base de données ou d'un fichier de configuration
        return [
            ['value' => 'ki-setting', 'img' => '<i class=\"ki-filled ki-setting text-xl text-muted-foreground\"></i>'],
            ['value' => 'ki-eye', 'img' => '<i class=\"ki-filled ki-eye text-xl text-muted-foreground\"></i>'],
            ['value' => 'ki-face-id', 'img' => '<i class=\"ki-filled ki-face-id text-xl text-muted-foreground\"></i>'],
            ['value' => 'ki-delivery-24', 'img' => '<i class=\"ki-filled ki-delivery-24 text-xl text-muted-foreground\"></i>'],
            ['value' => 'ki-chart-line-up-2', 'img' => '<i class=\"ki-filled ki-chart-line-up-2 text-xl text-muted-foreground\"></i>'],
            ['value' => 'ki-design-1', 'img' => '<i class=\"ki-filled ki-design-1 text-xl text-muted-foreground\"></i>'],
            ['value' => 'ki-people', 'img' => '<i class=\"ki-filled ki-people text-xl text-muted-foreground\"></i>'],

            ['value' => 'ki-category', 'img' => '<i class=\"ki-filled ki-category text-lg text-muted-foreground\"></i>'],
            ['value' => 'ki-credit-cart', 'img' => '<i class=\"ki-filled ki-credit-cart text-lg text-muted-foreground\"></i>'],
            ['value' => 'ki-mouse-square', 'img' => '<i class=\"ki-filled ki-mouse-square text-lg text-muted-foreground\"></i>'],
            ['value' => 'ki-toggle-off-circle', 'img' => '<i class=\"ki-filled ki-toggle-off-circle text-lg text-muted-foreground\"></i>'],
            ['value' => 'ki-map', 'img' => '<i class=\"ki-filled ki-map text-lg text-muted-foreground\"></i>'],
            ['value' => 'ki-exit-up', 'img' => '<i class=\"ki-filled ki-exit-up text-lg text-muted-foreground\"></i>'],
            ['value' => 'ki-security-user', 'img' => '<i class=\"ki-filled ki-security-user text-lg text-muted-foreground\"></i>'],
            ['value' => 'ki-shield-tick', 'img' => '<i class=\"ki-filled ki-shield-tick text-lg text-muted-foreground\"></i>'],
            ['value' => 'ki-key-square', 'img' => '<i class=\"ki-filled ki-key-square text-lg text-muted-foreground\"></i>'],
            ['value' => 'ki-shop', 'img' => '<i class=\"ki-filled ki-shop text-lg text-muted-foreground\"></i>'],
        ];
    }

    public function getContries()
    {
        // Une liste de pays, qui pourrait être récupérée d'une base de données ou d'un fichier de configuration
        return [
            ['value' => 'algeria', 'label' => 'Algérie', 'flag' => '🇩🇿'],
            ['value' => 'germany', 'label' => 'Allemagne', 'flag' => '🇩🇪'],
            ['value' => 'brazil', 'label' => 'Brésil', 'flag' => '🇧🇷'],
            ['value' => 'cameroon', 'label' => 'Cameroun', 'flag' => '🇨🇲'],
            ['value' => 'china', 'label' => 'Chine', 'flag' => '🇨🇳'],
            ['value' => 'cote-d-ivoire', 'label' => "Côte d'Ivoire", 'flag' => '🇨🇮'],
            ['value' => 'france', 'label' => 'France', 'flag' => '🇫🇷'],
            ['value' => 'italy', 'label' => 'Italie', 'flag' => '🇮🇹'],
            ['value' => 'lebanon', 'label' => 'Liban', 'flag' => '🇱🇧'],
            ['value' => 'morocco', 'label' => 'Maroc', 'flag' => '🇲🇦'],
            ['value' => 'senegal', 'label' => 'Sénégal', 'flag' => '🇸🇳'],
            ['value' => 'tunisia', 'label' => 'Tunisie', 'flag' => '🇹🇳'],
            ['value' => 'spain', 'label' => 'Espagne', 'flag' => '🇪🇸'],
            ['value' => 'uk', 'label' => 'Royaume-Uni', 'flag' => '🇬🇧'],
            ['value' => 'usa', 'label' => 'États-Unis', 'flag' => '🇺🇸'],
            ['value' => 'canada', 'label' => 'Canada', 'flag' => '🇨🇦'],
            ['value' => 'belgium', 'label' => 'Belgique', 'flag' => '🇧🇪'],
            ['value' => 'vietnam', 'label' => 'Viêt Nam', 'flag' => '🇻🇳'],
            ['value' => 'mali', 'label' => 'Mali', 'flag' => '🇲🇱'],
            ['value' => 'congo-kinshasa', 'label' => 'Congo (RDC)', 'flag' => '🇨🇩'],
            ['value' => 'madagascar', 'label' => 'Madagascar', 'flag' => '🇲🇬'],
            ['value' => 'portugal', 'label' => 'Portugal', 'flag' => '🇵🇹'],
            ['value' => 'mexico', 'label' => 'Mexique', 'flag' => '🇲🇽'],
            ['value' => 'argentina', 'label' => 'Argentine', 'flag' => '🇦🇷'],
            ['value' => 'colombia', 'label' => 'Colombie', 'flag' => '🇨🇴'],
            ['value' => 'iran', 'label' => 'Iran', 'flag' => '🇮🇷'],
            ['value' => 'turkey', 'label' => 'Turquie', 'flag' => '🇹🇷'],
            ['value' => 'japan', 'label' => 'Japon', 'flag' => '🇯🇵'],
            ['value' => 'south-korea', 'label' => 'Corée du Sud', 'flag' => '🇰🇷'],
            ['value' => 'india', 'label' => 'Inde', 'flag' => '🇮🇳'],
            ['value' => 'russia', 'label' => 'Russie', 'flag' => '🇷🇺'],
            ['value' => 'poland', 'label' => 'Pologne', 'flag' => '🇵🇱'],
            ['value' => 'romania', 'label' => 'Roumanie', 'flag' => '🇷🇴'],
            ['value' => 'greece', 'label' => 'Grèce', 'flag' => '🇬🇷'],
            ['value' => 'switzerland', 'label' => 'Suisse', 'flag' => '🇨🇭'],
            ['value' => 'egypt', 'label' => 'Égypte', 'flag' => '🇪🇬'],
            ['value' => 'gabon', 'label' => 'Gabon', 'flag' => '🇬🇦'],
            ['value' => 'burkina-faso', 'label' => 'Burkina Faso', 'flag' => '🇧🇫'],
            ['value' => 'benin', 'label' => 'Bénin', 'flag' => '🇧🇯'],
            ['value' => 'togo', 'label' => 'Togo', 'flag' => '🇹🇬'],
            ['value' => 'mauritania', 'label' => 'Mauritanie', 'flag' => '🇲🇷'],
            ['value' => 'chad', 'label' => 'Tchad', 'flag' => '🇹🇩'],
            ['value' => 'nigeria', 'label' => 'Nigeria', 'flag' => '🇳🇬'],
            ['value' => 'ethiopia', 'label' => 'Éthiopie', 'flag' => '🇪🇹'],
            ['value' => 'south-africa', 'label' => 'Afrique du Sud', 'flag' => '🇿🇦'],
            ['value' => 'guinea', 'label' => 'Guinée', 'flag' => '🇬🇳'],
            ['value' => 'haiti', 'label' => 'Haïti', 'flag' => '🇭🇹'],
            ['value' => 'comoros', 'label' => 'Comores', 'flag' => '🇰🇲'],
            ['value' => 'djibouti', 'label' => 'Djibouti', 'flag' => '🇩🇯'],
            ['value' => 'philippines', 'label' => 'Philippines', 'flag' => '🇵🇭'],
        ];
    }
}