<template>
  <header class="header fixed top-0 left-0 z-50 w-full overflow-hidden border-b border-gray-400/10">
    <div class="w-full bg-bg-400 font-[Inter]">
      <div
        class="flex justify-between items-center px-4 xl:px-[30px] py-[18px] mx-auto xl:max-w-[75%]"
      >
        <a href="/"><img :src="`/storage/${logo}`" alt="logo" /></a>
        <BurgerMenu :header_button_title="header_button_title" />
      </div>
    </div>
  </header>
</template>
<script setup lang="ts">
import BurgerMenu from '@js/shared/BurgerMenu.vue';
import Logo from '@assets/imgs/logo.svg';

const { logo, header_button_title } = defineProps<{
  logo: string;
  header_button_title: string;
}>();
</script>
