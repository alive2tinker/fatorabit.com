<template>
    <app-layout :title="$t('View') + ' ' + invoice.data.title ?? 'invoice'">
        <template #header>
            <div class="flex justify-between">
                <h2
                    class="
                        font-semibold
                        text-xl text-gray-800
                        leading-tight
                        inline
                        mt-3
                    "
                >
                    {{ $t("Invoice") + " " + invoice.data.title ?? "" }}
                </h2>
                <a
                    :href="route('invoices.printPdf', invoice.data.uuid)"
                    class="bg-indigo-500 text-white px-4 py-2"
                >
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
                            d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"
                        />
                    </svg>
                </a>
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <!-- This example requires Tailwind CSS v2.0+ -->
                <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                    <div class="px-4 py-5 sm:px-6">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">
                            {{ $t('Invoice Information')}}
                        </h3>
                        <p class="mt-1 max-w-2xl text-sm text-gray-500">
                            {{ $t('list all invoice details')}}
                        </p>
                    </div>
                    <div class="border-t border-gray-200 px-4 py-5 sm:p-0">
                        <dl class="sm:divide-y sm:divide-gray-200">
                            <div
                                class="
                                    py-4
                                    sm:py-5
                                    sm:grid
                                    sm:grid-cols-3
                                    sm:gap-4
                                    sm:px-6
                                "
                            >
                                <dt class="text-sm font-medium text-gray-500">
                                    {{ $t('recepient')}}
                                </dt>
                                <dd
                                    class="
                                        mt-1
                                        text-sm text-gray-900
                                        sm:mt-0 sm:col-span-2
                                    "
                                >
                                    {{ invoice.data.to }}
                                </dd>
                            </div>
                            <div
                                class="
                                    py-4
                                    sm:py-5
                                    sm:grid
                                    sm:grid-cols-3
                                    sm:gap-4
                                    sm:px-6
                                "
                            >
                                <dt class="text-sm font-medium text-gray-500">
                                    {{ $t('recepient address')}}
                                </dt>
                                <dd
                                    class="
                                        mt-1
                                        text-sm text-gray-900
                                        sm:mt-0 sm:col-span-2
                                    "
                                >
                                    {{ invoice.data.address }}
                                </dd>
                            </div>
                            <div
                                class="
                                    py-4
                                    sm:py-5
                                    sm:grid
                                    sm:grid-cols-3
                                    sm:gap-4
                                    sm:px-6
                                "
                            >
                                <dt class="text-sm font-medium text-gray-500">
                                    {{ $t('recepient contact number')}}
                                </dt>
                                <dd
                                    class="
                                        mt-1
                                        text-sm text-gray-900
                                        sm:mt-0 sm:col-span-2
                                    "
                                >
                                    {{ invoice.data.toContact }}
                                </dd>
                            </div>
                            <div
                                class="
                                    py-4
                                    sm:py-5
                                    sm:grid
                                    sm:grid-cols-3
                                    sm:gap-4
                                    sm:px-6
                                "
                            >
                                <dt class="text-sm font-medium text-gray-500">
                                    {{ $t('Notes')}}
                                </dt>
                                <dd
                                    class="
                                        mt-1
                                        text-sm text-gray-900
                                        sm:mt-0 sm:col-span-2
                                    "
                                >
                                    {{ invoice.data.notes?.replace(/<[^>]*>?/gm, '') }}
                                </dd>
                            </div>
                            <div
                                class="
                                    py-4
                                    sm:py-5
                                    sm:grid
                                    sm:grid-cols-3
                                    sm:gap-4
                                    sm:px-6
                                "
                            >
                                <dt class="text-sm font-medium text-gray-500">
                                    {{ $t('Subtotal')}}
                                </dt>
                                <dd
                                    class="
                                        mt-1
                                        text-sm text-gray-900
                                        sm:mt-0 sm:col-span-2
                                    "
                                >
                                    {{ invoice.data.subtotal }}
                                </dd>
                            </div>
                            <div
                                class="
                                    py-4
                                    sm:py-5
                                    sm:grid
                                    sm:grid-cols-3
                                    sm:gap-4
                                    sm:px-6
                                "
                            >
                                <dt class="text-sm font-medium text-gray-500">
                                    {{ $t('VAT')}}
                                </dt>
                                <dd
                                    class="
                                        mt-1
                                        text-sm text-gray-900
                                        sm:mt-0 sm:col-span-2
                                    "
                                >
                                    {{ invoice.data.vatTotal }}
                                </dd>
                            </div>
                            <div
                                class="
                                    py-4
                                    sm:py-5
                                    sm:grid
                                    sm:grid-cols-3
                                    sm:gap-4
                                    sm:px-6
                                "
                            >
                                <dt class="text-sm font-medium text-gray-500">
                                    {{ $t('Total')}}
                                </dt>
                                <dd
                                    class="
                                        mt-1
                                        text-sm text-gray-900
                                        sm:mt-0 sm:col-span-2
                                    "
                                >
                                    {{ invoice.data.total }}
                                </dd>
                            </div>
                            <div
                                class="
                                    py-4
                                    sm:py-5
                                    sm:grid
                                    sm:grid-cols-3
                                    sm:gap-4
                                    sm:px-6
                                "
                            >
                                <dt class="text-sm font-medium text-gray-500">
                                    {{ $t('Items')}}
                                </dt>
                                <dd
                                    class="
                                        mt-1
                                        text-sm text-gray-900
                                        sm:mt-0 sm:col-span-2
                                    "
                                >
                                    <ul
                                        role="list"
                                        class="
                                            border border-gray-200
                                            rounded-md
                                            divide-y divide-gray-200
                                        "
                                    >
                                        <li
                                            v-for="(item, index) in invoice.data.items"
                                            :key=index
                                            class="
                                                pl-3
                                                pr-4
                                                py-3
                                                flex
                                                items-center
                                                justify-between
                                                text-sm
                                            "
                                        >
                                            <div
                                                class="
                                                    w-0
                                                    flex-1 flex
                                                    items-center
                                                "
                                            >
                                               {{ item.item.name }}
                                            </div>
                                            <div>
                                                {{ item.item.unit_price }}
                                                {{ item.item.vat_inclusive ? $t("VAT Included"):$t("VAT not Included") }}
                                            </div>
                                        </li>
                                    </ul>
                                </dd>
                            </div>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import { defineComponent } from "vue";
import AppLayout from "@/Layouts/AppLayout.vue";
export default defineComponent({
    props: {
        invoice: Object,
    },
    components: {
        AppLayout,
    },
});
</script>
