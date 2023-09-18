<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    public static array $permissionRole = [
        'dashboard' => ['admin', 'dosen', 'mahasiswa', 'kps'],
        'dosen' => ['dosen'],
        'mahasiswa' => ['mahasiswa'],
        'admin' => ['admin'],
        'kps' => ['kps'],
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
