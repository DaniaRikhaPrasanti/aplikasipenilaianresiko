<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;


define("superadmin", 1);
define("admin", 2);
define("user", 3);

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('sidebar-user', function (User $user) {
            return in_array($user->ID_ROLE, [superadmin,admin]);
        });

        Gate::define('sidebar-tujuanKegiatan', function (User $user) {
            return in_array($user->ID_ROLE, [superadmin,admin]);
        });

        Gate::define('sidebar-daftarresiko', function (User $user) {
            return in_array($user->ID_ROLE, [superadmin,admin]);
        });

        Gate::define('sidebar-analisisresiko', function (User $user) {
            return in_array($user->ID_ROLE, [superadmin,admin]);
        });

        Gate::define('sidebar-celahpengendalian', function (User $user) {
            return in_array($user->ID_ROLE, [superadmin,admin]);
        });
        Gate::define('sidebar-rtp', function (User $user) {
            return in_array($user->ID_ROLE, [superadmin,admin]);
        });

        Gate::define('sidebar-tujuanKegiatanUser', function (User $user) {
            return in_array($user->ID_ROLE, [user]);
        });

        Gate::define('sidebar-daftarresikoUser', function (User $user) {
            return in_array($user->ID_ROLE, [user]);
        });

        Gate::define('sidebar-analisisresikoUser', function (User $user) {
            return in_array($user->ID_ROLE, [user]);
        });

        Gate::define('sidebar-celahpengendalianUser', function (User $user) {
            return in_array($user->ID_ROLE, [user]);
        });

        Gate::define('sidebar-rtpUser', function (User $user) {
            return in_array($user->ID_ROLE, [user]);
        });

        Gate::define('konfirmasi-daftarResiko', function (User $user) {
            return in_array($user->ID_ROLE, [superadmin,admin]);
        });
        Gate::define('konfirmasi-analsisisResiko', function (User $user) {
            return in_array($user->ID_ROLE, [superadmin,admin]);
        });
        Gate::define('konfirmasi-celahPengendalian', function (User $user) {
            return in_array($user->ID_ROLE, [superadmin,admin]);
        });
        Gate::define('konfirmasi-RTP', function (User $user) {
            return in_array($user->ID_ROLE, [superadmin,admin]);
        });
        Gate::define('aksi-dampak', function (User $user) {
            return in_array($user->ID_ROLE, [superadmin,admin]);
        });
        Gate::define('aksi-kemungkinan', function (User $user) {
            return in_array($user->ID_ROLE, [superadmin,admin]);

        });
        Gate::define('aksi-tujuanskpd', function (User $user) {
            return in_array($user->ID_ROLE, [user]);
        });
        Gate::define('aksi-sasaran', function (User $user) {
            return in_array($user->ID_ROLE, [user]);
        });
        Gate::define('aksi-namakegiatan', function (User $user) {
            return in_array($user->ID_ROLE, [user]);
        });

    }
}
