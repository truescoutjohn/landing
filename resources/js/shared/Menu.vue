<template>
  <div class="hidden 2xl:flex justify-between items-center">
    <nav class="flex justify-between gap-2 items-center mr-[121px] font-inter text-alabastar-400">
      <a
        :href="item.link"
        class="hover:text-gray-400 transition-colors uppercase mr-[36px]"
        v-for="item in menu?.filter((item) => !item.link?.includes('mailto'))"
        :key="item.id"
        @click.prevent="scrollTo(item?.link)"
        >{{ item.name }}</a
      >
    </nav>
    <a
      :href="menu?.find((item) => item.link?.includes('mailto'))?.link"
      class="flex items-center mr-[88px] text-alabastar-400 uppercase text-[18px]"
    >
      <svg
        width="19.506836"
        height="19.500000"
        viewBox="0 0 19.5068 19.5"
        fill="none"
        xmlns="http://www.w3.org/2000/svg"
        xmlns:xlink="http://www.w3.org/1999/xlink"
        class="mr-4"
      >
        <defs />
        <path
          id="Vector"
          d="M17.25 19.5L17.12 19.5C2.39 18.65 0.29 6.21 0 2.42C-0.02 2.12 0.01 1.83 0.1 1.54C0.2 1.26 0.34 1 0.53 0.78C0.73 0.55 0.96 0.37 1.23 0.23C1.49 0.1 1.78 0.02 2.07 0L6.2 0C6.5 0 6.8 0.08 7.05 0.25C7.3 0.42 7.49 0.66 7.6 0.94L8.74 3.75C8.85 4.02 8.88 4.32 8.82 4.6C8.76 4.89 8.62 5.16 8.41 5.37L6.81 6.98C7.06 8.4 7.74 9.7 8.76 10.72C9.77 11.74 11.08 12.42 12.5 12.68L14.12 11.07C14.34 10.86 14.6 10.72 14.89 10.67C15.18 10.61 15.48 10.64 15.75 10.76L18.58 11.89C18.85 12 19.09 12.2 19.25 12.45C19.42 12.7 19.5 12.99 19.5 13.29L19.5 17.25C19.5 17.84 19.27 18.41 18.84 18.84C18.42 19.26 17.85 19.5 17.25 19.5ZM2.25 1.5C2.05 1.5 1.86 1.57 1.72 1.71C1.58 1.86 1.5 2.05 1.5 2.25L1.5 2.3C1.85 6.75 4.06 17.25 17.21 18C17.31 18 17.4 17.99 17.5 17.96C17.59 17.92 17.68 17.87 17.75 17.81C17.83 17.74 17.88 17.66 17.93 17.57C17.97 17.49 18 17.39 18 17.29L18 13.29L15.17 12.15L13.02 14.29L12.66 14.25C6.14 13.43 5.25 6.9 5.25 6.83L5.21 6.48L7.34 4.32L6.21 1.5L2.25 1.5Z"
          fill="#FFFFFF"
          fill-opacity="1.000000"
          fill-rule="nonzero"
        />
      </svg>

      {{ menu?.find((item) => item.link?.includes('mailto'))?.name }}</a
    >
    <div class="language-select mr-[48px]">
      <select>
        <option value="en">EN</option>
        <option selected value="ua">UA</option>
        <option value="fr">FR</option>
      </select>
    </div>
    <button
      class="cursor-pointer bg-white py-[12px] px-[32px] rounded-[6px] text-black hover:opacity-90 uppercase"
    >
      {{ header_button_title }}
    </button>
  </div>
  <nav
    :class="[
      'fixed top-0 right-0 h-screen w-64 bg-white shadow-lg transform transition-transform duration-300 ease-in-out z-40 opacity-55',
      'flex flex-col p-6 gap-4',
      isOpen ? 'translate-x-0' : 'translate-x-full',
    ]"
  >
    <button
      @click="toggleMenu"
      class="cursor-pointer self-end p-2 hover:bg-gray-100 rounded-lg transition-colors"
      aria-label="Close menu"
    >
      <Menu class="w-10 h-10" />
    </button>

    <a
      :href="item.link"
      class="hover:text-gray-400 transition-colors"
      v-for="item in menu?.filter((item) => !item.link?.includes('mailto'))"
      :key="item.id"
      @click.prevent="scrollTo(item?.link)"
      >{{ item.name }}</a
    >

    <a
      :href="menu?.find((item) => item?.link?.includes('mailto'))?.link"
      class="mr-[88px] text-black uppercase"
      >{{ menu?.find((item) => item?.link?.includes('mailto'))?.name }}</a
    >
    <div class="language-select mr-[48px] burger-mode">
      <select>
        <option value="en">EN</option>
        <option selected value="ua">UA</option>
        <option value="fr">FR</option>
      </select>
    </div>
    <button
      class="cursor-pointer border bg-white py-[12px] px-[32px] rounded-[6px] text-bold hover:opacity-90 uppercase"
    >
      {{ header_button_title }}
    </button>
  </nav>
</template>
<script setup lang="ts">
//@ts-ignore
import { Menu } from 'lucide-vue-next';
import axios from 'axios';
import { onMounted, watch, ref, Ref } from 'vue';

const menu: Ref<any> = ref([{ id: 1, name: 'Home', link: '/' }]);

onMounted(async () => {
  const { data } = await axios.get('/api/menu');
  menu.value = data;
  // console.log(menu.value.find((item) => item.link.includes('mailto')).link);
});
watch(menu, () => {
  console.log('Menu updated:', menu.value);
});

const { isOpen, toggleMenu, header_button_title } = defineProps<{
  isOpen: boolean;
  toggleMenu: (e?: MouseEvent) => void;
  header_button_title: string;
}>();

const scrollTo = (id: any) => {
  const element = document.querySelector(id);
  if (!element) {
    console.error(`Элемент с id "${id}" не найден`);
    return;
  }

  // Параметры прокрутки
  const scrollOptions = {
    behavior: 'smooth',
    block: 'start',
  };

  // Прокрутка к элементу
  element.scrollIntoView(scrollOptions);

  // Обновление URL
  // @ts-ignore
  window.history.replaceState(null, null, `${id}`);
};
</script>
<style scoped>
.language-select {
  position: relative;
  display: inline-block;
  color: #fff;
  font-family: sans-serif;
  font-size: 16px;
  cursor: pointer;
}

.language-select select {
  background: transparent;
  color: #fff;
  border: none;
  appearance: none;
  -webkit-appearance: none;
  -moz-appearance: none;
  padding-right: 20px;
  font-size: 16px;
  cursor: pointer;
  outline: none;
}

.language-select.burger-mode select {
  color: #000;
}

.language-select option {
  color: #000;
}

.language-select::after {
  content: '▼';
  position: absolute;
  right: 5px;
  top: 50%;
  transform: translateY(-60%);
  pointer-events: none;
  font-size: 10px;
}

.language-select.burger-mode::after {
  color: #000;
  left: 25px;
}
</style>
