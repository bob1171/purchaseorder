<!DOCTYPE html>
<html lang="en">

<head>
    <title>Purchase Order</title>
    @vite(['resources/css/app.css'])
</head>

<body>
    <script defer>
    window.print();  
    </script>
    <div class="container mx-auto w-[595px] h-[842px]">
        <div class="p-0 font-serif">
            <div class="text-center mb-4">
                <h1 class="text-4xl">{{ strtoupper($school) }}</h1>
                <p class="text-xl">Cutter Morning Star School District #21</p>
                <p class="text-md">2801 Spring Street</p>
                <p class="text-md">Hot Springs, AR 71901</p>
            </div>

            <div class="text-center mb-4">
                <p class="text-md">R E Q U E S T</p>
                
                @switch($type)
                    @case("Credit Card")
                        <p class="text-md">MATERIALS / SERVICES / P.O. / <span class="border-black border-2 rounded-lg">CREDIT CARD</span></p>
                    @break
                    @case("Purchase Order")
                        <p class="text-md">MATERIALS / SERVICES / <span class="border-black border-2 rounded-lg">P.O.</span> /CREDIT CARD </p>
                    @break
                    @case("Materials")
                        <p class="text-md"><span class="border-black border-2 rounded-lg">MATERIALS</span> / SERVICES / P.O. /CREDIT CARD </p>
                    @break
                    @case("Services")
                        <p class="text-md">MATERIALS / <span class="border-black border-2 rounded-lg">SERVICES</span>/ P.O. /CREDIT CARD </p>
                    @break

                @default
                Default case...
                @endswitch
                
            </div>
        </div>

        <div class="text-md">
            <div class="flex py-1">
                <div class="w-32">DATE:</div>
                <div class="flex-1 font-mono font-bold">{{ $date }}</div>
            </div>

            <div class="flex py-1">
                <div class="w-32">COMPANY:</div>
                <div class="flex-1 font-mono font-bold">{{ $company }}</div>
            </div>

            <div class="flex py-1">
                <div class="w-32">ADDRESS:</div>
                <div class="flex-1 text-lg">____________________________________________</div>
            </div>
            <div class="flex">
                <div class="w-32"></div>
                <div class="flex-1 text-lg">____________________________________________</div>
            </div>

            <div class="flex py-1">
                <div class="w-32">FAX NUMBER:</div>
                <div class="flex-1 text-lg">____________________________________________</div>
            </div>
        </div>
        <div class="my-1"></div>



        <!-- Table -->
        <div class="mb-4 font-mono w-full mr-2 border border-black">
            <div class="font-sans text-center flex font-bold">
                <div class="pl-2 border-black flex w-32 px-1 border-r">QUANTITY</div>
                <div class="pl-2 border-black flex-auto px-1 border-r">DESCRIPTION</div>
                <div class="pl-2 border-black flex w-32 px-1 ">AMOUNT</div>
            </div>


            @foreach ($quantities as $i => $q)
            <div class="flex border-t border-black">
                <div class="pl-2 flex w-32 px-1 border-r border-black">
                    {{ $q }}
                </div>
                <div class="pl-2 flex-auto px-1 border-r border-black">
                    {!! $items[$i] ?: '<br>' !!}
                </div>
                <div class="pl-2 flex w-32 px-1 border-black">
                    {!! $prices[$i] ? "$ " . $prices[$i]: '<br>' !!}
                </div>
            </div>
            @endforeach


            <div class="flex border-t border-black">
                <div class="pl-2 flex-auto text-right font-bold px-1 border-r border-black">Total:</div>
                <div class="font-bold pl-2 w-32 px-1">$ {{ $total }}</div>
            </div>
        </div>


        <!-- Footer -->

        <div class="flex justify-between text-sm ">
            <div class="flex flex-col">
                <div class="flex py-1">
                    <div class="w-48">DEPARTMENT:</div>
                    <div class="flex-1 font-mono font-bold">{{ $department }}</div>
                </div>

                <div class="flex py-1">
                    <div class="w-32">REQUESTED BY:</div>
                    <div class="flex-1 text-lg">___________________________________</div>
                </div>

                <div class="flex">
                    <div class="w-32">APPROVED BY:</div>
                    <div class="flex-1 text-lg">___________________________________</div>
                </div>
                <div class="flex">
                    <div class="w-32"></div>
                    <div class="flex-1 text-[10px] -my-1 font-bold">PRINCIPAL/SUPERVISOR</div>
                </div>
                <div class="flex">
                    <div class="w-32 my-2">PURCHASE APPROVAL:</div>
                    <div class="flex-1 text-lg my-4">___________________________________</div>
                </div>
                <div class="flex">
                    <div class="w-32"></div>
                    <div class="flex-1 text-[10px] -my-6 font-bold">DISTRICT TREASURER </div>
                </div>
                <div class="flex">
                    <div class="w-32 my-2"></div>
                    <div class="flex-1 text-lg my-2">___________________________________</div>
                </div>
                <div class="flex">
                    <div class="w-32"></div>
                    <div class="flex-1 text-[10px] -my-4 font-bold">SUPERINTENDENT</div>
                </div>
            </div>
            <div class="flex-1 max-w-md p-2 border border-black ml-4">
                <div class="font-bold text-center mb-2">FOR SUPERINTENDENT'S OFFICE USE ONLY</div>
                <div class="mb-2">
                    <div class="flex justify-between">
                        <div>CHARGE TO:</div>
                        <div class="my-4">______________________</div>
                    </div>
                </div>
                <div class="mb-2">
                    <div class="flex justify-between">
                        <div>PURCHASE ORDER #</div>
                        <div class="my-4">______________________</div>
                    </div>
                </div>
                <div class="w-8">
                    <div class="flex justify-between">
                        <div>DATE APPROVED:</div>
                    </div>
                </div>
            </div>



        </div>
    </div>
    </div>

</body>

</html>