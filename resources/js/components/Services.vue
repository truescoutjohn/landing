<template>
  <div id="services">
    <div
      class="grid grid-cols-1 md:grid-cols-3 px-4 xl:px-[30px] pb-[60px] mx-auto xl:max-w-[75%] text-montserrat text-alabastar-400"
    >
      <div class="left-column">
        <h3 class="text-[35px] xl:text-[48px] font-semibold uppercase">{{ service_title }}</h3>
        <button
          class="cursor-pointer mb-4 px-6 py-3 xl:px-[45px] xl:py-[14px] bg-gradient-to-r from-[#7f39a9] via-[#b0346b] to-[#dd2f30] hover:bg-pink-600 hover:shadow-pink-500/50 hover:shadow-lg transition rounded text-[16px] font-semibold uppercase"
        >
          {{ service_button_title }}
        </button>
      </div>
      <div class="right-column col-span-2">
        <div
          v-for="service in services"
          :key="service.id"
          class="item px-[24px] py-[32px] mb-[64px]"
        >
          <h3 class="text-[25px] xl:text-[32px] mb-[24px] uppercase font-semibold">
            {{ service.title }}
          </h3>
          <div v-html="service.content.replace(/&nbsp;|&#160;|\u00A0/gi, '')" class="content"></div>
          <!-- <ul class="flex flex-wrap gap-[21px] mb-[24px]">
            <li class="flex gap-[12px] font-medium"><CheckIcon />Landing Page</li>
            <li class="flex gap-[12px] font-medium"><CheckIcon />Landing Page</li>
            <li class="flex gap-[12px] font-medium"><CheckIcon />Landing Page</li>
            <li class="flex gap-[12px] font-medium"><CheckIcon />Landing Page</li>
            <li class="flex gap-[12px] font-medium"><CheckIcon />Landing Page</li>
          </ul>
          <h4 class="mb-[12px] text-alabastar-50">Stack</h4>
          <ul class="flex flex-wrap gap-[21px]">
            <li><WordpressIcon /></li>
            <li><LaravelIcon /></li>
            <li><OpencartIcon /></li>
          </ul> -->
        </div>
      </div>
    </div>
  </div>
</template>
<script setup lang="ts">
import { ref, onMounted, Ref } from 'vue';
import axios from 'axios';

const services: Ref<any[]> = ref([]);
onMounted(async () => {
  try {
    const response = await axios.get('/api/services');
    services.value = response.data;
    console.log('Services:', services.value);
  } catch (error) {
    console.error('Error fetching services:', error);
  }
});

const { service_title, service_button_title } = defineProps<{
  service_title: string;
  service_button_title: string;
}>();
console.log(service_button_title, service_title);
</script>
<style scoped>
.item {
  box-sizing: border-box;
  border: 1px solid rgba(255, 255, 255, 0.15);
  border-radius: 24px;
  backdrop-filter: blur(16px);
  background: rgba(255, 255, 255, 0.12);
}
::v-deep(.content) p,
::v-deep(.content) ul {
  margin-bottom: 24px;
}
/*
::v-deep(.content) span {
  margin-right: 20px;
}

::v-deep(.content) p:last-of-type {
  gap: 10px;
} */

::v-deep(.content) ul {
  display: flex;
  flex-wrap: wrap;
  gap: 20px;
}

::v-deep(.content) li {
  display: flex;
  align-items: center;
}
</style>
