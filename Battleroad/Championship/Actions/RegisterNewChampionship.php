<?php

namespace Battleroad\Championship\Actions;

use Battleroad\Championship\DTOs\ChampionshipRequest;
use Battleroad\Championship\Entities\Championship;
use Battleroad\Championship\Infra\Repositories\Championship as Repository;

readonly class RegisterNewChampionship
{
    public function __construct(private readonly Repository $repository)
    {
    }

    public function execute(ChampionshipRequest $championshipRequest): Championship
    {
        return $this->repository->create($championshipRequest);

        // @todo Dispatch NewChampionshipWasRegistered
    }
}
