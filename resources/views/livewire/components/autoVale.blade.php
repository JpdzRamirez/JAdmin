 <div>
     <!-- Portfolio Grid Items-->
     <div class="row justify-content-center">
         <!-- Portfolio Item 1-->

         <!-- Manual Section-->
         <section class="page-section rounded bg-primary border border-primary text-white mb-0" id="about">
             <div class="container">
                 <!-- About Section Heading-->
                 <h2 class="page-section-heading text-center text-uppercase text-white">Manual de Uso</h2>
                 <!-- Icon Divider-->
                 <div class="divider-custom divider-light">
                     <div class="divider-custom-line"></div>
                     <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                     <div class="divider-custom-line"></div>
                 </div>
                 <!-- About Section Content-->
                 <div class="row">
                     <div class="col-lg-4 ms-auto">
                         <p class="lead">Esta herramienta consulta y extrae los vales que no pasaron a ICON.</p>
                     </div>
                     <div class="col-lg-4 me-auto">
                         <p class="lead">Puedes exportar facilmente la información según un rango de fechas
                             específicas o solo el día que se necesite.
                         </p>
                     </div>
                 </div>
                 <div class="row">
                     <div class="container d-flex justify-content-center">
                         <button onclick="openmodal()" class="btn btn-light">Abrir Formulario</button>
                     </div>
                 </div>
             </div>
         </section>
     </div>
     @include('livewire.modal.modalSubmitVales')  
 </div>




