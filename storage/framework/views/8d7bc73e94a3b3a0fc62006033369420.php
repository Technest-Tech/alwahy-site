<header class="fixed top-0 left-0 right-0 z-50 bg-black/90 backdrop-blur-md border-b border-gold-400/20">
    <nav class="container mx-auto px-4 py-4">
        <div class="flex items-center justify-between">
            <a href="<?php echo e(route('home')); ?>" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="<?php echo e(asset('logo.png')); ?>" alt="Alwahy Academy" class="h-12 w-auto">
                <span class="text-xl font-bold gradient-text hidden md:block">Alwahy Academy</span>
            </a>
            
            <!-- Desktop Menu -->
            <div class="hidden md:flex items-center space-x-6 rtl:space-x-reverse">
                <a href="#about" class="hover:text-gold-400 transition"><?php echo e(__('messages.about_us')); ?></a>
                <a href="#courses" class="hover:text-gold-400 transition"><?php echo e(__('messages.our_courses')); ?></a>
                <a href="#packages" class="hover:text-gold-400 transition"><?php echo e(__('messages.packages')); ?></a>
                <a href="#contact" class="hover:text-gold-400 transition"><?php echo e(__('messages.contact_us')); ?></a>
                
                <div class="flex items-center space-x-2 rtl:space-x-reverse">
                    <a href="<?php echo e(route('language.switch', 'en')); ?>" class="px-3 py-1 rounded <?php echo e(app()->getLocale() === 'en' ? 'bg-gold-400 text-black' : 'hover:text-gold-400'); ?> transition">EN</a>
                    <a href="<?php echo e(route('language.switch', 'ar')); ?>" class="px-3 py-1 rounded <?php echo e(app()->getLocale() === 'ar' ? 'bg-gold-400 text-black' : 'hover:text-gold-400'); ?> transition">AR</a>
                </div>
                
                <button onclick="document.getElementById('registrationModal').classList.remove('hidden')" class="btn-gold text-sm">
                    <?php echo e(__('messages.register')); ?>

                </button>
            </div>
            
            <!-- Mobile Menu Button -->
            <button id="mobileMenuBtn" class="md:hidden text-gold-400 text-2xl" onclick="document.getElementById('mobileMenu').classList.toggle('hidden')">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>
        
        <!-- Mobile Menu -->
        <div id="mobileMenu" class="hidden md:hidden mt-4 pb-4 border-t border-gold-400/20">
            <div class="flex flex-col space-y-4 pt-4">
                <a href="#about" class="hover:text-gold-400 transition" onclick="document.getElementById('mobileMenu').classList.add('hidden')"><?php echo e(__('messages.about_us')); ?></a>
                <a href="#courses" class="hover:text-gold-400 transition" onclick="document.getElementById('mobileMenu').classList.add('hidden')"><?php echo e(__('messages.our_courses')); ?></a>
                <a href="#packages" class="hover:text-gold-400 transition" onclick="document.getElementById('mobileMenu').classList.add('hidden')"><?php echo e(__('messages.packages')); ?></a>
                <a href="#contact" class="hover:text-gold-400 transition" onclick="document.getElementById('mobileMenu').classList.add('hidden')"><?php echo e(__('messages.contact_us')); ?></a>
                
                <div class="flex items-center space-x-2 rtl:space-x-reverse pt-2">
                    <a href="<?php echo e(route('language.switch', 'en')); ?>" class="px-3 py-1 rounded <?php echo e(app()->getLocale() === 'en' ? 'bg-gold-400 text-black' : 'hover:text-gold-400'); ?> transition">EN</a>
                    <a href="<?php echo e(route('language.switch', 'ar')); ?>" class="px-3 py-1 rounded <?php echo e(app()->getLocale() === 'ar' ? 'bg-gold-400 text-black' : 'hover:text-gold-400'); ?> transition">AR</a>
                </div>
                
                <button onclick="document.getElementById('registrationModal').classList.remove('hidden'); document.getElementById('mobileMenu').classList.add('hidden');" class="btn-gold text-sm w-full">
                    <?php echo e(__('messages.register')); ?>

                </button>
            </div>
        </div>
    </nav>
</header>

<?php /**PATH /Users/ahmedomar/Documents/technest/Alwahy Academy/academy-site/resources/views/partials/header.blade.php ENDPATH**/ ?>