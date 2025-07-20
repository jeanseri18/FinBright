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
                                General Info
                            </h3>
                            <div class="flex items-center gap-2">
                                <label class="kt-label">
                                    <input checked="" class="kt-switch kt-switch-sm" name="check" type="checkbox"
                                        value="1" />
                                    Public Profile
                                </label>
                            </div>
                        </div>
                        <div class="kt-card-table kt-scrollable-x-auto pb-3">
                            <table class="kt-table align-middle text-sm text-muted-foreground" id="general_info_table">
                                <tr>
                                    <td class="min-w-56 text-secondary-foreground font-normal">
                                        Company Name
                                    </td>
                                    <td class="min-w-48 w-full text-foreground font-normal">
                                        Hexlab
                                    </td>
                                    <td class="min-w-16 text-center">
                                        <a class="kt-btn kt-btn-sm kt-btn-icon kt-btn-ghost kt-btn-primary" href="#">
                                            <i class="ki-filled ki-notepad-edit">
                                            </i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-secondary-foreground font-normal">
                                        Phone number
                                    </td>
                                    <td class="text-foreground font-normal">
                                        +1 555-1234
                                    </td>
                                    <td class="text-center">
                                        <a class="kt-btn kt-btn-sm kt-btn-icon kt-btn-ghost kt-btn-primary" href="#">
                                            <i class="ki-filled ki-notepad-edit">
                                            </i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-secondary-foreground font-normal">
                                        VAT number
                                    </td>
                                    <td class="text-foreground font-normal">
                                        <span class="kt-badge kt-badge-sm kt-badge-outline kt-badge-destructive">
                                            Missing Details
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <a class="kt-link kt-link-underlined kt-link-dashed" href="#">
                                            Add
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-secondary-foreground font-normal">
                                        Registration number
                                    </td>
                                    <td class="text-foreground font-normal">
                                        IYS2023A56789
                                    </td>
                                    <td class="text-center">
                                        <a class="kt-btn kt-btn-sm kt-btn-icon kt-btn-ghost kt-btn-primary" href="#">
                                            <i class="ki-filled ki-notepad-edit">
                                            </i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-secondary-foreground font-normal">
                                        Remote Company ID
                                    </td>
                                    <td class="text-foreground text-sm font-normal">
                                        <div class="flex items-center gap-0.5">
                                            CID78901BXT2023
                                            <button class="kt-btn kt-btn-sm kt-btn-icon kt-btn-ghost">
                                                <i class="ki-filled ki-copy">
                                                </i>
                                            </button>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <a class="kt-btn kt-btn-sm kt-btn-icon kt-btn-ghost kt-btn-primary" href="#">
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
                                Account Settings
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
                                            john.doe@hexlad.io
                                        </a>
                                    </td>
                                    <td class="min-w-28 text-center">
                                        <a class="kt-btn kt-btn-sm kt-btn-icon kt-btn-ghost kt-btn-primary" href="#">
                                            <i class="ki-filled ki-notepad-edit">
                                            </i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-secondary-foreground font-normal">
                                        Password
                                    </td>
                                    <td class="text-secondary-foreground font-normal text-sm">
                                        Password last changed 2 months ago
                                    </td>
                                    <td class="text-center">
                                        <a class="kt-btn kt-btn-sm kt-btn-icon kt-btn-ghost kt-btn-primary" href="#">
                                            <i class="ki-filled ki-notepad-edit">
                                            </i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-secondary-foreground font-normal">
                                        Sign-in with
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
                                                <img alt="product logo" class="dark:hidden h-4"
                                                    src="{{ asset('assets/media/brand-logos/apple-black.svg') }}" />
                                                <img alt="product logo" class="light:hidden h-4"
                                                    src="{{ asset('assets/media/brand-logos/apple-white.svg') }}" />
                                            </a>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <a class="kt-link kt-link-underlined kt-link-dashed" href="#">
                                            Setup
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-secondary-foreground font-normal">
                                        Team Account
                                    </td>
                                    <td class="text-secondary-foreground text-sm font-normal">
                                        To be set
                                    </td>
                                    <td class="text-center">
                                        <a class="kt-btn kt-btn-sm kt-btn-icon kt-btn-ghost kt-btn-primary" href="#">
                                            <i class="ki-filled ki-notepad-edit">
                                            </i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-secondary-foreground font-normal">
                                        Social Profiles
                                    </td>
                                    <td>
                                        <div class="flex items-center gap-2.5">
                                            <a class="flex items-center justify-center size-8 bg-background rounded-full border border-input"
                                                href="#">
                                                <img alt="" class="size-4"
                                                    src="{{ asset('assets/media/brand-logos/linkedin.svg') }}" />
                                            </a>
                                            <a class="flex items-center justify-center size-8 bg-background rounded-full border border-input"
                                                href="#">
                                                <img alt="" class="size-4"
                                                    src="{{ asset('assets/media/brand-logos/twitch-purple.svg') }}" />
                                            </a>
                                            <a class="flex items-center justify-center size-8 bg-background rounded-full border border-input"
                                                href="#">
                                                <img alt="" class="dark:hidden size-4"
                                                    src="{{ asset('assets/media/brand-logos/x.svg') }}" />
                                                <img alt="" class="light:hidden size-4"
                                                    src="{{ asset('assets/media/brand-logos/x-dark.svg') }}" />
                                            </a>
                                            <a class="flex items-center justify-center size-8 bg-background rounded-full border border-input"
                                                href="#">
                                                <img alt="" class="size-4"
                                                    src="{{ asset('assets/media/brand-logos/dribbble.svg') }}" />
                                            </a>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <a class="kt-btn kt-btn-sm kt-btn-icon kt-btn-ghost kt-btn-primary"
                                            href="#">
                                            <i class="ki-filled ki-notepad-edit">
                                            </i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-secondary-foreground font-normal">
                                        Referral Link
                                    </td>
                                    <td class="text-foreground text-sm font-normal">
                                        <div class="flex items-center gap-0.5">
                                            <a class="text-secondary-foreground text-sm hover:text-primary"
                                                href="#">
                                                https://studio.co/W3gvQOI35dt
                                            </a>
                                            <button class="kt-btn kt-btn-sm kt-btn-icon kt-btn-ghost">
                                                <i class="ki-filled ki-copy">
                                                </i>
                                            </button>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <a class="kt-link kt-link-underlined kt-link-dashed" href="#">
                                            Re-create
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
                                            <a class="kt-menu-link" href="">
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
                                            <a class="kt-menu-link" data-kt-modal-toggle="#share_profile_modal"
                                                href="#">
                                                <span class="kt-menu-icon">
                                                    <i class="ki-filled ki-share">
                                                    </i>
                                                </span>
                                                <span class="kt-menu-title">
                                                    Share
                                                </span>
                                            </a>
                                        </div>
                                        <div class="kt-menu-item" data-kt-menu-item-offset="-15px, 0"
                                            data-kt-menu-item-placement="right-start" data-kt-menu-item-toggle="dropdown"
                                            data-kt-menu-item-trigger="click|lg:hover">
                                            <div class="kt-menu-link">
                                                <span class="kt-menu-icon">
                                                    <i class="ki-filled ki-notification-status">
                                                    </i>
                                                </span>
                                                <span class="kt-menu-title">
                                                    Notifications
                                                </span>
                                                <span class="kt-menu-arrow">
                                                    <i class="ki-filled ki-right text-xs rtl:transform rtl:rotate-180">
                                                    </i>
                                                </span>
                                            </div>
                                            <div class="kt-menu-dropdown kt-menu-default w-full max-w-[175px]">
                                                <div class="kt-menu-item">
                                                    <a class="kt-menu-link"
                                                        href="">
                                                        <span class="kt-menu-icon">
                                                            <i class="ki-filled ki-sms">
                                                            </i>
                                                        </span>
                                                        <span class="kt-menu-title">
                                                            Email
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="kt-menu-item">
                                                    <a class="kt-menu-link"
                                                        href="">
                                                        <span class="kt-menu-icon">
                                                            <i class="ki-filled ki-message-notify">
                                                            </i>
                                                        </span>
                                                        <span class="kt-menu-title">
                                                            SMS
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="kt-menu-item">
                                                    <a class="kt-menu-link"
                                                        href="">
                                                        <span class="kt-menu-icon">
                                                            <i class="ki-filled ki-notification-status">
                                                            </i>
                                                        </span>
                                                        <span class="kt-menu-title">
                                                            Push
                                                        </span>
                                                    </a>
                                                </div>
                                            </div>
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
                                        <div class="kt-menu-separator">
                                        </div>
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
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="kt-card-content">
                            <div class="grid gap-2.5 lg:gap-5">
                                <div class="flex items-center gap-3">
                                    <div class="flex items-center grow gap-2.5">
                                        <img src="{{asset('assets/media/file-types/pdf.svg')}}">
                                        <div class="flex flex-col">
                                            <span
                                                class="text-sm font-medium text-mono cursor-pointer hover:text-primary mb-px">
                                                Project-pitch.pdf
                                            </span>
                                            <span class="text-xs text-secondary-foreground">
                                                4.7
                                                MB 26 Sep 2024 3:20 PM
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
                                                            Details
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
                                                            Share
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
                                                            Export
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
                                                2.3 MB 1 Oct 2024 12:00 PM
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
                                                            Details
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
                                                            Share
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
                                                            Export
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
                                                Framework-App.js
                                            </span>
                                            <span class="text-xs text-secondary-foreground">
                                                0.8 MB 17 Oct 2024 6:46 PM
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
                                                            Details
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
                                                            Share
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
                                                            Export
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
                                                Mobile-logo.ai
                                            </span>
                                            <span class="text-xs text-secondary-foreground">
                                                0.2 MB 4 Nov 2024 11:30 AM
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
                                                            Details
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
                                                            Share
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
                                                            Export
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
                                href="/metronic/tailwind/demo2/account/integrations">
                                All Files
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
                                        Settings - Modal
                                    </h1>
                                    <div class="flex items-center gap-2 text-sm font-normal text-secondary-foreground">
                                        Dynamic,
                                        Focused Adjustment Interface
                                    </div>
                                </div>
                                <div class="flex items-center gap-2.5">
                                    <a class="kt-btn kt-btn-outline" data-kt-modal-dismiss="true" href="#">
                                        Close
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
                                        Basic Settings
                                    </a>
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
                                                Social Sign in
                                            </a>
                                            <a class="flex items-center rounded-lg pl-2.5 pr-2.5 py-2.5 gap-3.5 border border-transparent text-sm text-foreground hover:text-primary hover:font-medium kt-scrollspy-active:bg-secondary-active kt-scrollspy-active:text-primary kt-scrollspy-active:font-medium hover:rounded-lg"
                                                data-kt-scrollspy-anchor="true" href="#auth_two_factor">
                                                <span
                                                    class="flex w-1.5 relative before:absolute before:top-0 before:size-1.5 before:rounded-full before:-translate-x-2/4 before:-translate-y-2/4 kt-scrollspy-active:before:bg-primary">
                                                </span>
                                                Two-Factor auth(2FA)
                                            </a>
                                            <a class="flex items-center rounded-lg pl-2.5 pr-2.5 py-2.5 gap-3.5 border border-transparent text-sm text-foreground hover:text-primary hover:font-medium kt-scrollspy-active:bg-secondary-active kt-scrollspy-active:text-primary kt-scrollspy-active:font-medium hover:rounded-lg"
                                                data-kt-scrollspy-anchor="true" href="#auth_social_sign_in_sso">
                                                <span
                                                    class="flex w-1.5 relative before:absolute before:top-0 before:size-1.5 before:rounded-full before:-translate-x-2/4 before:-translate-y-2/4 kt-scrollspy-active:before:bg-primary">
                                                </span>
                                                Single Sign On(SSO)
                                            </a>
                                            <a class="flex items-center rounded-lg pl-2.5 pr-2.5 py-2.5 gap-3.5 border border-transparent text-sm text-foreground hover:text-primary hover:font-medium kt-scrollspy-active:bg-secondary-active kt-scrollspy-active:text-primary kt-scrollspy-active:font-medium hover:rounded-lg"
                                                data-kt-scrollspy-anchor="true" href="#auth_password">
                                                <span
                                                    class="flex w-1.5 relative before:absolute before:top-0 before:size-1.5 before:rounded-full before:-translate-x-2/4 before:-translate-y-2/4 kt-scrollspy-active:before:bg-primary">
                                                </span>
                                                Password
                                            </a>
                                        </div>
                                    </div>
                                    <div class="flex flex-col">
                                        <div class="pl-6 pr-2.5 py-2.5 text-sm font-semibold text-mono">
                                            Advanced Settings
                                        </div>
                                        <div class="flex flex-col">
                                            <a class="flex items-center rounded-lg pl-2.5 pr-2.5 py-2.5 gap-3.5 border border-transparent text-sm text-foreground hover:text-primary hover:font-medium kt-scrollspy-active:bg-secondary-active kt-scrollspy-active:text-primary kt-scrollspy-active:font-medium hover:rounded-lg"
                                                data-kt-scrollspy-anchor="true" href="#advanced_settings_preferences">
                                                <span
                                                    class="flex w-1.5 relative before:absolute before:top-0 before:size-1.5 before:rounded-full before:-translate-x-2/4 before:-translate-y-2/4 kt-scrollspy-active:before:bg-primary">
                                                </span>
                                                Preferences
                                            </a>
                                            <a class="flex items-center rounded-lg pl-2.5 pr-2.5 py-2.5 gap-3.5 border border-transparent text-sm text-foreground hover:text-primary hover:font-medium kt-scrollspy-active:bg-secondary-active kt-scrollspy-active:text-primary kt-scrollspy-active:font-medium hover:rounded-lg"
                                                data-kt-scrollspy-anchor="true" href="#advanced_settings_appearance">
                                                <span
                                                    class="flex w-1.5 relative before:absolute before:top-0 before:size-1.5 before:rounded-full before:-translate-x-2/4 before:-translate-y-2/4 kt-scrollspy-active:before:bg-primary">
                                                </span>
                                                Appearance
                                            </a>
                                            <a class="flex items-center rounded-lg pl-2.5 pr-2.5 py-2.5 gap-3.5 border border-transparent text-sm text-foreground hover:text-primary hover:font-medium kt-scrollspy-active:bg-secondary-active kt-scrollspy-active:text-primary kt-scrollspy-active:font-medium hover:rounded-lg"
                                                data-kt-scrollspy-anchor="true" href="#advanced_settings_notifications">
                                                <span
                                                    class="flex w-1.5 relative before:absolute before:top-0 before:size-1.5 before:rounded-full before:-translate-x-2/4 before:-translate-y-2/4 kt-scrollspy-active:before:bg-primary">
                                                </span>
                                                Notifications
                                            </a>
                                            <a class="flex items-center rounded-lg pl-2.5 pr-2.5 py-2.5 gap-3.5 border border-transparent text-sm text-foreground hover:text-primary hover:font-medium kt-scrollspy-active:bg-secondary-active kt-scrollspy-active:text-primary kt-scrollspy-active:font-medium hover:rounded-lg"
                                                data-kt-scrollspy-anchor="true" href="#advanced_settings_address">
                                                <span
                                                    class="flex w-1.5 relative before:absolute before:top-0 before:size-1.5 before:rounded-full before:-translate-x-2/4 before:-translate-y-2/4 kt-scrollspy-active:before:bg-primary">
                                                </span>
                                                Address
                                            </a>
                                        </div>
                                    </div>
                                    <div class="flex flex-col">
                                        <div class="pl-6 pr-2.5 py-2.5 text-sm font-semibold text-mono">
                                            External Services
                                        </div>
                                        <div class="flex flex-col">
                                            <a class="flex items-center rounded-lg pl-2.5 pr-2.5 py-2.5 gap-3.5 border border-transparent text-sm text-foreground hover:text-primary hover:font-medium kt-scrollspy-active:bg-secondary-active kt-scrollspy-active:text-primary kt-scrollspy-active:font-medium hover:rounded-lg"
                                                data-kt-scrollspy-anchor="true" href="#external_services_manage_api">
                                                <span
                                                    class="flex w-1.5 relative before:absolute before:top-0 before:size-1.5 before:rounded-full before:-translate-x-2/4 before:-translate-y-2/4 kt-scrollspy-active:before:bg-primary">
                                                </span>
                                                Manage API
                                            </a>
                                            <a class="flex items-center rounded-lg pl-2.5 pr-2.5 py-2.5 gap-3.5 border border-transparent text-sm text-foreground hover:text-primary hover:font-medium kt-scrollspy-active:bg-secondary-active kt-scrollspy-active:text-primary kt-scrollspy-active:font-medium hover:rounded-lg"
                                                data-kt-scrollspy-anchor="true" href="#external_services_integrations">
                                                <span
                                                    class="flex w-1.5 relative before:absolute before:top-0 before:size-1.5 before:rounded-full before:-translate-x-2/4 before:-translate-y-2/4 kt-scrollspy-active:before:bg-primary">
                                                </span>
                                                Integrations
                                            </a>
                                        </div>
                                    </div>
                                    <a class="flex items-center rounded-lg pl-2.5 pr-2.5 py-2.5 gap-1.5 border border-transparent text-sm text-foreground hover:text-primary hover:font-medium kt-scrollspy-active:bg-secondary-active kt-scrollspy-active:text-primary kt-scrollspy-active:font-medium hover:rounded-lg"
                                        data-kt-scrollspy-anchor="true" href="#delete_account">
                                        <span
                                            class="flex w-1.5 relative before:absolute before:top-0 before:size-1.5 before:rounded-full before:-translate-x-2/4 before:-translate-y-2/4 kt-scrollspy-active:before:bg-primary">
                                        </span>
                                        Delete Account
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col items-stretch grow gap-5 lg:gap-7.5">
                            <div class="kt-card pb-2.5">
                                <div class="kt-card-header" id="basic_settings">
                                    <h3 class="kt-card-title">
                                    </h3>
                                    <div class="flex items-center gap-2">
                                        <label class="kt-label">
                                            Public Profile
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
                                                        Click to remove or revert
                                                    </span>
                                                </button>
                                                <div class="kt-image-input-placeholder border-2 border-green-500 kt-image-input-empty:border-input"
                                                    data-kt-image-input-placeholder="true"
                                                    style="background-image:url({{asset('assets/media/avatars/blank.png')}})">
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
                                                </input>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                                        <label class="kt-form-label max-w-56">
                                            Name
                                        </label>
                                        <input class="kt-input" type="text" value="Jason Tatum" />
                                    </div>
                                    <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                                        <label class="kt-form-label max-w-56">
                                            Phone number
                                        </label>
                                        <input class="kt-input" placeholder="Phone number" type="text" value="" />
                                    </div>
                                    <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                                        <label class="kt-form-label max-w-56">
                                            Email
                                        </label>
                                        <input class="kt-input" type="text" value="jason@studio.io" />
                                    </div>
                                    <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                                        <label class="kt-form-label max-w-56">
                                            Address
                                        </label>
                                        <input class="kt-input" placeholder="" type="text"
                                            value="Avinguda Imaginària, 789" />
                                    </div>
                                    <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                                        <label class="kt-form-label max-w-56">
                                            Country
                                        </label>
                                        <select class="kt-select {class if class else ''}" data-kt-select="true"
                                            data-kt-select-config='{
                                                    "optionsClass": "kt-scrollable overflow-auto max-h-[250px]",
                                                    "displayTemplate": "&lt;div class=\"flex items-center leading-none gap-2\"&gt;{ flag }&lt;span class=\"text-foreground\"&gt;{ text }&lt;/span&gt;&lt;/div&gt;",
                                                    "optionTemplate": "&lt;div class=\"flex items-center leading-none gap-2\"&gt;{ flag } &lt;span class=\"text-foreground\"&gt;{ text }&lt;/span&gt;&lt;/div&gt;&lt;svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\" class=\"size-3.5 ms-auto hidden text-primary kt-select-option-selected:block\"&gt;&lt;path d=\"M20 6 9 17l-5-5\"/&gt;&lt;/svg&gt;&lt;/div&gt;"
                                                }'
                                            data-kt-select-enable-search="true"
                                            data-kt-select-placeholder="Select a country..."
                                            data-kt-select-search-placeholder="Search...">
                                            <option data-kt-select-option='{"flag": "🇦🇫"}' value="Afghanistan">
                                                Afghanistan
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇦🇱"}' value="Albania">
                                                Albania
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇩🇿"}' value="Algeria">
                                                Algeria
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇦🇩"}' value="Andorra">
                                                Andorra
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇦🇴"}' value="Angola">
                                                Angola
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇦🇬"}' value="Antigua and Barbuda">
                                                Antigua and Barbuda
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇦🇷"}' value="Argentina">
                                                Argentina
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇦🇲"}' value="Armenia">
                                                Armenia
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇦🇺"}' value="Australia">
                                                Australia
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇦🇹"}' value="Austria">
                                                Austria
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇦🇿"}' value="Azerbaijan">
                                                Azerbaijan
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇧🇸"}' value="Bahamas">
                                                Bahamas
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇧🇭"}' value="Bahrain">
                                                Bahrain
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇧🇩"}' value="Bangladesh">
                                                Bangladesh
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇧🇧"}' value="Barbados">
                                                Barbados
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇧🇾"}' value="Belarus">
                                                Belarus
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇧🇪"}' value="Belgium">
                                                Belgium
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇧🇿"}' value="Belize">
                                                Belize
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇧🇯"}' value="Benin">
                                                Benin
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇧🇹"}' value="Bhutan">
                                                Bhutan
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇧🇴"}' value="Bolivia">
                                                Bolivia
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇧🇦"}' value="Bosnia and Herzegovina">
                                                Bosnia and Herzegovina
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇧🇼"}' value="Botswana">
                                                Botswana
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇧🇷"}' value="Brazil">
                                                Brazil
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇧🇳"}' value="Brunei">
                                                Brunei
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇧🇬"}' value="Bulgaria">
                                                Bulgaria
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇧🇫"}' value="Burkina Faso">
                                                Burkina Faso
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇧🇮"}' value="Burundi">
                                                Burundi
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇨🇻"}' value="Cabo Verde">
                                                Cabo Verde
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇰🇭"}' value="Cambodia">
                                                Cambodia
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇨🇲"}' value="Cameroon">
                                                Cameroon
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇨🇦"}' value="Canada">
                                                Canada
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇨🇫"}'
                                                value="Central African Republic">
                                                Central African Republic
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇹🇩"}' value="Chad">
                                                Chad
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇨🇱"}' value="Chile">
                                                Chile
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇨🇳"}' value="China">
                                                China
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇨🇴"}' value="Colombia">
                                                Colombia
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇰🇲"}' value="Comoros">
                                                Comoros
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇨🇬"}'
                                                value="Congo (Congo-Brazzaville)">
                                                Congo (Congo-Brazzaville)
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇨🇷"}' value="Costa Rica">
                                                Costa Rica
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇭🇷"}' value="Croatia">
                                                Croatia
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇨🇺"}' value="Cuba">
                                                Cuba
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇨🇾"}' value="Cyprus">
                                                Cyprus
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇨🇿"}' value="Czechia">
                                                Czechia
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇨🇩"}'
                                                value="Democratic Republic of the Congo">
                                                Democratic Republic of the Congo
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇩🇰"}' value="Denmark">
                                                Denmark
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇩🇯"}' value="Djibouti">
                                                Djibouti
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇩🇲"}' value="Dominica">
                                                Dominica
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇩🇴"}' value="Dominican Republic">
                                                Dominican Republic
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇪🇨"}' value="Ecuador">
                                                Ecuador
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇪🇬"}' value="Egypt">
                                                Egypt
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇸🇻"}' value="El Salvador">
                                                El Salvador
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇬🇶"}' value="Equatorial Guinea">
                                                Equatorial Guinea
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇪🇷"}' value="Eritrea">
                                                Eritrea
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇪🇪"}' value="Estonia">
                                                Estonia
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇸🇿"}' value="Eswatini">
                                                Eswatini
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇪🇹"}' value="Ethiopia">
                                                Ethiopia
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇫🇯"}' value="Fiji">
                                                Fiji
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇫🇮"}' value="Finland">
                                                Finland
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇫🇷"}' value="France">
                                                France
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇬🇦"}' value="Gabon">
                                                Gabon
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇬🇲"}' value="Gambia">
                                                Gambia
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇬🇪"}' value="Georgia">
                                                Georgia
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇩🇪"}' value="Germany">
                                                Germany
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇬🇭"}' value="Ghana">
                                                Ghana
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇬🇷"}' value="Greece">
                                                Greece
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇬🇩"}' value="Grenada">
                                                Grenada
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇬🇹"}' value="Guatemala">
                                                Guatemala
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇬🇳"}' value="Guinea">
                                                Guinea
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇬🇼"}' value="Guinea-Bissau">
                                                Guinea-Bissau
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇬🇾"}' value="Guyana">
                                                Guyana
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇭🇹"}' value="Haiti">
                                                Haiti
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇭🇳"}' value="Honduras">
                                                Honduras
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇭🇺"}' value="Hungary">
                                                Hungary
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇮🇸"}' value="Iceland">
                                                Iceland
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇮🇳"}' value="India">
                                                India
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇮🇩"}' value="Indonesia">
                                                Indonesia
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇮🇷"}' value="Iran">
                                                Iran
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇮🇶"}' value="Iraq">
                                                Iraq
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇮🇪"}' value="Ireland">
                                                Ireland
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇮🇱"}' value="Israel">
                                                Israel
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇮🇹"}' value="Italy">
                                                Italy
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇯🇲"}' value="Jamaica">
                                                Jamaica
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇯🇵"}' value="Japan">
                                                Japan
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇯🇴"}' value="Jordan">
                                                Jordan
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇰🇿"}' value="Kazakhstan">
                                                Kazakhstan
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇰🇪"}' value="Kenya">
                                                Kenya
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇰🇮"}' value="Kiribati">
                                                Kiribati
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇰🇼"}' value="Kuwait">
                                                Kuwait
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇰🇬"}' value="Kyrgyzstan">
                                                Kyrgyzstan
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇱🇦"}' value="Laos">
                                                Laos
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇱🇻"}' value="Latvia">
                                                Latvia
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇱🇧"}' value="Lebanon">
                                                Lebanon
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇱🇸"}' value="Lesotho">
                                                Lesotho
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇱🇷"}' value="Liberia">
                                                Liberia
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇱🇾"}' value="Libya">
                                                Libya
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇱🇮"}' value="Liechtenstein">
                                                Liechtenstein
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇱🇹"}' value="Lithuania">
                                                Lithuania
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇱🇺"}' value="Luxembourg">
                                                Luxembourg
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇲🇬"}' value="Madagascar">
                                                Madagascar
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇲🇼"}' value="Malawi">
                                                Malawi
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇲🇾"}' value="Malaysia">
                                                Malaysia
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇲🇻"}' value="Maldives">
                                                Maldives
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇲🇱"}' value="Mali">
                                                Mali
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇲🇹"}' value="Malta">
                                                Malta
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇲🇭"}' value="Marshall Islands">
                                                Marshall Islands
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇲🇷"}' value="Mauritania">
                                                Mauritania
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇲🇺"}' value="Mauritius">
                                                Mauritius
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇲🇽"}' value="Mexico">
                                                Mexico
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇫🇲"}' value="Micronesia">
                                                Micronesia
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇲🇩"}' value="Moldova">
                                                Moldova
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇲🇨"}' value="Monaco">
                                                Monaco
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇲🇳"}' value="Mongolia">
                                                Mongolia
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇲🇪"}' value="Montenegro">
                                                Montenegro
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇲🇦"}' value="Morocco">
                                                Morocco
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇲🇿"}' value="Mozambique">
                                                Mozambique
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇲🇲"}' value="Myanmar">
                                                Myanmar
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇳🇦"}' value="Namibia">
                                                Namibia
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇳🇷"}' value="Nauru">
                                                Nauru
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇳🇵"}' value="Nepal">
                                                Nepal
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇳🇱"}' value="Netherlands">
                                                Netherlands
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇳🇿"}' value="New Zealand">
                                                New Zealand
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇳🇮"}' value="Nicaragua">
                                                Nicaragua
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇳🇪"}' value="Niger">
                                                Niger
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇳🇬"}' value="Nigeria">
                                                Nigeria
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇰🇵"}' value="North Korea">
                                                North Korea
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇲🇰"}' value="North Macedonia">
                                                North Macedonia
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇳🇴"}' value="Norway">
                                                Norway
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇴🇲"}' value="Oman">
                                                Oman
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇵🇰"}' value="Pakistan">
                                                Pakistan
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇵🇼"}' value="Palau">
                                                Palau
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇵🇸"}' value="Palestine">
                                                Palestine
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇵🇦"}' value="Panama">
                                                Panama
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇵🇬"}' value="Papua New Guinea">
                                                Papua New Guinea
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇵🇾"}' value="Paraguay">
                                                Paraguay
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇵🇪"}' value="Peru">
                                                Peru
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇵🇭"}' value="Philippines">
                                                Philippines
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇵🇱"}' value="Poland">
                                                Poland
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇵🇹"}' value="Portugal">
                                                Portugal
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇶🇦"}' value="Qatar">
                                                Qatar
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇷🇴"}' value="Romania">
                                                Romania
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇷🇺"}' value="Russia">
                                                Russia
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇷🇼"}' value="Rwanda">
                                                Rwanda
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇰🇳"}' value="Saint Kitts and Nevis">
                                                Saint Kitts and Nevis
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇱🇨"}' value="Saint Lucia">
                                                Saint Lucia
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇻🇨"}'
                                                value="Saint Vincent and the Grenadines">
                                                Saint Vincent and the Grenadines
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇼🇸"}' value="Samoa">
                                                Samoa
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇸🇲"}' value="San Marino">
                                                San Marino
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇸🇹"}' value="Sao Tome and Principe">
                                                Sao Tome and Principe
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇸🇦"}' value="Saudi Arabia">
                                                Saudi Arabia
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇸🇳"}' value="Senegal">
                                                Senegal
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇷🇸"}' value="Serbia">
                                                Serbia
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇸🇨"}' value="Seychelles">
                                                Seychelles
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇸🇱"}' value="Sierra Leone">
                                                Sierra Leone
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇸🇬"}' value="Singapore">
                                                Singapore
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇸🇰"}' value="Slovakia">
                                                Slovakia
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇸🇮"}' value="Slovenia">
                                                Slovenia
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇸🇧"}' value="Solomon Islands">
                                                Solomon Islands
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇸🇴"}' value="Somalia">
                                                Somalia
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇿🇦"}' value="South Africa">
                                                South Africa
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇰🇷"}' value="South Korea">
                                                South Korea
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇸🇸"}' value="South Sudan">
                                                South Sudan
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇪🇸"}' value="Spain">
                                                Spain
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇱🇰"}' value="Sri Lanka">
                                                Sri Lanka
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇸🇩"}' value="Sudan">
                                                Sudan
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇸🇷"}' value="Suriname">
                                                Suriname
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇸🇪"}' value="Sweden">
                                                Sweden
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇨🇭"}' value="Switzerland">
                                                Switzerland
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇸🇾"}' value="Syria">
                                                Syria
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇹🇼"}' value="Taiwan">
                                                Taiwan
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇹🇯"}' value="Tajikistan">
                                                Tajikistan
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇹🇿"}' value="Tanzania">
                                                Tanzania
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇹🇭"}' value="Thailand">
                                                Thailand
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇹🇱"}' value="Timor-Leste">
                                                Timor-Leste
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇹🇬"}' value="Togo">
                                                Togo
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇹🇴"}' value="Tonga">
                                                Tonga
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇹🇹"}' value="Trinidad and Tobago">
                                                Trinidad and Tobago
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇹🇳"}' value="Tunisia">
                                                Tunisia
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇹🇷"}' value="Turkey">
                                                Turkey
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇹🇲"}' value="Turkmenistan">
                                                Turkmenistan
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇹🇻"}' value="Tuvalu">
                                                Tuvalu
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇺🇬"}' value="Uganda">
                                                Uganda
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇺🇦"}' value="Ukraine">
                                                Ukraine
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇦🇪"}' value="United Arab Emirates">
                                                United Arab Emirates
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇬🇧"}' value="United Kingdom">
                                                United Kingdom
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇺🇸"}' value="United States">
                                                United States
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇺🇾"}' value="Uruguay">
                                                Uruguay
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇺🇿"}' value="Uzbekistan">
                                                Uzbekistan
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇻🇺"}' value="Vanuatu">
                                                Vanuatu
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇻🇦"}' value="Vatican City">
                                                Vatican City
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇻🇪"}' value="Venezuela">
                                                Venezuela
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇻🇳"}' value="Vietnam">
                                                Vietnam
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇾🇪"}' value="Yemen">
                                                Yemen
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇿🇲"}' value="Zambia">
                                                Zambia
                                            </option>
                                            <option data-kt-select-option='{"flag": "🇿🇼"}' value="Zimbabwe">
                                                Zimbabwe
                                            </option>
                                        </select>
                                    </div>
                                    <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                                        <label class="kt-form-label max-w-56">
                                            State
                                        </label>
                                        <input class="kt-input" placeholder="State" type="text" value="" />
                                    </div>
                                    <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                                        <label class="kt-form-label max-w-56">
                                            City
                                        </label>
                                        <input class="kt-input" type="text" value="Barcelona" />
                                    </div>
                                    <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5 mb-2.5">
                                        <label class="kt-form-label max-w-56">
                                            Postcode
                                        </label>
                                        <input class="kt-input" type="text" value="08012" />
                                    </div>
                                    <div class="flex justify-end">
                                        <button class="kt-btn kt-btn-primary">
                                            Save Changes
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="kt-card pb-2.5">
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
                                            <div class="flex flex-col tems-start grow gap-7.5 w-full">
                                                <input class="kt-input" type="text" value="jason@studio.io">
                                                <div class="flex items-center gap-7.5">
                                                    <label class="kt-label">
                                                        Active
                                                        <input checked="" class="kt-switch" type="checkbox"
                                                            value="1" />
                                                    </label>
                                                    <label class="kt-label">
                                                        Primary
                                                        <input class="kt-switch" type="checkbox" value="2" />
                                                    </label>
                                                </div>
                                                <span class="kt-form-description text-2sm">
                                                    Input your email, designate as primary for priority updates. Toggle to
                                                    seamlessly customize
                                                    <br />
                                                    your communication preferences
                                                </span>
                                                </input>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex justify-end">
                                        <button class="kt-btn kt-btn-primary">
                                            Save Changes
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="kt-card">
                                <div class="kt-card-header" id="auth_social_sign_in">
                                    <h3 class="kt-card-title">
                                        Social Sign in
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
                                                        jasontatum@ktstudio.io
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
                                                    src="{{asset('assets/media/brand-logos/linkedin.svg')}}" />
                                                <div class="flex flex-col gap-0.5">
                                                    <a class="text-sm font-medium text-mono hover:text-primary"
                                                        href="#">
                                                        Linkedin
                                                    </a>
                                                    <a class="text-sm text-secondary-foreground hover:text-primary"
                                                        href="#">
                                                        jasontt@keenthemes.co
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
                                    <div class="flex flex-col gap-2.5 mb-5">
                                        <div class="text-base font-medium text-mono">
                                            More Social Sign in options
                                        </div>
                                        <div class="kt-form-description text-2sm">
                                            Effortless access awaits! Connect seamlessly with your preferred social account.
                                        </div>
                                    </div>
                                    <div class="flex items-center flex-wrap gap-2.5 mb-7.5">
                                        <a class="kt-btn kt-btn-outline" href="#">
                                            <img alt="" class="dark:hidden size-5"
                                                src="{{asset('assets/media/brand-logos/apple-black.svg')}}" />
                                            <img alt="" class="light:hidden size-5"
                                                src="{{asset('assets/media/brand-logos/apple-white.svg')}}" />
                                            Sign in with Apple
                                        </a>
                                        <a class="kt-btn kt-btn-outline" href="#">
                                            <img alt="" class="size-5"
                                                src="{{asset('assets/media/brand-logos/microsoft-5.svg')}}" />
                                            Sign in with Microsoft
                                        </a>
                                        <a class="kt-btn kt-btn-outline" href="#">
                                            <img alt="" class="size-5"
                                                src="{{asset('assets/media/brand-logos/facebook.svg')}}" />
                                            Sign in with Facebook
                                        </a>
                                    </div>
                                    <div class="flex justify-end">
                                        <button class="kt-btn kt-btn-primary">
                                            Save Changes
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="kt-card">
                                <div class="kt-card-header" id="auth_two_factor">
                                    <h3 class="kt-card-title">
                                        Two-Factor authentication(2FA)
                                    </h3>
                                    <div class="kt-menu" data-kt-menu="true">
                                        <div class="kt-menu-item" data-kt-menu-item-offset="0, 10px"
                                            data-kt-menu-item-placement="bottom-end"
                                            data-kt-menu-item-placement-rtl="bottom-start"
                                            data-kt-menu-item-toggle="dropdown" data-kt-menu-item-trigger="click">
                                            <button class="kt-menu-toggle kt-btn kt-btn-sm kt-btn-icon kt-btn-ghost">
                                                <i class="ki-filled ki-dots-vertical text-lg">
                                                </i>
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
                                                                class="ki-filled ki-message-text-2 text-xl text-muted-foreground">
                                                            </i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="flex flex-col gap-px">
                                                    <a class="text-sm font-medium text-mono hover:text-primary"
                                                        href="#">
                                                        Text Message (SMS)
                                                    </a>
                                                    <span class="text-sm font-medium text-secondary-foreground">
                                                        Instant codes for secure account verification.
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="flex items-center gap-2 lg:gap-6">
                                                <label class="kt-label">
                                                    Public Profile
                                                    <input checked="" class="kt-switch kt-switch-sm" name="check"
                                                        type="checkbox" value="1" />
                                                </label>
                                            </div>
                                        </div>
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
                                                            <i class="ki-filled ki-shield-tick text-xl text-muted-foreground">
                                                            </i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="flex flex-col gap-px">
                                                    <a class="text-sm font-medium text-mono hover:text-primary"
                                                        href="#">
                                                        Authenticator App (TOTP)
                                                    </a>
                                                    <span class="text-sm font-medium text-secondary-foreground">
                                                        Elevate protection with an authenticator app for two-factor
                                                        authentication.
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="flex items-center gap-2 lg:gap-6">
                                                <label class="kt-label">
                                                    Public Profile
                                                    <input class="kt-switch kt-switch-sm" name="check" type="checkbox"
                                                        value="1" />
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-full">
                                        <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5 mb-7">
                                            <label class="kt-form-label max-w-56">
                                                Password
                                            </label>
                                            <div class="flex flex-col tems-start grow gap-3 w-full">
                                                <input class="kt-input" placeholder="Enter password" type="text">
                                                <span class="kt-form-description text-2sm">
                                                    Enter your password to setup Two-Factor authentication
                                                </span>
                                                </input>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex justify-end pt-2.5">
                                        <button class="kt-btn kt-btn-primary">
                                            Setup
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <style>
                                .singl-sign-on-bg {
                                    background-image: url('/static/metronic/tailwind/dist/assets/media/images/2600x1600/bg-2.png');
                                }

                                .dark .singl-sign-on-bg {
                                    background-image: url('/static/metronic/tailwind/dist/assets/media/images/2600x1600/bg-2-dark.png');
                                }
                            </style>
                            <div class="kt-card">
                                <div class="kt-card-header" id="auth_social_sign_in_sso">
                                    <h3 class="kt-card-title">
                                        Single Sign On(SSO)
                                    </h3>
                                </div>
                                <div class="kt-card-content flex flex-col gap-7.5">
                                    <div class="grid gap-7">
                                        <div class="text-base font-semibold text-mono">
                                            1. Select SSO integration Type
                                        </div>
                                        <div class="grid grid-cols-1 lg:grid-cols-3 gap-5 lg:gap-7.5">
                                            <label
                                                class="flex align-stretch cursor-pointer bg-center h-44 bg-no-repeat border border-input rounded-xl border-dashed has-checked:border-primary bg-[length:500px] sso-active singl-sign-on-bg">
                                                <div
                                                    class="flex flex-col place-items-center place-content-center rounded-xl grow">
                                                    <div class="flex items-center h-11">
                                                        <img alt="" class="w-5"
                                                            src="/static/metronic/tailwind/dist/assets/media/brand-logos/azure.svg" />
                                                    </div>
                                                    <span class="text-base font-medium text-mono">
                                                        Microsoft Azure
                                                    </span>
                                                    <input class="appearance-none" name="sso_option" type="radio"
                                                        value="1" />
                                                </div>
                                            </label>
                                            <label
                                                class="flex align-stretch cursor-pointer bg-center h-44 bg-no-repeat border border-input rounded-xl border-dashed has-checked:border-primary bg-[length:500px] sso-active singl-sign-on-bg">
                                                <div
                                                    class="flex flex-col place-items-center place-content-center rounded-xl grow">
                                                    <div class="flex items-center h-11">
                                                        <img alt="" class="w-8"
                                                            src="/static/metronic/tailwind/dist/assets/media/brand-logos/google.svg" />
                                                    </div>
                                                    <span class="text-base font-medium text-mono">
                                                        Google
                                                    </span>
                                                    <input checked="" class="appearance-none" name="sso_option"
                                                        type="radio" value="1" />
                                                </div>
                                            </label>
                                            <label
                                                class="flex align-stretch cursor-pointer bg-center h-44 bg-no-repeat border border-input rounded-xl border-dashed has-checked:border-primary bg-[length:500px] sso-active singl-sign-on-bg">
                                                <div
                                                    class="flex flex-col place-items-center place-content-center rounded-xl grow">
                                                    <div class="flex items-center h-11">
                                                        <img alt="" class="w-24"
                                                            src="/static/metronic/tailwind/dist/assets/media/brand-logos/openid.svg" />
                                                    </div>
                                                    <span class="text-base font-medium text-mono">
                                                        OpenID Connect
                                                    </span>
                                                    <input class="appearance-none" name="sso_option" type="radio"
                                                        value="1" />
                                                </div>
                                            </label>
                                        </div>
                                        <style>
                                            .sso-active:has(:checked) {
                                                background-image: url('/static/metronic/tailwind/dist/assets/media/images/2600x1600/bg-1.png');
                                            }

                                            .dark .sso-active:has(:checked) {
                                                background-image: url('/static/metronic/tailwind/dist/assets/media/images/2600x1600/bg-1-dark.png');
                                            }
                                        </style>
                                    </div>
                                    <div class="border-b border-border">
                                    </div>
                                    <div class="grid gap-7">
                                        <div class="text-base font-semibold text-mono">
                                            2. Configure Google authentication
                                        </div>
                                        <div class="w-full">
                                            <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                                                <label class="kt-form-label max-w-56">
                                                    Client ID
                                                </label>
                                                <input class="kt-input" type="text" value="02874374-367145773">
                                                </input>
                                            </div>
                                        </div>
                                        <div class="w-full">
                                            <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                                                <label class="kt-form-label max-w-56">
                                                    Client Secret
                                                </label>
                                                <input class="kt-input" type="text"
                                                    value="23djfn784957f8022we2232307822-cey2442">
                                                </input>
                                            </div>
                                        </div>
                                        <div class="flex justify-end">
                                            <button class="kt-btn kt-btn-primary">
                                                Save Changes
                                            </button>
                                        </div>
                                    </div>
                                    <div class="border-b border-border">
                                    </div>
                                    <div class="grid gap-7">
                                        <div class="text-base font-semibold text-mono">
                                            3. Note down custom URL for Google SSO authentication
                                        </div>
                                        <div class="w-full">
                                            <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                                                <label class="kt-form-label max-w-56">
                                                    Custom Login UTL
                                                </label>
                                                <div class="grow">
                                                    <div class="kt-input-group">
                                                        <input class="kt-input" type="text"
                                                            value="https://devs.keenthemes.com/rl/AirMikeStudios">
                                                        <span class="kt-btn kt-btn-primary">
                                                            Copy
                                                        </span>
                                                        </input>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="border-b border-border">
                                    </div>
                                    <div class="kt-form-description pb-5 text-2sm">
                                        Single Sign-On (SSO) authentication streamlines access across
                                        multiple platforms. Users log in once, gaining seamless entry
                                        <br />
                                        to various systems without repetitive credentials.
                                    </div>
                                </div>
                            </div>
                            <div class="kt-card">
                                <div class="kt-card-header" id="auth_password">
                                    <h3 class="kt-card-title">
                                        Password
                                    </h3>
                                </div>
                                <div class="kt-card-content grid gap-5">
                                    <div class="w-full">
                                        <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                                            <label class="kt-form-label max-w-56">
                                                Current Password
                                            </label>
                                            <input class="kt-input" placeholder="Your current password" type="text"
                                                value="">
                                            </input>
                                        </div>
                                    </div>
                                    <div class="w-full">
                                        <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                                            <label class="kt-form-label max-w-56">
                                                New Password
                                            </label>
                                            <input class="kt-input" placeholder="New password" type="text"
                                                value="">
                                            </input>
                                        </div>
                                    </div>
                                    <div class="w-full">
                                        <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                                            <label class="kt-form-label max-w-56">
                                                Confirm New Password
                                            </label>
                                            <input class="kt-input" placeholder="Confirm new password" type="text"
                                                value="">
                                            </input>
                                        </div>
                                    </div>
                                    <div class="flex justify-end pt-2.5">
                                        <button class="kt-btn kt-btn-primary">
                                            Reset Password
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="kt-card">
                                <div class="kt-card-header" id="advanced_settings_preferences">
                                    <h3 class="kt-card-title">
                                        Preferences
                                    </h3>
                                </div>
                                <div class="kt-card-content grid gap-5 lg:py-7.5">
                                    <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                                        <label class="kt-form-label max-w-56">
                                            Language
                                        </label>
                                        <select class="kt-select" data-kt-select="true">
                                            <option>
                                                American English
                                            </option>
                                            <option>
                                                Option 2
                                            </option>
                                            <option>
                                                Option 3
                                            </option>
                                        </select>
                                    </div>
                                    <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                                        <label class="kt-form-label max-w-56">
                                            Time zone
                                        </label>
                                        <div class="grow">
                                            <select class="kt-select" data-kt-select="true">
                                                <option>
                                                    GMT -5:00 - Eastern Time(US &amp; Canada)
                                                </option>
                                                <option>
                                                    Option 2
                                                </option>
                                                <option>
                                                    Option 3
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5 mb-2">
                                        <label class="kt-form-label max-w-56">
                                            Currency
                                        </label>
                                        <div class="grow">
                                            <select class="kt-select" data-kt-select="true">
                                                <option>
                                                    United States Dollar (USD)
                                                </option>
                                                <option>
                                                    Option 2
                                                </option>
                                                <option>
                                                    Option 3
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="flex items-center flex-wrap lg:flex-nowrap gap-2.5">
                                        <label class="kt-form-label max-w-56">
                                            Open tasks as...
                                        </label>
                                        <div class="flex items-center gap-5">
                                            <label class="kt-label">
                                                <input checked="" class="kt-radio" name="open-tasks" type="radio"
                                                    value="1">
                                                Modal
                                                </input>
                                            </label>
                                            <label class="kt-label">
                                                <input class="kt-radio" name="open-tasks" type="radio" value="2">
                                                Fullscreen
                                                </input>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="flex flex-wrap gap-2.5 mb-1.5">
                                        <label class="kt-form-label items-baseline max-w-56">
                                            Attributes
                                        </label>
                                        <div class="flex flex-col items-start gap-5">
                                            <div class="flex flex-col gap-2.5">
                                                <label class="kt-label">
                                                    <input class="kt-checkbox" name="attributes" type="checkbox"
                                                        value="1">
                                                    Show list names
                                                    </input>
                                                </label>
                                                <div class="kt-form-description text-2sm">
                                                    See the name next to each icon
                                                </div>
                                            </div>
                                            <div class="flex flex-col gap-2.5">
                                                <label class="kt-label">
                                                    <input checked="" class="kt-checkbox" name="attributes"
                                                        type="checkbox" value="2">
                                                    Show linked task names
                                                    </input>
                                                </label>
                                                <div class="kt-form-description text-2sm">
                                                    Show task names next to ids for linked project tasks.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex items-center flex-wrap gap-2.5">
                                        <label class="kt-form-label max-w-56">
                                            Email visibility
                                        </label>
                                        <label class="kt-label">
                                            <input checked="" class="kt-switch" type="checkbox" value="1">
                                            Visible
                                            </input>
                                        </label>
                                    </div>
                                    <div class="flex justify-end">
                                        <button class="kt-btn kt-btn-primary">
                                            Save Changes
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="kt-card">
                                <div class="kt-card-header" id="advanced_settings_appearance">
                                    <h3 class="kt-card-title">
                                        Appearance
                                    </h3>
                                </div>
                                <div class="kt-card-content lg:py-7.5">
                                    <div class="mb-5">
                                        <h3 class="text-base font-medium text-mono">
                                            Theme mode
                                        </h3>
                                        <span class="text-sm text-secondary-foreground">
                                            Select or customize your ui theme
                                        </span>
                                    </div>
                                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-5 lg:gap-7.5">
                                        <div>
                                            <label
                                                class="flex items-end border bg-no-repeat bg-cover border-input rounded-xl has-checked:border-green-500 has-checked:border-3 has-checked:[&amp;_.checked]:flex h-[170px] mb-0.5"
                                                style="background-image: url('/static/metronic/tailwind/dist/assets/media/images/600x400/28.jpg')">
                                                <input checked="" class="appearance-none" name="appearance_option"
                                                    type="radio" value="2" />
                                                <span class="checked hidden">
                                                    <i
                                                        class="ki-solid ki-check-circle ml-5 mb-5 text-xl text-green-500 leading-none">
                                                    </i>
                                                </span>
                                            </label>
                                            <span class="text-sm font-medium text-mono">
                                                Dark
                                            </span>
                                        </div>
                                        <div>
                                            <label
                                                class="flex items-end border bg-no-repeat bg-cover border-input rounded-xl has-checked:border-green-500 has-checked:border-3 has-checked:[&amp;_.checked]:flex h-[170px] mb-0.5"
                                                style="background-image: url('/static/metronic/tailwind/dist/assets/media/images/600x400/32.jpg')">
                                                <input class="appearance-none" name="appearance_option" type="radio"
                                                    value="2" />
                                                <span class="checked hidden">
                                                    <i
                                                        class="ki-solid ki-check-circle ml-5 mb-5 text-xl text-green-500 leading-none">
                                                    </i>
                                                </span>
                                            </label>
                                            <span class="text-sm font-medium text-mono">
                                                Light
                                            </span>
                                        </div>
                                        <div>
                                            <label
                                                class="flex items-end border bg-no-repeat bg-cover border-input rounded-xl has-checked:border-green-500 has-checked:border-3 has-checked:[&amp;_.checked]:flex h-[170px] mb-0.5"
                                                style="background-image: url('/static/metronic/tailwind/dist/assets/media/images/600x400/30.jpg')">
                                                <input class="appearance-none" name="appearance_option" type="radio"
                                                    value="2" />
                                                <span class="checked hidden">
                                                    <i
                                                        class="ki-solid ki-check-circle ml-5 mb-5 text-xl text-green-500 leading-none">
                                                    </i>
                                                </span>
                                            </label>
                                            <span class="text-sm font-medium text-mono">
                                                Sistem
                                            </span>
                                        </div>
                                    </div>
                                    <div class="border-t border-border mt-7 mb-8">
                                    </div>
                                    <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5 mb-8">
                                        <label class="kt-form-label max-w-48">
                                            Transparent sidebar
                                        </label>
                                        <div class="flex items-center gap-7.5 grow">
                                            <label class="kt-label">
                                                Visible
                                                <input checked="" class="kt-switch" type="checkbox"
                                                    value="1" />
                                            </label>
                                            <span class="kt-form-description text-2sm">
                                                Toggle the transparent sidebar for a sleek interface.Switch it on for
                                                transparency or off for a solid background.
                                            </span>
                                        </div>
                                    </div>
                                    <div class="flex justify-end">
                                        <button class="kt-btn kt-btn-primary">
                                            Save Changes
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="kt-card">
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
                                                        Tailor Your Email Preferences.
                                                    </span>
                                                </div>
                                            </div>
                                            <label class="kt-label">
                                                <input checked="" class="kt-switch kt-switch-sm" name="check"
                                                    type="checkbox" value="1" />
                                            </label>
                                        </div>
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
                                                        <img alt="" class="h-5"
                                                            src="/static/metronic/tailwind/dist/assets/media/brand-logos/slack.svg" />
                                                    </div>
                                                </div>
                                                <div class="flex flex-col">
                                                    <a class="text-sm font-medium text-mono hover:text-primary mb-px"
                                                        href="#">
                                                        Slack
                                                    </a>
                                                    <span class="text-sm text-secondary-foreground">
                                                        Stay Updated on Slack.
                                                    </span>
                                                </div>
                                            </div>
                                            <label class="kt-label">
                                                <input checked="" class="kt-switch kt-switch-sm" name="check"
                                                    type="checkbox" value="1" />
                                            </label>
                                        </div>
                                    </div>
                                    <div class="flex flex-col gap-3.5 mb-7">
                                        <span class="text-base font-medium text-mono pb-0.5">
                                            Desktop notifications
                                        </span>
                                        <div class="flex flex-col items-start gap-4">
                                            <label class="kt-label">
                                                <input class="kt-radio" name="desktop_notification" type="radio"
                                                    value="1">
                                                All new messages (Recommended)
                                                </input>
                                            </label>
                                            <label class="kt-label">
                                                <input checked="" class="kt-radio" name="desktop_notification"
                                                    type="radio" value="2">
                                                Direct @mentions
                                                </input>
                                            </label>
                                            <label class="kt-label">
                                                <input checked="" class="kt-radio" name="desktop_notification"
                                                    type="radio" value="3">
                                                Disabled
                                                </input>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="flex flex-col gap-3.5 mb-7">
                                        <span class="text-base font-medium text-mono pb-0.5">
                                            Email notifications
                                        </span>
                                        <div class="flex flex-col items-start gap-4">
                                            <label class="kt-label">
                                                <input class="kt-radio" name="email_notification" type="radio"
                                                    value="1">
                                                All new messages and statuses
                                                </input>
                                            </label>
                                            <label class="kt-label">
                                                <input checked="" class="kt-radio" name="email_notification"
                                                    type="radio" value="2">
                                                Unread messages and statuses
                                                </input>
                                            </label>
                                            <label class="kt-label">
                                                <input checked="" class="kt-radio" name="email_notification"
                                                    type="radio" value="3">
                                                Disabled
                                                </input>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="flex flex-col gap-3.5">
                                        <span class="text-base font-medium text-mono pb-0.5">
                                            Subscriptions
                                        </span>
                                        <label class="kt-label">
                                            <input class="kt-checkbox" name="check" type="checkbox" value="1">
                                            Automatically subscribe to tasks you create
                                            </input>
                                        </label>
                                    </div>
                                    <div class="flex justify-end">
                                        <button class="kt-btn kt-btn-primary">
                                            Save Changes
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="kt-card">
                                <div class="kt-card-header" id="advanced_settings_address">
                                    <h3 class="kt-card-title">
                                        Address
                                    </h3>
                                </div>
                                <div class="kt-card-content grid gap-5 lg:py-7.5">
                                    <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                                        <label class="kt-form-label flex items-center gap-1 max-w-56">
                                            Address
                                        </label>
                                        <input class="kt-input" type="text" value="Avinguda Imaginària, 789">
                                        </input>
                                    </div>
                                    <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                                        <label class="kt-form-label max-w-56">
                                            Country
                                        </label>
                                        <div class="grow">
                                            <select class="kt-select" data-kt-select="true" name="kt-select">
                                                <option value="1">
                                                    Spain
                                                </option>
                                                <option value="2">
                                                    Option 2
                                                </option>
                                                <option value="3">
                                                    Option 3
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                                        <label class="kt-form-label max-w-56">
                                            State
                                        </label>
                                        <input class="kt-input" placeholder="State" type="text" value="">
                                        </input>
                                    </div>
                                    <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                                        <label class="kt-form-label max-w-56">
                                            City
                                        </label>
                                        <input class="kt-input" type="text" value="Barcelona" />
                                    </div>
                                    <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                                        <label class="kt-form-label max-w-56">
                                            Postcode
                                        </label>
                                        <input class="kt-input" type="text" value="08012" />
                                    </div>
                                    <div class="flex justify-end pt-2.5">
                                        <button class="kt-btn kt-btn-primary">
                                            Save Changes
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <style>
                                .user-access-bg {
                                    background-image: url('/static/metronic/tailwind/dist/assets/media/images/2600x1200/bg-5.png');
                                }

                                .dark .user-access-bg {
                                    background-image: url('/static/metronic/tailwind/dist/assets/media/images/2600x1200/bg-5-dark.png');
                                }
                            </style>
                            <div class="kt-card">
                                <div class="kt-card-header mb-5" id="external_services_manage_api">
                                    <h3 class="kt-card-title">
                                        Manage API
                                    </h3>
                                </div>
                                <div class="kt-card-content lg:py-7.5 grid gap-5 lg:gap-7.5">
                                    <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                                        <label class="kt-form-label max-w-56 text-foreground font-normal">
                                            API Key
                                        </label>
                                        <label class="kt-input">
                                            <input placeholder="Right icon" type="text"
                                                value="abc123xyz456sample789key000" />
                                            <button class="kt-btn kt-btn-icon kt-btn-dim -me-2">
                                                <i class="ki-filled ki-copy">
                                                </i>
                                            </button>
                                        </label>
                                    </div>
                                    <div
                                        class="flex items-center flex-wrap sm:flex-nowrap justify-between grow border border-border rounded-xl gap-2 p-5 rtl:[background-position:-195px_-85px] [background-position:195px_-85px] bg-no-repeat bg-[length:650px] user-access-bg">
                                        <div class="flex items-center gap-4">
                                            <div class="relative size-[50px] shrink-0">
                                                <svg class="w-full h-full stroke-primary/10 fill-primary-soft"
                                                    fill="none" height="48" viewbox="0 0 44 48" width="44"
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
                                                    <i class="ki-filled ki-security-user text-xl text-primary">
                                                    </i>
                                                </div>
                                            </div>
                                            <div class="flex flex-col gap-1.5">
                                                <div class="flex items-center flex-wrap gap-2.5">
                                                    <a class="text-base font-medium text-mono hover:text-primary"
                                                        href="#">
                                                        User Access
                                                    </a>
                                                    <span class="kt-badge kt-badge-sm kt-badge-outline shrink-0">
                                                        16 days left
                                                    </span>
                                                </div>
                                                <div class="kt-form-description text-2sm">
                                                    This API key can only access
                                                    <a class="kt-link" href="https://keenthemes.com/">
                                                        @keenthemes
                                                    </a>
                                                    <br />
                                                    Secure access with a unique API key for enhanced functionality.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex items-center gap-1.5">
                                            <button class="kt-btn kt-btn-mono">
                                                Renew Plan
                                            </button>
                                            <a class="kt-btn kt-btn-ghost" href="#">
                                                Docs
                                            </a>
                                        </div>
                                    </div>
                                    <p class="text-sm text-foreground">
                                        Unlock the full potential of your application with our API, a secure gateway
                                        facilitating seamless integration, empowering developers
                                        to create innovative and dynamic experiences effortlessly.
                                    </p>
                                </div>
                            </div>
                            <div class="kt-card">
                                <div class="kt-card-header" id="external_services_integrations">
                                    <h3 class="kt-card-title">
                                        Integrations
                                    </h3>
                                </div>
                                <div class="kt-card-content grid gap-5 lg:gap-7.5 lg:py-7.5 py-5">
                                    <div class="grid gap-5">
                                        <div
                                            class="flex items-center justify-between flex-wrap border border-border rounded-xl gap-2 p-3.5">
                                            <div class="flex items-center flex-wrap gap-3.5">
                                                <img alt="" class="size-8 shrink-0"
                                                    src="/static/metronic/tailwind/dist/assets/media/brand-logos/google-webdev.svg" />
                                                <div class="flex flex-col">
                                                    <div class="flex items-center gap-1.5">
                                                        <a class="text-sm font-medium text-mono hover:text-primary"
                                                            href="#">
                                                            Google web.dev
                                                        </a>
                                                        <a class="text-sm text-secondary-foreground hover:text-primary"
                                                            href="#">
                                                            webdev@webdevmail.com
                                                        </a>
                                                    </div>
                                                    <span class="text-sm text-secondary-foreground">
                                                        Integrate for enhanced collaboration in web development.
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="flex items-center gap-2 lg:gap-5">
                                                <input checked="" class="kt-switch" name="check" type="checkbox"
                                                    value="1" />
                                                <div class="kt-btn kt-btn-icon kt-btn-ghost">
                                                    <i class="ki-filled ki-setting-2">
                                                    </i>
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            class="flex items-center justify-between flex-wrap border border-border rounded-xl gap-2 p-3.5">
                                            <div class="flex items-center flex-wrap gap-3.5">
                                                <img alt="" class="size-8 shrink-0"
                                                    src="/static/metronic/tailwind/dist/assets/media/brand-logos/equacoin.svg" />
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
                                                <div class="kt-btn kt-btn-icon kt-btn-ghost">
                                                    <i class="ki-filled ki-setting-2">
                                                    </i>
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            class="flex items-center justify-between flex-wrap border border-border rounded-xl gap-2 p-3.5">
                                            <div class="flex items-center flex-wrap gap-3.5">
                                                <img alt="" class="size-8 shrink-0"
                                                    src="/static/metronic/tailwind/dist/assets/media/brand-logos/evernote.svg" />
                                                <div class="flex flex-col">
                                                    <div class="flex items-center gap-1.5">
                                                        <a class="text-sm font-medium text-mono hover:text-primary"
                                                            href="#">
                                                            Evernote
                                                        </a>
                                                        <a class="text-sm text-secondary-foreground hover:text-primary"
                                                            href="#">
                                                            evernote@noteexample.com
                                                        </a>
                                                    </div>
                                                    <span class="text-sm text-secondary-foreground">
                                                        Streamline cryptocurrency transactions securely and efficiently.
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="flex items-center gap-2 lg:gap-5">
                                                <input checked="" class="kt-switch" name="check" type="checkbox"
                                                    value="1" />
                                                <div class="kt-btn kt-btn-icon kt-btn-ghost">
                                                    <i class="ki-filled ki-setting-2">
                                                    </i>
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            class="flex items-center justify-between flex-wrap border border-border rounded-xl gap-2 p-3.5">
                                            <div class="flex items-center flex-wrap gap-3.5">
                                                <img alt="" class="size-8 shrink-0"
                                                    src="/static/metronic/tailwind/dist/assets/media/brand-logos/inferno.svg" />
                                                <div class="flex flex-col">
                                                    <div class="flex items-center gap-1.5">
                                                        <a class="text-sm font-medium text-mono hover:text-primary"
                                                            href="#">
                                                            Inferno
                                                        </a>
                                                        <a class="text-sm text-secondary-foreground hover:text-primary"
                                                            href="#">
                                                            inferno@dataexample.com
                                                        </a>
                                                    </div>
                                                    <span class="text-sm text-secondary-foreground">
                                                        Robust email integration for data management.
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="flex items-center gap-2 lg:gap-5">
                                                <input checked="" class="kt-switch" name="check" type="checkbox"
                                                    value="1" />
                                                <div class="kt-btn kt-btn-icon kt-btn-ghost">
                                                    <i class="ki-filled ki-setting-2">
                                                    </i>
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            class="flex items-center justify-between flex-wrap border border-border rounded-xl gap-2 p-3.5">
                                            <div class="flex items-center flex-wrap gap-3.5">
                                                <img alt="" class="size-8 shrink-0"
                                                    src="/static/metronic/tailwind/dist/assets/media/brand-logos/jira.svg" />
                                                <div class="flex flex-col">
                                                    <div class="flex items-center gap-1.5">
                                                        <a class="text-sm font-medium text-mono hover:text-primary"
                                                            href="#">
                                                            Jira
                                                        </a>
                                                        <a class="text-sm text-secondary-foreground hover:text-primary"
                                                            href="#">
                                                            jira@projectmail.com
                                                        </a>
                                                    </div>
                                                    <span class="text-sm text-secondary-foreground">
                                                        Streamline project management, enhance collaboration.
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="flex items-center gap-2 lg:gap-5">
                                                <input class="kt-switch" name="check" type="checkbox"
                                                    value="1" />
                                                <div class="kt-btn kt-btn-icon kt-btn-ghost">
                                                    <i class="ki-filled ki-setting-2">
                                                    </i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex justify-end">
                                        <button class="kt-btn kt-btn-primary">
                                            Save Changes
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="kt-card">
                                <div class="kt-card-header" id="delete_account">
                                    <h3 class="kt-card-title">
                                        Delete Account
                                    </h3>
                                </div>
                                <div class="kt-card-content flex flex-col lg:py-7.5 lg:gap-7.5 gap-3">
                                    <div class="flex flex-col gap-5">
                                        <div class="text-sm text-foreground">
                                            We regret to see you leave. Confirm account deletion below. Your data will be
                                            permanently removed. Thank you for being part of our
                                            community. Please check our
                                            <a class="kt-link" href="#">
                                                Setup Guidelines
                                            </a>
                                            if you still wish continue.
                                        </div>
                                        <label class="kt-label">
                                            <input class="kt-checkbox kt-checkbox-sm" name="delete" type="checkbox"
                                                value="1">
                                            Confirm deleting account
                                            </input>
                                        </label>
                                    </div>
                                    <div class="flex justify-end gap-2.5">
                                        <button class="kt-btn kt-btn-outline">
                                            Deactivate Instead
                                            <button class="kt-btn kt-btn-destructive">
                                                Delete Account
                                            </button>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Container -->
@endsection

@section('javascripts')
    <script src="{{ asset('assets/vendors/leaflet/leaflet.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/widgets/general.js') }}"></script>
    <script>
        window.onload = () => {
            const modalEl = KTDom.getElement('#modal_settings');
            const modal = KTModal.getInstance(modalEl);
            modal?.show();
        };
    </script>
@endsection
