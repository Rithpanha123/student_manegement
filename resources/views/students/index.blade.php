@extends('layouts.app')

@section('content')

    <!-- Tailwind CSS (CDN build) -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        khmer: ["'Kh Battambang'", 'Courier', 'monospace'],
                    },
                    keyframes: {
                        fadeUp: {
                            '0%': { opacity: 0, transform: 'translateY(16px)' },
                            '100%': { opacity: 1, transform: 'translateY(0)' },
                        },
                        popIn: {
                            '0%': { opacity: 0, transform: 'scale(0.92)' },
                            '100%': { opacity: 1, transform: 'scale(1)' },
                        },
                        shake: {
                            '0%, 100%': { transform: 'translateX(0)' },
                            '25%': { transform: 'translateX(-4px)' },
                            '75%': { transform: 'translateX(4px)' },
                        },
                    },
                    animation: {
                        'fade-up': 'fadeUp 0.6s ease-out both',
                        'pop-in': 'popIn 0.35s ease-out both',
                        'shake': 'shake 0.35s ease-in-out',
                    },
                },
            },
        };
    </script>

    <style>
        /* scroll-reveal: hidden until the .reveal-in class is toggled on by JS */
        .reveal { opacity: 0; transform: translateY(20px); transition: opacity 0.6s ease-out, transform 0.6s ease-out; }
        .reveal-in { opacity: 1; transform: translateY(0); }

        @media (prefers-reduced-motion: reduce) {
            .reveal, .reveal-in { transition: none !important; transform: none !important; opacity: 1 !important; }
            * { animation: none !important; }
        }
    </style>

    <div class="font-khmer bg-slate-50 min-h-screen">
    <div class="">

        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm animate-fade-up">
            <form>

                <!-- ===================== TITLE ===================== -->
                <div class="flex items-start gap-4 px-8 pt-8 pb-6 border-b border-slate-100">
                    <div class="w-11 h-11 shrink-0 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center text-lg transition-transform duration-300 hover:rotate-6 hover:scale-110">
                        📋
                    </div>
                    <div>
                        <p class="text-xs font-medium text-blue-600 tracking-wide mb-1">ចំណុចទី ២</p>
                        <h2 class="text-lg font-semibold text-slate-900 leading-snug">
                            កត់ព័ត៌មានដែលមកសាលា / ត្រូវផ្ទេរចេញពីសាលា
                        </h2>
                    </div>
                </div>

                <div class="px-8 pt-6">
                    <!-- Transfer toggle -->
                    <label class="reveal flex items-center gap-3 bg-blue-50/60 border border-blue-100 rounded-xl px-5 py-3.5 mb-8 cursor-pointer transition-colors hover:bg-blue-50">
                        <input type="checkbox" name="is_transfer" class="w-4 h-4 rounded accent-blue-600 cursor-pointer transition-transform active:scale-90">
                        <span class="text-sm font-medium text-slate-700">
                            បានផ្ទេរចូល ត្រូវផ្ទេរចេញ និងព័ត៌មានសិស្សបច្ចុប្បន្ន
                        </span>
                    </label>

                    <!-- ===================== STUDENT PHOTOS ===================== -->
                    <div class="reveal mb-9">
                        <div class="flex items-center gap-2.5 mb-4">
                            <span class="w-6 h-6 rounded-full bg-slate-900 text-white text-[11px] font-semibold flex items-center justify-center">1</span>
                            <h3 class="text-sm font-semibold text-slate-800">រូបភាពសិស្ស</h3>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                            @foreach ([1, 2, 3] as $n)
                                <div class="photo-box relative flex flex-col items-center text-center bg-slate-50 border border-dashed border-slate-300 rounded-xl px-4 py-5 min-h-[260px] justify-center transition-all duration-200 hover:border-blue-400 hover:bg-blue-50/40 hover:shadow-sm">
                                    <span class="absolute top-3 left-3 text-[11px] font-medium text-slate-400">
                                        រូបទី{{ $n == 1 ? '១' : ($n == 2 ? '២' : '៣') }}
                                    </span>

                                    <div class="photo-placeholder w-9 h-9 rounded-full bg-white border border-slate-200 flex items-center justify-center text-slate-400 mb-3 mt-2 transition-transform duration-200 group-hover:scale-105">
                                        <i class="fas fa-camera text-sm"></i>
                                    </div>

                                    <label class="upload-btn text-xs font-medium text-blue-600 hover:text-blue-700 cursor-pointer underline decoration-blue-200 underline-offset-2 transition-colors">
                                        <input type="file" name="photo_{{ $n }}" accept="image/*" class="hidden-file-input hidden">
                                        ជ្រើសរើសរូបភាព
                                    </label>
                                    <span class="photo-hint text-[11px] text-slate-400 mt-1">ទំហំមិនធំជាង 5MB</span>

                                    <span class="photo-status text-[11px] text-slate-400 bg-slate-100 rounded-full px-3 py-1 mt-3 max-w-full whitespace-nowrap overflow-hidden text-ellipsis transition-colors duration-300">
                                        មិនទាន់ត្រូវបានបញ្ចូលរូបភាព
                                    </span>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- ===================== BASIC INFO ===================== -->
                    <div class="reveal mb-9">
                        <div class="flex items-center gap-2.5 mb-4">
                            <span class="w-6 h-6 rounded-full bg-slate-900 text-white text-[11px] font-semibold flex items-center justify-center">2</span>
                            <h3 class="text-sm font-semibold text-slate-800">ព័ត៌មានមូលដ្ឋាន</h3>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-x-5 gap-y-5 mb-5">
                            <div class="flex flex-col gap-1.5">
                                <label for="name_kh" class="text-xs font-medium text-slate-600">
                                    ឈ្មោះជាភាសាខ្មែរ <span class="text-red-500">*</span>
                                </label>
                                <input type="text" id="name_kh" name="name_kh" required
                                       class="h-11 w-full text-sm text-slate-800 bg-white border border-slate-200 rounded-lg px-3.5 outline-none transition-all duration-150 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 placeholder:text-slate-300">
                            </div>
                            <div class="flex flex-col gap-1.5">
                                <label for="name_en" class="text-xs font-medium text-slate-600">ឈ្មោះជាភាសាអង់គ្លេស</label>
                                <input type="text" id="name_en" name="name_en"
                                       class="h-11 w-full text-sm text-slate-800 bg-white border border-slate-200 rounded-lg px-3.5 outline-none transition-all duration-150 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 placeholder:text-slate-300">
                            </div>
                            <div class="flex flex-col gap-1.5">
                                <label for="gender" class="text-xs font-medium text-slate-600">
                                    ភេទ <span class="text-red-500">*</span>
                                </label>
                                <select id="gender" name="gender" required
                                        class="h-11 w-full text-sm text-slate-800 bg-white border border-slate-200 rounded-lg px-3.5 outline-none transition-all duration-150 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10">
                                    <option value="">សូមជ្រើសរើស</option>
                                    <option value="male" selected>ប្រុស</option>
                                    <option value="female">ស្រី</option>
                                </select>
                            </div>
                            <div class="flex flex-col gap-1.5">
                                <label for="dob" class="text-xs font-medium text-slate-600">
                                    ថ្ងៃខែឆ្នាំកំណើត <span class="text-red-500">*</span>
                                </label>
                                <input type="text" id="dob" name="dob" placeholder="DD-MM-YYYY" required
                                       class="h-11 w-full text-sm text-slate-800 bg-white border border-slate-200 rounded-lg px-3.5 outline-none transition-all duration-150 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 placeholder:text-slate-300">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-x-5 gap-y-5 mb-5">
                            <div class="flex flex-col gap-1.5">
                                <label for="id_root" class="text-xs font-medium text-slate-600">អត្តលេខមូល</label>
                                <input type="text" id="id_root" name="id_root" value="000000" disabled
                                       class="h-11 w-full text-sm text-slate-400 bg-slate-50 border border-slate-200 rounded-lg px-3.5 outline-none">
                            </div>
                            <div class="flex flex-col gap-1.5">
                                <label for="id_1" class="text-xs font-medium text-slate-600">អត្តលេខទី១</label>
                                <input type="text" id="id_1" name="id_1"
                                       class="h-11 w-full text-sm text-slate-800 bg-white border border-slate-200 rounded-lg px-3.5 outline-none transition-all duration-150 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10">
                            </div>
                            <div class="flex flex-col gap-1.5">
                                <label for="id_2" class="text-xs font-medium text-slate-600">អត្តលេខទី២</label>
                                <input type="text" id="id_2" name="id_2"
                                       class="h-11 w-full text-sm text-slate-800 bg-white border border-slate-200 rounded-lg px-3.5 outline-none transition-all duration-150 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10">
                            </div>
                            <div class="flex flex-col gap-1.5">
                                <label for="id_3" class="text-xs font-medium text-slate-600">អត្តលេខទី៣</label>
                                <input type="text" id="id_3" name="id_3"
                                       class="h-11 w-full text-sm text-slate-800 bg-white border border-slate-200 rounded-lg px-3.5 outline-none transition-all duration-150 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-x-5 gap-y-5">
                            <div class="flex flex-col gap-1.5">
                                <label for="phone_1" class="text-xs font-medium text-slate-600">លេខទូរស័ព្ទទី១</label>
                                <input type="text" id="phone_1" name="phone_1"
                                       class="h-11 w-full text-sm text-slate-800 bg-white border border-slate-200 rounded-lg px-3.5 outline-none transition-all duration-150 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10">
                            </div>
                            <div class="flex flex-col gap-1.5">
                                <label for="phone_2" class="text-xs font-medium text-slate-600">លេខទូរស័ព្ទទី២</label>
                                <input type="text" id="phone_2" name="phone_2"
                                       class="h-11 w-full text-sm text-slate-800 bg-white border border-slate-200 rounded-lg px-3.5 outline-none transition-all duration-150 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10">
                            </div>
                            <div class="flex flex-col gap-1.5">
                                <label for="registered_at" class="text-xs font-medium text-slate-600">ថ្ងៃខែឆ្នាំចុះឈ្មោះ</label>
                                <input type="text" id="registered_at" name="registered_at" value="30-11-0001"
                                       class="h-11 w-full text-sm text-slate-800 bg-white border border-slate-200 rounded-lg px-3.5 outline-none transition-all duration-150 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10">
                            </div>
                        </div>
                    </div>

                    <!-- ===================== CURRENT ADDRESS ===================== -->
                    <div class="reveal mb-9">
                        <div class="flex items-center gap-2.5 mb-4">
                            <span class="w-6 h-6 rounded-full bg-slate-900 text-white text-[11px] font-semibold flex items-center justify-center">3</span>
                            <h3 class="text-sm font-semibold text-slate-800">អាសយដ្ឋានបច្ចុប្បន្ន</h3>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-x-5 gap-y-5 mb-5">
                            <div class="flex flex-col gap-1.5">
                                <label for="cur_province" class="text-xs font-medium text-slate-600">រាជធានី-ខេត្ត</label>
                                <select id="cur_province" name="cur_province"
                                        class="h-11 w-full text-sm text-slate-800 bg-white border border-slate-200 rounded-lg px-3.5 outline-none transition-all duration-150 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10">
                                    <option value="phnom_penh" selected>ភ្នំពេញ</option>
                                </select>
                            </div>
                            <div class="flex flex-col gap-1.5">
                                <label for="cur_district" class="text-xs font-medium text-slate-600">ក្រុង-ស្រុក-ខណ្ឌ</label>
                                <select id="cur_district" name="cur_district"
                                        class="h-11 w-full text-sm text-slate-800 bg-white border border-slate-200 rounded-lg px-3.5 outline-none transition-all duration-150 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10">
                                    <option value="kambol" selected>កំបូល</option>
                                </select>
                            </div>
                            <div class="flex flex-col gap-1.5">
                                <label for="cur_commune" class="text-xs font-medium text-slate-600">ឃុំ-សង្កាត់</label>
                                <select id="cur_commune" name="cur_commune"
                                        class="h-11 w-full text-sm text-slate-800 bg-white border border-slate-200 rounded-lg px-3.5 outline-none transition-all duration-150 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10">
                                    <option value="kambol" selected>កំបូល</option>
                                </select>
                            </div>
                            <div class="flex flex-col gap-1.5">
                                <label for="cur_village" class="text-xs font-medium text-slate-600">ភូមិ</label>
                                <select id="cur_village" name="cur_village"
                                        class="h-11 w-full text-sm text-slate-800 bg-white border border-slate-200 rounded-lg px-3.5 outline-none transition-all duration-150 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10">
                                    <option value="" selected>សូមជ្រើសរើស</option>
                                </select>
                            </div>
                            <div class="flex flex-col gap-1.5">
                                <label for="cur_house_no" class="text-xs font-medium text-slate-600">ផ្ទះលេខ</label>
                                <input type="text" id="cur_house_no" name="cur_house_no"
                                       class="h-11 w-full text-sm text-slate-800 bg-white border border-slate-200 rounded-lg px-3.5 outline-none transition-all duration-150 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 lg:grid-cols-[2fr_1fr] gap-x-5 gap-y-5">
                            <div class="flex flex-col gap-1.5">
                                <label for="cur_street" class="text-xs font-medium text-slate-600">ផ្លូវ</label>
                                <input type="text" id="cur_street" name="cur_street"
                                       class="h-11 w-full text-sm text-slate-800 bg-white border border-slate-200 rounded-lg px-3.5 outline-none transition-all duration-150 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10">
                            </div>
                            <div class="flex flex-col gap-1.5">
                                <label for="residence_letter_no" class="text-xs font-medium text-slate-600">លិខិតបញ្ជាក់ទីជម្រកនៅភូមិដែលកំពុងរស់នៅ</label>
                                <input type="text" id="residence_letter_no" name="residence_letter_no"
                                       class="h-11 w-full text-sm text-slate-800 bg-white border border-slate-200 rounded-lg px-3.5 outline-none transition-all duration-150 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10">
                            </div>
                        </div>
                    </div>

                    <!-- ===================== PLACE OF BIRTH ===================== -->
                    <div class="reveal mb-9">
                        <div class="flex items-center gap-2.5 mb-4">
                            <span class="w-6 h-6 rounded-full bg-slate-900 text-white text-[11px] font-semibold flex items-center justify-center">4</span>
                            <h3 class="text-sm font-semibold text-slate-800">ទីកន្លែងកំណើត</h3>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-x-5 gap-y-5 mb-5">
                            <div class="flex flex-col gap-1.5">
                                <label for="birth_province" class="text-xs font-medium text-slate-600">រាជធានី-ខេត្ត</label>
                                <select id="birth_province" name="birth_province"
                                        class="h-11 w-full text-sm text-slate-800 bg-white border border-slate-200 rounded-lg px-3.5 outline-none transition-all duration-150 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10">
                                    <option value="">សូមជ្រើសរើស</option>
                                </select>
                            </div>
                            <div class="flex flex-col gap-1.5">
                                <label for="birth_district" class="text-xs font-medium text-slate-600">ក្រុង-ស្រុក-ខណ្ឌ</label>
                                <select id="birth_district" name="birth_district"
                                        class="h-11 w-full text-sm text-slate-800 bg-white border border-slate-200 rounded-lg px-3.5 outline-none transition-all duration-150 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10">
                                    <option value="kambol" selected>កំបូល</option>
                                </select>
                            </div>
                            <div class="flex flex-col gap-1.5">
                                <label for="birth_commune" class="text-xs font-medium text-slate-600">ឃុំ-សង្កាត់</label>
                                <select id="birth_commune" name="birth_commune"
                                        class="h-11 w-full text-sm text-slate-800 bg-white border border-slate-200 rounded-lg px-3.5 outline-none transition-all duration-150 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10">
                                    <option value="">សូមជ្រើសរើស</option>
                                </select>
                            </div>
                            <div class="flex flex-col gap-1.5">
                                <label for="birth_village" class="text-xs font-medium text-slate-600">ភូមិ</label>
                                <select id="birth_village" name="birth_village"
                                        class="h-11 w-full text-sm text-slate-800 bg-white border border-slate-200 rounded-lg px-3.5 outline-none transition-all duration-150 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10">
                                    <option value="">សូមជ្រើសរើស</option>
                                </select>
                            </div>
                            <div class="flex flex-col gap-1.5">
                                <label for="birth_house_no" class="text-xs font-medium text-slate-600">ផ្ទះលេខ</label>
                                <input type="text" id="birth_house_no" name="birth_house_no"
                                       class="h-11 w-full text-sm text-slate-800 bg-white border border-slate-200 rounded-lg px-3.5 outline-none transition-all duration-150 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 gap-x-5 gap-y-5">
                            <div class="flex flex-col gap-1.5">
                                <label for="birth_street" class="text-xs font-medium text-slate-600">ផ្លូវ</label>
                                <input type="text" id="birth_street" name="birth_street"
                                       class="h-11 w-full text-sm text-slate-800 bg-white border border-slate-200 rounded-lg px-3.5 outline-none transition-all duration-150 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10">
                            </div>
                        </div>
                    </div>

                    <!-- ===================== PARENTS ===================== -->
                    <div class="reveal mb-9">
                        <div class="flex items-center gap-2.5 mb-4">
                            <span class="w-6 h-6 rounded-full bg-slate-900 text-white text-[11px] font-semibold flex items-center justify-center">5</span>
                            <h3 class="text-sm font-semibold text-slate-800">ព័ត៌មានឪពុកម្តាយ</h3>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-x-5 gap-y-5">
                            <div class="flex flex-col gap-1.5">
                                <label for="father_name" class="text-xs font-medium text-slate-600">ឈ្មោះឪពុក</label>
                                <input type="text" id="father_name" name="father_name"
                                       class="h-11 w-full text-sm text-slate-800 bg-white border border-slate-200 rounded-lg px-3.5 outline-none transition-all duration-150 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10">
                            </div>
                            <div class="flex flex-col gap-1.5">
                                <label for="father_phone" class="text-xs font-medium text-slate-600">លេខទូរស័ព្ទ</label>
                                <input type="text" id="father_phone" name="father_phone"
                                       class="h-11 w-full text-sm text-slate-800 bg-white border border-slate-200 rounded-lg px-3.5 outline-none transition-all duration-150 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10">
                            </div>
                            <div class="flex flex-col gap-1.5">
                                <label for="mother_name" class="text-xs font-medium text-slate-600">ឈ្មោះម្តាយ</label>
                                <input type="text" id="mother_name" name="mother_name"
                                       class="h-11 w-full text-sm text-slate-800 bg-white border border-slate-200 rounded-lg px-3.5 outline-none transition-all duration-150 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10">
                            </div>
                            <div class="flex flex-col gap-1.5">
                                <label for="mother_phone" class="text-xs font-medium text-slate-600">លេខទូរស័ព្ទ</label>
                                <input type="text" id="mother_phone" name="mother_phone"
                                       class="h-11 w-full text-sm text-slate-800 bg-white border border-slate-200 rounded-lg px-3.5 outline-none transition-all duration-150 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10">
                            </div>
                        </div>
                    </div>

                    <!-- ===================== ENROLLMENT / TRANSFER INFO (highlighted) ===================== -->
                    <div class="reveal mb-2 -mx-8 px-8 py-7 bg-blue-50/60 border-y border-blue-100">
                        <div class="flex items-center gap-2.5 mb-4">
                            <span class="w-6 h-6 rounded-full bg-blue-600 text-white text-[11px] font-semibold flex items-center justify-center">6</span>
                            <h3 class="text-sm font-semibold text-blue-900">ព័ត៌មានពេលចូលរៀន</h3>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-x-5 gap-y-5">
                            <div class="flex flex-col gap-1.5">
                                <label for="from_school_type" class="text-xs font-medium text-slate-600">មករៀនសាលា</label>
                                <select id="from_school_type" name="from_school_type"
                                        class="h-11 w-full text-sm text-slate-800 bg-white border border-slate-200 rounded-lg px-3.5 outline-none transition-all duration-150 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10">
                                    <option value="public" selected>សាលារដ្ឋ</option>
                                    <option value="private">សាលាឯកជន</option>
                                    <option value="new">សិស្សថ្មី</option>
                                </select>
                            </div>
                            <div class="flex flex-col gap-1.5">
                                <label for="from_school_other" class="text-xs font-medium text-slate-600">មករៀនសាលារៀនផ្សេងទៀត (បញ្ចូលឈ្មោះសាលា)</label>
                                <input type="text" id="from_school_other" name="from_school_other"
                                       class="h-11 w-full text-sm text-slate-800 bg-white border border-slate-200 rounded-lg px-3.5 outline-none transition-all duration-150 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10">
                            </div>
                            <div class="flex flex-col gap-1.5">
                                <label for="class_name" class="text-xs font-medium text-slate-600">ឈ្មោះថ្នាក់</label>
                                <input type="text" id="class_name" name="class_name"
                                       class="h-11 w-full text-sm text-slate-800 bg-white border border-slate-200 rounded-lg px-3.5 outline-none transition-all duration-150 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10">
                            </div>
                            <div class="flex flex-col gap-1.5">
                                <label for="school_address" class="text-xs font-medium text-slate-600">អាសយដ្ឋានសាលា</label>
                                <select id="school_address" name="school_address"
                                        class="h-11 w-full text-sm text-slate-800 bg-white border border-slate-200 rounded-lg px-3.5 outline-none transition-all duration-150 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10">
                                    <option value="" selected>សូមជ្រើសរើស</option>
                                </select>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- ===================== ACTIONS ===================== -->
                <div class="reveal flex justify-end px-8 py-6">
                    <button type="submit"
                            class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 active:scale-95 hover:-translate-y-0.5 text-white font-medium text-sm rounded-lg px-8 py-3 shadow-sm shadow-blue-600/20 hover:shadow-md hover:shadow-blue-600/30 transition-all duration-200">
                        <i class="fas fa-check text-xs"></i>
                        រក្សាទុក
                    </button>
                </div>
            </form>
        </div>

        <p class="text-center text-xs text-slate-400 mt-6">
            មានចម្ងល់ទាក់ទងផ្នែកបច្ចេកទេស ទាក់ទង Rith Panha (090363560)
        </p>
    </div>
    </div>

    <script>
        // ===== Scroll-reveal: fade + slide up each section the first time it enters the viewport =====
        (function () {
            var revealEls = document.querySelectorAll('.reveal');
            if (!('IntersectionObserver' in window)) {
                revealEls.forEach(function (el) { el.classList.add('reveal-in'); });
                return;
            }
            var observer = new IntersectionObserver(function (entries) {
                entries.forEach(function (entry, i) {
                    if (entry.isIntersecting) {
                        setTimeout(function () {
                            entry.target.classList.add('reveal-in');
                        }, i * 60);
                        observer.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.1, rootMargin: '0px 0px -40px 0px' });
            revealEls.forEach(function (el) { observer.observe(el); });
        })();

        // ===== Photo upload / preview =====
        document.querySelectorAll('.hidden-file-input').forEach(function (input) {
            input.addEventListener('change', function () {
                var wrapper = input.closest('.photo-box');
                var status = wrapper.querySelector('.photo-status');

                if (input.files && input.files.length > 0) {
                    var file = input.files[0];

                    // ពិនិត្យទំហំឯកសារ (មិនធំជាង 5MB)
                    if (file.size > 5 * 1024 * 1024) {
                        wrapper.classList.add('animate-shake');
                        setTimeout(function () { wrapper.classList.remove('animate-shake'); }, 350);
                        alert('ទំហំឯកសារធំពេក! សូមជ្រើសរើសរូបភាពដែលមានទំហំមិនធំជាង 5MB');
                        input.value = ''; // លុបឯកសារដែលបានជ្រើស
                        return;
                    }

                    // បង្ហាញឈ្មោះឯកសារ
                    status.textContent = file.name;
                    status.classList.remove('text-slate-400', 'bg-slate-100');
                    status.classList.add('text-blue-700', 'bg-blue-100');

                    // លាក់ icon កាមេរ៉ា និងអក្សរណែនាំទំហំ ពេលមានរូបភាពរួចហើយ
                    var placeholder = wrapper.querySelector('.photo-placeholder');
                    if (placeholder) placeholder.classList.add('hidden');
                    var hint = wrapper.querySelector('.photo-hint');
                    if (hint) hint.classList.add('hidden');

                    // ប្តូរអក្សរលើប៊ូតុងទៅជា "ប្តូររូបភាព"
                    var uploadBtn = wrapper.querySelector('.upload-btn');
                    if (uploadBtn) uploadBtn.lastChild.textContent = 'ប្តូររូបភាព';

                    // បង្ហាញរូបភាពជា preview ធំ ជាមួយចលនា pop-in
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        var existingImg = wrapper.querySelector('.photo-preview');
                        if (existingImg) {
                            existingImg.src = e.target.result;
                            existingImg.classList.remove('animate-pop-in');
                            void existingImg.offsetWidth; // restart animation
                            existingImg.classList.add('animate-pop-in');
                        } else {
                            var img = document.createElement('img');
                            img.src = e.target.result;
                            img.alt = 'Preview';
                            img.className = 'photo-preview animate-pop-in w-30 h-48 object-cover rounded-lg mb-3 border border-slate-200 bg-white order-first';

                            wrapper.insertBefore(img, wrapper.firstChild.nextSibling);
                        }
                    };
                    reader.readAsDataURL(file);
                } else {
                    var existingImg = wrapper.querySelector('.photo-preview');
                    if (existingImg) {
                        existingImg.remove();
                    }
                    var placeholder = wrapper.querySelector('.photo-placeholder');
                    if (placeholder) placeholder.classList.remove('hidden');
                    var hint = wrapper.querySelector('.photo-hint');
                    if (hint) hint.classList.remove('hidden');
                    var uploadBtn = wrapper.querySelector('.upload-btn');
                    if (uploadBtn) uploadBtn.lastChild.textContent = 'ជ្រើសរើសរូបភាព';

                    status.textContent = 'មិនទាន់ត្រូវបានបញ្ចូលរូបភាព';
                    status.classList.remove('text-blue-700', 'bg-blue-100');
                    status.classList.add('text-slate-400', 'bg-slate-100');
                }
            });
        });
    </script>
@endsection