<!-- This example requires Tailwind CSS v2.0+ -->
<template>
  <div class="bg-gray-900">
    <div class="pt-12 sm:pt-16 lg:pt-24">
      <div class="max-w-7xl mx-auto text-center px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl mx-auto space-y-2 lg:max-w-none">
          <h2 class="text-lg leading-6 font-semibold text-gray-300 uppercase tracking-wider">{{ $t('Pricing') }}</h2>
          <p class="text-3xl font-extrabold text-white sm:text-4xl lg:text-5xl">{{ $t('The right price for you, whoever you are') }}</p>
          <p class="text-xl text-gray-300">{{ $t('we are confident that you will like our pricing scheme') }}</p>
        </div>
      </div>
    </div>
    <div class="mt-8 pb-12 bg-gray-50 sm:mt-12 sm:pb-16 lg:mt-16 lg:pb-24">
      <div class="relative">
        <div class="absolute inset-0 h-3/4 bg-gray-900" />
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div class="max-w-md mx-auto space-y-4 lg:max-w-5xl lg:grid lg:grid-cols-2 lg:gap-5 lg:space-y-0">
            <div v-for="tier in tiers" :key="tier.name" class="flex flex-col rounded-lg shadow-lg overflow-hidden">
              <div class="px-6 py-8 bg-white sm:p-10 sm:pb-6">
                <div>
                  <h3 class="inline-flex px-4 py-1 rounded-full text-sm font-semibold tracking-wide uppercase bg-teal-100 text-teal-600" id="tier-standard">
                    {{ $t(tier.name) }}
                  </h3>
                </div>
                <div class="mt-4 flex items-baseline text-6xl font-extrabold">
                  {{ $t('SAR') }}{{ tier.priceMonthly }}
                  <span class="ml-1 text-2xl font-medium text-gray-500"> {{ $t('Annually')}} </span>
                </div>
                <p class="mt-5 text-lg text-gray-500">
                  {{ $t(tier.description) }}
                </p>
              </div>
              <div class="flex-1 flex flex-col justify-between px-6 pt-6 pb-8 bg-gray-50 space-y-6 sm:p-10 sm:pt-6">
                <ul role="list" class="space-y-4">
                  <li v-for="feature in tier.features" :key="feature" class="flex items-start">
                    <div class="flex-shrink-0">
                      <CheckIcon class="h-6 w-6 text-green-500" aria-hidden="true" v-if="feature.available"/>
                      <XIcon class="h-6 w-6 text-red-500" aria-hidden="true" v-else/>
                    </div>
                    <p class="ml-3 text-base text-gray-700">
                      {{ $t(feature.name) }}
                    </p>
                  </li>
                </ul>
                <div class="rounded-md shadow">
                  <a :href="tier.href" class="flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-gray-800 hover:bg-gray-900" aria-describedby="tier-standard"> {{ $t('Get started')}} </a>
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
              <div class="mt-4 text-lg text-gray-600">{{ $t("Do you feel these plan do not satisfy your needs? contact us and we'll ensure your happenies")}}</div>
            </div>
            <div class="mt-6 rounded-md shadow lg:mt-0 lg:ml-10 lg:flex-shrink-0">
              <a href="#contact-us" class="flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-gray-900 bg-white hover:bg-gray-50"> {{ $t('Contact Us')}} </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { CheckIcon, XIcon } from '@heroicons/vue/outline'

const tiers = [
  {
    name: 'Standard',
    href: '/register',
    priceMonthly: 500,
    description: 'The very basic package to get you started with meeting ZATCA requirements',
    features: [
      {name:'50 Invoices only', available: true},
      {name:'Integrated directly with ZATCA', available: true},
      {name:'Email Support', available: true},
      {name:'No API Itegration Available', available: false},
    ],
  },
  {
    name: 'Enterprise',
    href: '/register',
    priceMonthly: 880,
    description: 'Fully fledge package that will suites your invoicing needs.',
    features: [
      {name:'Unlimited invoices & items', available: true},
      {name:'Integrated directly with ZATCA', available: true},
      {name:'24/7 Priority Email Support', available: true},
      {name:'Available for all devices', available: true},
      {name:'API is available.', available: true},
    ],
  },
]

export default {
  components: {
    CheckIcon,
    XIcon
  },
  setup() {
    return {
      tiers,
    }
  },
}
</script>