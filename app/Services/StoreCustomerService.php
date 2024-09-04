<?php

namespace App\Services;

use App\Models\Customer;
use Illuminate\Support\Facades\Hash;

class StoreCustomerService
{
  public function __construct(readonly Customer $customer){}
  
  
  public function run($data){
    return $this->customer->create($data);
  }
}