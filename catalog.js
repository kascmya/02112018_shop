class Product {
    constructor (name, price, pic = null, id) {
        this.label = name;
        this.pic = pic;
        this.price = price;
        this.id = id;
    }

    renderProduct(el) {

        let newProductBlock = document.createElement('a');
        newProductBlock.classList.add('.card');
        newProductBlock.href = `/handlers/getCatalogItems.php?product=${this.id}`;
        newProductBlock.innerHTML = `
            <div class="card__pic" style="background-image: url(${this.pic})"></div>
            <div class="card__name">${this.label}</div>
            <div class="card__cost">${this.price}</div>          
        `;
        el.appendChild(newProductBlock);
    }
}

class Catalog {
    constructor (catalogBlock) {
        this.el = document.querySelector(catalogBlock);
        this.products = [];
    }
    productsArray(products) {
        this.products = products;
    }
    clear() {
        this.el.innerHTML = '';
    }
    renderCatalog() {
        this.products.forEach ((value) => {
            value.renderProduct(this.el)
        });
    }
    pagination (data) {
        let pages = data['pagination']['countPages'];        
        // var i = 0;
        // while(i < pages) {
        //     console.log(i);
        //     i++;
        // }
        let paginationBlock = document.querySelector('.numbpages');
        for (let i = 0; i < pages; i++) {
            let newPagElement = document.createElement('div');
            newPagElement.innerText = 1 + i;
            paginationBlock.appendChild(newPagElement);
            newPagElement.classList.add('numb');

            if (data['pagination']['currentPage'] == i+1) {
                newPagElement.classList.add('numbwhite');
            }
            newPagElement.addEventListener('click', function() {
                catalog.load(0, i + 1); // вместо нуля подставить категорию
                

            });
        }
    }
    load(cat = 0, page = 1) {
       let xhr =  new XMLHttpRequest();
       xhr.open('GET', `/atf/getProducts.php?category=${cat}&page=${page}`);
       xhr.send();

       this.clear();

       xhr.addEventListener('load', function(){
        //    Записали данные в переменную дата(array)
        let data = JSON.parse (xhr.responseText);
        console.log(data);
        //    перебираем циклом полученный массив
        let dataArray = [];
            data['items'].forEach(function(value) {
                dataArray.push(new Product (value.name, value.cost, value.img_src, value.id));
                
            });
            catalog.productsArray(dataArray);
            catalog.renderCatalog();
            catalog.pagination(data);
    });
}
};
let catSelect = document.getElementById('catSelect');
    catSelect.addEventListener('change', function(){
    catalog.load(catSelect.value);

})

let catalog = new Catalog('.card');
catalog.load(0);


