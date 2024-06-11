<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use App\Http\Controllers\Controller;
use App\Services\MercadoPagoService;
use MercadoPago\PreferenceClient;

class PagosController extends Controller
{
   /* public function __construct(private MercadoPagoService $mercadoPagoService)
    {
        
    }
    */
    public function vistaPagarApp(){
        
        return view('pagos.pagarapp');
    }
    
  /*  public function pagarApp(){
        
        $mensualidad = $this->compraService->crearCompra($request);

        $preferencia = $this->mercadoPagoService->crearPreferencia();
    
    
        
    }*/
    /*public function checkoutOwner()
    {
        $client = new PreferenceClient();
        $preference = $client->create([
            "external_reference" => "teste",
            "items" => array(
                array(
                    "id" => "4567",
                    "title" => "Dummy Title",
                    "description" => "Dummy description",
                    "picture_url" => "http://www.myapp.com/myimage.jpg",
                    "category_id" => "eletronico",
                    "quantity" => 1,
                    "currency_id" => "BRL",
                    "unit_price" => 100
                )
            ),
            "payment_methods" => [
                "default_payment_method_id" => "master",
                "excluded_payment_types" => array(
                    array(
                        "id" => "ticket"
                    )
                ),
                "installments"  => 12,
                "default_installments" => 1
            ]
        ]);

        return view('tu-vista', ['preference' => $preference]);
    }
*/
}

