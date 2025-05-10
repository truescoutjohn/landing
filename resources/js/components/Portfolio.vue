<template>
  <div class="pt-[78px] pb-[39px]" id="portfolio">
    <div
      class="mx-auto px-4 xl:px-[60px] xl:max-w-[75%] font-montserrat text-alabastar-400 relative"
    >
      <div class="flex flex-wrap justify-between items-center mb-[43px]">
        <h2
          class="text-[35px] md:text-[40px] xl:text-[48px] leading-[59px] font-semibold uppercase"
        >
          {{ portfolio_title }}
        </h2>
        <p class="leading-[20px] font-medium uppercase max-w-[333px]">
          {{ portfolio_description }}
        </p>
      </div>
      <div class="swiper relative">
        <div class="cursor-pointer custom-navigation">
          <div class="custom-prev swiper-custom-arrow"></div>
          <div class="custom-next swiper-custom-arrow"></div>
        </div>

        <swiper-container
          :pagination="{
            el: '.custom-pagination',
            clickable: true,
            type: 'bullets',
          }"
          :navigation="{
            nextEl: '.custom-next',
            prevEl: '.custom-prev',
          }"
          class="swiper-custom"
        >
          <swiper-slide v-for="portfolio in portfolios" class="relative">
            <img :src="`/storage/${portfolio.image}`" :alt="portfolio.title" />
            <div
              class="absolute left-0 bottom-0 flex justify-between items-center py-[38px] px-[24px] w-full bg-black/50 backdrop-blur-sm"
            >
              <div>
                <h4
                  class="mb-4 xl:mb-[47px] text-base sm:text-[35px] xl:text-[48px] font-semibold uppercase"
                >
                  {{ portfolio.title }}
                </h4>
                <p class="hidden xs:block uppercase max-w-[333px]">
                  {{ portfolio.description }}
                </p>
              </div>
              <div class="hidden xs:flex flex-col items-end">
                <SlideIcon class="mb-[52px]" />
                <div class="flex flex-wrap gap-4 justify-end">
                  <p
                    v-for="label in portfolio.labels.split('\n')"
                    :key="label"
                    class="inline-block mr-[16px] text-[14px] px-[12px] py-[8px] font-medium border rounded-[20px] uppercase"
                  >
                    {{ label }}
                  </p>
                </div>
              </div>
            </div>
          </swiper-slide>
        </swiper-container>
        <div class="cursor-pointer custom-pagination mt-8"></div>
      </div>
    </div>
  </div>
</template>
<script setup lang="ts">
import SlideIcon from '@assets/imgs/iconSlide1.svg';
import axios from 'axios';
import { ref, onMounted, Ref } from 'vue';
const portfolios: Ref<any[]> = ref([]);

onMounted(async () => {
  try {
    const { data } = await axios.get('/api/portfolios');
    portfolios.value = data;
    console.log('Portfolios:', portfolios.value);
  } catch (error) {
    console.error('Error fetching portfolios:', error);
  }
});

const { portfolio_title, portfolio_description } = defineProps<{
  portfolio_title: string;
  portfolio_description: string;
}>();
</script>

<style>
.swiper-custom-arrow {
  width: 40px;
  height: 40px;
  background: rgba(255, 255, 255, 0.2);
  border-radius: 50%;
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  z-index: 10;
  cursor: pointer;
  transition: all 0.3s;
}

.swiper-custom-arrow:hover {
  background: rgba(255, 255, 255, 0.4);
}

.custom-prev {
  left: 0;
}

@media (min-width: 768px) {
  .custom-prev {
    left: 30px;
  }
}

.custom-next {
  right: 0;
}

@media (min-width: 768px) {
  .custom-next {
    right: 30px;
  }
}

.swiper-custom-arrow::after {
  content: '';
  position: absolute;
  width: 12px;
  height: 12px;
  border: 2px solid white;
  border-width: 2px 2px 0 0;
}

.custom-prev::after {
  left: 50%;
  transform: rotate(-135deg) translate(-55%, -99%);
}

.custom-next::after {
  left: 22%;
  transform: rotate(45deg) translate(103%, 57%);
}

.custom-pagination {
  position: absolute;
  bottom: 34px;
  left: 50%;
  transform: translateX(-50%);
  z-index: 20;
  display: flex;
  justify-content: center;
  gap: 8px;
}

.custom-pagination .swiper-pagination-bullet {
  width: 12px;
  height: 12px;
  background: gray;
  border-radius: 50%;
  opacity: 1;
  transition: all 0.3s;
}

.custom-pagination .swiper-pagination-bullet-active {
  background: #fff;
  border: 3px solid gray;
}
</style>
