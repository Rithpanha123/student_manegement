<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use App\Models\Gender;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    /**
     * Password rule ស្តង់ដារប្រើរួមគ្នាទាំង store() និង update()
     */
    protected function passwordRule(bool $required = true): array
    {
        $rule = Password::min(8)->mixedCase()->numbers()->symbols();
        // ->uncompromised(); // uncomment បើ server មាន internet access (ឆែក leaked password តាម HaveIBeenPwned)

        return [$required ? 'required' : 'nullable', 'string', 'confirmed', $rule];
    }

    /**
     * Khmer validation messages
     */
    protected function validationMessages(): array
    {
        return [
            'username.required' => 'សូមបញ្ចូលឈ្មោះអ្នកប្រើប្រាស់',
            'username.max'      => 'ឈ្មោះអ្នកប្រើប្រាស់មិនអាចលើសពី :max តួអក្សរបានទេ',
            'username.unique'   => 'ឈ្មោះអ្នកប្រើប្រាស់នេះមានរួចហើយ សូមប្រើឈ្មោះផ្សេង',

            'email.required' => 'សូមបញ្ចូលអ៊ីមែល',
            'email.email'    => 'អ៊ីមែលមិនត្រឹមត្រូវ សូមពិនិត្យទម្រង់អ៊ីមែលឡើងវិញ',
            'email.unique'   => 'អ៊ីមែលនេះត្រូវបានប្រើប្រាស់រួចហើយ សូមប្រើអ៊ីមែលផ្សេង',

            'password.required'      => 'សូមបញ្ចូល Password',
            'password.confirmed'     => 'ការបញ្ជាក់ Password មិនត្រូវគ្នាទេ',
            'password.min'           => 'Password ត្រូវមានយ៉ាងហោចណាស់ :min តួអក្សរ',
            'password.mixed'         => 'Password ត្រូវមានទាំងអក្សរធំ និងអក្សរតូច',
            'password.numbers'       => 'Password ត្រូវមានលេខយ៉ាងហោចណាស់ ១ តួ',
            'password.symbols'       => 'Password ត្រូវមាននិមិត្តសញ្ញា (ដូចជា ! @ # $ %) យ៉ាងហោចណាស់ ១ តួ',
            'password.uncompromised' => 'Password នេះធ្លាប់ត្រូវបានលេចធ្លាយពីមុនមក សូមប្រើ Password ផ្សេង',

            'role_id.required'   => 'សូមជ្រើសរើសតួនាទី (Role)',
            'role_id.exists'     => 'តួនាទីដែលបានជ្រើសរើសមិនត្រឹមត្រូវ',
            'gender_id.exists'   => 'ភេទដែលបានជ្រើសរើសមិនត្រឹមត្រូវ',

            'profile_picture.image' => 'ឯកសារត្រូវតែជារូបភាព',
            'profile_picture.max'   => 'រូបភាពមិនអាចលើសពី 2MB បានទេ',
        ];
    }

    public function index(Request $request)
    {
        $search  = $request->query('search');
        $perPage = $request->query('per_page', 10); // default 10

        $query = User::with(['gender', 'role'])
            ->when($search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('username', 'like', "%{$search}%")
                      ->orWhere('email', 'like', "%{$search}%");
                });
            })
            ->orderByDesc('created_at');

        if ($perPage === 'all') {
            // Show everything on one page (still paginate() so the view's
            // methods like ->total(), ->firstItem() etc. keep working)
            $total = $query->count();
            $users = $query->paginate($total > 0 ? $total : 1)->withQueryString();
        } else {
            $users = $query->paginate((int) $perPage)->withQueryString();
        }

        return view('admin.user_list', compact('users', 'perPage'));
    }

    public function create()
    {
        $roles = Role::all();
        $genders = Gender::all();

        return view('admin.create', compact('roles', 'genders'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'username'        => 'required|string|max:255|unique:users,username',
            'email'           => 'required|email|unique:users,email',
            'password'        => $this->passwordRule(true),
            'role_id'         => 'required|exists:roles,role_id',
            'gender_id'       => 'nullable|exists:genders,gender_id',
            'is_active'       => 'nullable|boolean',
            'profile_picture' => 'nullable|image|max:2048',
        ], $this->validationMessages());

        $path = null;
        if ($request->hasFile('profile_picture')) {
            $path = $request->file('profile_picture')->store('profile_pictures', 'public');
        }

        User::create([
            'username'        => $validated['username'],
            'email'           => $validated['email'],
            'password_hash'   => Hash::make($validated['password']),
            'role_id'         => $validated['role_id'],
            'gender_id'       => $validated['gender_id'],
            'is_active'       => $request->boolean('is_active'),
            'last_login'      => null,
            'profile_picture' => $path,
        ]);

        return redirect()->route('admin.users.index')->with('success', 'អ្នកប្រើប្រាស់ត្រូវបានបង្កើតដោយជោគជ័យ!');
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        $genders = Gender::all();

        return view('admin.user_edit', compact('user', 'roles', 'genders'));
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'username'        => 'required|string|max:255|unique:users,username,' . $user->user_id . ',user_id',
            'email'           => 'required|email|unique:users,email,' . $user->user_id . ',user_id',
            'password'        => $this->passwordRule(false), // password មិនចាំបាច់ noh ពេល update ទេ
            'role_id'         => 'required|exists:roles,role_id',
            'gender_id'       => 'nullable|exists:genders,gender_id',
            'is_active'       => 'nullable|boolean',
            'profile_picture' => 'nullable|image|max:2048',
        ], $this->validationMessages());

        $data = [
            'username'  => $validated['username'],
            'email'     => $validated['email'],
            'role_id'   => $validated['role_id'],
            'gender_id' => $validated['gender_id'],
            'is_active' => $request->boolean('is_active'),
        ];

        if (!empty($validated['password'])) {
            $data['password_hash'] = Hash::make($validated['password']);
        }

        if ($request->hasFile('profile_picture')) {
            $data['profile_picture'] = $request->file('profile_picture')->store('profile_pictures', 'public');
        }

        $user->update($data);

        return redirect()->route('admin.users.index')->with('success', 'អ្នកប្រើប្រាស់ត្រូវបានកែប្រែដោយជោគជ័យ!');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'អ្នកប្រើប្រាស់ត្រូវបានលុបដោយជោគជ័យ!');
    }
}