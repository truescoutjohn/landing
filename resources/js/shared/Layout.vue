<template>
  <Header :logo="logo" :header_button_title="header_button_title" />
  <slot></slot>
  <Footer
    :copyright_text="copyright_text"
    :form_title="form_title"
    :form_content="form_content"
    :footer_button_title="footer_button_title"
    :company_name="company_name"
    :facebook_url="facebook_url"
    :instagram_url="instagram_url"
  />
</template>
<script setup lang="ts">
import Header from '@js/shared/Header.vue';
import Footer from '@js/shared/Footer.vue';

const {
  logo,
  header_button_title,
  copyright_text,
  form_title,
  form_content,
  company_name,
  facebook_url,
  instagram_url,
} = defineProps<{
  logo: string;
  header_button_title: string;
  copyright_text: string;
  form_title: string;
  form_content: string;
  footer_button_title: string;
  company_name: string;
  facebook_url: string;
  instagram_url: string;
}>();
</script>
