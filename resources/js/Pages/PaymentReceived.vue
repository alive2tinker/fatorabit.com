<template>
    <app-layout :title="$t('payment received')">
      
    </app-layout>
</template>
<script>
  import { defineComponent } from 'vue'
  import AppLayout from '@/Layouts/AppLayout.vue';
  export default defineComponent({
    props:{
      payment: Object
    },
    components: {
      AppLayout
    }
  })
</script>
