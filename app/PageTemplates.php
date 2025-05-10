<?php

// namespace App;

// trait PageTemplates
// {
//     /*
//     |--------------------------------------------------------------------------
//     | Page Templates for Backpack\PageManager
//     |--------------------------------------------------------------------------
//     |
//     | Each page template has its own method, that define what fields should show up using the Backpack\CRUD API.
//     | Use snake_case for naming and PageManager will make sure it looks pretty in the create/update form
//     | template dropdown.
//     |
//     | Any fields defined here will show up after the standard page fields:
//     | - select template
//     | - page name (only seen by admins)
//     | - page title
//     | - page slug
//     */

//     private function services()
//     {
//         $this->crud->addField([   // CustomHTML
//                         'name' => 'metas_separator',
//                         'type' => 'custom_html',
//                         'value' => '<br><h2>'.trans('backpack::pagemanager.metas').'</h2><hr>',
//                     ]);
//         $this->crud->addField([
//                         'name' => 'meta_title',
//                         'label' => trans('backpack::pagemanager.meta_title'),
//                         'fake' => true,
//                         'store_in' => 'extras',
//                     ]);
//         $this->crud->addField([
//                         'name' => 'meta_description',
//                         'label' => trans('backpack::pagemanager.meta_description'),
//                         'fake' => true,
//                         'store_in' => 'extras',
//                     ]);
//         $this->crud->addField([
//                         'name' => 'meta_keywords',
//                         'type' => 'textarea',
//                         'label' => trans('backpack::pagemanager.meta_keywords'),
//                         'fake' => true,
//                         'store_in' => 'extras',
//                     ]);
//         $this->crud->addField([   // CustomHTML
//                         'name' => 'content_separator',
//                         'type' => 'custom_html',
//                         'value' => '<br><h2>'.trans('backpack::pagemanager.content').'</h2><hr>',
//                     ]);
//         $this->crud->addField([
//                         'name' => 'content',
//                         'label' => trans('backpack::pagemanager.content'),
//                         'type' => 'summernote',
//                         'placeholder' => trans('backpack::pagemanager.content_placeholder'),
//                     ]);
//     }

//     private function about_us()
//     {
//         $this->crud->addField([
//                         'name' => 'content',
//                         'label' => trans('backpack::pagemanager.content'),
//                         'type' => 'summernote',
//                         'placeholder' => trans('backpack::pagemanager.content_placeholder'),
//                     ]);
//     }
// }

namespace App;

trait PageTemplates
{
    /*
    |--------------------------------------------------------------------------
    | Page Templates for Backpack\PageManager
    |--------------------------------------------------------------------------
    */

    private function main_page()
    {
        //Header Section
        $this->crud->addField([   
            'name' => 'header_separator',
            'type' => 'custom_html',
            'value' => '<br><h2>Header Section</h2><hr>',
        ]);


        $this->crud->addField([
            'name' => 'logo',
            'label' => 'Logo',
            'type' => 'upload',
            'upload' => true,
            'disk' => 'public',
            'store_in' => 'extras',
            'fake' => true,
        ]);

        $this->crud->addField([   
            'name' => 'header_button_title',
            'label' => 'Header Button Title',
            'type' => 'text',
            'fake' => true,
            'store_in' => 'extras',
        ]);


        // Hero Section
        $this->crud->addField([   
            'name' => 'hero_separator',
            'type' => 'custom_html',
            'value' => '<br><h2>Hero Section</h2><hr>',
        ]);

        $this->crud->addField([   
            'name' => 'hero_upper_title',
            'label' => 'Hero Upper Title',
            'type' => 'text',
            'fake' => true,
            'store_in' => 'extras',
        ]);

        $this->crud->addField([   
            'name' => 'hero_title',
            'label' => 'Hero Title',
            'type' => 'text',
            'fake' => true,
            'store_in' => 'extras',
        ]);

        $this->crud->addField([   
            'name' => 'hero_content',
            'label' => 'Hero Content',
            'type' => 'textarea',
            'fake' => true,
            'store_in' => 'extras',
        ]);

        $this->crud->addField([
            'name' => 'hero_bg',
            'label' => 'Hero Background Image',
            'type' => 'upload',
            'upload' => true,
            'disk' => 'public',
            'store_in' => 'extras',
            'fake' => true,
        ]);

        // About section
        $this->crud->addField([   
            'name' => 'about_separator',
            'type' => 'custom_html',
            'value' => '<br><h2>About Section</h2><hr>',
        ]);

        $this->crud->addField([   
            'name' => 'about_upper_title',
            'label' => 'About Upper Title',
            'type' => 'text',
            'fake' => true,
            'store_in' => 'extras',
        ]);

        $this->crud->addField([   
            'name' => 'about_title',
            'label' => 'About Title',
            'type' => 'text',
            'fake' => true,
            'store_in' => 'extras',
        ]);

        $this->crud->addField([   
            'name' => 'about_content',
            'label' => 'About Content',
            'type' => 'textarea',
            'fake' => true,
            'store_in' => 'extras',
        ]);

        $this->crud->addField([
            'name' => 'about_image',
            'label' => 'About Image',
            'type' => 'upload',
            'upload' => true,
            'disk' => 'public',
            'store_in' => 'extras',
            'fake' => true,
        ]);

        // Prices section
        $this->crud->addField([   
            'name' => 'prices_separator',
            'type' => 'custom_html',
            'value' => '<br><h2>Prices Section</h2><hr>',
        ]);

        $this->crud->addField([   
            'name' => 'price_title',
            'label' => 'Price Title',
            'type' => 'text',
            'fake' => true,
            'store_in' => 'extras',
        ]);

        // Services section
        $this->crud->addField([   
            'name' => 'services_separator',
            'type' => 'custom_html',
            'value' => '<br><h2>Services Section</h2><hr>',
        ]);

        $this->crud->addField([   
            'name' => 'service_title',
            'label' => 'Service Title',
            'type' => 'text',
            'fake' => true,
            'store_in' => 'extras',
        ]);

         $this->crud->addField([   
            'name' => 'service_button_title',
            'label' => 'Service Button Title',
            'type' => 'text',
            'fake' => true,
            'store_in' => 'extras',
        ]);


        //Portfolio Section
        $this->crud->addField([   
            'name' => 'portfolio_separator',
            'type' => 'custom_html',
            'value' => '<br><h2>Portfolio Section</h2><hr>',
        ]);
        $this->crud->addField([   
            'name' => 'portfolio_title',
            'label' => 'Portfolio Title',
            'type' => 'text',
            'fake' => true,
            'store_in' => 'extras',
        ]);

        $this->crud->addField([   
            'name' => 'portfolio_description',
            'label' => 'Portfolio Description',
            'type' => 'textarea',
            'fake' => true,
            'store_in' => 'extras',
        ]);

       
        // Sale Section
        $this->crud->addField([   
            'name' => 'sale_separator',
            'type' => 'custom_html',
            'value' => '<br><h2>Sale Section</h2><hr>',
        ]);
        
        $this->crud->addField([   
            'name' => 'sale_title',
            'label' => 'Sale Title',
            'type' => 'text',
            'fake' => true,
            'store_in' => 'extras',
        ]);

        $this->crud->addField([   
            'name' => 'sale_content',
            'label' => 'Sale Content',
            'type' => 'textarea',
            'fake' => true,
            'store_in' => 'extras',
        ]);

        $this->crud->addField([
            'name' => 'sale_logo',
            'label' => 'Sale Logo',
            'type' => 'upload',
            'upload' => true,
            'disk' => 'public',
            'store_in' => 'extras',
            'fake' => true,
        ]);

        $this->crud->addField([   
            'name' => 'sale_button_title',
            'label' => 'Sale Button Title',
            'type' => 'text',
            'fake' => true,
            'store_in' => 'extras',
        ]);



        // Project Form Section
        $this->crud->addField([   
            'name' => 'form_separator',
            'type' => 'custom_html',
            'value' => '<br><h2>Project Form</h2><hr>',
        ]);

        $this->crud->addField([
            'name' => 'form_title',
            'label' => 'Form Left Column Title',
            'type' => 'text',
            'fake' => true,
            'store_in' => 'extras',
        ]);

        $this->crud->addField([
            'name' => 'form_contern',
            'label' => 'Form Left Column Content',
            'type' => 'textarea',
            'fake' => true,
            'store_in' => 'extras',
        ]);

        // Footer Section
        $this->crud->addField([   
            'name' => 'footer_separator',
            'type' => 'custom_html',
            'value' => '<br><h2>Footer Settings</h2><hr>',
        ]);

        $this->crud->addField([
            'name' => 'copyright_text',
            'label' => 'Copyright Text',
            'type' => 'text',
            'default' => '2017-2024 ALL RIGHTS RESERVED',
            'fake' => true,
            'store_in' => 'extras',
        ]);

        $this->crud->addField([
            'name' => 'facebook_url',
            'label' => 'Facebook URL',
            'type' => 'url',
            'store_in' => 'extras', 
            'fake' => true,// хранить в дополнительных данных страницы
            'default' => 'https://facebook.com/yourpage',
        ]);

        $this->crud->addField([
            'name' => 'instagram_url',
            'label' => 'Instagram URL',
            'type' => 'url',
            'store_in' => 'extras', 
            'fake' => true,// хранить в дополнительных данных страницы
            'default' => 'https://instagram.com/yourprofile',
        ]);

        $this->crud->addField([
            'name' => 'company_name',
            'label' => 'Company Name',
            'type' => 'text',
            'default' => 'ROMANOV WEB STUDIO LLC',
            'fake' => true,
            'store_in' => 'extras',
        ]);

        $this->crud->addField([   
            'name' => 'footer_button_title',
            'label' => 'Footer Button Title',
            'type' => 'text',
            'fake' => true,
            'store_in' => 'extras',
        ]);


        // // Main Content
        // $this->crud->addField([
        //     'name' => 'content',
        //     'label' => 'Additional Content',
        //     'type' => 'summernote',
        //     'placeholder' => 'Enter main content here',
        // ]);
    }

    // private function contact_page()
    // {
    //     $this->crud->addField([
    //         'name' => 'contact_form_title',
    //         'label' => 'Form Title',
    //         'type' => 'text',
    //         'default' => 'DISCUSS THE PROJECT',
    //         'fake' => true,
    //         'store_in' => 'extras',
    //     ]);

    //     $this->crud->addField([
    //         'name' => 'form_name_field',
    //         'label' => 'Name Field Label',
    //         'type' => 'text',
    //         'default' => 'NAME',
    //         'fake' => true,
    //         'store_in' => 'extras',
    //     ]);

    //     $this->crud->addField([
    //         'name' => 'form_email_field',
    //         'label' => 'Email Field Label',
    //         'type' => 'email',
    //         'default' => 'EMAIL',
    //         'fake' => true,
    //         'store_in' => 'extras',
    //     ]);

    //     $this->crud->addField([
    //         'name' => 'form_message_field',
    //         'label' => 'Message Field Label',
    //         'type' => 'textarea',
    //         'default' => 'MESSAGE',
    //         'fake' => true,
    //         'store_in' => 'extras',
    //     ]);

    //     $this->crud->addField([
    //         'name' => 'form_button_text',
    //         'label' => 'Button Text',
    //         'type' => 'text',
    //         'default' => 'SEND',
    //         'fake' => true,
    //         'store_in' => 'extras',
    //     ]);
    // }

    // private function services()
    // {
    //     // Keep existing service page template
    //     parent::services();
    // }
}