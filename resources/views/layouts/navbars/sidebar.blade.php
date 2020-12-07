<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">


<div class="sidebar" data-color="orange" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
    <a href="https://creative-tim.com/" class="simple-text logo-normal">
      {{ __('Creative Tim') }}
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
          <i class="material-icons">dashboard</i>
            <p>{{ __('Dashboard') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'category' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('getManageCategory') }}">
          <i class="material-icons">Category</i>
            <p>{{ __('Category') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'product' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('getManageProduct') }}">
          <i class="material-icons">Product</i>
            <p>{{ __('Product') }}</p>
        </a>
      </li>




      <li class="nav-item {{ ($activePage == 'profile') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#laravelExample" aria-expanded="true">
          <i><img style="width:25px" src="{{ asset('material') }}/img/laravel.svg"></i>
          <p>{{ __('Manage Admin') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse show" id="laravelExample">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'profile' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('profile.edit') }}">
                <span class="sidebar-mini"> UP </span>
                <span class="sidebar-normal">{{ __('User profile') }} </span>
              </a>
            </li>
            
          </ul>
        </div>
      </li>
     
      
  <!-- content -->

   <li class="nav-item {{ ($activePage == 'banner' || $activePage == 'pages' || $activePage == 'blog') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#content" aria-expanded="true">
          <i><img style="width:25px" src="{{ asset('material') }}/img/laravel.svg"></i>
         <STRONG> <p>{{ __('Content') }}
            <b class="caret"></b>
          </p>
          </STRONG>
        </a>
        <div class="collapse show" id="content">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'banner' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('banner.list') }}">
                <span class="sidebar-mini"> B </span>
                <span class="sidebar-normal">{{ __('Banner') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'pages' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('page.list') }}">
                <span class="sidebar-mini"> P </span>
                <span class="sidebar-normal"> {{ __('Pages') }} </span>
              </a>
            </li>

      <li class="nav-item {{ ($activePage == 'blog_category' || $activePage == 'addblog' || $activePage == 'blogpost') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#blog" aria-expanded="true">
         <i class="material-icons ">
topic
</i>
     <p style="font-style: dark" class="blog">{{ __('Blog/News') }}
         <b class="caret"></b>     
      </p>
        </a>
        <div class="collapse " id="blog">
          <ul class="nav">

            <li class="nav-item{{ $activePage == 'blog_category' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('blog.category') }}">
                <span class="sidebar-mini"> BC </span>
                <span class="sidebar-normal"> {{ __('Blog Category') }} </span>
              </a>
            </li>

             <li class="nav-item{{ $activePage == 'add_blog' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('addblogmanage') }}">
                <span class="sidebar-mini"> AB </span>
                <span class="sidebar-normal"> {{ __(' Add Blog') }} </span>
              </a>
            </li>

             <li class="nav-item{{ $activePage == 'post_list' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('post.list') }}">
                <span class="sidebar-mini"> PL </span>
                <span class="sidebar-normal"> {{ __('post.list') }} </span>
              </a>
            </li>

               </ul>
             </div>
           </li>
          </ul>
        </div>
      </li>



      
      
      <li class="nav-item {{ ($activePage == 'store_information' ) ? ' active' : '' }}" aria-expanded="true">
        <a class="nav-link" data-toggle="collapse" href="#laravel" aria-expanded="true">
           <i class="material-icons">
settings_applications
</i>
         <strong> <p>{{ __('SHOP SETTING') }}
            <b class="caret"></b>
          </p></strong>
        </a>
        <div class="collapse show" id="laravel">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'store_information' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('store.information') }}">
                <span class="sidebar-mini"> UP </span>
                <span class="sidebar-normal">{{ __('Store Manage') }} </span>
              </a>
            </li>
          </ul>
        </div>
      </li>
    </ul>
  </div>
</div>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js"></script>
