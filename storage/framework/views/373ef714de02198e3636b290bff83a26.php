<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard - Alwahy Academy</title>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>
<body class="bg-black text-white min-h-screen">
    <header class="bg-gray-900 border-b border-gold-400/20 py-4">
        <div class="container mx-auto px-4">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-xl font-bold gradient-text">Admin Dashboard</h1>
                </div>
                <form method="POST" action="<?php echo e(route('admin.logout')); ?>" class="inline">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="btn-outline-gold text-sm">Logout</button>
                </form>
            </div>
        </div>
    </header>

    <main class="container mx-auto px-4 py-8">
        <!-- Statistics -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="card text-center">
                <div class="text-4xl font-bold text-gold-400 mb-2"><?php echo e($registrations->count()); ?></div>
                <div class="text-gray-300">Total Registrations</div>
            </div>
            <div class="card text-center">
                <div class="text-4xl font-bold text-gold-400 mb-2"><?php echo e($trialRequests->count()); ?></div>
                <div class="text-gray-300">Trial Requests</div>
            </div>
            <div class="card text-center">
                <div class="text-4xl font-bold text-gold-400 mb-2"><?php echo e($registrations->count() + $trialRequests->count()); ?></div>
                <div class="text-gray-300">Total Enrollments</div>
            </div>
        </div>

        <!-- Registrations Section -->
        <div class="card mb-8">
            <h2 class="text-2xl font-bold text-gold-400 mb-6">Course Registrations</h2>
            
            <?php if($registrations->count() > 0): ?>
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead>
                            <tr class="border-b border-gold-400/20">
                                <th class="pb-3 text-gold-400">Name</th>
                                <th class="pb-3 text-gold-400">Email</th>
                                <th class="pb-3 text-gold-400">WhatsApp</th>
                                <th class="pb-3 text-gold-400">Package</th>
                                <th class="pb-3 text-gold-400">Preferred Days</th>
                                <th class="pb-3 text-gold-400">Status</th>
                                <th class="pb-3 text-gold-400">Date</th>
                                <th class="pb-3 text-gold-400">Message</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $registrations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $registration): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="border-b border-gold-400/10 hover:bg-gray-900/50">
                                <td class="py-3 text-gray-300"><?php echo e($registration->name); ?></td>
                                <td class="py-3 text-gray-300"><?php echo e($registration->email); ?></td>
                                <td class="py-3 text-gray-300">
                                    <a href="https://wa.me/<?php echo e(preg_replace('/[^0-9]/', '', $registration->whatsapp)); ?>" target="_blank" class="text-gold-400 hover:underline">
                                        <?php echo e($registration->whatsapp); ?>

                                    </a>
                                </td>
                                <td class="py-3 text-gray-300">
                                    <?php echo e(app()->getLocale() === 'ar' ? $registration->package->name_ar : $registration->package->name_en); ?>

                                    <span class="text-sm text-gray-500">(<?php echo e($registration->package->sessions_per_week); ?> sessions/week)</span>
                                </td>
                                <td class="py-3 text-gray-300">
                                    <?php if($registration->preferred_days): ?>
                                        <div class="flex flex-wrap gap-1">
                                            <?php $__currentLoopData = $registration->preferred_days; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $day): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <span class="text-xs bg-gold-400/20 text-gold-400 px-2 py-1 rounded"><?php echo e($day); ?></span>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    <?php else: ?>
                                        <span class="text-gray-500">-</span>
                                    <?php endif; ?>
                                </td>
                                <td class="py-3">
                                    <span class="px-2 py-1 rounded text-xs 
                                        <?php echo e($registration->status === 'pending' ? 'bg-yellow-500/20 text-yellow-400' : 
                                           ($registration->status === 'approved' ? 'bg-green-500/20 text-green-400' : 'bg-red-500/20 text-red-400')); ?>">
                                        <?php echo e(ucfirst($registration->status)); ?>

                                    </span>
                                </td>
                                <td class="py-3 text-gray-400 text-sm"><?php echo e($registration->created_at->format('M d, Y')); ?></td>
                                <td class="py-3 text-gray-400 text-sm max-w-xs truncate" title="<?php echo e($registration->message); ?>">
                                    <?php echo e($registration->message ?: '-'); ?>

                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <p class="text-gray-400 text-center py-8">No registrations yet.</p>
            <?php endif; ?>
        </div>

        <!-- Trial Requests Section -->
        <div class="card">
            <h2 class="text-2xl font-bold text-gold-400 mb-6">Free Trial Requests</h2>
            
            <?php if($trialRequests->count() > 0): ?>
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead>
                            <tr class="border-b border-gold-400/20">
                                <th class="pb-3 text-gold-400">Name</th>
                                <th class="pb-3 text-gold-400">Email</th>
                                <th class="pb-3 text-gold-400">WhatsApp</th>
                                <th class="pb-3 text-gold-400">Date</th>
                                <th class="pb-3 text-gold-400">Message</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $trialRequests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="border-b border-gold-400/10 hover:bg-gray-900/50">
                                <td class="py-3 text-gray-300"><?php echo e($trial->name); ?></td>
                                <td class="py-3 text-gray-300"><?php echo e($trial->email); ?></td>
                                <td class="py-3 text-gray-300">
                                    <a href="https://wa.me/<?php echo e(preg_replace('/[^0-9]/', '', $trial->whatsapp)); ?>" target="_blank" class="text-gold-400 hover:underline">
                                        <?php echo e($trial->whatsapp); ?>

                                    </a>
                                </td>
                                <td class="py-3 text-gray-400 text-sm"><?php echo e($trial->created_at->format('M d, Y')); ?></td>
                                <td class="py-3 text-gray-400 text-sm max-w-xs truncate" title="<?php echo e($trial->message); ?>">
                                    <?php echo e($trial->message ?: '-'); ?>

                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <p class="text-gray-400 text-center py-8">No trial requests yet.</p>
            <?php endif; ?>
        </div>
    </main>
</body>
</html>

<?php /**PATH /Users/ahmedomar/Documents/technest/Alwahy Academy/academy-site/resources/views/admin/dashboard.blade.php ENDPATH**/ ?>