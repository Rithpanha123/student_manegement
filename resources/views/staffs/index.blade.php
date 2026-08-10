
@extends('layouts.app')

@section('content')
{{-- Khmer-friendly font --}}
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Kantumruy+Pro:wght@400;500;600;700&display=swap" rel="stylesheet">

{{-- Tailwind (swap for your compiled app.css / Vite build in production) --}}
<script src="https://cdn.tailwindcss.com"></script>
<script>
  tailwind.config = {
    theme: {
      extend: {
        fontFamily: { khmer: ['"Kantumruy Pro"', 'sans-serif'] },
        colors: {
          brand: {
            50:  '#f2f5ff',
            100: '#e5ebff',
            200: '#c4d0ff',
            300: '#D8A72C',
            400: '#671316',
            500: '#671316',
            600: '#3a37d6',
            700: '#2f2bab',
            800: '#272687',
            900: '#221f6b',
          },
        },
        boxShadow: {
          soft: '0 10px 40px -10px rgba(58, 55, 214, 0.25)',
          field: '0 1px 2px rgba(16,24,40,.05)',
        },
        keyframes: {
          fadeUp: {
            '0%':   { opacity: 0, transform: 'translateY(14px)' },
            '100%': { opacity: 1, transform: 'translateY(0)' },
          },
          floatIn: {
            '0%':   { opacity: 0, transform: 'scale(.94)' },
            '100%': { opacity: 1, transform: 'scale(1)' },
          },
          shimmer: {
            '0%':   { backgroundPosition: '-400px 0' },
            '100%': { backgroundPosition: '400px 0' },
          },
          pulseRing: {
            '0%':   { boxShadow: '0 0 0 0 rgba(74,79,242,.45)' },
            '100%': { boxShadow: '0 0 0 12px rgba(74,79,242,0)' },
          },
        },
        animation: {
          fadeUp: 'fadeUp .6s cubic-bezier(.16,1,.3,1) both',
          floatIn: 'floatIn .5s cubic-bezier(.16,1,.3,1) both',
          shimmer: 'shimmer 2.5s infinite linear',
          pulseRing: 'pulseRing 1.8s cubic-bezier(0,0,0.2,1) infinite',
        },
      },
    },
  }
</script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,400;14..32,500;14..32,600;14..32,700&display=swap" rel="stylesheet">
<style>
    @font-face {
        font-family: 'Kh Battambang';
        src: url('{{ asset('fonts/Kh-Battambang.ttf') }}') format('truetype');
        font-weight: normal;
        font-style: normal;
        font-display: swap;
    }

    * { font-family: 'Kh Battambang', 'Inter', sans-serif; }
    body { background-color: #f8fafc; }
    ::-webkit-scrollbar { height: 8px; width: 8px; }
    ::-webkit-scrollbar-thumb { background-color: #cbd5e1; border-radius: 9999px; }

    @media (prefers-reduced-motion: reduce) {
        * { animation: none !important; transition: none !important; }
    }
</style>
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

<style>
 
</style>
</head>

<body class="min-h-screen bg-gradient-to-br from-slate-50 via-brand-50 to-indigo-50 font-khmer text-slate-700 antialiased">

<div class="">
<form x-data="profileForm()" @submit.prevent="save" class="max-auto px-4 sm:px-6 lg:px-8 py-10 space-y-8 ">

  {{-- Notice bar --}}
  <div class="reveal mb-6 flex items-center gap-3 rounded-2xl bg-pink-50 border border-pink-200 px-5 py-3 text-pink-600 shadow-field" style="--d:0ms">
    <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m0 3.75h.007M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
    </svg>
    <p class="text-sm font-medium">ចំណាំ៖ ​ចង្កៀងតួអង្គដែលមានលេខសញ្ញាផ្កាយត្រូវតែបំពេញដាច់ខាត។</p>
  </div>

  {{-- Card --}}
  <div class="card-frame reveal rounded-3xl bg-white/90 backdrop-blur-sm shadow-soft ring-1 ring-slate-100 p-6 md:p-10 space-y-10" style="--d:80ms">

    {{-- ==================== PHOTO SECTION ==================== --}}
    <section class="reveal" style="--d:120ms">
      <h2 class="section-title ml-4 mb-4 text-lg font-semibold text-brand-300">រូបថតបុគ្គលិក</h2>

      <div class="rounded-2xl border-2 border-dashed border-brand-300 bg-brand-50/40 p-6 flex flex-col sm:flex-row items-center gap-6 hover:border-brand-500 transition-colors duration-300">
        <div class="relative group">
          <div class="w-32 h-40 rounded-xl overflow-hidden ring-4 ring-white shadow-lg animate-floatIn bg-slate-100">
            <img :src="photoUrl" alt="រូបថតបុគ្គលិក" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
          </div>
          <button type="button" @click="removePhoto"
                  class="absolute -top-2 -right-2 w-8 h-8 rounded-full bg-rose-500 hover:bg-rose-600 text-white flex items-center justify-center shadow-lg transition-transform duration-200 hover:scale-110 active:scale-95">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
            </svg>
          </button>
        </div>

        <div class="flex flex-col gap-2 text-center sm:text-left">
          <span class="text-sm text-slate-00">រូបថតបុគ្គលិក (JPG, PNG — មិនលើសពី 2MB)</span>
          <label class="inline-flex cursor-pointer items-center gap-2 rounded-xl bg-brand-500 hover:bg-brand-600 text-white text-sm font-medium px-4 py-2.5 shadow-soft transition-all duration-200 hover:-translate-y-0.5 active:translate-y-0 w-fit">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 7.5L12 3m0 0L7.5 7.5M12 3v13.5"/>
            </svg>
            ជ្រើសរើសរូបភាព
            <input type="file" name="photo" accept="image/*" class="hidden" @change="onPhotoChange">
          </label>
        </div>
      </div>
    </section>

    {{-- ==================== PERSONAL INFO ==================== --}}
    <section class="reveal" style="--d:160ms">
      <h2 class="section-title ml-4 mb-5 text-lg font-semibold text-brand-300">ព័ត៌មានផ្ទាល់ខ្លួន</h2>

      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-x-6 gap-y-5">

        <div class="field lg:col-span-1">
          <label class="mb-1.5 block text-sm font-medium text-slate-600">ឈ្មោះជាភាសាខ្មែរ <span class="text-rose-500">*</span></label>
          <input type="text" name="name_kh" value="RITHPANHA" required
                 class="w-full rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm shadow-field">
        </div>

        <div class="field">
          <label class="mb-1.5 block text-sm font-medium text-slate-600">ឈ្មោះជាភាសាអង់គ្លេស</label>
          <input type="text" name="name_en" value="IT"
                 class="w-full rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm shadow-field">
        </div>

        <div class="field">
          <label class="mb-1.5 block text-sm font-medium text-slate-600">ឈ្មោះហៅក្រៅ</label>
          <input type="text" name="nickname" value="Ivory"
                 class="w-full rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm shadow-field">
        </div>

        <div class="field">
          <label class="mb-1.5 block text-sm font-medium text-slate-600">អត្តលេខ</label>
          <input type="text" name="employee_id" value="1" disabled
                 class="w-full rounded-xl border border-slate-200 bg-slate-100 px-4 py-2.5 text-sm text-slate-400 cursor-not-allowed">
        </div>

        <div class="field">
          <label class="mb-1.5 block text-sm font-medium text-slate-600">ភេទ <span class="text-rose-500">*</span></label>
          <select name="gender" required
                  class="w-full appearance-none rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm shadow-field bg-[url('data:image/svg+xml;utf8,<svg xmlns=%22http://www.w3.org/2000/svg%22 fill=%22none%22 viewBox=%220 0 24 24%22 stroke=%22%2394a3b8%22><path stroke-linecap=%22round%22 stroke-linejoin=%22round%22 stroke-width=%222%22 d=%22M19 9l-7 7-7-7%22/></svg>')] bg-no-repeat bg-[right_1rem_center]">
            <option>ប្រុស</option>
            <option>ស្រី</option>
          </select>
        </div>

        <div class="field">
          <label class="mb-1.5 block text-sm font-medium text-slate-600">ថ្ងៃខែឆ្នាំកំណើត <span class="text-rose-500">*</span></label>
          <input type="text" name="dob" value="11-05-1989" required
                 class="w-full rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm shadow-field">
        </div>

        <div class="field">
          <label class="mb-1.5 block text-sm font-medium text-slate-600">លេខទូរស័ព្ទខ្លួនទី១ <span class="text-rose-500">*</span></label>
          <input type="text" name="phone1" value="0967171850" required
                 class="w-full rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm shadow-field">
        </div>

        <div class="field">
          <label class="mb-1.5 block text-sm font-medium text-slate-600">លេខទូរស័ព្ទខ្លួនទី២</label>
          <input type="text" name="phone2" placeholder="09xx xxx xxx"
                 class="w-full rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm shadow-field">
        </div>

        <div class="field">
          <label class="mb-1.5 block text-sm font-medium text-slate-600">លេខអត្តសញ្ញាណប័ណ្ណ</label>
          <input type="text" name="nid" value="P7693889B"
                 class="w-full rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm shadow-field">
        </div>

        <div class="field">
          <label class="mb-1.5 block text-sm font-medium text-slate-600">លេខអត្តសញ្ញាណ ប.ស.ស</label>
          <input type="text" name="nssf" placeholder="—"
                 class="w-full rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm shadow-field">
        </div>

        <div class="field">
          <label class="mb-1.5 block text-sm font-medium text-slate-600">ថ្ងៃចូលបម្រើការងារ</label>
          <input type="text" name="joined_at" value="05-12-2016"
                 class="w-full rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm shadow-field">
        </div>

        <div class="field">
          <label class="mb-1.5 block text-sm font-medium text-slate-600">កម្រិតវប្បធម៌</label>
          <select name="education"
                  class="w-full appearance-none rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm shadow-field bg-[url('data:image/svg+xml;utf8,<svg xmlns=%22http://www.w3.org/2000/svg%22 fill=%22none%22 viewBox=%220 0 24 24%22 stroke=%22%2394a3b8%22><path stroke-linecap=%22round%22 stroke-linejoin=%22round%22 stroke-width=%222%22 d=%22M19 9l-7 7-7-7%22/></svg>')] bg-no-repeat bg-[right_1rem_center]">
            <option>បរិញ្ញាបត្រ</option>
            <option>អនុបណ្ឌិត</option>
            <option>មធ្យមសិក្សា</option>
          </select>
        </div>

        <div class="field">
          <label class="mb-1.5 block text-sm font-medium text-slate-600">ជាតិសាសន៍</label>
          <input type="text" name="ethnicity" value="អក្សរសាស្រ្តអង់គ្លេស"
                 class="w-full rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm shadow-field">
        </div>

        <div class="field">
          <label class="mb-1.5 block text-sm font-medium text-slate-600">ស្ថានភាពបុគ្គលិក</label>
          <div class="relative">
            <select name="status"
                    class="w-full appearance-none rounded-xl border border-amber-300 bg-amber-50 px-4 py-2.5 text-sm font-medium text-amber-700 shadow-field bg-[url('data:image/svg+xml;utf8,<svg xmlns=%22http://www.w3.org/2000/svg%22 fill=%22none%22 viewBox=%220 0 24 24%22 stroke=%22%23b45309%22><path stroke-linecap=%22round%22 stroke-linejoin=%22round%22 stroke-width=%222%22 d=%22M19 9l-7 7-7-7%22/></svg>')] bg-no-repeat bg-[right_1rem_center]">
              <option>ធ្វើការ</option>
              <option>ឈប់សម្រាក</option>
              <option>លាឈប់</option>
            </select>
            <span class="absolute -top-2 right-3 h-2 w-2 rounded-full bg-amber-500 animate-pulseRing"></span>
          </div>
        </div>

      </div>
    </section>

    {{-- ==================== CURRENT ADDRESS ==================== --}}
    <section class="reveal" style="--d:200ms">
      <h2 class="section-title ml-4 mb-5 text-lg font-semibold text-brand-300">អាសយដ្ឋានបច្ចុប្បន្ន</h2>

      <div class="rounded-2xl bg-slate-50/70 ring-1 ring-slate-100 p-5 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-6 gap-x-6 gap-y-5">
        <div class="field lg:col-span-1">
          <label class="mb-1.5 block text-sm font-medium text-slate-600">រាជធានី-ខេត្ត</label>
          <select class="w-full appearance-none rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm shadow-field bg-[url('data:image/svg+xml;utf8,<svg xmlns=%22http://www.w3.org/2000/svg%22 fill=%22none%22 viewBox=%220 0 24 24%22 stroke=%22%2394a3b8%22><path stroke-linecap=%22round%22 stroke-linejoin=%22round%22 stroke-width=%222%22 d=%22M19 9l-7 7-7-7%22/></svg>')] bg-no-repeat bg-[right_1rem_center]">
            <option>ភ្នំពេញ</option>
          </select>
        </div>
        <div class="field lg:col-span-1">
          <label class="mb-1.5 block text-sm font-medium text-slate-600">ក្រុង-ស្រុក-ខណ្ឌ</label>
          <select class="w-full appearance-none rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm shadow-field bg-[url('data:image/svg+xml;utf8,<svg xmlns=%22http://www.w3.org/2000/svg%22 fill=%22none%22 viewBox=%220 0 24 24%22 stroke=%22%2394a3b8%22><path stroke-linecap=%22round%22 stroke-linejoin=%22round%22 stroke-width=%222%22 d=%22M19 9l-7 7-7-7%22/></svg>')] bg-no-repeat bg-[right_1rem_center]">
            <option>កំបូល</option>
          </select>
        </div>
        <div class="field lg:col-span-1">
          <label class="mb-1.5 block text-sm font-medium text-slate-600">ឃុំ-សង្កាត់</label>
          <select class="w-full appearance-none rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm shadow-field bg-[url('data:image/svg+xml;utf8,<svg xmlns=%22http://www.w3.org/2000/svg%22 fill=%22none%22 viewBox=%220 0 24 24%22 stroke=%22%2394a3b8%22><path stroke-linecap=%22round%22 stroke-linejoin=%22round%22 stroke-width=%222%22 d=%22M19 9l-7 7-7-7%22/></svg>')] bg-no-repeat bg-[right_1rem_center]">
            <option>កន្ទួត</option>
          </select>
        </div>
        <div class="field lg:col-span-1">
          <label class="mb-1.5 block text-sm font-medium text-slate-600">ភូមិ</label>
          <select class="w-full appearance-none rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm shadow-field bg-[url('data:image/svg+xml;utf8,<svg xmlns=%22http://www.w3.org/2000/svg%22 fill=%22none%22 viewBox=%220 0 24 24%22 stroke=%22%2394a3b8%22><path stroke-linecap=%22round%22 stroke-linejoin=%22round%22 stroke-width=%222%22 d=%22M19 9l-7 7-7-7%22/></svg>')] bg-no-repeat bg-[right_1rem_center]">
            <option>ត្រពាំងគល់</option>
          </select>
        </div>
        <div class="field lg:col-span-1">
          <label class="mb-1.5 block text-sm font-medium text-slate-600">ផ្លូវលេខ</label>
          <input type="text" value="69ព៦កពិភពថ្ងៃ1" class="w-full rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm shadow-field">
        </div>
        <div class="field lg:col-span-1">
          <label class="mb-1.5 block text-sm font-medium text-slate-600">ផ្ទះ</label>
          <input type="text" value="19" class="w-full rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm shadow-field">
        </div>
      </div>
    </section>

    {{-- ==================== BIRTHPLACE ==================== --}}
    <section class="reveal" style="--d:240ms">
      <h2 class="section-title ml-4 mb-5 text-lg font-semibold text-brand-300">ទីកន្លែងកំណើត</h2>

      <div class="rounded-2xl bg-slate-50/70 ring-1 ring-slate-100 p-5 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-6 gap-x-6 gap-y-5">
        <div class="field lg:col-span-1">
          <label class="mb-1.5 block text-sm font-medium text-slate-600">រាជធានី-ខេត្ត</label>
          <select class="w-full appearance-none rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm shadow-field bg-[url('data:image/svg+xml;utf8,<svg xmlns=%22http://www.w3.org/2000/svg%22 fill=%22none%22 viewBox=%220 0 24 24%22 stroke=%22%2394a3b8%22><path stroke-linecap=%22round%22 stroke-linejoin=%22round%22 stroke-width=%222%22 d=%22M19 9l-7 7-7-7%22/></svg>')] bg-no-repeat bg-[right_1rem_center]">
            <option value="">— ជ្រើសរើស —</option>
          </select>
        </div>
        <div class="field lg:col-span-1">
          <label class="mb-1.5 block text-sm font-medium text-slate-600">ក្រុង-ស្រុក-ខណ្ឌ</label>
          <select class="w-full appearance-none rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm shadow-field bg-[url('data:image/svg+xml;utf8,<svg xmlns=%22http://www.w3.org/2000/svg%22 fill=%22none%22 viewBox=%220 0 24 24%22 stroke=%22%2394a3b8%22><path stroke-linecap=%22round%22 stroke-linejoin=%22round%22 stroke-width=%222%22 d=%22M19 9l-7 7-7-7%22/></svg>')] bg-no-repeat bg-[right_1rem_center]">
            <option value="">— ជ្រើសរើស —</option>
          </select>
        </div>
        <div class="field lg:col-span-1">
          <label class="mb-1.5 block text-sm font-medium text-slate-600">ឃុំ-សង្កាត់</label>
          <select class="w-full appearance-none rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm shadow-field bg-[url('data:image/svg+xml;utf8,<svg xmlns=%22http://www.w3.org/2000/svg%22 fill=%22none%22 viewBox=%220 0 24 24%22 stroke=%22%2394a3b8%22><path stroke-linecap=%22round%22 stroke-linejoin=%22round%22 stroke-width=%222%22 d=%22M19 9l-7 7-7-7%22/></svg>')] bg-no-repeat bg-[right_1rem_center]">
            <option value="">— ជ្រើសរើស —</option>
          </select>
        </div>
        <div class="field lg:col-span-1">
          <label class="mb-1.5 block text-sm font-medium text-slate-600">ភូមិ</label>
          <select class="w-full appearance-none rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm shadow-field bg-[url('data:image/svg+xml;utf8,<svg xmlns=%22http://www.w3.org/2000/svg%22 fill=%22none%22 viewBox=%220 0 24 24%22 stroke=%22%2394a3b8%22><path stroke-linecap=%22round%22 stroke-linejoin=%22round%22 stroke-width=%222%22 d=%22M19 9l-7 7-7-7%22/></svg>')] bg-no-repeat bg-[right_1rem_center]">
            <option value="">— ជ្រើសរើស —</option>
          </select>
        </div>
        <div class="field lg:col-span-1">
          <label class="mb-1.5 block text-sm font-medium text-slate-600">ផ្លូវលេខ</label>
          <input type="text" class="w-full rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm shadow-field">
        </div>
        <div class="field lg:col-span-1">
          <label class="mb-1.5 block text-sm font-medium text-slate-600">ផ្ទះ</label>
          <input type="text" class="w-full rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm shadow-field">
        </div>
      </div>
    </section>

    {{-- ==================== SAVE BUTTON ==================== --}}
    <div class="reveal flex justify-center pt-2" style="--d:280ms">
      <button type="submit" :disabled="saving"
              class="save-btn inline-flex items-center gap-2 rounded-2xl bg-gradient-to-r from-emerald-500 to-teal-500 hover:from-emerald-600 hover:to-teal-600 text-white font-semibold px-10 py-3 shadow-soft transition-all duration-200 hover:-translate-y-0.5 active:translate-y-0 disabled:opacity-70">
        <svg x-show="!saving" class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
        </svg>
        <svg x-show="saving" x-cloak class="w-5 h-5 animate-spin" fill="none" viewBox="0 0 24 24">
          <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
          <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"></path>
        </svg>
        <span x-text="saving ? 'កំពុងរក្សាទុក...' : 'រក្សាទុក'"></span>
      </button>
    </div>

    {{-- success toast --}}
    <div x-show="saved" x-transition x-cloak
         class="fixed bottom-6 right-6 flex items-center gap-3 rounded-2xl bg-slate-900 text-white px-5 py-3 shadow-2xl">
      <svg class="w-5 h-5 text-emerald-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
      </svg>
      <span class="text-sm">បានរក្សាទុកដោយជោគជ័យ!</span>
    </div>

  </div>
</form>
</div>

<script>
  function profileForm() {
    return {
      photoUrl: 'https://placehold.co/260x320/00/ffffff?text=Photo',
      saving: false,
      saved: false,
      onPhotoChange(e) {
        const file = e.target.files[0];
        if (file) this.photoUrl = URL.createObjectURL(file);
      },
      removePhoto() {
        this.photoUrl = 'https://placehold.co/260x320/00/ffffff?text=No+Photo';
      },
      save() {
        this.saving = true;
        // TODO: replace with real submit, e.g. this.$el.submit() or a fetch()/axios call to your Laravel route
        setTimeout(() => {
          this.saving = false;
          this.saved = true;
          setTimeout(() => this.saved = false, 2500);
        }, 900);
      },
    }
  }
</script>

@endsection