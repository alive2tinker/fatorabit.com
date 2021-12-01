<!-- This example requires Tailwind CSS v2.0+ -->
<template>
  <Menu as="div" class="relative inline text-left">
    <div>
      <MenuButton :class="{'inline-flex justify-center w-full rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-indigo-500':true, 'border-red-500':hasError}">
        {{ $t(selected.name) }}
        <ChevronDownIcon class="-mr-1 ml-2 h-5 w-5" aria-hidden="true" />
      </MenuButton>
    </div>

    <transition enter-active-class="transition ease-out duration-100" enter-from-class="transform opacity-0 scale-95" enter-to-class="transform opacity-100 scale-100" leave-active-class="transition ease-in duration-75" leave-from-class="transform opacity-100 scale-100" leave-to-class="transform opacity-0 scale-95">
      <MenuItems class="ltr:origin-top-left rtl:origin-top-center z-50 absolute left-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none">
        <div class="py-1">
          <MenuItem v-for="(item, index) in items.data" :key="index">
            <button type="button" @click="setSelected(item)" :class="['text-gray-900', 'block px-4 py-2 text-sm']">{{item.name}}</button>
          </MenuItem>
        </div>
      </MenuItems>
    </transition>
  </Menu>
</template>

<script>
import { Menu, MenuButton, MenuItem, MenuItems } from '@headlessui/vue'
import { ChevronDownIcon } from '@heroicons/vue/solid'

export default {
    props:{
        items: Object,
        hasError: Object
    },
  components: {
    Menu,
    MenuButton,
    MenuItem,
    MenuItems,
    ChevronDownIcon,
  },
  data(){
      return{
          selected: {
            name: 'choose'
          }
      }
  },
  methods: {
    setSelected: function(item){
      this.$emit('itemSelected', item)
      this.selected = item;
    }
  }
}
</script>