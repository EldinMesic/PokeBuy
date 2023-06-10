function createPokemon(item){
    let itemElement = document.createElement('div');
        itemElement.classList.add('item');
        itemElement.id = item.id.toString();
        var imagePath = "url(images/forest.jpg)"
        itemElement.innerHTML = `
            <gimg style="background-image:${imagePath};">
                <img src="${item.image}" alt="${item.name}" loading="lazy" class="pokemon-image">
            </gimg>
            <h2 style="text-align:center">${item.name}</h2>
            <p>ID: ${item.id}</p>
            <p>$${item.price}</p>
            <button class="add-to-cart-btn blue-hover-btn" data-id="${item.id}" onclick="addToCart(this);">Add to cart</button>
        `;
        document.querySelector(".items-grid").appendChild(itemElement);
}