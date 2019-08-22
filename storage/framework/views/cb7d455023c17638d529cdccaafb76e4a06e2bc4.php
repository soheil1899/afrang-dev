<header>
    <nav dir="ltr" class="px-5 py-3 shadow-sm navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="/"><strong><?php echo e(\App\setting::first()->websitename); ?></strong></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item px-2">
                    <a class="nav-link pl-3 pl-lg-0" href="/">Home</a>
                </li>
                <li class="nav-item dropdown px-2">
                    <a class="nav-link pl-3 pl-lg-0 dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                       role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        About Us
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="<?php echo e(route('programmer.team')); ?>">Programmer Team</a>
                        <a class="dropdown-item" href="<?php echo e(route('about.afrang')); ?>">About Afrang</a>
                        <a class="dropdown-item" href="#">About TISS</a>
                        <a class="dropdown-item" href="#">Other Software</a>
                    </div>
                </li>
                <li class="nav-item px-2">
                    <a class="nav-link pl-3 pl-lg-0" href="<?php echo e(route('webportfolio')); ?>">Our Portfolio</a>
                </li>











                <li class="nav-item px-2">
                    <a class="nav-link pl-3 pl-lg-0" href="#">Open Source</a>
                </li>
                <li class="nav-item px-2">
                    <a class="nav-link pl-3 pl-lg-0" href="<?php echo e(route('contact.us')); ?>">Contact Us</a>
                </li>
                <li class="nav-item px-2">
                    <a class="nav-link pl-3 pl-lg-0" href="<?php echo e(route('orderonline')); ?>">Online Order</a>
                </li>
            </ul>
        </div>
    </nav>
</header>