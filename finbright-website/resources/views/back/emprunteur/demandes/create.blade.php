@extends('back.emprunteur.layouts')

@section('title', 'Soumettre un demande')

@section('content')
    <!-- Container -->
    <div class="kt-container-fixed" id="contentContainer">
    </div>
    <!-- End of Container -->
    <!-- Container -->
    <div class="kt-container-fixed">
        <div class="grid gap-5 lg:gap-7.5 xl:w-[38.75rem] mx-auto">
            <div class="kt-card pb-2.5">
                <div class="kt-card-header" id="basic_settings">
                    <h3 class="kt-card-title">
                        General Settings
                    </h3>
                    <div class="flex items-center gap-2">
                        <label class="kt-label">
                            Public Profile
                            <input checked="" class="kt-switch kt-switch-sm" name="check" type="checkbox"
                                value="1" />
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
                                    data-kt-tooltip="true" data-kt-tooltip-placement="right" data-kt-tooltip-trigger="hover"
                                    type="button">
                                    <i class="ki-filled ki-cross">
                                    </i>
                                    <span class="kt-tooltip" data-kt-tooltip-content="true">
                                        Click to remove or revert
                                    </span>
                                </button>
                                <div class="kt-image-input-placeholder border-2 border-green-500 kt-image-input-empty:border-input"
                                    data-kt-image-input-placeholder="true"
                                    style="background-image:url(/static/metronic/tailwind/dist/assets/media/avatars/blank.png)">
                                    <div class="kt-image-input-preview" data-kt-image-input-preview="true"
                                        style="background-image:url('/media/avatars/300-2.png')">
                                    </div>
                                    <div
                                        class="flex items-center justify-center cursor-pointer h-5 left-0 right-0 bottom-0 bg-black/25 absolute">
                                        <svg class="fill-border opacity-80" height="12" viewbox="0 0 14 12"
                                            width="14" xmlns="http://www.w3.org/2000/svg">
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
                        <input class="kt-input" placeholder="" type="text" value="Avinguda Imaginària, 789" />
                    </div>
                    <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                        <label class="kt-form-label max-w-56">
                            Country
                        </label>
                        <select class="kt-select {class if class else ''}" data-kt-select="true"
                            data-kt-select-config='{
                                "optionsClass": "kt-scrollable overflow-auto max-h-[250px]",
                                "displayTemplate": "&lt;div class=\"flex items-center leading-none gap-2\"&gt;{{ flag }}&lt;span class=\"text-foreground\"&gt;{{ text }}&lt;/span&gt;&lt;/div&gt;",
                                "optionTemplate": "&lt;div class=\"flex items-center leading-none gap-2\"&gt;{{ flag }} &lt;span class=\"text-foreground\"&gt;{{ text }}&lt;/span&gt;&lt;/div&gt;&lt;svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\" class=\"size-3.5 ms-auto hidden text-primary kt-select-option-selected:block\"&gt;&lt;path d=\"M20 6 9 17l-5-5\"/&gt;&lt;/svg&gt;&lt;/div&gt;"
                            }'
                            data-kt-select-enable-search="true" data-kt-select-placeholder="Select a country..."
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
                            <option data-kt-select-option='{"flag": "🇨🇫"}' value="Central African Republic">
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
                            <option data-kt-select-option='{"flag": "🇨🇬"}' value="Congo (Congo-Brazzaville)">
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
                            <option data-kt-select-option='{"flag": "🇨🇩"}' value="Democratic Republic of the Congo">
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
                            <option data-kt-select-option='{"flag": "🇻🇨"}' value="Saint Vincent and the Grenadines">
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
                <div class="kt-card-header" id="password_settings">
                    <h3 class="kt-card-title">
                        Password
                    </h3>
                </div>
                <div class="kt-card-content grid gap-5">
                    <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                        <label class="kt-form-label max-w-56">
                            Current Password
                        </label>
                        <input class="kt-input" placeholder="Your current password" type="text" value="" />
                    </div>
                    <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5">
                        <label class="kt-form-label max-w-56">
                            New Password
                        </label>
                        <input class="kt-input" placeholder="New password" type="text" value="" />
                    </div>
                    <div class="flex items-baseline flex-wrap lg:flex-nowrap gap-2.5 mb-2.5">
                        <label class="kt-form-label max-w-56">
                            Confirm New Password
                        </label>
                        <input class="kt-input" placeholder="Confirm new password" type="text" value="" />
                    </div>
                    <div class="flex justify-end">
                        <button class="kt-btn kt-btn-primary">
                            Reset Password
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
                            We regret to see you leave. Confirm account deletion below. Your data will be permanently
                            removed. Thank you for being part of our
                            community. Please check our
                            <a class="kt-link" href="#">
                                Setup Guidelines
                            </a>
                            if you still wish continue.
                        </div>
                        <label class="kt-label">
                            <input class="kt-checkbox kt-checkbox-sm" name="delete" type="checkbox" value="1">
                            Confirm deleting account
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
    <!-- End of Container -->
@endsection

@section('javascripts')
@endsection
