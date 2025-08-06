@extends('back.emprunteur.layouts')

@section('title', 'Mon profil')

@section('content')
    <!-- Container -->
    <div class="kt-container-fixed" id="contentContainer">
    </div>
    <!-- End of Container -->
    <style>
        .hero-bg {
            background-image: url("{{ asset('assets/media/images/2600x1200/bg-1.png') }}");
        }

        .dark .hero-bg {
            background-image: url("{{ asset('assets/media/images/2600x1200/bg-1-dark.png') }}");
        }
    </style>

    @include('back.emprunteur._profile_container')

    <!-- Container -->
    <div class="kt-container-fixed">
        <!-- begin: grid -->
        <div class="grid grid-cols-1 xl:grid-cols-3 gap-5 lg:gap-7.5">
            <div class="col-span-2">
                <div class="flex flex-col gap-5 lg:gap-7.5">
                    <div class="kt-card min-w-full">
                        <div class="kt-card-header">
                            <h3 class="kt-card-title">
                                Informations générales
                            </h3>
                            <div class="flex items-center gap-2">
                                <label class="kt-label">
                                    <input checked="" class="kt-switch kt-switch-sm" name="check" type="checkbox"
                                        value="1" />
                                    Profil publique
                                </label>
                            </div>
                        </div>
                        <div class="kt-card-table kt-scrollable-x-auto pb-3">
                            <table class="kt-table align-middle text-sm text-muted-foreground" id="general_info_table">
                                <tr>
                                    <td class="min-w-56 text-secondary-foreground font-normal">
                                        Nom complet
                                    </td>
                                    <td class="min-w-48 w-full text-foreground font-normal">
                                        {{ Auth::user()->first_name .' '. Auth::user()->last_name }}
                                    </td>
                                    <td class="min-w-16 text-center">
                                        <a class="kt-btn kt-btn-sm kt-btn-icon kt-btn-ghost kt-btn-primary" href="javascript:;" data-kt-modal-toggle="#modal_settings">
                                            <i class="ki-filled ki-notepad-edit">
                                            </i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-secondary-foreground font-normal">
                                        Date de naissance
                                    </td>
                                    <td class="text-foreground font-normal">
                                        {{ Auth::user()->birth_date ?? '' }}
                                    </td>
                                    <td class="text-center">
                                        <a class="kt-btn kt-btn-sm kt-btn-icon kt-btn-ghost kt-btn-primary" href="javascript:;" data-kt-modal-toggle="#modal_settings">
                                            <i class="ki-filled ki-notepad-edit">
                                            </i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-secondary-foreground font-normal">
                                        Lieu de naissance
                                    </td>
                                    <td class="text-foreground font-normal">
                                        {{-- <span class="kt-badge kt-badge-sm kt-badge-outline kt-badge-destructive">
                                            Missing Details
                                        </span> --}}
                                        {{ Auth::user()->birth_place ?? '' }}
                                    </td>
                                    <td class="text-center">
                                        <a class="kt-btn kt-btn-sm kt-btn-icon kt-btn-ghost kt-btn-primary" href="javascript:;" data-kt-modal-toggle="#modal_settings">
                                            <i class="ki-filled ki-notepad-edit">
                                            </i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-secondary-foreground font-normal">
                                        Numéro de téléphone
                                    </td>
                                    <td class="text-foreground font-normal">
                                        {{ Auth::user()->phone_number ?? '' }}
                                    </td>
                                    <td class="text-center">
                                        <a class="kt-btn kt-btn-sm kt-btn-icon kt-btn-ghost kt-btn-primary" href="javascript:;" data-kt-modal-toggle="#modal_settings">
                                            <i class="ki-filled ki-notepad-edit">
                                            </i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-secondary-foreground font-normal">
                                        Adresse postale
                                    </td>
                                    <td class="text-foreground text-sm font-normal">
                                        {{ Auth::user()->address['adresse'] .' '. Auth::user()->address['rue'] .' '. Auth::user()->address['code_postal'] .' '. Auth::user()->address['ville'] }}
                                    </td>
                                    <td class="text-center">
                                        <a class="kt-btn kt-btn-sm kt-btn-icon kt-btn-ghost kt-btn-primary" href="javascript:;" data-kt-modal-toggle="#modal_settings">
                                            <i class="ki-filled ki-notepad-edit">
                                            </i>
                                        </a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="kt-card min-w-full">
                        <div class="kt-card-header">
                            <h3 class="kt-card-title">
                                Paramètres du compte
                            </h3>
                        </div>
                        <div class="kt-card-table kt-scrollable-x-auto pb-3">
                            <table class="kt-table align-middle text-sm text-muted-foreground">
                                <tr>
                                    <td class="min-w-56 text-secondary-foreground font-normal">
                                        Email
                                    </td>
                                    <td class="min-w-60 w-full">
                                        <a class="text-foreground text-sm font-normal hover:text-primary" href="#">
                                            {{ Auth::user()->email ?? '' }}
                                        </a>
                                    </td>
                                    <td class="min-w-28 text-center">
                                        <a class="kt-btn kt-btn-sm kt-btn-icon kt-btn-ghost kt-btn-primary" href="javascript:;" data-kt-modal-toggle="#modal_settings">
                                            <i class="ki-filled ki-notepad-edit">
                                            </i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-secondary-foreground font-normal">
                                        Mot de passe
                                    </td>
                                    <td class="text-secondary-foreground font-normal text-sm">
                                        {{ Auth::user()->password_changed_at ? 'Dernier changement de mot de passe '. Auth::user()->password_changed_at->diffForHumans() : 'Vous n’avez jamais changé votre mot de passe.' }}
                                    </td>
                                    <td class="text-center">
                                        <a class="kt-btn kt-btn-sm kt-btn-icon kt-btn-ghost kt-btn-primary" href="javascript:;" data-kt-modal-toggle="#modal_settings">
                                            <i class="ki-filled ki-notepad-edit">
                                            </i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-secondary-foreground font-normal">
                                        Connexion avec
                                    </td>
                                    <td>
                                        <div class="flex items-center gap-2.5">
                                            <a class="flex items-center justify-center size-8 bg-background rounded-full border border-input"
                                                href="#">
                                                <img alt="" class="size-4"
                                                    src="{{ asset('assets/media/brand-logos/google.svg') }}" />
                                            </a>
                                            <a class="flex items-center justify-center size-8 bg-background rounded-full border border-input"
                                                href="#">
                                                <img alt="" class="size-4"
                                                    src="{{ asset('assets/media/brand-logos/facebook.svg') }}" />
                                            </a>
                                            <a class="flex items-center justify-center size-8 bg-background rounded-full border border-input"
                                                href="#">
                                                <img alt="" class="size-4"
                                                    src="{{ asset('assets/media/brand-logos/linkedin.svg') }}" />
                                            </a>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <a class="kt-btn kt-btn-sm kt-btn-icon kt-btn-ghost kt-btn-primary" href="javascript:;" data-kt-modal-toggle="#modal_settings">
                                            <i class="ki-filled ki-notepad-edit">
                                            </i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-secondary-foreground font-normal">
                                        Authentication 2FA
                                    </td>
                                    <td class="text-secondary-foreground text-sm font-normal">
                                        {!! Auth::user()->twoFactor 
                                            ? '<span class="kt-badge kt-badge-sm kt-badge-outline kt-badge-primary">Email</span>' 
                                            : '<span class="kt-badge kt-badge-sm kt-badge-outline kt-badge-destructive">Désactivé</span>' 
                                        !!}
                                    </td>
                                    <td class="text-center">
                                        <a class="kt-btn kt-btn-sm kt-btn-icon kt-btn-ghost kt-btn-primary" href="javascript:;" data-kt-modal-toggle="#modal_settings">
                                            <i class="ki-filled ki-notepad-edit">
                                            </i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-secondary-foreground font-normal">
                                        Notifications
                                    </td>
                                    <td class="text-foreground text-sm font-normal">
                                        {!! Auth::user()->notificationPreference && Auth::user()->notificationPreference->email_notifications 
                                            ? 'Email' 
                                            : '<span class="kt-badge kt-badge-sm kt-badge-outline kt-badge-destructive">Désactivé</span>' 
                                        !!}
                                    </td>
                                    <td class="text-center">
                                        <a class="kt-btn kt-btn-sm kt-btn-icon kt-btn-ghost kt-btn-primary" href="javascript:;" data-kt-modal-toggle="#modal_settings">
                                            <i class="ki-filled ki-notepad-edit">
                                            </i>
                                        </a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="kt-card">
                        <div class="kt-card-header">
                            <h3 class="kt-card-title">
                                Documents justificatifs
                            </h3>
                        </div>
                        <div class="kt-card-content">
                            <div class="grid gap-2.5 lg:gap-5">
                                @foreach($documentsGroupByType as $type => $docs)
                                    <div class="flex items-center gap-3">
                                        <div class="flex items-center grow gap-2.5">
                                            @php
                                                $firstFile = $docs->first()->file;
                                                $filename = basename($firstFile->filename);
                                                $extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
                                                $icon = match($extension) {
                                                    'pdf' => 'pdf.svg',
                                                    'doc', 'docx' => 'doc.svg',
                                                    'jpg', 'jpeg', 'png' => 'jpg.svg',
                                                    'ai' => 'ai.svg',
                                                    'js' => 'js.svg',
                                                    default => 'file.svg',
                                                };

                                                $totalSize = $docs->sum(fn($d) => $d->file->filesize ?? 0);
                                                $totalSizeMb = number_format($totalSize / 1048576, 1); // octets -> Mo
                                                $latestDate = $docs->max(fn($d) => $d->file->created_at);
                                            @endphp

                                            <img src="{{ asset('assets/media/file-types/' . $icon) }}" class="w-6 h-6">

                                            <div class="flex flex-col">
                                                <span class="text-sm font-medium text-mono cursor-pointer hover:text-primary mb-px">
                                                    {{ $docs->count() > 1 ? $type : $filename }}
                                                </span>
                                                <span class="text-xs text-secondary-foreground">
                                                    {{ str_pad($docs->count(), 2, '0', STR_PAD_LEFT) }} fichiers |
                                                    {{ $totalSizeMb }} MB |
                                                    {{ \Carbon\Carbon::parse($latestDate)->format('d M Y H:i') }}
                                                </span>
                                            </div>
                                        </div>

                                        {{-- Menu (Détails, Partager, Exporter) --}}
                                        <div class="kt-menu" data-kt-menu="true">
                                            <div class="kt-menu-item" data-kt-menu-item-toggle="dropdown" data-kt-menu-item-trigger="click">
                                                <button class="kt-menu-toggle kt-btn kt-btn-sm kt-btn-icon kt-btn-ghost">
                                                    <i class="ki-filled ki-dots-vertical text-lg"></i>
                                                </button>
                                                <div class="kt-menu-dropdown kt-menu-default w-full max-w-[175px]">
                                                    <div class="kt-menu-item">
                                                        <a class="kt-menu-link" href="#">
                                                            <span class="kt-menu-icon"><i class="ki-filled ki-document"></i></span>
                                                            <span class="kt-menu-title">Détails</span>
                                                        </a>
                                                    </div>
                                                    <div class="kt-menu-item">
                                                        <a class="kt-menu-link" href="#" data-kt-modal-toggle="#share_profile_modal">
                                                            <span class="kt-menu-icon"><i class="ki-filled ki-share"></i></span>
                                                            <span class="kt-menu-title">Partager</span>
                                                        </a>
                                                    </div>
                                                    <div class="kt-menu-item">
                                                        <a class="kt-menu-link" href="#">
                                                            <span class="kt-menu-icon"><i class="ki-filled ki-file-up"></i></span>
                                                            <span class="kt-menu-title">Exporter</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                                <div class="flex items-center gap-3">
                                    <div class="flex items-center grow gap-2.5">
                                        <img src="{{asset('assets/media/file-types/pdf.svg')}}">
                                        <div class="flex flex-col">
                                            <span
                                                class="text-sm font-medium text-mono cursor-pointer hover:text-primary mb-px">
                                                Project-pitch.pdf
                                            </span>
                                            <span class="text-xs text-secondary-foreground">
                                                02 fichiers | 
                                                4.7 MB | 
                                                26 Sep 2025 15:20
                                            </span>
                                        </div>
                                        </img>
                                    </div>
                                    <div class="kt-menu" data-kt-menu="true">
                                        <div class="kt-menu-item" data-kt-menu-item-offset="0, 10px"
                                            data-kt-menu-item-placement="bottom-end"
                                            data-kt-menu-item-placement-rtl="bottom-start"
                                            data-kt-menu-item-toggle="dropdown" data-kt-menu-item-trigger="click">
                                            <button class="kt-menu-toggle kt-btn kt-btn-sm kt-btn-icon kt-btn-ghost">
                                                <i class="ki-filled ki-dots-vertical text-lg">
                                                </i>
                                            </button>
                                            <div class="kt-menu-dropdown kt-menu-default w-full max-w-[175px]"
                                                data-kt-menu-dismiss="true">
                                                <div class="kt-menu-item">
                                                    <a class="kt-menu-link" href="#">
                                                        <span class="kt-menu-icon">
                                                            <i class="ki-filled ki-document">
                                                            </i>
                                                        </span>
                                                        <span class="kt-menu-title">
                                                            Détails
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="kt-menu-item">
                                                    <a class="kt-menu-link" data-kt-modal-toggle="#share_profile_modal"
                                                        href="#">
                                                        <span class="kt-menu-icon">
                                                            <i class="ki-filled ki-share">
                                                            </i>
                                                        </span>
                                                        <span class="kt-menu-title">
                                                            Partager
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="kt-menu-item">
                                                    <a class="kt-menu-link" href="#">
                                                        <span class="kt-menu-icon">
                                                            <i class="ki-filled ki-file-up">
                                                            </i>
                                                        </span>
                                                        <span class="kt-menu-title">
                                                            Exporter
                                                        </span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-center gap-3">
                                    <div class="flex items-center grow gap-2.5">
                                        <img src="{{asset('assets/media/file-types/doc.svg')}}">
                                        <div class="flex flex-col">
                                            <span
                                                class="text-sm font-medium text-mono cursor-pointer hover:text-primary mb-px">
                                                Report-v1.docx
                                            </span>
                                            <span class="text-xs text-secondary-foreground">
                                                01 fichiers | 
                                                2.3 MB | 
                                                1 Oct 2025 12:00
                                            </span>
                                        </div>
                                        </img>
                                    </div>
                                    <div class="kt-menu" data-kt-menu="true">
                                        <div class="kt-menu-item" data-kt-menu-item-offset="0, 10px"
                                            data-kt-menu-item-placement="bottom-end"
                                            data-kt-menu-item-placement-rtl="bottom-start"
                                            data-kt-menu-item-toggle="dropdown" data-kt-menu-item-trigger="click">
                                            <button class="kt-menu-toggle kt-btn kt-btn-sm kt-btn-icon kt-btn-ghost">
                                                <i class="ki-filled ki-dots-vertical text-lg">
                                                </i>
                                            </button>
                                            <div class="kt-menu-dropdown kt-menu-default w-full max-w-[175px]"
                                                data-kt-menu-dismiss="true">
                                                <div class="kt-menu-item">
                                                    <a class="kt-menu-link" href="#">
                                                        <span class="kt-menu-icon">
                                                            <i class="ki-filled ki-document">
                                                            </i>
                                                        </span>
                                                        <span class="kt-menu-title">
                                                            Détails
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="kt-menu-item">
                                                    <a class="kt-menu-link" data-kt-modal-toggle="#share_profile_modal"
                                                        href="#">
                                                        <span class="kt-menu-icon">
                                                            <i class="ki-filled ki-share">
                                                            </i>
                                                        </span>
                                                        <span class="kt-menu-title">
                                                            Partager
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="kt-menu-item">
                                                    <a class="kt-menu-link" href="#">
                                                        <span class="kt-menu-icon">
                                                            <i class="ki-filled ki-file-up">
                                                            </i>
                                                        </span>
                                                        <span class="kt-menu-title">
                                                            Exporter
                                                        </span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-center gap-3">
                                    <div class="flex items-center grow gap-2.5">
                                        <img src="{{asset('assets/media/file-types/ai.svg')}}">
                                        <div class="flex flex-col">
                                            <span
                                                class="text-sm font-medium text-mono cursor-pointer hover:text-primary mb-px">
                                                Framework-App.png
                                            </span>
                                            <span class="text-xs text-secondary-foreground">
                                                01 fichiers | 
                                                0.8 MB | 
                                                17 Oct 2025 18:46
                                            </span>
                                        </div>
                                        </img>
                                    </div>
                                    <div class="kt-menu" data-kt-menu="true">
                                        <div class="kt-menu-item" data-kt-menu-item-offset="0, 10px"
                                            data-kt-menu-item-placement="bottom-end"
                                            data-kt-menu-item-placement-rtl="bottom-start"
                                            data-kt-menu-item-toggle="dropdown" data-kt-menu-item-trigger="click">
                                            <button class="kt-menu-toggle kt-btn kt-btn-sm kt-btn-icon kt-btn-ghost">
                                                <i class="ki-filled ki-dots-vertical text-lg">
                                                </i>
                                            </button>
                                            <div class="kt-menu-dropdown kt-menu-default w-full max-w-[175px]"
                                                data-kt-menu-dismiss="true">
                                                <div class="kt-menu-item">
                                                    <a class="kt-menu-link" href="#">
                                                        <span class="kt-menu-icon">
                                                            <i class="ki-filled ki-document">
                                                            </i>
                                                        </span>
                                                        <span class="kt-menu-title">
                                                            Détails
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="kt-menu-item">
                                                    <a class="kt-menu-link" data-kt-modal-toggle="#share_profile_modal"
                                                        href="#">
                                                        <span class="kt-menu-icon">
                                                            <i class="ki-filled ki-share">
                                                            </i>
                                                        </span>
                                                        <span class="kt-menu-title">
                                                            Partager
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="kt-menu-item">
                                                    <a class="kt-menu-link" href="#">
                                                        <span class="kt-menu-icon">
                                                            <i class="ki-filled ki-file-up">
                                                            </i>
                                                        </span>
                                                        <span class="kt-menu-title">
                                                            Exporter
                                                        </span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-center gap-3">
                                    <div class="flex items-center grow gap-2.5">
                                        <img src="{{asset('assets/media/file-types/js.svg')}}">
                                        <div class="flex flex-col">
                                            <span
                                                class="text-sm font-medium text-mono cursor-pointer hover:text-primary mb-px">
                                                Mobile-logo.jpg
                                            </span>
                                            <span class="text-xs text-secondary-foreground">
                                                02 fichiers | 
                                                0.2 MB | 
                                                4 Nov 2024 11:30
                                            </span>
                                        </div>
                                        </img>
                                    </div>
                                    <div class="kt-menu" data-kt-menu="true">
                                        <div class="kt-menu-item" data-kt-menu-item-offset="0, 10px"
                                            data-kt-menu-item-placement="bottom-end"
                                            data-kt-menu-item-placement-rtl="bottom-start"
                                            data-kt-menu-item-toggle="dropdown" data-kt-menu-item-trigger="click">
                                            <button class="kt-menu-toggle kt-btn kt-btn-sm kt-btn-icon kt-btn-ghost">
                                                <i class="ki-filled ki-dots-vertical text-lg">
                                                </i>
                                            </button>
                                            <div class="kt-menu-dropdown kt-menu-default w-full max-w-[175px]"
                                                data-kt-menu-dismiss="true">
                                                <div class="kt-menu-item">
                                                    <a class="kt-menu-link" href="#">
                                                        <span class="kt-menu-icon">
                                                            <i class="ki-filled ki-document">
                                                            </i>
                                                        </span>
                                                        <span class="kt-menu-title">
                                                            Détails
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="kt-menu-item">
                                                    <a class="kt-menu-link" data-kt-modal-toggle="#share_profile_modal"
                                                        href="#">
                                                        <span class="kt-menu-icon">
                                                            <i class="ki-filled ki-share">
                                                            </i>
                                                        </span>
                                                        <span class="kt-menu-title">
                                                            Partager
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="kt-menu-item">
                                                    <a class="kt-menu-link" href="#">
                                                        <span class="kt-menu-icon">
                                                            <i class="ki-filled ki-file-up">
                                                            </i>
                                                        </span>
                                                        <span class="kt-menu-title">
                                                            Exporter
                                                        </span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="kt-card-footer justify-center">
                            <a class="kt-link kt-link-underlined kt-link-dashed"
                                href="javascript:;" data-kt-modal-toggle="#modal_settings">
                                Tous les fichiers
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-span-1">
                <div class="flex flex-col gap-5 lg:gap-7.5">
                    <div class="kt-card">
                        <div class="kt-card-content py-10 flex flex-col gap-5 lg:gap-7.5">
                            <div class="flex flex-col items-start gap-2.5">
                                <div class="mb-2.5">
                                    <div class="relative size-[50px] shrink-0">
                                        <svg class="w-full h-full stroke-primary/10 fill-primary-soft" fill="none"
                                            height="48" viewbox="0 0 44 48" width="44"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M16 2.4641C19.7128 0.320509 24.2872 0.320508 28 2.4641L37.6506 8.0359C41.3634 10.1795 43.6506 14.141 43.6506
                                                        18.4282V29.5718C43.6506 33.859 41.3634 37.8205 37.6506 39.9641L28 45.5359C24.2872 47.6795 19.7128 47.6795 16 45.5359L6.34937
                                                        39.9641C2.63655 37.8205 0.349365 33.859 0.349365 29.5718V18.4282C0.349365 14.141 2.63655 10.1795 6.34937 8.0359L16 2.4641Z"
                                                fill="">
                                            </path>
                                            <path
                                                d="M16.25 2.89711C19.8081 0.842838 24.1919 0.842837 27.75 2.89711L37.4006 8.46891C40.9587 10.5232 43.1506 14.3196 43.1506
                                                        18.4282V29.5718C43.1506 33.6804 40.9587 37.4768 37.4006 39.5311L27.75 45.1029C24.1919 47.1572 19.8081 47.1572 16.25 45.1029L6.59937
                                                        39.5311C3.04125 37.4768 0.849365 33.6803 0.849365 29.5718V18.4282C0.849365 14.3196 3.04125 10.5232 6.59937 8.46891L16.25 2.89711Z"
                                                stroke="">
                                            </path>
                                        </svg>
                                        <div
                                            class="absolute leading-none start-2/4 top-2/4 -translate-y-2/4 -translate-x-2/4 rtl:translate-x-2/4">
                                            <i class="ki-filled ki-note-2 text-xl ps-px text-primary">
                                            </i>
                                        </div>
                                    </div>
                                </div>
                                <a class="text-base font-semibold text-mono hover:text-primary" href="#">
                                    Lignes directrices à l'intention des utilisateurs pour un espace de travail sûr et respectueux
                                </a>
                                <p class="text-sm text-secondary-foreground">
                                    Comprendre l'importance de la sécurité et du respect dans votre environnement de travail grâce à nos lignes directrices pour les utilisateurs.
                                </p>
                                <a class="kt-link kt-link-underlined kt-link-dashed" href="#">
                                    En savoir plus
                                </a>
                            </div>
                            <span class="hidden not-last:block not-last:border-b border-b-border">
                            </span>
                            <div class="flex flex-col items-start gap-2.5">
                                <div class="mb-2.5">
                                    <div class="relative size-[50px] shrink-0">
                                        <svg class="w-full h-full stroke-primary/10 fill-primary-soft" fill="none"
                                            height="48" viewbox="0 0 44 48" width="44"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M16 2.4641C19.7128 0.320509 24.2872 0.320508 28 2.4641L37.6506 8.0359C41.3634 10.1795 43.6506 14.141 43.6506
                                                        18.4282V29.5718C43.6506 33.859 41.3634 37.8205 37.6506 39.9641L28 45.5359C24.2872 47.6795 19.7128 47.6795 16 45.5359L6.34937
                                                        39.9641C2.63655 37.8205 0.349365 33.859 0.349365 29.5718V18.4282C0.349365 14.141 2.63655 10.1795 6.34937 8.0359L16 2.4641Z"
                                                fill="">
                                            </path>
                                            <path
                                                d="M16.25 2.89711C19.8081 0.842838 24.1919 0.842837 27.75 2.89711L37.4006 8.46891C40.9587 10.5232 43.1506 14.3196 43.1506
                                                        18.4282V29.5718C43.1506 33.6804 40.9587 37.4768 37.4006 39.5311L27.75 45.1029C24.1919 47.1572 19.8081 47.1572 16.25 45.1029L6.59937
                                                        39.5311C3.04125 37.4768 0.849365 33.6803 0.849365 29.5718V18.4282C0.849365 14.3196 3.04125 10.5232 6.59937 8.46891L16.25 2.89711Z"
                                                stroke="">
                                            </path>
                                        </svg>
                                        <div
                                            class="absolute leading-none start-2/4 top-2/4 -translate-y-2/4 -translate-x-2/4 rtl:translate-x-2/4">
                                            <i class="ki-filled ki-compass text-xl ps-px text-primary">
                                            </i>
                                        </div>
                                    </div>
                                </div>
                                <a class="text-base font-semibold text-mono hover:text-primary" href="#">
                                    Guide complet pour naviguer sur notre plateforme numérique
                                </a>
                                <p class="text-sm text-secondary-foreground">
                                    Une présentation détaillée pour vous aider à comprendre et à utiliser notre plateforme numérique pour une efficacité maximale.
                                </p>
                                <a class="kt-link kt-link-underlined kt-link-dashed" href="#">
                                    En savoir plus
                                </a>
                            </div>
                            <span class="hidden not-last:block not-last:border-b border-b-border">
                            </span>
                            <div class="flex flex-col items-start gap-2.5">
                                <div class="mb-2.5">
                                    <div class="relative size-[50px] shrink-0">
                                        <svg class="w-full h-full stroke-primary/10 fill-primary-soft" fill="none"
                                            height="48" viewbox="0 0 44 48" width="44"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M16 2.4641C19.7128 0.320509 24.2872 0.320508 28 2.4641L37.6506 8.0359C41.3634 10.1795 43.6506 14.141 43.6506
                                                        18.4282V29.5718C43.6506 33.859 41.3634 37.8205 37.6506 39.9641L28 45.5359C24.2872 47.6795 19.7128 47.6795 16 45.5359L6.34937
                                                        39.9641C2.63655 37.8205 0.349365 33.859 0.349365 29.5718V18.4282C0.349365 14.141 2.63655 10.1795 6.34937 8.0359L16 2.4641Z"
                                                fill="">
                                            </path>
                                            <path
                                                d="M16.25 2.89711C19.8081 0.842838 24.1919 0.842837 27.75 2.89711L37.4006 8.46891C40.9587 10.5232 43.1506 14.3196 43.1506
                                                        18.4282V29.5718C43.1506 33.6804 40.9587 37.4768 37.4006 39.5311L27.75 45.1029C24.1919 47.1572 19.8081 47.1572 16.25 45.1029L6.59937
                                                        39.5311C3.04125 37.4768 0.849365 33.6803 0.849365 29.5718V18.4282C0.849365 14.3196 3.04125 10.5232 6.59937 8.46891L16.25 2.89711Z"
                                                stroke="">
                                            </path>
                                        </svg>
                                        <div
                                            class="absolute leading-none start-2/4 top-2/4 -translate-y-2/4 -translate-x-2/4 rtl:translate-x-2/4">
                                            <i class="ki-filled ki-graph-up text-xl ps-px text-primary">
                                            </i>
                                        </div>
                                    </div>
                                </div>
                                <a class="text-base font-semibold text-mono hover:text-primary" href="#">
                                    Restez informé des dernières fonctionnalités et améliorations de la plateforme
                                </a>
                                <p class="text-sm text-secondary-foreground">
                                    Se tenir au courant des dernières améliorations et fonctionnalités de notre plateforme afin d'améliorer votre expérience en tant qu'utilisateur.
                                </p>
                                <a class="kt-link kt-link-underlined kt-link-dashed" href="#">
                                    En savoir plus
                                </a>
                            </div>
                            <span class="hidden not-last:block not-last:border-b border-b-border">
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end: grid -->

        <div class="kt-modal kt-modal-open:!flex" data-kt-modal="true" data-kt-modal-disable-scroll="false"
            id="modal_settings">
            <div class="kt-modal-content pt-7.5 my-[3%] w-full kt-container-fixed px-5 overflow-hidden"
                id="modal_settings_content">
                <div class="kt-modal-header p-0 border-0">
                    <!-- Container -->
                    <div class="kt-container-fixed">
                        <div class="flex flex-wrap items-center lg:items-end justify-between gap-5 pb-7.5">
                            <div class="flex items-center justify-between flex-wrap grow gap-5">
                                <div class="flex flex-col justify-center gap-2">
                                    <h1 class="text-xl font-semibold leading-none text-mono">
                                        Paramètres de profil
                                    </h1>
                                    <div class="flex items-center gap-2 text-sm font-normal text-secondary-foreground">
                                        Espace de modification de votre profil
                                    </div>
                                </div>
                                <div class="flex items-center gap-2.5">
                                    <a class="kt-btn kt-btn-outline" data-kt-modal-dismiss="true" href="#">
                                        Fermer
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End of Container -->
                </div>
                <div class="kt-modal-body kt-scrollable-y py-0 mb-5 ps-6 pe-3 me-3" id="modal_settings_body">
                    <div class="flex grow gap-5 lg:gap-7.5">
                        <div class="hidden lg:block w-[230px] shrink-0">
                            <div class="w-[230px] fixed z-10 kt-scrollable-y-auto" data-kt-scrollable="true"
                                data-kt-scrollable-height="auto" data-kt-scrollable-offset="225px"
                                data-kt-scrollable-wrappers="#modal_settings_content">
                                <div class="flex flex-col grow relative before:absolute before:left-[11px] before:top-0 before:bottom-0 before:border-l before:border-border"
                                    data-kt-scrollspy="true" data-kt-scrollspy-offset="110px"
                                    data-kt-scrollspy-target="#modal_settings_body">
                                    <a class="flex items-center rounded-lg pl-2.5 pr-2.5 py-2.5 gap-1.5 active border border-transparent text-sm text-foreground hover:text-primary hover:font-medium kt-scrollspy-active:bg-secondary-active kt-scrollspy-active:text-primary kt-scrollspy-active:font-medium hover:rounded-lg"
                                        data-kt-scrollspy-anchor="true" href="#basic_settings">
                                        <span
                                            class="flex w-1.5 relative before:absolute before:top-0 before:size-1.5 before:rounded-full before:-translate-x-2/4 before:-translate-y-2/4 kt-scrollspy-active:before:bg-primary">
                                        </span>
                                        Informations Personnelles
                                    </a>
                                    <a class="flex items-center rounded-lg pl-2.5 pr-2.5 py-2.5 gap-1.5 border border-transparent text-sm text-foreground hover:text-primary hover:font-medium kt-scrollspy-active:bg-secondary-active kt-scrollspy-active:text-primary kt-scrollspy-active:font-medium hover:rounded-lg"
                                        data-kt-scrollspy-anchor="true" href="#advanced_settings_address">
                                        <span
                                            class="flex w-1.5 relative before:absolute before:top-0 before:size-1.5 before:rounded-full before:-translate-x-2/4 before:-translate-y-2/4 kt-scrollspy-active:before:bg-primary">
                                        </span>
                                        Adresse postale
                                    </a>
                                    <a class="flex items-center rounded-lg pl-2.5 pr-2.5 py-2.5 gap-1.5 border border-transparent text-sm text-foreground hover:text-primary hover:font-medium kt-scrollspy-active:bg-secondary-active kt-scrollspy-active:text-primary kt-scrollspy-active:font-medium hover:rounded-lg"
                                        data-kt-scrollspy-anchor="true" href="#advanced_settings_preferences">
                                        <span
                                            class="flex w-1.5 relative before:absolute before:top-0 before:size-1.5 before:rounded-full before:-translate-x-2/4 before:-translate-y-2/4 kt-scrollspy-active:before:bg-primary">
                                        </span>
                                        Cursus Académique
                                    </a>
                                    <div class="flex flex-col">
                                        <div class="pl-6 pr-2.5 py-2.5 text-sm font-semibold text-mono">
                                            Documents justificatifs
                                        </div>
                                        <div class="flex flex-col">
                                            <a class="flex items-center rounded-lg pl-2.5 pr-2.5 py-2.5 gap-3.5 border border-transparent text-sm text-foreground hover:text-primary hover:font-medium kt-scrollspy-active:bg-secondary-active kt-scrollspy-active:text-primary kt-scrollspy-active:font-medium hover:rounded-lg"
                                                data-kt-scrollspy-anchor="true" href="#external_services_integrations">
                                                <span
                                                    class="flex w-1.5 relative before:absolute before:top-0 before:size-1.5 before:rounded-full before:-translate-x-2/4 before:-translate-y-2/4 kt-scrollspy-active:before:bg-primary">
                                                </span>
                                                Justificatifs Obligatoires
                                            </a>
                                        </div>
                                    </div>
                                    <div class="flex flex-col">
                                        <div class="pl-6 pr-2.5 py-2.5 text-sm font-semibold text-mono">
                                            Paramètres avancés
                                        </div>
                                        <div class="flex flex-col">
                                            <a class="flex items-center rounded-lg pl-2.5 pr-2.5 py-2.5 gap-3.5 border border-transparent text-sm text-foreground hover:text-primary hover:font-medium kt-scrollspy-active:bg-secondary-active kt-scrollspy-active:text-primary kt-scrollspy-active:font-medium hover:rounded-lg"
                                                data-kt-scrollspy-anchor="true" href="#advanced_settings_notifications">
                                                <span
                                                    class="flex w-1.5 relative before:absolute before:top-0 before:size-1.5 before:rounded-full before:-translate-x-2/4 before:-translate-y-2/4 kt-scrollspy-active:before:bg-primary">
                                                </span>
                                                Notifications
                                            </a>
                                        </div>
                                    </div>
                                    <div class="flex flex-col">
                                        <div class="pl-6 pr-2.5 py-2.5 text-sm font-semibold text-mono">
                                            Authentication
                                        </div>
                                        <div class="flex flex-col">
                                            <a class="flex items-center rounded-lg pl-2.5 pr-2.5 py-2.5 gap-3.5 border border-transparent text-sm text-foreground hover:text-primary hover:font-medium kt-scrollspy-active:bg-secondary-active kt-scrollspy-active:text-primary kt-scrollspy-active:font-medium hover:rounded-lg"
                                                data-kt-scrollspy-anchor="true" href="#auth_email">
                                                <span
                                                    class="flex w-1.5 relative before:absolute before:top-0 before:size-1.5 before:rounded-full before:-translate-x-2/4 before:-translate-y-2/4 kt-scrollspy-active:before:bg-primary">
                                                </span>
                                                Email
                                            </a>
                                            <a class="flex items-center rounded-lg pl-2.5 pr-2.5 py-2.5 gap-3.5 border border-transparent text-sm text-foreground hover:text-primary hover:font-medium kt-scrollspy-active:bg-secondary-active kt-scrollspy-active:text-primary kt-scrollspy-active:font-medium hover:rounded-lg"
                                                data-kt-scrollspy-anchor="true" href="#auth_social_sign_in">
                                                <span
                                                    class="flex w-1.5 relative before:absolute before:top-0 before:size-1.5 before:rounded-full before:-translate-x-2/4 before:-translate-y-2/4 kt-scrollspy-active:before:bg-primary">
                                                </span>
                                                Connexion via réseaux sociaux
                                            </a>
                                            <a class="flex items-center rounded-lg pl-2.5 pr-2.5 py-2.5 gap-3.5 border border-transparent text-sm text-foreground hover:text-primary hover:font-medium kt-scrollspy-active:bg-secondary-active kt-scrollspy-active:text-primary kt-scrollspy-active:font-medium hover:rounded-lg"
                                                data-kt-scrollspy-anchor="true" href="#auth_two_factor">
                                                <span
                                                    class="flex w-1.5 relative before:absolute before:top-0 before:size-1.5 before:rounded-full before:-translate-x-2/4 before:-translate-y-2/4 kt-scrollspy-active:before:bg-primary">
                                                </span>
                                                Authentification à deux facteurs (2FA)
                                            </a>
                                            <a class="flex items-center rounded-lg pl-2.5 pr-2.5 py-2.5 gap-3.5 border border-transparent text-sm text-foreground hover:text-primary hover:font-medium kt-scrollspy-active:bg-secondary-active kt-scrollspy-active:text-primary kt-scrollspy-active:font-medium hover:rounded-lg"
                                                data-kt-scrollspy-anchor="true" href="#auth_password">
                                                <span
                                                    class="flex w-1.5 relative before:absolute before:top-0 before:size-1.5 before:rounded-full before:-translate-x-2/4 before:-translate-y-2/4 kt-scrollspy-active:before:bg-primary">
                                                </span>
                                                Mot de passe
                                            </a>
                                        </div>
                                    </div>
                                    <a class="flex items-center rounded-lg pl-2.5 pr-2.5 py-2.5 gap-1.5 border border-transparent text-sm text-foreground hover:text-primary hover:font-medium kt-scrollspy-active:bg-secondary-active kt-scrollspy-active:text-primary kt-scrollspy-active:font-medium hover:rounded-lg"
                                        data-kt-scrollspy-anchor="true" href="#delete_account">
                                        <span
                                            class="flex w-1.5 relative before:absolute before:top-0 before:size-1.5 before:rounded-full before:-translate-x-2/4 before:-translate-y-2/4 kt-scrollspy-active:before:bg-primary">
                                        </span>
                                        Supprimer le compte
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col items-stretch grow gap-5 lg:gap-7.5">
                            <form action="{{ route('emprunteur.profil.general.update') }}" method="post" enctype="multipart/form-data" class="kt-card pb-2.5">
                                @csrf
                                <div class="kt-card-header" id="basic_settings">
                                    <h3 class="kt-card-title">
                                    </h3>
                                    <div class="flex items-center gap-2">
                                        <label class="kt-label">
                                            Profil publique
                                            <input checked="" class="kt-switch kt-switch-sm" name="check"
                                                type="checkbox" value="1" />
                                        </label>
                                    </div>
                                </div>
                                <div class="kt-card-content grid gap-5">
                                    <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                                        <label class="kt-form-label max-w-56">
                                            Photo
                                        </label>
                                        <div class="flex items-center justify-between flex-wrap grow gap-2.5">
                                            <span class="text-sm">
                                                150x150px JPEG, PNG Image
                                            </span>
                                            <div class="kt-image-input size-16" data-kt-image-input="true">
                                                <input accept=".png, .jpg, .jpeg" name="avatar" type="file">
                                                <input name="avatar_remove" type="hidden" />
                                                <button class="kt-image-input-remove" data-kt-image-input-remove="true"
                                                    data-kt-tooltip="true" data-kt-tooltip-placement="right"
                                                    data-kt-tooltip-trigger="hover" type="button">
                                                    <i class="ki-filled ki-cross">
                                                    </i>
                                                    <span class="kt-tooltip" data-kt-tooltip-content="true">
                                                        Cliquez pour supprimer ou inverser
                                                    </span>
                                                </button>
                                                <div class="kt-image-input-placeholder border-2 border-green-500 {{ Auth::user()->profile_picture_id ? '' : 'kt-image-input-empty:border-input' }}"
                                                    data-kt-image-input-placeholder="true"
                                                    style="background-image: url('{{ asset(Auth::user()->profile_picture_id ? Auth::user()->profile_picture_id->filename : 'assets/media/avatars/blank.png') }}')">
                                                    <div class="kt-image-input-preview" data-kt-image-input-preview="true"
                                                        style="background-image:url('/media/avatars/300-2.png')">
                                                    </div>
                                                    <div
                                                        class="flex items-center justify-center cursor-pointer h-5 left-0 right-0 bottom-0 bg-black/25 absolute">
                                                        <svg class="fill-border opacity-80" height="12"
                                                            viewbox="0 0 14 12" width="14"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M11.6665 2.64585H11.2232C11.0873 2.64749 10.9538 2.61053 10.8382 2.53928C10.7225 2.46803 10.6295 2.36541 10.5698 2.24335L10.0448 1.19918C9.91266 0.931853 9.70808 0.707007 9.45438 0.550249C9.20068 0.393491 8.90806 0.311121 8.60984 0.312517H5.38984C5.09162 0.311121 4.799 0.393491 4.5453 0.550249C4.2916 0.707007 4.08701 0.931853 3.95484 1.19918L3.42984 2.24335C3.37021 2.36541 3.27716 2.46803 3.1615 2.53928C3.04584 2.61053 2.91234 2.64749 2.7765 2.64585H2.33317C1.90772 2.64585 1.49969 2.81486 1.19885 3.1157C0.898014 3.41654 0.729004 3.82457 0.729004 4.25002V10.0834C0.729004 10.5088 0.898014 10.9168 1.19885 11.2177C1.49969 11.5185 1.90772 11.6875 2.33317 11.6875H11.6665C12.092 11.6875 12.5 11.5185 12.8008 11.2177C13.1017 10.9168 13.2707 10.5088 13.2707 10.0834V4.25002C13.2707 3.82457 13.1017 3.41654 12.8008 3.1157C12.5 2.81486 12.092 2.64585 11.6665 2.64585ZM6.99984 9.64585C6.39413 9.64585 5.80203 9.46624 5.2984 9.12973C4.79478 8.79321 4.40225 8.31492 4.17046 7.75532C3.93866 7.19572 3.87802 6.57995 3.99618 5.98589C4.11435 5.39182 4.40602 4.84613 4.83432 4.41784C5.26262 3.98954 5.80831 3.69786 6.40237 3.5797C6.99644 3.46153 7.61221 3.52218 8.1718 3.75397C8.7314 3.98576 9.2097 4.37829 9.54621 4.88192C9.88272 5.38554 10.0623 5.97765 10.0623 6.58335C10.0608 7.3951 9.73765 8.17317 9.16365 8.74716C8.58965 9.32116 7.81159 9.64431 7 9.64585Z">
                                                            </path>
                                                            <path
                                                                d="M7 8.77087C8.20812 8.77087 9.1875 7.7915 9.1875 6.58337C9.1875 5.37525 8.20812 4.39587 7 4.39587C5.79188 4.39587 4.8125 5.37525 4.8125 6.58337C4.8125 7.7915 5.79188 8.77087 7 8.77087Z">
                                                            </path>
                                                        </svg>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex items-center flex-wrap lg:flex-nowrap gap-2.5">
                                        <label class="kt-form-label max-w-56">
                                            Civilité
                                        </label>
                                        <div class="flex items-center gap-5">
                                            <label class="kt-label">
                                                <input {{ (Auth::user()->civility == 'M.' or Auth::user()->civility == '') ? 'checked' : null }} class="kt-radio" name="civilite" type="radio" value="M.">
                                                Monsieur
                                            </label>
                                            <label class="kt-label">
                                                <input {{ Auth::user()->civility == 'Mme.' ? 'checked' : null }} class="kt-radio" name="civilite" type="radio" value="Mme.">
                                                Madame
                                            </label>
                                            <label class="kt-label">
                                                <input {{ Auth::user()->civility == 'Mx.' ? 'checked' : null }} class="kt-radio" name="civilite" type="radio" value="Mx.">
                                                Neutre
                                            </label>
                                        </div>
                                    </div>
                                    <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                                        <label class="kt-form-label max-w-56">
                                            Nom complet
                                        </label>
                                        <div class="grid md:grid-cols-2 w-full gap-5">
                                            <input class="kt-input" name="firstname" type="text" placeholder="Vos prénoms" value="{{ Auth::user()->first_name ?? null }}" />
                                            <input class="kt-input" name="lastname" type="text" placeholder="Votre nom" value="{{ Auth::user()->last_name ?? null }}" />
                                        </div>
                                    </div>
                                    <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                                        <label class="kt-form-label max-w-56">
                                            Date de naissance
                                        </label>
                                        <input class="kt-input" name="birth_date" placeholder="JJ/MM/AAAA" type="date" value="{{ Auth::user()->birth_date ?? null }}" />
                                    </div>
                                    <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                                        <label class="kt-form-label max-w-56">
                                            Lieu de naissance
                                        </label>
                                        <div class="grow">
                                            <select name="birth_place" class="kt-select" name="pays" data-kt-select="true">
                                                <option {{ Auth::user()->birth_place == 'Belgique' ? 'selected' : '' }}>Belgique</option>
                                                <option {{ Auth::user()->birth_place == 'Congo' ? 'selected' : '' }}>Congo</option>
                                                <option {{ Auth::user()->birth_place == 'Côte d\'Ivoire' ? 'selected' : '' }}>Côte d'Ivoire</option>
                                                <option {{ Auth::user()->birth_place == 'Cameroun' ? 'selected' : '' }}>Cameroun</option>
                                                <option {{ Auth::user()->birth_place == 'Canada' ? 'selected' : '' }}>Canada</option>
                                                <option {{ Auth::user()->birth_place == 'Espagne' ? 'selected' : '' }}>Espagne</option>
                                                <option {{ Auth::user()->birth_place == 'France' ? 'selected' : '' }}>France</option>
                                                <option {{ Auth::user()->birth_place == 'Italie' ? 'selected' : '' }}>Italie</option>
                                                <option {{ Auth::user()->birth_place == 'Guinnée' ? 'selected' : '' }}>Guinnée</option>
                                                <option {{ Auth::user()->birth_place == 'Mali' ? 'selected' : '' }}>Mali</option>
                                                <option {{ Auth::user()->birth_place == 'Senegal' ? 'selected' : '' }}>Senegal</option>
                                                <option {{ Auth::user()->birth_place == 'Mali' ? 'selected' : '' }}>Mali</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                                        <label class="kt-form-label max-w-56">
                                            Nationalité
                                        </label>
                                        <input class="kt-input" name="nationality" placeholder="" type="text" value="{{ Auth::user()->nationality ?? null }}" />
                                    </div>
                                    <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                                        <label class="kt-form-label max-w-56">
                                            Numéro de téléphone
                                        </label>
                                        <input class="kt-input" name="phone_number" placeholder="Numéro de téléphone mobile" type="text" value="{{ Auth::user()->phone_number ?? null }}" />
                                    </div>
                                    <div class="flex justify-end">
                                        <button type="submit" class="kt-btn kt-btn-primary">
                                            Sauvegarder
                                        </button>
                                    </div>
                                </div>
                            </form>
                            {{-- Adresse postale --}}
                            <form action="{{ route('emprunteur.profil.adresse.update') }}" method="post" class="kt-card">
                                @csrf
                                <div class="kt-card-header" id="advanced_settings_address">
                                    <h3 class="kt-card-title">
                                        Adresse postale
                                    </h3>
                                </div>
                                <div class="kt-card-content grid gap-5 lg:py-7.5">
                                    <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                                        <label class="kt-form-label flex items-center gap-1 max-w-56">
                                            Adresse 
                                        </label>
                                        <input class="kt-input" type="text" name="adresse" value="{{ Auth::user()->address['adresse'] ?? null }}">
                                        </input>
                                    </div>
                                    <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                                        <label class="kt-form-label max-w-56">
                                            Rue
                                        </label>
                                        <input class="kt-input" placeholder="" name="rue" type="text" value="{{ Auth::user()->address['rue'] ?? null }}">
                                        </input>
                                    </div>
                                    <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                                        <label class="kt-form-label max-w-56">
                                            Code postal
                                        </label>
                                        <input class="kt-input" type="text" name="code_postal" value="{{ Auth::user()->address['code_postal'] ?? null }}" />
                                    </div>
                                    <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                                        <label class="kt-form-label max-w-56">
                                            Ville
                                        </label>
                                        <input class="kt-input" type="text" name="ville" value="{{ Auth::user()->address['ville'] ?? null }}" />
                                    </div>
                                    {{-- <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                                        <label class="kt-form-label max-w-56">
                                            Pays
                                        </label>
                                        <div class="grow">
                                            <select class="kt-select" name="pays" data-kt-select="true">
                                                <option>Belgique</option>
                                                <option>Congo</option>
                                                <option>Côte d'Ivoire</option>
                                                <option>Cameroun</option>
                                                <option>Canada</option>
                                                <option>Espagne</option>
                                                <option>France</option>
                                                <option>Italie</option>
                                                <option>Guinnée</option>
                                                <option>Mali</option>
                                                <option>Senegal</option>
                                                <option>Mali</option>
                                            </select>
                                        </div>
                                    </div> --}}
                                    <div class="flex justify-end pt-2.5">
                                        <button type="submit" class="kt-btn kt-btn-primary">
                                            Sauvegarder
                                        </button>
                                    </div>
                                </div>
                            </form>
                            {{-- Cursus Académique --}}
                            <form action="{{ route('emprunteur.profil.cursus.update') }}" method="post" class="kt-card">
                                @csrf
                                <div class="kt-card-header" id="advanced_settings_preferences">
                                    <h3 class="kt-card-title">
                                        Cursus Académique
                                    </h3>
                                </div>
                                <div class="kt-card-content grid gap-5 lg:py-7.5">
                                    <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                                        <label class="kt-form-label max-w-56">
                                            Votre établissement
                                        </label>
                                        <select class="kt-select"
                                            name="etablissement"
                                            data-kt-select="true"
                                            data-kt-select-enable-search="true"
                                            data-kt-select-search-placeholder="Recherche..."
                                            data-kt-select-placeholder="Sélectionner un établissement..."
                                            data-kt-select-config='{
                                                "optionsClass": "kt-scrollable overflow-auto max-h-[250px]"
                                            }'>
                                            @foreach($etablissements as $etablissement)
                                                <option value="{{ $etablissement->id }}" {{ Auth::user()->etablissement_id == $etablissement->id ? 'selected' : '' }}>
                                                    {{ $etablissement->nom }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                                        <label class="kt-form-label max-w-56">
                                            Diplôme préparé
                                        </label>
                                        <div class="grow">
                                            <select class="kt-select" name="diplome" data-kt-select="true">
                                                <option>
                                                    Master Grande École
                                                </option>
                                                <option>
                                                    Diplôme d'Ingénieur
                                                </option>
                                                <option>
                                                    Master Universitaire
                                                </option>
                                                <option>
                                                    Mastère Spécialisé
                                                </option>
                                                <option>
                                                    Autre
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5 mb-2">
                                        <label class="kt-form-label max-w-56">
                                            Filière / Spécialisation principale
                                        </label>
                                        <div class="grow">
                                            <select class="kt-select" name="filiere" data-kt-select="true">
                                                <option>
                                                    Finance de Marché (conditionnée par le diplôme sélectionné)
                                                </option>
                                                <option>
                                                    Marketing Digital (conditionnée par le diplôme sélectionné)
                                                </option>
                                                <option>
                                                    Intelligence Artificielle (conditionnée par le diplôme sélectionné)
                                                </option>
                                                <option>
                                                    Droit des Affaires (conditionnée par le diplôme sélectionné)
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="flex items-center flex-wrap lg:flex-nowrap gap-2.5">
                                        <label class="kt-form-label max-w-56">
                                            Année d'études actuelle
                                        </label>
                                        <input class="kt-input" name="annee_etude" type="text" placeholder="ex: 1ère année de Master / 2ème année du cycle ingénieur" value="{{ Auth::user()->current_study_year ?? null }}">
                                    </div>
                                    <div class="flex items-center flex-wrap lg:flex-nowrap gap-2.5">
                                        <label class="kt-form-label max-w-56">
                                            Nombre d'années d'études restantes
                                        </label>
                                        <input class="kt-input" name="annee_etude" type="text" placeholder="(avant diplomation)" value="{{ Auth::user()->remaining_years ?? null }}">
                                    </div>
                                    <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                                        <label class="kt-form-label max-w-56">
                                            Date de diplomation prévue
                                        </label>
                                        <input class="kt-input" name="date_diplome_prevue" placeholder="Mois / Année" type="date" value="{{ Auth::user()->graduation_date ?? null }}" />
                                    </div>
                                    <div class="flex justify-end">
                                        <button type="submit" class="kt-btn kt-btn-primary">
                                            Sauvegarder
                                        </button>
                                    </div>
                                </div>
                            </form>
                            {{-- Justificatifs Obligatoires --}}
                            <form action="{{ route('emprunteur.profil.documents.update') }}" method="post" enctype="multipart/form-data" class="kt-card">
                                @csrf
                                <div class="kt-card-header" id="external_services_integrations">
                                    <h3 class="kt-card-title">
                                        Justificatifs Obligatoires
                                    </h3>
                                </div>
                                <div class="kt-card-content grid gap-5 lg:gap-7.5 lg:py-7.5 py-5">
                                    <div class="grid gap-5">
                                        @foreach($documentsAttendus as $type => $label)
                                        <div class="flex items-center justify-between flex-wrap border border-border rounded-xl gap-2 p-3.5">

                                            @if($userDocuments->has($type))
                                                @php
                                                    $doc = $userDocuments[$type];
                                                @endphp
                                                <div class="flex items-center flex-wrap gap-3.5">
                                                    <img alt="" class="size-8 shrink-0"
                                                        src="{{ asset('storage/' . $doc->file->filename) }}" />
                                                    <div class="flex flex-col">
                                                        <div class="flex items-center gap-1.5">
                                                            <a class="text-sm font-medium text-mono hover:text-primary"
                                                                href="#">
                                                                {{ $label }}
                                                            </a>
                                                        </div>
                                                        <span class="text-sm text-secondary-foreground">
                                                            {{ $doc->explanation }}
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="flex items-center gap-2 lg:gap-5">
                                                    <span class="text-sm font-semibold px-3 py-1 rounded-full
                                                        {{ $doc->status === 'valide' ? 'bg-green-100 text-green-800' : ($doc->status === 'refuse' ? 'bg-red-100 text-red-800' : 'bg-yellow-100 text-yellow-800') }}">
                                                        {{ ucfirst($doc->status) }}
                                                    </span>
                                                    <div class="kt-btn kt-btn-icon kt-btn-ghost" data-kt-menu="true">
                                                        <div class="kt-menu-item" data-kt-menu-item-offset="0, 10px"
                                                            data-kt-menu-item-placement="bottom-end"
                                                            data-kt-menu-item-placement-rtl="bottom-start"
                                                            data-kt-menu-item-toggle="dropdown" data-kt-menu-item-trigger="click">
                                                            <button class="kt-menu-toggle kt-btn kt-btn-sm kt-btn-icon kt-btn-ghost">
                                                                <i class="ki-filled ki-setting-2"></i>
                                                            </button>
                                                            <div class="kt-menu-dropdown kt-menu-default w-full max-w-[200px]"
                                                                data-kt-menu-dismiss="true">
                                                                <div class="kt-menu-item">
                                                                    <a class="kt-menu-link"
                                                                        href="">
                                                                        <span class="kt-menu-icon">
                                                                            <i class="ki-filled ki-setting-3">
                                                                            </i>
                                                                        </span>
                                                                        <span class="kt-menu-title">
                                                                            Modifier
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="kt-menu-item">
                                                                    <a class="kt-menu-link"
                                                                        href="">
                                                                        <span class="kt-menu-icon">
                                                                            <i class="ki-filled ki-some-files">
                                                                            </i>
                                                                        </span>
                                                                        <span class="kt-menu-title">
                                                                            Exporter
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="kt-menu-item">
                                                                    <a class="kt-menu-link" data-kt-modal-toggle="#report_user_modal"
                                                                        href="#">
                                                                        <span class="kt-menu-icon">
                                                                            <i class="ki-filled ki-trash"></i>
                                                                        </span>
                                                                        <span class="kt-menu-title">
                                                                            Supprimer
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @else
                                                <label class="kt-form-label w-full block font-bold">{{ $label }}</label>
                                                <input type="file" name="{{ $type }}" class="kt-input w-full" multiple required />
                                                <input type="text" name="{{ $type }}_explain" class="kt-input w-full" placeholder="Donner une brève explication sur le document attendu..." required />
                                            @endif
                                        </div>
                                        @endforeach
                                        {{-- <div
                                            class="flex items-center justify-between flex-wrap border border-border rounded-xl gap-2 p-3.5">
                                            <div class="flex items-center flex-wrap gap-3.5">
                                                <img alt="" class="size-8 shrink-0"
                                                    src="{{asset('assets/media/brand-logos/equacoin.svg')}}" />
                                                <div class="flex flex-col">
                                                    <div class="flex items-center gap-1.5">
                                                        <a class="text-sm font-medium text-mono hover:text-primary"
                                                            href="#">
                                                            Equacoin
                                                        </a>
                                                        <a class="text-sm text-secondary-foreground hover:text-primary"
                                                            href="#">
                                                            equacoin@cryptoemail.com
                                                        </a>
                                                    </div>
                                                    <span class="text-sm text-secondary-foreground">
                                                        Streamline cryptocurrency transactions securely and efficiently.
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="flex items-center gap-2 lg:gap-5">
                                                <input class="kt-switch" name="check" type="checkbox"
                                                    value="1" />
                                                <div class="kt-btn kt-btn-icon kt-btn-ghost" data-kt-menu="true">
                                                    <div class="kt-menu-item" data-kt-menu-item-offset="0, 10px"
                                                        data-kt-menu-item-placement="bottom-end"
                                                        data-kt-menu-item-placement-rtl="bottom-start"
                                                        data-kt-menu-item-toggle="dropdown" data-kt-menu-item-trigger="click">
                                                        <button class="kt-menu-toggle kt-btn kt-btn-sm kt-btn-icon kt-btn-ghost">
                                                            <i class="ki-filled ki-setting-2"></i>
                                                        </button>
                                                        <div class="kt-menu-dropdown kt-menu-default w-full max-w-[200px]"
                                                            data-kt-menu-dismiss="true">
                                                            <div class="kt-menu-item">
                                                                <a class="kt-menu-link"
                                                                    href="/metronic/tailwind/demo2/account/home/settings-enterprise">
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
                                                                <a class="kt-menu-link"
                                                                    href="/metronic/tailwind/demo2/account/members/import-members">
                                                                    <span class="kt-menu-icon">
                                                                        <i class="ki-filled ki-some-files">
                                                                        </i>
                                                                    </span>
                                                                    <span class="kt-menu-title">
                                                                        Import
                                                                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="kt-menu-item">
                                                                <a class="kt-menu-link"
                                                                    href="/metronic/tailwind/demo2/account/activity">
                                                                    <span class="kt-menu-icon">
                                                                        <i class="ki-filled ki-cloud-change">
                                                                        </i>
                                                                    </span>
                                                                    <span class="kt-menu-title">
                                                                        Activity
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
                                        </div> --}}
                                    </div>
                                    <div class="flex justify-end">
                                        <button type="submit" class="kt-btn kt-btn-primary">
                                            Sauvegarder
                                        </button>
                                    </div>
                                </div>
                            </form>
                            {{-- Notifications --}}
                            <form action="{{ route('emprunteur.profil.notifications.preferences') }}" method="post" class="kt-card">
                                @csrf
                                @php
                                    $notif = Auth::user()->notificationPreference ?? null;
                                @endphp

                                <div class="kt-card-header" id="advanced_settings_notifications">
                                    <h3 class="kt-card-title">
                                        Notifications
                                    </h3>
                                </div>
                                <div class="kt-card-content lg:py-7.5">
                                    <div class="flex flex-wrap items-center gap-5 mb-5 lg:mb-7">
                                        <div
                                            class="flex items-center justify-between flex-wrap grow border border-border rounded-xl gap-2 px-3.5 py-2.5">
                                            <div class="flex items-center flex-wrap gap-3.5">
                                                <div class="relative size-[50px] shrink-0">
                                                    <svg class="w-full h-full stroke-border fill-muted/30" fill="none"
                                                        height="48" viewbox="0 0 44 48" width="44"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M16 2.4641C19.7128 0.320509 24.2872 0.320508 28 2.4641L37.6506 8.0359C41.3634 10.1795 43.6506 14.141 43.6506
                                                                    18.4282V29.5718C43.6506 33.859 41.3634 37.8205 37.6506 39.9641L28 45.5359C24.2872 47.6795 19.7128 47.6795 16 45.5359L6.34937
                                                                    39.9641C2.63655 37.8205 0.349365 33.859 0.349365 29.5718V18.4282C0.349365 14.141 2.63655 10.1795 6.34937 8.0359L16 2.4641Z"
                                                            fill="">
                                                        </path>
                                                        <path
                                                            d="M16.25 2.89711C19.8081 0.842838 24.1919 0.842837 27.75 2.89711L37.4006 8.46891C40.9587 10.5232 43.1506 14.3196 43.1506
                                                                    18.4282V29.5718C43.1506 33.6804 40.9587 37.4768 37.4006 39.5311L27.75 45.1029C24.1919 47.1572 19.8081 47.1572 16.25 45.1029L6.59937
                                                                    39.5311C3.04125 37.4768 0.849365 33.6803 0.849365 29.5718V18.4282C0.849365 14.3196 3.04125 10.5232 6.59937 8.46891L16.25 2.89711Z"
                                                            stroke="">
                                                        </path>
                                                    </svg>
                                                    <div
                                                        class="absolute leading-none start-2/4 top-2/4 -translate-y-2/4 -translate-x-2/4 rtl:translate-x-2/4">
                                                        <i class="ki-filled ki-sms text-xl text-muted-foreground">
                                                        </i>
                                                    </div>
                                                </div>
                                                <div class="flex flex-col">
                                                    <a class="text-sm font-medium text-mono hover:text-primary mb-px"
                                                        href="#">
                                                        Email
                                                    </a>
                                                    <span class="text-sm text-secondary-foreground">
                                                        Personnalisez vos préférences d'e-mail.
                                                    </span>
                                                </div>
                                            </div>
                                            <label class="kt-label">
                                                <input {{ $notif && $notif->email_notifications ? 'checked' : '' }} class="kt-switch kt-switch-sm" name="notification_types"
                                                    onchange="this.checked ? document.getElementById('email_preferences').classList.remove('hidden') : document.getElementById('email_preferences').classList.add('hidden');"
                                                    type="checkbox" value="email_notifications" />
                                            </label>
                                        </div>
                                        <div
                                            class="bg-muted cursor-not-allowed flex items-center justify-between flex-wrap grow border border-border rounded-xl gap-2 px-3.5 py-2.5">
                                            <div class="flex items-center flex-wrap gap-3.5">
                                                <div class="relative size-[50px] shrink-0">
                                                    <svg class="w-full h-full stroke-border fill-muted/30" fill="none"
                                                        height="48" viewbox="0 0 44 48" width="44"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M16 2.4641C19.7128 0.320509 24.2872 0.320508 28 2.4641L37.6506 8.0359C41.3634 10.1795 43.6506 14.141 43.6506
                                                                    18.4282V29.5718C43.6506 33.859 41.3634 37.8205 37.6506 39.9641L28 45.5359C24.2872 47.6795 19.7128 47.6795 16 45.5359L6.34937
                                                                    39.9641C2.63655 37.8205 0.349365 33.859 0.349365 29.5718V18.4282C0.349365 14.141 2.63655 10.1795 6.34937 8.0359L16 2.4641Z"
                                                            fill="">
                                                        </path>
                                                        <path
                                                            d="M16.25 2.89711C19.8081 0.842838 24.1919 0.842837 27.75 2.89711L37.4006 8.46891C40.9587 10.5232 43.1506 14.3196 43.1506
                                                                    18.4282V29.5718C43.1506 33.6804 40.9587 37.4768 37.4006 39.5311L27.75 45.1029C24.1919 47.1572 19.8081 47.1572 16.25 45.1029L6.59937
                                                                    39.5311C3.04125 37.4768 0.849365 33.6803 0.849365 29.5718V18.4282C0.849365 14.3196 3.04125 10.5232 6.59937 8.46891L16.25 2.89711Z"
                                                            stroke="">
                                                        </path>
                                                    </svg>
                                                    <div
                                                        class="absolute leading-none start-2/4 top-2/4 -translate-y-2/4 -translate-x-2/4 rtl:translate-x-2/4">
                                                        <i class="ki-filled ki-message-notify text-xl text-muted-foreground"></i>
                                                    </div>
                                                </div>
                                                <div class="flex flex-col">
                                                    <a class="text-sm font-medium text-mono hover:text-primary mb-px">
                                                        SMS
                                                    </a>
                                                    <span class="text-sm text-secondary-foreground">
                                                        Rester informé par SMS.
                                                    </span>
                                                </div>
                                            </div>
                                            <label class="kt-label">
                                                <input disabled class="kt-switch kt-switch-sm" name="notification_types"
                                                    type="checkbox" value="sms_notifications" />
                                            </label>
                                        </div>
                                    </div>
                                    <div class="flex flex-col gap-3.5 mb-7">
                                        <span class="text-base font-medium text-mono pb-0.5">
                                            Notifications sur la plateforme
                                        </span>
                                        <div class="flex flex-col items-start gap-4">
                                            <label class="kt-label">
                                                <input {{ (!$notif || ($notif && $notif->desktop_notification === 'new_messages')) ? 'checked' : '' }} class="kt-radio" name="desktop_notification" type="radio"
                                                    value="new_messages">
                                                Tous les nouveaux messages (Recommandé)
                                                </input>
                                            </label>
                                            <label class="kt-label">
                                                <input {{ $notif && $notif->desktop_notification === 'direct' ? 'checked' : '' }} class="kt-radio" name="desktop_notification"
                                                    type="radio" value="direct">
                                                Direct @mentions
                                                </input>
                                            </label>
                                            <label class="kt-label">
                                                <input {{ $notif && $notif->desktop_notification === 'disabled' ? 'checked' : '' }} class="kt-radio" name="desktop_notification"
                                                    type="radio" value="disabled">
                                                Désactiver
                                                </input>
                                            </label>
                                        </div>
                                    </div>
                                    <div id="email_preferences" class="flex flex-col gap-3.5 mb-7">
                                        <span class="text-base font-medium text-mono pb-0.5">
                                            Notifications par Email
                                        </span>
                                        <div class="flex flex-col items-start gap-4">
                                            <label class="kt-label">
                                                <input {{ (!$notif || ($notif && $notif->email_notification === 'new_messages_statuses')) ? 'checked' : '' }} class="kt-radio" name="email_notification" type="radio"
                                                    value="new_messages_statuses">
                                                Tous les nouveaux messages et statuts
                                                </input>
                                            </label>
                                            <label class="kt-label">
                                                <input {{ $notif && $notif->email_notification === 'messages_statuses' ? 'checked' : '' }} class="kt-radio" name="email_notification"
                                                    type="radio" value="messages_statuses">
                                                Messages et statuts non lus
                                                </input>
                                            </label>
                                            <label class="kt-label">
                                                <input {{ $notif && $notif->email_notification === 'disabled' ? 'checked' : '' }} class="kt-radio" name="email_notification"
                                                    type="radio" value="disabled">
                                                Désactiver
                                                </input>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="flex justify-end">
                                        <button type="submit" class="kt-btn kt-btn-primary">
                                            Sauvegarder
                                        </button>
                                    </div>
                                </div>
                            </form>
                            {{-- Email --}}
                            <form action="{{ route('emprunteur.profil.email.update') }}" method="post" class="kt-card pb-2.5">
                                @csrf
                                <div class="kt-card-header" id="auth_email">
                                    <h3 class="kt-card-title">
                                        Email
                                    </h3>
                                </div>
                                <div class="kt-card-content grid gap-5 pt-7.5">
                                    <div class="w-full">
                                        <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                                            <label class="kt-form-label max-w-56">
                                                Email
                                            </label>
                                            <div class="flex flex-col tems-start grow gap-3 w-full">
                                                <input class="kt-input" name="email" type="text" value="{{ Auth::user()->email ?? null }}">
                                                
                                                <div class="kt-alert kt-alert-light kt-alert-warning" id="alert_5">
                                                    <div class="kt-alert-icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-info" aria-hidden="true">
                                                            <circle cx="12" cy="12" r="10"></circle>
                                                            <path d="M12 16v-4"></path>
                                                            <path d="M12 8h.01"></path>
                                                        </svg>
                                                    </div>
                                                    <div class="kt-alert-content">
                                                        <h3 class="kt-alert-title">À votre attention !</h3>
                                                        <p class="kt-alert-description">
                                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem velit repellat id dolores.
                                                            <br />Vero consequuntur.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex justify-end">
                                        <button type="submit" class="kt-btn kt-btn-primary">
                                            Sauvegarder
                                        </button>
                                    </div>
                                </div>
                            </form>
                            {{-- Connexion réseaux sociaux --}}
                            <form action="" method="post" class="kt-card">
                                @csrf
                                <div class="kt-card-header" id="auth_social_sign_in">
                                    <h3 class="kt-card-title">
                                        Connexion réseaux sociaux
                                    </h3>
                                </div>
                                <div class="kt-card-content">
                                    <div class="grid gap-5 mb-7">
                                        <div
                                            class="flex items-center justify-between flex-wrap border border-border rounded-xl gap-2 px-3.5 py-2.5">
                                            <div class="flex items-center flex-wrap gap-3.5">
                                                <img alt="" class="size-6 shrink-0"
                                                    src="{{asset('assets/media/brand-logos/google.svg')}}" />
                                                <div class="flex flex-col gap-0.5">
                                                    <a class="text-sm font-medium text-mono hover:text-primary"
                                                        href="#">
                                                        Google
                                                    </a>
                                                    <a class="text-sm text-secondary-foreground hover:text-primary"
                                                        href="#">
                                                        emprunteur@gmail.com
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="flex items-center gap-5">
                                                <label class="kt-label">
                                                    <input checked="" class="kt-switch kt-switch-sm" name="check"
                                                        type="checkbox" value="1" />
                                                </label>
                                                <div class="kt-btn kt-btn-sm kt-btn-icon kt-btn-ghost">
                                                    <i class="ki-filled ki-trash">
                                                    </i>
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            class="flex items-center justify-between flex-wrap border border-border rounded-xl gap-2 px-3.5 py-2.5">
                                            <div class="flex items-center flex-wrap gap-3.5">
                                                <img alt="" class="size-6 shrink-0"
                                                    src="{{asset('assets/media/brand-logos/facebook.svg')}}" />
                                                <div class="flex flex-col gap-0.5">
                                                    <a class="text-sm font-medium text-mono hover:text-primary"
                                                        href="#">
                                                        Facebook
                                                    </a>
                                                    <a class="text-sm text-secondary-foreground hover:text-primary"
                                                        href="#">
                                                        jasontt@keenthemes.com
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="flex items-center gap-5">
                                                <label class="kt-label">
                                                    <input class="kt-switch kt-switch-sm" name="check" type="checkbox"
                                                        value="1" />
                                                </label>
                                                <div class="kt-btn kt-btn-sm kt-btn-icon kt-btn-ghost">
                                                    <i class="ki-filled ki-trash">
                                                    </i>
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            class="flex items-center justify-between flex-wrap border border-border rounded-xl gap-2 px-3.5 py-2.5">
                                            <div class="flex items-center flex-wrap gap-3.5">
                                                <img alt="" class="size-6 shrink-0"
                                                    src="{{asset('assets/media/brand-logos/linkedin.svg')}}" />
                                                <div class="flex flex-col gap-0.5">
                                                    <a class="text-sm font-medium text-mono hover:text-primary"
                                                        href="#">
                                                        Linkedin
                                                    </a>
                                                    <a class="text-sm text-secondary-foreground hover:text-primary"
                                                        href="#">
                                                        jasontt@keenthemes.com
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="flex items-center gap-5">
                                                <label class="kt-label">
                                                    <input class="kt-switch kt-switch-sm" name="check" type="checkbox"
                                                        value="1" />
                                                </label>
                                                <div class="kt-btn kt-btn-sm kt-btn-icon kt-btn-ghost">
                                                    <i class="ki-filled ki-trash">
                                                    </i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex justify-end">
                                        <button type="submit" class="kt-btn kt-btn-primary">
                                            Sauvegarder
                                        </button>
                                    </div>
                                </div>
                            </form>
                            {{-- Authentification à deux facteurs (2FA) --}}
                            <form action="{{ route('emprunteur.profil.2fa.setup') }}" method="post" class="kt-card">
                                @csrf
                                <div class="kt-card-header" id="auth_two_factor">
                                    <h3 class="kt-card-title">
                                        Authentification à deux facteurs (2FA)
                                    </h3>
                                </div>
                                <div class="kt-card-content">
                                    <div class="grid gap-5 mb-7">
                                        <div
                                            class="flex items-center justify-between flex-wrap border border-border rounded-xl gap-2 px-3.5 py-2.5">
                                            <div class="flex items-center flex-wrap gap-3.5">
                                                <div class="flex items-center">
                                                    <div class="relative size-[50px] shrink-0">
                                                        <svg class="w-full h-full stroke-border fill-muted/30"
                                                            fill="none" height="48" viewbox="0 0 44 48"
                                                            width="44" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M16 2.4641C19.7128 0.320509 24.2872 0.320508 28 2.4641L37.6506 8.0359C41.3634 10.1795 43.6506 14.141 43.6506
                                                                        18.4282V29.5718C43.6506 33.859 41.3634 37.8205 37.6506 39.9641L28 45.5359C24.2872 47.6795 19.7128 47.6795 16 45.5359L6.34937
                                                                        39.9641C2.63655 37.8205 0.349365 33.859 0.349365 29.5718V18.4282C0.349365 14.141 2.63655 10.1795 6.34937 8.0359L16 2.4641Z"
                                                                fill="">
                                                            </path>
                                                            <path
                                                                d="M16.25 2.89711C19.8081 0.842838 24.1919 0.842837 27.75 2.89711L37.4006 8.46891C40.9587 10.5232 43.1506 14.3196 43.1506
                                                                        18.4282V29.5718C43.1506 33.6804 40.9587 37.4768 37.4006 39.5311L27.75 45.1029C24.1919 47.1572 19.8081 47.1572 16.25 45.1029L6.59937
                                                                        39.5311C3.04125 37.4768 0.849365 33.6803 0.849365 29.5718V18.4282C0.849365 14.3196 3.04125 10.5232 6.59937 8.46891L16.25 2.89711Z"
                                                                stroke="">
                                                            </path>
                                                        </svg>
                                                        <div
                                                            class="absolute leading-none start-2/4 top-2/4 -translate-y-2/4 -translate-x-2/4 rtl:translate-x-2/4">
                                                            <i
                                                                class="ki-filled ki-sms text-xl text-muted-foreground">
                                                            </i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="flex flex-col gap-px">
                                                    <a class="text-sm font-medium text-mono hover:text-primary"
                                                        href="#">
                                                        Message Email
                                                    </a>
                                                    <span class="text-sm font-medium text-secondary-foreground">
                                                        Codes instantanés via Email pour une vérification sécurisée du compte.
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="flex items-center gap-2 lg:gap-6">
                                                <label class="kt-label">
                                                    Activer sur le profil
                                                    <input {{ Auth::user()->twoFactor ? 'checked' : '' }} class="kt-switch kt-switch-sm" name="twoFactor_email"
                                                        type="checkbox" value="1" />
                                                </label>
                                            </div>
                                        </div>
                                        <div
                                            class="bg-muted cursor-not-allowed flex items-center justify-between flex-wrap border border-border rounded-xl gap-2 px-3.5 py-2.5">
                                            <div class="flex items-center flex-wrap gap-3.5">
                                                <div class="flex items-center">
                                                    <div class="relative size-[50px] shrink-0">
                                                        <svg class="w-full h-full stroke-border fill-muted/30"
                                                            fill="none" height="48" viewbox="0 0 44 48"
                                                            width="44" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M16 2.4641C19.7128 0.320509 24.2872 0.320508 28 2.4641L37.6506 8.0359C41.3634 10.1795 43.6506 14.141 43.6506
                                                                        18.4282V29.5718C43.6506 33.859 41.3634 37.8205 37.6506 39.9641L28 45.5359C24.2872 47.6795 19.7128 47.6795 16 45.5359L6.34937
                                                                        39.9641C2.63655 37.8205 0.349365 33.859 0.349365 29.5718V18.4282C0.349365 14.141 2.63655 10.1795 6.34937 8.0359L16 2.4641Z"
                                                                fill="">
                                                            </path>
                                                            <path
                                                                d="M16.25 2.89711C19.8081 0.842838 24.1919 0.842837 27.75 2.89711L37.4006 8.46891C40.9587 10.5232 43.1506 14.3196 43.1506
                                                                        18.4282V29.5718C43.1506 33.6804 40.9587 37.4768 37.4006 39.5311L27.75 45.1029C24.1919 47.1572 19.8081 47.1572 16.25 45.1029L6.59937
                                                                        39.5311C3.04125 37.4768 0.849365 33.6803 0.849365 29.5718V18.4282C0.849365 14.3196 3.04125 10.5232 6.59937 8.46891L16.25 2.89711Z"
                                                                stroke="">
                                                            </path>
                                                        </svg>
                                                        <div
                                                            class="absolute leading-none start-2/4 top-2/4 -translate-y-2/4 -translate-x-2/4 rtl:translate-x-2/4">
                                                            <i
                                                                class="ki-filled ki-message-text-2 text-xl text-muted-foreground">
                                                            </i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="flex flex-col gap-px">
                                                    <a class="text-sm font-medium text-mono hover:text-primary">
                                                        Message texte (SMS)
                                                    </a>
                                                    <span class="text-sm font-medium text-secondary-foreground">
                                                        Instant codes for secure account verification.
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="flex items-center gap-2 lg:gap-6">
                                                <label class="kt-label">
                                                    Activer sur le profil
                                                    <input disabled class="kt-switch kt-switch-sm" name="check"
                                                        type="checkbox" value="1" />
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-full">
                                        <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5 mb-7">
                                            <label class="kt-form-label max-w-56">
                                                Mot de passe
                                            </label>
                                            <div class="flex flex-col tems-start grow gap-3 w-full">
                                                <input name="password" class="kt-input" placeholder="Entrer votre mot de passe" type="password" required>
                                                <span class="kt-form-description text-2sm">
                                                    Entrez votre mot de passe pour configurer l'authentification à deux facteurs.
                                                </span>
                                                </input>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex justify-end pt-2.5">
                                        <button type="submit" class="kt-btn kt-btn-primary">
                                            Sauvegarder
                                        </button>
                                    </div>
                                </div>
                            </form>
                            <style>
                                .singl-sign-on-bg {
                                    background-image: url("{{asset('assets/media/images/2600x1600/bg-2.png')}}");
                                }

                                .dark .singl-sign-on-bg {
                                    background-image: url("{{asset('assets/media/images/2600x1600/bg-2-dark.png')}}");
                                }
                            </style>
                            {{-- Mot de passe --}}
                            <form action="{{ route('emprunteur.profil.password.update') }}" method="post" class="kt-card">
                                @csrf
                                <div class="kt-card-header" id="auth_password">
                                    <h3 class="kt-card-title">
                                        Mot de passe
                                    </h3>
                                </div>
                                <div class="kt-card-content grid gap-5">
                                    <div class="w-full">
                                        <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                                            <label class="kt-form-label max-w-56">
                                                Mot de passe actuel
                                            </label>
                                            <input name="current_password" class="kt-input" placeholder="Votre mot de passe actuel" type="password"
                                                value="">
                                            </input>
                                        </div>
                                    </div>
                                    <div class="w-full">
                                        <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                                            <label class="kt-form-label max-w-56">
                                                Nouveau mot de passe
                                            </label>
                                            <input name="new_password" class="kt-input" placeholder="Nouveau mot de passe" type="password"
                                                value="">
                                            </input>
                                        </div>
                                    </div>
                                    <div class="w-full">
                                        <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                                            <label class="kt-form-label max-w-56">
                                                Confirmer le nouveau mot de passe
                                            </label>
                                            <input name="new_password_confirmation" class="kt-input" placeholder="Confirmer le nouveau mot de passe" type="password"
                                                value="">
                                            </input>
                                        </div>
                                    </div>
                                    <div class="flex justify-end pt-2.5">
                                        <button type="submit" class="kt-btn kt-btn-primary">
                                            Réinitialiser le mot de passe
                                        </button>
                                    </div>
                                </div>
                            </form>
                            <style>
                                .user-access-bg {
                                    background-image: url('/static/metronic/tailwind/dist/assets/media/images/2600x1200/bg-5.png');
                                }

                                .dark .user-access-bg {
                                    background-image: url('/static/metronic/tailwind/dist/assets/media/images/2600x1200/bg-5-dark.png');
                                }
                            </style>
                            {{-- Supprimer le compte --}}
                            <form action="{{ route('emprunteur.profil.delete') }}" method="POST" class="kt-card" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer définitivement votre compte ?');">
                                @csrf
                                @method('DELETE')
                                <div class="kt-card-header" id="delete_account">
                                    <h3 class="kt-card-title">
                                        Supprimer le compte
                                    </h3>
                                </div>
                                <div class="kt-card-content flex flex-col lg:py-7.5 lg:gap-7.5 gap-3">
                                    <div class="flex flex-col gap-5">
                                        <div class="text-sm text-foreground">
                                            Nous regrettons votre départ. Confirmez la suppression de votre compte ci-dessous. 
                                            Vos données seront définitivement supprimées. Nous vous remercions d'avoir fait partie de notre communauté. 
                                            Veuillez consulter 
                                            <a class="kt-link" href="#">
                                                nos directives d'installation 
                                            </a>
                                            si vous souhaitez continuer.
                                        </div>
                                        <label class="kt-label">
                                            <input class="kt-checkbox kt-checkbox-sm" name="delete" type="checkbox" value="1" required>
                                            Confirmer la suppression du compte
                                        </label>
                                    </div>
                                    <div class="flex justify-end gap-2.5">
                                        <a href="{{ route('emprunteur.profil.deactivate') }}" class="kt-btn kt-btn-outline">
                                            Désactiver plutôt
                                        </a>
                                        <button type="submit" class="kt-btn kt-btn-destructive">
                                            Supprimer le compte
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Container -->
    
    @php
        $type = session('success') ? 'success' : (session('error') || $errors->any() ? 'error' : null);
        $message = session('success') ?? session('error') ?? ($errors->any() ? $errors->first() : null);
    @endphp

    @if ($type && $message)
    <div id="floating-alert"
        class="fixed top-0 left-1/2 transform -translate-x-1/2 mt-6 z-100 px-6 py-4 rounded shadow-lg flex items-center gap-3
                transition-all duration-500 ease-in-out opacity-0 scale-95
                {{ $type === 'success' ? 'bg-green-100 border border-green-400 text-green-700' : 'bg-red-100 border border-red-400 text-red-700' }}">
        @if ($type === 'success')
            <svg xmlns="http://www.w3.org/2000/svg"
                class="h-6 w-6 text-green-700"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 12l2 2 4-4m5 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        @else
            <svg xmlns="http://www.w3.org/2000/svg"
                class="h-6 w-6 text-red-700"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M6 18L18 6M6 6l12 12" />
            </svg>
        @endif

        <span>{{ $message }}</span>
    </div>
    @endif
@endsection

@section('javascripts')
    <script src="{{ asset('assets/vendors/leaflet/leaflet.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/widgets/general.js') }}"></script>
    <script>
        window.onload = () => {
            const modalEl = KTDom.getElement('#modal_settings');
            const modal = KTModal.getInstance(modalEl);
            @if (!Auth::user()->is_profile_completed)
            modal?.show();
            @endif

            const alert = document.getElementById('floating-alert');
            if (alert) {
                // Affiche avec animation (scale + fade)
                setTimeout(() => {
                    alert.classList.remove('opacity-0', 'scale-95');
                    alert.classList.add('opacity-100', 'scale-100');
                }, 100); // petit délai pour trigger l'animation CSS

                // Masquer après 5 secondes
                setTimeout(() => {
                    alert.classList.remove('opacity-100', 'scale-100');
                    alert.classList.add('opacity-0', 'scale-95');

                    // Supprimer du DOM après disparition
                    setTimeout(() => {
                        alert.remove();
                    }, 500); // correspond à la durée de transition
                }, 5000);
            }
        };

        document.querySelector('select[name="diplome"]').addEventListener('change', function () {
            const selected = this.value;
            const filiereSelect = document.querySelector('select[name="filiere"]');
            
            fetch(`/emprunteur/filieres/${encodeURIComponent(selected)}`)
                .then(response => response.json())
                .then(data => {
                    filiereSelect.innerHTML = '';
                    data.forEach(filiere => {
                        const opt = document.createElement('option');
                        opt.value = filiere;
                        opt.textContent = filiere;
                        filiereSelect.appendChild(opt);
                    });
                });
        });
    </script>
@endsection
