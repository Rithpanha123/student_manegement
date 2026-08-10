@extends('layouts.app')

@section('content')
{{-- Khmer-friendly font --}}
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Kantumruy+Pro:wght@400;500;600;700&display=swap" rel="stylesheet">

<script src="https://cdn.tailwindcss.com"></script>
<script>
  tailwind.config = {
    theme: {
      extend: {
        fontFamily: { khmer: ['"Kantumruy Pro"', 'sans-serif'] },
        colors: {
          brand: {
            50:  '#fdf3ee',
            100: '#f8dfd3',
            200: '#f2d998',
            300: '#D8A72C',
            400: '#8f4145',
            500: '#671316',
            600: '#54100f',
            700: '#420c0e',
            800: '#30080a',
            900: '#1f0506',
          },
        },
        boxShadow: {
          soft: '0 10px 40px -10px rgba(103, 19, 22, 0.25)',
          field: '0 1px 2px rgba(16,24,40,.05)',
        },
        keyframes: {
          fadeUp: {
            '0%':   { opacity: 0, transform: 'translateY(14px)' },
            '100%': { opacity: 1, transform: 'translateY(0)' },
          },
          rowIn: {
            '0%':   { opacity: 0, transform: 'translateY(-8px)' },
            '100%': { opacity: 1, transform: 'translateY(0)' },
          },
          shimmer: {
            '0%':   { backgroundPosition: '-400px 0' },
            '100%': { backgroundPosition: '400px 0' },
          },
        },
        animation: {
          fadeUp: 'fadeUp .6s cubic-bezier(.16,1,.3,1) both',
          rowIn: 'rowIn .35s cubic-bezier(.16,1,.3,1) both',
          shimmer: 'shimmer 2.5s infinite linear',
        },
      },
    },
  }
</script>

<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

<style>
  *{
    font-family: 'Kantumruy Pro', sans-serif;
  }
  .reveal { animation: fadeUp .6s cubic-bezier(.16,1,.3,1) both; animation-delay: var(--d, 0ms); }

  .field select,
  .field input {
    transition: box-shadow .2s ease, border-color .2s ease;
  }
  .field select:focus,
  .field input:focus {
    box-shadow: 0 0 0 4px rgba(216,167,44,.18);
    border-color: #D8A72C;
    outline: none;
  }
  .field:hover select:not(:focus),
  .field:hover input:not(:focus) {
    border-color: #f0d896;
  }

  .card-frame { position: relative; isolation: isolate; }
  .card-frame::before {
    content: "";
    position: absolute;
    inset: -1.5px;
    border-radius: 1.5rem;
    padding: 1.5px;
    background: linear-gradient(120deg, #D8A72C, #f2d998, #671316);
    background-size: 200% 200%;
    animation: gradientMove 6s ease infinite;
    -webkit-mask: linear-gradient(#000 0 0) content-box, linear-gradient(#000 0 0);
    -webkit-mask-composite: xor;
            mask-composite: exclude;
    z-index: -1;
  }
  @keyframes gradientMove {
    0%,100% { background-position: 0% 50%; }
    50%     { background-position: 100% 50%; }
  }

  .add-btn { position: relative; overflow: hidden; }
  .add-btn::after {
    content: "";
    position: absolute; inset: 0;
    background: linear-gradient(110deg, transparent 30%, rgba(255,255,255,.35) 50%, transparent 70%);
    background-size: 250% 100%;
    animation: shimmer 3s infinite linear;
  }

  .save-btn { position: relative; overflow: hidden; }
  .save-btn::after {
    content: "";
    position: absolute; inset: 0;
    background: linear-gradient(110deg, transparent 30%, rgba(255,255,255,.35) 50%, transparent 70%);
    background-size: 250% 100%;
    animation: shimmer 3s infinite linear;
  }

  .grid-row { animation: rowIn .35s cubic-bezier(.16,1,.3,1) both; }

  input::placeholder { color: #a6adc9; }

  table { border-collapse: separate; border-spacing: 0; }
  thead th:first-child  { border-top-left-radius: .75rem; }
  thead th:last-child   { border-top-right-radius: .75rem; }
</style>


<form x-data="scheduleForm()" @submit.prevent="save" class="w-full max-auto px-4 sm:px-6 lg:px-8 py-10 space-y-8">

  {{-- Card --}}
  <div class="card-frame  reveal rounded-3xl  backdrop-blur-sm shadow-soft ring-1 ring-slate-100 p-6 md:p-10 space-y-8" >

    {{-- ==================== FILTERS ==================== --}}
    <section class="reveal grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-x-6 gap-y-5" style="--d:60ms">
      <div class="field">
        <label class="mb-1.5 block text-sm font-semibold text-brand-500">សាខា</label>
        <select x-model="filters.branch"
                class="w-full appearance-none rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm shadow-field bg-[url('data:image/svg+xml;utf8,<svg xmlns=%22http://www.w3.org/2000/svg%22 fill=%22none%22 viewBox=%220 0 24 24%22 stroke=%22%2394a3b8%22><path stroke-linecap=%22round%22 stroke-linejoin=%22round%22 stroke-width=%222%22 d=%22M19 9l-7 7-7-7%22/></svg>')] bg-no-repeat bg-[right_1rem_center]">
          <option>All Branch</option>
          <option>សាខាទួលគោក</option>
          <option>សាខាចំការមន</option>
        </select>
      </div>

      <div class="field">
        <label class="mb-1.5 block text-sm font-semibold text-brand-500">ប្រភេទថ្នាក់</label>
        <select x-model="filters.classType"
                class="w-full appearance-none rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm shadow-field bg-[url('data:image/svg+xml;utf8,<svg xmlns=%22http://www.w3.org/2000/svg%22 fill=%22none%22 viewBox=%220 0 24 24%22 stroke=%22%2394a3b8%22><path stroke-linecap=%22round%22 stroke-linejoin=%22round%22 stroke-width=%222%22 d=%22M19 9l-7 7-7-7%22/></svg>')] bg-no-repeat bg-[right_1rem_center]">
          <option>សូមប្រៀសរើស</option>
          <option>ថ្នាក់ធម្មតា</option>
          <option>ថ្នាក់ពិសេស</option>
        </select>
      </div>

      <div class="field">
        <label class="mb-1.5 block text-sm font-semibold text-brand-500">ឆ្នាំសិក្សា</label>
        <select x-model="filters.year"
                class="w-full appearance-none rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm shadow-field bg-[url('data:image/svg+xml;utf8,<svg xmlns=%22http://www.w3.org/2000/svg%22 fill=%22none%22 viewBox=%220 0 24 24%22 stroke=%22%2394a3b8%22><path stroke-linecap=%22round%22 stroke-linejoin=%22round%22 stroke-width=%222%22 d=%22M19 9l-7 7-7-7%22/></svg>')] bg-no-repeat bg-[right_1rem_center]">
          <option>2026-2027</option>
          <option>2025-2026</option>
        </select>
      </div>

      <div class="field">
        <label class="mb-1.5 block text-sm font-semibold text-brand-500">កំណត់ថ្នាក់/សៀវភៅ</label>
        <select x-model="filters.note"
                class="w-full appearance-none rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm shadow-field bg-[url('data:image/svg+xml;utf8,<svg xmlns=%22http://www.w3.org/2000/svg%22 fill=%22none%22 viewBox=%220 0 24 24%22 stroke=%22%2394a3b8%22><path stroke-linecap=%22round%22 stroke-linejoin=%22round%22 stroke-width=%222%22 d=%22M19 9l-7 7-7-7%22/></svg>')] bg-no-repeat bg-[right_1rem_center]">
          <option value="">— ជ្រើសរើស —</option>
          <option>សៀវភៅ A</option>
          <option>សៀវភៅ B</option>
        </select>
      </div>
    </section>

    {{-- ==================== TABLE ==================== --}}
    <section class="reveal overflow-x-auto" style="--d:120ms">
      <table class="w-full min-w-[900px] text-sm">
        <thead>
          <tr class="bg-brand-500 text-white text-left">
            <th class="px-4 py-3 font-semibold">ឈ្មោះថ្នាក់</th>
            <th class="px-4 py-3 font-semibold">ឈ្មោះគ្រូ</th>
            <th class="px-4 py-3 font-semibold">ម៉ោងសិក្សា</th>
            <th class="px-4 py-3 font-semibold">បន្ថែម</th>
            <th class="px-4 py-3 font-semibold text-center w-28">
              <button type="button" @click="addRow"
                      class="add-btn inline-flex items-center gap-1.5 rounded-lg bg-sky-500 hover:bg-sky-600 text-white text-xs font-semibold px-3 py-1.5 shadow transition-all duration-200 hover:-translate-y-0.5 active:translate-y-0">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/>
                </svg>
                Add
              </button>
            </th>
          </tr>
        </thead>
        <tbody>
          <template x-for="(row, index) in rows" :key="row.id">
            <tr class="grid-row border-b border-slate-100 hover:bg-brand-50/40 transition-colors duration-200">
              <td class="px-3 py-2.5">
                <input type="text" x-model="row.className" placeholder="ឈ្មោះថ្នាក់"
                       class="w-full rounded-lg border border-slate-200 bg-white px-3 py-2 text-sm shadow-field focus:outline-none focus:ring-4 focus:ring-brand-100 focus:border-brand-300 transition">
              </td>
              <td class="px-3 py-2.5">
                <select x-model="row.teacher"
                        class="w-full appearance-none rounded-lg border border-slate-200 bg-white px-3 py-2 text-sm shadow-field focus:outline-none focus:ring-4 focus:ring-brand-100 focus:border-brand-300 transition bg-[url('data:image/svg+xml;utf8,<svg xmlns=%22http://www.w3.org/2000/svg%22 fill=%22none%22 viewBox=%220 0 24 24%22 stroke=%22%2394a3b8%22><path stroke-linecap=%22round%22 stroke-linejoin=%22round%22 stroke-width=%222%22 d=%22M19 9l-7 7-7-7%22/></svg>')] bg-no-repeat bg-[right_0.75rem_center]">
                  <option>សូមប្រៀសរើស</option>
                  <option>គ្រូ សុភា</option>
                  <option>គ្រូ ដារា</option>
                </select>
              </td>
              <td class="px-3 py-2.5">
                <select x-model="row.time"
                        class="w-full appearance-none rounded-lg border border-slate-200 bg-white px-3 py-2 text-sm shadow-field focus:outline-none focus:ring-4 focus:ring-brand-100 focus:border-brand-300 transition bg-[url('data:image/svg+xml;utf8,<svg xmlns=%22http://www.w3.org/2000/svg%22 fill=%22none%22 viewBox=%220 0 24 24%22 stroke=%22%2394a3b8%22><path stroke-linecap=%22round%22 stroke-linejoin=%22round%22 stroke-width=%222%22 d=%22M19 9l-7 7-7-7%22/></svg>')] bg-no-repeat bg-[right_0.75rem_center]">
                  <option>ពេលព្រឹក 7:00-10:30</option>
                  <option>ពេលរសៀល 13:00-16:30</option>
                  <option>ពេលល្ងាច 17:00-19:30</option>
                </select>
              </td>
              <td class="px-3 py-2.5">
                <input type="text" x-model="row.note" placeholder="កំណត់ចំណាំ"
                       class="w-full rounded-lg border border-slate-200 bg-white px-3 py-2 text-sm shadow-field focus:outline-none focus:ring-4 focus:ring-brand-100 focus:border-brand-300 transition">
              </td>
              <td class="px-3 py-2.5 text-center">
                <button type="button" @click="removeRow(index)"
                        class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-rose-50 hover:bg-rose-500 text-rose-500 hover:text-white transition-all duration-200 hover:scale-110 active:scale-95">
                  <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                  </svg>
                </button>
              </td>
            </tr>
          </template>
        </tbody>
      </table>

      <p x-show="rows.length === 0" x-cloak class="text-center text-sm text-slate-400 py-6">
        មិនទាន់មានជួរឈរណាមួយទេ — ចុច "Add" ដើម្បីបញ្ចូល
      </p>
    </section>

    {{-- ==================== SAVE BUTTON ==================== --}}
    <div class="reveal flex justify-center pt-2" style="--d:180ms">
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
  function scheduleForm() {
    return {
      filters: {
        branch: 'All Branch',
        classType: 'សូមប្រៀសរើស',
        year: '2026-2027',
        note: '',
      },
      rows: [
        { id: 1, className: '', teacher: 'សូមប្រៀសរើស', time: 'ពេលព្រឹក 7:00-10:30', note: '' },
      ],
      nextId: 2,
      saving: false,
      saved: false,
      addRow() {
        this.rows.push({ id: this.nextId++, className: '', teacher: 'សូមប្រៀសរើស', time: 'ពេលព្រឹក 7:00-10:30', note: '' });
      },
      removeRow(index) {
        this.rows.splice(index, 1);
      },
      save() {
        this.saving = true;
        // TODO: replace with real submit, e.g. axios.post('/schedules', { filters: this.filters, rows: this.rows })
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