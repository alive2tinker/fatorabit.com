<template>
<app-layout :title="$t('Customers')">
    <template #header>
        <div>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight inline mt-3">
                {{ $t("Customers") }}
            </h2>
        </div>
    </template>
    <div class="py-12">
        <div class="max-w-7xl mx-auto px-2">
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
                                                    rtl:text-right
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
                                                    rtl:text-right
                                                "
                    >
                        {{ $t('Address')}}
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
                                                    rtl:text-right
                                                "
                    >
                        {{ $t('Phone')}}
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
                                                    rtl:text-right
                                                "
                    >
                        {{ $t('VAT Number')}}
                    </th>
                </tr>
                </thead>
                <tbody>
                <tr
                    v-for="(customer, index) in customers.data"
                    :key="customer.id"
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
                        {{ customer.name }}
                    </td>
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
                        {{ customer.address }}
                    </td>
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
                        {{ customer.phone }}
                    </td>
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
                        {{ customer.vatRegistration }}
                    </td>
                </tr>
                </tbody>
            </table>
            <TailwindPaginator :meta="customers.meta" />
        </div>
    </div>
</app-layout>
</template>

<script>
import AppLayout from "../../Layouts/AppLayout";
import TailwindPaginator from "../../components/TailwindPaginator";
export default {
    props:{
        customers: Object
    },
    name: "Index",
    components:{
        AppLayout,
        TailwindPaginator
    }
}
</script>

<style scoped>

</style>
