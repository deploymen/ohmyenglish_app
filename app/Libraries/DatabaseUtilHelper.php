<?php namespace App\Libraries;

use Models;

class DatabaseUtilHelper{

  public static function LogInsert($userId, $tableName, $tableId){
      try {
          $log = new Models\LogInsert;             
          $log->user_id = $userId;
          $log->table_name = $tableName;
          $log->table_id = $tableId;
          $log->created_ip = \Request::ip();
          $log->save();
      
      }catch(\Exception $ex) {
          Libraries\LogHelper::LogToDatabase($ex->getMessage(), ['environment' => json_encode([
            'userId' => $userId, 
            'tableName' => $tableName, 
            'tableId' => $tableId, 
          ])]);
          return Libraries\ResponseHelper::OutputJSON('exception');
      }
  }

  public static function LogUpdate($userId, $tableName, $tableId, $wipedData){
      try {
          $log = new Models\LogUpdate;             
          $log->user_id = $userId;
          $log->table_name = $tableName;
          $log->table_id = $tableId;
          $log->wiped_data = $wipedData;
          $log->created_ip = \Request::ip();
          $log->save();
      
      }catch(\Exception $ex) {
          Libraries\LogHelper::LogToDatabase($ex->getMessage(), ['environment' => json_encode([
            'userId' => $userId, 
            'tableName' => $tableName, 
            'tableId' => $tableId, 
            'wipedData' => $wipedData, 
          ])]);
          return Libraries\ResponseHelper::OutputJSON('exception');
      }
  }  

  public static function TrafficControl($table, $limitInMinute = 5, $limitInCount = 10){
    $count = Models\LogInsert::where('table_name', $table)->where('created_ip', \Request::ip())->whereRaw("DATE_ADD(`created_at`, INTERVAL {$limitInMinute} MINUTE) > NOW()")->count();
    return $count < $limitInCount;
  }
 
} 