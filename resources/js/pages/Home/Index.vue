<template>
  <Layout
    :logo="pageData?.extras.logo"
    :header_button_title="pageData?.extras.header_button_title"
    :company_name="pageData?.extras.company_name"
    :copyright_text="pageData?.extras.copyright_text"
    :form_title="pageData?.extras.form_title"
    :form_content="pageData?.extras.form_content"
    :footer_button_title="pageData?.extras.footer_button_title"
    :facebook_url="pageData?.extras.facebook_url"
    :instagram_url="pageData?.extras.instagram_url"
  >
    <Overlay>
      <Hero
        :hero_bg="pageData?.extras.hero_bg"
        :hero_content="pageData?.extras.hero_content"
        :hero_upper_title="pageData?.extras.hero_upper_title"
        :hero_title="pageData?.extras.hero_title"
      />
      <About
        :about_image="pageData?.extras.about_image"
        :about_content="pageData?.extras.about_content"
        :about_upper_title="pageData?.extras.about_upper_title"
        :about_title="pageData?.extras.about_title"
      />
      <Prices :price_title="pageData?.extras.price_title" />
      <Services
        :service_title="pageData?.extras.service_title"
        :service_button_title="pageData?.extras.service_button_title"
      />
      <Sale
        :sale_logo="pageData?.extras.sale_logo"
        :sale_content="pageData?.extras.sale_content"
        :sale_button_title="pageData?.extras.sale_button_title"
        :sale_title="pageData?.extras.sale_title"
      />
      <Portfolio
        :portfolio_title="pageData?.extras.portfolio_title"
        :portfolio_description="pageData?.extras.portfolio_description"
      />
    </Overlay>
  </Layout>
  <Chat />
</template>
<script setup lang="ts">
import Layout from '@js/shared/Layout.vue';
import Hero from '@js/components/Hero.vue';
import Chat from '@js/shared/Chat.vue';
import About from '@js/components/About.vue';
import Prices from '@js/components/Prices.vue';
import Services from '@js/components/Services.vue';
import Sale from '@js/components/Sale.vue';
import Portfolio from '@js/components/Portfolio.vue';
import Overlay from '@js/shared/Overlay.vue';
import axios from 'axios';
import { ref, Ref, onMounted } from 'vue';
const pageData: Ref<any> = ref(null);

onMounted(async () => {
  const { data } = await axios.get('/api/home');
  pageData.value = data;
});
</script>
