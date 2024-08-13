<?php 
namespace App\Traits;

use App\Models\LogUpdate;
use App\Models\LogUpdateField;
use DB;

trait HandleLogUpdate
{
   protected static function bootHandleLogUpdate()
   {
        self::updated(function($model){
            if($model->wasChanged()){
                DB::beginTransaction();

                try{
                    $logUpdate = LogUpdate::create([
                        'entity_id' => $model->id,
                        'date' => date('Y-m-d h:i:s'),
                        'model' => get_class($model)
                    ]);

                    foreach($model->getChanges() as $attribute => $value){
                        LogUpdateField::create([
                            'log_updates_id' => $logUpdate->id, 
                            'attribute' => $attribute,
                            'value' => $value,
                            'original' =>  $model->getOriginal()[$attribute]
                        ]);
                    }
                    DB::commit();
                }catch (Throwable $e){
                    DB::rollback();
                }
            }            
        });
   }
}