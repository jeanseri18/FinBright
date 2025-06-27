@extends('layouts.app')

@section('title', 'Mentions légales | Fin\'Bright')

@section('content')
<!-- Hero Section -->
<section class="bg-finbright-purple py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl lg:text-6xl font-bold text-white mb-6">
            Mentions <span class="text-finbright-cyan">Légales</span>
        </h1>
        <p class="text-xl text-white max-w-3xl mx-auto">
            Informations légales et réglementaires concernant Fin'Bright.
        </p>
    </div>
</section>

<!-- Section Mentions Légales -->
<section class="bg-white py-20">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="prose prose-lg max-w-none">
            <!-- Éditeur du site -->
            <div class="mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">
                    <span class="text-finbright-purple">Éditeur</span> du site
                </h2>
                <div class="bg-gray-50 rounded-lg p-6">
                    <p class="mb-4"><strong>Raison sociale :</strong> Fin'Bright SAS</p>
                    <p class="mb-4"><strong>Forme juridique :</strong> Société par Actions Simplifiée</p>
                    <p class="mb-4"><strong>Capital social :</strong> 100 000 €</p>
                    <p class="mb-4"><strong>Siège social :</strong> 123 Avenue des Champs-Élysées, 75008 Paris, France</p>
                    <p class="mb-4"><strong>RCS :</strong> Paris B 123 456 789</p>
                    <p class="mb-4"><strong>SIRET :</strong> 123 456 789 00012</p>
                    <p class="mb-4"><strong>Code APE :</strong> 6419Z - Autres intermédiations monétaires</p>
                    <p class="mb-4"><strong>TVA intracommunautaire :</strong> FR12 123456789</p>
                    <p class="mb-4"><strong>Téléphone :</strong> +33 1 23 45 67 89</p>
                    <p class="mb-4"><strong>Email :</strong> contact@finbright.fr</p>
                </div>
            </div>

            <!-- Directeur de publication -->
            <div class="mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">
                    <span class="text-finbright-cyan">Directeur</span> de publication
                </h2>
                <p class="text-gray-600 mb-4">
                    Le directeur de la publication est Madame Marie Dubois, Présidente de Fin'Bright SAS.
                </p>
                <p class="text-gray-600">
                    Contact : marie.dubois@finbright.fr
                </p>
            </div>

            <!-- Hébergement -->
            <div class="mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">
                    <span class="text-finbright-purple">Hébergement</span>
                </h2>
                <div class="bg-gray-50 rounded-lg p-6">
                    <p class="mb-4"><strong>Hébergeur :</strong> OVH SAS</p>
                    <p class="mb-4"><strong>Adresse :</strong> 2 rue Kellermann, 59100 Roubaix, France</p>
                    <p class="mb-4"><strong>Téléphone :</strong> 1007</p>
                    <p class="mb-4"><strong>Site web :</strong> <a href="https://www.ovh.com" class="text-finbright-purple hover:underline">www.ovh.com</a></p>
                </div>
            </div>

            <!-- Autorisations réglementaires -->
            <div class="mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">
                    Autorisations <span class="text-finbright-cyan">réglementaires</span>
                </h2>
                <div class="space-y-4">
                    <p class="text-gray-600">
                        Fin'Bright SAS est un intermédiaire en financement participatif (IFP) immatriculé auprès de l'ORIAS sous le numéro 12345678.
                    </p>
                    <p class="text-gray-600">
                        La société est agréée par l'ACPR (Autorité de Contrôle Prudentiel et de Résolution) en tant que prestataire de services de financement participatif.
                    </p>
                    <p class="text-gray-600">
                        Fin'Bright respecte les dispositions du Code monétaire et financier relatives au financement participatif et est membre de l'association Financement Participatif France (FPF).
                    </p>
                </div>
            </div>

            <!-- Propriété intellectuelle -->
            <div class="mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">
                    Propriété <span class="text-finbright-purple">intellectuelle</span>
                </h2>
                <div class="space-y-4">
                    <p class="text-gray-600">
                        L'ensemble du contenu de ce site web (textes, images, vidéos, logos, icônes, sons, logiciels, etc.) est protégé par les lois en vigueur sur la propriété intellectuelle.
                    </p>
                    <p class="text-gray-600">
                        La marque "Fin'Bright" ainsi que tous les logos et éléments graphiques sont des marques déposées de Fin'Bright SAS.
                    </p>
                    <p class="text-gray-600">
                        Toute reproduction, représentation, modification, publication, adaptation de tout ou partie des éléments du site, quel que soit le moyen ou le procédé utilisé, est interdite, sauf autorisation écrite préalable de Fin'Bright SAS.
                    </p>
                    <p class="text-gray-600">
                        Toute exploitation non autorisée du site ou de l'un quelconque des éléments qu'il contient sera considérée comme constitutive d'une contrefaçon et poursuivie conformément aux dispositions des articles L.335-2 et suivants du Code de Propriété Intellectuelle.
                    </p>
                </div>
            </div>

            <!-- Responsabilité -->
            <div class="mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">
                    <span class="text-finbright-cyan">Responsabilité</span>
                </h2>
                <div class="space-y-4">
                    <p class="text-gray-600">
                        Les informations contenues sur ce site sont aussi précises que possible et le site est périodiquement remis à jour, mais peut toutefois contenir des inexactitudes, des omissions ou des lacunes.
                    </p>
                    <p class="text-gray-600">
                        Si vous constatez une lacune, erreur ou ce qui parait être un dysfonctionnement, merci de bien vouloir le signaler par email à l'adresse contact@finbright.fr, en décrivant le problème de la manière la plus précise possible.
                    </p>
                    <p class="text-gray-600">
                        Fin'Bright SAS se réserve le droit de corriger, à tout moment et sans préavis, le contenu de son site.
                    </p>
                    <p class="text-gray-600">
                        Fin'Bright SAS ne pourra être tenue responsable des dommages directs et indirects causés au matériel de l'utilisateur, lors de l'accès au site.
                    </p>
                </div>
            </div>

            <!-- Liens hypertextes -->
            <div class="mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">
                    Liens <span class="text-finbright-purple">hypertextes</span>
                </h2>
                <div class="space-y-4">
                    <p class="text-gray-600">
                        Le site peut contenir des liens hypertextes vers d'autres sites présents sur le réseau Internet. Les liens vers ces autres ressources vous font quitter le site.
                    </p>
                    <p class="text-gray-600">
                        Il est possible de créer un lien vers la page de présentation de ce site sans autorisation expresse de Fin'Bright SAS. Aucune autorisation ou demande d'information préalable ne peut être exigée par l'éditeur à l'égard d'un site qui souhaite établir un lien vers le site de l'éditeur.
                    </p>
                    <p class="text-gray-600">
                        Il convient toutefois d'afficher ce site dans une nouvelle fenêtre du navigateur. Cependant, Fin'Bright SAS se réserve le droit de demander la suppression d'un lien qu'elle estime non conforme à l'objet du site.
                    </p>
                </div>
            </div>

            <!-- Droit applicable -->
            <div class="mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">
                    Droit <span class="text-finbright-cyan">applicable</span>
                </h2>
                <div class="space-y-4">
                    <p class="text-gray-600">
                        Tant le présent site que les modalités et conditions de son utilisation sont régis par le droit français, quel que soit le lieu d'utilisation.
                    </p>
                    <p class="text-gray-600">
                        En cas de contestation éventuelle, et après l'échec de toute tentative de recherche d'une solution amiable, les tribunaux français seront seuls compétents pour connaître de ce litige.
                    </p>
                </div>
            </div>

            <!-- Contact -->
            <div class="bg-finbright-purple rounded-lg p-8 text-white">
                <h2 class="text-2xl font-bold mb-4">Contact</h2>
                <p class="mb-4">
                    Pour toute question relative aux présentes mentions légales, vous pouvez nous contacter :
                </p>
                <ul class="space-y-2">
                    <li><strong>Par email :</strong> legal@finbright.fr</li>
                    <li><strong>Par téléphone :</strong> +33 1 23 45 67 89</li>
                    <li><strong>Par courrier :</strong> Fin'Bright SAS - Service Juridique<br>
                        123 Avenue des Champs-Élysées<br>
                        75008 Paris, France</li>
                </ul>
            </div>
        </div>
    </div>
</section>
@endsection