<?php

namespace Battleroad\Championship\Infra\Http\Requests;

use Battleroad\Championship\Infra\Models\Game;
use Battleroad\Championship\Infra\Models\Platform;
use Illuminate\Foundation\Http\FormRequest;

class AddCompetition extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $gameModel = Game::class;
        $platformModel = Platform::class;

        return [
            'gameId' => ['required', 'string', "exists:{$gameModel},_id"],
            'platformId' => ['required', 'string', "exists:{$platformModel},_id"],
            'startAt' => ['required', 'date'],
        ];
    }
}
