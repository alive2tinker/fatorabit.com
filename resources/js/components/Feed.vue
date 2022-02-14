<!-- This example requires Tailwind CSS v2.0+ -->
<template>
    <div>
        <h1 class="my-4">{{ $t("Latest Activity") }}</h1>
        <div class="flow-root my-4">
            <ul role="list" class="-mb-8" v-if="activities.length > 0">
                <li v-for="(activity, index) in activities" :key="activity.id">
                    <div class="relative pb-8">
                        <span
                            v-if="index !== activities.length - 1"
                            class="absolute top-4 ltr:left-4 rtl:right-6 -ml-px h-full w-0.5 bg-gray-200"
                            aria-hidden="true"
                        />
                        <div class="relative flex space-x-3">
                            <div>
                                <span
                                    :class="[
                                        'h-10 w-10 rounded-full flex items-center bg-teal-500 text-white justify-center ring-8 ring-white',
                                    ]"
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
                                            d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"
                                        />
                                    </svg>
                                </span>
                            </div>
                            <div
                                class="min-w-0 flex-1 pt-1.5 flex justify-between space-x-4"
                            >
                                <div>
                                    <p class="text-sm text-gray-500 ps-4">
                                        {{ activity.causer.name }}
                                        {{ $t(activity.description) }}
                                        {{
                                            activity.subject_type.split("\\")[2]
                                        }}
                                        {{
                                            activity.properties.attributes
                                                ?.title
                                        }}
                                    </p>
                                </div>
                                <div
                                    class="text-right text-sm whitespace-nowrap text-gray-500"
                                >
                                    <time :datetime="activity.created_at">{{
                                        formatDate(activity.created_at)
                                    }}</time>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
            <!-- This example requires Tailwind CSS v2.0+ -->
<div v-else class="relative block w-full border-2 border-gray-300 border-dashed rounded-lg p-12 text-center hover:border-gray-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
  <svg class="mx-auto h-12 w-12 text-gray-400" xmlns="http://www.w3.org/2000/svg" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 14v20c0 4.418 7.163 8 16 8 1.381 0 2.721-.087 4-.252M8 14c0 4.418 7.163 8 16 8s16-3.582 16-8M8 14c0-4.418 7.163-8 16-8s16 3.582 16 8m0 0v14m0-4c0 4.418-7.163 8-16 8S8 28.418 8 24m32 10v6m0 0v6m0-6h6m-6 0h-6" />
  </svg>
  <span class="mt-2 block text-sm font-medium text-gray-900">{{ $t('No activities yet')}} </span>
</div>

        </div>
    </div>
</template>

<script>
export default {
    props: {
        activities: Object,
    },
    methods: {
        formatDate(ogDate) {
            let date = new Date(ogDate);
            return `${date.toDateString()} ${date.getHours()}:${date.getMinutes()}:${date.getSeconds()}`;
        },
    },
};
</script>
