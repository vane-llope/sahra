 <!-- Contact-->
 <section class="page-section" id="contact">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading ">ارتباط با ما</h2>
            <h3 class="section-subheading text-muted">نظرات و پیشنهادات خود را برای ما ارسال بفرمایید</h3>
        </div>
        <!-- * * * * * * * * * * * * * * *-->
        <form id="contactForm" >
            <div class="row align-items-stretch mb-5">
                <div class="col-md-6">
                    <div class="form-group">
                        <!-- Name input-->
                        <input class="form-control" id="name" type="text" placeholder="نام" data-sb-validations="required" />
                        <div class="invalid-feedback" data-sb-feedback="name:required">نام الزامی است</div>
                    </div>
                    <div class="form-group">
                        <!-- Email address input-->
                        <input class="form-control" id="email" type="email" placeholder="ایمیل" data-sb-validations="required,email" />
                        <div class="invalid-feedback" data-sb-feedback="email:required">ایمیل الزامی است</div>
                        <div class="invalid-feedback" data-sb-feedback="email:email">ایمیل معتبر نمیباشد</div>
                    </div>
                    <div class="form-group mb-md-0">
                        <!-- Phone number input-->
                        <input class="form-control" id="phone" type="tel" placeholder="تلفن" data-sb-validations="required" />
                        <div class="invalid-feedback" data-sb-feedback="phone:required">شماره تلفن الزامی است</div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group form-group-textarea mb-md-0">
                        <!-- Message input-->
                        <textarea class="form-control" id="message" placeholder="پیام شما" data-sb-validations="required"></textarea>
                        <div class="invalid-feedback" data-sb-feedback="message:required">پیام الزامی است</div>
                    </div>
                </div>
            </div>
           
            <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">خطا در ارسال پیام!</div></div>
            <!-- Submit Button-->
            <div class="text-center"><button class="btn btn-warning mb-4 text-light w-25" id="submitButton" type="submit">ارسال پیام</button></div>
        </form>
    </div>
</section>