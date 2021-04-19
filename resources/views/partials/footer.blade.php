<section id="contact" class="footer-contact">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="contact-block">
                    <div class="contact-logo">
                        <img class="img-fluid" src="{{ asset('img/logo-cover.png') }}" alt="Logo" />
                    </div>
                    <div class="contact-info">
                        <div class="center">VG Glories</div>
                        <div class="address">Avinguda Diagonal, 208, Local C49,</br> 08018 Barcelona</div>
                    </div>
                    <div class="contact-info">
                        <div class="center">VG Sagrada Familia</div>
                        <div class="address">C. de Mallorca, 508</br> 08013 Barcelona</div>
                    </div>
                    <div class="contact-info">
                        <div>+34684160070</div>
                        <div><a href="info@ohfit.barcelona">info@ohfit.barcelona</a></div>
                    </div>
                    <div class="contact-extra">
                        <a href="https://wa.me/34684160070" target="_blank" class="btn btn-ohfit">Contactar</a>
                        <div class="rrss-container">
                            <a href="https://www.instagram.com/ohfitbarcelona/" class="link">
                                <img src="{{ asset('img/insta_link.png') }}" />
                            </a>
                            <a href="https://es.linkedin.com/company/ohfitbarcelona" class="link">
                                <img src="{{ asset('img/in_link.png') }}" />
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-block">
                    <form id="contact-form" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control form-contact" placeholder="Nombre completo"
                                id="contact_name" name="contact_name" required />
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control form-contact" placeholder="E-Mail"
                                id="contact_email" name="contact_email" required />
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control form-contact" placeholder="E-Mail"
                                id="contact_email" name="contact_email" required />
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-contact" placeholder="Motivo de la consulta"
                                id="contact_subject" name="contact_subject" required />
                        </div>
                        <div class="form-group">
                            <textarea class="form-control form-contact" id="contact_message" name="contact_message"
                                placeholder="Cuéntanos..." rows="5"></textarea>
                        </div>
                        <button type="submit" id="submit_contact" class="btn btn-ohfit"><span>Enviar</span></button>
                        <div id="response"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<footer class="footer">
    © OH-FIT | Servicio Integral de Actividad Física y Salud. | 2021
</footer>
