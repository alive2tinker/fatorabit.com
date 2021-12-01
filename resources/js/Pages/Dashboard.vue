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
                <!-- This example requires Tailwind CSS v2.0+ -->
                <div
                    class="
                        relative
                        bg-gray-50
                        pt-16
                        pb-20
                        px-4
                        mt-5
                        sm:px-6
                        lg:pt-24 lg:pb-28 lg:px-8
                    "
                >
                    <div class="absolute inset-0">
                        <div class="bg-white rounded-md h-1/3 sm:h-2/3"></div>
                    </div>
                    <div class="relative max-w-7xl mx-auto">
                        <div class="text-center">
                            <h2
                                class="
                                    text-3xl
                                    tracking-tight
                                    font-extrabold
                                    text-gray-900
                                    sm:text-4xl
                                "
                            >
                                {{ $t('From the blog')}}
                            </h2>
                            <p
                                class="
                                    mt-3
                                    max-w-2xl
                                    mx-auto
                                    text-xl text-gray-500
                                    sm:mt-4
                                "
                            >
                                {{ $t('Tips and tricks on how to master invoice creation successfully')}}
                            </p>
                        </div>
                        <div
                            class="
                                mt-12
                                max-w-lg
                                mx-auto
                                grid
                                gap-5
                                lg:grid-cols-3 lg:max-w-none
                            "
                        >
                            <div
                                class="
                                    flex flex-col
                                    rounded-lg
                                    shadow-lg
                                    overflow-hidden
                                "
                                v-for="post in $page.props.posts.data"
                                :key="post.id"
                            >
                                <div
                                    class="
                                        flex-1
                                        bg-white
                                        p-6
                                        flex flex-col
                                        justify-between
                                    "
                                >
                                    <div class="flex-1">
                                        <p
                                            class="
                                                text-sm
                                                font-medium
                                                text-indigo-600
                                            "
                                        >
                                            <a v-for="category in post.categories" :key="category.id" href="#" class="hover:underline">
                                                {{ category.name }},
                                            </a>
                                        </p>
                                        <div  class="block mt-2">
                                            <Link
                                                :href="route('posts.show', post.id)"
                                                class="
                                                    text-xl
                                                    font-semibold
                                                    text-gray-900
                                                "
                                            >
                                                {{ post.title }}
                                            </Link>
                                            <p
                                                class="
                                                    mt-3
                                                    text-base text-gray-500
                                                "
                                                v-html="post.body.substring(0,100)"
                                            >

                                            </p>
                                        </div>
                                    </div>
                                    <div class="mt-6 flex items-center">
                                        <div class="flex-shrink-0">
                                            <a href="#">
                                                <span class="sr-only"
                                                >{{ post.user.name }}</span
                                                >
                                                <img
                                                    class="
                                                        h-10
                                                        w-10
                                                        rounded-full
                                                    "
                                                    src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                                    alt=""
                                                />
                                            </a>
                                        </div>
                                        <div class="ml-3">
                                            <p
                                                class="
                                                    text-sm
                                                    font-medium
                                                    text-gray-900
                                                "
                                            >
                                                <a
                                                    href="#"
                                                    class="hover:underline"
                                                >
                                                    {{ post.user.name }}
                                                </a>
                                            </p>
                                            <div
                                                class="
                                                    flex
                                                    space-x-1
                                                    text-sm text-gray-500
                                                "
                                            >
                                                <time datetime="2020-03-16">
                                                    {{ post.created_at }}
                                                </time>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import { defineComponent } from "vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import DashboardStats from "@/components/DashboardStats.vue";
import { Link } from '@inertiajs/inertia-vue3'

export default defineComponent({
    components: {
        AppLayout,
        DashboardStats,
        Link
    },
});
</script>
