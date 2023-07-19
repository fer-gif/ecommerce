fetch("/php-javascript/model/productos.php")
    .then(response => response.json())
    .then(productos =>{
        console.log(productos);
    })
    .catch(error => {
        console.error('Error',error);
    })