<!DOCTYPE html>
<html lang="en" class="">

<head>
    <meta charset="UTF-8">
    <title>Create Purchase Order</title>
    @vite(['resources/css/app.css'])
</head>

<body class="flex flex-col h-screen bg-gray-50">
    <div class="container mx-auto px-4 py-8 w-3/5 flex-grow -mb-96">
        <h1 class="text-4xl font-bold mb-8">Create Purchase Order</h1>
        <form id="purchaseOrderForm" class="flex flex-col" method="POST" action="/purchaseorder">
            @csrf
            <div id="itemsContainer">
                <div class="flex mb-4">
                    <input type="text" placeholder="Item" class=" border p-2 mr-2 rounded-md w-1/2" required name="i-0">
                    <input type="number" placeholder="Quantity" class=" border p-2 mr-2 rounded-md w-1/4" min="0"
                        required name="q-0">
                    <input type="number" step="0.01" min="0" placeholder="Price"
                        class="border p-2 mr-2 rounded-md w-1/4 [&::-webkit-inner-spin-button]:appearance-none [appearance:textfield]"
                        required name="p-0">
                    <button type="button" id="addItem"
                        class="bg-gray-300 p-2 text-lg mx-2 border rounded-md font-bold w-10 hover:bg-gray-400">+</button>
                    <button type="button" id="removeItem"
                        class="bg-gray-300 p-2 text-lg mx-2 border rounded-md font-bold w-10 hover:bg-gray-400">-</button>
                </div>

            </div>
            <div class="flex-initial mb-4 -ml-2">

                <select class=" border p-2 m-2 rounded-sm bg-grey-300" name="school">
                    <option>Elementary</option>
                    <option>High School</option>
                    <option>Administration</option>
                </select>
                <select class=" border p-2 rounded-sm m-2" name="type">
                    <option>Credit Card</option>
                    <option>Materials</option>
                    <option>Services</option>
                    <option>Purchase Order</option>

                </select>
                <input type="text" placeholder="Company" class="border p-2 m-2 rounded-sm w-48 " name="company">
                <input type="text" placeholder="Department" class="border p-2 m-2 rounded-sm w-48" name="department">

            </div>
            <button type="submit"
                class="bg-green-300 text-green-900 p-2 rounded-md place-self-end border hover:bg-green-400">Print</button>
        </form>


    </div>
    <div class="container mx-auto w-3/5 text-center py-8">
        <p class="text-md">made with <span class="text-red-500">♥</span> by <a href="https://drew.place">drew
                dettmer</a></p>
    </div>
    <script>
    const itemsContainer = document.getElementById('itemsContainer');
    const addItemButton = document.getElementById('addItem');
    const removeItemButton = document.getElementById('removeItem');
    let itemCount = 1;

    addItemButton.addEventListener('click', function() {
        if (itemCount < 12) {
            const newRow = document.createElement('div');
            newRow.className = 'flex mb-4';
            newRow.innerHTML = `
            <input type="text" placeholder="Item" class=" border p-2 mr-2 rounded-md w-1/2" required name="i-${itemCount}">
                    <input type="number"  placeholder="Quantity" class=" border p-2 mr-2 rounded-md w-1/4" required name="q-${itemCount}">
                    <input type="number" step="0.01" placeholder="Price" class="border p-2 mr-2 rounded-md w-1/4 [&::-webkit-inner-spin-button]:appearance-none [appearance:textfield]" required name="p-${itemCount}">
                    <div class="p-2 mx-2 w-10"></div>
                    <div class="p-2 mx-2 w-10"></div>
      `;
            itemsContainer.appendChild(newRow);
            itemCount++;
        }
    });

    removeItemButton.addEventListener('click', function() {
            if (itemCount > 1) {
                itemsContainer.removeChild(itemsContainer.lastChild);
                itemCount--;
            }
        });

    const purchaseOrderForm = document.getElementById('purchaseOrderForm');
    </script>
</body>

</html>