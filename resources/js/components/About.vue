<template>
  <div class="pt-[90px] xl:pt-[119px] text-alabastar-400 font-montserrat">
    <div class="mx-auto px-4 xl:px-[60px] text-center xl:max-w-[75%]">
      <button
        class="button-wrapper inline-flex justify-center items-center cursor-pointer p-0.5 mb-[24px] xl:mb-[43px]font-medium"
      >
        <div class="button flex gap-4 px-4 sm:px-[24px] py-2 sm:py-[16px]">
          {{ about_upper_title }}
        </div>
      </button>
      <h2
        class="mx-auto mb-[18px] xl:mb-[36px] text-[22px] sm:text-[40px] xl:text-[48px] text-center max-w-[800px] xl:max-w-[1130px] font-semibold uppercase"
      >
        {{ about_title }}
      </h2>
      <p class="fade-text mx-auto mb-[16px] text-base xl:text-[20px] font-medium max-w-[800px]">
        {{ about_content }}
      </p>
      <a href="#" class="inline-block font-bold uppercase mb-[64px]">Read more</a>
      <div class="flex flex-wrap justify-center gap-x-12 gap-y-12 mx-auto max-w-[687px] mb-[24px]">
        <div v-for="feature in features" class="flex flex-col items-center" :key="feature?.id">
          <div
            class="flex justify-center items-center w-[80px] xl:w-[102px] h-[80px] xl:h-[102px] rounded-full bg-alabastar-400 mb-[24px]"
          >
            <img :src="`/storage/${feature?.icon}`" alt="aboutBg" />
          </div>
          <span
            class="bg-gradient-to-r from-[#7f39a9] via-[#b0346b] to-[#dd2f30] bg-clip-text text-transparent font-semibold text-[32px] mb-[16px]"
          >
            {{ feature?.title }}
          </span>
          {{ feature?.description }}
        </div>
      </div>
      <div class="fade-img"><img :src="`/storage/${about_image}`" alt="romanovTeam" /></div>
    </div>
  </div>
</template>
<script setup lang="ts">
import { ref, onMounted, Ref } from 'vue';
import axios from 'axios';
const features: Ref<any> = ref([]);

onMounted(async () => {
  const { data } = await axios.get('/api/features');
  features.value = data;
  console.log('features', features.value);
});

const { about_title, about_upper_title, about_content, about_image } = defineProps<{
  about_title: string;
  about_upper_title: string;
  about_content: string;
  about_image: string;
}>();
</script>
<style scoped>
.fade-text {
  position: relative;
  max-height: 200px; /* Фиксированная высота блока */
  overflow: hidden;
}

.fade-text::after {
  content: '';
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  height: 120px;
  background: linear-gradient(to bottom, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 1) 100%);
  pointer-events: none;
}

.fade-img {
  position: relative;
}

.fade-img::after {
  content: '';
  position: absolute;
  inset: 0;
  top: 130px;
  background: linear-gradient(to bottom, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 1) 100%);
  pointer-events: none;
}
</style>
