<?php

namespace App\Http\Controllers\Self;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TokenController extends Controller
{
    public function index()
    {
        $tokens = auth()->user()->tokens;

        return inertia('self/tokens/index', [
            'tokens' => $tokens,
        ]);
    }

    public function create()
    {
        return inertia('self/tokens/create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        $token = auth()->user()->createToken($request->name);

        return redirect()
            ->route('self.tokens.index')
            ->with(
                'success',
                'Token generated.'
                . ' Make sure to copy your personal access token now. You won’t be able to see it again!'
                . ' ' . $token->plainTextToken,
            );
    }

    public function delete($token)
    {
        $token = auth()->user()->tokens()->firstWhere('id', $token);

        return inertia('self/tokens/delete', [
            'token' => $token,
        ]);
    }

    public function destroy($token)
    {
        $token = auth()->user()->tokens()->firstWhere('id', $token)->delete();

        return redirect()
            ->route('self.tokens.index')
            ->with('success', 'Token deleted');
    }
}
