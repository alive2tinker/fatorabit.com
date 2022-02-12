<!-- This example requires Tailwind CSS v2.0+ -->
<template>
    <div>
        <h1 class="my-4">{{ $t("Latest Activity") }}</h1>
        <div class="flow-root my-4">
            <ul role="list" class="-mb-8">
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
