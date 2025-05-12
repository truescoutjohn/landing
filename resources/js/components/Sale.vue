<template>
  <div>
    <div class="px-4 xl:px-[30px] mx-auto xl:max-w-[75%] font-montserrat text-alabastar-400">
      <div class="item grid grid-cols-1 sm:grid-cols-3 items-center gap-12 px-[24px] py-[32px]">
        <div class="left-column col-span-2">
          <h4
            class="xs:text-[25px] sm:text-[35px] xl:leading-[59px] xl:text-[48px] font-semibold mb-[24px] uppercase"
          >
            {{ sale_title }}
          </h4>
          <p class="text-[20px] mb-[48px]">{{ sale_content }}</p>
          <button
            class="cursor-pointer bg-white py-[12px] px-4 sm:px-[32px] rounded-[6px] text-black hover:opacity-90 uppercase"
          >
            {{ sale_button_title }}
          </button>
        </div>
        <div class="right-column"><img :src="`/storage/${sale_logo}`" alt="logoSale" /></div>
      </div>
    </div>
  </div>
</template>
<script setup lang="ts">
const { sale_title, sale_button_title, sale_content, sale_logo } = defineProps<{
  sale_title: string;
  sale_button_title: string;
  sale_content: string;
  sale_logo: string;
}>();
</script>
<style scoped>
.item {
  position: relative;
  border: 1px solid rgba(255, 255, 255, 0.5);
  border-radius: 24px;

  backdrop-filter: blur(16px);
  /* Gradient */
  background: linear-gradient(
    45deg,
    rgb(127, 57, 169) -7.105%,
    rgb(176, 52, 107) 18.358%,
    rgb(221, 47, 48) 50.684%
  );
}

.item::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: url(@assets/imgs/salesBg.png);
  background-position: 20% 80%;
}
</style>
