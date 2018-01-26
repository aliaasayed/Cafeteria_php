
images=['img/coffee.png','img/cola.png','img/water.png','img/water.png','img/water.png']
product=['Coffee','Cola','Water','Water','Water']
var price_num=8
var product_list=document.getElementById('product_list')

var reciept=document.getElementById('reciept')
var label_notes=document.getElementById('label_notes')
//var product_prices=document.getElementById('product_prices')
window.addEventListener('load',function(){


 for(var i=0;i<5;i++){

    var element=document.createElement('div')
    element.className="product_list_element"
 	var img=document.createElement('img')
 	img.src=images[i]
 	img.className="product_photo"
     

    img.addEventListener('click',function()
   {
      
    var element=document.createElement('div')
    
 	//product_prices.parentNode.insertBefore(img,product_prices)
    var product_name=document.createElement('p')
    product_name.innerText=product[0] + "  "
    //product_name.innerText += " " //
    product_name.className="element_order"
    element.appendChild(product_name)

    var product_quantity=document.createElement('input')
    product_quantity.name="product_quantity"
    product_quantity.type="text"
    product_quantity.value=1
    product_quantity.style.width="50px"
    element.appendChild(product_quantity)

    var price=document.createElement('p')
    price.className="element_order"
    price.innerText=8
   

    var product_add=document.createElement('span')
    product_add.className="glyphicon glyphicon-plus"
    product_add.addEventListener('click',function()
    {
      product_quantity.value++ ;
      price.innerText=parseInt(price.innerText)+price_num
      
    })

    element.appendChild(product_add)

    var product_del=document.createElement('span')
    product_del.className="glyphicon glyphicon-minus"
    product_del.addEventListener('click',function()
    {
      if(product_quantity.value > 1)
      {
      	product_quantity.value-- ;
        price.innerText=price.innerText-price_num
      }	
      

    })
    element.appendChild(product_del)


    var price_tag=document.createElement('p')
    price_tag.className="element_order"
    price_tag.innerText=" EGP  "
    element.appendChild(price_tag)

    
    element.appendChild(price)

    
    var product_delete=document.createElement('span')
    product_delete.className="glyphicon glyphicon-remove-circle "
    
    product_delete.addEventListener('click',function()
    {
      reciept.removeChild(element)

    })
    element.appendChild(product_delete)


   reciept.insertBefore(element,reciept.firstChild)

   })

 	element.appendChild(img)
 	//
    var product_name=document.createElement('p')
    product_name.className="label label-primary"
    product_name.innerText=product[i]
    var price=document.createElement('span')
    price.className="badge"
   // price.className +="price"
    price.innerText="7 L.E"
    product_name.appendChild(price)
    element.appendChild(product_name)
    product_list.appendChild(element)
    
 }



})

