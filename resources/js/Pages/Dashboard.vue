<template>
    <app-layout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $t("Dashboard") }}
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <dashboard-stats :stats="$page.props.stats" />
                <Feed :activities="activities"/>                
            </div>
        </div>
    </app-layout>
</template>

<script>
import { defineComponent } from "vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import DashboardStats from "@/components/DashboardStats.vue";
import { Link } from '@inertiajs/inertia-vue3'
import Feed from '@/components/Feed.vue';

export default defineComponent({
    props:{
        activities: Object
    },
    components: {
        AppLayout,
        DashboardStats,
        Link,
        Feed
    },
});
</script>
