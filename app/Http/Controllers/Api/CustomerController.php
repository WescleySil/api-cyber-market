<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Http\Resources\CustomerResource;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\EditCustomerRequest;
use App\Services\StoreCustomerService;
use App\Services\EditCustomerService;


class CustomerController extends Controller
{
    public function index(){
        $customers = Customer::all();
        return response()->json(CustomerResource::collection($customers));
    }

    public function store(StoreCustomerRequest $storeCustomerRequest, StoreCustomerService $storeCustomerService){
        
        $data = $storeCustomerRequest->validated();
        $customer = $storeCustomerService->run($data);

        return response()->json(new CustomerResource($customer), 201);
    }

    public function update(EditCustomerRequest $editCustomerRequest, EditCustomerService $editCustomerService, Customer $customer){

        $data = $editCustomerRequest->validated();
        if(empty($data)){
            return response()->json("{'message': 'Nenhuma alteração foi solicitadada'}", 400);
        }
        $customer = $editCustomerService->run($data, $customer);

        return response()->json(new CustomerResource($customer));
        
    }

    public function destroy(Customer $customer){
        if(! $customer){
            return response()->json("{'message': 'Cliente não encontrado'}", 404);
        }
        
        $customer->delete();
        
        return response()->json("O cliente foi deletado com sucesso", 200);
    }
}
