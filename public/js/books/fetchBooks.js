// fetch books display in filtre 

let currentPage = 1;

function fetchBooks(categoryId, page = 1) {
    fetch(`/filter-books/${categoryId}?page=${page}`)
        .then(response => response.json())
        .then(data => {
                const booksContainer = document.querySelector('.books');
                booksContainer.innerHTML = '';
                var userRole = null;
                var userAuth = null;


                userAuth = "{{ auth()->check() }}";
                data.books.data.forEach(book => {
                    const bookCard = document.createElement('div');
                    bookCard.classList.add('card', 'shadow-lg', 'flex', 'flex-col', 'w-4/5',
                        'article-container',
                        'justify-center', 'items-center', 'pb-4', 'gap-4');
                    bookCard.innerHTML = `
            <div class="picture bg-slate-100 w-full flex justify-center">
                ${book.photo ? `<img src="${book.photo}" alt="Book Image">` : '<p>No Image Available</p>'}
            </div>
            <div class="w-11/12 gap-3 flex flex-col">
                <div class="flex justify-between px-2">
                    <h3 class="article-title text-3xl font-semibold font-[cardo] text-yellow-900">${book.titre}</h3>
                    <span class="article-price text-2xl font-semibold font-[cardp] text-amber-300 text-center"><span>${book.price}</span>$</span>
                </div>
                <p class="text-slate-400 text-lg p-2">${book.description.slice(0, 150)}...</p>
                <div class="flex gap-2">
                    <div class="w-4 h-4 bg-amber-400 rounded-full mt-1"></div>
                    <div class="font-semibold font-[cardo] text-yellow-900 text-center text-xl">
                        ${book.page_count ? `${book.page_count} pages` : ''}
                    </div>
                </div>
                <div class="flex justify-between">
                    ${book.pdf_url ? `
                                    <a href="${book.pdf_url}" class="border-2 border-amber-300 px-8 p-2 w-fit" download>
                                        Download PDF
                                    </a>
                                ` : `
                                    <form method="post" action="{{ route('basket.add') }}">
                                        @csrf
                                        <input type="hidden" name="article_id" value="${book.id}">
                                        <input type="number" name="quantity" value="1" min="1" class="quantity-input w-[50px] border-yellow-900">
                                        <button type="submit" class="border-2 border-amber-300 px-8 p-2 w-fit" onclick="Swal.fire({
                                            icon: 'success',
                                            title: 'Added to cart successfully',
                                            showConfirmButton: false,
                                            timer: 1500
                                        });">Add to cart</button>
                                    </form>
                                `}
                </div>
                <a href="{{ url('books') }}/${book.id}" class="flex">
                    <svg width="28px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path d="M15.0007 12C15.0007 13.6569 13.6576 15 12.0007 15C10.3439 15 9.00073 13.6569 9.00073 12C9.00073 10.3431 10.3439 9 12.0007 9C13.6576 9 15.0007 10.3431 15.0007 12Z"
                            stroke="#fbbf24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path d="M12.0012 5C7.52354 5 3.73326 7.94288 2.45898 12C3.73324 16.0571 7.52354 19 12.0012 19C16.4788 19 20.2691 16.0571 21.5434 12C20.2691 7.94291 16.4788 5 12.0012 5Z"
                            stroke="#fbbf24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                    <span class="mt-2 ml-1 text-amber-400 underline">View more</span>
                </a>
            </div>
        `;
                    const hr = document.createElement('hr');
                    hr.classList.add('flex', 'justify-self-center', 'border-yellow-900', 'mt-2',
                        'w-[200px]');
                    if (userRole == 'admin') {

                        bookCard.appendChild(hr);
                    }
                    const buttonContainer = document.createElement('div');
                    buttonContainer.classList.add('flex', 'justify-between', 'gap-3', 'w-1/5');


                    const popupButton = document.createElement('button');
                    popupButton.classList.add('popupBtn');
                    popupButton.dataset.modalTarget = 'popup-modal';
                    popupButton.dataset.modalToggle = 'popup-modal';
                    popupButton.type = 'button';
                    popupButton.dataset.bookId = book.id;
                    popupButton.dataset.bookPhoto = book.photo;
                    popupButton.dataset.categorieId = book.categorie_id;
                    popupButton.dataset.bookTitre = book.titre;
                    popupButton.dataset.bookDescription = book.description;
                    popupButton.dataset.bookPrice = book.price;
                    popupButton.innerHTML = `<svg width="25px"
                                viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                </g>
                                <g id="SVGRepo_iconCarrier">
                                    <path
                                        d="M21.2799 6.40005L11.7399 15.94C10.7899 16.89 7.96987 17.33 7.33987 16.7C6.70987 16.07 7.13987 13.25 8.08987 12.3L17.6399 2.75002C17.8754 2.49308 18.1605 2.28654 18.4781 2.14284C18.7956 1.99914 19.139 1.92124 19.4875 1.9139C19.8359 1.90657 20.1823 1.96991 20.5056 2.10012C20.8289 2.23033 21.1225 2.42473 21.3686 2.67153C21.6147 2.91833 21.8083 3.21243 21.9376 3.53609C22.0669 3.85976 22.1294 4.20626 22.1211 4.55471C22.1128 4.90316 22.0339 5.24635 21.8894 5.5635C21.7448 5.88065 21.5375 6.16524 21.2799 6.40005V6.40005Z"
                                        stroke="#fbbf24" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                    <path
                                        d="M11 4H6C4.93913 4 3.92178 4.42142 3.17163 5.17157C2.42149 5.92172 2 6.93913 2 8V18C2 19.0609 2.42149 20.0783 3.17163 20.8284C3.92178 21.5786 4.93913 22 6 22H17C19.21 22 20 20.2 20 18V13"
                                        stroke="#fbbf24" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                </g>
                            </svg>`;


                    const deleteForm = document.createElement('form');
                    deleteForm.action = `{{ route('accessoires.delete', ':bookId') }}`.replace(':bookId',
                        book.id);
                    deleteForm.method = 'POST';

                    const csrfToken = document.createElement('input');
                    csrfToken.type = 'hidden';
                    csrfToken.name = '_token';
                    csrfToken.value = '{{ csrf_token() }}';

                    const deleteMethod = document.createElement('input');
                    deleteMethod.type = 'hidden';
                    deleteMethod.name = '_method';
                    deleteMethod.value = 'delete';

                    const deleteButton = document.createElement('button');
                    deleteButton.type = 'submit';
                    deleteButton.innerHTML = `<svg width="32px" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                        stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path d="M10 12V17" stroke="#713f12" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M14 12V17" stroke="#713f12" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M4 7H20" stroke="#713f12" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path
                                            d="M6 10V18C6 19.6569 7.34315 21 9 21H15C16.6569 21 18 19.6569 18 18V10"
                                            stroke="#713f12" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round"></path>
                                        <path
                                            d="M9 5C9 3.89543 9.89543 3 11 3H13C14.1046 3 15 3.89543 15 5V7H9V5Z"
                                            stroke="#713f12" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round"></path>
                                    </g>
                                </svg>`;


                    deleteForm.appendChild(csrfToken);
                    deleteForm.appendChild(deleteMethod);
                    deleteForm.appendChild(deleteButton);

                    buttonContainer.appendChild(popupButton);
                    buttonContainer.appendChild(deleteForm);

                    if (userRole == 'admin') {

                        bookCard.appendChild(buttonContainer);
                    }
                    const popupBtn = bookCard.querySelector('.popupBtn');
                    if (popupBtn) {
                        popupBtn.addEventListener('click', () => {
                            showProductPopup(book);
                        });
                    }
                    const buyNowButton = document.createElement('button');

                    buyNowButton.classList.add('buyOneButtonA', 'text-yellow-900', 'font-bold', 'text-lg',
                        'bg-amber-300', 'rounded-lg', 'px-8', 'p-2', 'flex');
                    buyNowButton.dataset.modalTarget = 'progress-modal';
                    buyNowButton.dataset.modalToggle = 'progress-modal';
                    buyNowButton.type = 'button';

                    buyNowButton.innerHTML = `
                    <svg width="25px" height="30px" viewBox="-23 0 302 302" version="1.1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                preserveAspectRatio="xMidYMid" fill="#000000">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <g>
                                        <path
                                            d="M217.168476,23.5070146 C203.234077,7.62479651 178.045612,0.815753338 145.823355,0.815753338 L52.3030619,0.815753338 C45.7104431,0.815753338 40.1083819,5.6103852 39.0762042,12.1114399 L0.136468302,259.076601 C-0.637664968,263.946149 3.13311322,268.357876 8.06925331,268.357876 L65.804612,268.357876 L80.3050438,176.385849 L79.8555471,179.265958 C80.8877248,172.764903 86.4481659,167.970272 93.0324607,167.970272 L120.46841,167.970272 C174.366398,167.970272 216.569147,146.078116 228.897012,82.7490197 C229.263268,80.8761167 229.579581,79.0531577 229.854273,77.2718188 C228.297683,76.4477414 228.297683,76.4477414 229.854273,77.2718188 C233.525163,53.8646924 229.829301,37.9325302 217.168476,23.5070146"
                                            fill="#002c8a"> </path>
                                        <path
                                            d="M102.396976,68.8395929 C103.936919,68.1070797 105.651665,67.699203 107.449652,67.699203 L180.767565,67.699203 C189.449511,67.699203 197.548776,68.265236 204.948824,69.4555699 C207.071448,69.7968545 209.127479,70.1880831 211.125242,70.6375799 C213.123006,71.0787526 215.062501,71.5781934 216.943728,72.1275783 C217.884341,72.4022708 218.808307,72.6852872 219.715624,72.9849517 C223.353218,74.2002577 226.741092,75.61534 229.854273,77.2718188 C233.525163,53.8563683 229.829301,37.9325302 217.168476,23.5070146 C203.225753,7.62479651 178.045612,0.815753338 145.823355,0.815753338 L52.2947379,0.815753338 C45.7104431,0.815753338 40.1083819,5.6103852 39.0762042,12.1114399 L0.136468302,259.068277 C-0.637664968,263.946149 3.13311322,268.349552 8.0609293,268.349552 L65.804612,268.349552 L95.8875974,77.5798073 C96.5035744,73.6675208 99.0174265,70.4627756 102.396976,68.8395929 Z"
                                            fill="#002c8a"> </path>
                                        <path
                                            d="M228.897012,82.7490197 C216.569147,146.069792 174.366398,167.970272 120.46841,167.970272 L93.0241367,167.970272 C86.4398419,167.970272 80.8794007,172.764903 79.8555471,179.265958 L61.8174095,293.621258 C61.1431644,297.883153 64.4394738,301.745495 68.7513129,301.745495 L117.421821,301.745495 C123.182038,301.745495 128.084882,297.550192 128.983876,291.864891 L129.458344,289.384335 L138.631407,231.249423 L139.222412,228.036354 C140.121406,222.351053 145.02425,218.15575 150.784467,218.15575 L158.067979,218.15575 C205.215193,218.15575 242.132193,199.002194 252.920115,143.605884 C257.423406,120.456802 255.092683,101.128442 243.181019,87.5519756 C239.568397,83.4399129 235.081754,80.0437153 229.854273,77.2718188 C229.571257,79.0614817 229.263268,80.8761167 228.897012,82.7490197 L228.897012,82.7490197 Z"
                                            fill="#009be1"> </path>
                                        <path
                                            d="M216.952052,72.1275783 C215.070825,71.5781934 213.13133,71.0787526 211.133566,70.6375799 C209.135803,70.1964071 207.071448,69.8051785 204.957148,69.4638939 C197.548776,68.265236 189.457835,67.699203 180.767565,67.699203 L107.457976,67.699203 C105.651665,67.699203 103.936919,68.1070797 102.4053,68.8479169 C99.0174265,70.4710996 96.5118984,73.6675208 95.8959214,77.5881313 L80.3133678,176.385849 L79.8638711,179.265958 C80.8877248,172.764903 86.4481659,167.970272 93.0324607,167.970272 L120.476734,167.970272 C174.374722,167.970272 216.577471,146.078116 228.905336,82.7490197 C229.271592,80.8761167 229.579581,79.0614817 229.862597,77.2718188 C226.741092,75.623664 223.361542,74.2002577 219.723948,72.9932757 C218.816631,72.6936112 217.892665,72.4022708 216.952052,72.1275783"
                                            fill="#001f6b"> </path>
                                    </g>
                                </g>
                            </svg> buy now `;
                    if (userAuth) {
                        bookCard.appendChild(buyNowButton);
                    }
                    const popupBtnA = bookCard.querySelector('.buyOneButtonA');
                    const progress = document.querySelector('.progress');
                    const hideModal = document.querySelector('.hideModal');


                    if (popupBtnA) {
                        popupBtnA.addEventListener('click', () => {
                            initializeBuyNowPopUp();
                            progress.classList.remove('hidden');
                        });
                    }

                    hideModal.addEventListener('click', () => {
                            progress.classList.add('hidden');
                        });
                    booksContainer.appendChild(bookCard);
                });

                    // 
                    const paginationContainer = document.querySelector('.pagination'); paginationContainer
                    .innerHTML = '';
                    if (data.books.prev_page_url) {
                        const prevButton = document.createElement('button');
                        prevButton.textContent = 'Previous';
                        prevButton.innerHTML = `
        <div class="flex text-center text-yellow-900 text-xl font-bold font-[inter]">
        <svg width="30px" fill="#FFCA42" viewBox="0 0 32 32" version="1.1"
                    xmlns="http://www.w3.org/2000/svg" stroke="#FFCA42" transform="rotate(180)">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <path
                            d="M8.489 31.975c-0.271 0-0.549-0.107-0.757-0.316-0.417-0.417-0.417-1.098 0-1.515l14.258-14.264-14.050-14.050c-0.417-0.417-0.417-1.098 0-1.515s1.098-0.417 1.515 0l14.807 14.807c0.417 0.417 0.417 1.098 0 1.515l-15.015 15.022c-0.208 0.208-0.486 0.316-0.757 0.316z">
                        </path>
                    </g>
                </svg>
            Previous

</div>
                `;
                        prevButton.addEventListener('click', () => {
                            currentPage--;
                            fetchBooks(categoryId, currentPage);
                        });
                        paginationContainer.appendChild(prevButton);
                    }

                    if (data.books.next_page_url) {
                        const nextButton = document.createElement('button');
                        nextButton.textContent = 'Next';
                        nextButton.innerHTML = `
        <div class="flex text-center text-yellow-900 text-xl font-bold font-[inter]">
            Next

        <svg width="30px" fill="#FFCA42" viewBox="0 0 32 32" version="1.1"
                    xmlns="http://www.w3.org/2000/svg" stroke="#FFCA42">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <path
                            d="M8.489 31.975c-0.271 0-0.549-0.107-0.757-0.316-0.417-0.417-0.417-1.098 0-1.515l14.258-14.264-14.050-14.050c-0.417-0.417-0.417-1.098 0-1.515s1.098-0.417 1.515 0l14.807 14.807c0.417 0.417 0.417 1.098 0 1.515l-15.015 15.022c-0.208 0.208-0.486 0.316-0.757 0.316z">
                        </path>
                    </g>
                </svg>
                </div>`
                        nextButton.addEventListener('click', () => {
                            currentPage++;
                            fetchBooks(categoryId, currentPage);
                        });
                        paginationContainer.appendChild(nextButton);
                    }
                })
            .catch(error => console.error('Error fetching books:', error));
        }

        // filtre books 
        document.querySelectorAll('.category-button, #all-category').forEach(button => {
            button.addEventListener('click', function() {
                let categoryId = this.id === 'all-category' ? 'all' : this.id.split('-')[1];
                currentPage = 1;
                fetchBooks(categoryId, currentPage);
            });
        });