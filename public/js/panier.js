    const panier = document.getElementById('panier');
    const panierBtn = document.getElementById('panierBtn');

    panierBtn.addEventListener('click', function() {
        panier.classList.add('hidden');
    })
    basket.addEventListener('click', function() {
        panier.classList.remove('hidden');
    })
    const articlesCountElement = document.querySelector('.articlesCount');

    let articlesCount = document.querySelector('.articlesCount').innerText;
    console.log('articles Count at first', articlesCount)

    function updateTotalAndTotalCost() {
        let totalCost = 0;
        document.querySelectorAll('#panier li').forEach(listItem => {
            const quantitySpan = listItem.querySelector('.quantity-value');
            const pricePerPieceSpan = listItem.querySelector('.article-price');
            if (!quantitySpan || !pricePerPieceSpan) {
                console.error('Missing quantity or price element in list item.');
                return;
            }
            const quantity = parseInt(quantitySpan.textContent, 10);
            const pricePerPiece = parseFloat(pricePerPieceSpan.textContent.trim().replace('$', ''));
            console.log(quantity);
            console.log(pricePerPiece);

            if (isNaN(quantity) || isNaN(pricePerPiece)) {
                console.error('Invalid quantity or price value in list item.');
                return;
            }
            const totalForArticle = quantity * pricePerPiece;
            console.log(totalForArticle);
            listItem.querySelector('.total-quantity').textContent = `Total: ${totalForArticle.toFixed(2)} $`;
            totalCost += totalForArticle;
            console.log(totalCost);

        });
        document.querySelector('.total-cost').textContent = `${totalCost.toFixed(2)}$`;
    }
    document.querySelectorAll('.quantity-increase, .quantity-decrease').forEach(button => {
        button.addEventListener('click', function() {
            const listItem = this.closest('li');
            const commandeId = listItem.getAttribute('data-commande-id');
            const quantitySpan = listItem.querySelector('.quantity-value');
            console.log(commandeId);
            let quantity = parseInt(quantitySpan.textContent);
            if (this.classList.contains('quantity-increase')) {
                if (quantity < 10) {
                    quantity++;
                }
            } else if (this.classList.contains('quantity-decrease')) {
                quantity--;
                if (quantity === 0) {
                    listItem.remove();
                    articlesCount--;
                    articlesCountElement.textContent = articlesCount;
                    console.log('articles Count after --0', articlesCount)

                }
            }
            quantitySpan.textContent = quantity;
            fetch('/basket/update', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                            .getAttribute('content')
                    },
                    body: JSON.stringify({
                        commande_id: commandeId,
                        quantity: quantity
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        updateTotalAndTotalCost();
                    } else {
                        console.error('Error updating quantity:', data.error);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        });
    });
    updateTotalAndTotalCost();

    document.querySelectorAll('.removeArticle').forEach(button => {
        button.addEventListener('click', function() {
            event.preventDefault();
            const listItem = this.closest('li');
            const commandeId = listItem.getAttribute('data-commande-id');
            fetch('/basket/remove', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                            .getAttribute('content')
                    },
                    body: JSON.stringify({
                        commande_id: commandeId
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        listItem.remove();
                        articlesCount--;
                        articlesCountElement.textContent = articlesCount;
                        console.log('articles Count after remove', articlesCount)

                        updateTotalAndTotalCost();
                    } else {
                        console.error('Error removing article:', data.error);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        });
    });

    document.querySelector('.checkoutButton').addEventListener('click', function(event) {
        event.preventDefault();
        const orderSummaryBody = document.getElementById('orderSummaryBody');
        const totalCost = document.querySelector('total-cost');
        if (orderSummaryBody) {
            const articles = document.querySelectorAll('#panier li');
            let tableHTML = `
            <div class="bg-white rounded-lg shadow-md p-6 mb-4">
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
        `;

            let totalCost = 0;

            articles.forEach(article => {
                const articleTitle = article.querySelector('h3 a').textContent;
                const articleQuantity = parseInt(article.querySelector('.quantity-value').textContent);
                const articlePrice = parseFloat(article.querySelector('.article-price').textContent
                    .trim().replace('$', ''));
                const articleTotal = articleQuantity * articlePrice;
                totalCost += articleTotal;
                const imageElement = article.querySelector('.picture img');
                // console.log(imageElement);
                let imageURL = '';
                if (imageElement) {
                    imageURL = imageElement.src;
                }

                tableHTML += `
                <tr>
                    <td class="py-4">
                        <div class="flex items-center">
                            <img class="h-16 w-16 mr-4" src="${imageURL}" alt="image">
                            <span class="font-semibold">${articleTitle}</span>
                        </div>
                    </td>
                    <td class="py-4">$${articlePrice.toFixed(2)}</td>
                    <td class="py-4">
                        <div class="flex items-center">
                            <span class="text-center w-8">${articleQuantity}</span>
                        </div>
                        <td class="py-4">$${articleTotal.toFixed(2)}</td>
                    </td>
                </tr>
            `;
            });

            tableHTML += `
                    </tbody>
                </table>
                <div class="flex justify-end items-end mr-8">
                    <p class=" text-xl font-bold">Total : </p>
                    
                    <p class=" text-xl font-bold ml-4"> ${totalCost}$</p>
</div>
            </div>
        `;

            orderSummaryBody.innerHTML = tableHTML;
        } else {
            console.error('Error: Could not find orderSummaryBody element in the DOM.');
        }
    });


    document.querySelector('.finalise').addEventListener('click', function(event) {
        event.preventDefault();
        initiatePayPalPayment();
    });
    document.querySelector('.finalize').addEventListener('click', function(event) {
        event.preventDefault();
        initiatePayPalPayment();
    });
    document.querySelector('.final').addEventListener('click', function(event) {
        event.preventDefault();
        initiatePayPalPayment();
    });

    function initiatePayPalPayment() {
        fetch('/payment/initialize', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    console.log('paypal')
                    window.location.href = data.paypal_approval_url;
                } else {
                    console.error('Error initiating payment:', data.error);
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
    }

