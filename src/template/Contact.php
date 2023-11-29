<?php ob_start(); ?>
<div class="container-fluid cont">
    <section class="gradient-custom">
        <div class="container py-5">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-10 col-lg-8 col-xl-7">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">
                            <div class="mb-md-5 mt-md-4 pb-5">
                                <h2 class="fw-bold mb-2 text-uppercase">Contact Us</h2>
                                <p class="text-white-50 mb-5">If you would like information, please do not hesitate to write to us</p>
                                <?php if (!empty($error)) : ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?= $error ?>
                                    </div>
                                <?php endif; ?>
                                <form action="/contact/send" method="POST" enctype="multipart/form-data">
                                    <div class="form-outline form-white mb-4">
                                        <label class="form-label" for="adminFirstName">First Name</label>
                                        <input type="text" id="adminFirstName" name="adminFirstName" class="form-control form-control-lg" placeholder="Enter your first name" required>
                                    </div>
                                    <div class="form-outline form-white mb-4">
                                        <label class="form-label" for="adminLastName">Last Name</label>
                                        <input type="text" id="adminLastName" name="adminLastName" class="form-control form-control-lg" placeholder="Enter your last name" required>
                                    </div>
                                    <div class="form-outline form-white mb-4">
                                        <label class="form-label" for="adminEmail">Email</label>
                                        <input type="email" id="adminEmail" name="adminEmail" class="form-control form-control-lg" placeholder="Enter your email" required>
                                    </div>
                                    <div class="form-outline form-white mb-4">
                                        <label class="form-label" for="subject">Subject</label>
                                        <select class="form-control form-control-lg" aria-label="Floating label select example" name="subject">
                                            <option value="">Subject</option>
                                            <option value="Request information">Request information</option>
                                            <option value="Follow-up of rental request">Follow-up of rental request</option>
                                            <option value="Business Proposal">Business Proposale</option>
                                            <option value="claim">claim</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>
                                    <div class="form-outline form-white mb-4">
                                        <label class="form-label" for="message">Message</label>
                                        <textarea id="message" name="message" class="form-control form-control-lg" rows="5" >Your message ...</textarea>
                                    </div>
                                    <div class="form-outline form-white mb-4">
                                        <input type="checkbox" id="sendCopie" name="sendCopie">
                                        <label class="form-check-label" for="sendCopie"> Check this box if you would like a copy of your message</label>
                                    </div>
                                    <button class="btn btn-outline-light btn-lg px-5" type="submit" name="register">Send your message</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php 
$content = ob_get_clean(); 
require_once('src/template/Layout.php');
?>