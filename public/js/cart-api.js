// Add to cart button handler
const suggest = document.querySelector('.suggest');
const input = document.querySelector('.input-search');

document.querySelectorAll(".add-to-cart-btn").forEach((btn) => {
    btn.addEventListener("click", function () {
        const bookId = this.getAttribute("data-book-id");
        fetch(`/cart/add/${bookId}`, {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": document
                    .querySelector('meta[name="csrf-token"]')
                    .getAttribute("content"),
                Accept: "application/json",
                "Content-Type": "application/json",
            },
            body: JSON.stringify({}),
        })
            .then((response) => response.json())
            .then((data) => {
                if (data.success) {
                    alert("Đã thêm vào giỏ hàng!");
                    fetchCartQuantity(); // Update cart icon after add
                } else {
                    alert(data.message || "Có lỗi xảy ra!");
                }
            })
            .catch(() => alert("Có lỗi xảy ra!"));
    });
});

// Update cart quantity (increase/decrease)
function updateCartQuantity(cartId, newQuantity) {
    fetch(`/api/cart/${cartId}`, {
        method: "PATCH",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content"),
            Accept: "application/json",
        },
        body: JSON.stringify({ quantity: newQuantity }),
    })
        .then((res) => res.json())
        .then((data) => {
            if (!data.success) {
                alert(data.message || "Cập nhật số lượng thất bại!");
            } else {
                fetchCartQuantity(); // Update cart icon after quantity change
            }
        });
}

// Fetch and update cart icon quantity
function fetchCartQuantity() {
    fetch("/api/cart", {
        headers: { Accept: "application/json" },
    })
        .then((res) => res.json())
        .then((data) => {
            if (data.success) {
                let totalQuantity = 0;
                if (data.total_quantity !== undefined) {
                    totalQuantity = data.total_quantity;
                } else if (Array.isArray(data.cart)) {
                    totalQuantity = data.cart.reduce(
                        (sum, item) => sum + item.quantity,
                        0
                    );
                }
                const cartCount = document.getElementById("cartCount");
                if (cartCount) cartCount.textContent = totalQuantity;
            }
        });
}

// Delete cart item
function deleteCartItem(cartId) {
    fetch(`/api/cart/${cartId}`, {
        method: "DELETE",
        headers: {
            "X-CSRF-TOKEN": document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content"),
            Accept: "application/json",
        },
    })
        .then((res) => res.json())
        .then((data) => {
            if (data.success) {
                fetchCartQuantity(); // Update cart icon after delete
            } else {
                alert(data.message || "Xóa sản phẩm thất bại!");
            }
        });
}

// Suggest search for products (global search)
async function suggestSearch(keyword) {
    if (keyword != '') {
        const url = `/api/cart/search/${keyword}`;

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
// Suggest search for cart page (search in user's cart)
function suggestCartSearch(keyword) {
    const suggest = document.querySelector(".suggest");
    suggest.innerHTML = "";
    if (keyword !== "") {
        fetch(`/api/cart/search?q=${encodeURIComponent(keyword)}`)
            .then((res) => res.json())
            .then((result) => {
                if (result.success && result.cart.length > 0) {
                    result.cart.forEach((item) => {
                        const li = document.createElement("li");
                        li.classList.add(
                            "list-group-item",
                            "d-flex",
                            "flex-row",
                            "justify-content-between",
                            "row"
                        );
                        li.innerHTML = `<a style="text-decoration:none; color:black" href='/itemDetail/${
                            item.book.book_id
                        }' class="col-2">
                                            <img src="uploads/${
                                                item.book.cover_image
                                            }" alt="" width="50" height="50">
                                        </a>
                                        <div class="col-10">
                                            <h5 class="mb-1">${
                                                item.book.title
                                            }</h5>
                                            <p class="mb-1">${
                                                item.book.author
                                                    ? item.book.author
                                                          .author_name
                                                    : "Unknown"
                                            }</p>
                                            <small>Price: ${
                                                item.book.price
                                            }</small>
                                        </div>`;
                        suggest.append(li);
                    });
                } else {
                    suggest.innerHTML =
                        '<li class="list-group-item">Không tìm thấy sản phẩm trong giỏ hàng</li>';
                }
            });
    }
}

// Usage: Attach to your search input
document.querySelector(".input-search").addEventListener("input", function () {
    // Use suggestSearch for global product search
    // suggestSearch(this.value.trim());

    // Use suggestCartSearch for cart search
    suggestCartSearch(this.value.trim());
});
