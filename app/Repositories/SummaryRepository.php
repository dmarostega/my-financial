<?php 
namespace App\Repositories;

use App\Models\SummaryMonth;
use App\Models\SummaryMonthItem;
use App\Models\Bill;
use App\Models\Contract;
use App\Models\FinancialAccount;
use Carbon\Carbon;

class SummaryRepository
{
    // use HandleModel;
    protected static $model;
    
    public function check()
    {
        $summary = self::model()->whereMonth('date', date('m'));
        dd($summary->count());

        if(!$summary->count()){
            $summary = new SummaryMonth();
            $summary->date = Carbon::now();
            $summary->in_process = 'checking';
            $summary->save();

            // todos contratos ativos
            $contracts = Contract::isActive()->get();

            // todas contas bancárias ativas
            $financialAccounts = FinancialAccount::isActive()->get();

            // contas
            $bills = Bill::isActive()->get();
            foreach($contracts as $key => $contract){
                $summaryItems = [];

                /*

                'summary_month_id',
                'entity_id',
                'model',
                'value',
                'ammount',
                'in_process'


                */


                // verifica se já existe lançamento de pagamento de cada contrato
                /**
                     * NOTE: processoas após geração do registor
                     *  - se houver transaction.transactionParts->value_paid
                     *  - senão
                     *  - se houver transaction->value
                     *  - senão
                     *  - pega valor do contract
                     * 
                     *   e se usuário editar transaction
                     *    - transactionParts->value_paid irá alterar
                     *  1.  (???) se valor transactionPart alterar-se.. valor do SummaryMonth deverá estar de acordo
                     * 
                     * 
                     *  2.  (???) Adicionar nova coluna em summary_month
                     *   para sinalizar ação em que valor foi atualizado?
                     *    - já há coluna include_in ['receiving', 'checking']
                     *   
                     *   ideia
                     *    - in ['contracts','transaction','other']
                     * 
                     * 
                     *  outros
                     *  - quando primeiro aceso, não há registros anteriores
                     *    - 
                 */

                $contractReceive = $contract->with('bill.transaction.transactionParts')->whereHas('bill.transaction.transactionParts', function($query){
                    $query->whereMonth('due_date', date('m'));
                    $query->whereNotNull('value_paid');
                })->first();

                $summaryItems['summary_month_id'] = $summary->id;
                $summaryItems['entity_id'] = $contract->id;
                $summaryItems['value'] = $contract->value;
                $summaryItems['model'] =  get_class($contract);

                
                if($contractReceive){
                    /**
                     * NOTE: verificar quando implementar parcelamentos.
                     */
                    $summaryItems['ammount'] = $contractReceive->bill->transaction->transactionParts->first()->value_paid ;
                }else if($contract->transaction){
                    $summaryItems['ammount'] = $contract->transaction->value;
                }else{
                    $summaryItems['ammount'] = $contract->value;
                }

                $summaryItems['in_process'] = 'checking';

                SummaryMonthItem::create( $summaryItems );
            }

            foreach($financialAccounts as $account){
                $summaryItems = [];
                $summaryItems['summary_month_id'] = $summary->id;
                $summaryItems['entity_id'] = $account->id;
                $summaryItems['value'] = $account->balance;
                $summaryItems['ammount'] = $account->balance;

                $summaryItems['model'] =  get_class($account);

                $summaryItems['in_process'] = 'checking';

                SummaryMonthItem::create( $summaryItems );
            }

            foreach($bills as $bill){
                $summaryItems = [];
                $summaryItems['summary_month_id'] = $summary->id;
                $summaryItems['entity_id'] = $bill->id;
                $summaryItems['value'] = $bill->value;

                if($bill->transaction){
                    $summaryItems['ammount'] = $bill->transaction->value;
                }else{
                    $summaryItems['ammount'] = $bill->value;
                }

                $summaryItems['model'] =  get_class($bill);

                $summaryItems['in_process'] = 'checking';

                SummaryMonthItem::create( $summaryItems );
            }
        }
    }

    private function model()
    {
        if(!self::$model)
            self::$model = new SummaryMonth();

        return self::$model;
    }
}