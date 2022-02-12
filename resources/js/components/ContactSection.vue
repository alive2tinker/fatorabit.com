<!--
  This example requires Tailwind CSS v2.0+ 
  
  This example requires some changes to your config:
  
  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/forms'),
    ],
  }
  ```
-->
<template>
  <div class="relative bg-white">
    <div class="absolute inset-0">
      <div class="absolute inset-y-0 left-0 w-1/2 bg-gray-50" />
    </div>
    <div class="relative max-w-7xl mx-auto lg:grid lg:grid-cols-5">
      <div class="bg-gray-50 py-16 px-4 sm:px-6 lg:col-span-2 lg:px-8 lg:py-24 xl:pr-12">
        <div class="max-w-lg mx-auto">
          <h2 class="text-2xl font-extrabold tracking-tight text-gray-900 sm:text-3xl">{{ $t('Get in touch') }}</h2>
          <p class="mt-3 text-lg leading-6 text-gray-500">{{ $t("if you need anything, please don't heistate") }}</p>
          <dl class="mt-8 text-base text-gray-500">
            <div>
              <dt class="sr-only">{{ $t('Postal address') }}</dt>
              <dd>
                <p>{{ $t("king abdullah St.") }}</p>
                <p>{{ $t("Riyadh, Saudi Arabia") }}</p>
              </dd>
            </div>
            <div class="mt-6">
              <dt class="sr-only">{{ $t('Phone number') }}</dt>
              <dd class="flex">
                <PhoneIcon class="flex-shrink-0 h-6 w-6 text-gray-400" aria-hidden="true" />
                <span class="ml-3"> 0500872819 </span>
              </dd>
            </div>
            <div class="mt-3">
              <dt class="sr-only">Email</dt>
              <dd class="flex">
                <MailIcon class="flex-shrink-0 h-6 w-6 text-gray-400" aria-hidden="true" />
                <span class="ml-3"> support@fatorabit.com </span>
              </dd>
            </div>
          </dl>
        </div>
      </div>
      <div class="bg-white py-16 px-4 sm:px-6 lg:col-span-3 lg:py-24 lg:px-8 xl:pl-12">
        <!-- This example requires Tailwind CSS v2.0+ -->
<div class="rounded-md bg-green-50 p-4 my-4" v-if="formSuccessful">
  <div class="flex" >
    <div class="flex-shrink-0">
      <!-- Heroicon name: solid/check-circle -->
      <svg class="h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
      </svg>
    </div>
    <div class="ml-3">
      <p class="text-sm font-medium text-green-800">{{ $t('Successfully Submitted') }}</p>
    </div>
    <div class="ml-auto pl-3">
      <div class="-mx-1.5 -my-1.5">
        <button type="button" @click="formSuccessful = false" class="inline-flex bg-green-50 rounded-md p-1.5 text-green-500 hover:bg-green-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-green-50 focus:ring-green-600">
          <span class="sr-only">Dismiss</span>
          <!-- Heroicon name: solid/x -->
          <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
          </svg>
        </button>
      </div>
    </div>
  </div>
</div>

        <div class="max-w-lg mx-auto lg:max-w-none">
          <form action="#" method="POST" class="grid grid-cols-1 gap-y-6">
            <div>
              <label for="full-name" class="sr-only">Full name</label>
              <input type="text" v-model="form.name" id="full-name" autocomplete="name" :class="{'block w-full shadow-sm py-3 px-4 placeholder-gray-500 focus:ring-teal-500 focus:border-teal-500 border-gray-300 rounded-md':true, 'border-red-500': $page.props.errors.name}" :placeholder="$t('Full name')" />
              <p class="text-sm text-red-500" v-if="$page.props.errors.name">{{ $page.props.errors.name }}</p>
            </div>
            <div>
              <label for="email" class="sr-only">Email</label>
              <input id="email" v-model="form.email" type="email" autocomplete="email" :class="{'block w-full shadow-sm py-3 px-4 placeholder-gray-500 focus:ring-teal-500 focus:border-teal-500 border-gray-300 rounded-md':true, 'border-red-500': $page.props.errors.email}" :placeholder="$t('Email')" />
              <p class="text-sm text-red-500" v-if="$page.props.errors.email">{{ $page.props.errors.email }}</p>
            </div>
            <div>
              <label for="phone" class="sr-only">Phone</label>
              <input type="text" v-model="form.phone" id="phone" autocomplete="tel" :class="{'block w-full shadow-sm py-3 px-4 placeholder-gray-500 focus:ring-teal-500 focus:border-teal-500 border-gray-300 rounded-md':true, 'border-red-500': $page.props.errors.phone}" :placeholder="$t('Phone')" />
              <p class="text-sm text-red-500" v-if="$page.props.errors.phone">{{ $page.props.errors.phone }}</p>
            </div>
            <div>
              <label for="message" class="sr-only">Message</label>
              <textarea id="message" v-model="form.message" rows="4" :class="{'block w-full shadow-sm py-3 px-4 placeholder-gray-500 focus:ring-teal-500 focus:border-teal-500 border border-gray-300 rounded-md':true, 'border-red-500': $page.props.errors.message}" :placeholder="$t('Message')" />
              <p class="text-sm text-red-500" v-if="$page.props.errors.message">{{ $page.props.errors.message }}</p>
            </div>
            <div>
              <button type="button" @click="sendMessage" class="inline-flex justify-center py-3 px-6 border border-transparent shadow-sm text-base font-medium rounded-md text-white bg-teal-600 hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500">{{ $t('Submit') }}</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { MailIcon, PhoneIcon } from '@heroicons/vue/outline'
import { useForm } from '@inertiajs/inertia-vue3'

export default {
  components: {
    MailIcon,
    PhoneIcon,
  },
  data(){
    return {
      formSuccessful: false,
      form: useForm({
        name: '',
        email: '',
        phone: '',
        message: ''
      })
    }
  },
  methods: {
    sendMessage(){
      console.log(route('contacts.store'));
      this.form.post(route('contacts.store'), {
        preserveScroll: true,
        onSuccess: () => this.formSuccessful = true,
      })
    }
  }
}
</script>