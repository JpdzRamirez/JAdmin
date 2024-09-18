<div>
    <div id="modal-formExport" class="modal" style="display: none"  id="formularioJSON" aria-labelledby="formularioJSONLabel" >
        <article class="modal-container">
            <header class="modal-container-header">
                <h1 class="modal-container-title">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" aria-hidden="true">
                        <path fill="none" d="M0 0h24v24H0z" />
                        <path fill="currentColor" d="M14 9V4H5v16h6.056c.328.417.724.785 1.18 1.085l1.39.915H3.993A.993.993 0 0 1 3 21.008V2.992C3 2.455 3.449 2 4.002 2h10.995L21 8v1h-7zm-2 2h9v5.949c0 .99-.501 1.916-1.336 2.465L16.5 21.498l-3.164-2.084A2.953 2.953 0 0 1 12 16.95V11zm2 5.949c0 .316.162.614.436.795l2.064 1.36 2.064-1.36a.954.954 0 0 0 .436-.795V13h-5v3.949z" />
                    </svg>
                    Formulario de envío
                </h1>
                <button class="icon-button" onclick="cerrar()" id="close-modal-button">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                        <path fill="none" d="M0 0h24v24H0z" />
                        <path fill="currentColor" d="M12 10.586l4.95-4.95 1.414 1.414-4.95 4.95 4.95 4.95-1.414 1.414-4.95-4.95-4.95 4.95-1.414-1.414 4.95-4.95-4.95-4.95L7.05 5.636z" />
                    </svg>
                </button>
            </header>
            <section onmouseover="setDate()" class="modal-container-body rtf d-flex flex-row align-items-center">
                <lottie-player src="{{ asset('assets/lottie/formSend.json') }}" background="transparent"  speed="1"  style="width: 300px; height: 300px;" loop nocontrols autoplay></lottie-player>
                            <!-- Contact Section Form-->
                            <div class="row justify-content-center">
                                <div class="col">
                                    <form  id="contactForm" method="POST"action="{{ route('icon.exportar')}}" data-sb-form-api-token="API_TOKEN">
                                        <!-- Name input-->
                                        @csrf
                                            <div class="form-floating mb-3">
                                                <input style="padding-top: 2.6rem" class="form-control" id="nameFile" type="text" required placeholder="Enter your name..." data-sb-validations="required" />
                                                <label for="nameFile">Nombre para exportar</label>
                                                <div class="invalid-feedback" data-sb-feedback="name:required">Se requiere un nombre.</div>
                                            </div>
                                            <div class="d-flex flex-column gap-2">
                                                <label for="fechaInicio">De la fecha</label>
                                                <input  class="form-control" required type="text" id="fechaInicio" name="fechaInicio">
                                                <label for="fechaFinal">al</label>
                                                <input type="text" required class="form-control" id="fechaFinal" name="fechaFinal">
                                            </div>

                                        {{-- <!-- opcion para enviar por smtp al correo eléctronico-->
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="email" type="email" placeholder="name@example.com" data-sb-validations="required,email" />
                                            <label for="email">Email address</label>
                                            <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.</div>
                                            <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
                                        </div> --}}
                                        <!--  opción para enviar por sms o whatsapp-->
                                        {{-- <div class="form-floating mb-3">
                                            <input class="form-control" id="phone" type="tel" placeholder="(123) 456-7890" data-sb-validations="required" />
                                            <label for="phone">Phone number</label>
                                            <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is required.</div>
                                        </div> --}}
                                        <!-- Message para el cuerpo del correo o wp-->
                                        {{-- <div class="form-floating mb-3">
                                            <textarea class="form-control" id="message" type="text" placeholder="Enter your message here..." style="height: 10rem" data-sb-validations="required"></textarea>
                                            <label for="message">Message</label>
                                            <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.</div>
                                        </div> --}}
                                        <!-- Submit success message-->
                                        <!---->
                                        <!-- This is what your users will see when the form-->
                                        <!-- has successfully submitted-->
                                        <div class="d-none" id="submitSuccessMessage">
                                            <div class="text-center mb-3">
                                                <div class="fw-bolder">Form submission successful!</div>
                                                To activate this form, sign up at                                                
                                            </div>
                                        </div>
                                        <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Error sending message!</div></div>
                                        <button class="btn btn-primary btn-sm mt-1" id="submitButton" type="submit">Enviar</button>
                                    </form>
                                </div>
                            </div>
            </section>
            <footer class="modal-container-footer text-center">
                <code>❤ ArriveSafe Development Team</code>
            </footer>
        </article>
    </div>

</div>