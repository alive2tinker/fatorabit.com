<!--
  This example requires Tailwind CSS v2.0+ 
  
  This example requires some changes to your config:
  
  ```
  // tailwind.config.js
  const colors = require('tailwindcss/colors')
  
  module.exports = {
    // ...
    theme: {
      extend: {
        colors: {
          teal: colors.teal,
          cyan: colors.cyan,
        },
      },
    },
    plugins: [
      // ...
      require('@tailwindcss/forms'),
      require('@tailwindcss/aspect-ratio'),
    ],
  }
  ```
-->
<template>
    <div
        class="bg-white"
        :dir="$page.props.locale === 'العربية' ? 'rtl' : 'ltr'"
    >
        <div class="relative overflow-hidden">
            <Popover as="header" class="relative">
                <div class="bg-gray-900 pt-6">
                    <nav
                        class="relative max-w-7xl mx-auto flex items-center justify-between px-4 sm:px-6"
                        aria-label="Global"
                    >
                        <div class="flex items-center flex-1">
                            <div
                                class="flex items-center justify-between w-full md:w-auto"
                            >
                                <a href="#">
                                    <application-logo color="teal-500" />
                                </a>
                                <div class="-mr-2 flex items-center md:hidden">
                                    <PopoverButton
                                        class="bg-gray-900 rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:bg-gray-800 focus:outline-none focus:ring-2 focus-ring-inset focus:ring-white"
                                    >
                                        <span class="sr-only"
                                            >Open main menu</span
                                        >
                                        <MenuIcon
                                            class="h-6 w-6"
                                            aria-hidden="true"
                                        />
                                    </PopoverButton>
                                </div>
                            </div>
                            <div
                                class="hidden space-x-8 rtl:ps-2 md:flex md:ml-10"
                            >
                                <a
                                    v-for="item in navigation"
                                    :key="item.name"
                                    :href="item.href"
                                    class="text-base px-4 font-medium text-white hover:text-gray-300"
                                    >{{ $t(item.name) }}</a
                                >
                            </div>
                        </div>
                        <div
                            v-if="canLogin"
                            class="hidden md:flex md:items-center md:space-x-6"
                        >
                            <Link
                                v-if="$page.props.user"
                                :href="route('dashboard')"
                                class="text-sm text-white underline"
                            >
                                {{ $t('Dashboard')}}
                            </Link>
                            <template v-else>
                                <a
                                    :href="route('login')"
                                    class="text-base font-medium text-white hover:text-gray-300 rtl:me-4"
                                >
                                    {{ $t("Log in") }}
                                </a>
                                <a
                                    :href="route('register')"
                                    class="inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md text-white bg-gray-600 hover:bg-gray-700"
                                >
                                    {{ $t("Start free trial") }}
                                </a>
                            </template>
                        </div>
                    </nav>
                </div>

                <transition
                    enter-active-class="duration-150 ease-out"
                    enter-from-class="opacity-0 scale-95"
                    enter-to-class="opacity-100 scale-100"
                    leave-active-class="duration-100 ease-in"
                    leave-from-class="opacity-100 scale-100"
                    leave-to-class="opacity-0 scale-95"
                >
                    <PopoverPanel
                        focus
                        class="absolute top-0 inset-x-0 p-2 transition transform origin-top md:hidden"
                    >
                        <div
                            class="rounded-lg shadow-md bg-white ring-1 ring-black ring-opacity-5 overflow-hidden"
                        >
                            <div
                                class="px-5 pt-4 flex items-center justify-between"
                            >
                                <div>
                                    <application-logo color="teal-500" />
                                </div>
                                <div class="-mr-2">
                                    <PopoverButton
                                        class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-cyan-600"
                                    >
                                        <span class="sr-only">Close menu</span>
                                        <XIcon
                                            class="h-6 w-6"
                                            aria-hidden="true"
                                        />
                                    </PopoverButton>
                                </div>
                            </div>
                            <div class="pt-5 pb-6">
                                <div class="px-2 space-y-1">
                                    <a
                                        v-for="item in navigation"
                                        :key="item.name"
                                        :href="item.href"
                                        class="block pe-3 py-2 rounded-md text-base font-medium text-gray-900 hover:bg-gray-50"
                                        >{{ $t(item.name) }}</a
                                    >
                                </div>
                                <div class="mt-6 px-5">
                                    <a
                                        :href="route('register')"
                                        class="block text-center w-full py-3 px-4 rounded-md shadow bg-gradient-to-r from-teal-500 to-cyan-600 text-white font-medium hover:from-teal-600 hover:to-cyan-700"
                                        >{{ $t('Start free trial') }}</a
                                    >
                                </div>
                                <div class="mt-6 px-5">
                                    <p
                                        class="text-center text-base font-medium text-gray-500"
                                    >
                                        {{ $t("Existing customer?") }}
                                        <a
                                            :href="route('login')"
                                            class="text-gray-900 hover:underline"
                                            >{{ $t("Login") }}</a
                                        >
                                    </p>
                                </div>
                            </div>
                        </div>
                    </PopoverPanel>
                </transition>
            </Popover>
            <main>
                <div
                    class="pt-10 bg-gray-900 sm:pt-16 lg:pt-8 lg:pb-14 lg:overflow-hidden"
                >
                    <div class="mx-auto max-w-7xl lg:px-8">
                        <div class="lg:grid lg:grid-cols-2 lg:gap-8">
                            <div
                                class="mx-auto max-w-md px-4 sm:max-w-2xl sm:px-6 sm:text-center lg:px-0 lg:text-left lg:flex lg:items-center"
                            >
                                <div class="lg:py-24">
                                    <h1
                                        class="mt-4 text-4xl rtl:Text-right tracking-tight font-extrabold text-white sm:mt-5 sm:text-6xl lg:mt-6 xl:text-6xl"
                                    >
                                        <span class="block rtl:text-right">{{
                                            $t("A better way to")
                                        }}</span>
                                        <span
                                            class="pb-3 block bg-clip-text text-transparent bg-gradient-to-r from-teal-200 to-cyan-400 sm:pb-5 rtl:text-right"
                                            >{{
                                                $t("Electronic Invoicing")
                                            }}</span
                                        >
                                    </h1>
                                    <p
                                        class="text-base text-gray-300 sm:text-xl lg:text-lg xl:text-xl rtl:text-right"
                                    >
                                        {{
                                            $t(
                                                "we offer the best in class service to invoice your customers with the billables and make sure it meets requirements of ZATCA"
                                            )
                                        }}
                                    </p>
                                    <div class="mt-10 sm:mt-12"></div>
                                </div>
                            </div>
                            <div
                                class="mt-12 -mb-16 sm:-mb-48 lg:m-0 lg:relative"
                            >
                                <div
                                    class="mx-auto max-w-md px-4 sm:max-w-2xl sm:px-6 lg:max-w-none lg:px-0"
                                >
                                    <!-- Illustration taken from Lucid Illustrations: https://lucid.pixsellz.io/ -->
                                    <img
                                        class="w-full lg:absolute lg:inset-y-0 lg:left-0 lg:h-full lg:w-auto lg:max-w-none"
                                        src="https://tailwindui.com/img/component-images/cloud-illustration-teal-cyan.svg"
                                        alt=""
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Feature section with screenshot -->
                <div class="relative bg-gray-50 pt-16 sm:pt-24 lg:pt-32">
                    <div
                        class="mx-auto max-w-md px-4 text-center sm:px-6 sm:max-w-3xl lg:px-8 lg:max-w-7xl"
                    >
                        <div>
                            <h2
                                class="text-base font-semibold tracking-wider text-cyan-600 uppercase"
                            >
                                {{ $t("Cloud Invoicing") }}
                            </h2>
                            <p
                                class="mt-2 text-3xl font-extrabold text-gray-900 tracking-tight sm:text-4xl"
                            >
                                {{ $t("Anytime, Anywhere") }}
                            </p>
                            <p
                                class="mt-5 max-w-prose mx-auto text-xl text-gray-500"
                            >
                                {{
                                    $t(
                                        "Cloud invoicing ensures your ability to invoice your clients anytime anywhere, and the availability of your data all the time."
                                    )
                                }}
                            </p>
                        </div>
                        <div class="mt-12 -mb-10 sm:-mb-24 lg:-mb-80">
                            <img
                                class="rounded-lg shadow-xl ring-1 ring-black ring-opacity-5"
                                :src="PrimePhoto"
                                alt=""
                            />
                        </div>
                    </div>
                </div>

                <!-- Feature section with grid -->
                <div
                    class="relative bg-white py-16 sm:py-24 lg:py-32"
                    id="features"
                >
                    <div
                        class="mx-auto max-w-md px-4 text-center sm:max-w-3xl sm:px-6 lg:px-8 lg:max-w-7xl"
                    >
                        <h2
                            class="text-base font-semibold tracking-wider text-cyan-600 uppercase"
                        >
                            {{ $t("All Features") }}
                        </h2>
                        <p
                            class="mt-2 text-3xl font-extrabold text-gray-900 tracking-tight sm:text-4xl"
                        >
                            {{ $t("Everything you need for invoicing") }}
                        </p>
                        <p
                            class="mt-5 max-w-prose mx-auto text-xl text-gray-500"
                        >
                            {{
                                $t(
                                    "from QR requirements to Full blown API to integrate with your existing systems, we got you covered!"
                                )
                            }}
                        </p>
                        <div class="mt-12">
                            <div
                                class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3"
                            >
                                <div
                                    v-for="feature in features"
                                    :key="feature.name"
                                    class="pt-6"
                                >
                                    <div
                                        class="flow-root bg-gray-50 rounded-lg px-6 pb-8"
                                    >
                                        <div class="-mt-6">
                                            <div>
                                                <span
                                                    class="inline-flex items-center justify-center p-3 bg-gradient-to-r from-teal-500 to-cyan-600 rounded-md shadow-lg"
                                                >
                                                    <component
                                                        :is="feature.icon"
                                                        class="h-6 w-6 text-white"
                                                        aria-hidden="true"
                                                    />
                                                </span>
                                            </div>
                                            <h3
                                                class="mt-8 text-lg font-medium text-gray-900 tracking-tight"
                                            >
                                                {{ $t(feature.name) }}
                                            </h3>
                                            <p
                                                class="mt-5 text-base text-gray-500"
                                            >
                                                {{ $t(feature.description) }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Testimonial section -->
                <div
                    class="pb-16 bg-gradient-to-r from-teal-500 to-cyan-600 lg:pb-0 lg:z-10 lg:relative"
                >
                    <div
                        class="lg:mx-auto lg:max-w-7xl lg:px-8 lg:grid lg:grid-cols-3 lg:gap-8"
                    >
                        <div class="relative lg:-my-8">
                            <div
                                aria-hidden="true"
                                class="absolute inset-x-0 top-0 h-1/2 bg-white lg:hidden"
                            />
                            <div
                                class="mx-auto max-w-md px-4 sm:max-w-3xl sm:px-6 lg:p-0 lg:h-full"
                            >
                                <div
                                    class="aspect-w-10 aspect-h-6 rounded-xl shadow-xl overflow-hidden sm:aspect-w-16 sm:aspect-h-7 lg:aspect-none lg:h-full"
                                >
                                    <img
                                        class="object-cover lg:h-full lg:w-full"
                                        :src="spicePhoto"
                                        alt=""
                                    />
                                </div>
                            </div>
                        </div>
                        <div class="mt-12 lg:m-0 lg:col-span-2 lg:pl-8">
                            <div
                                class="mx-auto max-w-md px-4 sm:max-w-2xl sm:px-6 lg:px-0 lg:py-20 lg:max-w-none"
                            >
                                <blockquote>
                                    <div>
                                        <svg
                                            class="h-12 w-12 text-white opacity-25"
                                            fill="currentColor"
                                            viewBox="0 0 32 32"
                                            aria-hidden="true"
                                        >
                                            <path
                                                d="M9.352 4C4.456 7.456 1 13.12 1 19.36c0 5.088 3.072 8.064 6.624 8.064 3.36 0 5.856-2.688 5.856-5.856 0-3.168-2.208-5.472-5.088-5.472-.576 0-1.344.096-1.536.192.48-3.264 3.552-7.104 6.624-9.024L9.352 4zm16.512 0c-4.8 3.456-8.256 9.12-8.256 15.36 0 5.088 3.072 8.064 6.624 8.064 3.264 0 5.856-2.688 5.856-5.856 0-3.168-2.304-5.472-5.184-5.472-.576 0-1.248.096-1.44.192.48-3.264 3.456-7.104 6.528-9.024L25.864 4z"
                                            />
                                        </svg>
                                        <p
                                            class="mt-6 text-2xl font-medium text-white"
                                        >
                                            فاتورة بت ساعدنا على تلبية متطلبات هيئة الزكاة والضريبة والجمارك بكل سهولة واريحية وغطى كافة متطلباتنا لنظام فوترة الكترونية
                                        </p>
                                    </div>
                                    <footer class="mt-6">
                                        <p
                                            class="text-base font-medium text-white"
                                        >
                                            محمد علي
                                        </p>
                                        <p
                                            class="text-base font-medium text-cyan-100"
                                        >
                                            مالك لمتجر بهارات
                                        </p>
                                    </footer>
                                </blockquote>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pricing Section -->
                <pricing-section id="pricing" />

                <!-- Contact Us Section -->
                <contact-section id="contact-us"></contact-section>
            </main>
            <footer class="bg-gray-50" aria-labelledby="footer-heading">
                <h2 id="footer-heading" class="sr-only">Footer</h2>
                <div
                    class="max-w-md mx-auto pt-12 px-4 sm:max-w-7xl sm:px-6 lg:pt-16 lg:px-8"
                >
                    <div class="xl:grid xl:grid-cols-3 xl:gap-8">
                        <div class="space-y-8 xl:col-span-1">
                            <application-logo color="gray-400" />
                            <p class="text-gray-500 text-base">
                                {{
                                    $t(
                                        "Making the world a better place through constructing elegant invoicing."
                                    )
                                }}
                            </p>
                            <div class="flex space-x-6"></div>
                        </div>
                    </div>
                    <div class="mt-12 border-t border-gray-200 py-8">
                        <p class="text-base text-gray-400 xl:text-center">
                            &copy;
                            {{ $t("Fatorabit, Inc. All rights reserved.") }}
                        </p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
</template>

<script>
import { defineComponent, h } from "vue";
import { Popover, PopoverButton, PopoverPanel } from "@headlessui/vue";
import {
    GlobeIcon,
    TerminalIcon,
    DocumentIcon,
    MenuIcon,
    RefreshIcon,
    ServerIcon,
    ShieldCheckIcon,
    XIcon,
    QrcodeIcon,
} from "@heroicons/vue/outline";
import { ChevronRightIcon, ExternalLinkIcon } from "@heroicons/vue/solid";
import ApplicationLogo from "@/components/ApplicationLogo";
import PricingSection from "@/components/PricingSection";
import ContactSection from "@/components/ContactSection";
import { Link } from '@inertiajs/inertia-vue3'
import PrimePhoto from '@/assets/images/primePhoto.png';
import spicePhoto from '@/assets/images/spices.jpeg';

const navigation = [
    { name: "Features", href: "#features" },
    { name: "Pricing", href: "#pricing" },
    { name: "Contact Us", href: "#contact-us" },
];
const features = [
    {
        name: "Electronic Invoicing",
        description:
            "Electronic invoicing will be applied in two phases, the first phase “issuance phase” will be applied from December 4, 2021 AD to all taxpayers registered in VAT (excluding taxpayers who are not residing in the Kingdom) and whoever acts on behalf of the taxpayer to issue the invoice. Issuing electronic invoices will be similar to issuing invoices today, but through a compatible electronic billing system and the invoice will include all the required items based on the type of invoice",
        icon: QrcodeIcon,
    },
    {
        name: "Multilingual",
        description:
            "So that any of your employees be able to interact with the system.",
        icon: GlobeIcon,
    },
    {
        name: "Notifications",
        description:
            "Our system is capable of sending emails and SMS to your clients to notify them of the new invoice.",
        icon: RefreshIcon,
    },
    {
        name: "Advanced Security",
        description:
            "we use state of the art encryption methods to protect your data.",
        icon: ShieldCheckIcon,
    },
    {
        name: "Powerful API",
        description:
            "You can integrate your existing systems with our system via our powerful and full blown API. terms and conditions apply",
        icon: TerminalIcon,
    },
    {
        name: "Database Backups",
        description:
            "We have backups every hour to ensure that there is nothing lost.",
        icon: ServerIcon,
    },
];

export default {
    props: {
        canLogin: Boolean,
        canRegister: Boolean,
        laravelVersion: String,
        phpVersion: String,
    },
    components: {
        Popover,
        PopoverButton,
        PopoverPanel,
        ChevronRightIcon,
        ExternalLinkIcon,
        MenuIcon,
        XIcon,
        ApplicationLogo,
        PricingSection,
        ContactSection,
        Link
    },
    setup() {
        return {
            navigation,
            features,
            PrimePhoto,
            spicePhoto
        };
    },
};
</script>
