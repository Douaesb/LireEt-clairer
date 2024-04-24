document.querySelectorAll('.buyOneButton').forEach(button => {
    button.addEventListener('click', function(event) {
        event.preventDefault();
        const articleContainer = this.closest('.article-container');
        if (!articleContainer) {
            console.error('Error: Could not find article container.');
            return;
        }

        const imageElement = articleContainer.querySelector('.picture img');
        // console.log(imageElement);
        let imageURL = '';
        if (imageElement) {
            imageURL = imageElement.src;
        }
        const articleTitle = articleContainer.querySelector('.article-title').textContent;
        const quantityInput = articleContainer.querySelector('.quantity-input');
        const articleQuantity = parseInt(quantityInput.value);
        const articlePricePerPiece = parseFloat(articleContainer.querySelector('.article-price')
            .textContent.replace('$', ''));

        const articleTotal = articleQuantity * articlePricePerPiece;

        const summaryHTML = `
    <div class="summary-container bg-white rounded-lg shadow-md p-6">
        <table class="w-full">
            <thead>
                <tr>
                    <th class="text-left font-semibold">Product</th>
                    <th class="text-left font-semibold">Price</th>
                    <th class="text-left font-semibold">Quantity</th>
                    <th class="text-left font-semibold">Total</th>
                </tr>
            </thead>
            <tbody>
        
    <tr>
            <td class="py-4">
                <div class="flex items-center">
                    <img class="h-16 w-16 mr-4" src="${imageURL}" alt="image">
                    <span class="font-semibold">${articleTitle}</span>
                </div>
            </td>
            <td class="py-4">$${articlePricePerPiece.toFixed(2)}</td>
            <td class="py-4">
                <div class="flex items-center">
                    <span class="text-center w-8">${articleQuantity}</span>
                </div>
            </td>
            <td class="py-4 text-xl font-bold ">$${articleTotal.toFixed(2)}</td>
        </tr>
</tbody>
        </table>
    </div>

`;
        const summaryContainer = document.getElementById('summaryContainer');
        if (summaryContainer) {
            summaryContainer.innerHTML = summaryHTML;
            summaryContainer.classList.remove('hidden');
        } else {
            console.error('Error: Could not find summaryContainer element in the DOM.');
        }
    });
});

function initializeBuyNowPopUp() {
document.querySelectorAll('.buyOneButtonA').forEach(button => {
    button.addEventListener('click', function(event) {
        event.preventDefault();
        console.log('start');
        const articleContainer = this.closest('.article-container');
        if (!articleContainer) {
            console.error('Error: Could not find article container.');
            return;
        }

        // Retrieve article information
        const articleTitle = articleContainer.querySelector('.article-title').textContent;
        const quantityInput = articleContainer.querySelector('.quantity-input');
        const articleQuantity = parseInt(quantityInput.value);
        const articlePricePerPiece = parseFloat(articleContainer.querySelector('.article-price')
            .textContent.replace('$', ''));

        const imageElement2 = articleContainer.querySelector('.picture img');
        console.log('image',imageElement2)
        let imageURL = '';
        if (imageElement2) {
            imageURL = imageElement2.src; // Get the image URL
        }

        // Calculate the total cost
        const articleTotal = articleQuantity * articlePricePerPiece;

        // Create the summary HTML
        const summaryHTML2 = `
        <div class="summary-container2 bg-white rounded-lg shadow-md p-6">
            <table class="w-full">
                <thead>
                    <tr>
                        <th class="text-left font-semibold">Product</th>
                        <th class="text-left font-semibold">Price</th>
                        <th class="text-left font-semibold">Quantity</th>
                        <th class="text-left font-semibold">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="py-4">
                            <div class="flex items-center">
                                <img class="h-16 w-16 mr-4" src="${imageURL}" alt="image">
                                <span class="font-semibold">${articleTitle}</span>
                            </div>
                        </td>
                        <td class="py-4">$${articlePricePerPiece.toFixed(2)}</td>
                        <td class="py-4">
                            <div class="flex items-center">
                                <span class="text-center w-8">${articleQuantity}</span>
                            </div>
                        </td>
                        <td class="py-4 text-xl font-bold">$${articleTotal.toFixed(2)}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    `;

        const summaryContainer2 = document.getElementById('summaryContainer2');
        if (summaryContainer2) {
            console.log(summaryContainer2)
            summaryContainer2.innerHTML = summaryHTML2;
            summaryContainer2.classList.remove('hidden');
        } else {
            console.error('Error: Could not find summaryContainer2 element in the DOM.');
        }
        console.log('end');
    });
});
}