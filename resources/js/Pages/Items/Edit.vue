<template>
    <app-layout :title="`${$t('Edit')} ${item.data.name}`">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $t("New Item") }}
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white rounded-md shadow-md p-4">
                    <form
                        class="space-y-8 divide-y divide-gray-200"
                        @submit.prevent="submitForm"
                    >
                        <div
                            class="
                                space-y-8
                                divide-y divide-gray-200
                                sm:space-y-5
                            "
                        >
                            <div class="pt-8 space-y-6 sm:pt-10 sm:space-y-5">
                                <div>
                                    <h3
                                        class="
                                            text-lg
                                            leading-6
                                            font-medium
                                            text-gray-900
                                        "
                                    >
                                        {{ $t("Item Details") }}
                                    </h3>
                                    <p
                                        class="
                                            mt-1
                                            max-w-2xl
                                            text-sm text-gray-500
                                        "
                                    >
                                        {{
                                            $t(
                                                "critical details such as unit price and is it vat inclusive"
                                            )
                                        }}
                                    </p>
                                </div>
                                <div class="space-y-6 sm:space-y-5">
                                    <div
                                        class="
                                            sm:grid
                                            sm:grid-cols-3
                                            sm:gap-4
                                            sm:items-start
                                            sm:border-t
                                            sm:border-gray-200
                                            sm:pt-5
                                        "
                                    >
                                        <label
                                            for="first-name"
                                            class="
                                                block
                                                text-sm
                                                font-medium
                                                text-gray-700
                                                sm:mt-px sm:pt-2
                                            "
                                        >
                                            {{ $t("Item Name") }}
                                        </label>
                                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                                            <input
                                                type="text"
                                                id="first-name"
                                                autocomplete="given-name"
                                                class="
                                                    max-w-lg
                                                    block
                                                    w-full
                                                    shadow-sm
                                                    focus:ring-teal-500
                                                    focus:border-teal-500
                                                    sm:max-w-xs sm:text-sm
                                                    border-gray-300
                                                    rounded-md
                                                "
                                                v-model="newItemForm.name"
                                            />
                                        </div>
                                    </div>

                                    <div
                                        class="
                                            sm:grid
                                            sm:grid-cols-3
                                            sm:gap-4
                                            sm:items-start
                                            sm:border-t
                                            sm:border-gray-200
                                            sm:pt-5
                                        "
                                    >
                                        <label
                                            for="last-name"
                                            class="
                                                block
                                                text-sm
                                                font-medium
                                                text-gray-700
                                                sm:mt-px sm:pt-2
                                            "
                                        >
                                            {{ $t("Item Unit Price") }}
                                        </label>
                                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                                            <input
                                                type="text"
                                                id="last-name"
                                                autocomplete="family-name"
                                                class="
                                                    max-w-lg
                                                    block
                                                    w-full
                                                    shadow-sm
                                                    focus:ring-teal-500
                                                    focus:border-teal-500
                                                    sm:max-w-xs sm:text-sm
                                                    border-gray-300
                                                    rounded-md
                                                "
                                                v-model="newItemForm.unitPrice"
                                            />
                                        </div>
                                    </div>

                                    <div
                                        class="
                                            sm:grid
                                            sm:grid-cols-3
                                            sm:gap-4
                                            sm:items-start
                                            sm:border-t
                                            sm:border-gray-200
                                            sm:pt-5
                                        "
                                    >
                                        <label
                                            for="email"
                                            class="
                                                block
                                                text-sm
                                                font-medium
                                                text-gray-700
                                                sm:mt-px sm:pt-2
                                            "
                                        >
                                            {{ $t("Is Item VAT inclusive?") }}
                                        </label>
                                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                                            <select
                                                class="
                                                    block
                                                    max-w-lg
                                                    w-full
                                                    shadow-sm
                                                    focus:ring-teal-500
                                                    focus:border-teal-500
                                                    sm:text-sm
                                                    border-gray-300
                                                    rounded-md
                                                "
                                                v-model="
                                                    newItemForm.vatInclusive
                                                "
                                            >
                                                <option value="" selected>{{ $t('choose') }}</option>
                                                <option value="0">
                                                    {{ $t("No") }}
                                                </option>
                                                <option value="1">
                                                    {{ $t("Yes") }}
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div
                                class="
                                    divide-y divide-gray-200
                                    pt-8
                                    space-y-6
                                    sm:pt-10 sm:space-y-5
                                "
                            ></div>
                        </div>

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
                                        focus:ring-teal-500
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
                                        bg-teal-600
                                        hover:bg-teal-700
                                        focus:outline-none
                                        focus:ring-2
                                        focus:ring-offset-2
                                        focus:ring-teal-500
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
import { useForm } from "@inertiajs/inertia-vue3";

export default defineComponent({
    props: {
        item: Object
    },
    components: {
        AppLayout,
    },
    data() {
        return {
            newItemForm: useForm({
                name: this.item.data.name,
                unitPrice: this.item.data.unitPrice,
                vatInclusive: this.item.data.vatInclusive,
            }),
        };
    },
    methods: {
        submitForm() {
            return this.newItemForm.patch(route('items.update', this.item.data), {
                preserveScroll: true,
            });
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
    },
});
</script>
