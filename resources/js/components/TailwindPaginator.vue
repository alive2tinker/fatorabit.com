<!-- This example requires Tailwind CSS v2.0+ -->
<template>
    <nav class="border-t border-gray-200 px-4 flex items-center justify-between sm:px-0">
        <div class="-mt-px w-0 flex-1 flex">
            <a :href="meta.links[0].url" class="border-t-2 border-transparent pt-4 pr-1 inline-flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300">
                <ArrowNarrowLeftIcon class="mr-3 h-5 w-5 text-gray-400" aria-hidden="true" />
                {{ $t('Previous')}}
            </a>
        </div>
        <div class="hidden md:-mt-px md:flex">
            <a v-for="(link, index) in pages" :key="index" :href="link.url" :class="{'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 border-t-2 pt-4 px-4 inline-flex items-center text-sm font-medium': !link.active, 'border-teal-500 text-teal-600 border-t-2 pt-4 px-4 inline-flex items-center text-sm font-medium': link.active}">
                {{ link.label }}
            </a>
        </div>
        <div class="-mt-px w-0 flex-1 flex justify-end">
            <a :href="meta.links[meta.links.length -1].url" class="border-t-2 border-transparent pt-4 pl-1 inline-flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300">
                {{ $t('Next')}}
                <ArrowNarrowRightIcon class="ml-3 h-5 w-5 text-gray-400" aria-hidden="true" />
            </a>
        </div>
    </nav>
</template>

<script>
import { ArrowNarrowLeftIcon, ArrowNarrowRightIcon } from '@heroicons/vue/solid'

export default {
    props: ['meta'],
    components: {
        ArrowNarrowLeftIcon,
        ArrowNarrowRightIcon,
    },
    computed: {
        pages: {
            get(){
                var pages = this.meta.links;
                pages.splice(0,1);
                pages.splice(this.meta.links.length -1, 1);
                return pages;
            }
        }
    }
}
</script>
