<?php

namespace Battleroad\Http\Controllers\Admin;

use Battleroad\Http\Controllers\BaseController;
use Champ\Billing\Contracts\TransactionService;
use Champ\Join\Repositories\JoinRepository;

class TransactionsController extends BaseController
{
    /**
     * Transaction Service.
     *
     * @var TransactionService
     */
    protected $transactionService;

    /**
     * Join Repository.
     *
     * @var JoinRepository
     */
    protected $joinRepository;

    public function __construct(
        TransactionService $transactionService,
        JoinRepository $joinRepository
    ) {
        $this->transactionService = $transactionService;
        $this->joinRepository = $joinRepository;
    }

    /**
     * Show a screen with the transactions.
     *
     * @param int $transactionId
     *
     * @return Response
     */
    public function show($championshipId, $transactionId)
    {
        $join = $this->joinRepository->getRelationedWith($championshipId, $transactionId, ['user', 'items']);
        $transaction = $this->transactionService->getDetails($transactionId);

        return $this->view('admin.championships.transaction', compact('transaction', 'join'));
    }
}
