<!-- This example requires Tailwind CSS v2.0+ -->
<template>
    <div :class="{'rounded-md  p-4 my-7': true, 'bg-red-50': type === 'danger', 'bg-green-50': type === 'success'}" v-show="message && open">
        <div class="flex">
            <div class="flex-shrink-0">
                <CheckCircleIcon :class="{'h-5 w-5': true, 'text-green-500':type === 'success', 'text-red-400': type === 'danger'}" aria-hidden="true" />
            </div>
            <div class="ml-3">
                <p :class="{'text-sm font-medium':true, 'text-green-500':type === 'success', 'text-red-800': type === 'danger'}">{{ message }}</p>
            </div>
            <div class="ltr:ml-auto rtl:mr-auto pl-3">
                <div class="-mx-1.5 -my-1.5">
                    <button @click="closeAlert" type="button" :class="{'inline-flex rounded-md p-1.5  focus:outline-none focus:ring-2 focus:ring-offset-2  ':true, 'text-green-500 focus:ring-offset-green-50 focus:ring-green-600 hover:bg-green-100':type === 'success', 'bg-red-50 text-red-500 focus:ring-red-600 focus:ring-offset-red-50 hover:bg-red-100': type === 'danger'}">
                        <span class="sr-only">Dismiss</span>
                        <XIcon class="h-5 w-5" aria-hidden="true" />
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { CheckCircleIcon, XIcon } from '@heroicons/vue/solid'

export default {
    props:{
        message: Object,
        type: Object
    },
    watch:{
        message: function (newVal, oldVal){
            this.open = true;
        }
    },
    data(){
        return {
            open: true
        }
    },
    components: {
        CheckCircleIcon,
        XIcon,
    },
    methods: {
        closeAlert(){
            if(this.type === 'success'){
                this.$page.props.flash = {}
            }else{
                this.$page.props.errors = {}
            }
        }
    }
}
</script>
