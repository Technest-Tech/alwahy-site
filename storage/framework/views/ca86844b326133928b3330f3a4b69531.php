<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login - Alwahy Academy</title>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>
<body class="bg-black text-white min-h-screen flex items-center justify-center">
    <div class="w-full max-w-md px-4">
        <div class="card">
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold gradient-text mb-2">Admin Login</h1>
                <p class="text-gray-400">Access the enrollment dashboard</p>
            </div>

            <?php if($errors->any()): ?>
                <div class="alert alert-error mb-6">
                    <ul class="list-disc list-inside">
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form method="POST" action="<?php echo e(route('admin.login.post')); ?>">
                <?php echo csrf_field(); ?>
                <div class="space-y-6">
                    <div>
                        <label class="block text-gold-400 mb-2">Email</label>
                        <input type="email" name="email" required class="form-input" value="<?php echo e(old('email')); ?>" placeholder="admin@alwahy.com">
                    </div>
                    
                    <div>
                        <label class="block text-gold-400 mb-2">Password</label>
                        <input type="password" name="password" required class="form-input" placeholder="Enter password">
                    </div>
                    
                    <button type="submit" class="btn-gold w-full">
                        Login
                    </button>
                </div>
            </form>

            <div class="mt-6 text-center text-sm text-gray-400">
                <a href="<?php echo e(route('home')); ?>" class="hover:text-gold-400 transition">← Back to Home</a>
            </div>
        </div>
    </div>
</body>
</html>

<?php /**PATH /Users/ahmedomar/Documents/technest/Alwahy Academy/academy-site/resources/views/admin/login.blade.php ENDPATH**/ ?>