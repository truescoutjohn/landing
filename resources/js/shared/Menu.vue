<template>
  <div class="hidden 2xl:flex justify-between items-center">
    <nav class="flex justify-between gap-2 items-center mr-[161px] font-inter text-alabastar-400">
      <a
        :href="item.link"
        class="hover:text-gray-400 transition-colors"
        v-for="item in menu?.filter((item) => !item.link?.includes('mailto'))"
        :key="item.id"
        @click.prevent="scrollTo(item?.link)"
        >{{ item.name }}</a
      >
    </nav>
    <a
      :href="menu?.find((item) => item.link?.includes('mailto'))?.link"
      class="mr-[88px] text-alabastar-400 uppercase"
      >{{ menu?.find((item) => item.link?.includes('mailto'))?.name }}</a
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
      class="cursor-pointer border bg-white py-[12px] px-[32px] rounded-[6px] text-black hover:opacity-90 uppercase"
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
