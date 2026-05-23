<?php

namespace App\Http\Middleware;

use App\Models\Player;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsurePlayerSession
{
    public function handle(Request $request, Closure $next): Response
    {
        $token = session('player_token');

        if (! $token) {
            return redirect()->route('welcome')
                ->with('info', 'Silakan masukkan nama kamu terlebih dahulu.');
        }

        $player = Player::where('session_token', $token)->first();

        if (! $player) {
            session()->forget('player_token');
            return redirect()->route('game.enter')
                ->with('info', 'Sesi tidak ditemukan. Silakan mulai ulang.');
        }

        $request->merge(['player' => $player]);

        return $next($request);
    }
}