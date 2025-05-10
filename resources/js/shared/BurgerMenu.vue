<template>
  <div class="relative z-50">
    <button
      @click="toggleMenu"
      class="cursor-pointer p-2 rounded-lg transition-colors 2xl:hidden"
      aria-label="Toggle menu"
    >
      <MenuIcon color="oklch(0.98 0 0)" class="w-10 h-10" />
    </button>
    <Menu :toggleMenu="toggleMenu" :isOpen="isOpen" :header_button_title="header_button_title" />
    <!-- Backdrop -->
    <div v-if="isOpen" class="fixed inset-0 bg-black/20 backdrop-blur-sm" @click="toggleMenu" />
  </div>
</template>

<script setup lang="ts">
import { ref } from 'vue';
//@ts-ignore
import { Menu as MenuIcon } from 'lucide-vue-next';
import Menu from '@js/shared/Menu.vue';

const isOpen = ref(false);

const toggleMenu = () => {
  isOpen.value = !isOpen.value;
};

const { header_button_title } = defineProps<{
  header_button_title: string;
}>();
</script>
