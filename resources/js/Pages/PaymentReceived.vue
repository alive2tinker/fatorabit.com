<template>
    <app-layout :title="$t('payment received')">
        <template #header>
            <div class="flex justify-between">
                <h2
                    class="font-semibold text-xl text-gray-800 leading-tight inline mt-3"
                >
                    {{ $t("Payment Received") }}
                </h2>
            </div>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto px-2 sm:px-4 lg:px-8">
                <div class="flex justify-center">
                    <div
                        class="bg-gradient-to-r from-teal-500 to-cyan-500 rounded-full h-24 w-24 text-white text-center flex justify-center pt-2.5"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-20 w-20 text-center"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"
                            />
                        </svg>
                    </div>
                </div>
                <div class="bg-white w-full py-5 -mt-4">
                    <h1 class="font-bold text-2xl text-gray-900 text-center">
                        {{ $t("Payment Received") }}
                    </h1>
                    <h4 class="text-center text-gray-700">
                        {{ $t("Thank you for your payment! we appreciate it") }}
                    </h4>
                    <div class="divide-y divide-gray-300 mt-5">
                        <div class="flex justify-between mx-2 my-2">
                            <p class="font-medium text-lg text-gray-800">
                                {{ $t("Subtotal") }}
                            </p>
                            <p>
                                {{
                                    paymentSubtotal
                                }}
                                {{ $t("SAR") }}
                            </p>
                        </div>
                        <div class="flex justify-between mx-2 my-2">
                            <p class="font-medium text-lg text-gray-800">
                                {{ $t("VAT") }}
                            </p>
                            <p>
                                {{ paymentVAT }}
                                {{ $t("SAR") }}
                            </p>
                        </div>
                        <div class="flex justify-between mx-2 my-2">
                            <p class="font-medium text-lg text-gray-800">
                                {{ $t("Total") }}
                            </p>
                            <p>{{ paymentTotal }} {{ $t("SAR") }}</p>
                        </div>
                        <div class="flex justify-between mx-2 my-2">
                            <p class="font-medium text-lg text-gray-800">
                                {{ $t('Payment Method')}}
                            </p>
                            <p>{{ JSON.parse(payment.source).number }}</p>
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
export default defineComponent({
    props: {
        payment: Object,
    },
    computed: {
      paymentSubtotal(){
        return this.formattedNumber((this.payment.amount - this.payment.amount * 0.15) /
                                    100)
      },
      paymentVAT(){
        return this.formattedNumber((this.payment.amount * 0.15) / 100);
      },
        paymentTotal() {
          return this.formattedNumber((this.payment.amount)/100);
        },
    },
    methods:{
      formattedNumber(number){
        const formatter = new Intl.NumberFormat("ar-SA", {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2,
            });
        return formatter.format(number);
      }
    },
    components: {
        AppLayout,
    },
});
</script>
