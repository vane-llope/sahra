 <!-- Navigation-->
 <nav class="navbar navbar-expand-lg  bg-dark fixed-top" id="mainNav" style="z-index: 9998;">
    <div class="container">
        <a class="navbar-brand" href="#page-top"><img src="{{asset('images/logo.jpg')}}" alt="..." /></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars ms-1 text-light"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto py-4 py-lg-0">
                <!--<li class="nav-item"><a class="nav-link " href="/events/create"><strong>ایجاد رویداد + </strong></a></li>
                <li class="nav-item"><a class="nav-link " href="/entities/create"><strong>ایجاد موجودیت + </strong></a></li>
                <li class="nav-item"><a class="nav-link " href="/roles/create"><strong>ایجاد نقش + </strong></a></li>
                <li class="nav-item"><a class="nav-link " href="/roles"><strong> نقش ها</strong></a></li>
                <li class="nav-item"><a class="nav-link " href="/users"><strong>کاربران</strong></a></li>
                <li class="nav-item"><a class="nav-link " href="/entities"><strong>موجودیت ها</strong></a></li>-->
                <li class="nav-item"><a class="nav-link " href="/"><strong>صفحه اصلی</strong></a></li>
                <li class="nav-item"><a class="nav-link " href="/events"><strong>رویدادهاومسابقات</strong></a></li>
                <li class="nav-item"><a class="nav-link" href="/about"> <strong>درباره ما</strong></a></li>
                <li class="nav-item"><a class="nav-link " href="/contact"> <strong>تماس با ما</strong></a></li>
                @auth
                <li class="nav-item"><strong> 
                    <form  action="/users/logout" method="POST" >
                        @csrf
                        <button class="nav-link fw-bold " type="submit">خروج</button>
                        </form>
                </strong></li>
                @else 
                <li class="nav-item"><a class="nav-link " href="/users/register"><strong>ثبت نام</strong></a></li>
                <li class="nav-item"><a class="nav-link " href="/users/login"><strong>ورود</strong></a></li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
