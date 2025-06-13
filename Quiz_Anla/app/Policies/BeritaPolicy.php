<?php

namespace App\Policies;

use App\Models\Berita;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class BeritaPolicy
{
    public function create(User $user): bool
    {
        return $user->isAdmin();
    }

    public function update(User $user, Berita $berita): bool
    {
        return $user->isAdmin();
    }

    public function delete(User $user, Berita $berita): bool
    {
        return $user->isAdmin();
    }
}

