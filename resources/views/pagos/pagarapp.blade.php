
<x-app-layout>
<!-- En esta vista, muestras el botón de pago para los dueños -->


<!-- resources/views/tu-vista.blade.php TEST-1423504453461323-102709-f0bfa514eb84f4d873548f1ec0704efe-790494689-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tu Vista</title>
</head>
<body>
    @php
    // Asegúrate de incluir el archivo que contiene la clase PreferenceClient
    use MercadoPago\PreferenceClient;

    // Luego puedes utilizar el código que generas la preferencia
    $client = new \MercadoPago\PreferenceClient();
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
@endphp

    <h1>Crear Preferencia de Mercado Pago</h1>

    <pre>
        <?php print_r($preference); ?>
    </pre>
    
    <!-- Aquí puedes mostrar el botón de pago con el link generado en $preference->sandbox_init_point -->
</body>
</html>

   

</x-app-layout>