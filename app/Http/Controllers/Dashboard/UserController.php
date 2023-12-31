<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use App\Repositories\Dashboard\RoleRepository;
use App\Repositories\Dashboard\UserRepository;
use Illuminate\Support\Facades\Gate;

class UserController extends DashboardController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_unless(Gate::allows('user_access'), 403);
        $users = UserRepository::getAll();
        $totalUsers = User::count();

        return view('dashboard.user.index', compact('users', 'totalUsers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        abort_unless(Gate::allows('user_edit'), 403);
        $roles = RoleRepository::getAll();

        return view('dashboard.user.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(User $user)
    {
        $user->syncRoles($user);

        return redirect('dashboard/sme/users')->withSuccessMessage('User Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        abort_unless(Gate::allows('user_delete'), 403);
        UserRepository::delete($user);

        return redirect('dashboard/sme/users')->withSuccessMessage('User Deleted Successfully!');
    }
}
