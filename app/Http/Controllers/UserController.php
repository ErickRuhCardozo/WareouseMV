<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Unity;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

class UserController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(User::class);
    }

    public function index(Request $request)
    {
        $unityId = $request->get('unity');
        $roleId= $request->get('role');
        $unities = $this->getMappedUnities();
        $roles = $this->getMappedRoles();
        $isFiltering = $request->has('filter');
        $users = [];

        if ($unityId)
            $users = $this->filterUsersByUnity($unityId, $roleId);
        else if ($roleId)
            $users = $this->filterUsersByRole($roleId, $unityId);
        else
            $users = $this->getUsersByRole(Auth::user());
        
        return View::make('users.index', compact(['users', 'unities', 'roles', 'isFiltering', 'unityId', 'roleId']));
    }

    public function create()
    {
        $user = Auth::user();
        $roles = $this->getMappedRoles();
        $unities = $this->getMappedUnities();

        return View::make('users.create', compact(['unities', 'roles']));
    }

    public function store(StoreUserRequest $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);

        try
        {
            User::create($data);
        }
        catch (QueryException $err)
        {
            dd('TODO');
        }

        return Redirect::route('users.index');
    }

    public function show(User $user)
    {
        $unity = $user->unity?->name ?? 'Esse Usuário não está veiculado a nenhuma Unidade';
        $role = $user->role->name;
        return View::make('users.show', compact(['user', 'unity', 'role']));
    }

    public function edit(User $user)
    {
        $unities = $this->getMappedUnities();
        $roles =  $this->getMappedRoles();
        return View::make('users.edit', compact(['user', 'unities', 'roles']));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $data = $request->validated();

        if (!empty($data['password']))
            $data['password'] = Hash::make($data['password']);

        $user->update($data);
        return Redirect::route('users.show', $user->id);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return Redirect::route('users.index');
    }

    private function getMappedUnities()
    {
        $user = Auth::user();

        if ($user->role_id === UserRole::IS_ADMIN)
        {
            $unities = Unity::all()->map(fn($unity) => ['label' => $unity->name, 'value' => $unity->id]);
        }
        else if ($user->role_id === UserRole::IS_MANAGER)
        {
            $unity = $user->unity;
            $unities = [
                ['label' => $unity->name, 'value' => $unity->id]
            ];
        }

        return $unities;
    }

    private function getMappedRoles()
    {
        return UserRole::all()->map(fn($role) => ['label' => $role->name, 'value' => $role->id]);
    }

    private function getUsersByRole($user)
    {
        if ($user->role_id === UserRole::IS_ADMIN)
            return User::all()->except($user->id);
        else if ($user->role_id === UserRole::IS_MANAGER)
            return User::where('unity_id', $user->unity_id)
                       ->where('id', '!=', $user->id);
    }

    private function filterUsersByUnity(int $unityId, int $roleId = null)
    {
        $unity = Unity::findOrFail($unityId);

        if ($roleId)
            return $unity->users->where('role_id', $roleId)
                                ->where('id,', '!=', Auth::id());
        else
            return $unity->users->except(Auth::id());
    }

    private function filterUsersByRole(int $roleId, int $unityId = null)
    {
        if ($unityId)
        {
            $unity = Unity::findOrFail($unityId);
            return $unity->users->where('role_id', $roleId)
                                ->where('id', '!=', Auth::id());
        }
        else
        {
            return User::where('role_id', $roleId)
                       ->where('id', '!=', Auth::id());
        }
    }
}
