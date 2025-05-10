{{-- This file is used for menu items by any Backpack v6 theme --}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>

<!-- <x-backpack::menu-item title="Homes" icon="la la-question" :link="backpack_url('home')" /> -->
<x-backpack::menu-item title='Pages' icon='la la-file-o' :link="backpack_url('page')" />
<x-backpack::menu-item title='Menu' icon='la la-list' :link="backpack_url('menu-item')" />
<x-backpack::menu-item title="Features" icon="las la-comment-medical" :link="backpack_url('feature')" />
<x-backpack::menu-item title="Prices" icon="las la-money-bill-wave" :link="backpack_url('price')" />
<x-backpack::menu-item title="Services" icon="lab la-servicestack" :link="backpack_url('service')" />
<x-backpack::menu-item title="Portfolios" icon="las la-briefcase" :link="backpack_url('portfolio')" />
<x-backpack::menu-item title="Forms" icon="las la-barcode" :link="backpack_url('form')" />