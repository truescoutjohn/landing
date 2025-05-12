<template>
  <div class="overlay relative">
    <div class="mx-auto xl:max-w-[75%]">
      <main
        class="grid grid-cols-1 sm:grid-cols-2 gap-12 justify-between px-4 xl:px-[30px] py-10"
        id="contacts"
      >
        <!-- Левая часть -->
        <div class="text-white flex flex-col gap-6" data-aos="fade-up">
          <h2 class="text-[35px] xl:text-[60px] font-bold leading-tight">
            {{ form_title?.split(' ').slice(0, -2).join(' ') }}<br />
            <span
              class="bg-gradient-to-r from-[#7f39a9] via-[#b0346b] to-[#dd2f30] bg-clip-text text-transparent"
            >
              {{ form_title?.split(' ').slice(-2).join(' ') }}
            </span>
          </h2>

          <div class="mt-6 space-y-4">
            <div class="uppercase text-gray-400 text-sm">Say Hello</div>
            <div class="text-[22px] xl:text-[32px] font-medium">INFO@RVVS.US</div>
            {{ form_content }}
            <button
              class="cursor-pointer mb-4 px-6 py-3 xl:px-[45px] xl:py-[14px] bg-gradient-to-r from-[#7f39a9] via-[#b0346b] to-[#dd2f30] hover:bg-pink-600 hover:shadow-pink-500/50 hover:shadow-lg transition rounded text-[16px] font-semibold uppercase"
            >
              {{ footer_button_title }}
            </button>
          </div>
        </div>

        <!-- Правая часть (форма) -->
        <div
          class="right-column bg-transparent p-8 rounded-lg shadow-lg w-full max-w-[670px] border"
          data-aos="fade-up"
          data-aos-delay="100"
        >
          <h2 class="text-white text-[32px] font-semibold mb-6 xl:leading-[120%] uppercase">
            DISCUSS THE PROJECT
          </h2>

          <form class="space-y-6" @submit.prevent="handleSubmit">
            <input
              v-model="formData.name"
              type="text"
              placeholder="NAME"
              class="w-full bg-transparent border-b border-gray-600 py-2 text-white placeholder-gray-400 focus:outline-none focus:border-white"
            />

            <div class="relative flex justify-between">
              <select
                @change="changeHandler"
                class="bg-transparent border-b border-gray-600 py-2 text-white appearance-none pr-8 focus:outline-none focus:border-white"
              >
                <option value="+1" class="text-black">🇺🇸 +1</option>
                <option value="+44" class="text-black">🇬🇧 +44</option>
                <option value="+380" class="text-black">🇺🇦 +380</option>
              </select>
              <div
                class="pointer-events-none absolute left-16 top-1/2 transform -translate-y-1/2 text-white text-xs"
              >
                ▼
              </div>
              <input
                v-model="formData.phone"
                type="text"
                class="w-full bg-transparent border-b border-gray-600 py-2 text-white placeholder-gray-400 focus:outline-none focus:border-white"
              />
            </div>

            <input
              v-model="formData.email"
              type="email"
              placeholder="EMAIL"
              class="w-full bg-transparent border-b border-gray-600 py-2 text-white placeholder-gray-400 focus:outline-none focus:border-white"
            />

            <textarea
              v-model="formData.message"
              placeholder="MESSAGE"
              rows="4"
              class="w-full bg-transparent border-b border-gray-600 py-2 text-white placeholder-gray-400 focus:outline-none focus:border-white resize-none"
            ></textarea>

            <button
              type="submit"
              class="w-full bg-white text-black font-semibold py-2 rounded hover:bg-gray-200 transition"
            >
              SEND
            </button>
          </form>
        </div>
      </main>

      <!-- Футер -->
      <footer
        class="text-gray-400 text-xs py-6 px-4 xl:px-[60px] flex flex-wrap gap-4 justify-between items-center text-[14px] text-montserrat"
      >
        <div class="mb-2 md:mb-0">{{ copyright_text }}</div>
        <div class="flex items-center space-x-4 mb-2 md:mb-0">
          <a :href="facebook_url" class="hover:text-white transition uppercase">Facebook</a>
          <a :href="instagram_url" class="hover:text-white transition uppercase">Instagram</a>
        </div>
        <div
          class="bg-gradient-to-r from-[#7f39a9] via-[#b0346b] to-[#dd2f30] bg-clip-text text-transparent font-semibold"
        >
          {{ company_name }}
        </div>
      </footer>
    </div>
  </div>
</template>
<script setup lang="ts">
import axios from 'axios';
import { ref } from 'vue';

interface FormData {
  name: string;
  email: string;
  phone: string;
  message: string;
  country_code: string;
}

const formData = ref<FormData>({
  name: '',
  country_code: '+1',
  phone: '',
  email: '',
  message: '',
});

const handleSubmit = async () => {
  try {
    const { data } = await axios.post(
      '/api/send-form',
      { ...formData.value, phone: formData.value.country_code + formData.value.phone },
      {
        headers: {
          'Content-Type': 'application/json',
        },
      },
    );
    if (data) {
      formData.value = { name: '', email: '', message: '', phone: '', country_code: '+1' };
    }
  } catch (err) {
    console.error('API Error:', err);
  }
};

const changeHandler = (event: Event) => {
  const target = event.target as HTMLSelectElement;
  formData.value.country_code = target.value;
};

const { copyright_text, form_title, form_content, company_name, facebook_url, instagram_url } =
  defineProps<{
    copyright_text: string;
    form_title: string;
    form_content: string;
    footer_button_title: string;
    company_name: string;
    facebook_url: string;
    instagram_url: string;
  }>();
</script>
<style scoped>
.overlay::before {
  content: '';
  position: absolute;
  inset: 0;
  /* background-image: url('../../assets/imgs/footerBg.png');
  background-size: cover;
  background-position: center; */
  background-color: black;
  /* background-repeat: no-repeat; */
  /* transform: rotateX(180deg); */
  z-index: -1;
}

.right-column {
  background: linear-gradient(225deg, rgba(82, 82, 82, 0.15), rgba(62, 62, 62, 0.15) 100%);
}

.border {
  border: 1px solid #555;
}
</style>
