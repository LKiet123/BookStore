const suggest = document.querySelector('.suggest');
const input = document.querySelector('.input-search');
let debounceTimer = null;

input.addEventListener('input', function () {
    clearTimeout(debounceTimer);
    suggest.innerHTML = '';
    debounceTimer = setTimeout(() => {
        suggestSearch(this.value);
    }, 300);
});

function test() {
    console.log('test');
}

async function suggestSearch(keyword) {
    if (keyword != '') {
        const url = `/api/index/search/${keyword}`;

        const request = await fetch(url);
        const result = await request.json();
        result.forEach(element => {
            const li = document.createElement('li');
            li.classList.add('list-group-item', 'd-flex', 'flex-row', 'justify-content-between', 'row');
            li.innerHTML = `<a style="text-decoration:none; color:black" href='/itemDetail/${element.book_id}' class="col-2">
                                <img src="uploads/${element.cover_image}" alt="" width="50" height="50">
                            </div>
                            <div class="col-10">
                                <h5 class="mb-1">${element.title}</h5>
                                <p class="mb-1">${element.author ? element.author.author_name : 'Unknown'}</p>
                                <small>Price: ${element.price}</small>
                            </a>`;
            suggest.append(li);
        });
    }
    var instance = new Mark(suggest);
    instance.mark(keyword);
}

document.addEventListener("DOMContentLoaded", function () {
    let index = 0;
    const slides = document.querySelectorAll(".nav-slide");
    const slidesContainer = document.querySelector(".nav-slides");
    const totalSlides = slides.length;
    function autoSlide() {
        index = (index + 1) % totalSlides;
        slidesContainer.style.transform = `translateX(-${index * 100}vw)`;
    }
    setInterval(autoSlide, 3000);
});

async function getCategoryByID(category_id) {
    const bookList = document.getElementById('book-list');
    const url = `/api/index/category/${category_id}`;
    const res = await fetch(url);
    const result = await res.json();

    if (res.ok) {
        bookList.innerHTML = '';
        let string = '';
        for (let i = 0; i < result.books.length; i++) {
            const book = result.books[i];
            let categoryBadges = '';
            for (let j = 0; j < book.categories.length; j++) {
                categoryBadges += `<span class="badge bg-secondary me-1">${book.categories[j].category_name}</span>`;
            }

            string += `<div class="card" style="animation-delay:${0.2 * i}s">
            <a href="/itemDetail/${book.book_id}" style="text-decoration: none;">
                            <img src="uploads/${book.cover_image}"
                                alt="" width="150" height="200" />
                            <h3>${book.title}</h3>
                            <p class="author">${book.author ? book.author.author_name : 'Unknown'}</p>
                            <div class="categories my-2">
                                ${categoryBadges}
                            </div>
                            <div class="summary">
                                <p>${book.summary}</p>
                            </div>
                            <div class="price-row">
                                <span>Giá ebook</span>
                                <span class="price">${book.price}<sup>₫</sup></span>
                            </div>
                            <div class="price-row">
                                <span>Ngày Xuất Bản : ${book.published_date}</span>
                            </div>
                            </a>
                            <button class="add-to-cart" data-book-id="${book.book_id}">Add to Cart</button>
                        </div>`;
        };
        bookList.innerHTML = string;
        attachAddCartListeners();
        document.querySelector('.pagination').style.display = 'none';
    }
}

document.addEventListener('DOMContentLoaded', function () {
    getAllBooks();
});

document.addEventListener('DOMContentLoaded', function () {
    const track = document.getElementById('wishlist-carousel-track');
    const leftBtn = document.getElementById('wishlist-left');
    const rightBtn = document.getElementById('wishlist-right');
    const cards = track.querySelectorAll('.card');
    const visibleCount = 4;
    let currentIndex = 0;

    function updateCarousel() {
        const cardWidth = cards[0].offsetWidth + 20; // card + margin
        track.style.transform = `translateX(-${currentIndex * cardWidth}px)`;
        leftBtn.disabled = currentIndex === 0;
        rightBtn.disabled = currentIndex > cards.length - visibleCount - 0.5;
    }

    leftBtn.addEventListener('click', function () {
        if (currentIndex > 0) {
            currentIndex--;
            updateCarousel();
        }
    });

    rightBtn.addEventListener('click', function () {
        if (currentIndex < cards.length - visibleCount) {
            currentIndex++;
            updateCarousel();
        }
    });

    updateCarousel();
});

async function getAllBooks(page = 1) {
    const bookList = document.getElementById('book-list');
    const url = `/api/index/all-books?page=${page}`;
    const res = await fetch(url);
    const result = await res.json();

    bookList.innerHTML = '';
    let string = '';
    for (let i = 0; i < result.data.length; i++) {
        const book = result.data[i];

        let categoryBadges = '';
        if (book.categories && book.categories.length > 0) {
            for (let j = 0; j < book.categories.length; j++) {
                categoryBadges += `<span class="badge bg-secondary me-1">${book.categories[j].category_name}</span>`;
            }
        }

        string += `<div class="card" style="animation-delay:${0.2 * i}s">
        <a href="/itemDetail/${book.book_id}" style="text-decoration: none">
            <img src="uploads/${book.cover_image}"
                alt="" width="150" height="200" />
            <h3>${book.title}</h3>
            <p class="author">${book.author ? book.author.author_name : 'Unknown'}</p>
            <div class="categories my-2">
                ${categoryBadges}
            </div>
            <div class="summary">
                <p>${book.summary}</p>
            </div>
            <div class="price-row">
                <span>Giá ebook</span>
                <span class="price">${book.price}<sup>₫</sup></span>
            </div>
            <div class="price-row">
                <span>Ngày Xuất Bản : ${book.published_date}</span>
            </div>
            </a>
            <button class="add-to-cart" data-book-id="${book.book_id}">Add to Cart</button>
        </div>`;
    }
    bookList.innerHTML = string;
    attachAddCartListeners();
    renderPagination('getAllBooks', result);
}

async function getBooksByDate(page = 1) {

    const bookList = document.getElementById('book-list');
    const url = `/api/index/books-by-date?page=${page}`;
    const res = await fetch(url);
    const result = await res.json();

    bookList.innerHTML = '';
    let string = '';
    for (let i = 0; i < result.data.length; i++) {
        const book = result.data[i];

        let categoryBadges = '';
        if (book.categories && book.categories.length > 0) {
            for (let j = 0; j < book.categories.length; j++) {
                categoryBadges += `<span class="badge bg-secondary me-1">${book.categories[j].category_name}</span>`;
            }
        }

        string += `<div class="card" style="animation-delay:${0.2 * i}s">
        <a href="/itemDetail/${book.book_id}" style="text-decoration: none">
            <img src="uploads/${book.cover_image}"
                alt="" width="150" height="200" />
            <h3>${book.title}</h3>
            <p class="author">${book.author ? book.author.author_name : 'Unknown'}</p>
            <div class="categories my-2">
                ${categoryBadges}
            </div>
            <div class="summary">
                <p>${book.summary}</p>
            </div>
            <div class="price-row">
                <span>Giá ebook</span>
                <span class="price">${book.price}<sup>₫</sup></span>
            </div>
            <div class="price-row">
                <span>Ngày Xuất Bản : ${book.published_date}</span>
            </div>
            </a>
            <button class="add-to-cart" data-book-id="${book.book_id}">Add to Cart</button>
        </div>`
            ;
    }
    bookList.innerHTML = string;
    attachAddCartListeners();
    renderPagination('getBooksByDate', result);
}

async function getBooksBySold(page = 1) {
    const bookList = document.getElementById('book-list');
    const url = `/api/index/books-by-sold?page=${page}`;
    const res = await fetch(url);
    const result = await res.json();

    bookList.innerHTML = '';
    let string = '';
    for (let i = 0; i < result.data.length; i++) {
        const book = result.data[i];

        let categoryBadges = '';
        if (book.categories && book.categories.length > 0) {
            for (let j = 0; j < book.categories.length; j++) {
                categoryBadges += `<span class="badge bg-secondary me-1">${book.categories[j].category_name}</span>`;
            }
        }

        string += `<div class="card" style="animation-delay:${0.2 * i}s">
        <a href="/itemDetail/${book.book_id}" style="text-decoration: none">
            <img src="uploads/${book.cover_image}"
                alt="" width="150" height="200" />
            <h3>${book.title}</h3>
            <p class="author">${book.author ? book.author.author_name : 'Unknown'}</p>
            <div class="categories my-2">
                ${categoryBadges}
            </div>
            <div class="summary">
                <p>${book.summary}</p>
            </div>
            <div class="price-row">
                <span>Giá ebook</span>
                <span class="price">${book.price}<sup>₫</sup></span>
            </div>
            <div class="price-row">
                <span>Đã bán : ${book.volume_sold}</span>
            </div>
            </a>
            <button class="add-to-cart" data-book-id="${book.book_id}">Add to Cart</button>
        </div>`
            ;
    }
    bookList.innerHTML = string;
    attachAddCartListeners();
    renderPagination('getBooksBySold', result);
}


function renderPagination(fn, result) {
    let pagination = document.querySelector('.dynamic-paginate');
    if (!pagination) {
        pagination = document.createElement('nav');
        pagination.className = 'dynamic-paginate mt-5 mx-auto';
        document.getElementById('book-list').after(pagination);
    }
    let html = `<ul class="pagination justify-content-center">`;

    // Previous button
    if (result.prev_page_url) {
        html += `<li class="page-item">
                    <button class="page-link" onclick="${fn}(${result.current_page - 1})">&laquo; Previous</button>
                 </li>`;
    } else {
        html += `<li class="page-item disabled">
                    <span class="page-link">&laquo; Previous</span>
                 </li>`;
    }

    // Page numbers (show up to 5 pages around current)
    let start = Math.max(1, result.current_page - 2);
    let end = Math.min(result.last_page, result.current_page + 2);
    for (let i = start; i <= end; i++) {
        if (i === result.current_page) {
            html += `<li class="page-item active"><span class="page-link">${i}</span></li>`;
        } else {
            html += `<li class="page-item"><button class="page-link" onclick="${fn}(${i})">${i}</button></li>`;
        }
    }

    // Next button
    if (result.next_page_url) {
        html += `<li class="page-item">
                    <button class="page-link" onclick="${fn}(${result.current_page + 1})">Next &raquo;</button>
                 </li>`;
    } else {
        html += `<li class="page-item disabled">
                    <span class="page-link">Next &raquo;</span>
                 </li>`;
    }

    html += `</ul>`;
    pagination.innerHTML = html;
}

async function loadVouchers(page = 1) {
    const container = document.getElementById('voucher-container');
    const pagination = document.getElementById('voucher-pagination');
    if (!container) return;
    const res = await fetch(`/api/vouchers?page=${page}`);
    const result = await res.json();
    showVoucherLoading(result.data.length);
    setTimeout(() => {
        let html = '';
        result.data.forEach(voucher => {
            html += `
        <div class="col-md-4">
            <div class="voucher-card shadow-sm p-4 rounded-4 position-relative"
                style="background: linear-gradient(120deg, #fceabb 0%, #f8b500 100%); min-height: 180px;">
                <div class="d-flex align-items-center mb-2">
                    <span class="badge bg-danger me-2" style="font-size: 1.1rem;">${voucher.discount_amount * 100}% OFF</span>
                </div>
                <div class="mb-2">
                    <span class="text-dark">Mã: </span>
                    <span class="fw-bold text-primary" style="font-size: 1.1rem;">${voucher.coupon_code}</span>
                    <button class="btn btn-sm btn-outline-primary ms-2"
                        onclick="navigator.clipboard.writeText('${voucher.coupon_code}')">Copy</button>
                </div>
                <div class="mb-2">
                    <i class="far fa-calendar-alt"></i>
                    <span class="text-dark">Hiệu lực: ${voucher.valid_from} - ${voucher.valid_to}</span>
                </div>
            </div>
        </div>
        `;
        });
        container.innerHTML = html;

        // Render pagination
        if (pagination) {
            let pagHtml = `<ul class="pagination justify-content-center">`;
            if (result.prev_page_url) {
                pagHtml += `<li class="page-item"><button class="page-link" onclick="loadVouchers(${result.current_page - 1})">&laquo; Previous</button></li>`;
            } else {
                pagHtml += `<li class="page-item disabled"><span class="page-link">&laquo; Previous</span></li>`;
            }
            let start = Math.max(1, result.current_page - 2);
            let end = Math.min(result.last_page, result.current_page + 2);
            for (let i = start; i <= end; i++) {
                if (i === result.current_page) {
                    pagHtml += `<li class="page-item active"><span class="page-link">${i}</span></li>`;
                } else {
                    pagHtml += `<li class="page-item"><button class="page-link" onclick="loadVouchers(${i})">${i}</button></li>`;
                }
            }
            if (result.next_page_url) {
                pagHtml += `<li class="page-item"><button class="page-link" onclick="loadVouchers(${result.current_page + 1})">Next &raquo;</button></li>`;
            } else {
                pagHtml += `<li class="page-item disabled"><span class="page-link">Next &raquo;</span></li>`;
            }
            pagHtml += `</ul>`;
            pagination.innerHTML = pagHtml;
        }
    }, 500);
}

// Gọi hàm khi trang voucher được load
document.addEventListener('DOMContentLoaded', function () {
    loadVouchers();
});

function showVoucherLoading(count = 9) {
    const container = document.getElementById('voucher-container');
    if (!container) return;
    let html = '';
    for (let i = 0; i < count; i++) {
        html += `<div class="col-md-4"><div class="voucher-skeleton"></div></div>`;
    }
    container.innerHTML = html;
}

async function addCart(book_id, user_id) { 
    const data = {
        user_id: user_id,
        book_id: book_id
    };
    const url = addCartApiUrl; 
    const response = await fetch(url, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json;charset=utf-8',
            'Accept': 'Application/json',
        },
        body: JSON.stringify(data)
    });
    const result = await response.json();
    console.log(result);
    if (response.ok) {
        showCartToast('Book added to cart successfully!', true);
        document.querySelector('#cart-count').textContent = result.cart_count || 0; // Update cart count if available
    } else {
        showCartToast('Book already in your cart!', false);
    }
}

function attachAddCartListeners() {
    document.querySelectorAll('.add-to-cart').forEach(btn => {
        btn.onclick = function () {
            if (!userId || userId === 'null') {
                showCartToast('Please log in to add items to your cart.', false);
                return;
            }
            if (btn.disabled) return;

            btn.disabled = true;
            const bookId = this.getAttribute('data-book-id');
            addCart(bookId, userId).finally(() => {
                setTimeout(() => {
                    btn.disabled = false;
                }, 500);
            });
        };
    });
}

function showCartToast(message, isSuccess = true) {
    const container = document.getElementById('cart-toast-container');
    // Create a new toast element
    const toastEl = document.createElement('div');
    toastEl.className = `toast align-items-center border-0 mb-2 ${isSuccess ? 'text-bg-success' : 'text-bg-danger'}`;
    toastEl.setAttribute('role', 'alert');
    toastEl.setAttribute('aria-live', 'assertive');
    toastEl.setAttribute('aria-atomic', 'true');
    toastEl.setAttribute('data-bs-delay', '4000'); // 5 seconds

    toastEl.innerHTML = `
        <div class="d-flex">
            <div class="toast-body">${message}</div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    `;

    container.prepend(toastEl);

    const toast = new bootstrap.Toast(toastEl);
    toast.show();

    toastEl.addEventListener('hidden.bs.toast', () => {
        toastEl.remove();
    });
}

async function getBooksByRating(page = 1) {
    const bookList = document.getElementById('book-list');
    const url = `/api/index/books-by-review?page=${page}`;
    const res = await fetch(url);
    const result = await res.json();

    bookList.innerHTML = '';
    let string = '';
    for (let i = 0; i < result.data.length; i++) {
        const book = result.data[i];

        let categoryBadges = '';
        if (book.categories && book.categories.length > 0) {
            for (let j = 0; j < book.categories.length; j++) {
                categoryBadges += `<span class="badge bg-secondary me-1">${book.categories[j].category_name}</span>`;
            }
        }

        let ratingStars = '';

        for (let j = 0; j < Math.floor(book.reviews_avg_rating); j++) {
            ratingStars += `<i class="fas fa-star text-warning"></i>`;
        }

        if (ratingStars == '') {
            ratingStars = '<span class="text-muted">No Reviews</span>';
        }

        string += `<div class="card" style="animation-delay:${0.2 * i}s">
        <a href="/itemDetail/${book.book_id}" style="text-decoration: none">
            <img src="uploads/${book.cover_image}"
                alt="" width="150" height="200" />
            <h3>${book.title}</h3>
            <p class="author">${book.author ? book.author.author_name : 'Unknown'}</p>
            <div class="categories my-2">
                ${categoryBadges}
            </div>
            <div class="rating-row">
                <span>Rating : ${ratingStars}</span>
            </div>
            <div class="summary">
                <p>${book.summary}</p>
            </div>
            </a>
            <button class="add-to-cart" data-book-id="${book.book_id}">Add to Cart</button>
        </div>`
            ;
    }
    bookList.innerHTML = string;
    attachAddCartListeners();
    renderPagination('getBooksByRating', result);
}