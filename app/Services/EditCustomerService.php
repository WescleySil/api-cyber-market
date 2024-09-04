<?php

namespace App\Services;

use App\Models\Customer;

class EditCustomerService
{
  public function run($data, $customer){
    
    $customer->update($data);
    return $customer;
    
  }
}