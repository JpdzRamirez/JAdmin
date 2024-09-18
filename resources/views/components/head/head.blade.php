   <!-- Navigation-->
   <div class="main-header">
    <div class="main-header-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="dark">
          <a href="index.html" class="logo">
            <img
              src="assets/img/kaiadmin/logo_light.svg"
              alt="navbar brand"
              class="navbar-brand"
              height="20"
            />
          </a>
          <div class="nav-toggle">
            <button class="btn btn-toggle toggle-sidebar">
              <i class="gg-menu-right"></i>
            </button>
            <button class="btn btn-toggle sidenav-toggler">
              <i class="gg-menu-left"></i>
            </button>
          </div>
          <button class="topbar-toggler more">
            <i class="gg-more-vertical-alt"></i>
          </button>
        </div>
        <!-- End Logo Header -->
      </div>
       <!-- Navbar Header -->
       <nav class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom">
           <div class="container-fluid">
               <nav class="navbar navbar-header-left navbar-expand-lg navbar-form nav-search p-0 d-none d-lg-flex">
                   <div class="input-group">
                       <div class="input-group-prepend">
                           <button type="submit" class="btn btn-search pe-1">
                               <i class="fa fa-search search-icon"></i>
                           </button>
                       </div>
                       <input type="text" placeholder="Search ..." class="form-control" />
                   </div>
               </nav>

               <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">
                   <li class="nav-item topbar-icon dropdown hidden-caret d-flex d-lg-none">
                       <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                           aria-expanded="false" aria-haspopup="true">
                           <i class="fa fa-search"></i>
                       </a>
                       <ul class="dropdown-menu dropdown-search animated fadeIn">
                           <form class="navbar-left navbar-form nav-search">
                               <div class="input-group">
                                   <input type="text" placeholder="Search ..." class="form-control" />
                               </div>
                           </form>
                       </ul>
                   </li>
                   <li class="nav-item topbar-icon dropdown hidden-caret">
                       <a class="nav-link dropdown-toggle" href="#" id="messageDropdown" role="button"
                           data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           <i class="fa fa-envelope"></i>
                       </a>
                       <ul class="dropdown-menu messages-notif-box animated fadeIn" aria-labelledby="messageDropdown">
                           <li>
                               <div class="dropdown-title d-flex justify-content-between align-items-center">
                                   Messages
                                   <a href="#" class="small">Mark all as read</a>
                               </div>
                           </li>
                           <li>
                               <div class="message-notif-scroll scrollbar-outer">
                                   <div class="notif-center">
                                       <a href="#">
                                           <div class="notif-img">
                                               <img src="assets/img/jm_denis.jpg" alt="Img Profile" />
                                           </div>
                                           <div class="notif-content">
                                               <span class="subject">Jimmy Denis</span>
                                               <span class="block"> How are you ? </span>
                                               <span class="time">5 minutes ago</span>
                                           </div>
                                       </a>
                                       <a href="#">
                                           <div class="notif-img">
                                               <img src="assets/img/chadengle.jpg" alt="Img Profile" />
                                           </div>
                                           <div class="notif-content">
                                               <span class="subject">Chad</span>
                                               <span class="block"> Ok, Thanks ! </span>
                                               <span class="time">12 minutes ago</span>
                                           </div>
                                       </a>
                                       <a href="#">
                                           <div class="notif-img">
                                               <img src="assets/img/mlane.jpg" alt="Img Profile" />
                                           </div>
                                           <div class="notif-content">
                                               <span class="subject">Jhon Doe</span>
                                               <span class="block">
                                                   Ready for the meeting today...
                                               </span>
                                               <span class="time">12 minutes ago</span>
                                           </div>
                                       </a>
                                       <a href="#">
                                           <div class="notif-img">
                                               <img src="assets/img/talha.jpg" alt="Img Profile" />
                                           </div>
                                           <div class="notif-content">
                                               <span class="subject">Talha</span>
                                               <span class="block"> Hi, Apa Kabar ? </span>
                                               <span class="time">17 minutes ago</span>
                                           </div>
                                       </a>
                                   </div>
                               </div>
                           </li>
                           <li>
                               <a class="see-all" href="javascript:void(0);">See all messages<i
                                       class="fa fa-angle-right"></i>
                               </a>
                           </li>
                       </ul>
                   </li>
                   <li class="nav-item topbar-icon dropdown hidden-caret">
                       <a class="nav-link dropdown-toggle" href="#" id="notifDropdown" role="button"
                           data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           <i class="fa fa-bell"></i>
                           <span class="notification">4</span>
                       </a>
                       <ul class="dropdown-menu notif-box animated fadeIn" aria-labelledby="notifDropdown">
                           <li>
                               <div class="dropdown-title">
                                   You have 4 new notification
                               </div>
                           </li>
                           <li>
                               <div class="notif-scroll scrollbar-outer">
                                   <div class="notif-center">
                                       <a href="#">
                                           <div class="notif-icon notif-primary">
                                               <i class="fa fa-user-plus"></i>
                                           </div>
                                           <div class="notif-content">
                                               <span class="block"> New user registered </span>
                                               <span class="time">5 minutes ago</span>
                                           </div>
                                       </a>
                                       <a href="#">
                                           <div class="notif-icon notif-success">
                                               <i class="fa fa-comment"></i>
                                           </div>
                                           <div class="notif-content">
                                               <span class="block">
                                                   Rahmad commented on Admin
                                               </span>
                                               <span class="time">12 minutes ago</span>
                                           </div>
                                       </a>
                                       <a href="#">
                                           <div class="notif-img">
                                               <img src="assets/img/profile2.jpg" alt="Img Profile" />
                                           </div>
                                           <div class="notif-content">
                                               <span class="block">
                                                   Reza send messages to you
                                               </span>
                                               <span class="time">12 minutes ago</span>
                                           </div>
                                       </a>
                                       <a href="#">
                                           <div class="notif-icon notif-danger">
                                               <i class="fa fa-heart"></i>
                                           </div>
                                           <div class="notif-content">
                                               <span class="block"> Farrah liked Admin </span>
                                               <span class="time">17 minutes ago</span>
                                           </div>
                                       </a>
                                   </div>
                               </div>
                           </li>
                           <li>
                               <a class="see-all" href="javascript:void(0);">See all notifications<i
                                       class="fa fa-angle-right"></i>
                               </a>
                           </li>
                       </ul>
                   </li>
                   <li class="nav-item topbar-icon dropdown hidden-caret">
                       <a class="nav-link" data-bs-toggle="dropdown" href="#" aria-expanded="false">
                           <i class="fas fa-layer-group"></i>
                       </a>
                       <div class="dropdown-menu quick-actions animated fadeIn">
                           <div class="quick-actions-header">
                               <span class="title mb-1">Quick Actions</span>
                               <span class="subtitle op-7">Shortcuts</span>
                           </div>
                           <div class="quick-actions-scroll scrollbar-outer">
                               <div class="quick-actions-items">
                                   <div class="row m-0">
                                       <a class="col-6 col-md-4 p-0" href="#">
                                           <div class="quick-actions-item">
                                               <div class="avatar-item bg-danger rounded-circle">
                                                   <i class="far fa-calendar-alt"></i>
                                               </div>
                                               <span class="text">Calendar</span>
                                           </div>
                                       </a>
                                       <a class="col-6 col-md-4 p-0" href="#">
                                           <div class="quick-actions-item">
                                               <div class="avatar-item bg-warning rounded-circle">
                                                   <i class="fas fa-map"></i>
                                               </div>
                                               <span class="text">Maps</span>
                                           </div>
                                       </a>
                                       <a class="col-6 col-md-4 p-0" href="#">
                                           <div class="quick-actions-item">
                                               <div class="avatar-item bg-info rounded-circle">
                                                   <i class="fas fa-file-excel"></i>
                                               </div>
                                               <span class="text">Reports</span>
                                           </div>
                                       </a>
                                       <a class="col-6 col-md-4 p-0" href="#">
                                           <div class="quick-actions-item">
                                               <div class="avatar-item bg-success rounded-circle">
                                                   <i class="fas fa-envelope"></i>
                                               </div>
                                               <span class="text">Emails</span>
                                           </div>
                                       </a>
                                       <a class="col-6 col-md-4 p-0" href="#">
                                           <div class="quick-actions-item">
                                               <div class="avatar-item bg-primary rounded-circle">
                                                   <i class="fas fa-file-invoice-dollar"></i>
                                               </div>
                                               <span class="text">Invoice</span>
                                           </div>
                                       </a>
                                       <a class="col-6 col-md-4 p-0" href="#">
                                           <div class="quick-actions-item">
                                               <div class="avatar-item bg-secondary rounded-circle">
                                                   <i class="fas fa-credit-card"></i>
                                               </div>
                                               <span class="text">Payments</span>
                                           </div>
                                       </a>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </li>
                   <li class="nav-item topbar-icon dropdown hidden-caret">
                       @livewire('components.head.online')
                   </li>
                       @livewire('components.head.dropdown-profile')
               </ul>
           </div>
       </nav>
       <!-- End Navbar -->
   </div>
   @push('dashboardScripts')
       <script>
        document.addEventListener('DOMContentLoaded', function() {
            const bubble = document.querySelector('.bubble');

            // Función de debounce para limitar la frecuencia de ejecución
            function debounce(func, wait) {
                let timeout;
                return function(...args) {
                    clearTimeout(timeout);
                    timeout = setTimeout(() => func.apply(this, args), wait);
                };
            }

            // Configuración del temporizador de inactividad
            let inactivityTime = function() {
                let inactivityTimer;
                let currentState = 'active'; // Estado actual del usuario

                const updateState = (newState) => {
                    if (currentState !== newState) {
                        if (newState === 'active') {
                            Livewire.dispatch('userActive'); // Emitir evento Usuario Activo
                        }else if (newState === 'away') {
                            Livewire.dispatch('userAway'); // Emitir evento Usuario Alejado
                        } else if (newState === 'inactive') {
                            Livewire.dispatch('userInactive'); // Emitir evento Usuario Inactivo
                        }
                        currentState = newState;
                    }
                };

                const resetTimer = () => {
                    clearTimeout(inactivityTimer);
                    updateState('active'); // Usuario activo
                    inactivityTimer = setTimeout(() => {
                        updateState('away'); // Usuario alejado
                        setTimeout(() => {
                            updateState('inactive'); // Usuario inactivo
                        }, 30000); // 30 segundos de inactividad
                    }, 45000); // 45 segundos de inactividad
                };

                // Usa debounce para los eventos de actividad
                const debouncedResetTimer = debounce(resetTimer, 300); // 1 segundo de debounce

                // Eventos de actividad
                window.onload = debouncedResetTimer;
                document.onmousemove = debouncedResetTimer;
                document.onkeypress = debouncedResetTimer;
                document.ontouchstart = debouncedResetTimer;
            };

            inactivityTime();
        });
       </script>
   @endpush
