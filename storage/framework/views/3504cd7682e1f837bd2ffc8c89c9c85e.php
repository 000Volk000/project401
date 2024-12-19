<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand" href="/"><img src="https://i.ibb.co/gWWr6tN/image-removebg-preview.png" width="70px"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://github.com/000Volk000/sprintcode">Sobre nosotros</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <?php if(auth()->guard()->check()): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Bienvenido, <?php echo e(Auth::user()->name); ?></a>
                    </li>
                    <li class="nav-item">
                        <form action="<?php echo e(route('logout')); ?>" method="POST" style="display: inline;">
                            <?php echo csrf_field(); ?>
                            <button type="submit" class="btn btn-link nav-link" style="text-decoration: none;">Logout</button>
                        </form>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('login')); ?>">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('register')); ?>">Register</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
<?php /**PATH C:\xampp\htdocs\laravel\sprintcode\resources\views/components/navbar.blade.php ENDPATH**/ ?>