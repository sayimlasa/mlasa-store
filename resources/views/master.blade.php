<!DOCTYPE html>
<html lang="en">
  @include('layouts.head')
<body class="hold-transition sidebar-mini layout-fixed ">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

 @include('layouts.header')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content">
      <div class="container-fluid">
        
        @yield('content')
     
      </div> 
    </section>
   
  </div>
  
  @include('layouts.footer')
  @include('layouts.footerscript')
</div>

</body>
</html>
