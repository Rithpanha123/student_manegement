@extends('layouts.app')

@section('content')

    <style>
        *{
            font-family: 'Kh Battambang', Courier, monospace
        }
        .form-wrapper {
            max-width: 1600px;
            width: 100%;
            background: white;
            border-radius: 28px;
            box-shadow: 0 20px 40px rgba(0, 20, 40, 0.08), 0 8px 20px rgba(0, 0, 0, 0.02);
            padding: 30px 35px 40px;
            transition: 0.2s;
        }

        /* ----- typography & titles ----- */
        .form-title {
            font-size: 1.9rem;
            font-weight: 600;
            color: #0b2a4a;
            letter-spacing: -0.3px;
            margin-top: 4px;
            margin-bottom: 28px;
            padding-bottom: 14px;
            border-bottom: 3px solid #e5edf4;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .form-title::before {
            content: "📋";
            font-size: 2rem;
            opacity: 0.8;
        }

        .checkbox-line {
            display: flex;
            align-items: center;
            gap: 12px;
            background: #f0f7fe;
            padding: 12px 18px;
            border-radius: 100px;
            margin-bottom: 28px;
            font-weight: 500;
            color: #1a3857;
            border: 1px solid #d7e4ee;
            font-size: 1.05rem;
        }

        .checkbox-line input[type="checkbox"] {
            width: 20px;
            height: 20px;
            accent-color: #1f6fcf;
            cursor: pointer;
        }

        /* ----- fieldset sections ----- */
        .section {
            border: 1px solid #e2ebf4;
            border-radius: 22px;
            padding: 22px 22px 18px;
            margin-bottom: 30px;
            background: #fafdff;
            transition: 0.15s;
        }

        .section:hover {
            border-color: #c7d9ea;
            background: #ffffff;
        }

        legend {
            font-weight: 600;
            font-size: 1.2rem;
            padding: 0 14px;
            color: #15466a;
            letter-spacing: -0.2px;
            background: white;
            border-radius: 40px;
            padding: 0 16px;
            margin-left: 6px;
        }

        .highlighted {
            background: #f0f8ff;
            border-color: #b6d3f0;
            border-width: 2px;
        }

        .highlight-legend {
            background: #dfedfc;
            border-radius: 40px;
            padding: 0 20px;
            color: #003d7a;
        }

        /* ----- photo row ----- */
        .photo-row {
            display: flex;
            flex-wrap: wrap;
            gap: 25px;
            justify-content: space-between;
        }

        .photo-box {
            flex: 1 1 180px;
            background: #f5faff;
            border-radius: 20px;
            padding: 16px 14px 18px;
            border: 1px dashed #bcd2e9;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            transition: 0.15s;
            min-width: 150px;
        }

        .photo-box:hover {
            background: #edf6ff;
            border-color: #6f9ed8;
        }

        .photo-label {
            font-weight: 600;
            color: #194a77;
            margin-bottom: 8px;
            font-size: 0.95rem;
            background: #deecfb;
            padding: 0 16px;
            border-radius: 40px;
        }

        .upload-btn {
            background: white;
            border: 1px solid #b8cee7;
            border-radius: 60px;
            padding: 8px 16px;
            font-size: 0.9rem;
            font-weight: 500;
            color: #1a4a78;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin: 6px 0 8px;
            transition: 0.1s;
            width: 100%;
            justify-content: center;
        }

        .upload-btn:hover {
            background: #e2efff;
            border-color: #1f6fcf;
        }

        .hidden-file-input {
            display: none;
        }

        .photo-status {
            font-size: 0.75rem;
            color: #7a8ea0;
            background: #ecf3fa;
            padding: 4px 12px;
            border-radius: 30px;
            max-width: 100%;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        /* ----- grids ----- */
        .field-grid {
            display: grid;
            gap: 20px 18px;
            margin-bottom: 20px;
        }

        .cols-4 {
            grid-template-columns: repeat(4, 1fr);
        }

        .cols-3 {
            grid-template-columns: repeat(3, 1fr);
        }

        .cols-5 {
            grid-template-columns: repeat(5, 1fr);
        }

        .cols-2 {
            grid-template-columns: 2fr 1fr;
        }

        .cols-1 {
            grid-template-columns: 1fr;
        }

        .field {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .field label {
            font-size: 0.85rem;
            font-weight: 500;
            color: #1f4468;
            letter-spacing: -0.1px;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .req {
            color: #c33;
            font-weight: 700;
            font-size: 1rem;
        }

        .field input,
        .field select {
            background: white;
            border: 1.5px solid #d7e2ef;
            border-radius: 16px;
            padding: 12px 16px;
            font-size: 0.95rem;
            font-family: inherit;
            transition: 0.12s;
            color: #162b42;
            width: 100%;
            outline: none;
        }

        .field input:focus,
        .field select:focus {
            border-color: #2a7ad8;
            box-shadow: 0 0 0 3px rgba(30, 100, 210, 0.12);
        }

        .field input:disabled {
            background: #eef5fc;
            color: #3b5775;
        }

        .field input::placeholder {
            color: #a3b9d0;
        }

        /* ----- actions ----- */
        .form-actions {
            display: flex;
            justify-content: flex-end;
            margin-top: 28px;
            gap: 16px;
        }

        .btn-save {
            background: #1f6fcf;
            border: none;
            border-radius: 60px;
            padding: 14px 54px;
            font-weight: 600;
            font-size: 1.2rem;
            color: white;
            cursor: pointer;
            transition: 0.15s;
            letter-spacing: 0.3px;
            box-shadow: 0 6px 14px rgba(28, 90, 185, 0.2);
        }

        .btn-save:hover {
            background: #0f59b0;
            transform: scale(1.02);
            box-shadow: 0 10px 20px rgba(18, 80, 180, 0.25);
        }

        .btn-save:active {
            transform: scale(0.98);
        }

        .form-footer {
            margin-top: 30px;
            text-align: center;
            font-size: 0.9rem;
            color: #55718b;
            border-top: 1px solid #dde8f3;
            padding-top: 20px;
            letter-spacing: 0.2px;
        }

        /* ----- responsive adjustments ----- */
        @media (max-width: 900px) {
            .cols-4, .cols-5 {
                grid-template-columns: repeat(3, 1fr);
            }

            .cols-3 {
                grid-template-columns: repeat(2, 1fr);
            }

            .cols-2 {
                grid-template-columns: 1fr;
            }

            .form-wrapper {
                padding: 20px 18px;
            }
        }

        @media (max-width: 700px) {
            .cols-4, .cols-5, .cols-3 {
                grid-template-columns: 1fr 1fr;
            }

            .photo-row {
                flex-direction: column;
                align-items: stretch;
            }

            .photo-box {
                flex: 1 1 auto;
            }

            .form-title {
                font-size: 1.4rem;
                flex-wrap: wrap;
            }

            .checkbox-line {
                flex-wrap: wrap;
                border-radius: 30px;
                padding: 12px 16px;
            }
        }

        @media (max-width: 480px) {
            .cols-4, .cols-5, .cols-3 {
                grid-template-columns: 1fr;
            }

            .form-wrapper {
                padding: 16px 12px;
            }

            .btn-save {
                width: 100%;
                justify-content: center;
                padding: 14px 20px;
            }
        }

        /* subtle extra polish */
        select option {
            padding: 8px;
        }

        input[type="text"], select {
            background: white;
        }
    </style>

<div class="form-wrapper">
    <form>
        <h2 class="form-title">ចំណុចទី ២ កត់ព័ត៌មានដែលមកសាលា/ត្រូវផ្ទេរចេញពីសាលា។</h2>

        <label class="checkbox-line">
            <input type="checkbox" name="is_transfer">
            បានផ្ទេរចូល ត្រូវផ្ទេរចេញ និងព័ត៌មានសិស្សបច្ចុប្បន្ន។
        </label>

        <!-- ===================== STUDENT PHOTOS ===================== -->
        <fieldset class="section">
            <legend>រូបភាពសិស្ស</legend>

            <div class="photo-row">
                <div class="photo-box">
                    <span class="photo-label">រូបទី១</span>
                    <label class="upload-btn">
                        <input type="file" name="photo_1" accept="image/*" class="hidden-file-input">
                        &#128247; សូមអញ្ជើញបញ្ចូលរូបថត (ទំហំមិនធំជាង 5MB)
                    </label>
                    <span class="photo-status">មិនទាន់ត្រូវបានបញ្ចូលរូបភាព</span>
                </div>
                <div class="photo-box">
                    <span class="photo-label">រូបទី២</span>
                    <label class="upload-btn">
                        <input type="file" name="photo_2" accept="image/*" class="hidden-file-input">
                        &#128247; សូមអញ្ជើញបញ្ចូលរូបថត (ទំហំមិនធំជាង 5MB)
                    </label>
                    <span class="photo-status">មិនទាន់ត្រូវបានបញ្ចូលរូបភាព</span>
                </div>
                <div class="photo-box">
                    <span class="photo-label">រូបទី៣</span>
                    <label class="upload-btn">
                        <input type="file" name="photo_3" accept="image/*" class="hidden-file-input">
                        &#128247; សូមអញ្ជើញបញ្ចូលរូបថត (ទំហំមិនធំជាង 5MB)
                    </label>
                    <span class="photo-status">មិនទាន់ត្រូវបានបញ្ចូលរូបភាព</span>
                </div>
            </div>
        </fieldset>

        <!-- ===================== BASIC INFO ===================== -->
        <div class="field-grid cols-4">
            <div class="field">
                <label for="name_kh">ឈ្មោះជាភាសាខ្មែរ <span class="req">*</span></label>
                <input type="text" id="name_kh" name="name_kh" required>
            </div>
            <div class="field">
                <label for="name_en">ឈ្មោះជាភាសាអង់គ្លេស</label>
                <input type="text" id="name_en" name="name_en">
            </div>
            <div class="field">
                <label for="gender">ភេទ <span class="req">*</span></label>
                <select id="gender" name="gender" required>
                    <option value="">សូមជ្រើសរើស</option>
                    <option value="male" selected>ប្រុស</option>
                    <option value="female">ស្រី</option>
                </select>
            </div>
            <div class="field">
                <label for="dob">ថ្ងៃខែឆ្នាំកំណើត <span class="req">*</span></label>
                <input type="text" id="dob" name="dob" placeholder="DD-MM-YYYY" required>
            </div>
        </div>

        <div class="field-grid cols-4">
            <div class="field">
                <label for="id_root">អត្តលេខមូល</label>
                <input type="text" id="id_root" name="id_root" value="000000" disabled>
            </div>
            <div class="field">
                <label for="id_1">អត្តលេខទី១</label>
                <input type="text" id="id_1" name="id_1">
            </div>
            <div class="field">
                <label for="id_2">អត្តលេខទី២</label>
                <input type="text" id="id_2" name="id_2">
            </div>
            <div class="field">
                <label for="id_3">អត្តលេខទី៣</label>
                <input type="text" id="id_3" name="id_3">
            </div>
        </div>

        <div class="field-grid cols-3">
            <div class="field">
                <label for="phone_1">លេខទូរស័ព្ទទី១</label>
                <input type="text" id="phone_1" name="phone_1">
            </div>
            <div class="field">
                <label for="phone_2">លេខទូរស័ព្ទទី២</label>
                <input type="text" id="phone_2" name="phone_2">
            </div>
            <div class="field">
                <label for="registered_at">ថ្ងៃខែឆ្នាំចុះឈ្មោះ</label>
                <input type="text" id="registered_at" name="registered_at" value="30-11-0001">
            </div>
        </div>

        <!-- ===================== CURRENT ADDRESS ===================== -->
        <fieldset class="section">
            <legend>អាសយដ្ឋានបច្ចុប្បន្ន</legend>

            <div class="field-grid cols-5">
                <div class="field">
                    <label for="cur_province">រាជធានី-ខេត្ត</label>
                    <select id="cur_province" name="cur_province">
                        <option value="phnom_penh" selected>ភ្នំពេញ</option>
                    </select>
                </div>
                <div class="field">
                    <label for="cur_district">ក្រុង-ស្រុក-ខណ្ឌ</label>
                    <select id="cur_district" name="cur_district">
                        <option value="kambol" selected>កំបូល</option>
                    </select>
                </div>
                <div class="field">
                    <label for="cur_commune">ឃុំ-សង្កាត់</label>
                    <select id="cur_commune" name="cur_commune">
                        <option value="kambol" selected>កំបូល</option>
                    </select>
                </div>
                <div class="field">
                    <label for="cur_village">ភូមិ</label>
                    <select id="cur_village" name="cur_village">
                        <option value="" selected>សូមជ្រើសរើស</option>
                    </select>
                </div>
                <div class="field">
                    <label for="cur_house_no">ផ្ទះលេខ</label>
                    <input type="text" id="cur_house_no" name="cur_house_no">
                </div>
            </div>

            <div class="field-grid cols-2">
                <div class="field">
                    <label for="cur_street">ផ្លូវ</label>
                    <input type="text" id="cur_street" name="cur_street">
                </div>
                <div class="field">
                    <label for="residence_letter_no">លិខិតបញ្ជាក់ទីជម្រកនៅភូមិដែលកំពុងរស់នៅ</label>
                    <input type="text" id="residence_letter_no" name="residence_letter_no">
                </div>
            </div>
        </fieldset>

        <!-- ===================== PLACE OF BIRTH ===================== -->
        <fieldset class="section">
            <legend>ទីកន្លែងកំណើត</legend>

            <div class="field-grid cols-5">
                <div class="field">
                    <label for="birth_province">រាជធានី-ខេត្ត</label>
                    <select id="birth_province" name="birth_province">
                        <option value="">សូមជ្រើសរើស</option>
                    </select>
                </div>
                <div class="field">
                    <label for="birth_district">ក្រុង-ស្រុក-ខណ្ឌ</label>
                    <select id="birth_district" name="birth_district">
                        <option value="kambol" selected>កំបូល</option>
                    </select>
                </div>
                <div class="field">
                    <label for="birth_commune">ឃុំ-សង្កាត់</label>
                    <select id="birth_commune" name="birth_commune">
                        <option value="">សូមជ្រើសរើស</option>
                    </select>
                </div>
                <div class="field">
                    <label for="birth_village">ភូមិ</label>
                    <select id="birth_village" name="birth_village">
                        <option value="">សូមជ្រើសរើស</option>
                    </select>
                </div>
                <div class="field">
                    <label for="birth_house_no">ផ្ទះលេខ</label>
                    <input type="text" id="birth_house_no" name="birth_house_no">
                </div>
            </div>

            <div class="field-grid cols-1">
                <div class="field">
                    <label for="birth_street">ផ្លូវ</label>
                    <input type="text" id="birth_street" name="birth_street">
                </div>
            </div>
        </fieldset>

        <!-- ===================== PARENTS ===================== -->
        <fieldset class="section">
            <legend>ព័ត៌មានឪពុកម្តាយ</legend>

            <div class="field-grid cols-4">
                <div class="field">
                    <label for="father_name">ឈ្មោះឪពុក</label>
                    <input type="text" id="father_name" name="father_name">
                </div>
                <div class="field">
                    <label for="father_phone">លេខទូរស័ព្ទ</label>
                    <input type="text" id="father_phone" name="father_phone">
                </div>
                <div class="field">
                    <label for="mother_name">ឈ្មោះម្តាយ</label>
                    <input type="text" id="mother_name" name="mother_name">
                </div>
                <div class="field">
                    <label for="mother_phone">លេខទូរស័ព្ទ</label>
                    <input type="text" id="mother_phone" name="mother_phone">
                </div>
            </div>
        </fieldset>

        <!-- ===================== ENROLLMENT / TRANSFER INFO (highlighted) ===================== -->
        <fieldset class="section highlighted">
            <legend class="highlight-legend">ព័ត៌មានពេលចូលរៀន</legend>

            <div class="field-grid cols-4">
                <div class="field">
                    <label for="from_school_type">មករៀនសាលា</label>
                    <select id="from_school_type" name="from_school_type">
                        <option value="public" selected>សាលារដ្ឋ</option>
                        <option value="private">សាលាឯកជន</option>
                        <option value="new">សិស្សថ្មី</option>
                    </select>
                </div>
                <div class="field">
                    <label for="from_school_other">មករៀនសាលារៀនផ្សេងទៀត (បញ្ចូលឈ្មោះសាលា)</label>
                    <input type="text" id="from_school_other" name="from_school_other">
                </div>
                <div class="field">
                    <label for="class_name">ឈ្មោះថ្នាក់</label>
                    <input type="text" id="class_name" name="class_name">
                </div>
                <div class="field">
                    <label for="school_address">អាសយដ្ឋានសាលា</label>
                    <select id="school_address" name="school_address">
                        <option value="" selected>សូមជ្រើសរើស</option>
                    </select>
                </div>
            </div>
        </fieldset>

        <div class="form-actions">
            <button type="submit" class="btn-save">Save</button>
        </div>
    </form>
</div>

<p class="form-footer">
    សរសេរសំណួរទីនោះ: Rith Panha (090363560)
</p>

<script>
    document.querySelectorAll('.hidden-file-input').forEach(function (input) {
        input.addEventListener('change', function () {
            var wrapper = input.closest('.photo-box');
            var status = wrapper.querySelector('.photo-status');
            if (input.files && input.files.length > 0) {
                status.textContent = input.files[0].name;
                status.style.color = '#2f6fd6';
            } else {
                status.textContent = 'មិនទាន់ត្រូវបានបញ្ចូលរូបភាព';
                status.style.color = '#999';
            }
        });
    });
</script>
@endsection