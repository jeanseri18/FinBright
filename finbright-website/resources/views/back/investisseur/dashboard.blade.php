@extends('back.investisseur.layouts')

@section('title', 'Tableau de bord')

@section('content')
    <div class="mb-5 lg:mb-7.5">
        <!-- Container -->
        <div class="kt-container-fixed flex items-center justify-between flex-wrap gap-5">
            <div class="flex flex-col justify-center items-start flex-wrap gap-1 lg:gap-2">
                <h1 class="font-medium text-lg text-mono">
                    Tableau de bord
                </h1>
                <div class="flex items-center gap-1 text-sm font-normal">
                    <a class="text-secondary-foreground hover:text-primary" href="/metronic/tailwind/demo9/">
                        Accueil
                    </a>
                    <span class="text-muted-foreground text-sm">
                        /
                    </span>
                    <span class="text-mono">
                        Tableau de bord
                    </span>
                </div>
            </div>
            <div class="flex items-center flex-wrap gap-1.5 lg:gap-3.5">
                <a class="kt-btn kt-btn-sm kt-btn-outline" href="/metronic/tailwind/demo9/account/home/get-started">
                    <i class="ki-filled ki-exit-down">
                    </i>
                    Exporter
                </a>
                <div class="kt-menu kt-menu-default" data-kt-menu="true">
                    <div class="kt-menu-item" data-kt-menu-item-offset="0, 0" data-kt-menu-item-placement="bottom-end"
                        data-kt-menu-item-toggle="dropdown" data-kt-menu-item-trigger="hover">
                        <button class="kt-menu-toggle kt-btn kt-btn-outline flex-nowrap">
                            <span class="flex items-center me-1">
                                <i class="ki-filled ki-calendar text-base!">
                                </i>
                            </span>
                            <span class="hidden md:inline text-nowrap">
                                September, 2025
                            </span>
                            <span class="inline md:hidden text-nowrap">
                                Sep, 2025
                            </span>
                            <span class="flex items-center lg:ms-4">
                                <i class="ki-filled ki-down text-xs!">
                                </i>
                            </span>
                        </button>
                        <div class="kt-menu-dropdown w-48 py-2 kt-scrollable-y max-h-[250px]">
                            <div class="kt-menu-item">
                                <a class="kt-menu-link" href="#">
                                    <span class="kt-menu-title">
                                        January, 2025
                                    </span>
                                </a>
                            </div>
                            <div class="kt-menu-item">
                                <a class="kt-menu-link" href="#">
                                    <span class="kt-menu-title">
                                        February, 2025
                                    </span>
                                </a>
                            </div>
                            <div class="kt-menu-item active">
                                <a class="kt-menu-link" href="#">
                                    <span class="kt-menu-title">
                                        March, 2025
                                    </span>
                                </a>
                            </div>
                            <div class="kt-menu-item">
                                <a class="kt-menu-link" href="#">
                                    <span class="kt-menu-title">
                                        April, 2025
                                    </span>
                                </a>
                            </div>
                            <div class="kt-menu-item">
                                <a class="kt-menu-link" href="#">
                                    <span class="kt-menu-title">
                                        May, 2025
                                    </span>
                                </a>
                            </div>
                            <div class="kt-menu-item">
                                <a class="kt-menu-link" href="#">
                                    <span class="kt-menu-title">
                                        June, 2025
                                    </span>
                                </a>
                            </div>
                            <div class="kt-menu-item">
                                <a class="kt-menu-link" href="#">
                                    <span class="kt-menu-title">
                                        July, 2025
                                    </span>
                                </a>
                            </div>
                            <div class="kt-menu-item">
                                <a class="kt-menu-link" href="#">
                                    <span class="kt-menu-title">
                                        August, 2025
                                    </span>
                                </a>
                            </div>
                            <div class="kt-menu-item">
                                <a class="kt-menu-link" href="#">
                                    <span class="kt-menu-title">
                                        September, 2025
                                    </span>
                                </a>
                            </div>
                            <div class="kt-menu-item">
                                <a class="kt-menu-link" href="#">
                                    <span class="kt-menu-title">
                                        October, 2025
                                    </span>
                                </a>
                            </div>
                            <div class="kt-menu-item">
                                <a class="kt-menu-link" href="#">
                                    <span class="kt-menu-title">
                                        November, 2025
                                    </span>
                                </a>
                            </div>
                            <div class="kt-menu-item">
                                <a class="kt-menu-link" href="#">
                                    <span class="kt-menu-title">
                                        December, 2025
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Container -->
    </div>
    <!-- End of Toolbar -->
    <!-- Container -->
    <div class="kt-container-fixed">
        <div class="grid gap-5 lg:gap-7.5">
            <!-- begin: grid -->
            <div class="grid lg:grid-cols-3 gap-y-5 lg:gap-7.5 items-stretch">
                <div class="lg:col-span-2">
                    <div class="grid md:grid-cols-2 gap-5 lg:gap-7.5 h-full items-stretch">
                        <style>
                            .channel-stats-bg {
                                background-image: url('/static/metronic/tailwind/dist/assets/media/images/2600x1600/bg-3.png');
                            }

                            .dark .channel-stats-bg {
                                background-image: url('/static/metronic/tailwind/dist/assets/media/images/2600x1600/bg-3-dark.png');
                            }
                        </style>
                        <div
                            class="kt-card px-5 lg:px-7.5 h-full bg-[length:85%] [background-position:9rem_-4rem] rtl:[background-position:-4rem_-4rem] bg-no-repeat channel-stats-bg">
                            <div class="flex flex-col gap-4 pt-6">
                                <i class="ki-filled ki-badge text-2xl text-muted-foreground">
                                </i>
                                <div class="flex flex-col gap-2.5 mb-2">
                                    <h3 class="text-base font-medium leading-none text-mono">
                                        Information personelle
                                    </h3>
                                    <span class="text-sm text-secondary-foreground leading-5">
                                        Centre de ressources pour les utilisateurs : visualisation des données, modification des paramètres, consultation des journaux d'activité, gestion des tâches, lecture des notes, alertes, etc.
                                    </span>
                                </div>
                            </div>
                            <div class="mb-4">
                                <a class="kt-link" href="">
                                    Voir la page
                                    <i class="ki-filled ki-right text-xs">
                                    </i>
                                </a>
                            </div>
                        </div>
                        <div
                            class="kt-card px-5 lg:px-7.5 h-full bg-[length:85%] [background-position:9rem_-4rem] rtl:[background-position:-4rem_-4rem] bg-no-repeat channel-stats-bg">
                            <div class="flex flex-col gap-4 pt-6">
                                <i class="ki-filled ki-security-user text-2xl text-muted-foreground">
                                </i>
                                <div class="flex flex-col gap-2.5 mb-2">
                                    <h3 class="text-base font-medium leading-none text-mono">
                                        Connexion &amp; Securité
                                    </h3>
                                    <span class="text-sm text-secondary-foreground leading-5">
                                        Définir des mots de passe, activer 2FA, afficher les journaux de connexion, mettre à jour les questions de sécurité, suivre l'activité du compte pour une meilleure sécurité.
                                    </span>
                                </div>
                            </div>
                            <div class="mb-4">
                                <a class="kt-link" href="">
                                    Voir la page
                                    <i class="ki-filled ki-right text-xs">
                                    </i>
                                </a>
                            </div>
                        </div>
                        <div
                            class="kt-card px-5 lg:px-7.5 h-full bg-[length:85%] [background-position:9rem_-4rem] rtl:[background-position:-4rem_-4rem] bg-no-repeat channel-stats-bg">
                            <div class="flex flex-col gap-4 pt-6">
                                <i class="ki-filled ki-cheque text-2xl text-muted-foreground">
                                </i>
                                <div class="flex flex-col gap-2.5 mb-2">
                                    <h3 class="text-base font-medium leading-none text-mono">
                                        Facturation &amp; paiements
                                    </h3>
                                    <span class="text-sm text-secondary-foreground leading-5">
                                        Gérez les informations de facturation, mettez à jour les méthodes de paiement, consultez l'historique des transactions, configurez le paiement automatique et suivez vos dépenses en toute simplicité.
                                    </span>
                                </div>
                            </div>
                            <div class="mb-4">
                                <a class="kt-link" href="">
                                    Voir la page
                                    <i class="ki-filled ki-right text-xs">
                                    </i>
                                </a>
                            </div>
                        </div>
                        <div
                            class="kt-card px-5 lg:px-7.5 h-full bg-[length:85%] [background-position:9rem_-4rem] rtl:[background-position:-4rem_-4rem] bg-no-repeat channel-stats-bg">
                            <div class="flex flex-col gap-4 pt-6">
                                <i class="ki-filled ki-users text-2xl text-muted-foreground">
                                </i>
                                <div class="flex flex-col gap-2.5 mb-2">
                                    <h3 class="text-base font-medium leading-none text-mono">
                                        Investissements
                                    </h3>
                                    <span class="text-sm text-secondary-foreground leading-5">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit, ipsa expedita iusto quos ab harum nam vitae facere distinctio repellendus id, totam omnis culpa nisi. Fugit rem dolor architecto iste!
                                    </span>
                                </div>
                            </div>
                            <div class="mb-4">
                                <a class="kt-link" href="">
                                    Voir la page
                                    <i class="ki-filled ki-right text-xs">
                                    </i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="lg:col-span-1">
                    <div class="kt-card h-full">
                        <div class="kt-card-header">
                            <h3 class="kt-card-title">
                                Rendement brut et net
                            </h3>
                            <div class="kt-menu" data-kt-menu="true">
                                <div class="kt-menu-item" data-kt-menu-item-offset="0, 10px"
                                    data-kt-menu-item-placement="bottom-end"
                                    data-kt-menu-item-placement-rtl="bottom-start" data-kt-menu-item-toggle="dropdown"
                                    data-kt-menu-item-trigger="click">
                                    <button class="kt-menu-toggle kt-btn kt-btn-sm kt-btn-icon kt-btn-ghost">
                                        <i class="ki-filled ki-dots-vertical text-lg">
                                        </i>
                                    </button>
                                    <div class="kt-menu-dropdown kt-menu-default w-full max-w-[200px]"
                                        data-kt-menu-dismiss="true">
                                        <div class="kt-menu-item">
                                            <a class="kt-menu-link"
                                                href="/metronic/tailwind/demo9/account/home/settings-enterprise">
                                                <span class="kt-menu-icon">
                                                    <i class="ki-filled ki-setting-3">
                                                    </i>
                                                </span>
                                                <span class="kt-menu-title">
                                                    Settings
                                                </span>
                                            </a>
                                        </div>
                                        <div class="kt-menu-item">
                                            <a class="kt-menu-link" data-kt-modal-toggle="#report_user_modal"
                                                href="#">
                                                <span class="kt-menu-icon">
                                                    <i class="ki-filled ki-dislike">
                                                    </i>
                                                </span>
                                                <span class="kt-menu-title">
                                                    Report
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="kt-card-content flex flex-col gap-2 px-5 lg:px-7.5 pt-5">
                            <span class="text-sm font-normal text-foreground">
                                Portefeuille disponible
                            </span>
                            <span class="text-3xl font-semibold text-mono mb-3">
                                9,395.72€
                            </span>
                            <div class="kt-toggle-group flex">
                                <label class="kt-btn" data-kt-chart="my_balance_chart1">
                                    Aujourd'hui
                                    <input name="date-range" type="radio" value="today" />
                                </label>
                                <label class="kt-btn" data-kt-chart="my_balance_chart2">
                                    La semaine
                                    <input name="date-range" type="radio" value="week" />
                                </label>
                                <label class="kt-btn" data-kt-chart="my_balance_chart3">
                                    Le mois
                                    <input checked="" name="date-range" type="radio" value="month" />
                                </label>
                                <label class="kt-btn" data-kt-chart="my_balance_chart4">
                                    L'année
                                    <input name="date-range" type="radio" value="year" />
                                </label>
                            </div>
                        </div>
                        <div class="px-3" id="my_balance_chart">
                        </div>
                    </div>
                </div>
            </div>
            <!-- end: grid -->
            <!-- begin: grid -->
            <div class="grid lg:grid-cols-3 gap-5 lg:gap-7.5 items-stretch">
                <div class="lg:col-span-2">
                    <style>
                        .entry-callout-bg {
                            background-image: url({{asset('assets/media/images/2600x1600/2.png')}});
                        }

                        .dark .entry-callout-bg {
                            background-image: url({{asset('assets/media/images/2600x1600/2-dark.png')}});
                        }
                    </style>
                    <div class="kt-card h-full h-full">
                        <div
                            class="kt-card-content p-10 bg-[length:80%] rtl:[background-position:-70%_25%] [background-position:175%_25%] bg-no-repeat entry-callout-bg">
                            <div class="flex flex-col justify-center gap-4">
                                <div class="flex -space-x-2">
                                    <div class="flex">
                                        <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-background size-10"
                                            src="{{asset('assets/media/avatars/300-4.png')}}" />
                                    </div>
                                    <div class="flex">
                                        <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-background size-10"
                                            src="{{asset('assets/media/avatars/300-1.png')}}" />
                                    </div>
                                    <div class="flex">
                                        <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-background size-10"
                                            src="{{asset('assets/media/avatars/300-2.png')}}" />
                                    </div>
                                    <div class="flex">
                                        <span
                                            class="hover:z-5 relative inline-flex items-center justify-center shrink-0 rounded-full ring-1 font-semibold leading-none text-2xs size-10 text-white text-xs ring-background bg-green-500">
                                            S
                                        </span>
                                    </div>
                                </div>
                                <h2 class="text-xl font-semibold text-mono">
                                    Explorez des projets et faites partir
                                    <br />
                                    du
                                    <a class="kt-link" href="#">
                                        réseau Fin'Bright
                                    </a>
                                </h2>
                                <p class="text-sm font-normal text-secondary-foreground leading-5.5">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                    <br />
                                    Reprehenderit, ipsa expedita iusto quos ab harum nam vitae
                                    <br />
                                    totam omnis culpa nisi. Fugit rem dolor architecto iste!
                                </p>
                            </div>
                        </div>
                        <div class="kt-card-footer justify-center">
                            <a class="kt-link kt-link-underlined kt-link-dashed"
                                href="">
                                Explorer les projets
                            </a>
                        </div>
                    </div>
                </div>
                <div class="lg:col-span-1">
                    <div class="kt-card h-full">
                        <div class="kt-card-header">
                            <h3 class="kt-card-title">
                                Block List
                            </h3>
                        </div>
                        <div class="kt-card-content flex flex-col gap-5">
                            <div class="text-sm text-foreground">
                                Les utilisateurs figurant sur la liste de blocage ne peuvent plus jamais vous envoyer de demandes de chat ou de messages.
                            </div>
                            <div class="kt-input-group">
                                <input class="kt-input" placeholder="Block new user" type="text" value="">
                                <span class="kt-btn kt-btn-primary">
                                    Ajouter
                                </span>
                                </input>
                            </div>
                            <div class="flex flex-col gap-5">
                                <div class="flex items-center justify-between gap-2.5">
                                    <div class="flex items-center gap-2.5">
                                        <div class="">
                                            <img class="h-9 rounded-full"
                                                src="{{asset('assets/media/avatars/gray/1.png')}}" />
                                        </div>
                                        <div class="flex flex-col gap-0.5">
                                            <a class="flex items-center gap-1.5 leading-none font-medium text-sm text-mono hover:text-primary"
                                                href="/metronic/tailwind/demo9/public-profile/teams">
                                                Esther Howard
                                            </a>
                                            <span class="text-sm text-secondary-foreground">
                                                6 commits
                                            </span>
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-2.5">
                                        <a class="kt-btn kt-btn-icon kt-btn-ghost" href="#">
                                            <i class="ki-filled ki-trash">
                                            </i>
                                        </a>
                                    </div>
                                </div>
                                <div class="flex items-center justify-between gap-2.5">
                                    <div class="flex items-center gap-2.5">
                                        <div class="">
                                            <img class="h-9 rounded-full"
                                                src="{{asset('assets/media/avatars/gray/2.png')}}" />
                                        </div>
                                        <div class="flex flex-col gap-0.5">
                                            <a class="flex items-center gap-1.5 leading-none font-medium text-sm text-mono hover:text-primary"
                                                href="/metronic/tailwind/demo9/public-profile/teams">
                                                Tyler Hero
                                            </a>
                                            <span class="text-sm text-secondary-foreground">
                                                29 commits
                                            </span>
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-2.5">
                                        <a class="kt-btn kt-btn-icon kt-btn-ghost" href="#">
                                            <i class="ki-filled ki-trash">
                                            </i>
                                        </a>
                                    </div>
                                </div>
                                <div class="flex items-center justify-between gap-2.5">
                                    <div class="flex items-center gap-2.5">
                                        <div class="">
                                            <img class="h-9 rounded-full"
                                                src="{{asset('assets/media/avatars/gray/3.png')}}" />
                                        </div>
                                        <div class="flex flex-col gap-0.5">
                                            <a class="flex items-center gap-1.5 leading-none font-medium text-sm text-mono hover:text-primary"
                                                href="/metronic/tailwind/demo9/public-profile/teams">
                                                Arlene McCoy
                                            </a>
                                            <span class="text-sm text-secondary-foreground">
                                                34 commits
                                            </span>
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-2.5">
                                        <a class="kt-btn kt-btn-icon kt-btn-ghost" href="#">
                                            <i class="ki-filled ki-trash">
                                            </i>
                                        </a>
                                    </div>
                                </div>
                                <div class="flex items-center justify-between gap-2.5">
                                    <div class="flex items-center gap-2.5">
                                        <div class="">
                                            <img class="h-9 rounded-full"
                                                src="{{asset('assets/media/avatars/gray/4.png')}}" />
                                        </div>
                                        <div class="flex flex-col gap-0.5">
                                            <a class="flex items-center gap-1.5 leading-none font-medium text-sm text-mono hover:text-primary"
                                                href="/metronic/tailwind/demo9/public-profile/teams">
                                                Cody Fisher
                                            </a>
                                            <span class="text-sm text-secondary-foreground">
                                                1 commit
                                            </span>
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-2.5">
                                        <a class="kt-btn kt-btn-icon kt-btn-ghost" href="#">
                                            <i class="ki-filled ki-trash">
                                            </i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end: grid -->
        </div>
    </div>
    <!-- End of Container -->
@endsection

@section('javascripts')
    <script src="{{asset('assets/js/widgets/general.js')}}">
    <script type="text/javascript">
    </script>
@endsection
