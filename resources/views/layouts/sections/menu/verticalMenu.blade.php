
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">

  <!-- ! Hide app brand if navbar-full -->
  <div class="app-brand demo">
    <!--<a href="{{url('/')}}" class="app-brand-link">-->
      <a href="javascript:void(0);"  class="app-brand-link sidecollapes">
        <input type="hidden" class="initvalue" id="initvalue" value="0" >
      <!-- <span class="app-brand-logo demo">
        @include('_partials.macros',["width"=>25,"withbg"=>'#696cff'])
      </span>
      <span class="app-brand-text demo menu-text fw-bold ms-2">{{config('variables.templateName')}}</span> -->
      @if(auth()->user()->type == 'Super Admin')
      <img src="/assets/img/favicon/erp4_logo.png" class="sideimage" width="80%" alt="bleaperp4">
      @else
      @isset($profile[0]['image'])
      <img src="/hospital_logo/{{$profile[0]['image']}}" class="sideimage" width="80%" alt="bleaperp4">
      @else
      <img src="/assets/img/favicon/erp4_logo.png" class="sideimage" width="80%" alt="bleaperp4">
      @endisset
      @endif
    </a>



    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-autod-block d-xl-none">
      <i class="bx bx-chevron-left bx-sm align-middle"></i>
    </a>
  </div>

  <div class="menu-inner-shadow"></div>

  <ul class="menu-inner py-1">
    @foreach ($menuData[0]->menu as $menu)

    @if (isset($menu->type) && $menu->type == auth()->user()->type)

 
    {{-- adding active and open class if child is active --}}

    {{-- menu headers --}}
    @if (isset($menu->menuHeader))
    <li class="menu-header small text-uppercase">
      <span class="menu-header-text">{{ $menu->menuHeader }}</span>
    </li>

    @else

    {{-- active menu method --}}
    @php
    $activeClass = null;
    $currentRouteName = Route::currentRouteName();

    if ($currentRouteName === $menu->slug) {
    $activeClass = 'active';
    }
    elseif (isset($menu->submenu)) {
    if (gettype($menu->slug) === 'array') {
    foreach($menu->slug as $slug){
    if (str_contains($currentRouteName,$slug) and strpos($currentRouteName,$slug) === 0) {
    $activeClass = 'active open';
    }
    }
    }
    else{
    if (str_contains($currentRouteName,$menu->slug) and strpos($currentRouteName,$menu->slug) === 0) {
    $activeClass = 'active open';
    }
    }

    }
    @endphp

    {{-- main menu --}}
    <li class="menu-item {{$activeClass}}">
      <a href="{{ isset($menu->url) ? url($menu->url) : 'javascript:void(0);' }}" class="{{ isset($menu->submenu) ? 'menu-link menu-toggle' : 'menu-link' }}" @if (isset($menu->target) and !empty($menu->target)) target="_blank" @endif>
        @isset($menu->icon)
        <i class="{{ $menu->icon }}"></i>
        @endisset
        <div>{{ isset($menu->name) ? __($menu->name) : '' }}</div>
      </a>

      {{-- submenu --}}
      @isset($menu->submenu)
      @include('layouts.sections.menu.submenu',['menu' => $menu->submenu])
      @endisset
    </li>
    @endif
    @endif

    @endforeach
  </ul>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Function to set active menu link
        function setActiveMenuLink() {
            var storedActiveLinkIndex = localStorage.getItem('activeMenuLinkIndex');
            if (storedActiveLinkIndex !== null) {
                $('.menu-link, .menu-toggle').eq(storedActiveLinkIndex).addClass('active-clicked');
                $('.menu-link, .menu-toggle').eq(storedActiveLinkIndex).closest('.menu-item').addClass('open');
            }
        }

        // Function to set active submenu link
        function setActiveSubmenuLink() {
            var activeSubmenuLinkIndex = localStorage.getItem('activeSubmenuLinkIndex');
            if (activeSubmenuLinkIndex !== null) {
                $('.menu-sub .menu-link, .menu-sub .menu-toggle').eq(activeSubmenuLinkIndex).addClass('active-clicked');
                $('.menu-sub .menu-link, .menu-sub .menu-toggle').eq(activeSubmenuLinkIndex).closest('.menu-item').addClass('open');
            }
        }

        // Set active menu and submenu links
        setActiveMenuLink();
        setActiveSubmenuLink();

        // Function to close all open menus and submenus
        function closeAllMenus() {
            $('.menu-item').removeClass('open');
            $('.menu-link, .menu-toggle').removeClass('active-clicked');
            localStorage.removeItem('activeMenuLinkIndex');
            localStorage.removeItem('activeSubmenuLinkIndex');
        }

        // Click event handler for main menu items
        $('.menu-link, .menu-toggle').click(function() {
            var closestMenuItem = $(this).closest('.menu-item');
            if (closestMenuItem.hasClass('open')) {
                // Submenu is already open, close it
                closeAllMenus();
            } else {
                // Submenu is closed, update active link and toggle open
                closeAllMenus();
                $(this).addClass('active-clicked');
                localStorage.setItem('activeMenuLinkIndex', $('.menu-link, .menu-toggle').index(this));
                closestMenuItem.addClass('open');
                
                // Redirect if the menu item has a link
                var menuLink = $(this).attr('href');
                if (menuLink && menuLink !== 'javascript:void(0);') {
                    window.location.href = menuLink;
                }
            }
            return false; // Prevents the default behavior of the link
        });

        // Click event handler for submenu items
        $('.menu-sub .menu-link, .menu-sub .menu-toggle').click(function(e) {
            e.stopPropagation(); // Prevents the click event from bubbling up to the parent menu item
            closeAllMenus(); // Close all other menus and submenus
            $(this).addClass('active-clicked');
            localStorage.setItem('activeSubmenuLinkIndex', $('.menu-sub .menu-link, .menu-sub .menu-toggle').index(this));
            
            // Redirect if the submenu item has a link
            var submenuLink = $(this).attr('href');
            if (submenuLink && submenuLink !== 'javascript:void(0);') {
                window.location.href = submenuLink;
            }
            
            return false; // Prevents the default behavior of the link
        });

        // Check if the current URL matches any submenu URL and keep it open
        var currentUrl = window.location.href;
        $('.menu-sub .menu-link').each(function(index, element) {
            var submenuUrl = $(element).attr('href');
            if (currentUrl.includes(submenuUrl)) {
                $(element).closest('.menu-item').addClass('open');
                return false;
            }
        });

        // Expand the parent menu items of the active submenu link
        var activeSubmenuLinkParent = $('.menu-sub .menu-link.active-clicked').closest('.menu-item');
        activeSubmenuLinkParent.parents('.menu-item').addClass('open');
    });
</script>






</aside>


