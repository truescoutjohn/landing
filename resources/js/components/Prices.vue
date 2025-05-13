<template>
  <div>
    <div
      class="mx-auto px-4 xl:px-[30px] py-[60px] xl:pb-[292px] xl:max-w-[1380px] text-alabastar-400 text-montserrat"
    >
      <h2 class="text-[35px] md:text-[48px] xl:leading-[59px] text-center font-semibold uppercase">
        {{ price_title }}
      </h2>
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mt-10">
        <div
          v-for="price in prices"
          :key="price.id"
          class="item flex flex-col rounded-[24px] p-[24px] bg-black-400 border border-alabastar-400"
        >
          <div class="pb-4">
            <div class="flex justify-between items-center mb-[24px]">
              <h2
                class="text-[32px] font-bold bg-gradient-to-r from-[#7f39a9] via-[#b0346b] to-[#dd2f30] bg-clip-text text-transparent"
              >
                {{ price.title }}
              </h2>
              <span
                v-if="price.is_popular"
                class="px-[12px] py-[8px] bg-gradient-to-r from-[#7f39a9] via-[#b0346b] to-[#dd2f30] rounded-[60px] text-sm font-medium"
              >
                Популярний
              </span>
            </div>
            <p
              class="inline-block text-[14px] px-[12px] py-[8px] font-medium border border-alabastar-400 rounded-[20px]"
            >
              {{ price.deadlines }}
            </p>
          </div>
          <div class="grow-1 pb-4">
            <ul class="space-y-3">
              <li
                v-for="item in price.description.split('\n')"
                class="flex items-start mb-[12px] text-[20px]"
              >
                <span
                  class="mr-2 bg-gradient-to-r from-[#7f39a9] via-[#b0346b] to-[#dd2f30] bg-clip-text text-transparent"
                  >•</span
                >
                {{ item }}
              </li>
            </ul>
          </div>
          <div class="flex flex-col justify-stretch">
            <div class="mb-[24px]">
              <p class="font-bold">
                {{ price.price.split(' ')[0] }}
                <span class="text-[40px]">{{ price.price.split(' ')[1] }}</span>
              </p>
            </div>
            <button
              v-if="price.is_popular"
              class="cursor-pointer py-[12px] px-[32px] bg-gradient-to-r from-[#7f39a9] via-[#b0346b] to-[#dd2f30] hover:bg-pink-600 hover:shadow-pink-500/50 hover:shadow-lg transition rounded text-sm font-semibold uppercase"
            >
              {{ price.button_text }}
            </button>
            <button
              v-else
              class="cursor-pointer bg-white py-[12px] px-[32px] rounded-[6px] text-black hover:opacity-90"
            >
              {{ price.button_text }}
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script setup lang="ts">
import { ref, onMounted, Ref } from 'vue';
import axios from 'axios';
const prices: Ref<any> = ref([]);

onMounted(async () => {
  const { data } = await axios.get('/api/prices');
  prices.value = data;
  console.log('prices', prices.value);
});

const { price_title } = defineProps<{
  price_title: string;
}>();
</script>
<style scoped>
.item {
  box-sizing: border-box;
  border: 1px solid rgba(255, 255, 255, 0.15);
  border-radius: 24px;
  backdrop-filter: blur(16px);
  background: rgba(255, 255, 255, 0.12);
}
</style>
