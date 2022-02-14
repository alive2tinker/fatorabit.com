<template>
    <app-layout :title="$t('Subscription Upgrade')">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $t("Subscription Upgrade") }}
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <!-- This example requires Tailwind CSS v2.0+ -->
                <div class="bg-gray-900">
                    <div class="pt-12 sm:pt-16 lg:pt-24">
                        <div class="max-w-7xl mx-auto text-center px-4 sm:px-6 lg:px-8">
                            <div class="max-w-3xl mx-auto space-y-2 lg:max-w-none">
                                <h2 class="text-lg leading-6 font-semibold text-gray-300 uppercase tracking-wider">{{ $t('Pricing') }}</h2>
                                <p class="text-3xl font-extrabold text-white sm:text-4xl lg:text-5xl">{{ $t('The right price for you, whoever you are') }}</p>
                                <p class="text-xl text-gray-300">{{ $t('choose between our flexible package to get things done') }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="mt-8 pb-12 bg-gray-50 sm:mt-12 sm:pb-16 lg:mt-16 lg:pb-24">
                        <div class="relative">
                            <div class="absolute inset-0 h-3/4 bg-gray-900"></div>
                            <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                                <div class="max-w-md mx-auto space-y-4 lg:max-w-5xl lg:grid lg:grid-cols-2 lg:gap-5 lg:space-y-0">
                                    <div class="flex flex-col rounded-lg shadow-lg overflow-hidden">
                                        <div class="px-6 py-8 bg-white sm:p-10 sm:pb-6">
                                            <div>
                                                <h3 class="inline-flex px-4 py-1 rounded-full text-sm font-semibold tracking-wide uppercase bg-teal-100 text-teal-600" id="tier-standard">{{ $t('Standard') }}</h3>
                                            </div>
                                            <div class="mt-4 flex items-baseline text-6xl font-extrabold">
                                                 500
                                                <span class="ml-1 text-2xl font-medium text-gray-500 rtl:ms-3"> {{ $t('SAR')}} {{ $t('Annually')}} </span>
                                            </div>
                                            <p class="mt-5 text-lg text-gray-500">{{ $t('The very basic package to get you started with meeting ZATCA requirements') }}</p>
                                        </div>
                                        <div class="flex-1 flex flex-col justify-between px-6 pt-6 pb-8 bg-gray-50 space-y-6 sm:p-10 sm:pt-6">
                                            <ul role="list" class="space-y-4">
                                                <li class="flex items-start">
                                                    <div class="flex-shrink-0">
                                                        <!-- Heroicon name: outline/check -->
                                                        <svg class="h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                                        </svg>
                                                    </div>
                                                    <p class="ml-3 text-base text-gray-700">{{ $t('50 Invoices only') }}</p>
                                                </li>

                                                <li class="flex items-start">
                                                    <div class="flex-shrink-0">
                                                        <!-- Heroicon name: outline/check -->
                                                        <svg class="h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                                        </svg>
                                                    </div>
                                                    <p class="ml-3 text-base text-gray-700">{{ $t('Integrated directly with ZATCA') }}</p>
                                                </li>

                                                <li class="flex items-start">
                                                    <div class="flex-shrink-0">
                                                        <!-- Heroicon name: outline/check -->
                                                        <svg class="h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                                        </svg>
                                                    </div>
                                                    <p class="ml-3 text-base text-gray-700">{{ $t('Email Support') }}</p>
                                                </li>

                                                <li class="flex items-start">
                                                    <div class="flex-shrink-0">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                        </svg>
                                                    </div>
                                                    <p class="ml-3 text-base text-gray-700">{{ $t('No API Itegration Available') }}</p>
                                                </li>
                                            </ul>
                                            <div class="rounded-md shadow">
                                                <a href="#" class="flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-teal-800 hover:bg-cyan-700" aria-describedby="tier-standard" @click="initPayment(500)">{{ $t(' Get started ') }}</a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="flex flex-col rounded-lg shadow-lg overflow-hidden">
                                        <div class="px-6 py-8 bg-white sm:p-10 sm:pb-6">
                                            <div>
                                                <h3 class="inline-flex px-4 py-1 rounded-full text-sm font-semibold tracking-wide uppercase bg-teal-100 text-teal-600" id="tier-standard">{{ $t('Enterprise') }}</h3>
                                            </div>
                                            <div class="mt-4 flex items-baseline text-6xl font-extrabold">
                                                880
                                                <span class="ml-1 text-2xl font-medium text-gray-500 rtl:ms-3"> {{ $t('SAR')}} {{ $t('Annually')}} </span>
                                            </div>
                                            <p class="mt-5 text-lg text-gray-500">{{ $t('Fully fledge package that will suites your invoicing needs.') }}</p>
                                        </div>
                                        <div class="flex-1 flex flex-col justify-between px-6 pt-6 pb-8 bg-gray-50 space-y-6 sm:p-10 sm:pt-6">
                                            <ul role="list" class="space-y-4">
                                                <li class="flex items-start">
                                                    <div class="flex-shrink-0">
                                                        <!-- Heroicon name: outline/check -->
                                                        <svg class="h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                                        </svg>
                                                    </div>
                                                    <p class="ml-3 text-base text-gray-700">{{ $t('Unlimited invoices & items') }}</p>
                                                </li>

                                                <li class="flex items-start">
                                                    <div class="flex-shrink-0">
                                                        <!-- Heroicon name: outline/check -->
                                                        <svg class="h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                                        </svg>
                                                    </div>
                                                    <p class="ml-3 text-base text-gray-700">{{ $t('Integrated directly with ZATCA') }}</p>
                                                </li>

                                                <li class="flex items-start">
                                                    <div class="flex-shrink-0">
                                                        <!-- Heroicon name: outline/check -->
                                                        <svg class="h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                                        </svg>
                                                    </div>
                                                    <p class="ml-3 text-base text-gray-700">{{ $t('24/7 Priority Email Support') }}</p>
                                                </li>

                                                <li class="flex items-start">
                                                    <div class="flex-shrink-0">
                                                        <!-- Heroicon name: outline/check -->
                                                        <svg class="h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                                        </svg>
                                                    </div>
                                                    <p class="ml-3 text-base text-gray-700">{{ $t('Available for all devices.') }}</p>
                                                </li>

                                                <li class="flex items-start">
                                                    <div class="flex-shrink-0">
                                                        <!-- Heroicon name: outline/check -->
                                                        <svg class="h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                                        </svg>
                                                    </div>
                                                    <p class="ml-3 text-base text-gray-700">{{ $t('API is available.') }}</p>
                                                </li>
                                            </ul>
                                            <div class="rounded-md shadow">
                                                <a href="#" class="flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-teal-800 hover:bg-cyan-700" aria-describedby="tier-standard" @click="initPayment(880)">{{ $t(' Get started ') }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 lg:mt-5">
                            <div class="max-w-md mx-auto lg:max-w-5xl">
                                <div class="rounded-lg bg-gray-100 px-6 py-8 sm:p-10 lg:flex lg:items-center">
                                    <div class="flex-1">
                                        <div>
                                            <h3 class="inline-flex px-4 py-1 rounded-full text-sm font-semibold tracking-wide uppercase bg-white text-gray-800">{{ $t('Something Else') }}</h3>
                                        </div>
                                        <div class="mt-4 text-lg text-gray-600">{{ $t("kindly contact us to discuss how we can help you with your invoicing needs")}}{{ $t('.') }}</div>
                                    </div>
                                    <div class="mt-6 rounded-md shadow lg:mt-0 lg:ml-10 lg:flex-shrink-0">
                                        <a href="#" class="flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-gray-900 bg-white hover:bg-gray-50">{{ $t('Contact Us') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- This example requires Tailwind CSS v2.0+ -->
        <div class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true" v-show="paymentModalOpen">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <!--
                  Background overlay, show/hide based on modal state.

                  Entering: "ease-out duration-300"
                    From: "opacity-0"
                    To: "opacity-100"
                  Leaving: "ease-in duration-200"
                    From: "opacity-100"
                    To: "opacity-0"
                -->
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

                <!-- This element is to trick the browser into centering the modal contents. -->
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

                <!--
                  Modal panel, show/hide based on modal state.

                  Entering: "ease-out duration-300"
                    From: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    To: "opacity-100 translate-y-0 sm:scale-100"
                  Leaving: "ease-in duration-200"
                    From: "opacity-100 translate-y-0 sm:scale-100"
                    To: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                -->
                <div class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6">
                    <div>
                        <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-teal-100">
                            <!-- header -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z" />
                                <path fill-rule="evenodd" d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="mt-3 text-center sm:mt-5">
                            <div class="moyasar-payment"></div>
                            <p>{{ $page.props.user.uuid }}</p>
                            <input type="hidden" :value="$page.props.user.uuid" id="userUUID">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from "../../Layouts/AppLayout";
import { defineComponent } from 'vue'
import axios from 'axios';

export default defineComponent({
    name: "Upgrade",
    components: {AppLayout},
    data(){
        return {
            paymentModalOpen: false,
        }
    },
    methods:{
        initPayment(amount){
            Moyasar.init({
                // Required
                // Specify where to render the form
                // Can be a valid CSS selector and a reference to a DOM element
                element: '.moyasar-payment',

                // Required
                // Amount in the smallest currency unit
                // For example:
                // 10 SAR = 10 * 100 Halalas
                // 10 KWD = 10 * 1000 Fils
                // 10 JPY = 10 JPY (Japanese Yen does not have fractions)
                amount: amount * 100,

                // Required
                // Currency of the payment transation
                currency: 'SAR',

                // Required
                // A small description of the current payment process
                description: this.$t('fatorabit bit subscription payment'),

                // Required
                publishable_api_key: 'pk_test_sa2YmcqYnuzb1LFbax2GRRKqGEuoipbunznYP8Vc',

                // Required
                // This URL is used to redirect the user when payment process has completed
                // Payment can be either a success or a failure, which you need to verify on you system (We will show this in a couple of lines)
                callback_url: 'https://fatorabit.com.test/confirm-payment',

                // Optional
                // Required payments methods
                // Default: ['creditcard', 'applepay', 'stcpay']
                methods: [
                    'creditcard',
                ],
                language: 'ar',
                on_completed: function(payment){
                    let uuid = document.getElementById('userUUID').value;
                    console.log(`from inside on_completed: ${uuid}`)
                    return new Promise(function (resolve, reject) {
                        // This is just an example, provide anything you want here
                        axios.post('https://fatorabit.com.test/api/save-payment', {payment: payment, user: uuid
                            }).then(() => {
                            resolve({})
                        }).catch((error) => {
                            reject();
                        })
                    });
                }
            });
            this.paymentModalOpen = true;
        }
    }
});
</script>

<style scoped>

</style>
