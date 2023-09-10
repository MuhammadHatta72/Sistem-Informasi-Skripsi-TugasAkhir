<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    public static array $permissionRole = [
        'dashboard' => ['admin', 'dosen', 'mahasiswa'],
        'dosen' => ['dosen'],
        'mahasiswa' => ['mahasiswa'],
        'admin' => ['admin']
    ];

    public static array $permissionSubRole = [
        'KPS' => ['KPS'],
        'dosen_penilai' => ['dosen_penilai'],
        'dosen_penguji_proposal' => ['dosen_penguji_proposal'],
        'dosen_pembimbing' => ['dosen_pembimbing'],
        'dosen_penguji_skripsi' => ['dosen_penguji_skripsi'],
    ];

    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        $this->definePermissions(self::$permissionRole, 'role');
        $this->definePermissions(self::$permissionSubRole, 'sub_role');
    }

    /**
     * Define permissions based on roles or sub-roles.
     *
     * @param array $permissions
     * @param string $attribute
     */
    private function definePermissions(array $permissions, string $attribute): void
    {
        foreach ($permissions as $action => $roles) {
            Gate::define($action, function (User $user) use ($attribute, $roles) {
                return in_array($user->{$attribute}, $roles);
            });
        }
    }
}
