@extends('layouts.app')

@section('content')
    <!-- Success/Error Messages (Outside Modals) -->
    @if(session('success') && !request()->has('modal'))
        <div class="fixed top-20 left-1/2 transform -translate-x-1/2 z-50 animate-fade-in-up">
            <div class="alert alert-success max-w-md mx-auto">
                {{ session('success') }}
            </div>
        </div>
    @endif
    
    @if($errors->any() && !request()->has('modal'))
        <div class="fixed top-20 left-1/2 transform -translate-x-1/2 z-50 animate-fade-in-up">
            <div class="alert alert-error max-w-md mx-auto">
                <ul class="list-disc list-inside">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

    <!-- Hero Section -->
    <section id="hero" class="relative min-h-screen flex items-center justify-center overflow-hidden pt-20">
        <!-- Decorative shapes -->
        <div class="shape shape-circle w-96 h-96 -top-48 -right-48"></div>
        <div class="shape shape-circle w-64 h-64 -bottom-32 -left-32"></div>
        <div class="shape shape-square w-32 h-32 top-1/4 left-1/4"></div>
        
        <div class="container mx-auto px-4 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div class="animate-fade-in-up">
                    <h1 class="text-5xl md:text-7xl font-bold mb-6">
                        <span class="gradient-text">{{ __('messages.hero_title') }}</span>
                    </h1>
                    <h2 class="text-2xl md:text-3xl text-gold-400 mb-6">{{ __('messages.hero_subtitle') }}</h2>
                    <p class="text-lg text-gray-300 mb-8">{{ __('messages.hero_description') }}</p>
                    <div class="flex flex-wrap gap-4">
                        <button onclick="document.getElementById('registrationModal').classList.remove('hidden')" class="btn-gold">
                            {{ __('messages.register') }}
                        </button>
                        <button onclick="document.getElementById('trialModal').classList.remove('hidden')" class="btn-outline-gold">
                            {{ __('messages.free_trial') }}
                        </button>
                    </div>
                </div>
                <div class="animate-slide-in-right">
                    <div class="relative">
                        <div class="relative w-full max-w-md mx-auto">
                            <img src="{{ asset('logo.png') }}" alt="Alwahy Academy" class="w-full animate-float">
                            <div class="absolute inset-0 bg-gradient-to-br from-gold-400/20 to-transparent rounded-full blur-3xl animate-pulse-glow"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Us Section -->
    <section id="about" class="section relative">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold mb-4">
                    <span class="gradient-text">{{ __('messages.about_title') }}</span>
                </h2>
                <p class="text-xl text-gray-300 max-w-3xl mx-auto">{{ __('messages.about_description') }}</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="card text-center">
                    <div class="text-5xl mb-4">📖</div>
                    <h3 class="text-2xl font-bold text-gold-400 mb-4">{{ app()->getLocale() === 'ar' ? 'تعليم عالي الجودة' : 'Quality Education' }}</h3>
                    <p class="text-gray-300">{{ app()->getLocale() === 'ar' ? 'نقدم تعليماً إسلامياً عالي الجودة من خلال مناهج شاملة ومعلمين مؤهلين.' : 'We provide high-quality Islamic education through comprehensive curricula and qualified teachers.' }}</p>
                </div>
                <div class="card text-center">
                    <div class="text-5xl mb-4">👨‍🏫</div>
                    <h3 class="text-2xl font-bold text-gold-400 mb-4">{{ app()->getLocale() === 'ar' ? 'معلمون مؤهلون' : 'Qualified Teachers' }}</h3>
                    <p class="text-gray-300">{{ app()->getLocale() === 'ar' ? 'فريق من المعلمين المؤهلين والشغوفين بمشاركة معرفة القرآن الكريم.' : 'A team of qualified and passionate teachers dedicated to sharing Quranic knowledge.' }}</p>
                </div>
                <div class="card text-center">
                    <div class="text-5xl mb-4">💻</div>
                    <h3 class="text-2xl font-bold text-gold-400 mb-4">{{ app()->getLocale() === 'ar' ? 'تعلم مرن' : 'Flexible Learning' }}</h3>
                    <p class="text-gray-300">{{ app()->getLocale() === 'ar' ? 'تعلم في الوقت والمكان المناسبين لك مع جدول مرن.' : 'Learn at your own pace and convenience with flexible scheduling.' }}</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Courses Section -->
    <section id="courses" class="section relative bg-gray-900">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold mb-4">
                    <span class="gradient-text">{{ __('messages.courses_title') }}</span>
                </h2>
                <p class="text-xl text-gray-300 max-w-3xl mx-auto">{{ __('messages.courses_subtitle') }}</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($courses as $course)
                <div class="card group">
                    <div class="text-4xl mb-4">📚</div>
                    <h3 class="text-2xl font-bold text-gold-400 mb-4">{{ app()->getLocale() === 'ar' ? $course->name_ar : $course->name_en }}</h3>
                    <p class="text-gray-300">{{ app()->getLocale() === 'ar' ? $course->description_ar : $course->description_en }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Packages Section -->
    <section id="packages" class="section relative">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold mb-4">
                    <span class="gradient-text">{{ __('messages.packages_title') }}</span>
                </h2>
                <p class="text-xl text-gray-300 max-w-3xl mx-auto">{{ __('messages.packages_subtitle') }}</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($packages as $index => $package)
                <div class="card {{ $index === 1 ? 'border-gold-400 border-2 scale-105' : '' }}">
                    <div class="text-center mb-6">
                        <h3 class="text-2xl font-bold text-gold-400 mb-2">{{ app()->getLocale() === 'ar' ? $package->name_ar : $package->name_en }}</h3>
                        <div class="text-3xl font-bold mb-2">{{ $package->sessions_per_week }} {{ app()->getLocale() === 'ar' ? 'جلسات/أسبوع' : 'Sessions/Week' }}</div>
                        <div class="text-xl text-gold-400 mb-2">
                            ${{ number_format($package->price, 2) }} {{ app()->getLocale() === 'ar' ? '/أسبوع' : '/week' }}
                        </div>
                        <div class="text-sm text-gray-400">
                            {{ app()->getLocale() === 'ar' ? '$5 لكل ساعة' : '$5 per hour' }}
                        </div>
                    </div>
                    <p class="text-gray-300 mb-6 text-center">{{ app()->getLocale() === 'ar' ? $package->description_ar : $package->description_en }}</p>
                    <button onclick="document.getElementById('registrationModal').classList.remove('hidden'); document.getElementById('package_id').value='{{ $package->id }}';" class="btn-gold w-full">
                        {{ __('messages.register') }}
                    </button>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="section relative bg-gray-900">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold mb-4">
                    <span class="gradient-text">{{ __('messages.features_title') }}</span>
                </h2>
                <p class="text-xl text-gray-300 max-w-3xl mx-auto">{{ __('messages.features_subtitle') }}</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="card text-center">
                    <div class="text-5xl mb-4">🎓</div>
                    <h3 class="text-xl font-bold text-gold-400 mb-2">{{ app()->getLocale() === 'ar' ? 'معلمون معتمدون' : 'Certified Teachers' }}</h3>
                    <p class="text-gray-300 text-sm">{{ app()->getLocale() === 'ar' ? 'معلمون معتمدون بخبرة واسعة' : 'Certified teachers with extensive experience' }}</p>
                </div>
                <div class="card text-center">
                    <div class="text-5xl mb-4">⏰</div>
                    <h3 class="text-xl font-bold text-gold-400 mb-2">{{ app()->getLocale() === 'ar' ? 'جدول مرن' : 'Flexible Schedule' }}</h3>
                    <p class="text-gray-300 text-sm">{{ app()->getLocale() === 'ar' ? 'اختر الوقت المناسب لك' : 'Choose the time that suits you' }}</p>
                </div>
                <div class="card text-center">
                    <div class="text-5xl mb-4">👤</div>
                    <h3 class="text-xl font-bold text-gold-400 mb-2">{{ app()->getLocale() === 'ar' ? 'جلسات فردية' : 'One-on-One Sessions' }}</h3>
                    <p class="text-gray-300 text-sm">{{ app()->getLocale() === 'ar' ? 'اهتمام شخصي لكل طالب' : 'Personal attention for each student' }}</p>
                </div>
                <div class="card text-center">
                    <div class="text-5xl mb-4">🌐</div>
                    <h3 class="text-xl font-bold text-gold-400 mb-2">{{ app()->getLocale() === 'ar' ? 'تعلم عبر الإنترنت' : 'Online Learning' }}</h3>
                    <p class="text-gray-300 text-sm">{{ app()->getLocale() === 'ar' ? 'تعلم من أي مكان في العالم' : 'Learn from anywhere in the world' }}</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Free Trial Section -->
    <section id="trial" class="section relative">
        <div class="container mx-auto px-4">
            <div class="card max-w-2xl mx-auto text-center">
                <h2 class="text-4xl font-bold mb-4">
                    <span class="gradient-text">{{ __('messages.free_trial') }}</span>
                </h2>
                <p class="text-xl text-gray-300 mb-8">{{ app()->getLocale() === 'ar' ? 'جرب درساً مجانياً قبل التسجيل' : 'Try a free lesson before registering' }}</p>
                <button onclick="document.getElementById('trialModal').classList.remove('hidden')" class="btn-gold">
                    {{ __('messages.free_trial') }}
                </button>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="section relative bg-gray-900">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold mb-4">
                    <span class="gradient-text">{{ __('messages.contact_title') }}</span>
                </h2>
                <p class="text-xl text-gray-300 max-w-3xl mx-auto">{{ __('messages.contact_subtitle') }}</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 max-w-4xl mx-auto">
                <div class="card">
                    <h3 class="text-2xl font-bold text-gold-400 mb-6">{{ __('messages.follow_us') }}</h3>
                    <div class="space-y-4">
                        <a href="https://www.facebook.com/share/1Cvzaz97HY/?mibextid=wwXIfr" target="_blank" class="flex items-center space-x-3 rtl:space-x-reverse text-gray-300 hover:text-gold-400 transition">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                            <span>Facebook</span>
                        </a>
                        <a href="https://www.instagram.com/alwahy_academy?igsh=ZTZ1bmpsam04M3U1" target="_blank" class="flex items-center space-x-3 rtl:space-x-reverse text-gray-300 hover:text-gold-400 transition">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                            <span>Instagram</span>
                        </a>
                        <a href="https://wa.me/201065340432" target="_blank" class="flex items-center space-x-3 rtl:space-x-reverse text-gray-300 hover:text-gold-400 transition">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>
                            <span>WhatsApp: +20 106 534 0432</span>
                        </a>
                    </div>
                </div>
                <div class="card">
                    <h3 class="text-2xl font-bold text-gold-400 mb-6">{{ __('messages.contact_us') }}</h3>
                    <p class="text-gray-300 mb-4">{{ app()->getLocale() === 'ar' ? 'للاستفسارات والتسجيل، يرجى التواصل معنا عبر الواتساب أو ملء نموذج التسجيل.' : 'For inquiries and registration, please contact us via WhatsApp or fill out the registration form.' }}</p>
                    <button onclick="document.getElementById('registrationModal').classList.remove('hidden')" class="btn-gold w-full">
                        {{ __('messages.register') }}
                    </button>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('modals')
    <!-- Registration Modal -->
    <div id="registrationModal" class="hidden fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/80 backdrop-blur-sm modal-overlay" onclick="if(event.target === this) this.classList.add('hidden')">
        <div class="bg-gray-900 rounded-2xl p-8 max-w-2xl w-full max-h-[90vh] overflow-y-auto border border-gold-400/20">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-3xl font-bold gradient-text">{{ __('messages.register') }}</h2>
                <button onclick="document.getElementById('registrationModal').classList.add('hidden')" class="text-gray-400 hover:text-white text-2xl">&times;</button>
            </div>
            
            @if(session('success') && session('form_type') === 'registration')
                <div class="alert alert-success mb-6">{{ session('success') }}</div>
            @endif
            
            @if($errors->any() && old('_token'))
                <div class="alert alert-error mb-6">
                    <ul class="list-disc list-inside">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            <form id="registrationForm" action="{{ route('register.store') }}" method="POST">
                @csrf
                <div class="space-y-6">
                    <div>
                        <label class="block text-gold-400 mb-2">{{ __('messages.name') }} *</label>
                        <input type="text" name="name" required class="form-input" value="{{ old('name') }}">
                    </div>
                    
                    <div>
                        <label class="block text-gold-400 mb-2">{{ __('messages.email') }} *</label>
                        <input type="email" name="email" required class="form-input" value="{{ old('email') }}">
                    </div>
                    
                    <div>
                        <label class="block text-gold-400 mb-2">{{ __('messages.whatsapp') }} *</label>
                        <input type="text" name="whatsapp" required class="form-input" value="{{ old('whatsapp') }}" placeholder="+20 106 534 0432">
                    </div>
                    
                    <div>
                        <label class="block text-gold-400 mb-2">{{ __('messages.package') }} *</label>
                        <select name="package_id" id="package_id" required class="form-input">
                            <option value="">{{ __('messages.select_package') }}</option>
                            @foreach($packages as $package)
                                <option value="{{ $package->id }}" {{ old('package_id') == $package->id ? 'selected' : '' }}>
                                    {{ app()->getLocale() === 'ar' ? $package->name_ar : $package->name_en }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div>
                        <label class="block text-gold-400 mb-2">{{ __('messages.preferred_days') }}</label>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                            <label class="flex items-center space-x-2 rtl:space-x-reverse cursor-pointer">
                                <input type="checkbox" name="preferred_days[]" value="{{ __('messages.monday') }}" class="w-4 h-4 text-gold-400">
                                <span>{{ __('messages.monday') }}</span>
                            </label>
                            <label class="flex items-center space-x-2 rtl:space-x-reverse cursor-pointer">
                                <input type="checkbox" name="preferred_days[]" value="{{ __('messages.tuesday') }}" class="w-4 h-4 text-gold-400">
                                <span>{{ __('messages.tuesday') }}</span>
                            </label>
                            <label class="flex items-center space-x-2 rtl:space-x-reverse cursor-pointer">
                                <input type="checkbox" name="preferred_days[]" value="{{ __('messages.wednesday') }}" class="w-4 h-4 text-gold-400">
                                <span>{{ __('messages.wednesday') }}</span>
                            </label>
                            <label class="flex items-center space-x-2 rtl:space-x-reverse cursor-pointer">
                                <input type="checkbox" name="preferred_days[]" value="{{ __('messages.thursday') }}" class="w-4 h-4 text-gold-400">
                                <span>{{ __('messages.thursday') }}</span>
                            </label>
                            <label class="flex items-center space-x-2 rtl:space-x-reverse cursor-pointer">
                                <input type="checkbox" name="preferred_days[]" value="{{ __('messages.friday') }}" class="w-4 h-4 text-gold-400">
                                <span>{{ __('messages.friday') }}</span>
                            </label>
                            <label class="flex items-center space-x-2 rtl:space-x-reverse cursor-pointer">
                                <input type="checkbox" name="preferred_days[]" value="{{ __('messages.saturday') }}" class="w-4 h-4 text-gold-400">
                                <span>{{ __('messages.saturday') }}</span>
                            </label>
                            <label class="flex items-center space-x-2 rtl:space-x-reverse cursor-pointer">
                                <input type="checkbox" name="preferred_days[]" value="{{ __('messages.sunday') }}" class="w-4 h-4 text-gold-400">
                                <span>{{ __('messages.sunday') }}</span>
                            </label>
                        </div>
                    </div>
                    
                    <div>
                        <label class="block text-gold-400 mb-2">{{ __('messages.message') }}</label>
                        <textarea name="message" class="form-textarea" rows="4">{{ old('message') }}</textarea>
                    </div>
                    
                    <button type="submit" class="btn-gold w-full" data-loading="{{ __('messages.submit') }}...">
                        {{ __('messages.submit') }}
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Trial Modal -->
    <div id="trialModal" class="hidden fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/80 backdrop-blur-sm modal-overlay" onclick="if(event.target === this) this.classList.add('hidden')">
        <div class="bg-gray-900 rounded-2xl p-8 max-w-lg w-full border border-gold-400/20">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-3xl font-bold gradient-text">{{ __('messages.free_trial') }}</h2>
                <button onclick="document.getElementById('trialModal').classList.add('hidden')" class="text-gray-400 hover:text-white text-2xl">&times;</button>
            </div>
            
            @if(session('success') && session('form_type') === 'trial')
                <div class="alert alert-success mb-6">{{ session('success') }}</div>
            @endif
            
            @if($errors->any() && old('_token'))
                <div class="alert alert-error mb-6">
                    <ul class="list-disc list-inside">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            <form id="trialForm" action="{{ route('trial.store') }}" method="POST">
                @csrf
                <div class="space-y-6">
                    <div>
                        <label class="block text-gold-400 mb-2">{{ __('messages.name') }} *</label>
                        <input type="text" name="name" required class="form-input" value="{{ old('name') }}">
                    </div>
                    
                    <div>
                        <label class="block text-gold-400 mb-2">{{ __('messages.email') }} *</label>
                        <input type="email" name="email" required class="form-input" value="{{ old('email') }}">
                    </div>
                    
                    <div>
                        <label class="block text-gold-400 mb-2">{{ __('messages.whatsapp') }} *</label>
                        <input type="text" name="whatsapp" required class="form-input" value="{{ old('whatsapp') }}" placeholder="+20 106 534 0432">
                    </div>
                    
                    <div>
                        <label class="block text-gold-400 mb-2">{{ __('messages.message') }}</label>
                        <textarea name="message" class="form-textarea" rows="4">{{ old('message') }}</textarea>
                    </div>
                    
                    <button type="submit" class="btn-gold w-full" data-loading="{{ __('messages.submit') }}...">
                        {{ __('messages.submit') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endpush

