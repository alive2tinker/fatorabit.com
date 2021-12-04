<template>
    <app-layout :title="$t('New Invoice')">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $t("New Invoice") }}
            </h2>
        </template>
        <!-- This example requires Tailwind CSS v2.0+ -->
        <div
        v-if="items.data.length === 0"
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
                                bg-red-100
                            "
                        >
                            <!-- Heroicon name: outline/check -->
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-6 w-6 text-red-700"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"
                                />
                            </svg>
                        </div>
                        <div class="mt-3 text-center sm:mt-5">
                            <h3
                                class="
                                    text-lg
                                    leading-6
                                    font-medium
                                    text-gray-900
                                "
                                id="modal-title"
                            >
                                {{ $t("No Items Found") }}
                            </h3>
                            <div class="mt-2">
                                <p class="text-sm text-gray-500">
                                    {{
                                        $t(
                                            "You cannot create an invoice without first creating items to list in your invoice"
                                        )
                                    }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5 sm:mt-6">
                        <Link
                            :href="route('items.create')"
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
                            {{ $t("Create Item") }}
                        </Link>
                    </div>
                </div>
            </div>
        </div>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white rounded-md shadow-md p-4">
                    <form
                        class="space-y-8 divide-y divide-gray-200"
                        @submit.prevent="submitForm"
                    >
                        <div>
                            <h3
                                class="
                                    text-lg
                                    leading-6
                                    font-medium
                                    text-gray-900
                                "
                            >
                                {{ $t("Basic Information") }}
                            </h3>
                            <p class="mt-1 max-w-2xl text-sm text-gray-500">
                                {{
                                    $t(
                                        "we need basic information such as a title for this invoice"
                                    )
                                }}
                            </p>
                            <div class="grid grid-cols-1 sm:grid-cols-3 gap-2">
                                <div>
                                    <label
                                        for="region"
                                        class="
                                            block
                                            text-sm
                                            font-medium
                                            text-gray-700
                                            sm:mt-px sm:pt-2
                                        "
                                    >
                                        {{ $t("Title") }}
                                    </label>
                                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                                        <input
                                            type="text"
                                            autocomplete="address-level1"
                                            :class="{
                                                'max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md': true,
                                                'border-red-500': errors.title,
                                            }"
                                            v-model="newInvoiceForm.title"
                                        />
                                        <p class="font-extralight text-red-500">
                                            {{ $t(errors.title) }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="
                                    grid grid-cols-1
                                    sm:grid-cols-3
                                    my-2
                                    gap-2
                                "
                            >
                                <div>
                                    <label
                                        for="email"
                                        class="
                                            block
                                            text-sm
                                            font-medium
                                            text-gray-700
                                        "
                                        >{{ $t("Recepient") }}</label
                                    >
                                    <div class="mt-1">
                                        <input
                                            type="text"
                                            id="email"
                                            :class="{
                                                'shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md': true,
                                                'border-red-500': errors.to,
                                            }"
                                            v-model="newInvoiceForm.to"
                                        />
                                        <p class="font-extralight text-red-500">
                                            {{ $t(errors.to) }}
                                        </p>
                                    </div>
                                </div>
                                <div>
                                    <label
                                        for="email"
                                        class="
                                            block
                                            text-sm
                                            font-medium
                                            text-gray-700
                                        "
                                        >{{ $t("Contact") }}</label
                                    >
                                    <div class="mt-1">
                                        <input
                                            type="text"
                                            id="email"
                                            :class="{
                                                'shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md': true,
                                                'border-red-500':
                                                    errors.toContact,
                                            }"
                                            v-model="newInvoiceForm.toContact"
                                        />
                                        <p class="font-extralight text-red-500">
                                            {{ $t(errors.toContact) }}
                                        </p>
                                    </div>
                                </div>
                                <div class="sm:col-span-2">
                                    <label
                                        for="email"
                                        class="
                                            block
                                            text-sm
                                            font-medium
                                            text-gray-700
                                        "
                                        >{{ $t("Address") }}</label
                                    >
                                    <div class="mt-1">
                                        <textarea
                                            :class="{
                                                'shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md': true,
                                                'border-red-500':
                                                    errors.address,
                                            }"
                                            id=""
                                            cols="30"
                                            rows="4"
                                            v-model="newInvoiceForm.address"
                                        ></textarea>
                                        <p class="font-extralight text-red-500">
                                            {{ $t(errors.address) }}
                                        </p>
                                    </div>
                                </div>
                                <div class="sm:col-span-2">
                                    <label
                                        for="email"
                                        class="
                                            block
                                            text-sm
                                            font-medium
                                            text-gray-700
                                        "
                                        >{{ $t("Notes") }}</label
                                    >
                                    <div class="mt-1">
                                        <textarea
                                            class="
                                                shadow-sm
                                                focus:ring-indigo-500
                                                focus:border-indigo-500
                                                block
                                                w-full
                                                sm:text-sm
                                                border-gray-300
                                                rounded-md
                                            "
                                            id=""
                                            cols="30"
                                            rows="10"
                                            v-model="newInvoiceForm.notes"
                                        ></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div
                            v-for="(item, index) in newInvoiceForm.items"
                            :key="index"
                        >
                            <div class="grid grid-cols-1 sm:grid-cols-6 gap-2">
                                <div class="sm:col-span-1">
                                    <label
                                        for="street-address"
                                        class="
                                            block
                                            text-sm
                                            font-medium
                                            text-gray-700
                                        "
                                    >
                                        {{ $t("Item") }}
                                    </label>
                                    <div class="mt-1">
                                        <search-select
                                            :hasError="
                                                errors[
                                                    'items.' + index + '.item'
                                                ]
                                            "
                                            v-model="item.item"
                                            v-on:itemSelected="
                                                updateSelectedItem(
                                                    index,
                                                    $event
                                                )
                                            "
                                            :items="items"
                                        />
                                        <p class="font-extralight text-red-500">
                                            {{
                                                errors[
                                                    "items." + index + ".item"
                                                ]
                                            }}
                                        </p>
                                    </div>
                                </div>
                                <div class="sm:col-span-1">
                                    <label
                                        for="street-address"
                                        class="
                                            block
                                            text-sm
                                            font-medium
                                            text-gray-700
                                        "
                                    >
                                        {{ $t("Quantity") }}
                                    </label>
                                    <div class="mt-1">
                                        <input
                                            type="number"
                                            name="street-address"
                                            id="street-address"
                                            autocomplete="street-address"
                                            :class="{
                                                'shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md': true,
                                                'border-red-500':
                                                    errors[
                                                        'items.' +
                                                            index +
                                                            '.quantity'
                                                    ],
                                            }"
                                            @change="
                                                updateNumbers(item, $event)
                                            "
                                            :value="item.quantity"
                                        />
                                        <p class="font-extralight text-red-500">
                                            {{
                                                $t(
                                                    errors[
                                                        "items." +
                                                            index +
                                                            ".quantity"
                                                    ]
                                                )
                                            }}
                                        </p>
                                    </div>
                                </div>
                                <div class="sm:col-span-1">
                                    <label
                                        for="street-address"
                                        class="
                                            block
                                            text-sm
                                            font-medium
                                            text-gray-700
                                        "
                                    >
                                        {{ $t("Subtotal") }}
                                    </label>
                                    <div class="mt-1">
                                        {{ item.subtotal }}
                                        <p class="font-extralight text-red-500">
                                            {{
                                                errors[
                                                    "items." +
                                                        index +
                                                        ".subtotal"
                                                ]
                                            }}
                                        </p>
                                    </div>
                                </div>
                                <div class="sm:col-span-1">
                                    <label
                                        for="street-address"
                                        class="
                                            block
                                            text-sm
                                            font-medium
                                            text-gray-700
                                        "
                                    >
                                        {{ $t("VAT Amount") }}
                                    </label>
                                    <div class="mt-1">
                                        {{ item.vat }}
                                        <p class="font-extralight text-red-500">
                                            {{
                                                errors[
                                                    "items." + index + ".vat"
                                                ]
                                            }}
                                        </p>
                                    </div>
                                </div>
                                <div class="sm:col-span-1">
                                    <label
                                        for="street-address"
                                        class="
                                            block
                                            text-sm
                                            font-medium
                                            text-gray-700
                                        "
                                    >
                                        {{ $t("Total") }}
                                    </label>
                                    <div class="mt-1">
                                        {{ item.total }}
                                        <p class="font-extralight text-red-500">
                                            {{
                                                errors[
                                                    "items." + index + ".total"
                                                ]
                                            }}
                                        </p>
                                    </div>
                                </div>
                                <div class="sm:col-span-1">
                                    <label
                                        for="street-address"
                                        class="
                                            block
                                            text-sm
                                            font-medium
                                            text-gray-700
                                            mb-2
                                        "
                                    >
                                        {{ $t("Actions") }}
                                    </label>
                                    <button
                                        type="button"
                                        @click="addItem"
                                        class="
                                            bg-green-500
                                            px-3
                                            py-1
                                            text-white
                                            ltr:rounded-tl ltr:rounded-bl
                                            rtl:rounded-tr
                                            ltr:rounded-br
                                        "
                                    >
                                        +
                                    </button>
                                    <button
                                        type="button"
                                        @click="deleteItem(index)"
                                        class="
                                            bg-red-500
                                            px-3
                                            py-1
                                            text-white
                                            ltr:rounded-tr ltr:rounded-br
                                            rtl:rounded-tl rtl:rounded-bl
                                        "
                                    >
                                        -
                                    </button>
                                </div>
                            </div>
                        </div>
                        <h1>{{ $t("Subtotal") }}: {{ getSubtotal }}</h1>
                        <h1>{{ $t("VAT") }}: {{ getVat }}</h1>
                        <h1>{{ $t("Total") }}: {{ getTotal }}</h1>
                        <div class="pt-5">
                            <div class="flex justify-end">
                                <button
                                    type="button"
                                    @click="redirectBack"
                                    class="
                                        bg-white
                                        py-2
                                        px-4
                                        border border-gray-300
                                        rounded-md
                                        shadow-sm
                                        text-sm
                                        font-medium
                                        text-gray-700
                                        hover:bg-gray-50
                                        focus:outline-none
                                        focus:ring-2
                                        focus:ring-offset-2
                                        focus:ring-indigo-500
                                    "
                                >
                                    {{ $t("Cancel") }}
                                </button>
                                <button
                                    type="submit"
                                    class="
                                        ml-3
                                        inline-flex
                                        justify-center
                                        py-2
                                        px-4
                                        border border-transparent
                                        shadow-sm
                                        text-sm
                                        font-medium
                                        rounded-md
                                        text-white
                                        bg-indigo-600
                                        hover:bg-indigo-700
                                        focus:outline-none
                                        focus:ring-2
                                        focus:ring-offset-2
                                        focus:ring-indigo-500
                                    "
                                >
                                    {{ $t("Save") }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import { defineComponent } from "vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import { useForm, Link } from "@inertiajs/inertia-vue3";
import SearchSelect from "../../components/SearchSelect.vue";

export default defineComponent({
    props: {
        items: Object,
        errors: Object,
    },
    components: {
        AppLayout,
        SearchSelect,
        Link
    },
    computed: {
        getSubtotal() {
            return this.newInvoiceForm.items.reduce(
                (a, b) => a + b.subtotal,
                0
            );
        },
        getVat() {
            return this.newInvoiceForm.items.reduce((a, b) => a + b.vat, 0);
        },
        getTotal() {
            return this.getSubtotal + this.getVat;
        },
    },
    data() {
        return {
            newInvoiceForm: useForm({
                title: "",
                to: "",
                address: "",
                toContact: "",
                notes: "",
                subtotal: 0,
                vat: 0,
                total: 0,
                items: [
                    {
                        item: "",
                        quantity: "",
                        subtotal: 0,
                        vat: 0,
                        total: 0,
                    },
                ],
            }),
        };
    },
    methods: {
        submitForm() {
            this.newInvoiceForm
                .transform((data) => ({
                    ...data,
                    subtotal: this.getSubtotal,
                    vat: this.getVat,
                    total: this.getTotal,
                }))
                .post(route("invoices.store"), {
                    preserveScroll: true,
                });
        },
        addItem() {
            this.newInvoiceForm.items.push({
                item: "",
                quantity: "",
                subtotal: 0,
                vat: 0,
                total: 0,
            });
        },
        deleteItem(index) {
            if (this.newInvoiceForm.items.length > 1)
                this.newInvoiceForm.items.splice(index, 1);
        },
        redirectBack() {
            if (
                confirm(
                    "Are you sure you want to navigate away from this page?"
                )
            ) {
                history.go(-1);
            }
        },
        updateSelectedItem(index, event) {
            this.newInvoiceForm.items[index].item = event;
            if (this.newInvoiceForm.items[index].quantity) {
                let subtotal = item.item.unitPrice * item.quantity;
                let vat = item.item.unitPrice * item.quantity * 0.15;
                let total = subtotal + vat;

                item.subtotal = subtotal;
                item.vat = vat;
                item.total = total;
            }
        },
        updateNumbers(item, event) {
            item.quantity = event.target.value;
            if (item.item.unitPrice) {
                let subtotal =
                    parseInt(item.item.unitPrice) * event.target.value;
                let vat =
                    parseInt(item.item.unitPrice) * event.target.value * 0.15;
                let total = subtotal + (!item.item.vatInclusive ? vat : 0);

                item.subtotal = subtotal;
                item.vat = !item.item.vatInclusive ? vat : 0;
                item.total = total;
            } else {
                alert("not sufficient");
            }
        },
    },
});
</script>
