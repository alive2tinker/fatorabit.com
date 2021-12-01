<template>
    <div class="max-w-7xl mx-auto sm:px-6 mt-5 lg:px-8">
        <!-- This example requires Tailwind CSS v2.0+ -->
    <div class="rounded-md bg-green-50 p-4" v-if="alert.success && shown">
        <div class="flex">
            <div class="flex-shrink-0">
                <!-- Heroicon name: solid/check-circle -->
                <svg
                    class="h-5 w-5 text-green-400"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20"
                    fill="currentColor"
                    aria-hidden="true"
                >
                    <path
                        fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                        clip-rule="evenodd"
                    />
                </svg>
            </div>
            <div class="ml-3">
                <h3 class="text-sm font-medium text-green-800">
                    {{ alert.success }}
                </h3>
                <div class="mt-2 text-sm text-green-700">
                </div>
                <div class="mt-4">
                    <div class="-mx-2 -my-1.5 flex">
                        <button
                            @click="shown = false"
                            type="button"
                            class="
                                ml-3
                                bg-green-50
                                px-2
                                py-1.5
                                rounded-md
                                text-sm
                                font-medium
                                text-green-800
                                hover:bg-green-100
                                focus:outline-none
                                focus:ring-2
                                focus:ring-offset-2
                                focus:ring-offset-green-50
                                focus:ring-green-600
                            "
                        >
                            {{ $t('Dismiss')}}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- This example requires Tailwind CSS v2.0+ -->
<div class="rounded-md bg-red-50 p-4" v-if="this.errors.length > 0">
  <div class="flex">
    <div class="flex-shrink-0">
      <!-- Heroicon name: solid/x-circle -->
      <svg class="h-5 w-5 text-red-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
      </svg>
    </div>
    <div class="ml-3">
      <h3 class="text-sm font-medium text-red-800">
        There were {{ errors.length }} errors with your submission
      </h3>
      <div class="mt-2 text-sm text-red-700">
        <ul role="list" class="list-disc pl-5 space-y-1">
          <li v-for="(error, index) in $page.props.errors" :key="index">
            Your password must be at least 8 characters
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>

    </div>
</template>
<script>
import { defineComponent } from "vue";
export default defineComponent({
    props: {
        alert: Object,
        errors: Object
    },
    data(){
        return {
            shown: true
        }
    },
    mounted() {
        console.log(this.alert);
    },
});
</script>
