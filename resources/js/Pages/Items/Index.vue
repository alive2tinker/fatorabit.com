<template>
    <app-layout title="items">
        <template #header>
            <div class="flex justify-between">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight inline mt-3">
                {{ $t("Items") }}
            </h2>
            <Link :href="route('items.create')" v-if="items.data.length > 0" class="text-white bg-indigo-500 px-6 py-2 rounded">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
</svg>
            </Link>
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <!-- This example requires Tailwind CSS v2.0+ -->
                <div class="flex flex-col" v-if="items.data.length > 0">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div
                            class="
                                py-2
                                align-middle
                                inline-block
                                min-w-full
                                sm:px-6
                                lg:px-8
                            "
                        >
                            <div
                                class="
                                    shadow
                                    overflow-hidden
                                    border-b border-gray-200
                                    sm:rounded-lg
                                "
                            >
                                <table
                                    class="min-w-full divide-y divide-gray-200"
                                >
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th
                                                scope="col"
                                                class="
                                                    px-6
                                                    py-3
                                                    text-left text-xs
                                                    font-medium
                                                    text-gray-500
                                                    uppercase
                                                    tracking-wider
                                                "
                                            >
                                                {{ $t('Name')}}
                                            </th>
                                            <th
                                                scope="col"
                                                class="
                                                    px-6
                                                    py-3
                                                    text-left text-xs
                                                    font-medium
                                                    text-gray-500
                                                    uppercase
                                                    tracking-wider
                                                "
                                            >
                                                {{ $t('Unit Price')}}
                                            </th>
                                            <th
                                                scope="col"
                                                class="
                                                    px-6
                                                    py-3
                                                    text-left text-xs
                                                    font-medium
                                                    text-gray-500
                                                    uppercase
                                                    tracking-wider
                                                "
                                            >
                                                {{ $t('Vat Inclusive')}}
                                            </th>
                                            <th
                                                scope="col"
                                                class="
                                                    px-6
                                                    py-3
                                                    text-left text-xs
                                                    font-medium
                                                    text-gray-500
                                                    uppercase
                                                    tracking-wider
                                                "
                                            >
                                                {{ $t('Created')}}
                                            </th>
                                            <th
                                                scope="col"
                                                class="relative px-6 py-3"
                                            >
                                                <span class="sr-only"
                                                    >{{ $t('Edit') }}</span
                                                >
                                            </th>
                                            <th
                                                scope="col"
                                                class="relative px-6 py-3"
                                            >
                                                <span class="sr-only"
                                                    >{{ $t('Delete')}}</span
                                                >
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr
                                            v-for="(item, index) in items.data"
                                            :key="item.id"
                                            :class="
                                                index % 2 === 0
                                                    ? 'bg-white'
                                                    : 'bg-gray-50'
                                            "
                                        >
                                            <td
                                                class="
                                                    px-6
                                                    py-4
                                                    whitespace-nowrap
                                                    text-sm
                                                    font-medium
                                                    text-gray-900
                                                "
                                            >
                                                {{ item.name }}
                                            </td>
                                            <td
                                                class="
                                                    px-6
                                                    py-4
                                                    whitespace-nowrap
                                                    text-sm text-gray-500
                                                "
                                            >
                                                {{ item.unitPrice }}
                                            </td>
                                            <td
                                                class="
                                                    px-6
                                                    py-4
                                                    whitespace-nowrap
                                                    text-sm text-gray-500
                                                "
                                            >
                                                {{ item.vatInclusive }}
                                            </td>
                                            <td
                                                class="
                                                    px-6
                                                    py-4
                                                    whitespace-nowrap
                                                    text-sm text-gray-500
                                                "
                                            >
                                                {{ item.created }}
                                            </td>
                                            <td
                                                class="
                                                    px-6
                                                    py-4
                                                    whitespace-nowrap
                                                    text-right text-sm
                                                    font-medium
                                                "
                                            >
                                                <Link
                                                    :href="route('items.edit', item)"
                                                    class="
                                                        text-indigo-600
                                                        hover:text-indigo-900
                                                    "
                                                    >{{
                                                        $t("Edit")
                                                    }}</Link
                                                >
                                            </td>
                                            <td>
                                                <button
                                                    @click="deleteItem(item)"
                                                    class="
                                                        text-red-600
                                                        hover:text-red-900
                                                    "
                                                    >{{
                                                        $t("Delete")
                                                    }}</button
                                                >
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <tailwind-paginator :meta="items.meta"/>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- This example requires Tailwind CSS v2.0+ -->
                <Link
                    :href="route('items.create')"
                    v-else
                    class="
                        relative
                        block
                        w-full
                        border-2 border-gray-300 border-dashed
                        rounded-lg
                        p-12
                        text-center
                        hover:border-gray-400
                        focus:outline-none
                        focus:ring-2
                        focus:ring-offset-2
                        focus:ring-indigo-500
                    "
                >
                    <svg
                        class="mx-auto h-12 w-12 text-gray-400"
                        xmlns="http://www.w3.org/2000/svg"
                        stroke="currentColor"
                        fill="none"
                        viewBox="0 0 48 48"
                        aria-hidden="true"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M8 14v20c0 4.418 7.163 8 16 8 1.381 0 2.721-.087 4-.252M8 14c0 4.418 7.163 8 16 8s16-3.582 16-8M8 14c0-4.418 7.163-8 16-8s16 3.582 16 8m0 0v14m0-4c0 4.418-7.163 8-16 8S8 28.418 8 24m32 10v6m0 0v6m0-6h6m-6 0h-6"
                        />
                    </svg>
                    <span class="mt-2 block text-sm font-medium text-gray-900">
                        {{ $t('create your first item')}}
                    </span>
                </Link>
            </div>
        </div>
    </app-layout>
</template>

<script>
import { defineComponent } from "vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import { Link } from '@inertiajs/inertia-vue3'
import TailwindPaginator from "../../components/TailwindPaginator.vue";
export default defineComponent({
    props: {
        items: Array,
    },
    components: {
        AppLayout,
        Link,
        TailwindPaginator
    },
    data(){
        return {
            deleteForm: this.$inertia.form()
        }
    },
    methods:{
        deleteItem(item){

            this.deleteForm.delete(route('items.destroy', item), {
                preserveScroll: true
            });
        }
    }
});
</script>
