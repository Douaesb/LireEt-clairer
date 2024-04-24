document.querySelectorAll('.popupBtn').forEach(button => {
    button.addEventListener('click', function() {
        showEditBookForm(button);
    });
});

function showEditBookForm(button) {
    var editBookForm = document.getElementById('editBookForm');
    var bookId = button.dataset.bookId;
    var bookPhoto = button.dataset.bookPhoto;
    var categorieId = button.dataset.categorieId;
    var bookTitre = button.dataset.bookTitre;
    var bookDescription = button.dataset.bookDescription;
    var bookPrice = button.dataset.bookPrice;
    var bookPageCount = button.dataset.bookPageCount;
    var bookAuteur = button.dataset.bookAuteur;
    var bookLangues = button.dataset.bookLangues;
    var bookPdfUrl = button.dataset.bookPdfUrl;
    editBookForm.querySelector('#bookId').value = bookId;
    var selectElement = editBookForm.querySelector('#categorie_id');
    selectElement.value = categorieId;
    editBookForm.querySelector('#bookTitre').value = bookTitre;
    editBookForm.querySelector('#bookImage').src = bookPhoto;
    console.log(" bookPhoto:", bookPhoto);
    editBookForm.querySelector('#bookDescription').value = bookDescription;
    editBookForm.querySelector('#bookPrice').value = bookPrice;
    editBookForm.querySelector('#bookPageCount').value = bookPageCount;
    editBookForm.querySelector('#bookAuteur').value = bookAuteur;
    editBookForm.querySelector('#bookLangues').value = bookLangues;
    editBookForm.querySelector('#bookPdfUrl').value = bookPdfUrl;
}

//  modifier pop up filtre

function showProductPopup(book) {
    let modal = document.getElementById('popup-modal2');
    if (modal) {
        modal.remove();
    }
    modal = document.createElement('div');
    modal.id = 'popup-modal2';
    modal.tabIndex = -1;
    modal.classList.add('overflow-y-auto', 'overflow-x-hidden', 'fixed', 'top-0', 'right-0', 'left-0', 'z-50',
        'flex',
        'justify-center', 'items-center', 'w-full', 'md:inset-0', 'h-[calc(100%-1rem)]', 'max-h-full');
    const modalWrapper = document.createElement('div');
    modalWrapper.classList.add('relative', 'p-4', 'w-full', 'max-w-md', 'max-h-full');
    const modalContent = document.createElement('div');
    modalContent.classList.add('relative', 'bg-white', 'rounded-lg', 'shadow', 'dark:bg-gray-700');
    const modalHeader = document.createElement('div');
    modalHeader.classList.add('flex', 'items-center', 'justify-between', 'p-4', 'md:p-5', 'border-b', 'rounded-t',
        'dark:border-gray-600');
    const modalTitle = document.createElement('h3');
    modalTitle.classList.add('text-lg', 'font-semibold', 'text-gray-900', 'dark:text-white');
    modalTitle.textContent = 'Modifier un livre';
    modalHeader.appendChild(modalTitle);
    const closeButton = document.createElement('button');
    closeButton.type = 'button';
    closeButton.classList.add('absolute', 'top-3', 'end-2.5', 'text-gray-400', 'bg-transparent',
        'hover:bg-gray-200', 'hover:text-gray-900', 'rounded-lg', 'text-sm', 'w-8', 'h-8', 'ms-auto',
        'inline-flex', 'justify-center', 'items-center', 'dark:hover:bg-gray-600', 'dark:hover:text-white');
    closeButton.dataset.modalHide = 'popup-modal';
    closeButton.innerHTML = `
<svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
</svg>
<span class="sr-only">Close modal</span>
`;
    closeButton.addEventListener('click', () => {
        modal.classList.add('hidden');
    });
    modalHeader.appendChild(closeButton);
    const form = document.createElement('form');
    form.classList.add('p-4', 'md:p-5');
    form.enctype = 'multipart/form-data';
    form.method = 'POST';
    form.id = 'editBookForm';
    const csrfToken = document.createElement('input');
    csrfToken.type = 'hidden';
    csrfToken.name = '_token';
    csrfToken.value = '{{ csrf_token() }}';
    form.appendChild(csrfToken);
    const methodInput = document.createElement('input');
    methodInput.type = 'hidden';
    methodInput.name = '_method';
    methodInput.value = 'put';
    form.appendChild(methodInput);
    const gridContainer = document.createElement('div');
    gridContainer.classList.add('grid', 'gap-4', 'mb-4', 'grid-cols-2');
    const fileInputSection = document.createElement('div');
    fileInputSection.classList.add('flex', 'flex-col', 'w-full', 'col-span-2');
    const fileLabel = document.createElement('label');
    fileLabel.classList.add('flex', 'flex-col', 'items-center', 'justify-center', 'border-2', 'border-gray-300',
        'border-dashed', 'rounded-lg', 'cursor-pointer', 'bg-gray-50', 'dark:hover:bg-bray-800',
        'dark:bg-gray-700', 'hover:bg-gray-100', 'dark:border-gray-600', 'dark:hover:border-gray-500',
        'dark:hover:bg-gray-600');
    const fileLabelContent = document.createElement('div');
    fileLabelContent.classList.add('flex', 'flex-col', 'items-center', 'justify-center', 'pt-5', 'pb-6');
    const bookImage = document.createElement('img');
    bookImage.id = 'bookImage';
    bookImage.src = book.photo ? book.photo : '';
    bookImage.alt = 'book Photo';
    bookImage.classList.add('w-32', 'h-32', 'mb-4');
    fileLabelContent.appendChild(bookImage);
    const uploadText = document.createElement('p');
    uploadText.classList.add('mb-2', 'text-sm', 'text-gray-500', 'dark:text-gray-400');
    uploadText.innerHTML = `<span class="font-semibold">Click to upload</span> or drag and drop`;
    fileLabelContent.appendChild(uploadText);
    const supportedFormats = document.createElement('p');
    supportedFormats.classList.add('text-xs', 'text-gray-500', 'dark:text-gray-400');
    supportedFormats.textContent = 'SVG, PNG, JPG, or GIF (MAX. 800x400px)';
    fileLabelContent.appendChild(supportedFormats);
    fileLabel.appendChild(fileLabelContent);
    const fileInput = document.createElement('input');
    fileInput.id = 'dropzone-file';
    fileInput.type = 'file';
    fileInput.accept = 'image/*';
    fileInput.classList.add('hidden');
    fileInput.name = 'photo';
    fileLabel.appendChild(fileInput);
    fileInputSection.appendChild(fileLabel);
    gridContainer.appendChild(fileInputSection);

    const categorySection = document.createElement('div');
    categorySection.classList.add('col-span-2');
    const categoryLabel = document.createElement('label');
    categoryLabel.classList.add('block', 'mb-2', 'text-sm', 'font-medium', 'text-gray-900', 'dark:text-white');
    categoryLabel.textContent = 'Categorie';
    categorySection.appendChild(categoryLabel);
    const categorySelect = document.createElement('select');
    categorySelect.id = 'categorie_id';
    categorySelect.name = 'categorie_id';
    categorySelect.classList.add('bg-gray-50', 'border', 'border-gray-300', 'text-gray-900', 'text-sm',
        'rounded-lg', 'focus:ring-primary-500', 'focus:border-primary-500', 'block', 'w-full', 'p-2.5',
        'dark:bg-gray-600', 'dark:border-gray-500', 'dark:placeholder-gray-400', 'dark:text-white',
        'dark:focus:ring-primary-500', 'dark:focus:border-primary-500');
    const defaultOption = document.createElement('option');
    defaultOption.value = '';
    defaultOption.textContent = 'Select category';
    categorySelect.appendChild(defaultOption);
    categories.forEach(category => {
        const option = document.createElement('option');
        option.value = category.id;
        option.textContent = category.name;
        categorySelect.appendChild(option);
    });
    categorySelect.value = book.categorie_id;
    categorySection.appendChild(categorySelect);
    gridContainer.appendChild(categorySection);


    const bookIdInput = document.createElement('input');
    bookIdInput.type = 'hidden';
    bookIdInput.id = 'bookId';
    bookIdInput.name = 'id';
    bookIdInput.value = book.id;
    gridContainer.appendChild(bookIdInput);
    const titleSection = document.createElement('div');
    titleSection.classList.add('col-span-2');
    const titleLabel = document.createElement('label');
    titleLabel.classList.add('block', 'mb-2', 'text-sm', 'font-medium', 'text-gray-900', 'dark:text-white');
    titleLabel.textContent = 'Titre';
    titleSection.appendChild(titleLabel);
    const titleInput = document.createElement('input');
    titleInput.type = 'text';
    titleInput.name = 'titre';
    titleInput.id = 'bookTitre';
    titleInput.value = book.titre;
    titleInput.classList.add('bg-gray-50', 'border', 'border-gray-300', 'text-gray-900', 'text-sm', 'rounded-lg',
        'focus:ring-primary-600', 'focus:border-primary-600', 'block', 'w-full', 'p-2.5', 'dark:bg-gray-600',
        'dark:border-gray-500', 'dark:placeholder-gray-400', 'dark:text-white', 'dark:focus:ring-primary-500',
        'dark:focus:border-primary-500');
    titleInput.placeholder = 'Enter the title of the book';
    titleInput.required = true;
    titleSection.appendChild(titleInput);
    gridContainer.appendChild(titleSection);
    const descriptionSection = document.createElement('div');
    descriptionSection.classList.add('col-span-2');
    const descriptionLabel = document.createElement('label');
    descriptionLabel.classList.add('block', 'mb-2', 'text-sm', 'font-medium', 'text-gray-900', 'dark:text-white');
    descriptionLabel.textContent = 'Description';
    descriptionSection.appendChild(descriptionLabel);
    const descriptionInput = document.createElement('textarea');
    descriptionInput.name = 'description';
    descriptionInput.id = 'bookDescription';
    descriptionInput.rows = 4;
    descriptionInput.classList.add('block', 'p-2.5', 'w-full', 'text-sm', 'text-gray-900', 'bg-gray-50',
        'rounded-lg', 'border', 'border-gray-300', 'focus:ring-blue-500', 'focus:border-blue-500',
        'dark:bg-gray-600', 'dark:border-gray-500', 'dark:placeholder-gray-400', 'dark:text-white',
        'dark:focus:ring-blue-500', 'dark:focus:border-blue-500');
    descriptionInput.placeholder = 'write description here';
    descriptionInput.value = book.description;
    descriptionSection.appendChild(descriptionInput);
    gridContainer.appendChild(descriptionSection);
    const priceSection = document.createElement('div');
    priceSection.classList.add('col-span-2');
    const priceLabel = document.createElement('label');
    priceLabel.classList.add('block', 'mb-2', 'text-sm', 'font-medium', 'text-gray-900', 'dark:text-white');
    priceLabel.textContent = 'Price';
    priceSection.appendChild(priceLabel);
    const priceInput = document.createElement('input');
    priceInput.type = 'text';
    priceInput.name = 'price';
    priceInput.id = 'bookPrice';
    priceInput.value = book.price;
    priceInput.classList.add('bg-gray-50', 'border', 'border-gray-300', 'text-gray-900', 'text-sm', 'rounded-lg',
        'focus:ring-primary-600', 'focus:border-primary-600', 'block', 'w-full', 'p-2.5', 'dark:bg-gray-600',
        'dark:border-gray-500', 'dark:placeholder-gray-400', 'dark:text-white', 'dark:focus:ring-primary-500',
        'dark:focus:border-primary-500');
    priceInput.placeholder = 'price';
    priceInput.required = true;
    priceSection.appendChild(priceInput);
    gridContainer.appendChild(priceSection);
    form.appendChild(gridContainer);
    const submitButton = document.createElement('button');
    submitButton.type = 'submit';
    submitButton.classList.add('mt-2', 'text-white', 'inline-flex', 'items-center', 'bg-yellow-900', 'focus:ring-4',
        'focus:outline-none', 'focus:ring-blue-300', 'font-medium', 'rounded-lg', 'text-sm', 'px-5', 'py-2.5',
        'text-center', 'dark:bg-blue-600', 'dark:hover:bg-blue-700', 'dark:focus:ring-blue-800');
    submitButton.textContent = 'Modifier';
    form.appendChild(submitButton);
    modalContent.appendChild(modalHeader);
    modalContent.appendChild(form);
    modalWrapper.appendChild(modalContent);
    modal.appendChild(modalWrapper);
    document.body.appendChild(modal);
}




