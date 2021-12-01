<template>
    <Head title="Welcome" />

    <!-- This example requires Tailwind CSS v2.0+ -->
    <div
        v-if="showModal"
        class="fixed z-10 inset-0 overflow-y-auto"
        aria-labelledby="modal-title"
        role="dialog"
        aria-modal="true"
    >
        <div
            class="
                flex
                items-end
                justify-center
                min-h-screen
                pt-4
                px-4
                pb-20
                text-center
                sm:block sm:p-0
            "
        >
            <!--
      Background overlay, show/hide based on modal state.

      Entering: "ease-out duration-300"
        From: "opacity-0"
        To: "opacity-100"
      Leaving: "ease-in duration-200"
        From: "opacity-100"
        To: "opacity-0"
    -->
            <div
                class="
                    fixed
                    inset-0
                    bg-gray-500 bg-opacity-75
                    transition-opacity
                "
                aria-hidden="true"
            ></div>

            <!-- This element is to trick the browser into centering the modal contents. -->
            <span
                class="hidden sm:inline-block sm:align-middle sm:h-screen"
                aria-hidden="true"
            >&#8203;</span
            >

            <!--
      Modal panel, show/hide based on modal state.

      Entering: "ease-out duration-300"
        From: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        To: "opacity-100 translate-y-0 sm:scale-100"
      Leaving: "ease-in duration-200"
        From: "opacity-100 translate-y-0 sm:scale-100"
        To: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
    -->
            <div
                class="
                    inline-block
                    align-bottom
                    bg-white
                    rounded-lg
                    px-4
                    pt-5
                    pb-4
                    text-left
                    overflow-hidden
                    shadow-xl
                    transform
                    transition-all
                    sm:my-8 sm:align-middle sm:max-w-sm sm:w-full sm:p-6
                "
            >
                <div>
                    <div
                        class="
                            mx-auto
                            flex
                            items-center
                            justify-center
                            h-12
                            w-12
                            rounded-full
                            bg-green-100
                        "
                    >
                        <!-- Heroicon name: outline/check -->
                        <svg
                            class="w-8 h-8"
                            version="1.1"
                            id="Layer_1"
                            xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink"
                            x="0px"
                            y="0px"
                            viewBox="0 0 308 308"
                            style="enable-background: new 0 0 308 308"
                            xml:space="preserve"
                        >
                            <g id="XMLID_468_">
                                <path
                                    id="XMLID_469_"
                                    d="M227.904,176.981c-0.6-0.288-23.054-11.345-27.044-12.781c-1.629-0.585-3.374-1.156-5.23-1.156
		c-3.032,0-5.579,1.511-7.563,4.479c-2.243,3.334-9.033,11.271-11.131,13.642c-0.274,0.313-0.648,0.687-0.872,0.687
		c-0.201,0-3.676-1.431-4.728-1.888c-24.087-10.463-42.37-35.624-44.877-39.867c-0.358-0.61-0.373-0.887-0.376-0.887
		c0.088-0.323,0.898-1.135,1.316-1.554c1.223-1.21,2.548-2.805,3.83-4.348c0.607-0.731,1.215-1.463,1.812-2.153
		c1.86-2.164,2.688-3.844,3.648-5.79l0.503-1.011c2.344-4.657,0.342-8.587-0.305-9.856c-0.531-1.062-10.012-23.944-11.02-26.348
		c-2.424-5.801-5.627-8.502-10.078-8.502c-0.413,0,0,0-1.732,0.073c-2.109,0.089-13.594,1.601-18.672,4.802
		c-5.385,3.395-14.495,14.217-14.495,33.249c0,17.129,10.87,33.302,15.537,39.453c0.116,0.155,0.329,0.47,0.638,0.922
		c17.873,26.102,40.154,45.446,62.741,54.469c21.745,8.686,32.042,9.69,37.896,9.69c0.001,0,0.001,0,0.001,0
		c2.46,0,4.429-0.193,6.166-0.364l1.102-0.105c7.512-0.666,24.02-9.22,27.775-19.655c2.958-8.219,3.738-17.199,1.77-20.458
		C233.168,179.508,230.845,178.393,227.904,176.981z"
                                />
                                <path
                                    id="XMLID_470_"
                                    d="M156.734,0C73.318,0,5.454,67.354,5.454,150.143c0,26.777,7.166,52.988,20.741,75.928L0.212,302.716
		c-0.484,1.429-0.124,3.009,0.933,4.085C1.908,307.58,2.943,308,4,308c0.405,0,0.813-0.061,1.211-0.188l79.92-25.396
		c21.87,11.685,46.588,17.853,71.604,17.853C240.143,300.27,308,232.923,308,150.143C308,67.354,240.143,0,156.734,0z
		 M156.734,268.994c-23.539,0-46.338-6.797-65.936-19.657c-0.659-0.433-1.424-0.655-2.194-0.655c-0.407,0-0.815,0.062-1.212,0.188
		l-40.035,12.726l12.924-38.129c0.418-1.234,0.209-2.595-0.561-3.647c-14.924-20.392-22.813-44.485-22.813-69.677
		c0-65.543,53.754-118.867,119.826-118.867c66.064,0,119.812,53.324,119.812,118.867
		C276.546,215.678,222.799,268.994,156.734,268.994z"
                                />
                            </g>
                            <g></g>
                            <g></g>
                            <g></g>
                            <g></g>
                            <g></g>
                            <g></g>
                            <g></g>
                            <g></g>
                            <g></g>
                            <g></g>
                            <g></g>
                            <g></g>
                            <g></g>
                            <g></g>
                            <g></g>
                        </svg>
                    </div>
                    <div class="mt-3 text-center sm:mt-5">
                        <h3
                            class="text-lg leading-6 font-medium text-gray-900"
                            id="modal-title"
                        >
                            {{ $t("Ways to contact") }}
                        </h3>
                        <div class="mt-2">
                            <p class="text-sm text-gray-500">
                                {{
                                    $t(
                                        "you can reach us via whatsapp: 966548226392 or via email at admin@fatorabit.com"
                                    )
                                }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="mt-5 sm:mt-6">
                    <button
                        @click="showModal=false"
                        type="button"
                        class="
                            inline-flex
                            justify-center
                            w-full
                            rounded-md
                            border border-transparent
                            shadow-sm
                            px-4
                            py-2
                            bg-indigo-600
                            text-base
                            font-medium
                            text-white
                            hover:bg-indigo-700
                            focus:outline-none
                            focus:ring-2
                            focus:ring-offset-2
                            focus:ring-indigo-500
                            sm:text-sm
                        "
                    >
                        {{ $t("Close") }}
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div
        :dir="$page.props.locale === 'العربية' ? 'rtl' : 'ltr'"
        class="
            font-cairo
            relative
            flex
            items-top
            justify-center
            min-h-screen
            bg-gray-100
            dark:bg-gray-900
            sm:items-center sm:pt-0
        "
    >
        <div
            v-if="canLogin"
            class="hidden fixed top-0 right-0 px-6 py-4 sm:block"
        >
            <Link
                v-if="$page.props.user"
                :href="route('dashboard')"
                class="text-sm text-gray-700 underline"
            >
                Dashboard
            </Link>

            <template v-else>
                <Link
                    :href="route('login')"
                    class="text-sm text-gray-700 rtl:ms-2 underline"
                >
                    {{ $t("Log in") }}
                </Link>

                <Link
                    v-if="canRegister"
                    :href="route('register')"
                    class="ml-4 rtl:ms-2 text-sm text-gray-700 underline"
                >
                    {{ $t("Register") }}
                </Link>
            </template>
            <a
                class="text-sm text-gray-700 mx-2"
                v-if="$page.props.locale === 'English'"
                :href="localizedUrl('ar')"
            >العربية</a
            >
            <a
                class="text-sm text-gray-700 mx-2"
                v-if="$page.props.locale === 'العربية'"
                :href="localizedUrl('en')"
            >English</a
            >
        </div>

        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
                <application-logo />
            </div>

            <div class="sm:hidden py-4 w-full flex px-4">
                <Link :href="route('login')" class="bg-indigo-500 text-white px-4 py-2 w-full text-center rounded">{{ $t('Log in') }}</Link>
            </div>
            <div
                class="
                    mt-8
                    bg-white
                    dark:bg-gray-800
                    overflow-hidden
                    shadow
                    sm:rounded-lg
                "
            >
                <div class="grid grid-cols-1 md:grid-cols-2">
                    <div class="p-6">
                        <div class="flex items-center">
                            <svg
                                fill="none"
                                stroke="currentColor"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                viewBox="0 0 24 24"
                                class="w-8 h-8 text-gray-500"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"
                                />
                            </svg>
                            <div class="ml-4 text-lg leading-7 font-semibold">
                                <p
                                    class="
                                        rtl:ms-3
                                        text-gray-900
                                        dark:text-white
                                    "
                                >
                                    {{
                                        $t("Compatible with ZATCA Requirements")
                                    }}
                                </p>
                            </div>
                        </div>

                        <div class="ml-12">
                            <div
                                class="
                                    mt-2
                                    text-gray-600
                                    dark:text-gray-400
                                    text-sm
                                "
                            >
                                {{
                                    $t(
                                        "Electronic invoicing will be applied in two phases, the first phase “issuance phase” will be applied from December 4, 2021 AD to all taxpayers registered in VAT (excluding taxpayers who are not residing in the Kingdom) and whoever acts on behalf of the taxpayer to issue the invoice. Issuing electronic invoices will be similar to issuing invoices today, but through a compatible electronic billing system and the invoice will include all the required items based on the type of invoice"
                                    )
                                }}
                            </div>
                        </div>
                    </div>

                    <div
                        class="
                            p-6
                            border-t border-gray-200
                            dark:border-gray-700
                            md:border-t-0 md:border-l
                        "
                    >
                        <div class="flex items-center">
                            <svg
                                fill="none"
                                stroke="currentColor"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                viewBox="0 0 24 24"
                                class="w-8 h-8 text-gray-500"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4"
                                />
                            </svg>
                            <div class="ml-4 text-lg leading-7 font-semibold">
                                <a
                                    href="#"
                                    class="
                                        rtl:ms-3
                                        text-gray-900
                                        dark:text-white
                                    "
                                >{{
                                        $t(
                                            "Your Invoices are safe and sound, FOREVER!"
                                        )
                                    }}</a
                                >
                            </div>
                        </div>

                        <div class="ml-12">
                            <div
                                class="
                                    mt-2
                                    text-gray-600
                                    dark:text-gray-400
                                    text-sm
                                "
                            >
                                {{
                                    $t(
                                        "We utilize the latest and greatest technologies in database and file storage system. we store your invoices with Amazon's AWS S3 and backups are being made hourly so you never lose a single piece of information"
                                    )
                                }}
                            </div>
                        </div>
                    </div>

                    <div
                        class="
                            p-6
                            border-t border-gray-200
                            dark:border-gray-700
                        "
                    >
                        <div class="flex items-center">
                            <svg
                                fill="none"
                                stroke="currentColor"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                viewBox="0 0 24 24"
                                class="w-8 h-8 text-gray-500"
                            >
                                <path
                                    d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"
                                ></path>
                            </svg>
                            <div class="ml-4 text-lg leading-7 font-semibold">
                                <a
                                    href="#"
                                    class="
                                        rtl:ms-3
                                        text-gray-900
                                        dark:text-white
                                    "
                                >{{
                                        $t(
                                            "Instant notifications to your customers by email and text messages"
                                        )
                                    }}</a
                                >
                            </div>
                        </div>

                        <div class="ml-12">
                            <div
                                class="
                                    mt-2
                                    text-gray-600
                                    dark:text-gray-400
                                    text-sm
                                "
                            >
                                {{
                                    $t(
                                        "If you want to send instant notifications to your customers by email or text messages, you can certainly do so, but you must subscribe to the packages that include this service"
                                    )
                                }}
                            </div>
                        </div>
                    </div>

                    <div
                        class="
                            p-6
                            border-t border-gray-200
                            dark:border-gray-700
                            md:border-l
                        "
                    >
                        <div class="flex items-center">
                            <svg
                                fill="none"
                                stroke="currentColor"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                viewBox="0 0 24 24"
                                class="w-8 h-8 text-gray-500"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"
                                />
                            </svg>

                            <div
                                class="
                                    rtl:ms-3
                                    ml-4
                                    text-lg
                                    leading-7
                                    font-semibold
                                    text-gray-900
                                    dark:text-white
                                "
                            >
                                {{ $t("Available As an API") }}
                            </div>
                        </div>

                        <div class="ml-12">
                            <div
                                class="
                                    mt-2
                                    text-gray-600
                                    dark:text-gray-400
                                    text-sm
                                "
                            >
                                {{
                                    $t(
                                        "If I have an existing application or website, you can benefit from our services through the API. Terms and conditions apply"
                                    )
                                }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div
                class="
                    flex
                    justify-center
                    mt-4
                    sm:items-center sm:justify-between
                "
            >
                <div class="text-center text-sm text-gray-500 sm:text-left">
                    <div class="flex items-center">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-6 w-6"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z"
                            />
                        </svg>

                        <a @click="showModal = true" class="ml-1 underline">
                            {{ $t("Contact") }}
                        </a>
                    </div>
                </div>

                <div
                    class="
                        ml-4
                        text-center text-sm text-gray-500
                        sm:text-right sm:ml-0
                    "
                ></div>
            </div>
        </div>
    </div>
</template>

<script>
import { defineComponent } from "vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import ApplicationLogo from "../Jetstream/ApplicationLogo.vue";

export default defineComponent({
    components: {
        Head,
        Link,
        ApplicationLogo,
    },

    props: {
        canLogin: Boolean,
        canRegister: Boolean,
        laravelVersion: String,
        phpVersion: String,
    },

    data() {
        return {
            showModal: false,
        };
    },
    methods: {
        localizedUrl(locale) {
            let urlArr = window.location.href.split("/");
            if (urlArr[3] != "ar" && urlArr[3] != "en") {
                urlArr.splice(3, 0, locale);
            } else {
                urlArr.splice(3, 1);
            }
            return urlArr.join("/");
        },
    },
});
</script>
